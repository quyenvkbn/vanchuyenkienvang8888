<div id="main" class="wrapper main-category">
  <div class="top-content">
    <div class="row">
      <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="main-content-category">
          <div class="content-breadcrumbs">
           <ol class="breadcrumb"><li class="breadcrumb-item"><a href="">Trang chủ</a></li>

            <li class="active">Tìm kiếm </li>
          </ol>                                        </div>
          <div class="titleMessage wow fadeInUp">
           <!-- <h3> Kết quả từ khóa tìm kiếm " <?php echo $keys ?> " :</h3> -->
         </div>
         <?php if(isset($result) && is_array($result) && count($result)){ ?>

          <?php foreach($result as $key => $val) { ?> 
            <?php 
            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
            $image = getthumb($val['images'], TRUE);
            $description = cutnchar($val['description'], 200);
              // $price = (($val['saleoff'] > 0) ? str_replace(',', '.', number_format($val['saleoff'])).' <span>₫</span>' : 'Liên hệ');
            ?>


                  <div class="listStory">

                    <div class="storyWork wow fadeInUp">

                            <h3 class="storyTitle">
                                  <a href="<?php echo $href ?>" title="">
                                    <?php echo $val['title'] ?></a>
                            </h3>


                            <div class="storyThumb">
                              <div class="image">
                               <a href="<?php echo $href ?>" title="">
                                <img alt="<?php echo $val['title'] ?>" src="<?php echo $image ?>">
                              </a>
                            </div>

                          </div>


                            <div class="textBox">
                              <div class="storyDescription">
                               <p><?php echo $description ?></p>
                             </div>
                             <div class="date">
                               <img src="templates/frontend/resources/images/icondate.png"><?php echo $val['updated'] ?>                    
                             </div>
                             <div class="storyInfo">
                               <div class="item">
                                <span class="left">Thị trường:</span> <span class="right"><?php echo $val['thitruong'] ?></span>
                              </div>
                              <div class="item">
                                <span class="left">Lương:</span> <span class="right"><?php echo $val['thunhap'] ?></span>
                              </div>
                              <div class="item">
                                <span class="left">Công việc:</span> <span class="right"><?php echo $val['congviec'] ?></span>
                              </div>
                            </div>
                          </div>
                </div>





              </div>
      <?php } ?>
    <?php } ?>

    <div class="pagenavi wow fadeInUp">
      <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
    </div>
  </div>
  
</div>
<?php $this->load->view('homepage/frontend/common/aside'); ?>

</div>
</div>



</div>