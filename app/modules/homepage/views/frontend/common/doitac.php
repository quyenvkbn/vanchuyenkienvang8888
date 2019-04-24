
<?php $doitac = $this->FrontendSlides_Model->Read('partner', $this->fc_lang);?>
<?php if(isset($doitac) && is_array($doitac) && count($doitac)){ ?>
<section class="partner-section">
	<div class="uk-container uk-container-center">
		<div class="uk-slidenav-position slider" data-uk-slider="{autoplay: true, autoplayInterval: 5500}">
		    <div class="uk-slider-container">
		      	<ul class="uk-slider uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-small-1-4 uk-grid-width-medium-1-4 uk-grid-width-large-1-5 uk-grid-width-xlarge-1-6">
					<?php foreach($doitac as $key => $val){ ?>
						<li>
							<div class="thumb">
								<a class="image img-scaledown" href="<?php echo $val['image'] ?>" target="_blank">
									<img src="<?php echo $val['image'] ?>" alt="<?php echo $val['title']; ?>">
								</a>
							</div>
						</li>
					<?php } ?>
				</ul>
		        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
		    </div>
		</div><!-- .slider -->
	</div>
</section>
<?php } ?>