<div id="main" class="wrapper">
    <div id="slider-home" class="owl-carousel">
      <?php $slide = $this->FrontendSlides_Model->Read('index-slide', $this->fc_lang); ?>
      <?php if(isset($slide) && is_array($slide) && count($slide)): ?>
        <?php foreach ($slide as $key => $val): ?>
           <div class="item">
            <a href="<?php echo $val['url'] ?>" title="<?php echo $val['title']; ?>"> <img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>"></a>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    </div>
    <?php if (!empty($this->fcSystem['homepage_about']) && !empty($about)): ?>
        <?php foreach ($about as $key => $value): ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
            <section class="page_home">
              <div class="container">
                     <div class="page_list">
                        <div class="box">
                           <h2 class="headings wow fadeInUp">
                              <a href="<?= $hrefC ?>" title="Giới thiệu về chúng tôi"><?= $value['title'] ?></a>
                           </h2>
                           <div class="content_page wow fadeInUp">
                              <p> <?= $value['description'] ?> </p>
                           </div>
                        </div>
                     </div>
              </div>
            </section>
            <section class="group_field">
              <div class="container">
                <div class="group_field_block">
                    <?php foreach ($value['post'] as $k => $val): ?>
                        <?php 
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                            $image = getthumb($val['images'], TRUE);
                            $description = cutnchar($val['description'], 300); 
                        ?>
                        <div class="group_field_box wow fadeInUp">
                           <div class="info_list clear">
                              <div class="icon">
                                 <a href="<?= $href ?>"> <img src="<?= $val['images'] ?>" alt=""></a>
                              </div>
                              <h3 class="title">
                                 <a href="<?= $href ?>"><?= $val['title'] ?> </a>
                              </h3>
                              <p class="cont"><?= $description ?></p>
                           </div>
                        </div>
                    <?php endforeach ?>
                 </div>
              </div>
          </section>
        <?php endforeach ?>
        
    <?php endif ?>
  <section class="new-home clear">
    <div class="container">
        <?php if (!empty($this->fcSystem['homepage_service']) && !empty($service)): ?>
            <?php foreach ($service as $key => $value): ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
                 <div class="list list1 content_style_4 ">
                    <h2 class="heading wow fadeInUp">
                       <a href="<?= $hrefC ?>">
                            <?= $value['title'] ?>
                       </a>
                    </h2>
                    <div class="list-news row">
                        <?php foreach ($value['post'] as $k => $val): ?>
                            <?php 
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                                $image = getthumb($val['images'], TRUE);
                                $description = cutnchar($val['description'], 300); 
                            ?>
                           <div class="news-post col-md-4 wow fadeInUp">
                              <div class="box">
                                 <?php if ($k%2 == 0): ?>
                                     <div class="post-thumbnail">
                                        <a href="<?= $href ?>">
                                          <img src="<?= $val['images'] ?>" alt="">
                                        </a>
                                     </div>
                                 <?php endif ?>
                                 <div class="content">
                                  <h3 class="title1">
                                    <a class="news-title" href="<?= $href ?>" title="<?= $val['title'] ?>"><?= $val['title'] ?></a>
                                  </h3>
                                    <div class="line"></div>
                                    <!-- <p class="desc"><?= $description ?></p> -->
                                   <p class="desc"><?php echo  $description ?></p>
                                 </div>
                                 <?php if ($k%2 == 1): ?>
                                     <div class="post-thumbnail">
                                        <a href="<?= $href ?>">
                                          <img src="<?= $val['images'] ?>" alt="">
                                        </a>
                                     </div>
                                 <?php endif ?>
                              </div>
                           </div>
                        <?php endforeach ?>
                    </div>
                </div>
        <?php endforeach ?>
    <?php endif ?>
    <?php if (!empty($this->fcSystem['homepage_news']) && !empty($news)): ?>
        <?php foreach ($news as $key => $value): ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
            <div class="list list2 content_style_4">
                <h2 class="heading wow fadeInUp">
                <a href="<?= $hrefC ?>"><?=  $value['title'] ?></a>
                </h2>
                <div class="list-news">
                    <div class="row">
                    <?php foreach ($value['post'] as $k => $val): ?>
                        <?php 
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                            $image = getthumb($val['images'], TRUE);
                            $description = cutnchar($val['description'], 300); 
                        ?>
                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp">
                            <div class="news-post">
                                <div class="box">
                                    <div class="post-thumbnail">
                                        <a href="">
                                            <img  src="<?= $image ?>">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title"> 
                                            <a class="news-title" href="<?= $href ?>" title="<?= $val['title'] ?>">
                                                <?= $val['title'] ?>
                                            </a>
                                        </h3>
                                        <p class="desc"><?= $description ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
   </div>
  </section>
  <?php if (!empty($this->fcSystem['homepage_representative']) && !empty($representative)): ?>
        <?php foreach ($representative as $key => $value): ?>
          <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
          <section class="futured_post">
            <div class="container">
               <h2 class="heading wow fadeInUp">
                    <a href="<?= $hrefC ?>">
                        <?= $value['title'] ?>
                    </a>
              </h2>
              <div class="slider-future owl-carousel">
                <?php foreach ($value['post'] as $k => $val): ?>
                    <?php 
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                        $image = getthumb($val['images'], TRUE);
                    ?>
                    <div class="item">
                      <div class="image">
                        <a href="<?= $href ?>"><img src="<?= $image ?>" alt="<?= $val['title'] ?>"></a>
                      </div>
                      <h3 class="title"><a href="<?= $href ?>"><?= $val['title'] ?></a></h3>
                    </div>
                <?php endforeach ?>
              </div>
            </div>
          </section>
        <?php endforeach ?>
    <?php endif ?>
 </div>