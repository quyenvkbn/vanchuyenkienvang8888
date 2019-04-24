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

	<section class="artcatalogue mt20">
		<div class="uk-container uk-container-center">
			<section class="panel-body">
				<?php if(isset($ArticlesList) && is_array($ArticlesList) && count($ArticlesList)){ ?>
					<ul class="uk-grid lib-grid-20 uk-grid-width-1-1 uk-grid-width-large-1-2 list-article">
						<?php foreach($ArticlesList as $key => $val) { ?> 
							<?php 
							$title = $val['title'];
							$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'articles');
							$image = getthumb($val['images'], TRUE);
							$description = cutnchar(strip_tags($val['description']),450);
							$created = show_time($val['created'], 'd/m/Y');
							$view = $val['viewed'];
							?>
							<li class="mb20">
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
											<span class="view_detail"><?php echo $created ?> - <?php echo $view ?> Lượt xem</span>
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
					<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
				<?php }else{ echo '<div class="mt10">'.$this->lang->line('no_data_table').'</div>';} ?>
			</section>
		</div>
	</section><!-- .article-catalogue -->
</div>
