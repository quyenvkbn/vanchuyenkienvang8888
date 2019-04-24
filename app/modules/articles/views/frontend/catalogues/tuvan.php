<article id="body_home">
    <div class="Navigation">
        <div class="container">
            <div class="row_pc">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home_page')?></a></li>
                    <li> <a href="#"><?php echo $this->lang->line('tvan')?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix-15"></div>
    <section class="page_sec">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <?php $this->load->view("homepage/frontend/common/aside"); ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h3 class="tit_dk"><?php echo $this->lang->line('dktv')?> </h3>
                        <form class="from_dk_page" action="mailsubricrecontact.html" method="post" id="sform" >
                            <div class="error uk-alert"></div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="row_5">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row_10">
                                                <input type="text" class="form-control fullname" placeholder="<?php echo $this->lang->line('fullname_customers')?>*" name="fullname">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row_10">
                                                <select name="" id="" class="form-control input-sm" onchange="nv_chang_viewtype();">
                                                    <option value="viewcat_page_list" selected=""> <?php echo $this->lang->line('gtinh')?> </option>
                                                    <option value="viewcat_page_list"> Nam</option>
                                                    <option value="viewcat_page_gird"> Nữ</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input_ad">
                                <input type="text" class="form-control address" placeholder="<?php echo $this->lang->line('address_customers')?>" name="address">
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row_5">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="row_10">
                                                    <input type="email" class="form-control email" placeholder="Email*" name="email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="row_10">
                                                    <input type="text"  class="form-control phone" placeholder="<?php echo $this->lang->line('phone_customers')?>*" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row_5">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="row_10">
                                                    <input type="text" class="form-control congty" placeholder="<?php echo $this->lang->line('cty')?>*" name="congty">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="row_10">
                                                    <input type="text"  class="form-control congty" placeholder="<?php echo $this->lang->line('cvu')?>*" name="chucvu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input_ad">
                                    <textarea class="text_tera cr_h message" name="message" placeholder="<?php echo $this->lang->line('contact_message')?>*"></textarea>
                                </div>
                                <div class="dk_n dk_n2">
                                    <input style="margin: 0px;
                                                    width: 100%;
                                                    height: 35px;
                                                    background: #21b354;
                                                    color: #fff;" type="submit" name="creatcontact" value="<?php echo $this->lang->line('submit_information') ?>"/>
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
    </section>
</article>
<div class="clearfix-60"></div>