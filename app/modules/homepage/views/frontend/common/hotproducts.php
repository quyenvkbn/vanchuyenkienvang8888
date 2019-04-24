<?php  
	$data = $this->FrontendProducts_Model->ReadByCondition(array(
		'select' => 'id, title, slug, canonical, images, saleoff, price, content2, highlight, psale, isfooter, description',
		'table' => 'products',
		'where' => array('publish' => 1,'trash' => 0, 'highlight' => 1, 'alanguage' => $this->fc_lang),
		'limit' => 1,
		'order_by' => 'order asc, id desc',
	));
?>
<?php if (isset($data) && is_array($data) && count($data)) { ?>
	<section class="prd-hot aside-panel">
		<section class="panel-body p10px">
			<ul class="uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-1 list-products" data-uk-grid-match="{target: '.product .title'}">
				<?php foreach($data as $key => $val){ ?>
					<?php 
						$title = $val['title'];
						$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
						$image = getthumb($val['images'], FALSE);
						$price = $val['price'];
						$saleoff = $val['saleoff'];
						if ($price > 0) {
							$giaold = str_replace(',', '.', number_format($price)).'₫';
						}else{
							$giaold = '';
						}
						if ($saleoff > 0) {
							$gia = str_replace(',', '.', number_format($saleoff)).'₫';
						}else{
							$gia = 'Liên hệ';
						}
						if ($saleoff > 0 && $price > 0 && $saleoff < $price) {
							$sale = ceil(($price - $saleoff)/$price*100);
							$price_sale = str_replace(',', '.', number_format($price - $saleoff)).'₫';
						}else{
							$sale = $price_sale = '';
						}
					?>
					<li>
						<div class="product">
							<div class="thumb">
								<a class="image img-scaledown" href="<?php echo $href ?>" title="<?php echo $title; ?>">
									<img src="<?php echo $val['images'] ?>" alt="<?php echo $title; ?>" />
									<?php if ($price_sale != ''): ?>
										<div class="price_sale">- <?php echo $price_sale ?></div>
									<?php endif ?>
									<div class="item_pos <?php echo (($val['highlight'] == 1) ? 'highlight' : (($val['psale'] == 1) ? 'psale' : (($val['isfooter'] == 1) ? 'pnews' : ''))) ?>"></div>
									<div class="description">
										<div class="style_des">
											<?php echo $val['description'] ?>
										</div>
									</div>
								</a>
							</div>
							<div class="infor">
								<div class="padding-box">
									<h3 class="title">
										<a href="<?php echo $href ?>" title="<?php echo $title; ?>">
											<?php echo $title; ?>
										</a>
									</h3>
									<div class="uk-flex uk-flex-middle uk-flex-space-between price-products">
										<div class="price-prd">
											<div class="mb5 uk-flex uk-flex-middle uk-grid-small">
												<span class="price-old"><?php echo $giaold ?></span>
			                                    <span class="price-sales"><?php echo $gia ?></span>
			                                </div>
			                                <div class="star_item"></div>
			                            </div>
			                            <?php if ($sale != ''): ?>
			                            	<div class="sale-property">-<?php echo $sale ?>%</div>
			                            <?php endif ?>
		                            </div>
		                        </div>
		                        <div class="sale_ relative">
	                            	<?php if ($val['content2'] != ''): ?>
	                            		<div class="sale_content"><?php echo $val['content2'] ?></div>
	                            	<?php endif ?>
	                            	<div class="box_absolute">
		                            	<div class="uk-flex uk-flex-middle uk-flex-space-between lib-grid-15">
		                            		<div class="box_more">
		                            			<a href="<?php echo $href ?>" title="<?php echo $title; ?>">Xem chi tiết</a>
		                            		</div>
		                            		<div class="box_more">
		                            			<a href="">Chọn so sánh</a>
		                            		</div>
		                            	</div>
		                            </div>
	                            </div>
							</div><!-- .infor -->
						</div><!-- .product -->
					</li>
				<?php } ?>
			</ul>
		</section>
	</section><!-- .prd-same -->
<?php } ?>


