<?php  $this->load->view('homepage/frontend/common/slide_tu') ?>
<div class="clearix"></div>

<article id="body_home">
    <section class="wellcom_home">
        <?php if (isset($articleshome) && is_array($articleshome) && count($articleshome)): ?>
        <?php foreach ($articleshome as $key => $value) { ?>


            <div class="container">
                <div class="row_pc">
                    <div class="row">
                        <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles'); ?>
                        <div class="col-lg-6 col-md-6 hidden-sm hidden-md hidden-xs">
                            <div class="img_well">
                                <a href="<?php echo $hrefC ?>"><img src="<?php echo $value['images'] ?>" class="w_100" alt="<?php echo $value['title'] ?>"/></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="text_well">
                                <h2><?php echo $value['title'] ?></h2>



                                <p><?php echo $value['description'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }  ?>
    <?php endif ?>

</section>






<!-- ViSa -->
<section class="dv_visa">
    <div class="container">
        <?php if (isset($dichvuvisa) && is_array($dichvuvisa) && count($dichvuvisa)): ?>
        <?php foreach ($dichvuvisa as $key => $value) { ?>
          <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
          <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>

          <div class="row_pc">
            <h2 class="title_dv"><?php echo $value['title'] ?></h2>

            <div class="row">
                <?php foreach ($value['post'] as $keyp => $val) { ?>
                    <?php 
                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                    $image = getthumb($val['images'], TRUE);
                    $description = cutnchar($val['description'], 300); 
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="box_dv">
                            <div class="img_box_dv h_6616">
                                <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" class="w_100" alt="<?php echo $val['title'] ?>"/></a>
                            </div>
                            <div class="text_dv">
                                <h3><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>
                                <span><?php echo strip_tags($description) ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
            </div>
        </div>
    <?php endif ?>
<?php } ?>
<?php endif ?>
</div>
</section>










<!-- Tourr Du Lịch -->
<?php if (isset($danhmuchome) && is_array($danhmuchome) && count($danhmuchome)): ?>
<?php foreach ($danhmuchome as $key => $value) { ?>
    <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues'); ?>
    <section>
        <div class="container">
            <div class="row_pc">
                <div class="boder_tour">
                    <h2 class="title_dv color_green"><?php echo $value['title']?></h2>

                    <div class="row">
                        <?php foreach ($value['post'] as $keyp => $val) { ?>
                            <?php 
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                            $image = getthumb($val['images'], TRUE);
                            $description = cutnchar($val['description'], 300); 
                            ?>
                            <div class="col-lg- col-md-3 col-sm-6 col-xs-6 col-480-12">
                                <div class="tour_dl">
                                    <div class="img_tour h_6617">
                                        <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" class="w_100" alt=""/></a>
                                    </div>
                                    <div class="text_tour">
                                        <h3><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>

                                        <div class="content_text_tour">
                                            <p>
                                                <del><?php echo $this->lang->line('tour')?>: <?php echo $val['price'] ?></del>
                                            </p>
                                            <p><?php echo $this->lang->line('priceSale')?>: <span><?php echo $val['saleoff'] ?></span></p>

                                            <p><?php echo $description ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php endif ?>







<!-- Nhận Xét ý kiến Khách Hàng -->
<section>
    <div class="container">
        <?php if (isset($ykien) && is_array($ykien) && count($ykien)): ?>
        <?php foreach ($ykien as $key => $value) { ?>
          <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
          <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>
          <div class="row_pc">
            <div class="nv_yykh">
                <h2 class="title_dv color_green"><?php echo $value['title'] ?> </h2>
                <div class="slider_nx slider_2 owl-carousel">
                    <?php foreach ($value['post'] as $keyp => $val) { ?>
                        <?php 
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
                        $image = getthumb($val['images'], TRUE);
                        $description = cutnchar($val['description'], 300); 
                        ?>

                        <div class="item">
                            <div class="top_nx">
                                <div class="img_top_nx">
                                    <img src="<?php echo $image ?>" alt=""/>
                                </div>
                                <div class="text_top_nx">
                                    <h3><?php echo $val['title'] ?></h3>

                                    <p><?php echo $description ?></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="bottom_nc">
                                <?php echo strip_tags($val['content']) ?>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    <?php endif  ?>
<?php } ?>
<?php endif  ?>
</div>
</section>


<!-- menu chân -->
<?php $this->load->view('homepage/frontend/common/menuchantrang'); ?>

</article>