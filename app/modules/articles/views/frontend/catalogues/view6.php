<div id="main" class="wrapper main-category">
    <div class="top-content">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="main-content-category">
                    <div class="content-breadcrumbs">
                        <ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Trang ch?</a></li>
                            <?php
                            $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
                            ?>
                            <li class="breadcrumb-item"><a href="<?php echo $hrefX ?>"><?php echo $DetailCatalogues['title'] ?></a></li>

                        </ol>                                        </div>
                    <div class="titleMessage wow fadeInUp">
                        Danh sách ??n hàng Xu?t Kh?u Lao ??ng theo th? tr??ng
                    </div>
                    <div class="listStory">
                        <?php if(isset($ArticlesList) && is_array($ArticlesList) && count($ArticlesList)){ ?>

                            <?php foreach ($ArticlesList as $key => $val) { ?>
                                <?php
                                $title = $val['title'];
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], FALSE);
                                $description = cutnchar($val['description'], 200);
                                ?>


                                <div class="storyWork wow fadeInUp">
                                    <h3 class="storyTitle">
                                        <a href="<?php echo $href ?>" title="">
                                            <?php echo $title ?> </a>
                                    </h3>
                                    <div class="storyThumb">
                                        <div class="image">
                                            <a href="<?php echo $href ?>" title="">
                                                <img alt="<?php echo $title ?>" src="<?php echo $image ?>">
                                            </a>
                                        </div>

                                    </div>
                                    <div class="textBox">
                                        <div class="storyDescription">
                                            <p><?php echo strip_tags($description) ?></p>
                                        </div>
                                        <div class="date">
                                            <img src="templates/frontend/resources/images/icondate.png"><?php echo $val['created'] ?>
                                        </div>
                                        <!-- <div class="storyInfo">
                                          <div class="item">
                                           <span class="left">Th? tr??ng:</span> <span class="right">Trung ?ông</span>
                                         </div>
                                         <div class="item">
                                           <span class="left">L??ng:</span> <span class="right">20.000.000 ?</span>
                                         </div>
                                         <div class="item">
                                           <span class="left">Công vi?c:</span> <span class="right">Làm nail móng, làm tóc, làm trang ?i?m</span>
                                         </div>
                                       </div> -->
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>



                    </div>
                    <div class="pagenavi wow fadeInUp">
                        <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                    </div>

                </div>
            </div>
            <?php $this->load->view('homepage/frontend/common/aside'); ?>
        </div>
    </div>
</div>