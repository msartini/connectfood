<?php
/*
Template Name: Pesquisa
*/
?><?php get_header(); ?>
		<?php global $wp_query; $total_results = $wp_query->found_posts; ?> 
			<div id="content" class="clearfix row-fluid search">
				<div id="main" class="clearfix" role="main">
		      <article>
  		      <header>
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
            </header> <!-- end article header -->


            <div class="row-fluid">
              <?php $imageDestaque = wp_get_attachment_image_src(get_field('fiquepordentro_imagem_do_tema', $pageBuscaId), 'full'); ?>
              <div class="span4">
                <div class="side-menu">
                  <?php  if (count($imageDestaque)): ?>
                    <div class="imagem">
                      <img src="<?php echo get_bloginfo('template_directory') . '/timthumb.php?src=' . $imageDestaque[0] . '&w=310&h=375&zc=0'; ?>" alt="<?php echo the_title(); ?>" />
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="span8">
                <!-- Breadcrumb -->
                <ul class="breadcrumb"><!-- Breadcrumb NavXT 4.1.0 -->
                  <li class="active">
                    <a title="Resultados de busca." href="http://localhost/foz-odebrecht">RESULTADOS DE BUSCA</a>
                  </li>
                </ul>

                <h3><span><?php _e("Found","bonestheme"); ?><?php echo $total_results; ?> <?php _e("Results for","bonestheme"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h3>

                <style>
                      .date-search {float: left; }
                      .date-search .data{width: 48px; height: 100%}
                      .date-search span.mes {width: 100%; font-size: 23px; text-align: center; letter-spacing: 2px;}
                      .date-search span.dia {width: 100%;float: left;font-size: 40px;margin-left: 0px; text-align: center; letter-spacing: 4px;}
                      .date-search span.ano {float: left; font-size: 22px; width: 100%;}

                </style>
                <?php if (have_posts()) : ?>
              
                <?php while (have_posts()) : the_post(); ?>
              
                  <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                
                    <header class="content-search">
                      <?php 
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $postImage = get_bloginfo('template_directory') . '/timthumb.php?src='. $src[0] . '&w=157&h=118&zc=0'; 
                      ?>
                      <?php if($src[0] != ""): ?>
                        <div class="span4"><img src="<?php echo $postImage; ?>" alt="<?php the_title();?>"></div>
                        <div class="span8">
                          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                          <section class="post_content">
                            <?php the_excerpt('<span class="read-more">' . __("Read more on","bonestheme") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
                          </section> <!-- end article section -->
                      </div>
                      <?php else : ?>
                        <span class="hide"><?php the_title();?></span>
                        <div>
                          <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                          <section class="post_content">
                            <?php the_excerpt('<span class="read-more">' . __("Read more on","bonestheme") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
                          </section> <!-- end article section -->
                      </div> 
                      <?php endif; ?>
                      
                        <!--<div class="date-search">
                          <div class="data">
                            <span class="mes" ><?php echo strtoupper(get_short_mes( get_the_time('m'))); ?></span>
                            <span class="dia"><?php echo the_time('d'); ?></span>
                            <span class="ano"><?php echo the_time('Y'); ?></span>
                        </div>
                      </div> -->
                      
                    </header> <!-- end article header -->
                    
                    <footer></footer> <!-- end article footer -->
                  </article> <!-- end article -->
                <?php endwhile; ?>  
                <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
                  <?php page_navi(); // use the page navi function ?>
                    <?php } else { // if it is disabled, display regular wp prev & next links ?>
                      <nav class="wp-prev-next">
                        <ul class="clearfix">
                          <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
                          <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
                        </ul>
                      </nav>
                  <?php } ?>      
                <?php else : ?>
          
          <!-- this area shows up if there are no results -->
          
          <article id="post-not-found">
              <header>
                <h1><?php _e("Not Found", "bonestheme"); ?></h1>
              </header>
              <section class="post_content">
                <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
              </section>
              <footer>
              </footer>
          </article>
          
          <?php endif; ?>
              </div>
            </div>
              

    					
			
				</div> <!-- end #main -->
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>
