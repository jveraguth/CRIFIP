<?php



// Facebook Members Extension for Buddypress by Samuel Costa



// $show_fbcj_in_header - Display the facebook widget using our xprofile data and return it in the members header



function show_fbcj_in_header() {



$fbcj_username= xprofile_get_field_data(get_option('fbcj_member_label')); //fetch the location field for the displayed user



  if ( $fbcj_username != "" ) { // check to see the facebook field has data



?>

<a class="bp-fb-profile" href="<?php echo $fbcj_username; ?>" ><img src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/buddypress-facebook/img/facebook_social.gif" /></a>

<!-- <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->

<?php

  }



}

add_filter( 'bp_before_member_header_meta', 'show_fbcj_in_header' );



function bp_fb_member_count() {

  if (get_option('fbcj-count')==1) {

    echo 'true';

  }

  else {

    echo 'false';

  }

}



?>