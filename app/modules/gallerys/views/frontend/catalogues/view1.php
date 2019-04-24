<div id="album-page" class="page-body">
	<div class="breadcrumb uk-hidden">
		<ul class="uk-breadcrumb">
			<li><a href="<?php echo base_url(); ?>" title="<?php echo $this->lang->line('home_page') ?>"><i class="fa fa-home"></i> <?php echo $this->lang->line('home_page') ?></a></li>
			<?php foreach($Breadcrumb as $key => $val){ ?>
				<?php 
				$title = $val['title'];
				$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'gallerys_catalogues');
				?>
				<li class="uk-active"><a href="<?php echo $href; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<section class="photos-catalogue">
		<section class="panel-body">
			<?php if(isset($gallerysList) && is_array($gallerysList) && count($gallerysList)){ ?>
				<ul class="uk-grid uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5 list-photos" data-uk-grid>
					<?php foreach($gallerysList as $key => $val) { ?> 
						<?php 
						$title = $val['title'];
						$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'gallerys');
						$image = getthumb($val['images'], FALSE);
						$description = cutnchar(strip_tags($val['description']), 1000);
						$created = show_time($val['created'], 'd/m/Y');
						?>
						<li>
							<div class="photo">
								<div class="thumb">
									<a class="image img-cover" href="<?php echo $href ?>" title="<?php echo $title ?>">
										<img src="<?php echo $image ?>" alt="<?php echo $title ?>" />
									</a>
								</div>
								<h3 class="title">
									<a href="<?php echo $href ?>" title="<?php echo $title ?>">
										<?php echo $title ?>
									</a>
								</h3>
								<div class="infor">
									<div class="description"><?php echo $val['description']; ?></div>
									<?php if (isset($val['tag']) && count($val['tag']) && is_array($val['tag'])): ?>
									<div class="categories">
										<span class="label">Tag: </span>
										<?php foreach ($val['tag'] as $keyt => $value) { ?>
											<?php $hreft = rewrite_url($value['canonical'], $value['slug'], $value['id'], 'tags'); ?>
											<a href="<?php echo $hreft ?>" title="<?php echo $value['title'] ?>">
												<?php echo $value['title'].(($keyt == (count($val['tag']) - 1)) ? '' : ', ') ?>
											</a>
										<?php } ?>
									</div>
								<?php endif ?>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		<?php }else{ echo '<div class="mt10">'.$this->lang->line('no_data_table').'</div>'; } ?>
	</section><!-- .panel-body -->
	<footer class="panel-foot">
		<div class="viewmore"><a href="" title="">Xem nhiều thiết kế nội thất</a></div>
	</footer>
	<?php echo (isset($PaginationList)) ? $PaginationList : ''; ?>
</section>
<div class="general-box">
	<div class="uk-container uk-container-center">
		<div class="uk-grid uk-grid-medium">
			<div class="uk-width-large-3-4">
				<?php if (isset($danhmuchome) && is_array($danhmuchome) && count($danhmuchome)): ?>
				<div class="newslist">
					<ul class="uk-list listarticle">
						<?php foreach ($danhmuchome as $key => $val) { ?> 
							<?php $image = getthumb($val['images'], TRUE); ?>
							<?php $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'gallerys'); ?> 
							<li>
								<article class="uk-clearfix article">
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
										<div class="meta"><?php echo $val['created'] ?></div>
										<div class="description"><?php echo cutnchar(strip_tags($val['description']), 150) ?></div>
										<div class="viewmore">
											<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">Read More</a>
										</div>
									</div>
								</article>
							</li>
						<?php } ?>
					</ul>	
				</div>
			<?php endif ?>
			<?php if (isset($tagall) && is_array($tagall) && count($tagall)): ?>
			<div class="uk-clearfix taglist">
				<?php foreach ($tagall as $key => $val) { ?>
					<?php $hreft = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'tags'); ?>
					<a href="<?php echo $hreft ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a>
				<?php } ?>
			</div>
		<?php endif ?>
	</div>
	<div class="uk-width-large-1-4 uk-visible-large">
		<aside class="aside">
			<?php if (isset($parentid_cat) && is_array($parentid_cat) && count($parentid_cat)): ?>
			<div class="listcategory">
				<ul class="uk-list">
					<?php foreach ($parentid_cat as $key => $val) { ?>
						<?php $href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'gallerys'); ?> 
						<?php $count_id = catalogues_relationship($val['id'], 'gallerys', array('Backendgallerys','BackendgallerysCatalogues'), 'gallerys_catalogues', $this->fclang); ?>
						<li>
							<a href="<?php echo $href ?>" title="<?php echo $val['title'] ?>">
								<?php echo $val['title'] ?><span class="count">(<?php echo (isset($count_id) && is_array($count_id) && count($count_id) ) ? count($count_id) : 0; ?>)</span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		<?php endif ?>
		<?php $this->load->view('homepage/frontend/common/advertise'); ?>
	</aside>
</div>
</div>
</div>
</div>
</div><!-- .uk-width -->