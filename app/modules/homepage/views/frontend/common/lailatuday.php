<?php
$quytrinh = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
    'select' => 'id, title, slug, canonical,description, images, lft, rgt',
    'where' => array('trash' => 0,'publish' => 1, 'isfooter' => 1, 'alanguage' => ''.$this->fc_lang.''),
    'limit' => 1,
    'order_by' => 'order asc, id desc'));
if(isset($quytrinh) && is_array($quytrinh) && count($quytrinh)){
    foreach($quytrinh as $key => $val){

        $quytrinh[$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
            'modules' => 'articles',
            'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`cataloguesid`, `pr`.`viewed`, `pr`.`created`, `pr`.`content`',
            'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
            'limit' => 8,
            'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
            'cataloguesid' => $val['id'],
        ));
    }

}
?>
<?php
$taisao = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
    'select' => 'id, title, slug, canonical,description, images, lft, rgt',
    'where' => array('trash' => 0,'publish' => 1, 'ishome' => 1, 'alanguage' => ''.$this->fc_lang.''),
    'limit' => 1,
    'order_by' => 'order asc, id desc'));
?>


<?php if (isset($quytrinh) && is_array($quytrinh) && count($quytrinh)){ ?>
    <?php foreach ($quytrinh as $key => $value) { ?>
        <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>


        <section class="procedure-home">
            <h2 class="title-primary wow fadeInUp"><img src="templates/frontend/resources/images/i.png" alt=""><?php echo $value["title"] ?></h2>
            <div class="nav-procedure wow fadeInUp">
                <div class="slider-procedure owl-carousel">
                    <?php foreach ($value['post'] as $keyp => $val) { ?>
                        <?php
                        $title = $val['title'];
                        $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                        $image = getthumb($val['images'], TRUE);
                        $description = cutnchar($val['description'], 200);
                        ?>
                        <div class="item">
                            <div class="image">
                                <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                            </div>
                            <div class="nav-title">
                                <h3 class="title"><a href="<?php echo $href ?>"><?php echo strip_tags($description) ?></a></h3>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>

    <?php }} ?>



<?php if (isset($taisao) && is_array($taisao) && count($taisao)){ ?>
    <?php foreach ($taisao as $key => $value) { ?>
        <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
        <section class="system-home wow fadeInUp">
            <h3 class="title2"><?php echo $value["title"] ?></h3>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="system-content" style="color: #666;"><p style="    line-height: 25px;
    color: rgb(102, 102, 102);
    font-family: Roboto, sans-serif;
    font-size: 14px;
    text-align: justify;"><?php echo strip_tags($value["description"])?>  </p>
                        <a href="<?php echo $hrefC ?>" class="view-all">Xem tất cả</a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="images-system">
                        <img src="<?php echo $value["images"] ?>" alt="<?php echo $value["title"] ?>">
                    </div>
                </div>
            </div>
        </section>
    <?php }} ?>