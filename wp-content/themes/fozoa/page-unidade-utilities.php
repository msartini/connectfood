<?php get_header(); ?>
<?php //variaveis ?>
<?php $unidade = ""; ?>
<?php $unidade = $_GET['unidade']; ?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<div id="content" class="clearfix row-fluid">
  <div id="main" class="clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <header>
          <?php
            $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
            $src_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=1313&h=226&zc=0';
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
          <div class="span4">
            <div class="side-menu">
              <div class="list-menu">
                <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true, 'slug' => 'utilities' ) );?>

                <?php foreach ( $menus as $menu ):?>

                <?php wp_nav_menu(array('menu' => $menu, 'menu_class' => 'unstyled', 'container' => 'list-menu'));?>

                <?php endforeach; ?>
              </div>
            </div>
            <!-- Google Maps -->
            <?php $titulo_do_mapa = get_post_meta($post->ID, 'titulo_do_mapa', true); ?>
            <?php $descricao_do_mapa = get_post_meta($post->ID, 'descricao_mapa', true); ?>
            <?php $html_do_mapa = get_post_meta($post->ID, 'html_do_mapa', true); ?>

            <?php if($html_do_mapa): ?>
              <section class="span12 map-container" id="mapa">
                <header>
                  <?php if($titulo_do_mapa): ?>
                    <h4 class="uppercase"><?php echo $titulo_do_mapa; ?></h4>
                  <?php endif; ?>
                  <?php if($descricao_do_mapa): ?>
                    <p><?php echo $descricao_do_mapa; ?></p>
                  <?php endif; ?>
                </header>
                <?php echo $html_do_mapa; ?>
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
            <?php endif; ?>
          </div>
          <!-- menu latera  -->

            <!-- Google Maps -->

          <?php
                      $args = array('post_type' => 'unidades', 'name' => $unidade, 'tax_query' => array(
                      array('taxonomy' => 'segmentos_category', 'field' => 'slug','terms' => 'utilities')), 'showposts' => 1);
          ?>

          <?php $ids = array(); ?>

          <div class="span8 unidade-agua-esgoto">
            <?php if(function_exists('bcn_display')): ?>
              <ul class="breadcrumb"><?php bcn_display(); ?></ul>
            <?php endif; ?>
            <?php $the_query = new WP_Query( $args ); ?>
            <?php if($the_query->have_posts() ) : ?>
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php $ids[] = get_the_ID(); ?>
                <section class="share-container">
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
                <div class="row box-image">
                  <div class="clearfix img-residuos">
                    <img src="<?php echo get_bloginfo('template_url'); ?>/images/img-utilities.png">
                  </div>
                </div>
                <?php $unidade_descricao = get_post_meta($post->ID, 'unidade_descricao', true); ?>
                <h3 class="text-red"><?php the_title(); ?> <?php echo $unidade_descricao; ?></h3>
                <?php $codigo_da_galeria = get_post_meta($post->ID, 'codigo_da_galeria', true); ?>
                <?php if ( $codigo_da_galeria > 0) : ?>
                <div class="blue">
                  <?php do_action('slideshow_deploy', $codigo_da_galeria); ?>
                </div>
                <?php endif; ?>
                <div class="main-content">
                  <div class="title">
                   <!--  <a href="<?php the_permalink(); ?>"><?php //echo get_the_title(); ?></a> -->
                  </div>
                  <div class="main-content">
                    <p>
                     <?php the_content(); ?>
                    </p>
                  </div>
                  <div class="content-submenu">
                    <div class="row-fluid">
                      <div class="span3">
                        <h3 class="text-red"><?php echo substr(get_post_meta($post->ID, 'titulo_do_campo_descritivo_da_unidade', true), 0,16); ?></h3>
                      </div>
                      <div class="span9 title-bg-diagonal">
                        <span class="bg-diagonal"></span>
                      </div>
                    </div>

                    <div class="image">
                      <!-- ZOMM DE IMAGEM -->
                      <?php  //$src = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>
                      <?php  //$src = get_bloginfo('template_directory') . '/timthumb.php?src='. $src . '&w=600&h=224&&zc=1';  ?>
                      <!-- <img src="<?php echo $src; ?>" alt=""> -->
                    </div>

                  </div>
                   <div class="content-inner-bottom">
                      <h3 class="text-gray"><?php the_title(); ?></h3>
                      <div class="row-fluid">
                        <div class="span12 left-text">
                          <section>
                            <?php $unidade_detalhamento = get_post_meta($post->ID, 'unidade_detalhamento', true); ?>
                            <p class="text-gray"><?php echo nl2br($unidade_detalhamento); ?></p>
                          </section>

                        </div>

                      </div>


                      

                      <!-- Empresas - Clientes -->
                      <?php $terms = wp_get_post_terms( $post->ID, 'empresas_category' ); ?>
                      <?php //$terms = wp_get_post_terms( $post->ID, 'segmentos_category' ); ?>
                   
                      <?php

                        $terms_param = array();
                        foreach ($terms as $item) {
                          array_push($terms_param, $item->slug);
                        }
                        
                      ?>

                      <?php
                      $args = array('post_type' => 'empresas', 'tax_query' => array(
                                      array('taxonomy' => 'empresas_category', 'field' => 'slug','terms' => $terms_param) 
                                    ), 'showposts' => -1);
                      ?>

 
                      <?php $empresas = new WP_Query( $args ); ?>
                       <?php if($empresas->have_posts() ) : ?>
                         <?php while ( $empresas->have_posts() ) : $empresas->the_post(); ?>
                              <div class="row-fluid">
                                <h3 class="text-gray"><?php the_title(); ?></h3>
                                 <?php
                                  $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                                  $src_emp_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=202&h=134&zc=0';
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
                    </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
            <?php //Bloco exibe mais duas unidades  ?>
            <?php wp_reset_query(); ?>
            <div class="maisunidades">
              <div class="row-fluid">
                <div class="span3">
                  <h3 class="text-red"><a href="<?php echo site_url(); ?>/areas-de-atuacao/utilities/unidade-utilities" class="text-red">Mais unidades</a></h3>
                                                                        
                </div>
                <div class="span12 title-bg-diagonal">
                  <span class="bg-diagonal"></span>
                </div>
                
              </div>

              <?php
                $args = array( 'post__not_in'=> $ids, 'tax_query' => array(
                array('taxonomy' => 'segmentos_category', 'field' => 'slug','terms' => 'utilities')), 'showposts' => 2);
              ?>
              <?php $recno = 0; ?>
              <?php $the_query = new WP_Query( $args ); ?>
              <?php if($the_query->have_posts() ) : ?>
                <ul class="size-ul-unidades">
                  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <?php if ($recno == 0) : ?>
                    <?php $class = "pull-left"; ?>
                  <?php else : ?>
                    <?php $class = "pull-right"; ?>
                  <?php endif; ?>
                  <li class="span6 <?php echo $class;?>">
                    <a href="<?php echo site_url(); ?>/areas-de-atuacao/utilities/unidade-utilities/?unidade=<?php echo $post->post_name; ?>">
                      <?php the_title(); ?>
                      <?php  $src = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>
                      <?php  $src = get_bloginfo('template_directory') . '/timthumb.php?src='. $src . '&w=317&h=180&&zc=1';  ?>
                      <img src="<?php echo $src; ?>" alt="">
                    </a>  
                  </li>
                  <?php $recno++; ?>
                  <?php endwhile; ?>
                </ul>
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