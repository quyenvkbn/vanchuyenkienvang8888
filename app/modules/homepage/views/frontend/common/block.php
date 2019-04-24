<?php  
    $videoblock = $this->FrontendVideos_Model->ReadByCondition(array(
        'select' => 'id, title, slug, canonical, images, videos_code',
        'table' => 'videos',
        'where' => array('publish' => 1, 'trash' => 0, 'highlight' => 1, 'alanguage' => $this->fc_lang),
        'limit' => 1,
        'order_by' => 'id desc',
    ));
?>
<?php if (isset($videoblock) && is_array($videoblock) && count($videoblock)): ?>
    <section class="aside-panel panel-videos">
        <section class="panel-body">
            <?php foreach ($videoblock as $key => $val) { ?>
                <?php $video_code = explode('?v=', $val['videos_code']); ?>
                <div class="box-video-block playvideo" data-video="<?php echo $video_code[1] ?>">
                    <a href="javascript: void(0);" class="img-cover relative">
                        <img src="<?php echo $val['images'] ?>" alt="<?php echo $val['title'] ?>">
                        <span class="player"></span>
                    </a>
                </div>
            <?php } ?>
        </section>
    </section>
<?php endif ?>



<?php $list = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
    'select' => 'id, title, slug, canonical, parentid, lft, rgt',
    'where' => array('trash' => 0,'publish' => 1, 'alanguage' => ''.$this->fc_lang.''),
    'order_by' => 'order asc, id asc'
)); ?>
<?php $list = recursive($list); ?>
<?php if(isset($list) && is_array($list) && count($list)) { ?>
    <section class="aside-catalogies aside-panel">
        <header class="panel-head">
            <div class="heading">
                <span>Danh mục sản phẩm</span>
            </div>
        </header>
        <section class="panel-body">
            <ul class="uk-list uk-list-catagories <?php echo ((isset($home)) ? '' : 'hide') ?>">
                <?php foreach ($list as $key => $val) { ?>
                    <?php $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products_catalogues'); ?>
                    <li>
                        <a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
                            <?php echo $val['title'] ?>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </section>
<?php } ?>