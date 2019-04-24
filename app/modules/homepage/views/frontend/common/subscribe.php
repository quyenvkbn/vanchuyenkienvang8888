<div id="infomation-baogia" class="uk-modal account-modal"><!-- ĐĂNG NHẬP -->
    <div class="uk-modal-dialog modal modal-width-max">
        <a class="uk-modal-close uk-close"></a>
        <h2 class="heading"><span>Yêu cầu báo giá</span></h2>
        <section class="panel-body">
            <p>Để được tư vấn về các gói trả góp phù hợp nhất với quý khách, vui lòng liên hệ 0935 777 369 - Mr.Vinh - Đại diện phòng KD hoặc điền vào form Ước tính trả góp. Cảm ơn.</p>
            <form class="uk-form form" action="mailsubricre.html" method="post" id="sform">
                <div class="error uk-alert"></div>
                <div class="uk-grid uk-grid-medium lib-grid-0">
                    <div class="uk-width-large-1-1">
                        <div class="form-group mb10">
                            <label class="title-label">Họ và tên:</label>
                            <div class="item_form">
                                <input type="text" name="fullname" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <div class="uk-grid uk-flex-middle">
                                <div class="uk-width-1-2">
                                    <label class="title-label">Dòng xe:</label>
                                    <div class="item_form">
                                        <?php if(isset($productsList) && is_array($productsList) && count($productsList)){ ?>
                                            <select class="text uk-width-1-1" name="productname">
                                                <option value="">Chọn dòng xe</option>
                                                <?php foreach($productsList as $key => $val){ ?>
                                                    <option value="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="title-label">Hình thức thanh toán:</label>
                                    <div class="item_form uk-flex lib-grid-10">
                                        <span><input type="radio" name="check" value="0"> Trả góp</span>
                                        <span><input type="radio" name="check" value="1"> Trả hết</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Số điện thoại:</label>
                            <div class="item_form">
                                <input type="text" name="phone" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Khu vực:</label>
                            <div class="item_form">
                                <?php echo form_dropdown('cityid', $location_dropdown, set_value('cityid', 0), 'class="text uk-width-1-1"');?>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Email:</label>
                            <div class="item_form">
                               <input type="text" name="email" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="item_form uk-text-center">
                        <input  name="title" value="Tư vấn Online" type="hidden">
                        <button type="submit" name="" class="style-form-submit search-form-submit">
                            <?php echo $this->lang->line('register') ?>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('.error').hide();
        var uri = $('#sform').attr('action');
        $('#sform').on('submit',function(){
            var postData = $(this).serializeArray();
            $.post(uri, {post: postData, fullname: $('#fullname-modal').val(), phone: $('#phone-modal').val()},
            function(data){
                var json = JSON.parse(data);
                $('.error').show();
                if(json.error.length){
                    $('.error').removeClass('uk-alert-success').addClass('uk-alert-danger');
                    $('.error').html('').html(json.error);
                }else{
                    $('.error').removeClass('uk-alert-danger').addClass('uk-alert-success');
                    $('.error').html('').html('Gửi yêu cầu tư vấn online thành công!.');
                    $('#sform').trigger("reset");
                    setTimeout(function(){ location.reload(); }, 5000);
                }
            });
            return false;
        });
    });
</script>

<div id="infomation-tragop" class="uk-modal account-modal"><!-- ĐĂNG NHẬP -->
    <div class="uk-modal-dialog modal modal-width-max">
        <a class="uk-modal-close uk-close"></a>
        <h2 class="heading"><span>Ước tính trả góp</span></h2>
        <section class="panel-body">
            <p>Để đặt lịch lái thử xe Mercedes ngay hôm nay, hãy liên hệ 0935 777 369 - Mr.Vinh- Đại diện phòng KD hoặc điền vào form Đăng ký lái thử. Cảm ơn.</p>
            <form class="uk-form form" action="mailsubricre.html" method="post" id="sform">
                <div class="error uk-alert"></div>
                <div class="uk-grid uk-grid-medium lib-grid-0">
                    <div class="uk-width-large-1-1">
                        <div class="form-group mb10">
                            <label class="title-label">Họ và tên:</label>
                            <div class="item_form">
                                <input type="text" name="fullname" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <div class="uk-grid uk-flex-middle">
                                <div class="uk-width-1-2">
                                    <label class="title-label">Dòng xe:</label>
                                    <div class="item_form">
                                        <?php if(isset($productsList) && is_array($productsList) && count($productsList)){ ?>
                                            <select class="text uk-width-1-1" name="productname">
                                                <option value="">Chọn dòng xe</option>
                                                <?php foreach($productsList as $key => $val){ ?>
                                                    <option value="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="title-label">Hình thức thanh toán:</label>
                                    <div class="item_form uk-flex lib-grid-10">
                                        <span><input type="radio" name="check" value="0"> Trả góp</span>
                                        <span><input type="radio" name="check" value="1"> Trả hết</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Khu vực:</label>
                            <div class="item_form">
                                <?php echo form_dropdown('cityid', $location_dropdown, set_value('cityid', 0), 'class="text uk-width-1-1"');?>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Số điện thoại:</label>
                            <div class="item_form">
                                <input type="text" name="phone" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Email:</label>
                            <div class="item_form">
                               <input type="text" name="email" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="item_form uk-text-center">
                        <input  name="title" value="Tư vấn Online" type="hidden">
                        <button type="submit" name="" class="style-form-submit search-form-submit">
                            <?php echo $this->lang->line('register') ?>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>





<div id="infomation-laithu" class="uk-modal account-modal"><!-- ĐĂNG NHẬP -->
    <div class="uk-modal-dialog modal modal-width-max">
        <a class="uk-modal-close uk-close"></a>
        <h2 class="heading"><span>Đăng ký lái thử</span></h2>
        <section class="panel-body">
            <p>Để nhận được mức giá tốt nhất tháng cùng Mercedes Haxaco Hà Nội quý khách vui lòng liên hệ 0935 777 369 - Mr. Vinh- Đại diện phòng KD hoặc điền vào form báo giá nhanh. Cảm ơn.</p>
            <form class="uk-form form" action="mailsubricre.html" method="post" id="sform">
                <div class="error uk-alert"></div>
                <div class="uk-grid uk-grid-medium lib-grid-0">
                    <div class="uk-width-large-1-1">
                        <div class="form-group mb10">
                            <label class="title-label">Họ và tên:</label>
                            <div class="item_form">
                                <input type="text" name="fullname" value="" class="text uk-width-1-1"/>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <div class="uk-grid uk-flex-middle">
                                <div class="uk-width-1-2">
                                    <label class="title-label">Dòng xe:</label>
                                    <div class="item_form">
                                        <?php if(isset($productsList) && is_array($productsList) && count($productsList)){ ?>
                                            <select class="text uk-width-1-1" name="productname">
                                                <option value="">Chọn dòng xe</option>
                                                <?php foreach($productsList as $key => $val){ ?>
                                                    <option value="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="uk-width-1-2">
                                    <label class="title-label">Ngày lái thử:</label>
                                    <div class="item_form">
                                        <input type="text" name="date" value="" class="text uk-width-1-1 datetimepicker" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Khu vực:</label>
                            <div class="item_form">
                                <?php echo form_dropdown('cityid', $location_dropdown, set_value('cityid', 0), 'class="text uk-width-1-1"');?>
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Số điện thoại:</label>
                            <div class="item_form">
                                <input type="text" name="phone" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                        <div class="form-group mb10">
                            <label class="title-label">Email:</label>
                            <div class="item_form">
                               <input type="text" name="email" value="" class="text uk-width-1-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="item_form uk-text-center">
                        <input  name="title" value="Tư vấn Online" type="hidden">
                        <button type="submit" name="" class="style-form-submit search-form-submit">
                            <?php echo $this->lang->line('register') ?>
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>