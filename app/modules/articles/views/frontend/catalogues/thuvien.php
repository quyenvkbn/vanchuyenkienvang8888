<article id="body_home">
    <div class="Navigation">
        <div class="container">
            <div class="row_pc">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('home_page')?></a></li>

                    <li><a href="#"><?php echo $this->lang->line('tv')?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="page_sec">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="left_pr">
                            <?php
                            $isis = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
                                'select' => 'id, title, slug, canonical, description, lft, rgt',
                                'where' => array('trash' => 0, 'publish' => 1, 'isis' => 1, 'parentid' => 0, 'alanguage' => '' . $this->fc_lang . ''),
                                'order_by' => 'order asc, id desc',
                            ));
                            if (isset($isis) && is_array($isis) && count($isis)) {
                                foreach ($isis as $key => $val) {
                                    $isis[$key]['child'] = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
                                        'select' => 'id, title, slug, canonical, description, lft, rgt',
                                        'where' => array('trash' => 0, 'publish' => 1, 'isis' => 1, 'parentid' => $val['id'], 'alanguage' => '' . $this->fc_lang . ''),
                                        'order_by' => 'order asc, id desc',
                                    ));
                                }
                            }
                            ?>
                            <?php if (isset($isis) && is_array($isis) && count($isis)) { ?>
                                <?php foreach ($isis as $key => $val) { ?>
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
                        <?php echo $this->load->view("homepage/frontend/common/aside"); ?>

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <!-- Tab panes -->
                        <div class="tab-content style_prt">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <h2 class="title_news"><?php echo $this->lang->line('news-event')?></h2>

                                <div class="row">
                                    <?php foreach ($ArticlesList as $keys => $vals) { ?>
                                    <?php $href = rewrite_url($vals['canonical'], $vals['slug'], $vals['id'], 'articles'); ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 news_tv">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="img_new_tv h_6666">
                                                    <a href="<?php echo $href ?>"><img src="<?php echo $vals['images'] ?>" class="w_100"></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="text_news_tv">
                                                    <h3><a href="<?php echo $href ?>"><?php echo $vals['title'] ?></a></h3>
                                                    <span>
                                                        <?php echo $vals['description'] ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="example">
                                    <?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<div class="clearfix-60"></div>