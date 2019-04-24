<?php
    $Catalogues = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
        'select' => 'id, title, slug, canonical',
        'where' => array('trash' => 0,'publish' => 1, 'isaside' => 1, 'alanguage' => ''.$this->fc_lang.''),
        'limit' => 20,
        'order_by' => 'order asc, id desc'));
    if(isset($Catalogues) && is_array($Catalogues) && count($Catalogues)){
      foreach($Catalogues as $key => $val) {
          $Catalogues[$key]['child'] = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
              'select' => 'id, title, slug, canonical',
              'where' => array('trash' => 0, 'parentid' => $val['id'], 'publish' => 1, 'alanguage' => '' . $this->fc_lang . ''),
              'limit' => 10,
              'order_by' => 'order asc, id desc'));
          
      }
    }
?>
 <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="sidebar">
        <?php if(isset($Catalogues) && is_array($Catalogues) && count($Catalogues)): ?>
           <div class="item-sidebar">
              <h3 class="title-sb">DANH MỤC SẢN PHẨM</h3>
              <div class="nav-category">
                 <ul>
                  <?php foreach ($Catalogues as $key => $val): ?>
                    <?php $hrefC = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues',true,true);  ?>
                    <li>
                       <a href="<?php echo $hrefC; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title']; ?></a>
                       <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])): ?>
                         <ul class="submenu">
                          <?php foreach ($val['child'] as $key => $vals): ?>
                            <?php $hrefC = rewrite_url($vals['canonical'], $vals['slug'], $vals['id'], 'articles_catalogues',true,true);  ?>
                            <li>
                              <a href="<?php echo $hrefC; ?>" title="<?php echo $vals['title']; ?>">
                                <?php echo $vals['title']; ?>
                              </a>
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