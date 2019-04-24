<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">


  <!-- Menu left -->


  <div class="box_right_news">
    <?php $main_nav = navigations_array('menu-left', $this->fc_lang); ?>
    <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
     <?php foreach ($main_nav as $key=>$val): ?>
    <ul>
      <li class="tours_style"><?php echo $val['title'] ?>
        <ul>
          <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>
          <?php foreach ($val['child'] as $key => $value): ?>
          <li><a href="<?php echo  $value['href'] ?>"> <?php echo  $value['title'] ?></a></li>
          <?php endforeach ?>
          <?php } ?>
          
        </ul>
      </li>
    </ul>

    <?php endforeach ?>
    <?php } ?>
  </div>



<!-- demi ảnh -->
<?php 
$danhmuchome1 = $this->FrontendProductsCatalogues_Model->ReadByCondition(array('select' => 'id, title, slug, canonical, albums, images, lft, rgt','where' => array('trash' => 0,'publish' => 1, 'highlight' => 1,  'parentid' => 0,  'alanguage' => ''.$this->fc_lang.''), 'limit' => 5,'order_by' => 'order asc, id desc'));
if(isset($danhmuchome1) && is_array($danhmuchome1) && count($danhmuchome1)){
  foreach($danhmuchome1 as $key => $val){
    $danhmuchome1[$key]['post'] = $this->FrontendProducts_Model->_read_condition(array(
      'modules' => 'products',
      'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`price`, `pr`.`saleoff`, `pr`.`description`',
      'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1 AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
      'limit' =>3,
      'order_by' => '`pr`.`id` desc',
      'cataloguesid' => $val['id'],
    ));
        // $data['danhmuchome'][$key]['child'] = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
        //  'select' => 'id, title, slug, canonical, albums, images, lft, rgt',
        //  'where' => array('trash' => 0,'publish' => 1, 'parentid' => $val['id'], 'alanguage' => ''.$this->fc_lang.''),
        //  'limit' => 4,
        //  'order_by' => 'order asc, id desc',
        // ));
        // echo "<pre>";var_dump($danhmuchome1);
  }
}
?>
<!-- query riêng highlight -->
<?php if (isset($danhmuchome1) && is_array($danhmuchome1) && count($danhmuchome1)): ?>
<?php foreach ($danhmuchome1 as $key => $value) { ?>
  <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues'); ?>

  <div id="demo">
    <h2><?php echo $value['title'] ?></h2>
    
    <div class="jcarouse">
      <?php foreach ($value['post'] as $keyp => $val) { ?>
          <?php 
          $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
          $image = getthumb($val['images'], TRUE);
          $description = cutnchar($val['description'], 300); 
          ?>
      <ul>
        
        <li class="mg_10">
          <div class="thumb h_9769 ">
            <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" class="w_100"></a>
          </div>
          <div class="comtent_thumb">
            <span><?php echo $val['title'] ?></span>
            <p><?php echo $description ?></p>
          </div>
        </li>
        
        
      </ul><?php } ?>
    </div>
  
  </div>
  <?php } ?>
  <?php endif ?>
    <!-- end query -->



  <div class="youtube_news">
    <h2>Youtube</h2>
    <iframe width="640" height="360" src="<?php echo $this->fcSystem['social_youtube'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>