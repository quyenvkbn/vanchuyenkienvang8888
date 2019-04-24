<article id="body_home">
    <div class="Navigation">
        <div class="container">
            <div class="row_pc">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>"><?php echo $this->lang->line('home_page')?></a></li>
                    <?php
                    $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
                    ?>
                    <li><a href="<?php echo $hrefX ?>"><?php echo $DetailCatalogues['title'] ?></a></li>
                    <li class="active"><?php echo $DetailProducts['title'] ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="detail_dt">
        <div class="container">
            <div class="row_pc">
                <div class="top_dt_dn">
                    <h2><?php echo $DetailCatalogues['title'] ?></h2>
                    <h1><?php echo $DetailProducts['title'] ?></h1>
                    <p>(2 days)</p>
                </div>
                <div class="img_Dt_c">
                    <img src="<?php echo $DetailProducts['images'] ?>" class="w_100">
                </div>
                <div class="clearfix"></div>
                <div class="row_8">
                    <div class="col-lg-6 col-md-6">
                        <div class="row_7">
                            <div class="box_ho">
                                <h3>abaut the course</h3>
                                <div class="text_ho">
                                    <?php echo $DetailProducts['description'] ?>
                                </div>
                                <div class="img_ho h_5840">
                                    <img src="<?php echo $DetailProducts['images'] ?>" class="w_100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row_7">
                            <div class="box_ho_2">
                                <div class="top_box_h_2">
                                    <h3>abaut the course</h3>
                                    <p>
                                        <?php echo $DetailProducts['content4'] ?>
                                    </p>
                                </div>
                                <div class="top_box_h_2">
                                    <h3>designed for</h3>
                                    <p>
                                        <?php echo $DetailProducts['tongquan'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="qwer_xth">
        <div class="container">
            <div class="row_pc">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo $this->lang->line('ttct')?></a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo $this->lang->line('time')?></a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><?php echo $this->lang->line('gvien')?></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content style_prt">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <p>
                            <?php echo $DetailProducts['daigia'] ?>
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <p>
                            <?php echo $DetailProducts['ttbando'] ?>
                        </p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        <p>
                            <?php echo $DetailProducts['mb'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<div class="clearfix-60"></div>