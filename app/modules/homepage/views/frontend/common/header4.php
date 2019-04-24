<header id="header-site">

  <div class="header-site1">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
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
</div>
<div class="header-slogan">
  <h2 class="title-primary"><?php echo $this->fcSystem['homepage_brandname'] ?></h2>
  <p class="desc"><?php echo $this->fcSystem['homepage_company'] ?></p>
</div>
<div class="rightHeader">
 <div class="boxSearch">
  <form  class="formSearch" action="tim-kiem.html" method="get">
   <input class="txtSearch" id="fsearch"  placeholder="Nhập từ khóa để tìm kiếm..." type="text" value="" name="key">
   <button type="submit">Tìm kiếm</button>
 </form>
</div>

<div class="social">
  <a class="facebook" href="<?php echo $this->fcSystem['social_facebook'] ?>" rel="nofollow" target="_blank">
    <img src="templates/frontend/resources/images/fb-msg.png">
  </a>
  <a class="googleplus" href="<?php echo $this->fcSystem['social_zalo'] ?>"  rel="nofollow" target="_blank">
    <img src="templates/frontend/resources/images/zalo.png">
  </a>
  <a class="youtube" href="<?php echo $this->fcSystem['social_youtube'] ?>" rel="nofollow" target="_blank">
    <img src="templates/frontend/resources/images/sms.png">
  </a>
</div>
</div>
</div>
<div class="clearfix"></div>
<div id="main-menu">
  <ul>
    <?php $main_nav = navigations_array('main', $this->fc_lang); ?>
    <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
      <?php foreach ($main_nav as $key=>$val): ?>
        <li>
          <a href="<?php echo $val['href'] ?>"><?php echo $val['title'] ?></a>
          <ul class="sub-menu">
           <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>

            <?php foreach ($val['child'] as $key => $value): ?>
              <li><a href="<?php echo $val['href'] ?>"><?php echo $value['title'] ?></a></li>
            <?php endforeach ?>
          <?php } ?>
        </ul>
      </li>
    <?php endforeach ?>
  <?php  } ?>

</ul>
</div>
</header>