<div id="search-page" class="page-body">
	<div class="breadcrumb">
		<div class="uk-container uk-container-center">
			<ul class="uk-breadcrumb">
				<li>
					<a href="<?php echo BASE_URL ?>" title="<?php echo $this->lang->line('home_page') ?>">
						<i class="fa fa-home"></i> <?php echo $this->lang->line('home_page') ?>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" title="<?php echo $this->lang->line('search') ?>">
						<?php echo $this->lang->line('search') ?>
					</a>
				</li>
				<li class="uk-active">
					<a href="javascript:void(0)" title="<?php echo $this->lang->line('search') ?>">
						<?php echo ((isset($keys)) ? $keys : '') ?>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<section class="prdcatalogue mt20">
		<div class="uk-container uk-container-center">
			<div class="uk-grid lib-grid-20">
				<div class="uk-width-large-5-6">
					<section class="panel-body">
						<?php if(isset($result) && is_array($result) && count($result)){ ?>
							<ul class="uk-grid list-products lib-grid-20 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-match="{target: \'.products .title\'}">
								<?php foreach($result as $key => $val) { ?> 
									<?php 
									$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
									$image = getthumb($val['images'], TRUE);
									$price = (($val['saleoff'] > 0) ? str_replace(',', '.', number_format($val['saleoff'])).' <span>₫</span>' : 'Liên hệ');
									?>
									<li class="mb20">
										<article class="products">
											<div class="thumb">
												<a class="image img-scaledown" href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
													<img src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>">
												</a>
											</div>
											<div class="infor">
												<h3 class="title">
													<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
														<?php echo $val['title'] ?>    
													</a>
												</h3>
												<div class="price-prd uk-text-center"><?php echo $price ?></div>
											</div>
										</article>
									</li>
								<?php } ?>
							</ul>
							<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
						<?php }else{ echo '<div class="mt10">'.$this->lang->line('product_no_data').'</div>';} ?>
					</section><!-- .product-catalogue -->
				</div><!-- .uk-width -->
				<div class="uk-width-large-1-6 uk-visible-large">
					<!-- Quản cáo -->
					<?php $advhome = $this->FrontendSlides_Model->Read('adv-block', $this->fc_lang); ?>
					<?php if(isset($advhome) && is_array($advhome) && count($advhome)){ ?>
						<?php foreach($advhome as $key => $val){ ?>
							<div class="banner-block mb20">
								<a href="<?php echo $val['url']; ?>" title="<?php echo $val['title']; ?>" class="img-cover">
									<img src="<?php echo $val['image']; ?>" alt="<?php echo $val['title']; ?>" />
								</a>
							</div>
						<?php } ?>
					<?php } ?>
					<!-- END Quảng cáo -->
				</div><!-- .uk-width -->	
			</div>
		</div>
	</div>
</section>