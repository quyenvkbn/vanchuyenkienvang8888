<?php  
$DetailProductsprice = $DetailProducts['price'];
$DetailProductssaleoff = $DetailProducts['saleoff'];
if ($DetailProductsprice > 0) {
	$DetailProductsgiaold = str_replace(',', '.', number_format($DetailProductsprice)).' vnđ';
}
else
{
	$DetailProductsgiaold = '';
}
if ($DetailProductssaleoff > 0) {
	$DetailProductsgia = str_replace(',', '.', number_format($DetailProductssaleoff)).' vnđ';
}
else
{
	$DetailProductsgia = $this->lang->line('contact');
}
?>
<div id="products-page" class="page-body">
	<section class="homepage-top mt10">
		<div class="uk-container uk-container-center">
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-large-2-3">
					<?php $this->load->view('homepage/frontend/common/slider') ?>
					<section class="box_item_bottom">
						<ul class="uk-grid list-item uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4">
							<li class="mb10">
								<div class="box_item_box uk-clearfix">
									<div class="thumb">
										<img src="templates/frontend/resources/img/item-1.png" alt="item">
									</div>
									<div class="info">Cam kết sản phẩm chính hãng 100%</div>
								</div>
							</li>
							<li class="mb10">
								<div class="box_item_box uk-clearfix">
									<div class="thumb">
										<img src="templates/frontend/resources/img/item-2.png" alt="item">
									</div>
									<div class="info">Bảo hành giá đắt 500.000đ trả lại xe</div>
								</div>
							</li>
							<li class="mb10">
								<div class="box_item_box uk-clearfix">
									<div class="thumb">
										<img src="templates/frontend/resources/img/item-3.png" alt="item">
									</div>
									<div class="info">Cứu hộ tận nơi miễn phí trong bảo hành</div>
								</div>
							</li>
							<li class="mb10">
								<div class="box_item_box uk-clearfix">
									<div class="thumb">
										<img src="templates/frontend/resources/img/item-4.png" alt="item">
									</div>
									<div class="info">Đổi hàng miễn phí trong 3 ngày</div>
								</div>
							</li>
						</ul>
					</section>
				</div>
				<div class="uk-width-large-1-3">
					<?php $this->load->view('homepage/frontend/common/advertise') ?>
				</div>
			</div>
		</div>
	</section>
	<section class="design-catalogue">
		<div class="uk-container uk-container-center">
			<div class="breadcrumb">
				<ul class="uk-breadcrumb">
					<li>
						<a href="<?php echo BASE_URL ?>" title="<?php echo $this->lang->line('home_page') ?>">
							<?php echo $this->lang->line('home_page'); ?>
						</a>
					</li>
					<?php foreach($Breadcrumb as $key => $val){ ?>
						<?php 
						$title = $val['title'];
						$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products_catalogues');
						?>
						<li class="uk-active">
							<a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
						</li>
					<?php } ?>
				</ul>
			</div>
			<section class="panel-body mt20">
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-large-2-3">
						<div class="gallerys mb30">
							<a href="<?php echo $DetailProducts['images']; ?>" data-uk-lightbox="{group:'gallerys'}" class="img-scaledown" title="<?php echo $DetailProducts['title'] ?>">
								<img src="<?php echo $DetailProducts['images']; ?>" alt="<?php echo $DetailProducts['title'] ?>" />
							</a>
						</div>
						<div class="box-diem-leo">
							<div class="uk-flex uk-flex-middle uk-flex-space-between uk-grid-medium">
								<div class="ic_iteem uk-width-1-1 uk-text-center">
									<a href="#albums" title="Albums ảnh"><i class="fa fa-picture-o" aria-hidden="true"></i>Albums ảnh</a>
								</div>
								<div class="ic_iteem uk-width-1-1 uk-text-center">
									<a href="#video-album" title="Videos xe"><i class="fa fa-youtube-play" aria-hidden="true"></i>Videos xe</a>
								</div>
								<div class="ic_iteem uk-width-1-1 uk-text-center">
									<a href="#img360" title="Ảnh 360"><i class="fa fa-360" aria-hidden="true"></i>Ảnh 360</a>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-width-large-1-3">
						<section class="prd-detail-box">
							<h1 class="title-prd"><?php echo $DetailProducts['title'] ?></h1>
							<div class="price_detail mb10">
								<div class="pad-white">
									<?php if ($DetailProductsgiaold != ''): ?>
										<div class="price_old_detail">Giá cũ: <span><?php echo $DetailProductsgiaold ?></span></div>
									<?php endif ?>
									<div class="price_sales_detail">Giá khuyến mại: <span><?php echo $DetailProductsgia ?></span></div>
								</div>
							</div>
							<?php if ($DetailProducts['content2'] != ''): ?>
								<div class="price_detail khuyenmai-sale mb10">
									<div class="pad-white">
										<?php echo $DetailProducts['content2']; ?>
									</div>
								</div>
							<?php endif ?>
							<div class="box_item_detail">
								<div class="title_item_detail">
									<span>Cam kết bán hàng</span>
								</div>
								<div class="content_item_detail mt10">
									<div class="uk-grid lib-grid-20">
										<div class="uk-width-1-2 mb10">
											<div class="box_it_detail uk-clearfix">
												<div class="thumb">
													<img src="templates/frontend/resources/img/it-1.png" alt="item">
												</div>
												<div class="info">Không chính hãng đền 5 lần tiền.</div>
											</div>
										</div>
										<div class="uk-width-1-2 mb10">
											<div class="box_it_detail uk-clearfix">
												<div class="thumb">
													<img src="templates/frontend/resources/img/it-2.png" alt="item">
												</div>
												<div class="info">Đổi trả hàng sau 3 ngày mua.</div>
											</div>
										</div>
										<div class="uk-width-1-2 mb10">
											<div class="box_it_detail uk-clearfix">
												<div class="thumb">
													<img src="templates/frontend/resources/img/it-3.png" alt="item">
												</div>
												<div class="info">Vận chuyển miễn phí trong 20km.</div>
											</div>
										</div>
										<div class="uk-width-1-2 mb10">
											<div class="box_it_detail uk-clearfix">
												<div class="thumb">
													<img src="templates/frontend/resources/img/it-4.png" alt="item">
												</div>
												<div class="info">Cứu hộ tận nơi miễn phí bảo hành.</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php  
							$address_dt = $this->Frontendaddress_Model->ReadByCondition(array(
								'select' => 'id, title, size, type, attachs, canonical, slug',
								'table' => 'address',
								'where' => array('publish' => 1, 'trash' => 0, 'typeoff' => 0, 'alanguage' => $this->fc_lang),
								'limit' => 5,
								'order_by' => 'id desc',
							));
							?>
							<?php if (isset($address_dt) && is_array($address_dt) && count($address_dt)): ?>
							<div class="box_item_detail mb10">
								<div class="title_item_detail">
									<span>Địa điểm bán hàng</span>
								</div>
								<div class="content_item_detail mt10">
									<ul class="uk-list uk-clearfix tabControl-home">
										<?php foreach ($address_dt as $keya => $val) { ?>
											<li><?php echo $val['title'] ?></li>
										<?php } ?>
									</ul>
									<div class="start_open"><b>Giờ làm việc:</b> Từ 8h30 - 21h30 tất cả các ngày trong tuần.</div>
								</div>
							</div>
						<?php endif ?>
						<div class="buy mb20">
							<div class="number uk-flex uk-flex-middle mb20 lib-grid-15">
								<div class="label uk-hidden" style="width: 90px;line-height: 32px;">Số lượng</div>
								<div class="quantity-box uk-clearfix uk-hidden">
									<span class="btn btn-up">-</span>
									<input type="text" name="" value="1" class="quantity" />
									<span class="btn btn-down">+</span>
								</div>
								<div class="buy-item uk-width-1-1">
									<div class="action-button ajax-addtocart" data-quantity="1" data-id="<?php echo $DetailProducts['id'] ?>" data-price="<?php echo $DetailProductssaleoff ?>">Thêm vào giỏ hàng</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<section class="product-detail mt20">
				<section class="panel-body">
					<ul class="uk-list uk-clearfix tabControl-prd">
						<li class="uk-active">Thông tin sản phẩm</li>
						<li class="" href="#chitiet">Đánh giá chi tiết</li>
						<li class="" href="#video-album">Hình ảnh - Video</li>
						<li class="" class="#comment">Bình luận</li>
					</ul>
					<!-- Thông tin sản phẩm -->
					<section class="prd-item">
						<div class="uk-grid uk-grid-medium">
							<div class="uk-width-large-2-3">
								<section class="box_360_images" id="img360">
									<?php $albums = json_decode($DetailProducts['albums'], TRUE); ?>
									<?php if (isset($albums) && is_array($albums) && count($albums)): ?>
									<div class="left-detail-item">
										<div class="tab2">
											<script>
												function load360(title,number,src,start,height,width){
													var array = [];
													var str2 = '<div id="product" style="width:'+width+'; height: '+height+'; overflow: hidden;cursor:pointer;">';
													var str ='';
													for (var i = start; i <= number; i++) {
														var str = '<img alt="'+title+'" src="'+src+''+i+'.jpg" />';
														str2 += str;
													}
													$('.ulitemda').append(str2);
													$('#btnDescrMore2').html("Thu gọn đặc điểm nổi bật");
													$(".moreinfo").addClass("expand");
													
													str2 += ' </div>';
													$('.div360').append(str2);
												}
											</script>
											<div class="360content" id="#360content">
												<div class="div360">
													<script>
														load360('<?php echo $DetailProducts['title']; ?>','<?php echo count($albums); ?>','<?php echo $DetailProducts['code'] ?>',1,'auto','100%');
													</script>
													<center>
														<button class="btn360">Giữ chuột vào ảnh và kéo để xoay hình</button>
													</center>
												</div>
											</div>
											<script>
												$(document).ready(function() {
													$('#product').j360();
												});
											</script>
										</div>	  
									</div>	
								<?php endif ?>
							</section>
						</div>
						<div class="uk-width-large-1-3">
							<section class="box_thong_so mt20">
								<header class="panel-head">
									<div class="heading">
										<span>Thông số kỹ thuật xe <?php echo $DetailProducts['title'] ?></span>
									</div>
								</header>
								<section class="panel-body">
									<?php echo $DetailProducts['content'] ?>
								</section>
							</section>
						</div>
					</div>
				</section>
				<!-- Đánh giá chi tiết -->
				<section class="prd-item" id="chitiet">
					<section class="panel-body">
						<?php echo $DetailProducts['content3'] ?>
					</section>
				</section>
				<!-- Hình ảnh & Videos -->
				<section class="prd-item">
					<section class="panel-body">
						<!-- Hình ảnh -->
						<?php $listItem = json_decode($DetailProducts['album'], TRUE); ?>
						<?php if (isset($listItem) && is_array($listItem) && count($listItem)): ?>
						<script>
							$(document).ready(function() {
								$("#content-slider").lightSlider({
									loop:true,
									keyPress:true
								});
								$('#image-gallery').lightSlider({
									gallery:true,
									item:1,
									thumbItem: 8,
									slideMargin: 0,
									speed:2500,
									auto:false,
									loop:true,
									onSliderLoad: function() {
										$('#image-gallery').removeClass('cS-hidden');
									}  
								});
							});
						</script>
						<section class="main_slide mb20" id="albums">
							<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
								<?php foreach($listItem as $key => $val){ ?>
									<?php if ($val['images'] == '') continue; ?>
									<li data-thumb="<?php echo $val['images']; ?>">
										<a href="<?php echo $val['images']; ?>" data-uk-lightbox="{group:'gallerys'}" class="img-cover" title="<?php echo $val['title'] ?>">
											<img src="<?php echo $val['images']; ?>" alt="<?php echo $val['title'] ?>" />
										</a>
									</li>
								<?php } ?>
							</ul>
						</section>
					<?php endif ?>
					<!-- Videos liên quan -->
					<?php if (isset($videos_products) && is_array($videos_products) && count($videos_products)): ?>
					<section class="videos_products" id="video-album">
						<div class="uk-grid uk-grid-collapse">
							<div class="uk-width-large-2-3">
								<div class="iframe_video" id="player">
									<?php foreach ($videos_products as $key => $value) { ?>
										<?php $video_code = explode('?v=', $value['videos_code']); ?>
										<?php if ($key != 0) continue; ?>
										<iframe width="100%" height="500px" src="https://www.youtube.com/embed/<?php echo $video_code[1]; ?>" frameborder="0" allowfullscreen></iframe>
									<?php } ?>
								</div>
							</div>
							<div class="uk-width-large-1-3">
								<div class="box_video_detail">
									<header class="panel-head">
										<span>Video liên quan</span>
									</header>
									<section class="panel-body">
										<ul class="uk-list uk-list-video-detail">
											<?php foreach ($videos_products as $keyv => $val) { ?>
												<?php $video_c = explode('?v=', $val['videos_code']); ?>
												<li>
													<div class="box-video-detail uk-clearfix <?php echo (($keyv == 0) ? 'uk-active' : '') ?>" data-code="<?php echo $video_c[1] ?>">
														<div class="thumb">
															<img src="<?php echo getthumb($val['images']) ?>" alt="<?php echo $val['title'] ?>">
														</div>
														<div class="info">
															<div class="title-video_">
																<?php echo $val['title'] ?>
															</div>
														</div>
													</div>
												</li>
											<?php } ?>
										</ul>
									</section>
								</div>
							</div>
						</div>
					</section>
				<?php endif ?>
			</section>
		</section>
		<!-- Thông tin thêm -->
		<section class="prd-item">
			<section class="panel-body">
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-large-2-3">
						<header class="panel-head title-detail-products">
							<span>Đánh giá chi tiết</span>
						</header>
						<section class="panel-body">
							<?php echo $DetailProducts['content4'] ?>
						</section>
						<section class="comment-page">
							<div class="fb-comments" data-href="<?php echo $canonical ?>" data-numposts="5" data-width="100%"></div>
						</section>
					</div>
					<div class="uk-width-large-1-3">
						<aside class="aside">
							<?php $this->load->view('homepage/frontend/common/tin-tuc'); ?>
						</aside>
					</div>
				</div>
			</section>
		</section>
	</section><!-- .panel-body -->
</section>
</section>
<?php if (isset($products_same) && is_array($products_same) && count($products_same)): ?>
<section class="products_same">
	<header class="panel-head">
		<h2 class="heading mb20 uk-text-center">
			<span class="a_title">Sản phẩm khác</span>
		</h2>
	</header>
	<section class="panel-body">
		<ul class="uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-xlarge-1-3 list-products" data-uk-grid-match="{target: '.product .title'}">
			<?php foreach ($products_same as $keyp => $val) { ?>
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
				<li class="mb10">
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
</section>
<?php endif ?>
</div>
</section>
</div><!-- .uk-container -->