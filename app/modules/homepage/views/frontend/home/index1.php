<div id="homepage" class="page-body">
    <section class="homepage-top mt10">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-small">
                <div class="uk-width-large-2-3">
                    <?php $this->load->view('homepage/frontend/common/slider') ?>
                    <section class="box_item_bottom">
                        <ul class="uk-grid list-item uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4">
                            <li class="mb10">
                                <div class="box_item_box uk-clearfix">
                                    <div class="thumb">
                                        <img src="templates/frontend/resources/img/item-1.png" alt="item">
                                    </div>
                                    <div class="info">Cam kết sản phẩm chính hãng 100%</div>
                                </div>
                            </li>
                            <li class="mb10">
                                <div class="box_item_box uk-clearfix">
                                    <div class="thumb">
                                        <img src="templates/frontend/resources/img/item-2.png" alt="item">
                                    </div>
                                    <div class="info">Bảo hành giá đắt 500.000đ trả lại xe</div>
                                </div>
                            </li>
                            <li class="mb10">
                                <div class="box_item_box uk-clearfix">
                                    <div class="thumb">
                                        <img src="templates/frontend/resources/img/item-3.png" alt="item">
                                    </div>
                                    <div class="info">Cứu hộ tận nơi miễn phí trong bảo hành</div>
                                </div>
                            </li>
                            <li class="mb10">
                                <div class="box_item_box uk-clearfix">
                                    <div class="thumb">
                                        <img src="templates/frontend/resources/img/item-4.png" alt="item">
                                    </div>
                                    <div class="info">Đổi hàng miễn phí trong 3 ngày</div>
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
                <div class="uk-width-large-1-3">
                    <?php $this->load->view('homepage/frontend/common/advertise') ?>
                </div>
            </div>
        </div>
    </section>
    <section class="homepage-homepage">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-small">
                <div class="uk-width-large-2-3">
                    <!-- Quản cáo -->
                    <?php $advhome = $this->FrontendSlides_Model->Read('adversite-2', $this->fc_lang); ?>
                    <?php if(isset($advhome) && is_array($advhome) && count($advhome)){ ?>
                        <?php foreach($advhome as $key => $val){ ?>
                            <div class="banner mb10">
                                <a href="<?php echo $val['url']; ?>" title="<?php echo $val['title']; ?>" class="img-cover">
                                    <img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>" />
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- END Quảng cáo -->
                </div>
                <div class="uk-width-large-1-3">
                    <?php $this->load->view('homepage/frontend/common/hotproducts') ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Products Home -->
    <?php if (isset($productshome) && is_array($productshome) && count($productshome)) { ?>
        <section class="homepage-catalogues">
            <div class="uk-container uk-container-center">
                <section class="panel-body">
                    <ul class="uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-3 list-products" data-uk-grid-match="{target: '.product .title'}">
                        <?php foreach($productshome as $key => $val){ ?>
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
                            <li class="mb10">
                                <div class="product">
                                    <div class="thumb">
                                        <a class="image img-scaledown" href="<?php echo $href ?>" title="<?php echo $title; ?>">
                                            <img src="<?php echo $val['images'] ?>" alt="<?php echo $title; ?>" />
                                            <?php if ($price_sale != ''): ?>
                                                <div class="price_sale">- <?php echo $price_sale ?></div>
                                            <?php endif ?>
                                            <div class="item_pos <?php echo (($val['highlight'] == 1) ? 'highlight' : (($val['psale'] == 1) ? 'psale' : (($val['isfooter'] == 1) ? 'pnews' : ''))) ?>"></div>
                                            <div class="description">
                                                <div class="style_des">
                                                    <?php echo $val['description'] ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="infor">
                                        <div class="padding-box">
                                            <h3 class="title">
                                                <a href="<?php echo $href ?>" title="<?php echo $title; ?>">
                                                    <?php echo $title; ?>
                                                </a>
                                            </h3>
                                            <div class="uk-flex uk-flex-middle uk-flex-space-between price-products">
                                                <div class="price-prd">
                                                    <div class="mb5 uk-flex uk-flex-middle uk-grid-small">
                                                        <span class="price-old"><?php echo $giaold ?></span>
                                                        <span class="price-sales"><?php echo $gia ?></span>
                                                    </div>
                                                    <div class="star_item"></div>
                                                </div>
                                                <?php if ($sale != ''): ?>
                                                    <div class="sale-property">-<?php echo $sale ?>%</div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="sale_ relative">
                                            <?php if ($val['content2'] != ''): ?>
                                                <div class="sale_content"><?php echo $val['content2'] ?></div>
                                            <?php endif ?>
                                            <div class="box_absolute">
                                                <div class="uk-flex uk-flex-middle uk-flex-space-between lib-grid-15">
                                                    <div class="box_more">
                                                        <a href="<?php echo $href ?>" title="<?php echo $title; ?>">Xem chi tiết</a>
                                                    </div>
                                                    <div class="box_more">
                                                        <a href="">Chọn so sánh</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .infor -->
                                </div><!-- .product -->
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </div>
        </section>
    <?php } ?>

    <!-- Tag list -->
    <?php if (isset($listTag) && is_array($listTag) && count($listTag)): ?>
        <section class="listTag mt20">
            <div class="uk-container uk-container-center">
                <section class="panel-body uk-flex uk-flex-center">
                    <ul class="uk-list uk-list_tag">
                        <?php foreach ($listTag as $key => $val) { ?>
                            <?php $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'tags'); ?>
                            <li>
                                <a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </div>
        </section>
    <?php endif ?>

    <!-- Tin tức -->
    <?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)): ?>
        <?php foreach ($tintuc as $key => $value) { ?>
            <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
            <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>
                <section class="homepage-news mt20 mb30">
                    <div class="uk-container uk-container-center">
                        <header class="panel-head">
                            <h2 class="heading uk-text-center mb20">
                                <a href="<?php echo $hrefC ?>" title="<?php echo $value['title'] ?>">
                                    <?php echo $value['title'] ?>
                                </a>
                            </h2>
                        </header>
                        <section class="panel-body">
                            <div class="uk-slidenav-position slider-2" data-uk-slider="{autoplay: true, autoplayInterval: 5500}">
                                <div class="uk-slider-container">
                                    <ul class="uk-slider uk-grid uk-grid-medium uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-3 list-news" data-uk-grid-match="{target: '.article .title'}">
                                        <?php foreach ($value['post'] as $keyp => $val) { ?>
                                            <?php 
                                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                                                $image = getthumb($val['images'], TRUE);
                                                $description = cutnchar($val['description'], 300); 
                                            ?>
                                            <li>
                                                <article class="article">
                                                    <div class="thumb">
                                                        <a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $val['title']?>">
                                                            <img src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>">
                                                        </a>
                                                    </div>
                                                    <div class="infor">
                                                        <h3 class="title">
                                                            <a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
                                                                <?php echo $val['title'] ?>    
                                                            </a>
                                                        </h3>
                                                        <div class="content uk-clearfix">
                                                            <div class="created_post">
                                                                <span class="date_post">
                                                                    <?php echo show_time($val['created'], 'd') ?>
                                                                </span>
                                                                <span class="month_post">
                                                                    <?php echo 'Tháng '.show_time($val['created'], 'm') ?>
                                                                </span>
                                                            </div>
                                                            <div class="description">
                                                                <?php echo $description ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            <?php endif ?>
        <?php } ?>
    <?php endif ?>
</div>
<?php function FunctionName($value=''){ ?>
    <section class="homepage-general">
        <div class="uk-container uk-container-center">
            <div class="uk-grid lib-grid-20">
                <div class="uk-width-large-1-2 mb20">
                    
                </div>
                <div class="uk-width-large-1-2">
                    <div class="uk-grid lib-grid-20">
                        <div class="uk-width-large-1-2 mb20">
                            <?php if (isset($download) && is_array($download) && count($download)): ?>
                                <section class="homepage-download">
                                    <header class="panel-head">
                                        <h2 class="heading">
                                            <a href="download.html" title="Downloads">Downloads</a>
                                        </h2>
                                    </header>
                                    <section class="panel-body">
                                        <ul class="uk-list uk-list-download">
                                            <?php foreach ($download as $key => $val) { ?>
                                                <?php $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'address'); ?>
                                                <li>
                                                    <div class="box_download uk-clearfix">
                                                        <div class="thumb">
                                                            <a class="img img-scaledown" title="<?php echo $val['title'] ?>" href="<?php echo $href ?>">
                                                                <img src="templates/frontend/resources/img/file_img.png" alt="files">
                                                            </a>
                                                        </div>
                                                        <div class="infor">
                                                            <h4 class="title mb0">
                                                                <a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
                                                                    <?php echo $val['title'] ?>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </section>
                                </section>
                            <?php endif ?>
                        </div>
                        <div class="uk-width-large-1-2 mb20">
                            <section class="homepage-form-contact">
                                <header class="panel-head">
                                    <h2 class="heading mb0">
                                        <a href="download.html" title="Gửi liên hệ">Gửi liên hệ</a>
                                    </h2>
                                </header>
                                <section class="panel-body">
                                    <form class="uk-form form" action="mailsubricre.html" method="post" id="sform">
                                        <div class="error uk-alert"></div>
                                        <div class="form-group mb10">
                                            <div class="item_form">
                                                <input type="text" name="fullname" value="" class="text uk-width-1-1 fullname" placeholder="Họ và tên của bạn" />
                                            </div>
                                        </div>
                                        <div class="form-group mb10">
                                            <div class="item_form">
                                               <input type="text" name="email" value="" class="text uk-width-1-1 email" placeholder="Email của bạn" />
                                            </div>
                                        </div>
                                        <div class="form-group mb10">
                                            <div class="item_form">
                                                <input type="text" name="phone" value="" class="text uk-width-1-1 phone" placeholder="Số điện thoại của bạn" />
                                            </div>
                                        </div>
                                        <div class="form-group mb10">
                                            <div class="item_form">
                                                <textarea name="message" placeholder="Nội dung" cols="30" rows="7" class="text uk-width-1-1"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="item_form">
                                                <input  name="title" value="Liên hệ nhanh" type="hidden">
                                                <button type="submit" class="style-form-submit search-form-submit">
                                                    <?php echo $this->lang->line('register') ?>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <script type="text/javascript" charset="utf-8">
                                        $(document).ready(function(){
                                            $('#sform .error').hide();
                                            var uri = $('#sform').attr('action');
                                            $('#sform').on('submit',function(){
                                                var postData = $(this).serializeArray();
                                                $.post(uri, {post: postData, fullname: $('#sform .fullname').val(), phone: $('#sform .phone').val()},
                                                function(data){
                                                    var json = JSON.parse(data);
                                                    $('#sform .error').show();
                                                    if(json.error.length){
                                                        $('#sform .error').removeClass('uk-alert-success').addClass('uk-alert-danger');
                                                        $('#sform .error').html('').html(json.error);
                                                    }else{
                                                        $('#sform .error').removeClass('uk-alert-danger').addClass('uk-alert-success');
                                                        $('#sform .error').html('').html('Gửi yêu cầu thành công!.');
                                                        $('#sform').trigger("reset");
                                                        setTimeout(function(){ location.reload(); }, 5000);
                                                    }
                                                });
                                                return false;
                                            });
                                        });
                                    </script>
                                </section>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('homepage/frontend/common/advertise') ?> 
    <section class="homepage-category">
        <div class="uk-container uk-container-center">
            <div class="uk-grid lib-grid-20">
                <div class="uk-width-large-3-4">
                    
                </div>
                <div class="uk-width-large-1-4">
                    <?php if (isset($video_home) && is_array($video_home) && count($video_home)): ?>
                        <?php foreach ($video_home as $key => $vals) { ?>
                            <?php $hrefC = rewrite_url($vals['canonical'], $vals['slug'], $vals['id'], 'videos_catalogues'); ?>
                            <?php if (isset($vals['post']) && is_array($vals['post']) && count($vals['post'])): ?>
                                <section class="homepage-video">
                                    <header class="panel-head">
                                        <h2 class="heading">
                                            <a href="<?php echo $hrefC ?>" title="<?php echo $vals['title'] ?>">
                                                <?php echo $vals['title'] ?>
                                            </a>
                                        </h2>
                                    </header>
                                    <section class="panel-body">
                                        <ul class="uk-grid list-category uk-grid-width-small-1-2 uk-grid-width-large-1-1">
                                            <?php foreach ($vals['post'] as $key => $val) { ?>
                                                <?php 
                                                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'videos');
                                                    $image = $val['images'];
                                                ?>
                                                <li>
                                                    <div class="video-box">
                                                        <div class="thumb">
                                                            <a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
                                                                <img src="<?php echo $image; ?>" alt="<?php echo $val['title'] ?>" />
                                                                <span class="player"></span>
                                                            </a>
                                                        </div>
                                                        <div class="infor">
                                                            <h3 class="title">
                                                                <a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
                                                                    <?php echo $val['title'] ?>
                                                                </a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </section>
                                </section>
                            <?php endif ?>
                        <?php } ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>