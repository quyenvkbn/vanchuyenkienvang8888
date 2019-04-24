<aside class="aside">
	<?php if(isset($DetailCatalogues) && is_array($DetailCatalogues) && count($DetailCatalogues)){ ?>
		<section class="aside-category">
			<header class="panel-head">
	            <div class="heading">
	                <span><?php echo $DetailCatalogues['title'] ?></span>
	            </div>
	        </header>
	        <?php  
	        	$tintuc = $this->FrontendArticles_Model->_view(array(
		            'select' => '`pr`.`id`, `pr`.`viewed`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`created`',
		            'modules' => 'articles',
		            'start' => 0,
		            'order_by' => 'id desc',
		            'limit' => 5,
		        ), $DetailCatalogues);
	        ?>
	        <?php if (isset($tintuc) && is_array($tintuc) && count($tintuc)) { ?>
				<ul class="uk-list main">
					<?php foreach ($tintuc as $key => $val) { ?>
						<?php $href_a = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles'); ?>
						<li>
							<a href="<?php echo $href_a; ?>" title="<?php echo $val['title']; ?>">
							<?php echo $val['title']; ?></a>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</section><!-- .aside-category -->
	<?php } ?>
</aside>



