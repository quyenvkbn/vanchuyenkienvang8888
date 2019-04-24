<div id="main" class="wrapper">
    <div class="container">
       <div class="magintop-30">
          <div class="row">
             <?php $this->load->view('homepage/frontend/common/slidebar'); ?>
             <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="content-new content-new-detail">
                   <h1 class="title-primary1 wow fadeInUp"><?= $DetailArticles['title'] ?> </h1>
                   <p class="date wow fadeInUp"><i class="fas fa-calendar-day"></i><?= $created ?> </p>

                     <div class="content-new-detail wow fadeInUp">
                        <?= $DetailArticles['content'] ?>     
                     </div>
                     <?php if (!empty($articles_same)): ?>
                         <div class="othe-new">
                            <h2 class="title-other wow fadeInUp">Bài viết liên quan</h2>
                            <ul class="wow fadeInUp">
                                <?php foreach ($articles_same as $key => $value): ?>
                                    <?php $href = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles');?>
                                   <li>
                                      <a href="<?= $href ?>"><i class="fas fa-angle-right"></i><?= $value['title'] ?></a>
                                   </li>
                                <?php endforeach ?>
                            </ul>
                         </div>
                     <?php endif ?>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>