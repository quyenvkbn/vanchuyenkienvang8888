<article id="body_home">
    <div class="Navigation">
        <div class="container">
            <div class="row_pc">
                <h3 style="font-family: auto;font-style: oblique;"> Kết quả tìm kiếm :</h3>
            </div>
        </div>
    </div>
    <section class="doanhnghiep">
        <div class="container">
            <div class="row_pc">
                <div class="content_txt">
                    <!-- Tab panes -->
                    <div class="tab-content style_prt">

                            <div class="row">
                                <?php if(isset($result) && is_array($result) && count($result)){ ?>

                                <?php foreach($result as $key => $val) { ?>
                                <?php
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                $image = getthumb($val['images'], TRUE);
                                $title = $val['title'];

                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-480-12">
                                    <div class="box_txt_s">
                                        <div class="img_txt_s h_6509">
                                            <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" class="w_100"></a>
                                        </div>
                                        <div class="text_txt_s">
                                            <h3><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php }}else { ?>
                                <?php echo " Không tìm thấy ... "; }?>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<div class="clearfix-60"></div>