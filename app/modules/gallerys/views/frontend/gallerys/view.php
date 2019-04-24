<link href="templates/frontend/resources/css/lightbox.min.css" rel="stylesheet"/>
<script type="text/javascript" src="templates/frontend/resources/js/lightbox-plus-jquery.min.js"></script>

<div class="clearix"></div>

<article id="body_home">
 <?php  $this->load->view('homepage/frontend/common/bannerdethuong');  ?>
	<section class="album">
		<div class="container">
			<div class="row_pc">
				<div class="row_5">
					<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
						<div class="row_10">
							<div class="left_page_album">
								<?php $href = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], 'gallerys_catalogues'); ?> 
								<ul>
									<?php $main_nav = navigations_array('main', $this->fc_lang); ?>
									<?php if(isset($main_nav) && is_array($main_nav) && count($main_nav)) {?>
										<?php foreach ($main_nav as $key=>$val): ?>


											<li class=" <?php if($val['href']==$href) { ?>  active <?php } ?> "><a href="<?php echo $val['href'] ?>"><?php echo $val['title'] ?></a></li>

										<?php endforeach  ?>
									<?php } ?>

								</ul>
							</div>
						</div>
					</div>
					<?php $albums = json_decode($DetailGallerys['albums'], TRUE); ?>
					<div class="col-lg-9 col-md-9 col-sm-9">
						<div class="row_10">
							<div class="album_page">
								<div class="title_image">
									<?php echo $DetailGallerys['title'] ?>
								</div>
								<div class="row">
									
									<?php if(isset($albums) && is_array($albums) && count($albums)){ ?>
										<?php foreach($albums as $key => $val){ ?>
									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-480-12">
										<div class="img_album h_9964" >
											<a class="example-image-link" href="<?php echo $val['images'] ?>" data-lightbox="example-set">
												<img style="object-fit: cover;" class="example-image" src="<?php echo $val['images'] ?>" alt="<?php echo $DetailGallerys['title'] ?>"/></a>
											</div>
										</div>
										<?php } ?>
									<?php } ?>

									</div>
								</div>
								 
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('homepage/frontend/common/menuchantrang'); ?>
		</section>