<div id="main" class="wrapper">
    <div class="container">
       <div class="magintop-30">
          <div class="row">
            <?php $this->load->view('homepage/frontend/common/slidebar'); ?>
             <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="content-new">
                   <h2 class="heading wow fadeInUp">
                      <a href="<?= $canonical ?>"> <?= $DetailCatalogues['title'] ?> </a>
                   </h2>
                   <?php foreach ($ArticlesList as $key => $val): ?>
                        <?php 
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
                            $image = getthumb($val['images'], TRUE);
                            $time = gettime($val['created']);
                            $description = cutnchar($val['description'], 300); 
                        ?>
                       <div class="new-list wow fadeInUp">
                           <div class="news-post">
                              <h3 class="title"><a href="<?= $href ?>" title="<?= $val['title'] ?>"><?= $val['title'] ?></a></h3>
                              <div class="date-time">
                                 <span><i class="fa fa-user" aria-hidden="true"></i> By :<?= $val['fullname'] ?></span> 
                                 <span><i class="fa fa-eye" aria-hidden="true"></i><?= $val['viewed'] ?> Views</span>
                                 <span><i class="fa fa-calendar" aria-hidden="true"></i><?= $time ?></span>
                              </div>
                              <div class="nav-new-post">
                                <div class="image">
                                  <a href=""><img src="<?= $image ?>" alt="<?= $val['title']   ?>"></a>
                                </div>
                                <div class="nav-img">
                                  <p class="desc"><?= $description   ?></p>
                                </div>
                                <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                   <?php endforeach ?>
                </div>
                <nav class="nav-page wow fadeInUp" aria-label="Page navigation navigation-page">
      
                  <ul class="pagination">
                    <?php echo $PaginationList ?>
                  </ul>
           
            </nav>
             </div>
          </div>
       </div>
    </div>
 </div>