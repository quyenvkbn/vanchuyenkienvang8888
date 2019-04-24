<div class="clearix"></div>

<article id="body_home">
    <?php  $this->load->view('homepage/frontend/common/bannerdethuong'); ?>
    <section class="album">
        <div class="container">
            <div class="row_pc">
                <div class="row_5">
                    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
                        <div class="row_10">
                            <div class="left_page_album">
                                <?php $href = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], 'gallerys_catalogues'); ?> 
                                <ul>
                                    <?php $main_nav = navigations_array('main', $this->fc_lang); ?>
                                    <?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
                                        <?php foreach ($main_nav as $key=>$val): ?>


                                            <li class=" <?php if($val['href']==$href) { ?>  active <?php } ?> "><a href="<?php echo $val['href'] ?>"><?php echo $val['title'] ?></a></li>

                                        <?php endforeach  ?>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($gallerysList) && is_array($gallerysList) && count($gallerysList)){ ?>


                        <div class="col-lg-9 col-md-9 col-sm-9">

                            <div class="row_10">

                                <div class="album_page">
                                    <div class="title_image">
                                        <?php echo $DetailCatalogues['title'] ?>
                                    </div>
                                    <div class="row">
                                        <?php foreach($gallerysList as $key => $val) { ?> 
                                            <?php 
                                            $title = $val['title'];
                                            $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'gallerys');
                                            $image = getthumb($val['images'], FALSE);
                                            $description = cutnchar(strip_tags($val['description']), 1000);
                                            $created = show_time($val['created'], 'd/m/Y');
                                            ?>

                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-480-12">
                                                <div class="img_album h_9964">
                                                    <a class="example-image-link"  href="<?php echo $href ?>" data-lightbox="example-set">
                                                        <img class="example-image " style="object-fit: cover;"   src="<?php echo $image ?>" alt="<?php echo $title ?>"/></a>
                                                    </div>
                                                </div>
                                            <?php } ?>





                                        </div>
                                    </div>
                                    <div class="text-center"><?php echo (isset($PaginationList)) ? $PaginationList : ''; ?></div>

                                </div>

                            </div>
                            
                        <?php } ?>

                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('homepage/frontend/common/menuchantrang'); ?>
    </article>
