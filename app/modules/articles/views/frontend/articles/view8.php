<div id="main" class="wrapper">
    <section>
        <div class="sub-header sub-header-1 sub-header-contact fake-position">
            <?php
            $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
            ?>
            <div class="sub-header-content">
                <h2 class="white-text title"><?php echo $DetailCatalogues['title'] ?></h2>
                <ol class="breadcrumb breadcrumb-arc">
                    <li><a href="<?php echo base_url() ?>">Trang ch?</a></li>
                    <?php foreach($Breadcrumb as $key => $val){ ?>
                        <?php
                        $title = $val['title'];
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
                        ?>
                        <li><a href="<?php echo $href; ?>"><?php echo $title; ?></a></li>
                    <?php } ?>
                    <li class="active"><?php echo $DetailArticles['title'] ?></li>

                </ol>
            </div>
        </div>
    </section>
    <div id="main-new">
        <div class="container">

            <div class="detail-content-new">
                <h1><?php echo $DetailArticles['title'] ?></h1>
                <p class="date"><i class="fas fa-calendar-week"> <?php echo $DetailArticles['created'] ? date('M d, Y ', strtotime($DetailArticles['created'])) : ''; ?></i></p>
                <h3><?php echo strip_tags($DetailArticles['description']) ?></h3>
                <p><?php echo $DetailArticles['content'] ?></p>
            </div>



            <div class="other-new">
                <h2 class="title-other">
                    Bài vi?t cùng lo?i
                </h2>
                <div class="row">
                    <?php if (is_array($articles_same) && isset($articles_same) && count($articles_same)) { ?>
                        <?php foreach ($articles_same as $key => $val) { ?>
                            <?php
                            $title = $val['title'];
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                            $image = getthumb($val['images'], TRUE);
                            $description = cutnchar(strip_tags($val['description']),400);
                            $created = show_time($val['created'], 'd/m/Y');
                            $view = $val['viewed'];
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
                                <div class="element-item">
                                    <article>
                                        <figure class="latest-blog-post-img">
                                            <a href="<?php echo $href ?>">
                                                <img class="img-responsive" src="<?php echo $image ?>"></a>
                                        </figure>
                                        <div class="latest-blog-post-description">
                                            <h3 class="title"><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>
                                            <div class="latest-blog-post-data">
                                                <p class="tags"><i class="fa fa-eye"></i> <?php echo $view ?> l??t xem</p>
                                            </div>
                                            <div class="latest-blog-post-date-2"><span class="day2"><i class="fa fa-clock-o"></i> Ngày ??ng: <?php echo $created ?></span></div>
                                            <p class="desc"><?php echo strip_tags($description) ?></p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        <?php }} ?>




                </div>

            </div>


        </div>
    </div>





</div>