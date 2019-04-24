<!-- end header -->
<div id="main" class="wrapper">
    <?php echo $this->load->view('homepage/frontend/common/slider'); ?>
    <section class="top-content" style ="background-image: url(templates/frontend/resources/images/condotel.png);">
        <div class="container">

            <div class="top-content-title" >
                <?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)){ ?>
                <?php foreach ($tintuc as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>

                <h3 class="second-title wow fadeInUp">7 Lý do khách hàng không th? b? l?</h3>
                <h1 class="title-primary wow fadeInUp"><?php echo $value['title'] ?></h1>
                <div style=" margin-top:10px; margin-bottom:10px;" class="hr-custom "><span class="hr-inner " style=" width:150px; border-color:#262626;"><span class="hr-inner-style"></span></span></div>
                <p class="desc wow fadeInUp"><?php echo strip_tags($value['description']) ?></p>

                <div class="list-item-sec1" style="background-image: url('<?php echo $value['images'] ?>')"> <?php } } ?>
                    <div class="row row-item">
                        <?php foreach ($value['post'] as $keyp => $val) { ?>
                            <?php
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                            $image = getthumb($val['images'], TRUE);
                            $description = cutnchar($val['description'], 200);
                            ?>

                            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
                                <div class="iconbox-item">
                                    <div class="icon">
                                        <img src="<?php echo $image ?>" alt="hi">
                                    </div>
                                    <h3 class="title"><?php echo $val['title'] ?></h3>
                                    <p class="desc"><?php echo strip_tags($description) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>



            </div>
    </section>


    <section class="om-post-sample-optin  wow fadeInUp">
        <div class="container">
            <div class="sample-optin">
                <h3 class="title">NH?N B?NG SO SÁNH CHI TI?T NH?NG D? ÁN CONDOTEL HOT NH?T T? CHUYÊN GIA</h3>
                <p class="holine">HOTLINE: <?php echo $this->fcSystem['contact_phone'] ?></p>
                <form action="mailsubricre.html" method="post" id="sform1">
                    <div class="error uk-alert"></div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <input type="text" class=" fullname" name="fullname" placeholder="h? tên">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <input type="text" class=" phone" name="phone" placeholder="S? ?i?n tho?i">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <input type="text"  class=" email"  name="email" placeholder="Email">
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <input type="submit" value="??ng ký">
                        </div>
                    </div>
                </form>
                <script type="text/javascript" charset="utf-8">
                    $(document).ready(function(){
                        $('#sform1 .error').hide();
                        var uri = $('#sform1').attr('action');
                        $('#sform1').on('submit',function(){
                            var postData = $(this).serializeArray();
                            $.post(uri, {post: postData, fullname: $('#sform1 .fullname').val(), email: $('#sform1 .email').val(),phone: $('#sform1 .phone').val()},
                                function(data){
                                    var json = JSON.parse(data);
                                    $('#sform1 .error').show();
                                    if(json.error.length){
                                        $('#sform1 .error').removeClass('alert alert-success').addClass('alert alert-danger');
                                        $('#sform1 .error').html('').html(json.error);
                                    }else{
                                        $('#sform1 .error').removeClass('alert alert-danger').addClass('alert alert-success');
                                        $('#sform1 .error').html('').html('G?i yêu c?u thành công!.');
                                        $('#sform1').trigger("reset");
                                        setTimeout(function(){ location.reload(); }, 5000);
                                    }
                                });
                            return false;
                        });
                    });
                </script>
            </div>
        </div>
    </section>

    <section class="project-future">
        <?php if (isset($duan) && is_array($duan) && count($duan)){ ?>
            <?php foreach ($duan as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues');?>
                <div class="container">
                    <div class="top-content-title">
                        <h3 class="title-primary  wow fadeInUp"><?php echo $value['title'] ?></h3>
                        <div style=" margin-top:10px; margin-bottom:10px;" class="hr-custom  wow fadeInUp"><span class="hr-inner " style=" width:150px; border-color:#262626;"><span class="hr-inner-style"></span></span></div>
                        <p class="desc  wow fadeInUp"> <?php echo $value['description'] ?></p>
                    </div>


                </div>
                <div class="nav-project-future">
                    <div class="container-fluid">
                        <?php foreach ($value['post'] as $key => $val) { ?>
                            <?php
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                            $image = getthumb($val['images'], TRUE);
                            $description = cutnchar($val['description'], 300);
                            ?>
                            <div class="item-project wow fadeInUp ">
                                <div class="image">
                                    <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>"></a>
                                </div>
                                <div class="nav-img">
                                    <h3 class="entry-title"><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>
                                    <div class="avia-arrow"></div>
                                    <p class="desc"><?php echo strip_tags($description) ?></p>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php }} ?>
    </section>



    <section class="avia-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="avia-right">
                        <h3 class="title wow fadeInUp">Condotel Vi?t Nam</h3>
                        <div class="nav-avia">
                            <div class="accordion-container wow fadeInUp">
                                <div class="set">
                                    <a class="click-parent" href="#">Condotel là gì

                                    </a>
                                    <div class="content" style="display: block;">
                                        <p><?php echo $this->fcSystem['lydo_ld1'] ?></p>
                                    </div>
                                </div>
                                <div class="set">
                                    <a class="click-parent">
                                        Quy?n s? h?u Condotel là bao lâu?

                                    </a>
                                    <div class="content">
                                        <p><?php echo $this->fcSystem['lydo_ld2'] ?></p>
                                    </div>
                                </div>
                                <div class="set">
                                    <a class="click-parent">
                                        Ng??i n??c ngoài có ???c s? h?u condotel Vi?t Nam

                                    </a>
                                    <div class="content">
                                        <p><?php echo $this->fcSystem['lydo_ld3'] ?></p>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <p class="note1 wow fadeInUp">N?u quý v? v?n còn câu h?i v? Condotel Vi?t Nam, xin vui lòng ?? l?i thông tin</p>
                        <p class="note2 wow fadeInUp">CHUYÊN GIA C?A CHÚNG TÔI ?Ã S?N SÀNG GI?I ?ÁP M?I
                            CÂU H?I T? QUÝ V?</p>
                        <form action="mailsubricre.html" method="post" id="sform2" class="wow fadeInUp">
                            <div class="error uk-alert"></div>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" class="fullname" name="fullname" placeholder="H? và tên*">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" class="phone" name="phone" placeholder="S? ?i?n tho?i*">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" class="email" name="email" placeholder="Email*">
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="submit" value="??ng ký">
                                </div>
                            </div>
                        </form>
                        <script type="text/javascript" charset="utf-8">
                            $(document).ready(function(){
                                $('#sform2 .error').hide();
                                var uri = $('#sform2').attr('action');
                                $('#sform2').on('submit',function(){
                                    var postData = $(this).serializeArray();
                                    $.post(uri, {post: postData, fullname: $('#sform2 .fullname').val(), email: $('#sform2 .email').val(),phone: $('#sform2 .phone').val()},
                                        function(data){
                                            var json = JSON.parse(data);
                                            $('#sform2 .error').show();
                                            if(json.error.length){
                                                $('#sform2 .error').removeClass('alert alert-success').addClass('alert alert-danger');
                                                $('#sform2 .error').html('').html(json.error);
                                            }else{
                                                $('#sform2 .error').removeClass('alert alert-danger').addClass('alert alert-success');
                                                $('#sform2 .error').html('').html('G?i yêu c?u thành công!.');
                                                $('#sform2').trigger("reset");
                                                setTimeout(function(){ location.reload(); }, 5000);
                                            }
                                        });
                                    return false;
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="expert-view">
        <?php if (isset($chuyengia) && is_array($chuyengia) && count($chuyengia)){ ?>
            <?php foreach ($chuyengia as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues');?>
                <div class="container">
                <div class="top-content-title1">
                    <div class="title-primary wow fadeInUp"><?php echo $value['title'] ?></div>
                    <div style=" margin-top:10px; margin-bottom:10px;" class="hr-custom wow fadeInUp"><span class="hr-inner " style=" width:150px; border-color:#262626;"><span class="hr-inner-style"></span></span></div>
                </div>
                <div class="slider-expert-view owl-carousel wow fadeInUp">
                    <?php foreach ($value['post'] as $key => $val) { ?>
                        <?php
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                        $image = getthumb($val['images'], TRUE);
                        $description = cutnchar($val['description'], 300);
                        ?>
                        <div class="item">
                            <p class="desc"><?php echo $val['content'] ?></p>
                            <div class="avia-testimonial-meta">
                                <div class="img-avarta">
                                    <img src="<?php echo $image ?>" alt="hi">
                                </div>
                                <div class="avia-testimonial-meta-mini">
                                    <h3 class="title"><?php echo $val['title'] ?></h3>
                                    <p class="avia-testimonial"><?php echo $description ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="expert-view-content">
                <div class="row">
                <?php foreach ($value['post'] as $key => $val) { ?>
                    <?php
                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                    $image = getthumb($val['images'], TRUE);
                    $description = cutnchar($val['description'], 300);
                    ?>
                    <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp">
                        <div class="item">
                            <p class="desc"><?php echo strip_tags($val['content']) ?></p>
                            <div class="avarta">
                                <img src="<?php echo $image ?>" alt="hi">
                            </div>
                            <h3 class="title"><?php echo $val['title'] ?></h3>
                            <p class="desc-job"><?php echo $description ?></p>
                        </div>
                    </div>
                <?php }} ?>
            </div>
            </div>


            </div>
        <?php } ?>
    </section>



    <section class="avia-section-small ">
        <?php if (isset($thutuc) && is_array($thutuc) && count($thutuc)){ ?>
            <?php foreach ($thutuc as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues');?>
                <div class="container">
                    <div class="top-content-title">
                        <h3 class="second-title wow fadeInUp">Khi b?t g?p m?t d? án B?S</h3>
                        <h1 class="title-primary wow fadeInUp"><?php echo $value['title'] ?></h1>
                        <div style=" margin-top:10px; margin-bottom:10px;" class="hr-custom wow fadeInUp"><span class="hr-inner " style=" width:150px; border-color:#262626;"><span class="hr-inner-style"></span></span></div>
                    </div>
                    <div class="nav-icon-box">
                        <div class="row">
                            <?php foreach ($value['post'] as $keyp => $val) { ?>
                                <?php
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], TRUE);
                                $description = cutnchar($val['description'], 600);
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-6 wow fadeInUp">
                                    <div class="item">
                                        <div class="title-icon" style="background:  #006b32">
                                            <i class="fas fa-map-marker" style=" color: #006b32;border: 1px solid #006b32;"></i>
                                        </div>
                                        <div class="nav-item">
                                            <h3 class="title"><?php echo $val['title'] ?></h3>
                                            <p class="desc"><?php echo strip_tags($description) ?></p>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php }} ?>

    </section>



    <section class="register-home wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="item-register">
                        <h3 class="title">NHÀ ??U T? NH?N ???C GÌ KHI ??NG KÝ?</h3>
                        <div class="line"><img src="templates/frontend/resources/images/arrow-right-2.png" alt=""></div>
                        <p><?php echo $this->fcSystem['homepage_dangky'] ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="item-register item-register-right">
                        <h3 class="title">LÀ NHÀ ??U T? CHUYÊN NGHI?P</h3>
                        <p class="title1">Quý v? hãy n?m tr?n thông tin Condotel Vi?t Nam</p>
                        <h4 class="title2">??NG KÝ NGAY - HOTLINE: <?php echo $this->fcSystem['contact_hotline'] ?></h4>
                        <form action="mailsubricre.html" method="post" id="sform3">
                            <div class="error uk-alert"></div>
                            <input type="text" class="fullname" name="fullname" placeholder="H? tên">
                            <input type="text" class="phone" name="phone" placeholder="S? ?i?n tho?i">
                            <input type="text" class="email" name="email" placeholder="Email">
                            <input type="submit" value="??ng ký">
                        </form>
                        <script type="text/javascript" charset="utf-8">
                            $(document).ready(function(){
                                $('#sform3 .error').hide();
                                var uri = $('#sform3').attr('action');
                                $('#sform3').on('submit',function(){
                                    var postData = $(this).serializeArray();
                                    $.post(uri, {post: postData, fullname: $('#sform3 .fullname').val(), email: $('#sform3 .email').val(),phone: $('#sform3 .phone').val()},
                                        function(data){
                                            var json = JSON.parse(data);
                                            $('#sform3 .error').show();
                                            if(json.error.length){
                                                $('#sform3 .error').removeClass('alert alert-success').addClass('alert alert-danger');
                                                $('#sform3 .error').html('').html(json.error);
                                            }else{
                                                $('#sform3 .error').removeClass('alert alert-danger').addClass('alert alert-success');
                                                $('#sform3 .error').html('').html('G?i yêu c?u thành công!.');
                                                $('#sform3').trigger("reset");
                                                setTimeout(function(){ location.reload(); }, 5000);
                                            }
                                        });
                                    return false;
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-bottom wow fadeInUp">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="content-bottom-left">
                        <p>?ÀM THO?I CÙNG CHUYÊN GIA phone <?php echo $this->fcSystem['contact_phone'] ?> </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="content-botom-right">
                        <p>Quý v? v?n còn b?n kho?n v? Condotel Vi?t Nam? ??ng ng?n ng?i, hãy liên h? ngay v?i chúng tôi ?? ???c gi?i ?áp</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


</div>
<!-- class="" -->