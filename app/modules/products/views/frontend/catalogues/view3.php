<div class="clearix"></div>
<?php $this->load->view('homepage/frontend/common/bannerdethuong'); ?>

<article id="body_home">

    <section class="news_page">
        <div class="container">
            <div class="row_pc">
                <div class="top_news">
                    <h2 class="tours"><?php echo $DetailCatalogues['title'] ?></h2>
                    <p><?php echo $DetailCatalogues['description'] ?> </p>
                </div>
            </div>
        </div>
    </section>
    

    <section class="content_news">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <?php if(isset($productsList) && is_array($productsList) && count($productsList)){ ?>
                        
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <?php foreach ($productsList as $key => $val) { ?>
                                <?php  
                                $title = $val['title'];
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], FALSE);
                                ?>
                                <div class="back_gr">
                                    <div class="row_5">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-480-12">
                                            <div class="row_10">
                                                <div class="full_text">
                                                    <div class="img_news h_6650">
                                                        <a href="<?php echo $href?>"><img src="<?php echo $image?>" class="w_100" alt=""/></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 col-480-12">
                                            <div class="row_10">
                                                <div class="text_news">
                                                    <h3><a href="<?php echo $href?>"><?php echo $val['title'] ?></a></h3>
                                                    <span> <?php echo $val['description'] ?></span>
                                                    <p><a href="<?php echo $href?>"><i class="fa fa-chevron-right"></i>Read more: <?php echo $val['title']?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div><?php } ?>
                                    <div class="clearfix"></div>
                                    <div class="example">
                                        <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                                    </div>



                                </div> 
                                
                            <?php } ?> <?php echo $this->load->view('homepage/frontend/common/aside'); ?>





                            <!-- llll -->
                        </div>
                    </div>



                </div>
                <?php echo $this->load->view('homepage/frontend/common/menuchantrang'); ?>


            </section>

        </article>