<div class="col-md-3 col-sm-12 col-xs-12">
    <div class="sidebar">
<?php
$tieudiem = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
    'select' => 'id, title, slug, canonical,description, images, lft, rgt',
    'where' => array('trash' => 0,'publish' => 1, 'isaside' => 1, 'alanguage' => ''.$this->fc_lang.''),
    'limit' => 1,
    'order_by' => 'order asc, id desc'));
if(isset($tieudiem) && is_array($tieudiem) && count($tieudiem)){
    foreach($tieudiem as $key => $val){

        $tieudiem[$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
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
        <?php if (isset($tieudiem) && is_array($tieudiem) && count($tieudiem)){ ?>
        <?php foreach ($tieudiem as $key => $value) { ?>
        <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>
        <div class="item-sb  wow fadeInUp">
            <h3 class="title1"><?php echo $value['title']?></h3>
            <div class="right-new">
                <?php foreach ($value['post'] as $keyp => $val) { ?>

                <?php
                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                $image = getthumb($val['images'], TRUE);
                $description = cutnchar($val['description'], 600);
                $title = cutnchar($val['title'], 400);
                $created = show_time($val['created'], 'd/m/Y');

                ?>
                <div class="item2">
                    <div class="image">
                        <a href="<?php echo $href ?>"><img src="<?php echo $image ?>" alt="<?php echo $title ?>"></a>
                    </div>
                    <div class="nav-img">
                        <h3 class="title"><a href="<?php echo $href ?>"><?php echo $title ?></a></h3>
                        <p class="date">Ngày đăng: <?php echo $created ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php }  ?>
            </div>

        </div>
        <?php } } ?>


        <div class="item-sb  wow fadeInUp">
            <div class="support item">
                <div class="images">
                    <img src="templates/frontend/resources/images/suport.png" alt="">
                </div>
                <div class="holine1">
                    <div class="icon">
                        <img src="templates/frontend/resources/images/icon-holine1.png" alt="">
                    </div>
                    <div class="nav-icon">
                        <span class="sp1">Holine</span>
                        <span class="sp2"><?php echo $this->fcSystem['contact_phone'] ?></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="problem">
                    <div class="item">
                        <h4>Nhân viên tư vấn khách hàng</h4>
                        <ul>
                            <li>
                                <img src="templates/frontend/resources/images/fb.png" alt="">
                            </li>
                            <li>
                                <img src="templates/frontend/resources/images/sky.png" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <h4>Nhân viên tư vấn khách hàng</h4>
                        <ul>
                            <li>
                                <img src="templates/frontend/resources/images/fb.png" alt="">
                            </li>
                            <li>
                                <img src="templates/frontend/resources/images/sky.png" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $video = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
            'select' => 'id, title, slug, canonical,description, images, lft, rgt',
            'where' => array('trash' => 0,'publish' => 1, 'isfooter' => 1, 'alanguage' => ''.$this->fc_lang.''),
            'limit' => 1,
            'order_by' => 'order asc, id desc'));
        if(isset($video) && is_array($video) && count($video)){
            foreach($video as $key => $val){

                $video[$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
                    'modules' => 'articles',
                    'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`cataloguesid`, `pr`.`viewed`, `pr`.`created`, `pr`.`content`, `pr`.`youtube`',
                    'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
                    'limit' => 3,
                    'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
                    'cataloguesid' => $val['id'],
                ));
            }

        }
        ?>
        <?php if (isset($video) && is_array($video) && count($video)){ ?>
        <?php foreach ($video as $key => $value) { ?>
        <?php $hrefC = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'articles_catalogues'); ?>

        <div class="item-sb item-border  wow fadeInUp">
            <h3 class="title-sidebar">
                <?php echo $value['title']?>
            </h3>
            <div class="nav-sb">
            <?php foreach ($value['post'] as $keyp => $val) { ?>

                <?php
                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
                $image = getthumb($val['images'], TRUE);
                $description = cutnchar($val['description'], 600);
                $title = cutnchar($val['title'], 400);
                $created = show_time($val['created'], 'd/m/Y');

                ?>

                <div class="item-video">
                    <?php echo $val['youtube'] ?>
                    <h3 class="title"><?php echo $title ?></h3>
                </div>
                <?php } ?>

            </div>
        </div>
        <?php }} ?>











        <div class="item-sb  wow fadeInUp">
            <div class="calendar-container">
                <div class="calendar">
                    <div class="year-header">
                        <span class="left-button" id="prev"> &lang; </span>
                        <span class="year" id="label"></span>
                        <span class="right-button" id="next"> &rang; </span>
                    </div>
                    <table class="months-table">
                        <tbody>
                        <tr class="months-row">
                            <td class="month">T1</td>
                            <td class="month">T2</td>
                            <td class="month">T3</td>
                            <td class="month">T4</td>
                            <td class="month">T5</td>
                            <td class="month">T6</td>
                            <td class="month">T7</td>
                            <td class="month">T8</td>
                            <td class="month">T9</td>
                            <td class="month">T10</td>
                            <td class="month">T11</td>
                            <td class="month">T12</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="days-table">
                        <td class="day">CN</td>
                        <td class="day">2</td>
                        <td class="day">3</td>
                        <td class="day">4</td>
                        <td class="day">5</td>
                        <td class="day">6</td>
                        <td class="day">7</td>
                    </table>
                    <div class="frame">
                        <table class="dates-table">
                            <tbody class="tbody">
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
        <div class="item-sb  wow fadeInUp">
            <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->fcSystem['social_facebook'] ?>%2F&tabs=timeline&width=264&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=343876996017079" width="264" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
</div>