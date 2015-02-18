<?php







add_action('admin_menu', 'bp_fbcj_plugin_menu');



add_action( 'network_admin_menu', 'bp_fbcj_plugin_menu' );







function bp_fbcj_plugin_menu() {



  add_submenu_page( 'bp-general-settings', 'Bp Facebook', 'BuddyPress Facebook', 'manage_options', 'bp-fbcj', 'bpfbcj_plugin_options');





  //call register settings function



  add_action( 'admin_init', 'bpfbcj_register_settings' );



}







function bpfbcj_register_settings() {



  //register our settings



  register_setting( 'bpfbcj_plugin_options', 'fbcj-members' );



  register_setting( 'bpfbcj_plugin_options', 'fbcj-groups' );



  register_setting( 'bpfbcj_plugin_options', 'fbcj-groups-placement' );



  register_setting( 'bpfbcj_plugin_options', 'fbcj-count' );



//  register_setting( 'bpfbcj_plugin_options', 'fbcj-button-size' );





  //name to cerrelate to the members profile field label

  register_setting( 'bpfbcj_plugin_options', 'fbcj_member_label' );





  //name to cerrelate to the gropus field label

  register_setting( 'bpfbcj_plugin_options', 'fbcj_group_label' );}







function bpfbcj_plugin_options() {



  if (!current_user_can('manage_options'))  {



    wp_die( __('You do not have sufficient permissions to access this page.') );





  }





?>







      <?php if ( !empty( $_GET['settings-updated'] ) ) : ?>

        <div id="message" class="updated">

          <p><strong><?php _e('Buddypress Facebook Settings have been saved.' ); ?></strong></p>

        </div>

      <?php endif; ?>













<div class="wrap">



<h2>

<?php _e('BuddyPress Facebook Settings', 'bpfbcj') ?>

</h2>





<h3><?php _e('Member and Group Components.', 'bpfbcj') ?></h3>





<p><?php _e('The plugin uses Buddypress XProfile Fields and requires you to name the "Mirror Profile Field Title" below the same as your custom Profile Field Title - Please read the <a href="http://wordpress.org/extend/plugins/buddypress-facebook/installation/" target="_blank" title="Opens in a new tab">plugin installation instructions</a> if you are not sure what to do.', 'bpfbcj') ?></p>



<form method="post" action="<?php echo admin_url('options.php');?>">



<?php wp_nonce_field('update-options'); ?>





<table class="form-table">







<hr></hr>





































































<?php // members admin options ?>







<table class="form-table">













  <tr valign="top">



    <th scope="row"><b>Members</b></th>



      <td>

        <input type="checkbox" name="fbcj-members" value="1" <?php if (get_option('fbcj-members')==1) echo 'checked="checked"'; ?>/>

        Let your members display their Facebook button on their profile page.

      </td>



  </tr>



  <tr valign="top">

    <th scope="row"><colored-text style="color: red;">Mirror</colored-text> Profile Field Title</th>

                <td>

        <input <?php if ( get_option('fbcj-members') == '' ) {?>disabled="disabled"<?php }?> name="fbcj_member_label" value="<?php echo get_option('fbcj_member_label') ?>"/><?php if ( get_option('fbcj-members') == '' ) {?><br /><i><colored-text style="color: orange;">Disabled</colored-text> - Tick the check-box above and save to enable this feature</i><?php }?>

                <p><colored-text style="color: green;">Quick links:</colored-text> Visit <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=bp-profile-setup&group_id=1&mode=add_field" target="_blank" title="opens in a new tab">Add Field</a> to set up a new XProfile field or <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=bp-profile-setup" target="_blank" title="opens in a new tab">Extended Profile Fields</a> to edit a existing field</p>

      </td>

    </tr>

</table>



<?php // groups admin options ?>



<table class="form-table">





  <tr valign="top">



    <th scope="row"><b>Groups</b></th>



      <td>

        <input type="checkbox" name="fbcj-groups" value="1" <?php if (get_option('fbcj-groups')==1) echo 'checked="checked"'; ?>/>

        Let your groups display their Facebook button on the group's home page.

      </td>



  </tr>







  <tr valign="top">

    <th scope="row">Group Field Title</th>

                <td>

        <input <?php if ( get_option('fbcj-groups') == '' ) {?>disabled="disabled"<?php }?> name="fbcj_group_label" value="<?php echo get_option('fbcj_group_label') ?>"/><?php if ( get_option('fbcj-groups') == '' ) {?><br /><i><colored-text style="color: orange;">Disabled</colored-text> - Tick the check-box above and save to enable this feature</i><?php }?>

      </td>

    </tr>

</table>











<input type="hidden" name="action" value="update" />

<input type="hidden" name="page_options" value="fbcj-members,fbcj-groups,fbcj_member_label,fbcj_group_label" />







<p class="submit">



  <input type="submit" class="button-primary" value="<?php _e('Save Component Settings') ?>" />



</p>





</form>














<!--
<h3><?php _e('Display Settings.', 'bpfbcj') ?></h3>





<p><?php _e('Alter the appearance of the facebook button - note that the appearance will be the same for members and for groups. Click the save button to preview the changes.', 'bpfbcj') ?></p>



<form method="post" action="<?php echo admin_url('options.php');?>">



<?php wp_nonce_field('update-options'); ?>





<table class="form-table">

<hr></hr>





  <tr valign="top">



    <th scope="row"><b>Groups Button Position</b></th>



      <td>

         <label>

            <input <?php if ( get_option('fbcj-groups') == '' ) {?>disabled="disabled"<?php }?> type="radio" name="fbcj-groups-placement" value="" <?php if (get_option('fbcj-groups-placement')=='') echo 'checked="checked"'; ?> />

          Before the group description</label>

        <br />

          <label>

             <input <?php if ( get_option('fbcj-groups') == '' ) {?>disabled="disabled"<?php }?> type="radio" name="fbcj-groups-placement" value="1" <?php if (get_option('fbcj-groups-placement')==1) echo 'checked="checked"'; ?> />

          After the group description</label>

                <?php if ( get_option('fbcj-groups') == '' ) {?><br /><i><colored-text style="color: orange;">Disabled</colored-text> - This feature requires the groups component to be enable above.</i><?php }?>

      </td>



  </tr>



  <tr valign="top">



    <th scope="row"><b>Follower Button Size</b></th>



      <td>

         <label>

            <input type="radio" name="fbcj-button-size" value="" <?php if (get_option('fbcj-button-size')=='') echo 'checked="checked"'; ?> />

          Normal</label>

        <br />

          <label>

             <input type="radio" name="fbcj-button-size" value="1" <?php if (get_option('fbcj-button-size')==1) echo 'checked="checked"'; ?> />

          Large</label>

      </td>



  </tr>



  <tr valign="top">



    <th scope="row"><b>Follower Count</b></th>



      <td>

        <input type="checkbox" name="fbcj-count" value="1" <?php if (get_option('fbcj-count')==1) echo 'checked="checked"'; ?>/>

        Shows the user's/group's follower count next to their follow button.

      </td>



  </tr>


</table>

-->

<div id="bp-fb-button-preview" style="padding:0 10px 10px;margin-top:20px;border: 1px solid #CCC;">



<p><colored-text style="color: green;">Button Preview</colored-text></p>



<a href="https://facebook.com/samueledebora"><img src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/buddypress-facebook/img/facebook_social.gif" /></a>


</div>



<input type="hidden" name="action" value="update" />

<input type="hidden" name="page_options" value="fbcj-groups-placement, fbcj-count, fbcj-button-size" />







<p class="submit">



  <input type="submit" class="button-primary" value="<?php _e('Save Display Settings') ?>" />



</p>





</form>













<p>If you enjoy the plugin and would like to keep up to speed on future features and updates check out my blog - <a href="http://www.artewebdesign.com.br" target="_blank">Arte Webdesign</a></p>

<!-- <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://buddypress.org/community/groups/buddypress-twitter/home/" data-text="Let your #Buddypress members and groups add their twitter follow button to their profiles" data-via="itsCharlKruger">Tweet</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>     -->



</div>



<!-- <iframe src="http://widgets.klout.com/badge/itsCharlkruger?size=s" style="margin-top:10px;border:0" scrolling="no" allowTransparency="true" frameBorder="0" width="120px" height="59px"></iframe> -->





<?php



}





?>