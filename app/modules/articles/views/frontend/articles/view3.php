<div class="clearix"></div>
<?php $this->load->view('homepage/frontend/common/bannerdethuong'); ?>

<article id="body_home">

  <section class="news_page">
    <div class="container">
      <div class="row_pc">
        <div class="top_news">
          <h2 class="tours"><?php echo $DetailCatalogues['title'] ?></h2>
        </div>
      </div>
    </div>
  </section>
  <section class="content_news">
    <div class="container">
      <div class="row_pc">
        <div class="row">

         <div class="col-md-9 col-sm-9 col-xs-12">
          <div class="content-new">
           <div class="new-home1">
            <h1 class="title22 wow fadeInUp"><?php  echo $DetailArticles['title']; ?></h1>

            <div class="tu">
             <?php echo $DetailArticles['description']; ?>
             
             <?php echo $DetailArticles['content']; ?>
           </div>
           <style type="text/css">
           .tu   img{
            max-width: 100% !important;
            height: auto !important;
          }
        </style>



        <div class="news_page">
          <div class="top_news">
            <h2 class="tours"><?php echo $this->lang->line('bvlienquan')?></h2>
          </div>
          <?php if (is_array($articles_same) && isset($articles_same) && count($articles_same)) { ?>
            <?php foreach ($articles_same as $key => $val) { ?> 
              <?php 
              $title = $val['title'];
              $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
              $image = getthumb($val['images'], TRUE);
              $description = cutnchar(strip_tags($val['description']),450);
              $created = show_time($val['created'], 'd/m/Y');
              $view = $val['viewed'];
              ?>
              <div class="back_gr">
                <div class="row_5">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-480-12">
                    <div class="row_10">
                      <div class="full_text">
                        <div class="img_news h_6650">
                          <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" class="w_100" alt="" style="height: 139.65px;"></a>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 col-480-12">
                    <div class="row_10">
                      <div class="text_news">
                        <h3><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>
                        <span><?php echo $description ?></span>
                        <p><a href="<?php echo $href ?>"><i class="fa fa-chevron-right"></i><?php echo $this->lang->line('docthem')?>: <?php echo $val['title'] ?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
          
        </div>

      </div>

    </div>
  </div>

  <?php echo $this->load->view('homepage/frontend/common/aside'); ?>





  <!-- llll -->
</div>
</div>



</div>


</section>

</article>