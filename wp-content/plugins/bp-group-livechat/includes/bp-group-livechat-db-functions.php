<?php
function bp_group_livechat_who_is_online() {
	global $bp, $wpdb;
	
	if ( $_POST['bp_group_livechat_online_query'] == 1 ) {	
		//die if nonce fail
		check_ajax_referer( 'groups_livechat_heartbeat_' . $_POST['bp_group_livechat_group_id'] );
		// only do this is member of the group or super admin
		if ( groups_is_user_member( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] )
			 || groups_is_user_mod( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] ) 
			 || groups_is_user_admin( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] )
			 || is_super_admin() ) {
				 
			//delete old
			$sql = $wpdb->prepare( "DELETE FROM {$wpdb->base_prefix}bp_group_livechat_online WHERE ".
								   "group_id=%d AND user_id=%d", 
								   $_POST['bp_group_livechat_group_id'], $bp->loggedin_user->id  );
			$wpdb->query($sql);
			//add new
			$sql = $wpdb->prepare( "INSERT INTO {$wpdb->base_prefix}bp_group_livechat_online".
								   "( group_id, user_id, timestamp ) ".
								   "VALUES ( %d, %d, %s )", 
								   $_POST['bp_group_livechat_group_id'], $bp->loggedin_user->id, time() );
			$wpdb->query($sql);
			//get users viewing this page
			$rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->base_prefix}bp_group_livechat_online ".
								   "WHERE group_id=%d", 
								   $_POST['bp_group_livechat_group_id'] ) );
			if( empty( $rows ) ) {
				echo 'nobody online - how are you even viewing this?';
				die;
			}
			// we have results - anyone that has checked in in last 15 seconds is shown as online
			foreach( $rows as $bp_group_livechat_user ) {
				if ( time() - $bp_group_livechat_user->timestamp < 15 ) {
					echo '<li id="' . $bp_group_livechat_user->timestamp . '" class="item-list">';
					echo '<div class="bp-livechat-user-online-avatar">' . bp_core_fetch_avatar( 'item_id='.$bp_group_livechat_user->user_id.'&object=user&type=thumb&width=30&height=30' ) . '</div>';
					echo '<h5>' . bp_core_get_userlink( $bp_group_livechat_user->user_id ) . '</h5>';
					echo bp_add_friend_button( $bp_group_livechat_user->user_id );
					echo '</li>';
				}
			}
			die;
		}
	}
}
add_action( 'wp_ajax_bp_livechat_heartbeat', 'bp_group_livechat_who_is_online' );

function bp_group_livechat_new_message() {
	global $bp, $wpdb;
	
	if ( $_POST['bp_group_livechat_new_message'] == 1 ) {
		//die if nonce fail
		check_ajax_referer( 'groups_livechat_new_message_' . $_POST['bp_group_livechat_group_id'] );
		// only do this is member of the group or super admin
		if ( groups_is_user_member( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] )
			 || groups_is_user_mod( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] ) 
			 || groups_is_user_admin( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] )
			 || is_super_admin() ) {
				 
			//add new message
			$message_content = '[' . gmdate('H:i') . ']<strong>' . $bp->loggedin_user->fullname . '</strong>: ' . $_POST['bp_group_livechat_textbox'];
			$sql = $wpdb->prepare( "INSERT INTO {$wpdb->base_prefix}bp_group_livechat".
								   "( group_id, user_id, message_content ) ".
								   "VALUES ( %d, %d, %s )", 
								   $_POST['bp_group_livechat_group_id'], $bp->loggedin_user->id, $message_content );
			$wpdb->query($sql);
			die;
		}
	}
}
add_action( 'wp_ajax_bp_livechat_new_message', 'bp_group_livechat_new_message' );

function bp_group_livechat_load_messages() {
	global $bp, $wpdb;
	
	if ( $_POST['bp_group_livechat_load_messages'] == 1 ) {	
		//die if nonce fail
		check_ajax_referer( 'groups_livechat_load_messages_' . $_POST['bp_group_livechat_group_id'] );
		// only do this is member of the group or super admin
		if ( groups_is_user_member( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] )
			 || groups_is_user_mod( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] ) 
			 || groups_is_user_admin( $bp->loggedin_user->id, $_POST['bp_group_livechat_group_id'] )
			 || is_super_admin() ) {
					 
			//load last messages
			$rows = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->base_prefix}bp_group_livechat ".
								   "WHERE group_id=%d ORDER BY id DESC LIMIT 100", 
								   $_POST['bp_group_livechat_group_id'] ) );
			if( empty( $rows ) ) {
				echo '-no messages yet-';
				die;
			}
			// we have results - anyone that has checked in in last 15 seconds is shown as online
			foreach( $rows as $bp_group_livechat_message ) {
					echo stripslashes( $bp_group_livechat_message->message_content ). '<br/>';
			}
			die;
		}
	}
}
add_action( 'wp_ajax_bp_livechat_load_messages', 'bp_group_livechat_load_messages' );
?>