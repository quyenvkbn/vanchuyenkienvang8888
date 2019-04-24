
 <header id="header-site">
    <div class="top-header">
      <div class="container">
        <!-- begin mobile -->
    <div class="wrapper cf">
      <?php $main_nav = navigations_array('main', $this->fc_lang);?>
      <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)){ ?>
       <nav id="main-nav">
          <ul class="second-nav">
            <?php foreach($main_nav as $key => $val){ ?>
              <li>
                <a href="<?php echo $val['href']; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title'] ?></a>
                <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>
                  <div class="dropdown-menu">
                      <ul class="uk-list sub-menu">
                    <?php foreach($val['child'] as $key => $vals){ 
                      ?><li>
                        <a href="<?php echo $vals['href']; ?>" title="<?php echo $vals['title']; ?>"><?php echo $vals['title']; ?></a>
                        <?php if(isset($vals['child']) && is_array($vals['child']) && count($vals['child'])){
                          show_item_menu($vals['child']); } ?>

                      </li><?php } ?>
                    </ul>
                  </div>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
       
       </nav>
       <?php } ?>
       <a class="toggle">
       <span></span>
       </a>
    </div>
    <!-- end mobile -->
         <a href="" class="logo">
          <img src="<?= $this->fcSystem['homepage_logo'] ?>" alt="">
        </a>
      </div>
     
    </div>
    <nav id="site-navigation" class="main-navigation">
       <div class="container">
          <div class="row">
             <div class="primary-menu-container visible-lg col-lg-12">
                <ul id="primary-menu" class="primary-menu menu clearfix">
                  <?php foreach($main_nav as $key => $val){ ?>
                    <li class="menu-item">
                      <a href="<?php echo $val['href']; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title'] ?></a>
                      <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>
                        <ul class="sub-menu">
                          <?php foreach($val['child'] as $key => $vals){ ?>
                            <li class="menu-item">
                              <a href="<?php echo $vals['href']; ?>" title="<?php echo $vals['title']; ?>"><?php echo $vals['title']; ?></a>
                              <?php if(isset($vals['child']) && is_array($vals['child']) && count($vals['child'])){
                                    show_item_menu($vals['child']); 
                              } ?>
                            </li>
                          <?php } ?>
                        </ul>
                      <?php } ?>
                    </li>
                  <?php } ?>
             </div>
             
          </div>
          <!-- .row -->
       </div>
       <!-- .container -->
    </nav>

 </header>