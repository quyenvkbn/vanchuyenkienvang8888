<div id="main" class="wrapper">
    <section>
        <div class="sub-header sub-header-1 sub-header-contact fake-position">
            <div class="sub-header-content">
                <h2 class="white-text title"><?php echo $DetailProducts['title'] ?></h2>
                <ol class="breadcrumb breadcrumb-arc">
                    <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
                    <?php foreach($Breadcrumb as $key => $val){ ?>
                        <?php
                        $title = $val['title'];
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
                        ?>
                        <li><a href="<?php echo $href; ?>"><?php echo $title; ?></a></li>
                    <?php } ?>

                    <li class="active"><?php echo $DetailProducts['title'] ?></li>
                </ol>
            </div>
        </div>
    </section>
    <div class="detail-product">
        <div class="container">
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
                            <!--                            <div class="pro-brand">-->
                            <!--                                <span class="title">Thương hiệu: <a href="#">Khác</a></span>-->
                            <!--                            </div>-->
                            <!--                            <div class="pro-type">-->
                            <!--                                <span class="title">Loại: <a href="#">Khác</a></span>-->
                            <!--                            </div>-->
                            <!--                                    <span class="product-sku">-->
                            <!--                                    Mã sản phẩm: <span id="ProductSku" class="ProductSku">HHDHGHD543</span>-->
                            <!--                                    </span>-->
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
                                <p> <a href="lien-he.html" class="muahang">Liên Hệ</a></p>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <?php if (isset($products_same) && is_array($products_same) && count($products_same)){?>
                <div class="other-product">
                    <h2 class="title-other">SẢN PHẨM KHÁC CÙNG LOẠI</h2>
                    <div class="slider-other-product owl-carousel">
                        <?php foreach ($products_same as $keyp => $val) { ?>
                            <?php
                            $title = $val['title'];
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                            $image = getthumb($val['images'], FALSE);
                            $price = $val['price'];
                            $saleoff = $val['saleoff'];
                            if ($price > 0) {
                                $giaold = str_replace(',', '.', number_format($price)).'₫';
                            }else{
                                $giaold = '';
                            }
                            if ($saleoff > 0) {
                                $gia = str_replace(',', '.', number_format($saleoff)).'₫';
                            }else{
                                $gia = 'Liên hệ';
                            }
                            if ($saleoff > 0 && $price > 0 && $saleoff < $price) {
                                $sale = ceil(($price - $saleoff)/$price*100);
                                $price_sale = str_replace(',', '.', number_format($price - $saleoff)).'₫';
                            }else{
                                $sale = $price_sale = '';
                            }
                            ?>
                            <div class="item">
                                <div class="image">
                                    <a href="<?php echo $href ?>"><img src="<?php echo $val['images'] ?>" alt="<?php echo $title; ?>"></a>
                                </div>
                                <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title; ?></a></h3>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>






</div>