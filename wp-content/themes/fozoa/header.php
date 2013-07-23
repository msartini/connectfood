<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
      <?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
      echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icons & favicons -->
    <!-- For iPhone 4 -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
    <!-- For Nokia -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php //get_wpbs_theme_options(); ?>

    <?php

      // check wp user level
      get_currentuserinfo();
      // store to use later
      global $user_level;

      // get list of post names to use in 'typeahead' plugin for search bar
      if(of_get_option('search_bar', '1')) { // only do this if we're showing the search bar in the nav

        global $post;
        $tmp_post = $post;
        $get_num_posts = 40; // go back and get this many post titles
        $args = array( 'numberposts' => $get_num_posts );
        $myposts = get_posts( $args );
        $post_num = 0;

        global $typeahead_data;
        $typeahead_data = "[";

        foreach( $myposts as $post ) :  setup_postdata($post);
          $typeahead_data .= '"' . get_the_title() . '",';
        endforeach;

        $typeahead_data = substr($typeahead_data, 0, strlen($typeahead_data) - 1);

        $typeahead_data .= "]";

        $post = $tmp_post;

      } // end if search bar is used

    ?>

  </head>

  <body <?php body_class(); ?>>

    <header role="banner">

      <div id="inner-header" class="clearfix">

        <!-- MENU GERAL DO PORTAL E IDIOMAS -->
        <div class="navbar main-navbar">
          <div class="navbar-inner container-fluid">
            <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
          </div>
        </div>

        <!-- AREA DE LOGO E PESQUISA NO HEADER -->
        <div class="application-header container-fluid">
          <div class="main-logo pull-left">
            <a id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="">
            </a>
          </div>

          <div class="main-search-form">
            <?php if(!of_get_option('search_bar', '1')) {?>
              <div class="input-append">
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                  <input class="input-large"
                         name="s"
                         id="s"
                         type="text"
                         autocomplete="on"
                         placeholder="<?php _e('digite o que deseja encontrar','bonestheme'); ?>"
                         data-provide="typeahead"
                         data-items="4"
                         data-source='<?php echo $typeahead_data; ?>' />

                  <button class="btn" type="submit"><i class="icon-play icon-white"></i></button>
                </form>
              </div>
            <?php } ?>
          </div>
        </div>

        <!-- MENU DA APLICAÇÃO -->
        <div class="application-navbar navbar">
          <div class="navbar-inner container-fluid">
            <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true, 'slug' => 'menu-interno' ) );?>

            <?php foreach ( $menus as $menu): ?>
              <?php wp_nav_menu(array('menu' => $menu, 'menu_class' => 'nav', 'container' => 'div', 'container_class' => 'clearfix'));?>
            <?php endforeach; ?>
          </div>
        </div>

      </div> <!-- end #inner-header -->

    </header> <!-- end header -->


    <div class="container-fluid">
