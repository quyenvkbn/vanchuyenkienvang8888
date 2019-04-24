<?php $footer_nav = navigations_array('footer', $this->fc_lang); ?>
<?php if(isset($footer_nav) && is_array($footer_nav) && count($footer_nav)){ ?>
	<?php foreach($footer_nav as $key => $val){ ?>
		<?php if(isset($val['child']) && is_array($val['child']) && count($val['child'])){ ?>
			<section class="footer_box_col">
                <header class="panel-head">
                    <div class="heading"><span><?php echo $val['title'] ?></span></div>
                </header>
                <section class="panel-body">
					<ul class="footer-nav uk-list uk-clearfix">
						<?php foreach($val['child'] as $key => $vals){ ?>
							<li>
								<a href="<?php echo $vals['href']; ?>" title="<?php echo $vals['title']; ?>">
									<?php echo $vals['title']; ?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</section>
			</section>
		<?php } ?>
	<?php } ?>
<?php } ?>
