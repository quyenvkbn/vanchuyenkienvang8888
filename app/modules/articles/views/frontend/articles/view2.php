<div id="main" class="wrapper">
  <div id="main-content">
    <div class="brecus">
     <div class="container">
       <ul>
        <li><a href="">Trang chủ</a>&gt;</li>


        <!-- title  -->
        <?php foreach($Breadcrumb as $key => $val){ ?>
          <?php 
          $title = $val['title'];
          $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
          ?>
          <li class="uk-active">
            <a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
          </li>
        <?php } ?>
        <!-- end <title></title> -->


      </ul>
    </div>
  </div>
  <div class="container">
   <div class="row">
    <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="content-new">
       <div class="new-home1">
        <h2 class="title22 wow fadeInUp"><?php  echo $DetailCatalogues['title']; ?></h2>


        <?php if(isset($ArticlesList) && is_array($ArticlesList) && count($ArticlesList)){ ?>
          <?php foreach($ArticlesList as $key => $val) { ?>
            <?php 
            $title = $val['title'];
            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
            $image = getthumb($val['images'], TRUE);
            $description = cutnchar(strip_tags($val['description']),450);
            $created = show_time($val['created'], 'd/m/Y');
            $view = $val['viewed'];
            ?>
            <div class="item-new wow fadeInUp">
              <div class="image">
                <a href=" <?php echo $href ?> "><img src="<?php echo $image ?>" alt="<?php echo $image ?>"></a>
              </div>
              <div class="nav-image">
                <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                <p class="desc"><?php echo $description ?></p>
              </div>
              <div class="clearfix"></div>
            </div>
          <?php } ?>

        <?php } ?>






      </div>
      <div class="pagenavi wow fadeInUp" >
        <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>

      </div>
    </div>
  </div>
    <?php echo $this->load->view('homepage/frontend/common/aside');?>

  
</div>
</div>

</div>