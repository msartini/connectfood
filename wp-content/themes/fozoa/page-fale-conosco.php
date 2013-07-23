<?php get_header(); ?>
     
<?php loadJS('js/share-script');?>
  
<div id="content" class="clearfix row-fluid page-fale-conosco">
  <div id="main" class="clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
        <?php if ( get_field('banner_exibe_banner') == 'sim' ): ?>  
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
        <?php endif; ?>  
        <section class="post_content clearfix" itemprop="articleBody">
          <!-- menu latera  -->
          <div class="row-fluid">
            <div class="span4">
              <div class="side-menu">
                <div class="imagem">
                  <?php $image = wp_get_attachment_image_src(get_field('fale_conosco_imagem_do_tema'), 'full'); ?>
                  <img src="<?php echo $image[0]; ?>" alt="<?php echo the_title(); ?>" />
                  <span class="bg-diagonal"></span>
                </div>
              </div>
            </div>
            <div class="lateraldireito span8">
              <?php if(function_exists('bcn_display')): ?>
                <ul class="breadcrumb"><?php bcn_display(); ?></ul>
              <?php endif; ?>
              <p class="title-form">Preencha o formulário e entre em contato conosco.</p>
              <?php $the_query = new WP_Query( $args ); ?>
              <?php if($the_query->have_posts() ) : ?> 
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <?php $ids[] = get_the_ID(); ?>
                <?php endwhile; ?>
              <?php endif; ?>
              
              <?php the_content(); ?>
              <div class="mensagem">
                Caso queira enviar uma mensagem pelo seu email envie para: 
                <p><?php the_field('fale_conosco_e_mail'); ?></p>
              </div>
            </div>
          </div>
          
          <!-- menu lateral  --> 
        </section> <!-- end article section -->
        <footer>
          <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>
        </footer> <!-- end article footer -->
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
          <footer>
          </footer>
      </article>
          
    <?php endif; ?>
      
  </div> <!-- end #main -->
    
</div> <!-- end #content -->

<?php get_footer(); ?>