<?php  
    $this->db->select('*')->from('counter_values');
    $row = $this->db->get()->row_array();
    $this->db->select('*')->from('counter_ips');
    $online = $this->db->count_all_results();
    $address = $this->Frontendaddress_Model->ReadByCondition(array(
        'select' => 'id, title, size, type, attachs, canonical, slug',
        'table' => 'address',
        'where' => array('publish' => 1, 'trash' => 0, 'typeoff' => 0, 'alanguage' => $this->fc_lang),
        'limit' => 5,
        'order_by' => 'id desc',
    ));
    $khachhang = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array('select' => 'id, title, slug, canonical, images, lft, rgt','where' => array('trash' => 0,'publish' => 1, 'id' => 46, 'alanguage' => ''.$this->fc_lang.''),'limit' => 1,'order_by' => 'order asc, id desc'));
    if(isset($khachhang) && is_array($khachhang) && count($khachhang)){
        foreach($khachhang as $key => $val){
            $khachhang[$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
                'modules' => 'articles',
                'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`cataloguesid`, `pr`.`viewed`, `pr`.`created`',
                'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
                'limit' => 4,
                'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
                'cataloguesid' => $val['id'],
            ));
        }
    }   
?>
<!-- Khách hàng -->
<?php if (isset($khachhang) && is_array($khachhang) && count($khachhang)): ?>
    <?php foreach ($khachhang as $key => $vals) { ?>
        <?php $hrefC = rewrite_url($vals['canonical'], $vals['slug'], $vals['id'], 'articles_catalogues'); ?>
        <?php if (isset($vals['post']) && is_array($vals['post']) && count($vals['post'])): ?>
            <section class="homepage-khachhang mt20 mb20">
                <div class="uk-container uk-container-center">
                    <header class="panel-head ">
                        <h2 class="heading uk-text-center mb20">
                            <a href="<?php echo $hrefC ?>" title="<?php echo $vals['title'] ?>">
                                <?php echo $vals['title'] ?>
                            </a>
                        </h2>
                    </header>
                    <section class="panel-body">
                       <ul class="uk-grid uk-grid-medium uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-4 list-khachhang" data-uk-grid-match="{target: '.article .title'}">
                            <?php foreach ($vals['post'] as $key => $val) { ?>
                                <?php 
                                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                                    $image = $val['images']; 
                                    $description = cutnchar(strip_tags($val['description']), 300);
                                ?>
                                <li class="mb25">
                                    <div class="category">
                                        <div class="thumb">
                                            <a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
                                                <img src="<?php echo $image; ?>" alt="<?php echo $val['title'] ?>" />
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
                </div>
            </section>
        <?php endif ?>
    <?php } ?>
<?php endif ?>

<!-- Homepage address -->
<section class="homepage-general">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-medium">
            <div class="uk-width-large-2-3 mb20">
                <?php if (isset($address) && is_array($address) && count($address)): ?>
                    <section class="col-homepage-general">
                        <header class="panel-head">
                            <div class="heading">
                                <span>Cơ sở</span>
                            </div>
                        </header>
                        <section class="panel-body">
                            <div class="uk-grid uk-grid-medium">
                                <div class="uk-width-large-1-2">
                                    <ul class="uk-list uk-clearfix tabControl-home" data-uk-switcher="{connect:'#tabContent-home'}">
                                        <?php foreach ($address as $keya => $val) { ?>
                                            <li <?php echo (($keya == 0) ? 'class="uk-active"' : '') ?>><?php echo $val['title'] ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="uk-width-large-1-2">
                                    <ul id="tabContent-home" class="uk-switcher tab-content">
                                        <?php foreach ($address as $key => $vals) { ?>
                                            <li>
                                                <img src="<?php echo $vals['attachs'] ?>" alt="<?php echo $vals['title'] ?>">
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </section>
                <?php endif ?>
            </div>
            <div class="uk-width-large-1-3 mb20">
                <section class="col-homepage-general">
                    <header class="panel-head">
                        <div class="heading">
                            <span>Fanpage Facebook</span>
                        </div>
                    </header>
                    <section class="panel-body">
                        <div class="fb-page" data-href="<?php echo $this->fcSystem['social_facebook'] ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $this->fcSystem['social_facebook'] ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $this->fcSystem['social_facebook'] ?>">Facebook</a></blockquote></div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- FOOTER -->
<footer class="footer">
    <section class="lower">
        <div class="uk-container uk-container-center">
            <div class="uk-grid">
                <div class="uk-width-large-1-2 mb20">
                    <section class="footer_box uk-clearfix mb20">
                        <div class="thumb">
                            <a href="<?php echo BASE_URL ?>" title="<?php echo $this->fcSystem['homepage_company'] ?>">
                                <img src="<?php echo $this->fcSystem['homepage_logo'] ?>" alt="<?php echo $this->fcSystem['homepage_company'] ?>" />
                            </a>
                        </div>
                        <div class="info">
                            <div class="heading-footer"><span><?php echo $this->fcSystem['homepage_company'] ?></span></div>
                            <p><span>Trụ sở chính: </span><?php echo $this->fcSystem['contact_address'] ?></p>
                            <p><span>Email: </span><?php echo $this->fcSystem['contact_email'] ?></p>
                        </div>
                    </section>
                    <section class="footer-hotline uk-clearfix">
                        <div class="hotline-box">
                            <div class="call_now mb5"><span>Gọi ngay </span>để được tư vấn miễn phí</div>
                            <div class="box_color_box">
                                <?php  
                                    $sub_str = explode('-', $this->fcSystem['contact_hotline']);
                                    if (isset($sub_str) && is_array($sub_str)) {
                                        foreach ($sub_str as $key => $value) {
                                            echo (($key != 0) ? '<br>' : '').$value;
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="social-online">
                            <p>Liên kết mạng xã hội</p>
                            <ul class="uk-list uk-list-foot uk-flex uk-flex-middle lib-grid-5 mb10">
                                <li>
                                    <a class="fb" href="<?php echo $this->fcSystem['social_facebook'] ?>">Facebook</a>
                                </li>
                                <li>
                                    <a class="go" href="<?php echo $this->fcSystem['social_google'] ?>">Google</a>
                                </li>
                                <li>
                                    <a class="yo" href="<?php echo $this->fcSystem['social_youtube'] ?>">Youtube</a>
                                </li>
                            </ul>
                            <p class="mb0">Đang online: <span><?php echo $online ?></span></p>
                            <p class="mb0">Tổng truy cập: <span><?php echo $row['all_value'] ?></span></p>
                        </div>
                    </section>
                </div>
                <div class="uk-width-large-1-2 mb20">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-1-2 mb20">
                            <?php $this->load->view('homepage/frontend/common/menu_footer') ?>
                        </div>
                        <div class="uk-width-large-1-2 mb20">
                            <section class="footer_box_col">
                                <header class="panel-head mb30">
                                    <div class="heading"><span>Đăng ký nhận bản tin</span></div>
                                </header>
                                <section class="panel-body">
                                    <form class="uk-form form" action="mailsubricre.html" method="post" id="sform_footer">
                                        <div class="error uk-alert"></div>
                                        <div class="item_form mb20">
                                           <input type="text" name="email" value="" class="text uk-width-1-1 email" placeholder="Email của bạn" />
                                            <input  name="title" value="Đăng ký Email" type="hidden">
                                            <button type="submit" class="style-form-submit">Sent</button>
                                        </div>
                                    </form>
                                    <p>Thanh toán miễn phí với</p>
                                    <img src="templates/frontend/resources/img/item-payment.png" alt="item">
                                </section>
                                <script type="text/javascript" charset="utf-8">
                                    $(document).ready(function(){
                                        $('#sform_footer .error').hide();
                                        var uri = $('#sform_footer').attr('action');
                                        $('#sform_footer').on('submit',function(){
                                            var postData = $(this).serializeArray();
                                            $.post(uri, {post: postData, email: $('#sform_footer .email').val()},
                                            function(data){
                                                var json = JSON.parse(data);
                                                $('#sform_footer .error').show();
                                                if(json.error.length){
                                                    $('#sform_footer .error').removeClass('uk-alert-success').addClass('uk-alert-danger');
                                                    $('#sform_footer .error').html('').html(json.error);
                                                }else{
                                                    $('#sform_footer .error').removeClass('uk-alert-danger').addClass('uk-alert-success');
                                                    $('#sform_footer .error').html('').html('Gửi yêu cầu tư vấn online thành công!.');
                                                    $('#sform_footer').trigger("reset");
                                                    setTimeout(function(){ location.reload(); }, 5000);
                                                }
                                            });
                                            return false;
                                        });
                                    });
                                </script>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="upper">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="coppyright">Coppyright 2017 <?php echo $this->fcSystem['homepage_brandname'] ?>. Thiết kế bởi <a href="http://thietkewebtamphat.com/" title="TamPhat Software">TamPhat</a></div>
            </div>
        </div>
    </section>
</footer><!--.footer -->
<a id="goTop" class="goTop goTop-page" href="#" title="Về đầu trang"><i class="fa fa-angle-up"></i></a>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'vi'}</script>