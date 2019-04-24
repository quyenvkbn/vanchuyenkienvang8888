<div id="main" class="wrapper">
  <div class="top-content">
    <div class="row">
      <div class="col-md-9 col-sm-12 col-xs-12">
        <?php $this->load->view('slider'); ?>
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12">
        <?php $this->load->view('aasider'); ?>
</div>
</div>
</div>

<!-- bottomTopHome wow fadeInUp -->

<section class="bottomTopHome wow fadeInUp">
  <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
     <div class="content-botom">
      <p class="desc"><?php echo $this->fcSystem['homepage_tu'] ?></p>
    </div> 
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="image-bottom">
      <img src="templates/frontend/resources/images/img1.png" alt="anh1">
    </div>
  </div>
  
</div>
</section>

<!-- end bottomTopHome wow fadeInUp -->

<section class="category-home">
  <?php if (isset($danhmuchome1) && is_array($danhmuchome1) && count($danhmuchome1)): ?>
  <?php foreach ($danhmuchome1 as $key => $value) { ?>
    <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues'); ?>
    <div class="item-category">
      <h2 class="titleHome wow fadeInUp">
       <a href="<?php echo $hrefC ?>" title="<?php echo $value['title']?>"><?php echo $value['title'] ?></a>
       <a class="listHome-view-all" href="<?php echo $hrefC ?>">Xem tất cả >></a>
     </h2>
     <div class="nav-item-category">
      <div class="row">
        <div class="row">
          <?php foreach ($value['post'] as $keyp => $val) { ?>
            <?php 
            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
            $image = getthumb($val['images'], TRUE);
            $description = cutnchar($val['description'], 200); 
            ?>      


            

            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
              <div class="storyNews1">
               <div class="storyThumb">
                <div class="image">
                  <a href="<?php echo $href ?>" >
                    <img  src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>">
                  </a>
                </div>
              </div>
              <div class="textBox">
                <h3 class="storyTitle">
                 <a href="<?php echo $href ?>" title="">
                   <?php echo $val['title'] ?></a>
                 </h3>
                 <div class="storyDescription">
                   <p class="desc"><?php echo strip_tags($description) ?></p>
                 </div>
                 <div class="date">
                   <?php echo $val['updated'] ?>                               
                 </div>
                 <div class="storyInfo">
                  <p><span class="left">Thị trường:</span> <span class="right"><?php echo $val['thitruong'] ?></span></p>
                   <p><span class="left">Thu nhập:</span> <span class="right"><?php echo $val['thunhap'] ?></span></p>
                   <p><span class="left">Công việc:</span> <span class="right"><?php echo $val['congviec'] ?></span></p>
                 </div>
               </div>
               <div class="clearfix"></div>
             </div>
           </div>
         <?php } ?>




       </div>
     </div>
   </div>
 <?php } ?>
<?php endif ?>

<!-- Thông tin xuất khẩu lao động mới nhất -->

<?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)): ?>
<?php foreach ($tintuc as $key => $value) { ?>
  <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
  <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>
<div class="item-category">
  <h2 class="titleHome wow fadeInUp">
   <a href="<?php echo $hrefC ?>" title=""><?php echo $value['title'] ?></a>
   <a class="listHome-view-all" href="<?php echo $hrefC ?>">Xem tất cả >></a>
 </h2>
 <div class="nav-item-category">
  <div class="row">

    <?php foreach ($value['post'] as $keyp => $val) { ?>
      <?php 
      $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
      $image = getthumb($val['images'], TRUE);
      $description = cutnchar($val['description'], 200); 
      ?>


    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
      <div class="storyNews1">
       <div class="storyThumb">
        <div class="image">
          <a href="<?php echo $href ?>" >
            <img  src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>">
          </a>
        </div>
      </div>
      <div class="textBox">
        <h3 class="storyTitle">
         <a href="<?php echo $href ?>" title="">
         <?php echo $val['title'] ?>                                    </a>
       </h3>
       <div class="date">
         <?php echo $val['updated'] ?>                               
       </div>
       <div class="storyDescription">
         <p class="desc"><?php echo strip_tags($description) ?>                                    </p>
       </div>
       
       
     </div>
     <div class="clearfix"></div>
   </div>
 </div>
<?php } ?>



</div>
</div>
</div>
<?php endif ?>
<?php } ?>
<?php endif ?>



<!-- Thủ tục hồ sơ xuất khẩu lao động -->


<?php if (isset($dichvuvisa) && is_array($dichvuvisa) && count($dichvuvisa)): ?>
<?php foreach ($dichvuvisa as $key => $value) { ?>
  <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
  <?php if (isset($value['post']) && is_array($value['post']) && count($value['post'])): ?>
<div class="item-category">
  <h2 class="titleHome wow fadeInUp">
   <a href="<?php echo $hrefC ?>" title=""><?php echo $value['title'] ?></a>
   <a class="listHome-view-all" href="<?php echo $hrefC ?>">Xem tất cả >></a>
 </h2>
 <div class="nav-item-category">
  <div class="row">
  <?php foreach ($value['post'] as $keyp => $val) { ?>
      <?php 
      $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
      $image = getthumb($val['images'], TRUE);
      $description = cutnchar($val['description'], 200); 
      ?>



    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp">
      <div class="storyNews1">
       <div class="storyThumb">
        <div class="image">
          <a href="<?php echo $href ?>" >
            <img  src="<?php echo $image ?>" alt="">
          </a>
        </div>
      </div>
      <div class="textBox">
        <h3 class="storyTitle">
         <a href="<?php echo $href ?>" title="<?php echo $description ?>">
         <?php echo $val['title'] ?>                                   </a>
       </h3>
       <div class="storyDescription">
         <p class="desc"><?php echo strip_tags($description) ?>                                  </p>
       </div>
       <div class="date">
         <?php echo $val['updated'] ?>                               
       </div>
       
     </div>
     <div class="clearfix"></div>
   </div>
 </div>
 <?php } ?>

 <!-- hihihihihihi -->


</div>
</div>
</div>


<?php endif ?>
<?php } ?>
<?php endif ?>
</section>

</div>