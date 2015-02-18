<?php
/*
Plugin Name: BuddyPress Group Live Chat
Plugin URI: http://linktart.co.uk
Description: Ajax live chat for groups
Version: 1.1
Revision Date: May 20, 2013
Requires at least: WordPress 3.5.1, BuddyPress 1.7.2
Tested up to: WordPress 3.5.1 / BuddyPress 1.7.2
License: AGPL
Author: David Cartwright
Author URI: http://linktart.co.uk
Network: true
*/

/* Only load the component if BuddyPress is loaded and initialized. */
function bp_group_livechat_init() {
	require( dirname( __FILE__ ) . '/includes/bp-group-livechat-core.php' );
}
add_action( 'bp_init', 'bp_group_livechat_init' );

// create the tables
function bp_group_livechat_activate() {
	global $wpdb;

	if ( !empty($wpdb->charset) )
		$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

	$sql[] = "CREATE TABLE {$wpdb->base_prefix}bp_group_livechat (
		  		id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  		group_id bigint(20) NOT NULL,
		  		user_id bigint(20) NOT NULL,
		  		message_content text
		 	   ) {$charset_collate};";

	$sql[] = "CREATE TABLE {$wpdb->base_prefix}bp_group_livechat_online (
		  		id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  		group_id bigint(20) NOT NULL,
		  		user_id bigint(20) NOT NULL,
		  		timestamp int(11) NOT NULL
		 	   ) {$charset_collate};";

	require_once( ABSPATH . 'wp-admin/upgrade-functions.php' );

	dbDelta($sql);

	update_site_option( 'bp-group-livechat-db-version', BP_GROUP_LIVECHAT_DB_VERSION );
}
register_activation_hook( __FILE__, 'bp_group_livechat_activate' );

?>