<div id="main" class="wrapper">
    <?php echo $this->load->view('homepage/frontend/common/hihi') ?>
    <div id="main-new">
        <div class="container">
            <div class="row">

                <?php if(isset($ArticlesList) && is_array($ArticlesList) && count($ArticlesList)){ ?>

                    <?php foreach ($ArticlesList as $key => $val) { ?>
                        <?php
                        $title = $val['title'];
                        $view = $val['viewed'];
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                        $image = getthumb($val['images'], FALSE);
                        $created = show_time($val['created'], 'd/m/Y');
                        $description = cutnchar($val['description'], 300);
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                            <div class="element-item">
                                <article>
                                    <figure class="latest-blog-post-img">
                                        <a href="<?php echo $href ?>">
                                            <img class="img-responsive" src="<?php echo $image ?>"></a>
                                    </figure>
                                    <div class="latest-blog-post-description">
                                        <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                                        <div class="latest-blog-post-data">
                                            <p class="tags"><i class="fa fa-eye"></i> <?php echo $view ?> l??t xem</p>
                                        </div>
                                        <div class="latest-blog-post-date-2"><span class="day2"><i class="fa fa-clock-o"></i> Ngày ??ng: <?php echo $created ?> </span></div>
                                        <p class="desc"> <?php echo strip_tags($description) ?></p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php }} ?>
            </div>

            <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>

        </div>
    </div>





</div>