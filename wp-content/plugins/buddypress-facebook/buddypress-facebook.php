<?php



/* include the buddypress facebook admin extension */

require ( dirname( __FILE__ ) . '/admin.php' );



/* Only include the working extensions dependant on admin options ( 'members' and 'groups' ) */



/* only include the member extension if enabled */



  if ( !$fbcj_members_extension_check ) {

    if ( !$fbcj_members_extension_check = get_option('fbcj-members') )

      $fbcj_members_extension_check = ''; // the default

  }

  if ( $fbcj_members_extension_check == '1' ) {



require( dirname( __FILE__ ) . '/includes/facebook-members-extension.php' );

  }





/* only include the group extension if enabled */



  if ( !$fbcj_group_extension_check ) {

    if ( !$fbcj_group_extension_check = get_option('fbcj-groups') )

      $fbcj_group_extension_check = ''; // the default

  }

  if ( $fbcj_group_extension_check == '1' ) {







require( dirname( __FILE__ ) . '/includes/facebook-groups-extension.php' );

  }

























/* Include the css to fix the button alignment. */



function bp_fbcj_insert_head() {

?>

<link href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/buddypress-facebook/includes/style.css" media="screen" rel="stylesheet" type="text/css"/>

<?php

}

add_action('wp_head', 'bp_fbcj_insert_head');



?>