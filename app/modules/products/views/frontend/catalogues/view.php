<div id="main" class="wrapper main-product">
    <div class="container">
        <div class="top-content-product">
            <h1>Sản phẩm uy tín, chất lượng, an toàn sức khỏe người tiêu dùng</h1>
            <p>
                <?php echo $DetailCatalogues['description'] ?>
            </p>
        </div>

        <section class="content-product">
            <h2 class="title-primary wow fadeInUp"><img src="templates/frontend/resources/images/i.png" alt=""><?php echo $DetailCatalogues['title'] ?></h2>
            <div class="nav-content-product">
                <div class="row">
                    <?php if(isset($productsList) && is_array($productsList) && count($productsList)){ ?>
                    <?php foreach ($productsList as $key => $val) { ?>
                    <?php
                    $title = $val['title'];
                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                    $image = getthumb($val['images'], FALSE);
                    $description = cutnchar($val['description'], 200);
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp">
                        <div class="item-pro">
                            <div class="image">
                                <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                            </div>
                            <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                            <p class="contact-product">LH: <?php echo $this->fcSystem['contact_phone'] ?> để lấy báo giá bán buôn</p>
                            <div class="price-detail">
                                <div class="price">Giá:<span> Liên hệ </span></div>
                                <div class="detai-pro">
                                    <a href="<?php echo $href ?>">Chi tiết</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <nav class="nav-page" aria-label="Page navigation navigation-page">
                    <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                </nav>
            </div>
        </section>

        </section>
        <?php $this->load->view('homepage/frontend/common/lailatuday') ?>
    </div>



</div>