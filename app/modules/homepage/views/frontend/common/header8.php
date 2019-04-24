<header id="header-site">


    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <!-- begin mobile -->
                    <div class="wrapper cf">
                        <nav id="main-nav">

                            <ul class="second-nav">
                                <?php $main_nav = navigations_array('main', $this->fc_lang); ?>
                                <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
                                    <?php foreach ($main_nav as $key=>$val): ?>
                                        <li class="devices  ">
                                            <a href="<?php echo $val['href'] ?>"><?php echo $val['title'] ?></a>
                                            <ul>
                                                <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>

                                                    <?php foreach ($val['child'] as $key => $value): ?>
                                                        <li class="mobile">

                                                            <a href="<?php echo $value['href'] ?>"><?php echo $value['title'] ?></a>

                                                        </li>
                                                    <?php endforeach ?>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php endforeach ?>
                                <?php } ?>
                            </ul>

                        </nav>
                        <a class="toggle">
                            <span></span>
                        </a>
                    </div>
                    <!-- end mobile -->
                    <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo $this->fcSystem['homepage_logo'] ?>" alt="<?php echo $this->fcSystem['homepage_brandname'] ?>"></a>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <nav>
                        <ul class="navi-level-1 main-navi">
                            <?php $main_nav = navigations_array('main', $this->fc_lang); ?>
                            <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
                                <?php foreach ($main_nav as $key=>$val){ ?>
                                    <li class="has-sub">
                                        <a href="<?php echo $val['href'] ?>"><?php echo $val['title'] ?></a>
                                        <ul class="navi-level-2">
                                            <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>

                                                <?php foreach ($val['child'] as $key => $value){ ?>
                                                    <li><a href="<?php echo $value['href'] ?>"><?php echo $value['title'] ?></a></li>
                                                <?php }} ?>
                                        </ul>
                                    </li>
                                <?php }} ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="right-header">
        <ul class="navi-level-1 sub-navi">
            <li class="header-tel"><a class="tel-header" href="#"><i class="fa fa-phone" aria-hidden="true"></i> H? tr? 24/7:<br> <span><?php echo $this->fcSystem['contact_hotline'] ?> - <?php echo $this->fcSystem['contact_phone'] ?></span></a></li>

        </ul>
    </div>
    <div class="clearfix"></div>
</header>
<div class="clearfix"></div>
<!-- end header -->