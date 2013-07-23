<?php //Ancoras ?>

<?php //Monta accordion com itens cadastrados em Âncora ?>
    <?php 
          $args = array(
                'post_type' => 'ancoras', 
                'posts_per_page' => -1,  
                'orderby' => 'title', 
                'order' => 'ASC',

                'tax_query' => array(
                    array(
                        'taxonomy' => 'ancoras_category',
                        'field' => 'slug',
                        'terms' => $post_name 
                    )
                )
           );
     ?>
     
   <?php $ancoras = new WP_Query( $args ); ?>
    <?php if($ancoras->have_posts() ) : ?> 
         <?php $linha = 1; ?>
         <div class="accordion" id="accordion2">
          <?php while ( $ancoras->have_posts() ) : $ancoras->the_post(); ?>
                <div class="accordion-group">
                      <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo $linha;?>">
                         <?php the_title(); ?>
                        </a>
                      </div>
                      <div id="collapse-<?php echo $linha;?>" class="accordion-body collapse <?php echo ($linha==1)?'in':'';?>">
                        <div class="accordion-inner">
                          <?php the_content(); ?>
                        </div>
                      </div>
                </div>
                <?php $linha++; ?>
          <?php endwhile; ?>
        </div>
<?php endif; ?>
