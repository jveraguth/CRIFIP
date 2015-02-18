<?php
   $idx = null;
   if(isset($_POST["setc"])) {
      setcookie("profil", $_POST["sel"], time() + 3600 * 24 * 30);
      header("location: " . $_SERVER["PHP_SELF"]); 
   } else if(isset($_COOKIE["profil"])) {
      $idx = $_COOKIE["profil"];
   } 
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<meta charset="UTF-8" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
		wp_head();
?>


</head>
	<body <?php body_class(); ?>>
    <div class="container bghead">
        <header role="banner">
		<div class="row header">
            <div class="twocol">
                <div><a href="<?php echo home_url( '/' ); ?>" title="Accueil CRIFIP" rel="home"><img src="<?php echo home_url( '/' ); ?>images/logo-crifip.png" alt="Centre de recherches internationales et de formation sur l'inceste et la p&eacute;docriminalit&eacute;"/></a></div>
            </div>
            <nav role="navigation" class="cbp-spmenu">
              <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
                <ul>
                	<li><a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'boilerplate' ); ?>"><?php _e( 'Skip to content', 'boilerplate' ); ?></a></li>
                	<li><a href="#" title="Aide &aacute; la navigation">Aide &aacute; la navigation</a></li>
                	<li><a href="#" title="Plan de site">Plan de site</a></li>
                </ul>
            </nav><!-- #access -->
            <nav id="menu" role="navigation" class="nav tencol nomargintop nopadding last">
				<!--<div>Acc&egrave;s aux portails du CRIFIP</div>-->
				<ul>
					<li><a href="<?php echo home_url( '/' ); ?>actualite/" title=""><span class="icon"><i aria-hidden="true" class="icon-actualite"></i></span><span>L'Actualit&eacute;</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>publications/" title=""><span class="icon"><i aria-hidden="true" class="icon-publications"></i></span><span>Publications</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>temoignages/" title=""><span class="icon"><i aria-hidden="true" class="icon-temoignage"></i></span><span>T&eacute;moignages</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>recherche/" title=""><span class="icon"><i aria-hidden="true" class="icon-recherche"></i></span><span>Recherche</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>formations/" title=""><span class="icon"><i aria-hidden="true" class="icon-formation"></i></span><span>Formation</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>documents-mediatheque/" title=""><span class="icon"><i aria-hidden="true" class="icon-media"></i></span><span>M&eacute;diath&egrave;que</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>ressources/" title=""><span class="icon"><i aria-hidden="true" class="icon-ressource"></i></span><span>Ressources</span></a></li>
					<li><a href="<?php echo home_url( '/' ); ?>evenements/" title=""><span class="icon"><i aria-hidden="true" class="icon-event"></i></span><span>&Eacute;venements</span></a></li>
				</ul>
            </nav>
			<div class="twelvecol">
			<?php wp_ultimate_search_bar(); ?>
			</div>
            <!--<div id="profilList" class="profilcol last miniGutter card nomargintop" data-step="1" data-intro="This is a tooltip!">
				<form action="<?php /*echo $_SERVER["PHP_SELF"]; */?>" method="post">
					<select id="cd-dropdown" name="sel" class="cd-select">
						<option value="-1" selected>Choisir un profil:</option>
						<option value="general"<?php /*echo (!is_null($idx) && $idx === "general" ? " selected" : "");*/?>>Profil General</option>
						<option value="medic"<?php /*echo (!is_null($idx) && $idx === "medic" ? " selected" : "");*/?>>Corps m&eacute;dical</option>
						<option value="loi"<?php /*echo (!is_null($idx) && $idx === "loi" ? " selected" : "");*/?>>Loi</option>
						<option value="policier"<?php /*echo (!is_null($idx) && $idx === "policier" ? " selected" : "");*/?>>Policier</option>
						<option value="blaireau"<?php /*echo (!is_null($idx) && $idx === "blaireau" ? " selected" : "");*/?>>Blaireau</option>
					</select>
					<input id="cd-dropdown-input" name="setc" value="Changer le profil" type="submit">
				</form>
            </div>-->
        </div><!--end row-->
		<div class="clearfix"></div>
	</div><!-- end container -->
				<div class="twelvecol">
				<div id="pre_wpus_response">
			<?php wp_ultimate_search_results(); ?>
			</div>
			</div>
	<div class="container">
		<div class="clearfix"></div>
        
		<div class="row">
		<div id="breadcrumb" class="twelvecol">
		<?php
		if ( is_home() ) {
			
		} else {
		if (function_exists('mybread')) mybread();
		}
		?>
		<div class="clearfix"></div>
		        

        </div><!--end row-->
        </header>