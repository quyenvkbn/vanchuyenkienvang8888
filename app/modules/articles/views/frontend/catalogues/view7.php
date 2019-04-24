<div id="main" class="wrapper main-identify">
    <div class="container">
        <div class="row">



            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="main-content-left">
                    <div class="brescus wow fadeInUp">
                        <?php
                        $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
                        ?>
                        <ul>
                            <li><a href="<?php echo base_url() ?>">Trang ch? &gt;</a></li>
                            <li><a href="<?php echo $hrefX ?>"><?php echo $DetailCatalogues['title'] ?></a></li>
                        </ul>
                    </div>
                    <div class="title1-primary">
                        <h2 class="title1"><i class="fas fa-bars"></i><?php echo $DetailCatalogues['title'] ?></h2>
                    </div>
                    <div class="archive-new">

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
                                <div class="item-new wow fadeInUp" >
                                    <div class="image">
                                        <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt=""></a>
                                    </div>
                                    <div class="nav-image">
                                        <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                                        <p class="date"><?php echo $created ?> - <?php echo $view ?>  l??t xem</p>
                                        <p class="desc"> <?php echo strip_tags($description) ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?php }} ?>

                    </div>
                    <div class="pagenavi">
                        <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                    </div>
                </div>
            </div>






            <?php $this->load->view('homepage/frontend/common/aside') ?>
        </div>
    </div>


</div>