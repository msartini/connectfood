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
        </section> <!-- end article section -->
        
        <!-- Conteúdo principal -->
        <div class="main-content">
          <div class="na-empresa-list">
            <?php the_content(); ?>    
          </div>
        </div>
      
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