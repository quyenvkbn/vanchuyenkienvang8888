<footer class="footer-v3 bg-dark wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-col-1">
                    <h4 class="text-cap"><?php echo $this->fcSystem['homepage_company'] ?></h4>
                    <p><?php echo $this->fcSystem['homepage_kiki'] ?></p>
                    <ul class="social social-footer">
                        <li class="active"><a target="_blank" href="<?php echo $this->fcSystem['social_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="<?php echo $this->fcSystem['social_google'] ?>"><i class="fa fa-google-plus"></i></a></li>
                        <li><a target="_blank" href="<?php echo $this->fcSystem['social_linkke'] ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php echo $this->fcSystem['social_facebook'] ?>"><i class="fa fa-pinterest"></i></a></li>
                        <li><a target="_blank" href="<?php echo $this->fcSystem['social_youtube'] ?>"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-col-2">
                    <h4 class="text-cap">Liên k?t</h4>
                    <ul class="list-link-footer">

                        <?php $footer_nav = navigations_array('footer', $this->fc_lang); ?>
                        <?php if(isset($footer_nav) && is_array($footer_nav) && count($footer_nav)) {?>
                            <?php foreach ($footer_nav as $key=>$val): ?>
                                <li><a href="<?php echo $val['href']?>"><?php echo $val['title'] ?></a></li>
                            <?php endforeach ?>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="footer-col-3">
                    <h4 class="text-cap">Liên h?</h4>
                    <ul class="list-link-footer">
                        <li><i class="fa fa-home" aria-hidden="true"></i> <?php echo $this->fcSystem['contact_address'] ?></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $this->fcSystem['contact_phone'] ?></li>
                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $this->fcSystem['contact_web'] ?></li>
                        <li><i class="fa fa-clock-o" aria-hidden="true"></i> Th? 2 - Th? 7: 09:00 - 17:00</li>
                    </ul>
                </div>
            </div>


            <?php
            $chinhsach = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
                'select' => 'id, title, slug, canonical,description, images, lft, rgt',
                'where' => array('trash' => 0,'publish' => 1, 'isfooter' => 1, 'alanguage' => ''.$this->fc_lang.''),
                'limit' => 1,
                'order_by' => 'order asc, id desc'));
            if(isset($chinhsach) && is_array($chinhsach) && count($chinhsach)){
                foreach($chinhsach as $key => $val){

                    $chinhsach[$key]['post'] = $this->FrontendArticlesCatalogues_Model->_read_condition(array(
                        'modules' => 'articles',
                        'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`cataloguesid`, `pr`.`viewed`, `pr`.`created`, `pr`.`content`',
                        'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
                        'limit' => 6,
                        'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
                        'cataloguesid' => $val['id'],
                    ));
                }

            }

            ?>

            <?php if (isset($chinhsach) && is_array($chinhsach) && count($chinhsach)){ ?>
                <?php foreach ($chinhsach as $key => $value) { ?>
                    <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues'); ?>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="footer-col-4">
                            <h4 class="text-cap"><?php echo $value['title']?></h4>
                            <div class="row">
                                <?php foreach ($value['post'] as $keyp => $val) { ?>
                                    <?php
                                    $title = $val['title'];
                                    $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                                    $image = getthumb($val['images'], TRUE);
                                    $description = cutnchar($val['description'], 200);
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="item">
                                            <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                                        </div>
                                    </div>
                                <?php } ?>





                            </div>
                        </div>
                    </div>
                <?php }} ?>



        </div>
    </div>
</footer>
<a id="to-the-top" style="display: block;"><i class="fa fa-angle-up"></i></a>
<div class="copy-right">
    <div class="container">
        <div class="wp-copy text-center">
            B?n quy?n thu?c v? <?php echo $this->fcSystem['homepage_banquyen'] ?> Thi?t k? website b?i <a href="https://tamphat.edu.vn/" target="_blank"
                >Tâm Phát</a>
        </div>
    </div>
</div>









<script type="text/javascript" src="templates/frontend/resources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/wow.min.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/owl.carousel.min.js"></script>

<script src="templates/frontend/resources/js/hc-offcanvas-nav.js?ver=3.3.0"></script>
<script type="text/javascript" src="templates/frontend/resources/js/jquery.sticky.js"></script>
<script type="text/javascript" src="templates/frontend/resources/js/buong.js"></script>
<script>
    //hieu ung wow------------------------------------------
    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();




</script>