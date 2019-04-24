<div id="interior-page" class="page-body">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-large-3-4">
				<section class="interior-section">
					<header class="panel-head">
						<article class="article">
							<?php echo $DetailCatalogues['description']; ?>
						</article>
					</header>
					<section class="panel-body">
						<?php if(isset($productsList) && is_array($productsList) && count($productsList)){ ?>
							<ul class="uk-grid lib-grid-5 uk-grid-width-1-2 uk-grid-width-medium-1-3 list" data-uk-grid>
								<?php foreach ($productsList as $key => $val) { ?>
									<?php  
										$title = $val['title'];
										$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
										$image = getthumb($val['images'], FALSE);
									?>
									<li>
										<article class="article">
											<div class="thumb">
												<a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
				                                    <img src="<?php echo $image; ?>" alt="<?php echo $val['title'] ?>" />
				                                </a>
											</div>
											<div class="infor">
												<h3 class="title">
													<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
														<?php echo $val['title'] ?>
													</a>
												</h3>
												<div class="description">
													<?php echo $val['description'] ?>
												</div>
											</div>
										</article>
									</li>
								<?php } ?>
							</ul>
							<footer class="panel-foot">
								<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
							</footer>
						<?php } ?>
					</section>
				</section>
			</div>
			<div class="uk-width-large-1-4 uk-visible-large">
				<aside class="aside">
					<?php $this->load->view('homepage/frontend/common/advertise'); ?>
				</aside>
			</div>
		</div>
		<?php if (isset($danhmuchome) && is_array($danhmuchome) && count($danhmuchome)): ?>
			<section class="interior-news">
				<section class="panel-body">
					<div id="interior-news" class="owl-carousel owl-theme list-article">
						<?php foreach ($danhmuchome as $key => $val){ ?>
							<?php $image = getthumb($val['images'], TRUE); ?>
            				<?php $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products'); ?> 
						    <div class="item">
						    	<div class="box">
						    		<article class="article">
					      				<div class="thumb">
					      					<a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
												<img src="<?php echo $image; ?>" alt="<?php echo $val['title'] ?>" />
											</a>
					      				</div>
					      				<div class="infor">
					      					<div class="title">
												<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
													<?php echo $val['title'] ?>
												</a>
					      					</div>
					      					<div class="description">
					      						<?php echo cutnchar(strip_tags($val['description']), 150) ?>. 
					      					</div>
					      				</div>
					      			</article><!-- .article -->
						    	</div>
						    </div>
						<?php } ?>
					</div>
				</section>
			</section><!-- .interior-news -->
		<?php endif ?>
	</div>
</div>