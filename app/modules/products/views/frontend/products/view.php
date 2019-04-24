<div id="main" class="wrapper main-detail-product">
    <div class="container">
        <div class="content-detail-product">
            <div class="row">



                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="content-pr-home">
                        <div class="content-detail-product">
                            <div class="row">


                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="list-img">
                                        <div class="slider-large owl-carousel">
                                            <div class="item" data-hash="one">
                                                <img src="<?php echo $DetailProducts['images']; ?>" alt="<?php echo $DetailProducts['title'] ?>">
                                            </div>
                                            <?php $listItem = json_decode($DetailProducts['albums'], TRUE); ?>
                                            <?php if (isset($listItem) && is_array($listItem) && count($listItem)) { ?>
                                                <?php foreach ($listItem as $key => $val) { ?>
                                                    <div class="item" data-hash="seven<?php echo $key ?>">
                                                        <img src="<?php echo $val['images']; ?>" alt="<?php echo $DetailProducts['title'] ?>">
                                                    </div>
                                                <?php }
                                            } ?>

                                        </div>
                                        <?php $href = rewrite_url($DetailProducts['canonical'], $DetailProducts['slug'], $DetailProducts['id'], 'products'); ?>
                                        <div class="slider-small owl-carousel">
                                            <a href="<?php echo $href ?>#one">
                                                <img style="height: 85px;" src="<?php echo $DetailProducts['images']; ?>" alt="<?php echo $DetailProducts['title'] ?>">
                                            </a>
                                            <?php $listItem = json_decode($DetailProducts['albums'], TRUE); ?>
                                            <?php if (isset($listItem) && is_array($listItem) && count($listItem)) { ?>
                                                <?php foreach ($listItem as $key => $val) { ?>
                                                    <a href="<?php echo $href ?>#seven<?php echo $key ?>">
                                                        <img style="height: 85px;" src="<?php echo $val['images']; ?>" alt="<?php echo $DetailProducts['title'] ?>">
                                                    </a>
                                                <?php }
                                            } ?>

                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="nav-img-detail">
                                        <h3 class="name-product"><?php echo $DetailProducts['title'] ?></h3>
                                        <div class="pro-brand">
                                            <p>
                                                <?php echo $DetailProducts['tongquan'] ?>
                                            </p>
                                        </div>

                                        <form action="#" method="post">
                                            <?php
                                            $DetailProductsprice = $DetailProducts['price'];
                                            $DetailProductssaleoff = $DetailProducts['saleoff'];
                                            if ($DetailProductsprice > 0) {
                                                $giaolddetail = str_replace(',', '.', number_format($DetailProductsprice)).'₫';
                                            }else{
                                                $giaolddetail = '';
                                            }
                                            if ($DetailProductssaleoff > 0) {
                                                $giadetail = str_replace(',', '.', number_format($DetailProductssaleoff)).'₫';
                                            }else{
                                                $giadetail = 'Liên hệ';
                                            }

                                            ?>
                                            <div class="price-container">
                                                <span id="ProductPrice" class="h2 ProductPrice" itemprop="price" content="5000000"> Giá :<?php echo $giadetail ?></span>
                                                <s id="ComparePrice" class="ComparePrice"><?php echo $giaolddetail ?></s>
                                            </div>
                                            <div class="p-short-description">
                                                <?php if( isset($DetailProducts['description'])){ ?>
                                                    <p>
                                                        <?php echo $DetailProducts['description'] ?>
                                                    </p>
                                                <?php } else {   ?>

                                                    <p>Dữ liệu đang được cập nhật ...</p>
                                                <?php }  ?>
                                            </div>
                                            <!--                                <label for="Quantity" class="quantity-selector">Số lượng</label>-->
                                            <!--                                <input type="number">-->
<!--                                            <a href="lien-he.html"><button   id="AddToCart" class="btn" onclick="alert('Bạn vui lòng nhập thông tin vào from sau:')">-->
<!--                                                Liên hệ báo giá-->
<!--                                            </button></a>-->
                                            <a href="lien-he.html"  id="AddToCart" class="btn" role="button" onclick="alert('Bạn vui lòng nhập thông tin vào from sau:')">
                                                    Liên hệ báo giá
                                                </a>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="product-tabs">
                                <div class="product-description rte" itemprop="description">
                                    <div class="product-description__header">
                                        Mô tả sản phẩm
                                    </div>
                                    <div class="product-desc-detail">



                                        <p><?php echo $DetailProducts['content4'] ?></p>
                                        <div class="map-detail">
                                            <h3>Tôi có thể tham khảo mẫu mã trực tiếp tại đâu?</h3>
                                            <p>Địa chỉ kho hàng: <?php echo $this->fcSystem['contact_address'] ?></p>
                                            <div class="map1">
                                                <?php echo $this->fcSystem['homepage_bando'] ?>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>
                            <?php $this->load->view('homepage/frontend/common/comments') ?>


                        </div>
                    </div>
                </div>








                <?php $this->load->view('homepage/frontend/common/aside_tu') ?>
            </div>
        </div>














        <section class="content-product">
            <h2 class="title-primary wow fadeInUp"><img src="templates/frontend/resources/images/i.png" alt="">Sản phẩm cùng loại</h2>
            <div class="nav-content-product">
                <div class="row">
                    <?php if (isset($products_same) && is_array($products_same) && count($products_same)){?>
                    <?php foreach ($products_same as $keyp => $val) { ?>
                    <?php
                    $title = $val['title'];
                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                    $image = getthumb($val['images'], FALSE);
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp">
                        <div class="item-pro">
                            <div class="image">
                                <a href="<?php echo $href ?>"><img src="<?php echo $val['images'] ?>" alt="<?php echo $title; ?>"></a>
                            </div>
                            <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title; ?></a></h3>
                            <p class="contact-product">LH: <?php echo $this->fcSystem['contact_phone'] ?> để lấy báo giá bán buôn</p>
                            <div class="price-detail">
                                <div class="price">Giá:<span> Liên hệ</span></div>
                                <div class="detai-pro">
                                    <a href="<?php echo $href ?>">Chi tiết</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>

                </div>

            </div>
        </section>

        </section>











        <?php $this->load->view('homepage/frontend/common/lailatuday') ?>
    </div>



</div>