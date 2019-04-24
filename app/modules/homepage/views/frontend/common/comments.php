<section class="list-question mb20">
    <div class="uk-grid-medium uk-grid">
        <div class="row">
            <div class="box_content_left col-lg-6 col-md-6">
                <div class="question-title">Khách hàng nói về chúng tôi</div>
                <ul class="comment-list ratingLst" data-page="1" data-canonical="<?php echo $canonical ?>">



                </ul>
                <div class="uk-clearfix"></div>
            </div>
            <div class="box_content_right col-lg-6 col-md-6">
                <div class="content-tab-details-text" id="tab12">
                    <div class="form-nx-contentab">
                        <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="text-form-input-details">
                                    <p style="font-family: 'Roboto', sans-serif;">VIẾT NHẬN XÉT VỀ SẢN PHẨM CỦA CHÚNG TÔI</p>

                                    <div class="form-col-boostrap">
                                        <form id="rateform" action="<?php echo site_url('comments/ajax/comments/addcomment'); ?>"
                                              method="post" class="uk-form form">
                                            <div class="error"></div>
                                            <input type="text" class="fullname form-control" id="rate-name" placeholder="Họ và tên" style="width: 100%;" ><br>
                                            <input type="text" class="phone form-control" id="rate-phone" placeholder="Số điện thoại" style="width: 100%;"><br>
                                            <textarea rows="5" class="message form-control" id="rate-content" placeholder="Nội dung" style="width: 100%;height: 132px;"></textarea>

                                            <div>
                                                <fieldset class="rating">
                                                    <input class="rate-poin-rdo" data-point="5" id="star5" name="star" value="5"
                                                           type="radio">
                                                    <label class="full" data-value="5" for="star5" title="Rất hài lòng: cho 5 sao"><i
                                                            class="fas fa-star"></i></label>
                                                    <input class="rate-poin-rdo" data-point="4" id="star4" name="star" value="4"
                                                           type="radio">
                                                    <label class="full" data-value="4" for="star4" title="Hài lòng: cho 4 sao"><i
                                                            class="fas fa-star"></i></label>
                                                    <input class="rate-poin-rdo" data-point="3" id="star3" name="star" checked=""
                                                           value="3" type="radio">
                                                    <label class="full" data-value="3" for="star3" title="Bình thường: cho 3 sao"><i
                                                            class="fas fa-star"></i></label>
                                                    <input class="rate-poin-rdo" data-point="2" id="star2" name="star" value="2"
                                                           type="radio">
                                                    <label class="full" data-value="2" for="star2" title="Trung bình: cho 2 sao"><i
                                                            class="fas fa-star"></i></label>
                                                    <input class="rate-poin-rdo" data-point="1" id="star1" name="star" value="1"
                                                           type="radio">
                                                    <label class="full" data-value="1" for="star1" title="Thất vọng: cho 1 sao"><i
                                                            class="fas fa-star"></i></label>
                                                </fieldset>
                                                <input type="hidden" name="star" data-star="3" id="hidden_star" value="3">

                                                <button type="submit" id="btn-submit-form" style="">NHẬN XÉT</button>
                                                <style>
                                                    #btn-submit-form {
                                                        background: #288ad6;
                                                        border: 1px solid #288ad6;
                                                        border-radius: 4px;
                                                        -webkit-border-radius: 4px;
                                                        -moz-border-radius: 4px;
                                                        font-size: 14px;
                                                        color: #fff;
                                                        padding: 9px 0;
                                                        margin: 5px 0;
                                                        width: 46%;
                                                        box-sizing: border-box;
                                                        display: inline-block;
                                                        text-align: center;
                                                    }
                                                </style>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>








<script type="text/javascript">


    $(function () {
        $('.full').on('click', function () {
            var star = $(this).attr('data-value');
            $('#hidden_star').attr('value', star);
        });
        $('.error').hide();

        //listcomment
        var module = '<?php echo $module ?>';
        var moduleid = '<?php echo $moduleid ?>';
        listComment(module, moduleid, $('.comment-list').attr('data-page'), $('.comment-list').attr('data-canonical'));
        function listComment(module, moduleid, page, canonical) {
            var uri = '<?php echo site_url('comments/ajax/comments/listComment'); ?>';
            $.post(uri, {module: module, moduleid: moduleid, page: page, canonical: canonical},
                function (data) {
                    var json = JSON.parse(data);
                    $('.comment-list').html(json.html);
                    load_scroll_text();
                });
        }

        //end list comment


        $(document).on('click', '#ajax-pagination-cmt a', function () {
            var page = $(this).attr('data-ci-pagination-page');
            listComment(module, moduleid, page, $('.comment-list').attr('data-canonical'));
            return false;
        });

        var uri = $('#rateform').attr('action');
        $('#rateform').on('submit', function () {
            var postData = $(this).serializeArray();
            var fullname = $('#rate-name').val();
            var phone = $('#rate-phone').val();
            var contents = $('#rate-content').val();
            var star = $('#hidden_star').val();
            $.post(uri, {
                    post: postData,
                    module: module,
                    moduleid: moduleid,
                    fullname: fullname,
                    phone: phone,
                    contents: contents,
                    star: star,
                    parentid: 0
                },
                function (data) {
                    var json = JSON.parse(data);
                    $('.error').show();
                    if (fullname == '') {
                        $('#rate-name').addClass('required');
                    }
                    if (phone == '') {
                        $('#rate-phone').addClass('required');
                    }
                    if (contents == '') {
                        $('#rate-content').addClass('required');
                    }
                    if (json.error.length) {
                        $('.error').removeClass('alert alert-success').addClass('alert alert-danger');
                        $('.error').html('').html(json.error);
                    } else {
                        $('.error').removeClass('alert alert-danger').addClass('alert alert-success');
                        $('.error').html('').html('Gửi bình luân thành công!.');
                        $('#rateform').trigger("reset");
                        setTimeout(function () {
                            window.location.href = '<?php echo $canonical ?>';
                        }, 3000);
                    }
                });
            return false;
        });
        $(document).on('click', '.ajax-pagination .uk-pagination li a', function () {
            var page = $(this).attr('data-ci-pagination-page');
            listComment(module, moduleid, page);
            return false;
        });
        $(document).on('click', '.a-expander-header a', function () {
            var flag = $(this).parent().attr('data-flag');
            if (flag == 0) {
                $(this).parent().parent().css('max-height', 'none');
                $(this).parent().attr('data-flag', 1);
                $(this).parent().find('.a-expander-content-fade').hide();
                $(this).html('<i class="fas fa-angle-up mr5"></i><span class="a-expander-prompt">Đóng lại</span>');
            } else {
                $(this).parent().parent().css('max-height', 200);
                $(this).parent().attr('data-flag', 0);
                $(this).parent().find('.a-expander-content-fade').show();
                $(this).html('<i class="fas fa-angle-down mr5"></i><span class="a-expander-prompt">Xem tiếp</span>');
            }
            // $(this).parent().
        });
    });

    $(document).on('click', '.item-reply', function () {
        $('.reply-comment').html('');
        var id = $(this).attr('data-id');
        var item = '<div class="rep-box-comment mb20">' +
            '<div class="error_comm uk-alert"></div>' +
            '<div class="infor-rate mt-clearfix">' +
            '<div class="avatar">' +
            '<span class="image mt-cover" title="bình luận">' +
            '<img src="<?php echo ((!empty($customer['images'])) ? $customer['images'] : 'templates/frontend/resources/images/no_avata.jpg') ?>" alt="cmt">' +
            '</span>' +
            '</div>' +
            '<div class="infor_for">' +
            '<div class="mb10"><textarea id="content_comm" class="txt-reply-comm" placeholder="Nội dung trả lời"></textarea></div>' +
            '<input name="parentid" id="parentid" value="' + id + '" type="hidden">' +
            '<input name="customersid" id="customersid" value="<?php echo ((!empty($customer['id'])) ? $customer['id'] : 0) ?>" type="hidden">' +
            '<div class="row-edit-10 row">' +
            '<div class="form-item col-md-3 mb10"><input value="<?php echo ((!empty($customer['fullname'])) ? $customer['fullname'] : '') ?>" class="info-contact-comm" id="name_comm" placeholder="Họ và tên bạn" type="text"></div>' +
            '<div class="form-item col-md-3 mb10"><input value="<?php echo ((!empty($customer['email'])) ? $customer['email'] : '') ?>" class="info-contact-comm" id="email_comm" placeholder="Email" type="text"></div>' +
            '<div class="form-item col-md-3 mb10"><input value="<?php echo ((!empty($customer['phone'])) ? $customer['phone'] : '') ?>" class="info-contact-comm" id="phone_comm" placeholder="Số điện thoại của bạn" type="text"></div>' +
            '<div class="form-item col-md-3 mb10"><a class="send-comment btn-send" title="Bấm vào đây để gửi bình luận">Gửi yêu cầu</a></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        $(this).parent().next().append(item);
        $('.error_comm').hide();
        return false;
    });
    $(document).on('click', '.send-comment', function () {
        var module = '<?php echo $module ?>';
        var moduleid = '<?php echo $moduleid ?>';
        var parentid = $('#parentid').val();
        var customersid = $('#customersid').val();
        var contents = $('#content_comm').val();
        var email = $('#email_comm').val();
        var fullname = $('#name_comm').val();
        var phone = $('#phone_comm').val();
        var uri = '<?php echo site_url('comments/ajax/comments/addcomment'); ?>';
        $(this).html('Đang xử lý');
        $.post(uri, {
                module: module,
                moduleid: moduleid,
                fullname: fullname,
                email: email,
                phone: phone,
                contents: contents,
                parentid: parentid,
                customersid: customersid
            },
            function (data) {
                var json = JSON.parse(data);
                $('.error_comm').show();
                if (fullname == '') {
                    $('#name_comm').addClass('required');
                }
                if (email == '') {
                    $('#email_comm').addClass('required');
                }
                if (phone == '') {
                    $('#phone_comm').addClass('required');
                }
                if (contents == '') {
                    $('#content_comm').addClass('required');
                }
                if (json.error.length) {
                    $('.error_comm').removeClass('uk-alert-success').addClass('uk-alert-danger');
                    $('.error_comm').html('').html(json.error);
                } else {
                    $('#name_comm').attr('value', '');
                    $('#email_comm').attr('value', '');
                    $('#phone_comm').attr('value', '');
                    $('#content_comm').attr('value', '');
                    $('.error_comm').removeClass('uk-alert-danger').addClass('uk-alert-success');
                    $('.error_comm').html('').html('Trả lời đánh giá thành công!.');
                    setTimeout(function () {
                        window.location.href = '<?php echo $canonical ?>';
                    }, 3000);
                }
            });
        return false;
    });


    function load_scroll_text() {
        $('.item-comments .description').each(function () {
            var h = $(this).height();
            var h2 = $(this).find('.scroll-text').height();
            if (h2 > h) {
                $(this).find('.a-expander-header').attr('data-flag', 0);
                $(this).find('.a-expander-header').show();
            }
        });
    }
</script>

<style>
    .top-box-comments h6 {
        font-size: 1.25em;
        font-weight: 600;
    }

    .top-box-comments {
        font-family: TPBaoMoi;
        padding: 20px 20px 10px;
        background-color: #f7f7f7f7;
        border: 1px solid #dedede;
    }

    .form-comment {
        overflow: hidden;
        margin-top: 10px;
    }

    .input-account-form {
        margin-bottom: 15px;
        position: relative;
    }

    .required {
        border: solid 1px #f00 !important;
        border-radius: 3px !important;
    }

    .comment-1 .info-form-comment, .comment-1 .input-comment {
        width: 100%;
        height: 80px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-indent: 5px;
        padding: 10px 5px;
        font-family: TPBaoMoi;
    }

    .form-item-title {
        width: 100%;
        font-weight: 600;
        line-height: 28px;
        display: block;
        font-size: 13px;
    }

    .prod-rate {
        position: relative;
        overflow: hidden;
        float: left;
    }

    .rating {
        border: none;
        margin: 0;
        padding: 0;
        color: #FBC926;
        float: left;
        margin-right: 10px;
    }

    input[type="radio"], input[type="checkbox"] {
        display: none !important;
    }

    .rating > input:checked ~ label, .rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
        color: #FBC926;
    }

    .rating > input:checked + label:hover, .rating > input:checked ~ label:hover, .rating > label:hover ~ input:checked ~ label, .rating > input:checked ~ label:hover ~ label {
        color: #FBC926;
    }

    .form-comment .button-comment {
        width: 100%;
        height: 32px;
        line-height: 32px;
        border: 1px solid #0092db;
        background-color: #0092db;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
        margin: 0 auto;
        text-align: center;
        font-family: TPBaoMoi;
    }

    .top-box-comments h3, .title-new-comment h3 {
        font-size: 15px;
        font-weight: 500;
    }

    #review-info .social-info {
        border-left: 1px solid #f0f0f0;
    }

    #review-info .input-form {
        width: 100% !important;
    }

    .input-form {
        border: 1px solid #ddd;
        background-color: #fdfdfd;
        height: 32px;
        color: #666;
        outline: none;
        text-indent: 5px;
        border-radius: 4px;
        font-size: 14px;
        font-family: TPBaoMoi;
    }

    .login-socials .signin-openID.facebook {
        background: #546ea6 url('/templates/frontend/resources/img/Facebook.png') no-repeat 0 center;
    }

    .login-socials .signin-openID.google {
        background: #df5656 url('/templates/frontend/resources/img/GooglePlus.png') no-repeat 0 center;
    }

    .login-socials .signin-openID:first-child {
        margin-right: 14px;
    }

    .login-socials .signin-openID {
        padding-right: 10px;
        text-indent: 30px;
        line-height: 24px;
        border-radius: 12px;
        color: #fff;
        display: inline-block;
        min-width: 100px;
    }

    .fll {
        float: left;
    }

    .flr {
        float: right;
    }

    .total-cmt.uk-clearfix {
        padding: 10px 0;
        font-size: 13px;
        color: #666;
    }

    .total-cmt .fll {
        font-size: 15px;
        font-weight: 500;
        display: block;
        color: #333;
    }

    .avatar.ec-cover span {
        line-height: 20px;
        text-align: center;
        border-radius: 3px;
        font-weight: 500;
        box-shadow: 0 0 3px rgba(0, 0, 0, .5);
        text-shadow: 1px 1px 0 #fff;
        display: block;
        width: 20px;
        text-transform: uppercase;
    }

    .author .meta .user {
        font-size: 14px;
        line-height: 20px;
        margin-right: 10px;
        color: #68b205;
        font-family: 'Open Sans', sans-serif;
    }

    .item-comments .content {
        font-size: 14px;
        line-height: 24px;
    }

    .item-comments {
        margin-top: 20px;
    }

    .amenu i {
        font-size: 11px;
    }

    .item-reply {
        cursor: pointer;
        background: linear-gradient(to bottom, #f7f8fa, #e7e9ec);
        box-shadow: 0 1px 0 rgba(255, 255, 255, .6) inset;
        display: inline-block;
        line-height: 30px;
        padding: 0 15px;
        color: #333;
        font-family: TPBaoMoi;
        border-radius: 3px;
        border-color: #ADB1B8 #A2A6AC #8D9096;
        border-style: solid;
        border-width: 1px;
    }

    .item-reply i {
        color: #0092db;
    }

    .fright i {
        color: #ff0000;
    }

    .reply-comment, .item-comments-sub {
        margin-top: 10px;
    }

    .rep-box-comment {
        background: #f5f5f5;
        padding: 10px 10px 0;
        position: relative;
        border: 1px solid #e9e9e9;
    }

    .rep-box-comment:after, .rep-box-comment:before {
        content: '';
        width: 0px;
        height: 0px;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        position: absolute;
    }

    .rep-box-comment:after {
        left: 5px;
        top: -10px;
        border-bottom: 10px solid #f5f5f5;
    }

    .rep-box-comment:before {
        left: 5px;
        top: -11px;
        border-bottom: 10px solid #e9e9e9;
    }

    .rep-box-comment .txt-reply-comm {
        width: 100%;
        height: 80px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-indent: 5px;
        padding: 10px 5px;
        font-family: TPBaoMoi;
    }

    .rep-box-comment .info-contact-comm {
        border: 1px solid #ddd;
        background-color: #fdfdfd;
        height: 32px;
        color: #666;
        outline: none;
        text-indent: 5px;
        border-radius: 4px;
        font-size: 14px;
        font-family: TPBaoMoi;
        width: 100%;
    }

    .send-comment.btn-send {
        display: block;
        height: 32px;
        line-height: 32px;
        border: 1px solid #0092db;
        background-color: #0092db;
        border-radius: 3px;
        color: #fff !important;
        cursor: pointer;
        margin: 0 auto;
        text-align: center;
        font-family: TPBaoMoi;
    }

    .item-comments-sub .item-comments {
        padding: 10px;
        background: #f0f0f0;
        border: 1px solid #e9e9e9;
        margin-bottom: 20px;
    }

    .uk-active-mod .user.uk-text-bold {
        color: #ff0000;
    }

    .uk-active-mod.item-comments .content, .uk-active-mod.item-comments .amenu, .comment-list {
        padding-left: 0 !important;
    }

    .item-comments .info .avatar {
        width: 60px;
        height: 60px;
    }

    .item-comments .info .avatar img {
        border-radius: 100%;
    }

    .description {
        line-height: 20px;
        font-family: TPBaoMoi;
    }

    .item-comments .info .author {
        width: -webkit-calc(100% - 60px);
        width: -moz-calc(100% - 60px);
        width: -ms-calc(100% - 60px);
        width: -o-calc(100% - 60px);
        width: calc(100% - 60px);
        padding-left: 10px;
        font-family: TPBaoMoi;
    }

    .item-comments .info .author .name {
        font-weight: 400;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .item-comments .info .author .date {
        font-size: 12px;
    }

    .item-comments .description {
        line-height: 20px;
        font-family: TPBaoMoi;
        color: #000;
        max-height: 200px;
        overflow: hidden;
        position: relative;
    }

    .item-comments-sub {
        padding-left: 25px;
    }

    .full {
        color: #ffbe00;
        font-size: 13px;
        letter-spacing: 1px;
        font-weight: 700;
    }

    label.full {
        float: right;
        padding: 10px 0px;
        font-size: 15px;
        color: #444;
        transition: all .2s;
        margin-bottom: 0;
    }

    /*label.full::before {*/
    /*content: '\f005';*/
    /*font-family: "Font Awesome 5 Free";*/
    /*font-weight: 400;*/
    /*}*/
    /*label.full:hover {*/
    /*transform: rotate(-15deg) scale(1.3);*/
    /*}*/
    .images_attachs {
        cursor: pointer
    }

    .infor-rate .avatar {
        float: left;
        width: 48px;
        height: 48px;
        margin-right: 10px;
    }

    .infor-rate .infor_for {
        float: right;
        width: -webkit-calc(100% - 58px);
        width: -moz-calc(100% - 58px);
        width: -ms-calc(100% - 58px);
        width: -o-calc(100% - 58px);
        width: calc(100% - 58px);
    }

    .images_attachs i {
        font-size: 17px;
        color: green;
    }

    .jfu-input-file {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        font-size: 23px;
        direction: ltr;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .list_album {
        display: none
    }

    .list-attachs-images li {
        float: left;
    }

    .list-attachs-images li img {
        height: 80px;
        border-left: 1px solid #fcfcfc;
    }

    .rating_show_list.mt15 {
        max-width: 290px;
    }

    .item_star span:first-child {
        width: 35px;
        color: #016fa7
    }

    .item_star span:last-child {
        width: -webkit-calc(100% - 45px);
        width: -moz-calc(100% - 45px);
        width: -ms-calc(100% - 45px);
        width: -o-calc(100% - 45px);
        width: calc(100% - 45px);
    }

    .item_star span:last-child .progress {
        border-radius: 2px;
        border: 1px solid #ababab;
    }

    .item_star span:last-child .progress .progress-bar {
        color: #333;
    }

    .rating > i, .rating_show_list i {
        margin-right: 3px;
    }
</style>
