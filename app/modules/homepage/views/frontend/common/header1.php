<!-- PC HEADER -->
<header class="pc-header uk-visible-large">
	<section class="lower">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between">
				<ul class="uk-list uk-list-social uk-flex uk-flex-middle lib-grid-5">
					<li>
						<a class="fb" href="<?php echo $this->fcSystem['social_facebook'] ?>">Facebook</a>
					</li>
					<li>
						<a class="tw" href="<?php echo $this->fcSystem['social_twitter'] ?>">Twitter</a>
					</li>
					<li>
						<a class="go" href="<?php echo $this->fcSystem['social_google'] ?>">Google</a>
					</li>
					<li>
						<a class="yo" href="<?php echo $this->fcSystem['social_youtube'] ?>">Youtube</a>
					</li>
				</ul>
				<div class="top_header uk-flex uk-flex-middle lib-grid-20">
					<div class="item_header">Bảo hành: <b><?php echo $this->fcSystem['contact_tongdai'] ?></b></div>
					<div class="item_header">Khiếu nại: <b><?php echo $this->fcSystem['contact_capcuu'] ?></b></div>
					<div class="item_header width">
						<div class="po-absolute hotline">
							<?php  
								$sub_str = explode('-', $this->fcSystem['contact_hotline']);
								if (isset($sub_str) && is_array($sub_str)) {
									foreach ($sub_str as $key => $value) {
										echo (($key != 0) ? '<br>' : '').$value;
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- #lower -->
	<section class="upper">
		<div class="uk-container uk-container-center">
			<div class="uk-flex uk-flex-middle uk-flex-space-between">
				<div class="logo">
					<a href="<?php echo BASE_URL ?>" title="<?php echo $this->fcSystem['homepage_company'] ?>">
						<img src="<?php echo $this->fcSystem['homepage_logo'] ?>" alt="<?php echo $this->fcSystem['homepage_company'] ?>" />
					</a>
				</div>
				<div class="bar-top">
					<div class="top_bar uk-flex uk-flex-middle lib-grid-20 mb15 uk-flex-right">
						<div class="pc-search">
							<form action="tim-kiem.html" method="get" class="uk-form form">
								<input type="text" name="key" class="uk-width-1-1 input-text" placeholder="Tìm kiếm..." />
								<button type="submit" name="" class="btn-submit"></button>
							</form>
						</div>
					</div>
					<?php $main_nav = navigations_array('main', $this->fc_lang); ?>
					<?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)){ ?>
						<nav class="main-nav uk-flex uk-flex-middle lib-grid-20">
							<ul class="uk-navbar-nav uk-clearfix main-menu">
								<?php foreach($main_nav as $key => $val){ ?>
									<li>
										<a href="<?php echo $val['href']; ?>" title="<?php echo $val['title']; ?>"><?php echo $val['title'] ?></a>
										<?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>
											<div class="dropdown-menu">
						   						<ul class="uk-list sub-menu">
												<?php foreach($val['child'] as $key => $vals){ 
													?><li>
														<a href="<?php echo $vals['href']; ?>" title="<?php echo $vals['title']; ?>"><?php echo $vals['title']; ?></a>
														<?php if(isset($vals['child']) && is_array($vals['child']) && count($vals['child'])){
															show_item_menu($vals['child']); 
														} ?>
													</li><?php
													}
												?>
												</ul>
											</div>
										<?php } ?>
									</li>
								<?php } ?>
							</ul>
							<div class="cart_box">
								<a href="dat-mua.html"></a>
							</div>
						</nav>
					<?php } ?>
				</div>
			</div>
		</div>
	</section><!-- #upper -->
</header><!-- .pc-header -->


<!-- MOBILE HEADER -->
<header class="mobile-header uk-hidden-large">
	<section class="topbar">
		<nav class="mobile-nav">
			<div class="uk-flex uk-flex-middle uk-flex-space-between">
			    <ul class="uk-list uk-list-social uk-flex uk-flex-middle lib-grid-5">
					<li>
						<a class="fb" href="<?php echo $this->fcSystem['social_facebook'] ?>">Facebook</a>
					</li>
					<li>
						<a class="tw" href="<?php echo $this->fcSystem['social_twitter'] ?>">Twitter</a>
					</li>
					<li>
						<a class="go" href="<?php echo $this->fcSystem['social_google'] ?>">Google</a>
					</li>
					<li>
						<a class="yo" href="<?php echo $this->fcSystem['social_youtube'] ?>">Youtube</a>
					</li>
				</ul>
			    <div class="box_cart">
					<a href="dat-mua.html">
						<div class="cart_item">
							<span>Giỏ hàng<br>hiện có <label class="quanlity"><?php echo $this->cart->total_items(); ?></label> sản phẩm</span>
							<span class="quanlity"><?php echo $this->cart->total_items(); ?></span>
						</div>	
					</a>
				</div>
			</div>
		</nav>
	</section>
	<section class="upper">
		<a class="moblie-menu-btn skin-1" href="#offcanvas" class="offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
			<span>Menu</span>
		</a>
		<div class="logo">
			<a href="<?php echo BASE_URL ?>" title="<?php echo $this->fcSystem['homepage_company'] ?>">
				<img src="<?php echo $this->fcSystem['homepage_logo'] ?>" alt="<?php echo $this->fcSystem['homepage_company'] ?>" />
			</a>
		</div>
		<a class="hotline" href="tel: <?php echo $this->fcSystem['contact_hotline'] ?>" title="Hotline">
			<?php echo $this->fcSystem['contact_hotline'] ?>
		</a>
	</section>
</header>