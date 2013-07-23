</div>
<footer role="contentinfo">

        <div id="inner-footer" class="clearfix footer">
          <div class="row-fluid line-logo">
            <img class="logo-footer" src="<?php echo site_url() ?>/wp-content/themes/fozoa/images/logo-footer.jpg"/>
          </div>
          <div class="footer-color row-fluid">
            <div class="span3"></div>
            <div class="span3 first-list">
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>">Home</a></h3>
              </div>
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/quem-somos/">Quem somos</a></h3>
                <ul class="unstyled">
                  <li><a href="<?php echo site_url() ?>/quem-somos/missao-visao-e-valores/">Missão Visão e valores</a></li>
                  <li><a href="<?php echo site_url() ?>/quem-somos/conquistas-da-empresa/">Conquistas da empresa</a></li>
                  <li><a href="<?php echo site_url() ?>/quem-somos/desenvolvimento-de-pessoas/">Desenvolvimento de pessoas</a></li>
                  <li><a href="<?php echo site_url() ?>/quem-somos/tecnologia-empresarial/">Tecnologia Empresarial Odebrecht</a></li>
                </ul>
              </div>
              <div class="footer-list">
                <h3><a href="">Últimas Notícias</a></h3>
              </div>
            </div>
            <div class="span3 second-list">
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/areas-de-atuacao/">Áreas de atuação</a></h3>
                 <ul class="unstyled">
                  <li><a href="<?php echo site_url() ?>/areas-de-atuacao/agua-e-esgoto/unidade-agua-e-esgoto/">Água e esgoto</a></li>
                  <li><a href="<?php echo site_url() ?>/areas-de-atuacao/residuos">Resíduos</a></li>
                  <li><a href="<?php echo site_url() ?>/areas-de-atuacao/utilities/">Utilities</a></li>
                </ul>
              </div>
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/sustentabilidade/">Sustentabilidade</a></h3>
                 <ul class="unstyled">
                  <li><a href="<?php echo site_url() ?>/sustentabilidade/meio-ambiente/">Meio Ambiente</a></li>
                  <li><a href="<?php echo site_url() ?>/sustentabilidade/saude-e-seguranca-do-trabalho/">Saúde e Segurança no Trabalho</a></li>
                </ul>
              </div>
            </div>
            <div class="span3">
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/imprensa/">Imprensa</a></h3>
                 <ul class="unstyled">
                  <li><a href="<?php echo site_url() ?>/imprensa/oa-na-imprensa/">OA na Imprensa</a></li>
                  <li><a href="<?php echo site_url() ?>/imprensa/contato-da-assessoria/">Contato da Assessoria</a></li>
                </ul>
              </div>
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/fale-conosco">Fale Conosco</a></h3>
              </div>
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/carreiras/">Trabalhe Conosco</a></h3>
              </div>
              <div class="footer-list">
                <h3><a href="<?php echo site_url() ?>/relacao-com-investidores/">Relação com investidores</a></h3>
              </div>
            </div>

            <div id="widget-footer" class="clearfix row-fluid">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
              <?php endif; ?>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
              <?php endif; ?>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
              <?php endif; ?>
            </div>
            <nav class="clearfix">
              <?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
            </nav>
             
            <!-- <p class="attribution">&copy; <?php bloginfo('name'); ?></p> -->
           

          </div> <!-- end #inner-footer -->
            
        </div> <!-- end #container -->
         <span class="bg-footer pull-right"></span>
        <div class="row-down-footer">
          <div class="span6 copyright-footer">
            <span class"pull-left">@2013 Odebrecht Ambiental.Todos os direitos reservados. </span>
          </div>
          <div class"span6">
            <!--<span class="pull-right follow-footer">Siga a Odebrecht Ambiental nas redes sociais
              <img src="http://localhost/foz-odebrecht/wp-content/themes/fozoa/images/follow-logo.jpg">
            </span>
          -->
          </div>
        </div>
  </footer> <!-- end footer -->
    
    
        
    <!--[if lt IE 7 ]>
        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
        <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->
    
    <?php wp_footer(); // js scripts are inserted using this function ?>

  </body>

</html>
