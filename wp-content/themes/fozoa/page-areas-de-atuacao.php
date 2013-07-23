<?php get_header(); ?>

<?php loadJS('js/share-script');?>

<!-- Google Maps -->
<?php $titulo_do_mapa = get_post_meta($post->ID, 'titulo_do_mapa', true); ?>
<?php $descricao_do_mapa = get_post_meta($post->ID, 'descricao_mapa', true); ?>
<?php $html_do_mapa = get_post_meta($post->ID, 'html_do_mapa', true); ?>

<!-- Páginas -->
<?php $aguaEsgotoPage     = get_page (get_ID_by_page_name('agua-e-esgoto')); ?>
<?php $residuosPage       = get_page (get_ID_by_page_name('residuos'));      ?>
<?php $utilitiesPage      = get_page (get_ID_by_page_name('utilities'));     ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <?php if ( get_field('banner_exibe_banner') == 'sim' ): ?>
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
        <?php endif; ?> 
        <section class="post_content clearfix" itemprop="articleBody">
          <!-- Breadcrumb -->
          <section class="clearfix post-title-underlined">
            <h2 class="pull-left uppercase"><?php the_title();?></h2>
          </section>

          <section class="share-container">
            <div id="fb-root"></div>
            <div class="share-item">
              <div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true" data-action="recommend"></div>
            </div>
            <div class="share-item">
              <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
            </div>
            <div class="share-item">
              <a href="#" class="print-link"><div class="print-icon"></div><span>imprimir</span></a>
            </div>
          </section>

          <section class="map-container" id="mapa">
            <header class="bg-red">
              <h4 class="uppercase"><?php echo $titulo_do_mapa; ?></h4>
            </header>

            <?php echo $html_do_mapa; ?>

            <footer class="text-right bg-gray map-area-de-atuacao">
              <ul class="inline unstyled">
                <li>
                  <div class="agua-map-icon"></div>
                  <span>Água e esgoto</span>
                </li>
                <li>
                  <div class="residuos-map-icon"></div>
                  <span>Resíduos</span>
                </li>
                <li>
                  <div class="utilities-map-icon"></div>
                  <span>Utilities</span>
                </li>
              </ul>
            </footer>
          </section>

          <div class="row-fluid" id="areas">
            <section class="span4">
              <?php
                $page = $aguaEsgotoPage;
                $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
              ?>
              <a href="<?php echo get_site_url(); ?>/areas-de-atuacao/<?php echo $page->post_name ?>">
                <header class="bg-atuacao bg-agua-esgoto">
                  <h4 class="uppercase">
                    <span>Água e esgoto (foz)</span>
                  </h4>
                </header>
                <?php if($src[0] != ""): ?>
                  <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=310&h=217&a=c'; ?>
                  <img src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/feature-no-item-image.png" alt="<?php echo $page->post_title; ?>">
                <?php endif; ?>
                <footer class="desc-content">
                  <div>
                    <?php echo get_field('descricao_reduzida', $page->ID); ?>
                  </div>
                </footer>
              </a>
            </section>


            <section class="span4">
              <?php
                $page = $utilitiesPage;
                $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
              ?>
              <a href="<?php echo get_site_url(); ?>/areas-de-atuacao/<?php echo $page->post_name ?>">
                <header class="bg-atuacao bg-utilities">
                  <h4 class="uppercase">
                    <span>Utilities</span>
                  </h4>
                </header>
                <?php if($src[0] != ""): ?>
                  <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=310&h=217&a=c'; ?>
                  <img src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/feature-no-item-image.png" alt="<?php echo $page->post_title; ?>">
                <?php endif; ?>
                <footer class="desc-content">
                  <div>
                    <?php echo get_field('descricao_reduzida', $page->ID); ?>
                  </div>
                </footer>
              </a>
            </section>
            
            <section class="span4">
              <?php
                $page = $residuosPage;
                $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
              ?>
              <a href="<?php echo get_site_url(); ?>/areas-de-atuacao/<?php echo $page->post_name ?>">
                <header class="bg-atuacao bg-residuos">
                  <h4 class="uppercase">
                    <span>Resíduos</span>
                  </h4>
                </header>
                <?php if($src[0] != ""): ?>
                  <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=310&h=217&a=c'; ?>
                  <img src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/images/feature-no-item-image.png" alt="<?php echo $page->post_title; ?>">
                <?php endif; ?>
                <footer class="desc-content">
                  <div>
                    <?php echo get_field('descricao_reduzida', $page->ID); ?>
                  </div>
                </footer>
              </a>
            </section>
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