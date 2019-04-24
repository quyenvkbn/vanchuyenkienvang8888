<article id="body_home">
    <div class="Navigation">
        <div class="container">
            <div class="row_pc">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home_page')?></a></li>
                    <?php
                    $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
                    ?>
                    <li><a href="<?php echo $hrefX ?>"><?php echo $DetailCatalogues['title'] ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="page_sec">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="left_pr">
                            <?php
                            $ishome = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
                                'select' => 'id, title, slug, canonical, description, lft, rgt',
                                'where' => array('trash' => 0, 'publish' => 1, 'ishome' => 1, 'parentid' => 0, 'alanguage' => '' . $this->fc_lang . ''),
                                'order_by' => 'order asc, id desc',
                            ));
                            if (isset($ishome) && is_array($ishome) && count($ishome)) {
                                foreach ($ishome as $key => $val) {
                                    $ishome[$key]['child'] = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
                                        'select' => 'id, title, slug, canonical, description, lft, rgt',
                                        'where' => array('trash' => 0, 'publish' => 1, 'ishome' => 1, 'parentid' => $val['id'], 'alanguage' => '' . $this->fc_lang . ''),
                                        'order_by' => 'order asc, id desc',
                                    ));
                                }
                            }
                            ?>
                            <?php if (isset($ishome) && is_array($ishome) && count($ishome)) { ?>
                                <?php foreach ($ishome as $key => $val) { ?>
                                    <?php if (isset($val['child']) && is_array($val['child']) && count($val['child'])) { ?>
                                        <ul class="nav nav-tabs" role="tablist">
                                        <?php foreach ($val['child'] as $keyC => $valC) { ?>
                                            <?php $href = rewrite_url($valC['canonical'], $valC['slug'], $valC['id'], 'articles_catalogues'); ?>
                                            <li class="menu-item-aboutus"><a href="<?php echo base_url()?><?php echo $href ?>"><?php echo $valC['title'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <script>
                            $( window ).load(function() {
                                var url = window.location.href;
                                $('.menu-item-aboutus a[href="' + url + '"]').addClass('active');
                            });
                        </script>
                        <div class="news_nb">
                            <h2 class="title_prt_l"><span><?php echo $this->lang->line('dkntv')?></span></h2>

                            <form class="from_stl" action="" method="post">
                                <?php $error = validation_errors(); echo !empty($error) ? '<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>' : '';?>

                                <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('fullname_customers')?>" name="fullname">
                                <input type="number"  class="form-control" placeholder="<?php echo $this->lang->line('phone_customers')?>*"
                                       name="phone">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                                <input type="text" class="form-control" placeholder="<?php echo $this->lang->line('address_customers')?>" name="address">
                                <textarea class="text_tera" placeholder="<?php echo $this->lang->line('contact_message')?>" name="message"></textarea>

                                <div class="dk_n">
<!--                                    <a href="">Đăng ký ngay</a>-->
                                    <input
                                        style="margin: 0px;
                                        width: 100%;
                                        height: 35px;
                                        background: #21b354;
                                        color: #fff;" type="submit" name="create" value="<?php echo $this->lang->line('dkn')?>" />
                                </div>
                            </form>

                        </div>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <!-- Tab panes -->
                        <div class="tab-content style_prt">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <h3 style="text-align: center;"><?php echo $DetailCatalogues['title'] ?></h3>

                                <p> <?php echo $DetailCatalogues['description'] ?> </p>
                            </div>

                        </div>
                        <div class="mobile_vib">


                            <form class="from_stl hidden-lg hidden-md" action="mailsubricrecontact.html" method="post" id="sform">
                                <div class="error uk-alert"></div>
                                <input type="text" class="form-control fullname" placeholder="<?php echo $this->lang->line('fullname_customers')?>" name="fullname">
                                <input type="number"  class="form-control phone" placeholder="<?php echo $this->lang->line('phone_customers')?>*"
                                       name="phone">
                                <input type="email" class="form-control email" placeholder="Email" name="email">
                                <input type="text" class="form-control address" placeholder="<?php echo $this->lang->line('address_customers')?>" name="address">
                                <textarea class="text_tera message" placeholder="<?php echo $this->lang->line('contact_message')?>" name="message"></textarea>

                                <div class="dk_n">
                                    <input
                                        style="margin: 0px;
                                        width: 100%;
                                        height: 35px;
                                        background: #21b354;
                                        color: #fff;" type="submit" name="creatcontact" value="<?php echo $this->lang->line('dkn')?>" />
                                </div>
                            </form>
                            <script type="text/javascript" charset="utf-8">
                                $(document).ready(function(){
                                    $('#sform .error').hide();
                                    var uri = $('#sform').attr('action');
                                    $('#sform').on('submit',function(){
                                        var postData = $(this).serializeArray();
                                        $.post(uri, {post: postData, fullname: $('#sform .fullname').val(), email: $('#sform .email').val(), phone: $('#sform .phone').val(), chucvu: $('#sform .chucvu').val(), congty: $('#sform .congty').val(), message: $('#sform .message').val()},
                                            function(data){
                                                var json = JSON.parse(data);
                                                $('#sform .error').show();
                                                if(json.error.length){
                                                    $('#sform .error').removeClass('alert alert-success').addClass('alert alert-danger');
                                                    $('#sform .error').html('').html(json.error);
                                                }else{
                                                    $('#sform .error').removeClass('alert alert-danger').addClass('alert alert-success');
                                                    $('#sform .error').html('').html('Gửi yêu cầu thành công!.');
                                                    $('#sform').trigger("reset");
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
        </div>
    </section>
</article>
<div class="clearfix-60"></div>