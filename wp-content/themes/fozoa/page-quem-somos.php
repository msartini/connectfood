<?php
/*
Template Name: Quem Somos
*/
?>
<?php get_header(); ?>

<?php loadJS('js/share-script');?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <header>
          <?php
            $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=1313&h=207&zc=0';
           ?>
          <h1 class="header-banner">
            <?php if($src[0] != ""): ?>
              <img src="<?php echo $src_banner; ?>" alt="<?php the_title();?>">
            <?php else : ?>
              <span class="hide"><?php the_title();?></span>
            <?php endif; ?>
          </h1>
        </header> <!-- end article header -->

        <section class="post_content clearfix" itemprop="articleBody">
          <!-- menu latera  -->
          <div class="side-menu span4">
            <div class="list-menu">
              <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true, 'slug' => 'quem-somos-lateral' ) );?>
              <?php foreach ( $menus as $menu ):?>
                <?php wp_nav_menu(array('menu' => $menu, 'menu_class' => 'unstyled', 'container' => 'list-menu'));?>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- conteúdo da pagina -->
          <div class="span8">
            <!-- Breadcrumb -->
            <?php if(function_exists('bcn_display')): ?>
              <ul class="breadcrumb"><?php bcn_display(); ?></ul>
            <?php endif; ?>

            <!-- Share links -->
            <section class="share-container">
              <div class="share-item">
                <div id="fb-root"></div>
                <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-action="recommend"></div>
              </div>
              <div class="share-item">
                <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
              </div>
              <div class="share-item">
                <a href="#" class="print-link"><div class="print-icon"></div><span>imprimir</span></a>
              </div>
            </section>

            <!-- Galeria  -->
            <?php $codigo_da_galeria = get_post_meta($post->ID, 'codigo_da_galeria', true); ?>  
            
            <?php if ( $codigo_da_galeria > 0) : ?>
              <div class="quem-somos-slideshow"><?php do_action('slideshow_deploy', $codigo_da_galeria); ?> </div>
            <?php endif; ?>
         
            <!-- Conteúdo principal -->
            <div class="main-content">
              <p><?php the_content(); ?></p>
              <!-- Ancora da pagina -->
              <?php $post_name = $post->post_name; ?>
              <?php //Verifica se tem ancoras a serem carregadas ?>
              <?php include(TEMPLATEPATH . '/includes/page-ancoras.php'); ?>
            </div>

          </div>
        </section> <!-- end article section -->

      </article> <!-- end article -->

    <?php endwhile; ?>
    <?php else : ?>

      <article id="post-not-found">
        <header>
          <h1><?php _e("Not Found", "bonestheme"); ?></h1>
        </header>

        <section class="post_content">
          <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
        </section>
      </article>

    <?php endif; ?>

    <footer>
      <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>
    </footer> <!-- end article footer -->

  </div> <!-- end #main -->
</div> <!-- end #content -->


<?php get_footer(); ?>