<div id="slider-home" class="owl-carousel">
    <?php $slide = $this->FrontendSlides_Model->Read('index-slide', $this->fc_lang); ?>
    <?php if(isset($slide) && is_array($slide) && count($slide)){ ?>
    <?php foreach($slide as $key => $val){ ?>
    <div class="item">
        <a href="<?php echo $val['url'] ?>" title="<?php echo $val['title']; ?>"> <img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>"></a>
    </div>
    <?php }} ?>
</div>