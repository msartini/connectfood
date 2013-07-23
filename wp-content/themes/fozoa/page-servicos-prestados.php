<?php?>
<?php get_header(); ?>

<?php loadJS('js/share-script');?>

<!-- Google Maps -->
<?php $titulo_do_mapa = get_post_meta($post->ID, 'titulo_do_mapa', true); ?> 
<?php $descricao_do_mapa = get_post_meta($post->ID, 'descricao_mapa', true); ?> 
<?php $html_do_mapa = get_post_meta($post->ID, 'html_do_mapa', true); ?>  
  
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
          <div class="side-menu span4">
            <div class="list-menu"> 
              <?php $menu = get_menu($post->post_name); ?>
              <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true, 'slug' => $menu ) );?>   
              <?php foreach ( $menus as $menu ):?>
                <?php wp_nav_menu(array('menu' => $menu, 'menu_class' => 'unstyled', 'container' => 'list-menu'));?>
              <?php endforeach; ?>
            </div>
            
            <?php if ( $titulo_do_mapa != '') : ?>
              <section class="map-container" id="mapa">
                <header>
                  <h2 class="uppercase"><?php echo $titulo_do_mapa; ?></h2>
                  <p><?php echo $descricao_do_mapa; ?></p>
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
            
            <div class="row box-image">
              <div class="clearfix img-residuos">
                <img src="<?php echo get_bloginfo('template_url'); ?>/images/img-residuos.png">
              </div>
            </div>
            
            <!-- Galeria  -->
            <?php $codigo_da_galeria = get_post_meta($post->ID, 'codigo_da_galeria', true); ?>  
            <?php if ( $codigo_da_galeria > 0) : ?>
              <?php do_action('slideshow_deploy', $codigo_da_galeria); ?> 
            <?php endif; ?>
            
            <!-- Conteúdo principal -->
            <div class="pagecontent">
              <?php the_content(); ?>
               <!-- Ancora da pagina -->
              <?php $post_name = $post->post_name; ?>
              <?php //Verifica se tem ancoras a serem carregadas ?>
              <?php include(TEMPLATEPATH . '/includes/page-ancoras.php'); ?>
               
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
                      
                      <?php 
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $src_emp_banner = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=210&h=82&zc=0'; 
                      ?>

                      <div class="span4 sub-content-img">
                        <div class="image-unidade">
                          <img src="<?php echo $src_emp_banner; ?>" alt="<?php the_title(); ?>">
                        </div>
                      </div>
                      <div class="span8 sub-content">
                        <h3 class="text-gray"><?php the_title(); ?></h3>
                      </div>
                      <div class="row-fluid">
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