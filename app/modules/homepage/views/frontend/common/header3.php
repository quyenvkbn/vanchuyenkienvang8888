

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
            <a href="<?php echo base_url(); ?>"><img class="img_logo_mb" src="<?php echo $this->fcSystem['homepage_logo'] ?>" /></a>
        </div>
    </div>
    <!-- /menu_mb -->
    <div class="clearfix clearfix-60 visible-sm visible-xs"></div>



    <!-- end mobile -->

    <div class="top_header">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <ul class="ul_top_header">
                            <li>
                                <a href="">
                                    <span class="bf_phone"></span>
                                    <?php echo $this->fcSystem['contact_phone'] ?>
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <span class="bf_map"></span>
                                <?php echo $this->fcSystem['contact_address'] ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4">
                        <div class="right_top_header">
                            <div class="right_icon hidden-sm hidden-xs">
                                <a class="fa fa-facebook" href="<?php echo $this->fcSystem['social_facebook'] ?>" target="_blank"></a>
                                <a class="fab fa-google-plus-g" href="<?php echo $this->fcSystem['social_google'] ?>" target="_blank"></a>
                                <a class="fab fa-youtube-square" href="<?php echo $this->fcSystem['social_youtube'] ?>" target="_blank"></a>
                                <a class="fa fa-instagram" href="<?php echo $this->fcSystem['social_linkedin'] ?>" target="_blank"></a>
                            </div>
                            <div class="eng_vn">
                                <a href="?lang=vietnamese"><img src="templates/frontend/resources/img/logo_vn.png" alt="vietnamese"/></a>
                                <a href="?lang=english"><img src="templates/frontend/resources/img/logo_elg.png" alt="english"/></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end top header -->
    <!-- bottom_header -->
    <div class="bottom_header">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                        <div class="logo_pc">
                            <a href="<?php echo base_url() ?>"><img src="<?php echo $this->fcSystem['homepage_logo'] ?>" alt="<?php echo $this->fcSystem['homepage_company'] ?>"/></a>
                        </div>
                    </div>

                    <!-- menu -->
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div id="sb-search" class="sb-search">
                            <form action="tim-kiem.html" method="get">
                                <input class="sb-search-input" placeholder="<?php echo $this->lang->line('search')?>" type="text"
                                value="" name="key" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"></span>
                            </form>
                        </div>

                        <div class="menu_main">
                            <nav class="nav is-fixed" role="navigation">
                                <div class="wrapper wrapper-flush">
                                    <div class="nav-container">
                                        <ul class="nav-menu menu clearfix">
                                            <?php $main_nav = navigations_array('main', $this->fc_lang); ?>
                                            <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
                                                <?php foreach ($main_nav as $key=>$val): ?>
                                                    
                                                    
                                                    <li class="menu-item <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])) { ?> has-dropdown
                                                    <?php } ?>
                                                    "><a href="<?php echo $val['href'] ?>" class="menu-link "><?php echo $val['title'] ?></a>
                                                    <ul class="nav-dropdown menu">
                                                        <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>

                                                            <?php foreach ($val['child'] as $key => $value): ?>
                                                                <li class="menu-item"><a href="<?php echo $value['href'] ?>" class="menu-link"><?php echo $value['title'] ?></a>
                                                                </li>
                                                            <?php endforeach ?>
                                                        <?php } ?>
                                                        
                                                    </ul>
                                                </li>
                                                
                                            <?php endforeach ?>
                                        <?php }?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end bottom_header -->



<!-- Banner -->

</header>
<!-- end header-->