<?php get_header(); ?>
<?php loadJS('js/share-script');?>

<div id="content" class="clearfix row-fluid quem-somos blogs">
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
              <?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true, 'slug' => 'imprensa' ) );?>
   
              <?php foreach ( $menus as $menu ):?>
             
              <?php wp_nav_menu(array('menu' => $menu, 'menu_class' => 'unstyled', 'container' => 'list-menu'));?>
           
              <?php endforeach; ?>
            </div>
          </div>

          <!-- conteúdo da pagina -->
          <div class=" span8">
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
            
            <!-- Conteúdo principal -->
            <?php  
                $args = array('post_type' => 'oanaimprensa',  'showposts' => -1); 
            ?>
            <div class="main-content">
               <?php $imprensa = new WP_Query( $args ); ?>
                <?php if($imprensa->have_posts() ) : ?> 
                  <ul class="unstyled">
                    <?php while ( $imprensa->have_posts() ) : $imprensa->the_post(); ?>
                      <li class="artigo">
                        <div class="row-fluid">
                          <?php 
                            $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                            $postImage = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=157&h=118&zc=0'; 
                          ?>
                          <?php if($src[0] != ""): ?>
                          <div class="span3 imagem">
                            <?php  $post_thumbnail_id = get_post_thumbnail_id( $post_id ); ?> 
                            <?php if ( $post_thumbnail_id > 0 ) : ?>
                                <?php the_post_thumbnail( 'blog-list-thumb' ); ?>
                            <?php endif; ?>
                          </div>
                          <div class="span9 post-content">
                            <div class="data"><?php the_time('d/m/Y') ?></div>  
                            <a href="<?php echo get_post_permalink(); ?>" class="title-post"><?php the_title(); ?></a>
                            <div class="texto"><?php the_excerpt(); ?><br></div>
                          </div>
                          <?php else : ?>
                            <div class="span12 post-content">
                              <div class="data"><?php the_time('d/m/Y') ?></div>  
                              <a href="<?php echo get_post_permalink(); ?>" class="title-post"><?php the_title(); ?></a>
                              <div class="texto"><?php the_excerpt(); ?><br></div>
                            </div>
                          <?php endif; ?>
                        </div>
                      </li>
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