 <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="sidebar">
        <?php $menu_left = navigations_array('menu-left', $this->fc_lang);?>
        <?php if(isset($menu_left) && is_array($menu_left) && count($menu_left)): ?>
           <div class="item-sidebar">
              <h3 class="title-sb">DANH MỤC SẢN PHẨM</h3>
              <div class="nav-category">
                 <ul>
                  <?php foreach ($sanpham as $key => $val): ?>
                    <li>
                       <a href="<?php echo $val['href']; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title']; ?></a>
                       <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])): ?>
                         <ul class="submenu">
                          <?php foreach ($val['child'] as $key => $vals): ?>
                            <li>
                              <a href="<?php echo $vals['href']; ?>" title="<?php echo $vals['title']; ?>">
                                <?php echo $vals['title']; ?>
                              </a>
                              <?php 
                                if(isset($vals['child']) && is_array($vals['child']) && count($vals['child'])){
                                  show_item_menu($vals['child']); 
                                } 
                              ?>
                            </li>
                          <?php endforeach ?>
                         </ul>
                       <?php endif; ?>
                    </li>
                  <?php endforeach ?>
                 </ul>
              </div>
           </div>
        <?php endif; ?>

      <?php $supporter = $this->Frontendsupports_Model->ReadByCondition(array('select' => 'fullname, phone'));
       ?>
      <?php if (!empty($supporter)): ?>
         <div class="item-sidebar">
           <h3 class="title-sb">Hỗ trợ trực tuyến</h3>
           <div  class="support-online-widget nav-category">
               <img class="support-img" src="templates/frontend/resources/images/spo.png">    
               <div  class="gd_support_2">
                  <?php foreach ($supporter as $key => $value): ?>
                    <?php $tel = str_replace('.', '', str_replace(' ', '', $value['phone'])); ?>
                    <div id="support-1" class="supporter">
                       <div class="info">
                          <div class="support-rt">
                            <span class="name-support"><?= $value['fullname'] ?></span>
                            <span class="phone-support">
                              <a href="tel:<?= $tel ?>">
                                <i class="fa fa-phone-square" aria-hidden="true"></i><?= $value['phone'] ?>
                              </a>
                            </span>
                          </div>
                       </div>
                    </div>
                  <?php endforeach ?>
                  <!-- end supporter -->
               </div>
               <!-- end supporter-info -->
            </div>
         </div>
      <?php endif ?>
       <?php  
          $NewsSide = $this->FrontendArticles_Model->ReadByCondition(array(
              'select' => 'id, title, slug, canonical,description, images',
              'where' => array('trash' => 0,'publish' => 1, 'isaside' => 1, 'alanguage' => ''.$this->fc_lang.''),
              'order_by' => 'order asc, id desc'));
        ?>
       <?php if (!empty($NewsSide)): ?>
         <div class="item-sidebar">
          <h3 class="title-sb">TIN TỨC</h3>
             <div class="news-widget no-slide">
                <?php foreach ($NewsSide as $key => $val): ?>
                  <?php 
                      $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                      $image = getthumb($val['images'], TRUE);
                  ?>
                   <div class="featured-post">
                      <a href="<?= $href ?>">
                         <div class="align-left">
                            <img  src="<?= $image ?>">
                         </div>
                      </a>
                      <a class="news-title" href="<?= $href ?>"><?= $val['title'] ?></a>
                   </div>
                <?php endforeach ?>
            </div>
         </div>
       <?php endif ?>
    </div>
 </div>