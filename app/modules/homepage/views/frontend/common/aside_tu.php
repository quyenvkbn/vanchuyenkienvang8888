<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="sidebar wow fadeInUp">
        <?php
        $sanpham = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
            'select' => 'id, title, slug, canonical,description, images, lft, rgt',
            'where' => array('trash' => 0,'publish' => 1, 'highlight' => 1, 'alanguage' => ''.$this->fc_lang.''),
            'limit' => 20,
            'order_by' => 'order asc, id desc'));
        if(isset($sanpham) && is_array($sanpham) && count($sanpham)){
       	foreach($sanpham as $key => $val) {

            $sanpham[$key]['child'] = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
                'select' => 'id, title, slug, canonical, images, lft, rgt',
                'where' => array('trash' => 0, 'parentid' => $val['id'], 'publish' => 1, 'alanguage' => '' . $this->fc_lang . ''),
                'limit' => 10,
                'order_by' => 'order asc, id desc'));
        }}
//        echo "<pre>";var_dump($sanpham[$key]['child']);die;
        ?>
        <?php
        $tintuc = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
            'select' => 'id, title, slug, canonical,description, images, lft, rgt',
            'where' => array('trash' => 0,'publish' => 1, 'isaside' => 1, 'alanguage' => ''.$this->fc_lang.''),
            'limit' => 1,
            'order_by' => 'order asc, id desc'));
        if(isset($tintuc) && is_array($tintuc) && count($tintuc)){
            foreach($tintuc as $key => $val){

                $tintuc[$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
                    'modules' => 'articles',
                    'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`cataloguesid`, `pr`.`viewed`, `pr`.`created`, `pr`.`content`',
                    'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1 AND `pr`.`highlight` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
                    'limit' => 8,
                    'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
                    'cataloguesid' => $val['id'],
                ));
            }

        }

        ?>
        <?php


        ?>
        
        
        
        <div class="item-sidebar">
            <h2 class="title1">Danh mục sản phẩm</h2>
            <div class="nav-item-sb">
                <ul>
                    <?php if (isset($sanpham) && is_array($sanpham) && count($sanpham)){ ?>
                    <?php foreach ($sanpham as $key => $value) { ?>
                    <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'products_catalogues',true,true);
                    echo $hrefC;die; ?>
                    <li>
                        <a href="<?php echo $hrefC ?>" style="text-transform: uppercase;"><?php echo $value["title"] ?></a>
                        <ul class="  sub-sb ">
                        <?php if (isset($sanpham) && is_array($sanpham) && count($sanpham)){ ?>
                        <?php foreach ($value['child'] as $keyp => $val) { ?>
                            <?php
                            $title = $val['title'];
                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                            ?>
                            <li><a href="<?php echo $href ?>"><?php echo $title ?></a></li>
                            <?php }} ?>
                        </ul>
                    </li>
                    <?php }} ?>

                </ul>
            </div>
        </div>






        <div class="item-sidebar">
            <h2 class="title1">Tin tức nổi bật</h2>
            <div class="nav-item-sb">
                <?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)){ ?>
                <?php foreach ($tintuc as $key => $value) { ?>
                <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
                <?php foreach ($value['post'] as $keyp => $val) { ?>
                <?php
                $title = $val['title'];
                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                $image = getthumb($val['images'], TRUE);
                $description = cutnchar($val['description'], 200);
                ?>
                <div class="item1">
                    <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                    <div class="thumbnail-desc">
                        <div class="thumbnail">
                            <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                        </div>
                        <div class="desc">
                            <p><?php echo strip_tags($description) ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php }}} ?>

            </div>
        </div>














        <div class="item-sidebar">
            <h2 class="title1">Video</h2>
            <div class="nav-item-sb">
                <iframe width="270" height="185" src="<?php echo $this->fcSystem['social_youtube'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>




        <div class="item-sidebar">
            <h2 class="title1">Khách hàng tiêu biểu</h2>
            <div class="nav-item-sb">
                <?php $slide1 = $this->FrontendSlides_Model->Read('partner', $this->fc_lang); ?>
                <?php if(isset($slide1) && is_array($slide1) && count($slide1)){ ?>
                <?php foreach ($slide1 as $key => $var){ ?>
                <div class="adv">
                    <a href="<?php echo $var['url'] ?>" target="_blank"><img src="<?php echo $var['image'] ?>" alt="<?php echo $var['title'] ?>"></a>
                </div>
                <?php }} ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>