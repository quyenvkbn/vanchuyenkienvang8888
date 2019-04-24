<header id="header">
    <div class="menu_mb butt_mobile visible-xs visible-sm clearfix">
        <button class="nav-toggle">
            <div class="icon-menu">
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
            </div>
        </button>
        <div class="text-center">
            <a href="<?php echo base_url(); ?>"><img class="img_logo_mb"
                                                     src="<?php echo $this->fcSystem['homepage_logo'] ?>"
                                                     alt="logo"/></a>
        </div>
    </div>
    <!-- /menu_mb -->
    <div class="clearfix clearfix-60 visible-sm visible-xs"></div>
    <div class="top_header ">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <ul class="ul_top_header">
                            <li>
                                <a href="">
                                    <span class="bf_phone"></span>
                                    Hotline: <?php echo $this->fcSystem['contact_hotline'] ?>
                                </a>
                            </li>
                            <li class="hidden-xs hidden-sm">
                                <span class="bf_map"></span>
                                Head Office: <?php echo $this->fcSystem['contact_address'] ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="right_top_header">
                            <div class="right_icon hidden-sm hidden-xs">
                                <a class="fa fa-facebook" href="<?php echo $this->fcSystem['social_facebook'] ?>"></a>
                                <a class="fab fa-google-plus-g"
                                   href="<?php echo $this->fcSystem['social_google'] ?>"></a>
                                <a class="fab fa-youtube-square"
                                   href="<?php echo $this->fcSystem['social_youtube'] ?>"></a>
                                <a class="fa fa-instagram" href="<?php echo $this->fcSystem['social_youtube'] ?>"></a>
                            </div>
                            <div class="eng_vn">
                                <a href="?lang=vietnamese"><img src="templates/frontend/resources/img/logo_vn.png" alt=""></a>
                                <a href="?lang=english"><img src="templates/frontend/resources/img/logo_elg.png" alt=""></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                        <div class="log_pc">
                            <a href="<?php echo base_url(); ?>"><img
                                    src="<?php echo $this->fcSystem['homepage_logo'] ?>"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="sologan">
                            <h1>GPO TRAINING</h1>

                            <p>Better people, better future!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <form class="form_search" action="tim-kiem.html" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control style_input"
                                       placeholder="Enter search keywords..." name="key" id="search">
                            </div>
                            <!-- /input-group -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <setion class="menu_main sticky-header">
        <div class="container">
            <div class="row_pc">
                <nav class="nav is-fixed" role="navigation">
                    <div class="wrapper wrapper-flush">
                        <div class="nav-container">
                            <ul class="nav-menu menu clearfix">
                                <?php $main_nav = navigations_array('main', $this->fc_lang); ?>
                                <?php if (isset($main_nav) && is_array($main_nav) && count($main_nav)) { ?>
                                    <?php foreach ($main_nav as $key => $val) { ?>

                                        <li class="menu-item has-dropdown"><a href="<?php echo $val['href'] ?>"
                                                                              class="menu-link "><?php echo $val['title'] ?></a>
                                            <ul class="nav-dropdown menu">
                                                <?php if (isset($val['child']) && is_array($val['child']) && count($val['child'])) { ?>

                                                    <?php foreach ($val['child'] as $key => $value){ ?>
                                                        <li class="menu-item"><a href="<?php echo $value['href'] ?>" class="menu-link"><?php echo $value['title'] ?></a>
                                                        </li>
                                                    <?php }} ?>
                                            </ul>
                                        </li>
                                    <?php }
                                } ?>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </setion>
    <div class="clearfix"></div>
    <section class="">
        <?php echo $this->load->view("homepage/frontend/common/slider"); ?>
    </section>
</header>
<!-- end header-->

<div class="clearix"></div>