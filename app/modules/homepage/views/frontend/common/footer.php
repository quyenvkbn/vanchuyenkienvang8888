
     <footer id="footer-site" class="wow fadeInUp" >
     <div class="footer-1">
        <div class="container">
           <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="wp-ft">
                    <h3 class="h3-title-ft">Thông tin liên hệ</h3>
                    <div class="div-list-ft">
                       <p class="p-diachi"><?= $this->fcSystem['homepage_kiki'] ?></p>
                       <p class="p-diachi1"><?= $this->fcSystem['homepage_kiki1'] ?></p>
                       <p class="p-sdt"><?= $this->fcSystem['homepage_kiki2'] ?></p>
                       <p class="p-web"><?= $this->fcSystem['homepage_kiki3'] ?></p>
                       <p class="p-mail"><?= $this->fcSystem['homepage_kiki4'] ?></p>
                    </div>
                 </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="wp-ft">
                    <h3 class="h3-title-ft">Hướng dẫn mua hàng</h3>
                    <ul class="ul-b list-ft">
                      <?php $footer_nav = navigations_array('footer', $this->fc_lang);?>
                      <?php if(isset($footer_nav) && is_array($footer_nav) && count($footer_nav)): ?>
                        <?php foreach ($footer_nav as $key => $val): ?>
                          <li><a href="<?= $val['href']; ?>"><?= $val['title']; ?></a></li>
                        <?php endforeach ?>
                      <?php endif; ?>
                    </ul>
                 </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="wp-ft">
                    <h3 class="h3-title-ft">Liên kết hữu ích</h3>
                    <ul class="ul-b list-ft">
                      <?php $footer1_nav = navigations_array('footer1', $this->fc_lang);?>
                      <?php if(isset($footer1_nav) && is_array($footer1_nav) && count($footer1_nav)): ?>
                        <?php foreach ($footer1_nav as $key => $val): ?>
                          <li><a href="<?= $val['href']; ?>"><?= $val['title']; ?></a></li>
                        <?php endforeach ?>
                      <?php endif; ?>
                    </ul>
                 </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="wp-ft">
                    <h3 class="h3-title-ft">Fanpage Facebook</h3>
                    <div class="nav-fb">
                      <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->fcSystem['social_facebook'] ?>%2Ffacebook&tabs=timeline&width=300&height=204&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=343876996017079" width="300" height="204" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                       
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
  </footer>
  <div class="quick-alo-phone quick-alo-green quick-alo-show" id="quick-alo-phoneIcon">
    <?php $tel = str_replace('.', '', str_replace(' ', '', $this->fcSystem['homepage_telcall'])); ?>
   <div class="tel_phone">
      <a href="tel:<?= $tel ?>"><?= $this->fcSystem['homepage_telcall'] ?></a>
   </div>
   <a href="tel:<?= $tel ?>">
      <div class="quick-alo-ph-circle"></div>
      <div class="quick-alo-ph-circle-fill"></div>
      <div class="quick-alo-ph-img-circle"></div>
   </a>
</div>
<div class="backtotop" style="display: block;"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
  </div>
  <!-- div end site -->
  <script type="text/javascript" src="templates/frontend/resources/js/jquery.min.js"></script>
 
  <script type="text/javascript" src="templates/frontend/resources/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="templates/frontend/resources/js/wow.min.js"></script>
  <script type="text/javascript" src="templates/frontend/resources/js/owl.carousel.min.js"></script>

  <script src="templates/frontend/resources/js/hc-offcanvas-nav.js"></script>
  <script type="text/javascript" src="templates/frontend/resources/js/buong.js"></script>
  <script>
     //hieu ung wow------------------------------------------
     wow = new WOW(
         {
             animateClass: 'animated',
             offset: 100,
             callback: function (box) {
                 console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
             }
         }
     );
     wow.init();
        

     
     
  </script>
  <script>
    
  </script>