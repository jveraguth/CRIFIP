<?php

/**

Plugin Name: BuddyPress Facebook

Plugin URI: http://wordpress.org/extend/plugins/buddypress-facebook/

Description: Let your members and groups show their Facebook Button on their profile page and group page.

Version: 0.3

Author: Samuel Costa

Author URI: http://www.artewebdesign.com.br

License:GPL2

**/



function bp_fbcj_init() {

  require( dirname( __FILE__ ) . '/buddypress-facebook.php' );

}

add_action( 'bp_include', 'bp_fbcj_init' );



?>