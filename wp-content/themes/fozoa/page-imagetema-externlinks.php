<?php
/*
Template Name: Imagem Tema Links Thumb Footer
*/
?>
<?php get_header(); ?>

<?php loadJS('js/share-script');?>



<div id="content" class="clearfix row-fluid page-imagetema-externlinks">
  <div id="main" class="clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <!--<header>
          <?php //recupera a imagem destacada , banner da pagina de busca ?>
          <?php $pageBuscaId = get_ID_by_page_name('busca'); ?>
          <?php $pageBusca = get_page( $pageBuscaId); ?>
          <?php $pageThumbnailId = get_post_thumbnail_id( $pageBuscaId ); ?>

          <?php  $src = wp_get_attachment_image_src( $pageThumbnailId, 'full' );
            $pageBuscaImage = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=1313&h=207&zc=0';
          ?>

          <h1 class="header-banner">
            <?php if($src[0] != ""): ?>
              <img src="<?php echo $pageBuscaImage; ?>" alt="<?php echo $pageBusca->post_title;?>">
            <?php else : ?>
              <span class="hide"><?php echo $pageBusca->post_title;?></span>
            <?php endif; ?>
          </h1>
        </header> 
      -->
        <!-- end article header -->

        <section class="post_content clearfix" itemprop="articleBody">

          <div class="span4">
            <div class="side-menu">
              <div class="imagem">
                <?php $image = wp_get_attachment_image_src(get_field('fiquepordentro_imagem_do_tema'), 'full'); ?>
                <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title(); ?>" />
              </div>
            </div>
          </div>

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
                <div class="print-icon"></div><span>imprimir</span>
              </div>
            </section>

            <!-- Galeria  -->
            <?php $codigo_da_galeria = get_post_meta($post->ID, 'codigo_da_galeria', true); ?>
            <?php if ( $codigo_da_galeria > 0) : ?>
              <?php do_action('slideshow_deploy', $codigo_da_galeria); ?>
            <?php endif; ?>

            <?php //Verifica se tem ancoras a serem carregadas ?>
            <?php include(TEMPLATEPATH . '/includes/page-ancoras.php'); ?>


            <!-- Conteúdo principal -->
            <div class="pagecontent">

              <?php the_content(); ?>

              <!--
              <div class="row-fluid">
               <div class="span6">
                  <div>
                    <?php $carreira_titulo = get_field('carreiras_titulo'); ?>
                    <?php $carreira_link = get_field('carreiras_link'); ?>
                    <div class="titulo"><a href="<?php echo $carreira_link; ?>"><?php echo $carreira_titulo; ?></a></div>
                  </div>
                </div>

                <div class="span6">
                  <div>
                    <?php $vaga_titulo = get_field('vagas_titulo'); ?>
                    <?php $vaga_link = get_field('vagas_link'); ?>
                    <div class="titulo"> <a href="<?php echo $vaga_link; ?>"><?php echo $vaga_titulo; ?></a></div>
                  </div>
                </div>
              </div>
              -->
                <!-- Segmentos de Atuacao -->
              <?php if ( $post->post_name == "segmentos-de-atuacao") : ?>

                <!-- Empresas - Clientes -->
                <?php
                  $args = array('post_type' => 'empresas', 'tax_query' => array(
                  array('taxonomy' => 'segmentos_category', 'field' => 'slug','terms' => 'residuos')), 'showposts' => -1);
                ?>
                <?php $empresas = new WP_Query( $args ); ?>
                <?php if($empresas->have_posts() ) : ?>
                  <?php while ( $empresas->have_posts() ) : $empresas->the_post(); ?>
                    <div class="row-fluid">
                      <h3 class="text-gray"><?php the_title(); ?></h3>
                      <?php
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $src_emp_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=210&h=82&zc=0';
                      ?>

                      <div class="span4 sub-content-img">
                        <div class="image-unidade">
                          <img src="<?php echo $src_emp_banner; ?>" alt="<?php the_title(); ?>">
                        </div>
                      </div>
                      <div class="span8 sub-content-right">
                        <p class="text-gray"><?php the_content(); ?></p>
                      </div>
                    </div>

                  <?php endwhile; ?>
                <?php endif; ?>
              <?php endif; ?>
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