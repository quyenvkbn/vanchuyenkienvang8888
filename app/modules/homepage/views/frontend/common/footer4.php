<footer id="footer-site" class="wow fadeInUp" >

  <h2 class="title"><?php echo $this->fcSystem['homepage_company'] ?> - <?php echo $this->fcSystem['homepage_brandname'] ?> </h2>
  <p class="desc">Địa chỉ: <?php echo $this->fcSystem['contact_address'] ?></p>
  <div class="content2-footer">
    <p>Tư vấn miến phí 24/7: <?php echo $this->fcSystem['contact_phone'] ?>  </p>
    <p>Email: <?php echo $this->fcSystem['contact_email'] ?></p>
  </div>
  <div class="botom-footer">
    <h4>Tư vấn xuất khẩu lao động miễn phí trên toàn quốc</h4>
    <p><span><?php echo $this->fcSystem['contact_title'] ?></span>:<?php echo $this->fcSystem['contact_content'] ?> </p>
    <p><span><?php echo $this->fcSystem['contact_title1'] ?></span>:<?php echo $this->fcSystem['contact_content1'] ?>.</p>
  </div>
  
</footer>
</div>
</div>
</div>
<!-- div end site -->
<script type="text/javascript" src="templates/frontend/resources/js/jquery.min.js"></script>
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