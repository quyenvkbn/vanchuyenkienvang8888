<div id="contact-page" class="page-body">
	<div class="breadcrumb">
		<div class="uk-container uk-container-center">
			<ul class="uk-breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>" title="<?php echo $this->lang->line('home_page') ?>">
						<i class="fa fa-home"></i><?php echo $this->lang->line('home_page') ?>
					</a>
				</li>
				<li class="uk-active">
					<a href="lien-he.html" title="<?php echo $this->lang->line('contact') ?>">
						<?php echo $this->lang->line('contact') ?>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<section class="page-contact mt30">
		<div class="uk-container uk-container-center">
			<section class="panel-body">
				<div class="uk-grid uk-grid-medium">
					<div class="uk-width-large-2-3 mb20">
						<div class="contact-infomation">
							<div class="note mb10"><?php echo $this->lang->line('contact_note_note') ?>.</div>
							<h2 class="company"><?php echo $this->fcSystem['homepage_company'] ?></h2>
							<div class="address">
								<?php echo $this->fcSystem['contact_contact'] ?>
							</div>
							<div class="contact-map">
								<?php echo $this->fcSystem['contact_map'] ?>
								<style>.contact-map iframe {width: 100%;height: 100%; min-height: 300px;}</style>
							</div>
						</div>
					</div>
					<div class="uk-width-large-1-3 mb20">
						<div class="contact-form">
							<div class="label mb10"><?php echo $this->lang->line('contact_note') ?>.</div>
							<form action="post" method="them-lien-he" class="uk-form form">
							<?php $error = validation_errors(); echo !empty($error) ? '<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>' : '';?>
								<div class="uk-grid lib-grid-20 uk-grid-width-small-1-2 uk-grid-width-large-1-1">
									<div class="form-row mb10">
										<input type="text" name="fullname" value="" class="uk-width-1-1 input-text" placeholder="<?php echo $this->lang->line('fullname_customers') ?> *" />
									</div>
									<div class="form-row mb10">
										<input type="text" name="email" value="" class="uk-width-1-1 input-text" placeholder="Email *" />
									</div>
									<div class="form-row mb10">
										<input type="text" name="phone" value="" class="uk-width-1-1 input-text" placeholder="<?php echo $this->lang->line('phone_customers') ?> *" />
									</div>
									<div class="form-row mb10">
										<input type="text" name="address" value="" class="uk-width-1-1 input-text" placeholder="<?php echo $this->lang->line('address_customers') ?> *" />
									</div>
								</div><!-- end .uk-grid -->
								<div class="form-row mb10">
									<textarea name="message" value="" class="uk-width-1-1 form-textarea" style="height: 175px;" placeholder="<?php echo $this->lang->line('contact_message') ?> *"></textarea>
								</div>
								<div class="form-row uk-text-right">
									<input type="submit" name="create" class="btn-submit" value="<?php echo $this->lang->line('submit_information') ?>" />
								</div>
							</form><!-- end .form -->
						</div><!-- end .contacts -->
					</div>
				</div>
			</section>
		</div>
	</section>
</div>