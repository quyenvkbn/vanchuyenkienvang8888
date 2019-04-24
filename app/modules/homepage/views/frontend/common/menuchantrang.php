<section class="section_3">
    <div class="container">
        <div class="row_pc">
            <div class="row">
                <?php $footer_nav = navigations_array('footer', $this->fc_lang); ?>
                <?php if(isset($footer_nav) && is_array($footer_nav) && count($footer_nav)) {?>
                    <?php foreach ($footer_nav as $key=>$val): ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="sec_3">
                        <h3 class="hit_sec3">
                            <?php echo $val['title'] ?>
                        </h3>
                        <ul class="ul_sec3">
                            <?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>

                                <?php foreach ($val['child'] as $key => $value): ?>
                            <li><a href=""><?php echo $value['title'] ?>  </a></li>
                        <?php endforeach ?>
                    <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                <?php endforeach ?>
              <?php } ?>
            </div>
        </div>
    </div>
</section>