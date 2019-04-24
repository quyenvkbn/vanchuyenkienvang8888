<section>
    <div class="sub-header sub-header-1 sub-header-contact fake-position">
        <?php
        $hrefX = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], '  articles_catalogues');
        ?>
        <div class="sub-header-content">
            <h2 class="white-text title"><?php echo $DetailCatalogues['title'] ?></h2>
            <ol class="breadcrumb breadcrumb-arc">
                <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>

                <li class="active"><?php echo $DetailCatalogues['title'] ?></li>

            </ol>
        </div>
    </div>
</section>