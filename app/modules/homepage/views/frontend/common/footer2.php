<footer id="footer-site" class="wow fadeInUp" >

  <div class="container">
    <h1 class="title-footer">CÔNG TY CỔ PHẦN KIẾN TRÚC – NỘI THẤT ĐỒNG GIA</h1>
    <div class="content-footer">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="item">
            <p>Showroom 1:<?php echo $this->fcSystem['contact_address'] ?></p>
            <p>Thời gian mở cửa: <?php echo $this->fcSystem['homepage_mocua'] ?></p>
            <p><?php echo $this->fcSystem['contact_them'] ?></p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="item">
            <p>Điện thoại :<?php echo $this->fcSystem['contact_phone'] ?> </p>
            <p>Hotline : <?php echo $this->fcSystem['contact_hotline'] ?></p>
            <p>Email : <?php echo $this->fcSystem['contact_email'] ?></p>
            <p>Website: <?php echo $this->fcSystem['contact_web'] ?></p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="item">


            <ul class="list-footer">
              <?php $footer_nav = navigations_array('footer', $this->fc_lang); ?>
              <?php if(isset($footer_nav) && is_array($footer_nav) && count($footer_nav)) {?>
                <?php foreach ($footer_nav as $key=>$val): ?>
                  <li><a href="<?php echo $val['href']?>"><?php echo $val['title'] ?></a></li>
                <?php endforeach ?>
              <?php } ?>

            </ul>


            <h4 class="title">KẾT NỐI VỚI CHÚNG TÔI</h4>
            <div class="social-footer">
             <ul>
               <li><a href="<?php echo $this->fcSystem['social_facebook'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
               <li><a href="<?php echo $this->fcSystem['social_youtube'] ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
               <li><a href="<?php echo $this->fcSystem['social_google'] ?>" target="_blank"><i class="fab fa-google"></i></a></li>
               <li><a href="<?php echo $this->fcSystem['social_twitter'] ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>

 </div>
 <div class="copy-right">
   <div class="container">
    <div class="wp-copy">
     Bản quyền thuộc về <?php echo $this->fcSystem['homepage_banquyen'] ?> Thiết kế website bởi <a href="https://tamphat.edu.vn/" target="_blank"
     >Tâm Phát</a>
   </div>
 </div>
</div>

</footer>
<div id="btn-top">
 <img src="templates/frontend/resources/images/top.png" alt="">
</div>
<script type="text/javascript" src="templates/frontend/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/wow.min.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/owl.carousel.min.js"></script>

<script src="templates/frontend/resources/js/hc-offcanvas-nav.js?ver=3.3.0"></script>
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