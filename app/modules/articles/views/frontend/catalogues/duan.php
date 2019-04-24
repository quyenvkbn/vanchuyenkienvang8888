<div id="main-content">
  <div class="brecus">
   <div class="container">
     <ul>
       <li><a href="">Trang chủ</a>&gt;</li>
       <?php foreach($Breadcrumb as $key => $val){ ?>
        <?php 
        $title = $val['title'];
        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
        ?>
        <a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
      <?php } ?>
     </ul>
   </div>
 </div>
 <div class="container">
   <div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">

      <div class="content-new content-project">
       <div class="new-home1">
        <?php if(isset($ArticlesList) && is_array($ArticlesList) && count($ArticlesList)){ ?>
          
        <h2 class="title22 wow fadeInUp"><?php  echo $DetailCatalogues['title']; ?></h2>
        <div class="row">
          <?php foreach($ArticlesList as $key => $val) { ?>
            <?php 
            $title = $val['title'];
            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
            $image = getthumb($val['images'], TRUE);
            $description = cutnchar(strip_tags($val['description']),450);
            $created = show_time($val['created'], 'd/m/Y');
            $view = $val['viewed'];
            ?>

          <div class="col-md-4 col-sm-6 col-xs-6">
            <div class="item-new wow fadeInUp">
              <div class="image">
                <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt=""></a>
              </div>
              <div class="nav-image">
                <h3 class="title"><a href="<?php echo $href ?>"><?php echo $description ?>  </a></h3>

              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <?php } ?>

        </div>
        
      <?php } ?>


      </div>
      <!-- <div class="pagenavi wow fadeInUp" >
        <ul>
          <li>
            <a href="" class="active">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">6</a>
            <a href="">...</a>
            <a href="">Trang cuối</a>
          </li>
        </ul>
      </div> -->
    </div>
    <div class="pagenavi wow fadeInUp" >
    <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>

  </div>
  </div>

  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="sidebar">
      <div class="item">
        <h3 class="title-wd">Danh mục tin tức</h3>
        <div class="nav-item">
         <ul>
          <li class="has-child">
           <a href="">Danh mục dự án</a>
           <ul class="submenu">
            <li><a href="">Nội thất1</a></li>
            <li><a href="">Nội thất1</a></li>
            <li><a href="">Nội thất1</a></li>
            <li><a href="">Nội thất1</a></li>
            <li><a href="">Nội thất1</a></li>
          </ul>
        </li>
        <li><a href="">Ngoại thất</a></li>
        <li><a href="">Nội thất</a></li>
        <li><a href="">Ngoại thất</a></li>
        <li><a href="">Nội thất</a></li>
        <li><a href="">Ngoại thất</a></li>
      </ul>
    </div>
  </div>
  <div class="item">
    <h3 class="title-wd">Danh mục tin tức</h3>
    <div class="nav-item">
     <ul>
      <li class="has-child">
       <a href="">Nội thất1</a>
       <ul class="submenu">
        <li><a href="">Nội thất1</a></li>
        <li><a href="">Nội thất1</a></li>
        <li><a href="">Nội thất1</a></li>
        <li><a href="">Nội thất1</a></li>
        <li><a href="">Nội thất1</a></li>
      </ul>
    </li>
    <li><a href="">Ngoại thất</a></li>
    <li><a href="">Nội thất</a></li>
    <li><a href="">Ngoại thất</a></li>
    <li><a href="">Nội thất</a></li>
    <li><a href="">Ngoại thất</a></li>
    <li><a href="">Ngoại thất</a></li>
    <li><a href="">Nội thất</a></li>
    <li><a href="">Ngoại thất</a></li>
    <li><a href="">Nội thất</a></li>
    <li><a href="">Ngoại thất</a></li>
  </ul>
</div>
</div>
<div class="item">
  <h3 class="title-wd">Tìm hiểu về gỗ óc chó</h3>
  <div class="nav-item">
   <ul>
    <li class="has-child">
     <a href="">Nội thất1</a>
     <ul class="submenu">
      <li><a href="">Nội thất1</a></li>
      <li><a href="">Nội thất1</a></li>
      <li><a href="">Nội thất1</a></li>
      <li><a href="">Nội thất1</a></li>
      <li><a href="">Nội thất1</a></li>
    </ul>
  </li>
  <li><a href="">Ngoại thất</a></li>
  <li><a href="">Nội thất</a></li>
  <li><a href="">Ngoại thất</a></li>
  <li><a href="">Nội thất</a></li>
  <li><a href="">Ngoại thất</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>

</div>