
<?php $slide = $this->FrontendSlides_Model->Read('index-slide', $this->fc_lang); ?>
<?php if(isset($slide) && is_array($slide) && count($slide)){ ?>
    <section class="main-slideshow">
        <div id="home-slideshow" class="uk-slidenav-position" data-uk-slideshow="{animation: 'random-fx', autoplay: true, autoplayInterval: 7500}">
            <ul class="uk-slideshow">
                <?php foreach($slide as $key => $val){ ?>
                    <li>
                        <a href="<?php echo $val['url'] ?>" class="img-cover">
                            <img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>" />
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center mb10">
                <?php foreach($slide as $key1 => $vals){ ?>
                    <li data-uk-slideshow-item="<?php echo $key1 ?>"><a href=""></a></li>
                <?php } ?>
            </ul>
        </div>
    </section><!-- .main-slide -->
<?php } ?>