<div id="article-page" class="page-body">
	<div class="breadcrumb">
		<div class="uk-container uk-container-center">
			<ul class="uk-breadcrumb">
				<li>
					<a href="<?php echo BASE_URL ?>" title="<?php echo $this->lang->line('home_page') ?>">
						<?php echo $this->lang->line('home_page'); ?>
					</a>
				</li>
				<?php foreach($Breadcrumb as $key => $val){ ?>
					<?php 
					$title = $val['title'];
					$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles_catalogues');
					?>
					<li class="uk-active">
						<a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<section class="art-detail mt30">
		<div class="uk-container uk-container-center">
			<section class="panel-body">
				<article class="article">
					<header class="panel-head">
						<h1 class="heading mb0"><span><?php echo $DetailArticles['title'] ?></span></h1>
						<span class="meta">Đăng ngày: <?php echo show_time($DetailArticles['created'], 'd/m/Y') ?> - Lượt xem: <?php echo $DetailArticles['viewed'] ?></span>
					</header>
					<div class="content mb20 uk-clearfix">
						<strong><?php echo $DetailArticles['description']; ?></strong>
						<?php echo $DetailArticles['content']; ?>
					</div>
				</article>
				<div class="uk-flex uk-flex-middle uk-flex-space-between meta">
					<div class="left-meta">
						<a href="javascript: history.back();" class="back-page">Về trang trước</a>
						<a class="goTop-page">Lên đầu trang</a>
					</div>
					<?php links_share(); ?>
				</div>
			</section>
		</div>
	</section><!-- .article-detail -->

	<?php if (is_array($articles_same) && isset($articles_same) && count($articles_same)) { ?>
		<section class="art-same mt20 mb20">
			<div class="uk-container uk-container-center">
				<header class="panel-head uk-text-center">
					<h6 class="heading"><span><?php echo $this->lang->line('aticles_otther') ?></span></h6>
				</header>
				<section class="panel-body artcatalogue">
					<div class="uk-slidenav-position slider-2" data-uk-slider="{autoplay: true, autoplayInterval: 5500}" style="position: inherit">
						<div class="uk-slider-container" style="overflow: inherit;">
							<ul class="uk-slider uk-grid lib-grid-20 uk-grid-width-1-1 uk-grid-width-small-1-2 list-article">
								<?php foreach ($articles_same as $key => $val) { ?> 
									<?php 
									$title = $val['title'];
									$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
									$image = getthumb($val['images'], TRUE);
									$description = cutnchar(strip_tags($val['description']),450);
									$created = show_time($val['created'], 'd/m/Y');
									$view = $val['viewed'];
									?>
									<li>
										<article class="uk-clearfix article">
											<div class="thumb">
												<a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
													<img src="<?php echo $image ?>" alt="<?php echo $val['title'] ?>">
												</a>
											</div>
											<div class="infor">
												<div class="top_articles">
													<h3 class="title">
														<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
															<?php echo $val['title'] ?>
														</a>
													</h3>
													<span class="view_detail"><?php echo $view ?> Lượt xem</span>
												</div>
												<div class="description">
													<?php echo $description ?>
												</div>
												<div class="more_art">
													<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">Xem chi tiết</a>
												</div>
											</div>
										</article>
									</li>
								<?php } ?>
							</ul>
							<a href="" class="uk-slidene uk-slidenav-contrast" data-uk-slider-item="previous">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
							</a>
							<a href="" class="uk-slidepr uk-slidenav-contrast" data-uk-slider-item="next">
								<i class="fa fa-angle-left" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</section>
			</div>
		</section><!-- .article-related -->
	<?php } ?>
</div>
<style>

</style>