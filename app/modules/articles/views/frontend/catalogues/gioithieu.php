<div id="main" class="wrapper main-identify">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="main-content-left">
                    <div class="brescus wow fadeInUp">
                        <ul>
                            <li><a href="<?php echo base_url() ?>">Trang chủ &gt;</a></li>
                            <li><a href="/">Nhận Định</a></li>
                        </ul>
                    </div>
                    <div class="title1-primary">
                        <h2 class="title1"><i class="fas fa-bars"></i><?php echo $DetailCatalogues['title'] ?></h2>
                    </div>
                    <div class="content-identify">


                        <?php if(isset($ArticlesList) && is_array($ArticlesList) && count($ArticlesList)){ ?>

                            <?php foreach ($ArticlesList as $key => $value) { ?>

                                <?php

                                $href = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles');

                                ?>

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="logo-item">
                                                <img src="<?php echo $value['images'] ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="logo-item">
                                                <ul>
                                                    <p><?php echo $value['bongda'] ?></p>
                                                    <!--                                            <li> <strong>23/03/2019</strong>  giao hữu quốc tế</li>-->
                                                    <!--                                            <li> <strong>108.0:/05.078</strong> (Châu á)</li>-->
                                                    <!--                                            <li> <strong>108.0:/05.078</strong> (Châu âu)</li>-->
                                                    <!--                                            <li> <strong>108.0:/05.078</strong> (tài xíu )</li>-->
                                                    <a href="<?php echo $href ?>" class="soikeo">Soi Kèo</a>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="logo-item">
                                                <img src="<?php echo $value['images1'] ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>

                    </div>
                </div>
            </div>





            <?php $this->load->view('homepage/frontend/common/aside') ?>
        </div>
    </div>


</div>