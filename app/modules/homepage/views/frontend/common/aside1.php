<div class="col-md-3 col-sm-3 col-xs-12">
  <div class="sidebar">

    <!--items -->
    <?php $main_nav = navigations_array('menu-left', $this->fc_lang); ?>
    <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
     <?php foreach ($main_nav as $key=>$val): ?>

      <div class="item">


        <h3 class="title-wd"><?php echo $val['title'] ?></h3>

        <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>
          <?php foreach ($val['child'] as $key => $value): ?>
            <div class="nav-item">
             <ul>
              <li class="has-child">
                <a href="<?php echo $value['href'] ?>"><?php echo $value['title'] ?></a>
               <?php if(isset($value['child']) && is_array($value['child']) && count($value['child'])){ ?>
               <ul class="submenu">
                
                <?php foreach ($value['child'] as $keys => $valC): ?>
                <li><a href="<?php echo $valC['href'] ?>"><?php echo $valC['title'] ?></a></li>
                <?php endforeach ?> 
                
                
              </ul>
              <?php } ?>
            </li>
            
          </ul>
        </div>
      <?php endforeach ?>
    <?php } ?>

  </div>
<?php endforeach ?>
<?php } ?>

<!-- end items -->
</div>
</div>