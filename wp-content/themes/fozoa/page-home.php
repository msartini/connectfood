<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<!-- Google Maps -->
<?php $mapTitle       = get_post_meta($post->ID, 'titulo_do_mapa', true); ?>
<?php $mapDescription = get_post_meta($post->ID, 'descricao_mapa', true); ?>
<?php $mapHTML        = get_post_meta($post->ID, 'html_do_mapa', true); ?>

<!-- Páginas de destaque -->
<?php $fiquePorDentroPage = get_page (get_ID_by_page_name('fique-por-dentro'));      ?>
<?php $naEmpresaPage      = get_page (get_ID_by_page_name('na-empresa'));            ?>
<?php $areasDeAtuacaoPage = get_page (get_ID_by_page_name('areas-de-atuacao'));      ?>
<?php $aguaEsgotoPage     = get_page (get_ID_by_page_name('agua-e-esgoto'));         ?>
<?php $residuosPage       = get_page (get_ID_by_page_name('residuos'));              ?>
<?php $utilitiesPage      = get_page (get_ID_by_page_name('utilities'));             ?>
<?php $imprensaPage       = get_page (get_ID_by_page_name('imprensa'));              ?>
<?php $faleConoscoPage    = get_page (get_ID_by_page_name('fale-conosco'));          ?>

<div id="content" class="clearfix" role="main">
  <div id="main" class="clearfix" role="main">
    <div class="row-fluid">
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <header>
          <h1 class="hide"><?php the_title();?></h1>
        </header>
        <div class="row-fluid">
          <!-- Slideshow -->
          <section class="span8" id="slideshow">
            <?php $slideshowId = get_post_meta($post->ID, 'codigo_da_galeria', true); ?>
            <?php if ( $slideshowId > 0) : ?>
              <?php do_action('slideshow_deploy', $slideshowId); ?>
            <?php endif; ?>
          </section>

          <section class="span4 map-container" id="mapa">
            <header>
              <h2 class="uppercase"><?php echo $mapTitle; ?></h2>
              <p><?php echo $mapDescription; ?></p>
            </header>

            <?php echo $mapHTML; ?>

            <footer>
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
        </div>

        <!--  Destaques -->
        <div class="row-fluid">
          <!-- Fique por dentro -->
          <section class="span4 section-feature" id="fique-por-dentro">
            <header>
              <h2>
                <?php
                  $page = $fiquePorDentroPage;
                  $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                ?>

                <span><?php echo $page->post_title; ?></span>

                <a href="<?php echo site_url() . '/' . $page->post_name ?>" title="<?php echo $page->post_title; ?>">
                  <?php if($src[0] != ""): ?>
                    <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=310&h=140&a=c'; ?>
                    <img src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/feature-no-main-image.png" alt="No main image">
                  <?php endif; ?>
                </a>
              </h2>
            </header>
            <article>

              <?php
                $args = array('post_type' => 'fiquepordentro',  'showposts' => 3);
                $fique = new WP_Query( $args );
              ?>

              <?php if($fique->have_posts() ) : ?>
                <ul class="unstyled">
                  <?php while ( $fique->have_posts() ) : $fique->the_post(); ?>
                    <?php $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );  ?>
                    <li>
                      <a href="<?php echo site_url() . '/' . $post->post_name ?>" title="<?php the_title(); ?>">
                        <?php if($src[0] != ""): ?>
                          <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=88&h=65&a=c'; ?>
                          <img class="pull-left" src="<?php echo $src_banner; ?>" alt="<?php the_title(); ?>">
                          <p><?php echo short_text(' ...', get_the_title(), 9); ?></p>
                        <?php else : ?>
                          <p><?php echo short_text(' ...', get_the_title(), 9); ?></p>
                        <?php endif; ?>
                      </a>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?> 
              
            </article>
            <footer class="span12">
              <a class="pull-right" href="<?php echo site_url() ?>/fique-por-dentro" title="Mais noticias">Mais notícias</a>
            </footer>
          </section>

          <!-- Áreas de atuação -->
          <section class="span4 section-feature" id="areas-de-atuacao">
            <header>
              <h2>
                <?php 
                  $page = $areasDeAtuacaoPage;
                  $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                ?>

                <span><?php echo $page->post_title; ?></span>

                <a href="<?php echo site_url() . '/' . $page->post_name ?>" title="<?php echo $page->post_title; ?>">
                  <?php if($src[0] != ""): ?>
                    <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=310&h=140&a=c'; ?>
                    <img src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/feature-no-main-image.png" alt="No main image">
                  <?php endif; ?>
                </a>
              </h2>
            </header>
            <article>
              <ul class="unstyled">
                <li>
                  <a href="<?php echo site_url(); ?>/agua-e-esgoto" title="Água e esgoto">
                    <?php
                      $page = $aguaEsgotoPage;
                      $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                    ?>

                    <?php if($src[0] != ""): ?>
                      <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=88&h=65&a=c'; ?>
                      <img class="pull-left" src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                      <p>
                       <?php echo $page->post_title; ?><br />
                       <?php echo short_text(' ...', get_field('descricao_reduzida', $page->ID), 7); ?>
                      </p>
                    <?php else : ?>
                      <p>
                       <?php echo $page->post_title; ?><br />
                       <?php echo short_text(' ...', get_field('descricao_reduzida', $page->ID), 7); ?>
                    </p>
                    <?php endif; ?>
                  </a>
                </li>
                <li>
                  <a href="<?php echo site_url(); ?>/utilities" title="Utilities">
                    <?php
                      $page = $utilitiesPage;
                      $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                    ?>
                    <?php if($src[0] != ""): ?>
                      <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=88&h=65&a=c'; ?>
                      <img class="pull-left" src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                      <p>
                       <?php echo $page->post_title; ?><br />
                       <?php echo short_text(' ...', get_field('descricao_reduzida', $page->ID), 7); ?>
                      </p>
                    <?php else : ?>
                      <p>
                       <?php echo $page->post_title; ?><br />
                       <?php echo short_text(' ...', get_field('descricao_reduzida', $page->ID), 7); ?>
                      </p>
                    <?php endif; ?>
                  </a>
                </li>
                <li>
                  <a href="<?php echo site_url(); ?>/residuos" title="Resíduos">
                    <?php
                      $page = $residuosPage;
                      $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                    ?>

                    <?php if($src[0] != ""): ?>
                      <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=88&h=65&a=c'; ?>
                      <img class="pull-left" src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                      <p>
                       <?php echo $page->post_title; ?><br />
                       <?php echo short_text(' ...', get_field('descricao_reduzida', $page->ID), 7); ?>
                      </p>
                    <?php else : ?>
                      <p>
                       <?php echo $page->post_title; ?><br />
                       <?php echo short_text(' ...', get_field('descricao_reduzida', $page->ID), 7); ?>
                      </p>
                    <?php endif; ?>
                  </a>
                </li>
              </ul>
            </article>
          </section>

          <!-- Na empresa -->
          <section class="span4 section-feature" id="na-empresa">
            <header>
              <h2>
                <?php
                  $page = $naEmpresaPage;
                  $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
                ?>

                <span><?php echo $page->post_title; ?></span>

                <a href="<?php echo site_url() . '/' . $page->post_name ?>" title="<?php echo $page->post_title; ?>">
                  <?php if($src[0] != ""): ?>
                    <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=310&h=140&a=c'; ?>
                    <img src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/feature-no-main-image.png" alt="No main image">
                  <?php endif; ?>
                </a>
              </h2>
            </header>
            <article class="na-empresa-list">
              <?php echo $naEmpresaPage->post_content; ?>
            </article>
          </section>
        </div>

        <section class="contato-info row-fluid">
          <article class="span6 clearfix">
            <?php
              $page = $imprensaPage;
              $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
            ?>
            <a href="<?php echo site_url() . '/' . 'imprensa/contato-da-assessoria/' ?>" title="<?php echo $page->post_title; ?>">
              <?php if($src[0] != ""): ?>
                <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=225&h=117&a=c'; ?>
                <img class="pull-left" src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/imprensa.png" alt="<?php echo $page->post_title;?>" class="pull-left">
              <?php endif; ?>

              <div>
                <h2><?php echo $page->post_title;?></h2>
                <p>Veja as últimas notícias da Odebrecht Ambiental</p>
              </div>
            </a>
          </article>

          <article class="span6 clearfix">
            <?php
              $page = $faleConoscoPage;
              $src  = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
            ?>
            <a href="<?php echo site_url() . '/' . $page->post_name ?>" title="<?php echo $page->post_title; ?>">
              <?php if($src[0] != ""): ?>
                <?php $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=225&h=117&a=c'; ?>
                <img class="pull-left" src="<?php echo $src_banner; ?>" alt="<?php echo $page->post_title; ?>">
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/fale-conosco.png" alt="<?php echo $faleConoscoPage->post_title;?>" class="pull-left">
              <?php endif; ?>

              <div>
                <h2><?php echo $page->post_title;?></h2>
                <p>Entre em contato com a Odebrecht Ambiental</p>
              </div>
            </a>
          </article>
        </section>

      </article> <!-- end article -->
    </div>
  </div> <!-- end #main -->
</div> <!-- end #content -->

<?php get_footer(); ?>