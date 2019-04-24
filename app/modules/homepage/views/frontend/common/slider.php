<div id="slider-home" class="owl-carousel">
    <?php $slide = $this->FrontendSlides_Model->Read('index-slide', $this->fc_lang); ?>
    <?php if(isset($slide) && is_array($slide) && count($slide)){ ?>
    <?php foreach($slide as $key => $val){ ?>
    <div class="item">
        <a href="<?php echo $val['url'] ?>" title="<?php echo $val['title']; ?>"> <img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>"></a>
        <h2 class="title-prymary"><?php echo $val['title']; ?></h2>
        <h1 class="title-primary1"><?php echo $val['title']; ?></h1>
        <div class="read-more-sl">
            <ul>
                <li><a href="<?php echo $val['url'] ?>">Xem Thêm</a></li>
                <li class="contact-sl"><a href="<?php echo $val['url'] ?>">Liên hệ</a></li>
            </ul>
        </div>
    </div>
    <?php }} ?>

</div>