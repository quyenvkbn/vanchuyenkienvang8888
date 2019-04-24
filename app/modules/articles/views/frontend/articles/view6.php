<div id="main" class="wrapper main-category">
    <div class="top-content">
        <div class="row">
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="main-content-category">
                    <div class="content-breadcrumbs">
                        <ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>">Trang ch?</a></li>
                            <?php foreach($Breadcrumb as $key => $val){ ?>
                                <?php
                                $title = $val['title'];
                                $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
                                ?>
                                <li class="breadcrumb-item"><a href="<?php echo $href; ?>"><?php echo $title; ?></a></li>
                            <?php } ?>
                            <li class="active"><?php echo $DetailArticles['title'] ?></li>
                        </ol>                                        </div>
                    <div class="titleMessage">
                        <?php echo $DetailArticles['description'] ?>
                    </div>
                    <h1 class="nameNews"><?php echo $DetailArticles['title'] ?></h1>

                    <div class="content-detail">
                        <p> <?php echo $DetailArticles['des'] ?></p>
                        <p> <?php echo $DetailArticles['content'] ?></p>
                    </div>



                </div>
            </div>
            <?php $this->load->view('homepage/frontend/common/aside'); ?>
        </div>
    </div>



</div>