<footer class="nb-footer">
    <div class="container-fluid">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="about">
        	<img src="dist/images/logo/cropped-g4353.png" class="img-responsive center-block" alt="">
        	<p>
            Primeiro passo é compreender o real objetivo e problemas enfretados pelo seu negócio. Após um estudo de caso, iremos propor soluções que irão auxiliar ao seu negócio.
          </p>
        	<div class="social-media">
        		<ul class="list-inline">
        			<li>
                <a href="#" title="">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
        			<li>
                <a href="#" title="">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
        			<li>
                <a href="#" title="">
                  <i class="fa fa-google-plus"></i>
                </a>
              </li>
        			<li>
                <a href="#" title="">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
        		</ul>
        	</div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="footer-info-single">
        	<h2 class="title">
            Saiba mais
          </h2>
        	<ul class="list-unstyled">
            <?php
              foreach($pages as $page) {
            ?>
            <li>
              <a href="<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'view', $page['slug']]); ?>">
                <?php echo $page['title']; ?>
              </a>
            </li>
            <?php } ?>
        	</ul>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-info-single">
          	<h2 class="title">
                Fênix - Soluções em TI e Assessoria Contábil
            </h2>
          	<p>
              A solução em TI e Contabilidade para a sua empresa.
            </p>
          </div>
        </div>
      </div>
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <p class="text-center">
                    Copyright © 2018. Fênix - Soluções em TI e Assessoria Contábil - Todos os direitos reservados.
                    </p>
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </section>
</footer>