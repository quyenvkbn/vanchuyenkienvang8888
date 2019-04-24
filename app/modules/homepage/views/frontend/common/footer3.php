<footer id="footer">

  <section class="footer_top">
    <div class="container">
      <div class="row_pc">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="box_footer">
              <div class="box_footer_top">
                <h2><?php echo $this->lang->line('infomation_contact')?></h2>
                <p class="icon_home"><?php echo $this->fcSystem['homepage_brandname'] ?> </p>
                <p class="icon_ad"><?php echo $this->lang->line('address_customers')?>: <?php echo $this->fcSystem['contact_address'] ?></p>
                <p class="icon_phone">Hotline: <?php echo $this->fcSystem['contact_hotline'] ?></p>
                <p class="icon_email">Email: <?php echo $this->fcSystem['contact_email'] ?></p>
                <p class="icon_web">Website: <?php echo $this->fcSystem['contact_web'] ?></p>
              </div>
              <div class="box_footer_bottom">


                <h2><?php echo $this->lang->line("register-course-infomation") ?></h2>
                <form action="mailsubricre.html" method="post" id="sform">
                  <div class="error uk-alert"></div>

                  <div class="fron_input">
                    <input type="text" class="form-control fullname" placeholder="<?php echo $this->lang->line("fullname_customers") ?>*" name="fullname" />
                    <div class="clearfix"></div>
                    <input type="email" class="form-control email" placeholder="<?php echo $this->lang->line("diachiemail") ?>*" name="email" />
                  </div>
                  <div class="buttom_email">
                    <button type="submit" class="email_footer" style="border: 0px;background: none;border-radius: 0px;"></button>  
                  </div>
                </form>
                <!-- /Script form email -->
                <script type="text/javascript" charset="utf-8">
                  $(document).ready(function(){
                    $('#sform .error').hide();
                    var uri = $('#sform').attr('action');
                    $('#sform').on('submit',function(){
                      var postData = $(this).serializeArray();
                      $.post(uri, {post: postData, fullname: $('#sform .fullname').val(), email: $('#sform .email').val()},
                        function(data){
                          var json = JSON.parse(data);
                          $('#sform .error').show();
                          if(json.error.length){
                            $('#sform .error').removeClass('alert alert-success').addClass('alert alert-danger');
                            $('#sform .error').html('').html(json.error);
                          }else{
                            $('#sform .error').removeClass('alert alert-danger').addClass('alert alert-success');
                            $('#sform .error').html('').html('Gửi yêu cầu thành công!.');
                            $('#sform').trigger("reset");
                            setTimeout(function(){ location.reload(); }, 5000);
                          }
                        });
                      return false;
                    });
                  });
                </script>

                <!-- end Scripnt -->



              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <div class="box_footer">
              <h2><?php echo $this->lang->line('bandoduongdi')?></h2>
              <div class="map-contact w-100">
               <?php echo $this->fcSystem['contact_map'] ?>
             </div>
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="box_footer">
            <h2>Fanpage facebook</h2>
            <div class="fange_contact">
              <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->fcSystem['social_facebook'] ?>%2F&tabs=timeline&width=340&height=380&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1821093994887965" width="345" height="275" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
            <div class="lkmxh">
              <span><?php echo $this->lang->line('mangxahoi')?>:</span>
              <a href="<?php echo $this->fcSystem['social_facebook'] ?>" class="lk_face"></a>
              <a href="<?php echo $this->fcSystem['social_twitter'] ?>" class="lk_tw"></a>
              <a href="<?php echo $this->fcSystem['social_google'] ?>" class="lk_google"></a>
              <a href="<?php echo $this->fcSystem['social_youtube'] ?>" class="lk_youtube"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="banqquyen">
  <div class="container">
    <div class="row_pc">
      <div class="bq text-center">
        <?php echo $this->lang->line('copyright')?> <?php echo $this->fcSystem['homepage_banquyen'] ?> <?php echo $this->lang->line('tamphat')?>
      </div>
    </div>
  </div>
</section>
<div class="phone_fix">
  <div class="box_phone_fix">
    <img src="/templates/frontend/resources/img/icon_phone_fix.jpg" alt=""/>
    <div class="fix_ss">
      <span>Hotline</span>
      <div class="clearfix"></div>
      <a href=""><?php echo $this->fcSystem['contact_phone'] ?></a>
    </div>

  </div>
</div>
  <!-- <div class="chat">
    <img src="/templates/frontend/resources/img/img_chat.jpg" alt=""/>
  </div> -->

  <a href="#top" id="go_top"><i class="fa fa-arrow-up icon_next"></i></a>

  <script type="text/javascript">

    $(function () {
      $(".slider_banner").owlCarousel({

        items: 1,
        responsive: {
                    1200: { item: 1  }, // breakpoint from 1200 up
                    982: { items: 1 },
                    768: { items: 1 },
                    480: { items: 1 },
                    0: { items: 1 }
                  },
                  loop: true,
                  rewind: false,
                  autoplay: true,
                  autoplayTimeout: 3000,
                  autoplayHoverPause: false,
                smartSpeed: 500, //slide speed smooth

                dots: false,
                dotsEach: false,
                nav: true,
                navText: ['<i class="fa fa-angle-left icon_slider"></i>', '<i class="fa fa-angle-right icon_slider"></i>'],
                // navSpeed: 250, //slide speed when click button

                autoWidth: false,
                margin: 0,

                lazyContent: false,
                lazyLoad: false,

                animateIn: false,
                animateOut: false,

                center: false,
                URLhashListener: false,

                video: false,
                videoHeight: false,
                videoWidth: false
              });
      $(".slider_2").owlCarousel({

        items: 3,
        responsive: {
                    1200: { item: 3  }, // breakpoint from 1200 up
                    982: { items: 3 },
                    768: { items: 2 },
                    480: { items: 2 },
                    0: { items: 1 }
                  },
                  loop: true,
                  rewind: false,
                  autoplay: true,
                  autoplayTimeout: 3000,
                  autoplayHoverPause: false,
                smartSpeed: 500, //slide speed smooth

                dots: true,
                dotsEach: false,
                nav: true,
                navText: ['<i class="fa fa-angle-left icon_slider"></i>', '<i class="fa fa-angle-right icon_slider"></i>'],
                // navSpeed: 250, //slide speed when click button

                autoWidth: false,
                margin: 30,

                lazyContent: false,
                lazyLoad: false,

                animateIn: false,
                animateOut: false,

                center: false,
                URLhashListener: false,

                video: false,
                videoHeight: false,
                videoWidth: false
              });

    });


    $("a[href='#top']").click(function () {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    });
    $(window).scroll(function () {
      if ($(window).scrollTop() >= 200) {
        $('#go_top').show();
      }
      else {
        $('#go_top').hide();
      }
    });
  </script>


  <script>
    new UISearch(document.getElementById('sb-search'));
  </script>
</footer>


<script type="text/javascript" src="templates/frontend/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/owl.carousel2.min.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/menu-2.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/style-img.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/select.js"></script>
<script src="templates/frontend/resources/js/classie.js"></script>
<script src="templates/frontend/resources/js/uisearch.js"></script>