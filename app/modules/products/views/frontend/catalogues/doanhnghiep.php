<article id="body_home">
    <div class="Navigation">
        <div class="container">
            <div class="row_pc">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home_page')?></a></li>
                    <?php
                    $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
                    ?>
                    <li><a href="<?php echo $hrefX ?>"><?php echo $DetailCatalogues['title'] ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="doanhnghiep">
        <div class="container">
            <div class="row_pc">
                <div class="dt_dn">
                    <?php
                    $highlight = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
                        'select' => 'id, title, slug, canonical, description, lft, rgt',
                        'where' => array('trash' => 0, 'publish' => 1, 'highlight' => 1, 'parentid' => 0, 'alanguage' => '' . $this->fc_lang . ''),
                        'order_by' => 'order asc, id desc',
                    ));
                    if (isset($highlight) && is_array($highlight) && count($highlight)) {
                        foreach ($highlight as $key => $val) {
                            $highlight[$key]['child'] = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
                                'select' => 'id, title, slug, canonical, description, lft, rgt',
                                'where' => array('trash' => 0, 'publish' => 1, 'highlight' => 1, 'parentid' => $val['id'], 'alanguage' => '' . $this->fc_lang . ''),
                                'order_by' => 'order asc, id desc',
                            ));
                        }
                    }
                    ?>
                    <?php if (isset($highlight) && is_array($highlight) && count($highlight)) { ?>
                    <?php foreach ($highlight as $key => $val) { ?>
                    <?php if (isset($val['child']) && is_array($val['child']) && count($val['child'])) { ?>
                    <ul class="nav nav-tabs" role="tablist">
                            <?php foreach ($val['child'] as $keyC => $valC) { ?>
                                <?php $href = rewrite_url($valC['canonical'], $valC['slug'], $valC['id'], 'articles_catalogues'); ?>
                                <li class="menu-item-aboutus"><a href="<?php echo base_url()?><?php echo $href ?>"><?php echo $valC['title'] ?></a></li>
                            <?php } ?>
                    </ul>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
                <script>
                    $( window ).load(function() {
                        var url = window.location.href;
                        $('.menu-item-aboutus a[href="' + url + '"]').addClass('active');
                    });
                </script>
                <div class="content_txt">
                    <!-- Tab panes -->
                    <div class="tab-content style_prt">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="row">
                                <?php foreach ($productsList as $keys => $vals) { ?>
                                <?php $href = rewrite_url($vals['canonical'], $vals['slug'], $vals['id'], 'articles'); ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-480-12">
                                    <div class="box_txt_s">
                                        <div class="img_txt_s h_6509">
                                            <a href="<?php echo $href ?>"><img src="<?php echo $vals['images'] ?>" class="w_100"></a>
                                        </div>
                                        <div class="text_txt_s">
                                            <h3><a href="<?php echo $href ?>"><?php echo $vals['title'] ?>></a></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="example">
                        <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<div class="clearfix-60"></div>