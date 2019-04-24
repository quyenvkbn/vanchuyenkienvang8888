<div id="main" class="wrapper">
    <?php $this->load->view('homepage/frontend/common/slider'); ?>


    <section class="top-product">
        <?php if (isset($sanphamcuachungtoi) && is_array($sanphamcuachungtoi) && count($sanphamcuachungtoi)){ ?>
            <?php foreach ($sanphamcuachungtoi as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues'); ?>
                <div class="container">
                    <div class="title-block wow fadeInUp">
                        <h2 class="title-primary "><?php echo $value['title']?></h2>
                        <div class="divider">
                            <svg class="svg-triangle-icon-container">
                                <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                            </svg>
                        </div>
                    </div>
                    <div class="nav-product wow fadeInUp">
                        <div class="slider-product owl-carousel">

                            <?php foreach ($value['post'] as $keyp => $val) { ?>
                                <?php
                                $title = $val['title'];
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], TRUE);
                                $description = cutnchar($val['description'], 200);
                                ?>
                                <div class="item">
                                    <div class="productImg">
                                        <a href="<?php echo $href ?>">
                                            <img src="<?php echo $image ?>" class="img-responsive">
                                            <div class="plusScale hidden-sm hidden-xs"></div>
                                        </a>
                                    </div>
                                    <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                                </div>
                            <?php }?>

                        </div>
                    </div>
                </div>
            <?php } }?>
    </section>






    <section class="product-new">
        <?php if (isset($sanphammoi) && is_array($sanphammoi) && count($sanphammoi)){ ?>
            <?php foreach ($sanphammoi as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues'); ?>
                <div class="container">
                    <div class="title-block wow fadeInUp">
                        <h2 class="title-primary"><?php echo $value['title']?></h2>
                        <div class="divider">
                            <svg class="svg-triangle-icon-container">
                                <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                            </svg>
                        </div>
                    </div>
                    <div class="nav-product wow fadeInUp">
                        <div class="slider-product owl-carousel">

                            <?php foreach ($value['post'] as $keyp => $val) { ?>
                                <?php
                                $title = $val['title'];
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], TRUE);
                                $description = cutnchar($val['description'], 200);
                                ?>
                                <div class="item">
                                    <div class="productImg">
                                        <a href="<?php echo $href ?>">
                                            <img src="<?php echo $image ?>" class="img-responsive">
                                            <div class="plusScale hidden-sm hidden-xs"></div>
                                        </a>
                                    </div>
                                    <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                                </div>
                            <?php }?>

                        </div>
                    </div>


                </div>
            <?php }} ?>
    </section>





    <?php if (isset($taisao) && is_array($taisao) && count($taisao)){ ?>
        <?php foreach ($taisao as $key => $value) { ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>

            <section class="service-home">

                <div class="title-block wow fadeInUp">
                    <h2 class="title-primary"><?php echo $value['title']?></h2>
                    <div class="divider">
                        <svg class="svg-triangle-icon-container">
                            <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="nav-services">
                    <?php foreach ($value['post'] as $keyp => $val) { ?>
                        <?php
                        $title = $val['title'];
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                        $image = getthumb($val['images'], TRUE);
                        $description = cutnchar($val['description'], 200);
                        ?>
                        <div class="item wow fadeInUp">
                            <figure class="effect-layla">
                                <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                                <figcaption>
                                    <div class="content-item">
                                        <h3 class="text-cap white-text"><?php echo $title ?></h3>
                                        <p class="desc"><?php echo strip_tags($description) ?></p>
                                        <a href="<?php echo $href ?>" class="category-title">S?n ph?m</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    <?php } ?>

                    <div class="clearfix"></div>

                </div>

            </section>
        <?php }} ?>


    <?php if (isset($chinhsach) && is_array($chinhsach) && count($chinhsach)){ ?>
        <?php foreach ($chinhsach as $key => $value) { ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>

            <section class="construction-feature">
                <div class="title-block wow fadeInUp">
                    <h2 class="title-primary"><?php echo $value['title']?></h2>
                    <div class="divider">
                        <svg class="svg-triangle-icon-container">
                            <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                        </svg>
                    </div>
                </div>
                <?php foreach ($value['post'] as $keyp => $val) { ?>
                    <?php
                    $title = $val['title'];
                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                    $image = getthumb($val['images'], TRUE);
                    $description = cutnchar($val['description'], 200);
                    ?>
                    <div class="element-item wow fadeInUp">
                        <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                        <div class="project-info">
                            <a href="<?php echo $href ?>">
                                <h4 class="title-project text-cap text-cap"><?php echo $title ?></h4>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <div class="clearfix"></div>
                <div class="read-all wow fadeInUp">
                    <a href="<?php echo $hrefC ?>" class="readmore">Xem t?t c? công trình</a>
                </div>

            </section>
        <?php }} ?>


    <?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)){ ?>
        <?php foreach ($tintuc as $key => $value) { ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>

            <section class="new-home">
                <div class="container">
                    <div class="title-block wow fadeInUp">
                        <h2 class="title-primary "><?php echo $value['title']?></h2>
                        <div class="divider">
                            <svg class="svg-triangle-icon-container">
                                <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                            </svg>
                        </div>
                    </div>
                    <div class="nav-new-home">
                        <div class="lastest-blog-container">
                            <div class="row">

                                <?php foreach ($value['post'] as $keyp => $val) { ?>
                                    <?php
                                    $title = $val['title'];
                                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                    $image = getthumb($val['images'], TRUE);
                                    $description = cutnchar($val['description'], 400);
                                    ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
                                        <article class="lastest-blog-item">
                                            <figure class="latest-blog-post-img effect-zoe">
                                                <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt=""></a>
                                                <!--                                    <div class="latest-blog-post-date text-cap"><span class="day">07</span><span class="month">Jul - 2016</span></div>-->
                                            </figure>
                                            <div class="latest-blog-post-description">
                                                <a href="<?php echo $href ?>">
                                                    <h3 class="title"><?php echo $title ?></h3>
                                                </a>
                                                <p class="desc"><?php echo $description ?></p>
                                                <a class="ot-btn btn-main-color text-cap mgb0" href="<?php echo $href ?>">??c ti?p...</a>
                                            </div>
                                        </article>
                                    </div>

                                <?php } ?>

                            </div>

                        </div>
                    </div>
                </div>
            </section>

        <?php }} ?>



    <!-- End Section Lastest Blog -->
    <?php if (isset($review) && is_array($review) && count($review)){ ?>
        <?php foreach ($review as $key => $value) { ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>

            <section class="bg-parallax section-dark-testimonials wow fadeInUp">
                <div class="container">

                    <div class="title-block">
                        <h2 class="title-primary"><?php echo $value['title']?></h2>
                        <div class="divider">
                            <svg class="svg-triangle-icon-container">
                                <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                            </svg>
                        </div>
                    </div>

                    <!-- End Title -->
                    <div class="testimonial-warp testimonial-2-col">

                        <div class="slider-testimonials owl-carousel">
                            <?php foreach ($value['post'] as $keyp => $val) { ?>
                                <?php
                                $title = $val['title'];
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], TRUE);
                                $description = cutnchar($val['description'], 400);
                                $content = cutnchar($val['content'], 350);
                                ?>
                                <div class="item item-testimonials text-left">
                                    <p class="quote-icon">“</p>
                                    <p><i><?php echo strip_tags($content) ?></i></p>
                                    <div class="avatar-testimonials"><img src="<?php echo $image ?>" class="img-responsive" ></div>
                                    <div class="nav-img">
                                        <h4 class="name-testimonials text-cap"><?php echo $title ?></h4>
                                        <span class="job-testimonials"><?php echo $description ?></span>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </section>
        <?php }} ?>




    <section class="partner-home">
        <div class="container">
            <div class="title-block wow fadeInUp">
                <h2 class="title-primary">??i tác chúng tôi</h2>
                <div class="divider">
                    <svg class="svg-triangle-icon-container">
                        <polygon class="svg-triangle-icon" points="6 11,12 0,0 0"></polygon>
                    </svg>
                </div>
            </div>
            <div class="nav-partner wow fadeInUp">
                <div class="slider-partner owl-carousel">
                    <?php $slide1 = $this->FrontendSlides_Model->Read('partner', $this->fc_lang); ?>
                    <?php if(isset($slide1) && is_array($slide1) && count($slide1)){ ?>
                        <?php foreach ($slide1 as $key => $var): ?>
                            <div class="item">
                                <a href="<?php echo $var['url'] ?>" target="_blank"><img src="<?php echo $var['image'] ?>" alt="<?php echo $var['title'] ?>"></a>
                            </div>
                        <?php endforeach ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


</div>