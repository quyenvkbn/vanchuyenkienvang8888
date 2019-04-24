<div id="main" class="wrapper main-category">
    <div class="top-content">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="main-content-category">
                    <div class="content-breadcrumbs">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Trang ch?</a></li>
                            <?php
                            $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
                            ?>
                            <li class="breadcrumb-item"><a
                                    href="<?php echo $hrefX ?>"><?php echo $DetailCatalogues['title'] ?></a></li>

                            <li class="active"><?php echo $DetailProducts['title'] ?></li>

                        </ol>
                    </div>


                    <div class="titleMessage wow fadeInUp">
                        <?php echo $DetailProducts['description'] ?>
                    </div>
                    <h1 class="nameNews"><?php echo $DetailProducts['title'] ?></h1>


                    <div class="infoWork">
                        <div class="info">
                            <div class="contentInfo">
                                <div class="item">
                                    <span>Th? th??ng</span>:<span><?php echo $DetailProducts['thitruong'] ?></span>
                                </div>
                                <div class="item">
                                    <span>?? tu?i</span>:<span><?php echo $DetailProducts['thunhap'] ?></span>
                                </div>
                                <div class="item">
                                    <span>Thu nh?p</span>:<span><?php echo $DetailProducts['congviec'] ?></span>
                                </div>
                                <div class="item">
                                    <span>H?n n?p h? s?</span>:<span><?php echo $DetailProducts['dotuoi'] ?></span>
                                </div>
                                <div class="item">
                                    <span>Công vi?c</span>:<span><?php echo $DetailProducts['hannophoso'] ?></span>
                                </div>
                                <div class="item">
                                    <span>Thi tuy?n</span>:<span><?php echo $DetailProducts['thituyen'] ?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>
                    <div class="content-detail">
                        <p><?php echo $DetailProducts['content4'] ?></p>
                    </div>


                    <div class="pagenavi wow fadeInUp">

                    </div>

                </div>
            </div>
            <?php $this->load->view('homepage/frontend/common/aside'); ?>
        </div>
    </div>
</div>