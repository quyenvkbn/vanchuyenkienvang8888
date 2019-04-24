  <div id="main" class="wrapper">


    <?php $slide = $this->FrontendSlides_Model->Read('index-slide', $this->fc_lang); ?>
    <?php if(isset($slide) && is_array($slide) && count($slide)){ ?>
      <div id="slider-home" class="owl-carousel">
        <?php foreach ($slide as $key => $val): ?>


         <div class="item">
          <a href="<?php echo $val['url'] ?>" title="<?php echo $val['title']; ?>"> <img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>"></a>
        </div>
      <?php endforeach ?>


    </div>
  <?php } ?>



  <?php if (isset($duantieubieu) && is_array($duantieubieu) && count($duantieubieu)): ?>
  <?php foreach ($duantieubieu as $key => $value) { ?>
    <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
    <section class="project-future">
      <div class="container">
        <h2 class="title-primary wow fadeInUp"><?php echo $value['title']?></h2>
        <div class="tab-project wow fadeInUp">
          <ul  class="nav nav-pills">

            <?php if (isset($value['child']) && is_array($value['child']) && count($value['child'])): ?>
            <?php $i=0; foreach ($value['child'] as $keyC => $valueC) { $i++; ?>
              <li class="<?php if($i == 1){echo 'active';}?>">
                <a  href="#<?php echo $i?>a" data-toggle="tab"><?php echo $valueC['title']?></a>
              </li>
            <?php }  endif   ?> 









          </ul>

          <div class="tab-content clearfix">



            <?php if (isset($value['child']) && is_array($value['child']) && count($value['child'])): ?>
            <?php $i=0; foreach ($value['child'] as $keyC => $valueC) { $i++; ?>
              <div class="tab-pane <?php if($i == 1){echo 'active';}?>" id="<?php echo $i?>a">
                <div class="row">
                 <?php if (isset($valueC['post']) && is_array($valueC['post']) && count($valueC['post'])){ ?>


                  <?php foreach ($valueC['post'] as $keyp => $valp) { ?>
                    <?php 
                    $href = rewrite_url($valp['canonical'], $valp['slug'], $valp['id'], 'articles');
                    $image = getthumb($valp['images'], TRUE);
                    $description = cutnchar($valp['description'], 300); 
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <div class="item-project">
                        <div class="images">
                         <a href="<?php echo $href ?>"> <img src="<?php echo $image ?>"></a>
                       </div>

                       <div class="title-inner">
                        <h3 class="title">
                         <a class="title" href="<?php echo $href ?>"><?php echo $valp['title'] ?></a>
                       </h3>
                     </div>
                   </div>
                 </div>
               <?php } }?>






             </div>
           </div>
         <?php } endif?>



       </div>

     </div>
   </div>
 </section>

<?php } endif?>







<section class="box-project-home">
  <div class="container">
    <?php if (isset($khuvuc) && is_array($khuvuc) && count($khuvuc)): ?>
    <?php foreach ($khuvuc as $key => $value) { ?>
      <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
      <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>
      <h2 class="title-primary wow fadeInUp"><?php echo $value['title'] ?></h2>
      <div class="nav-box-project">
        <div class="row">


          <?php foreach ($value['post'] as $keyp => $val) { ?>
            <?php 
            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
            $image = getthumb($val['images'], TRUE);
            $description = cutnchar($val['description'], 300); 
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
              <div class="item-box">
                <div class="image">
                  <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt=""></a>
                </div>
                <h3 class="title"><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>
              </div>
            </div>
          <?php } ?>



        </div>
      </div>
    <?php endif ?>
  <?php } ?>
<?php endif ?>
</div>
</section>
<section class="new-home">
  <div class="container">
    <div class="row">


     <?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)): ?>
     <?php foreach ($tintuc as $key => $value) { ?>

      <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
      <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>





      <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
       <div class="item-new">
         <h3 class="title-pr"><?php echo $value['title'] ?></h3>
         <div class="nav-item-new">

          <?php foreach ($value['post'] as $keyp => $val) { ?>
            <?php 
            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
            $image = getthumb($val['images'], TRUE);
            $description = cutnchar($val['description'], 300); 
            ?>
            <?php if($keyp == 0){?>

             <div class="item-primary">
               <div class="image">
                 <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>"></a>
               </div>
               <div class="nav-img">
                 <h3 class="title"><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></h3>
               </div>
               <div class="clearfix"></div>
             </div>
           <?php } }?>


           <div class="list-new">
             <ul>
              <?php foreach ($value['post'] as $keyp => $val) { ?>
                <?php 
                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                $image = getthumb($val['images'], TRUE);
                $description = cutnchar($val['description'], 300); 
                ?>
                <?php if($keyp > 0){?>
                 <li><a href="<?php echo $href ?>"><?php echo $val['title'] ?></a></li>
               <?php }} ?>

             </ul>
           </div>
         </div>
       </div>
     </div>

   <?php endif ?>

 <?php } ?>
<?php endif ?>



<!-- Video -->
<div class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp">
 <div class="item-new">
  <h3 class="title-pr">Video</h3>
  <div class="nav-new-item">
   <?php echo $this->fcSystem['contact_video'] ?>
 </div>
</div>
<!-- keest thusc Video -->

</div>
</div>
</div>
</section>
<section class="logo-doitac">
 <div class="container">
   <?php $slide1 = $this->FrontendSlides_Model->Read('partner', $this->fc_lang); ?>
   <?php if(isset($slide1) && is_array($slide1) && count($slide1)){ ?>
     <?php foreach ($slide1 as $key => $var): ?>


       <div class="item wow fadeInUp">
         <a href=" <?php echo $var['url'] ?> "><img src="<?php echo $var['image'] ?>" alt="<?php echo $var['title'] ?>"></a>
       </div>
     <?php endforeach ?>
   <?php } ?>
   <div class="clearfix"></div>
 </div>
</section>

</div>