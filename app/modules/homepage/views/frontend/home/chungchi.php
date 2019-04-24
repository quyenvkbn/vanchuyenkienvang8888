<div id="body" class="body-container">
	<div class="breadcrumb">
		<div class="uk-container uk-container-center">
			<ul class="uk-breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>" title="<?php echo $this->lang->line('home_page') ?>">
						<i class="fa fa-home"></i><?php echo $this->lang->line('home_page') ?>
					</a>
				</li>
				<li class="uk-active">
					<a href="lien-he.html" title="Tuyển dụng nhân sự">
						Tuyển dụng nhân sự
					</a>
				</li>
			</ul>
		</div>
	</div><!-- end .breadcrumb -->
	<div class="uk-container uk-container-center"> 
		<div class="uk-grid uk-grid-medium mb20 mt20">
			<div class="uk-width-large-3-4">
				<section class="project-create">
					<header class="panel-head">
						<div class="heading-2 mb0"><span>Nộp hồ sơ tuyển dụng</span></div>
					</header>
					<section class="panel-body">
						<?php $error = validation_errors(); echo !empty($error) ? '<div class="callout callout-danger" style="padding:10px;background:rgb(195, 94, 94);color:#fff;margin-bottom:10px;">'.$error.'</div>' : '';?>
						<form action="" method="post" accept-charset="utf-8">
							<div class="line-form mb20 bor_bor">
								<div class="box_title_2">
									<span>Thông tin tổng quan</span>
								</div>
								<div class="content_content">
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Vị trí tuyển dụng *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label">
												<?php echo form_input('title', set_value('title'), 'class="uk-width-1-1 input-text" placeholder="Ví dụ: Nhân viên kinh doanh, Nhân viên hành chính ...."'); ?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Địa điểm làm việc *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label">
												<?php echo form_dropdown('cityid', location_dropdown('Thành phố', array('parentid' => 0)), set_value('cityid'), 'class="input-text catagolies"'); ?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Trình độ học vấn *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label">
												<?php echo form_dropdown('degree', $this->configbie->data('degree'), set_value('degree', 0), 'class="input-text catagolies"'); ?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Hình thức làm việc *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label">
												<?php echo form_dropdown('form', $this->configbie->data('form'), set_value('form', 0), 'class="input-text catagolies"'); ?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Mức lương mong muốn</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label">
												<?php echo form_input('money', set_value('money'), 'class="uk-width-1-1 input-text" placeholder="VNĐ/Tháng (Vui lòng nhập con số)"'); ?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Mục tiêu nghề nghiệp</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label" style="line-height: 0;padding: 10px;">
												<?php echo form_textarea('content', htmlspecialchars_decode(set_value('content')), 'cols="40" rows="10" placeholder="Gợi ý: Mục tiêu ngắn hạn của bạn trong một vài năm tới, Mục tiêu dài hạn trong 10-15 năm tới" placeholder="Nội dung" style="width: 100%; height: 150px; font-size: 13px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"'); ?>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="line-form mb20 bor_bor">
								<div class="box_title_2">
									<span>Thông tin ứng viên</span>
								</div>
								<div class="content_content">
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Họ và tên *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label" style="line-height: 0;padding: 10px;">
												<?php echo form_input('fullname', set_value('fullname'), 'placeholder="Họ và tên ứng viên" class="uk-width-1-1"');?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Địa chỉ Email *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label" style="line-height: 0;padding: 10px;">
												<?php echo form_input('email', set_value('email'), 'placeholder="Địa chỉ Email" class="uk-width-1-1"');?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Điện thoại *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label" style="line-height: 0;padding: 10px;">
												<?php echo form_input('phone', set_value('phone'), 'placeholder="Điện thoại liên hệ" class="uk-width-1-1"');?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Bằng cấp/ chứng chỉ *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label" style="line-height: 0;padding: 10px;">
												<?php echo form_input('type', set_value('type'), 'placeholder="Bằng cấp/ chứng chỉ" class="uk-width-1-1"');?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Trường/Đơn vị đào tạo *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label" style="line-height: 0;padding: 10px;">
												<?php echo form_input('school', set_value('school'), 'placeholder="Bằng cấp/ chứng chỉ" class="uk-width-1-1"');?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-left bg_bg">
											<label class="label-label">Loại tốt nghiệp *</label>
										</div>
										<div class="label-right uk-width-1-1 bdl0">
											<label class="label-label">
												<?php echo form_dropdown('classify', $this->configbie->data('classify'), set_value('classify', 0), 'class="input-text catagolies"'); ?>
											</label>
										</div>
									</div>
									<div class="uk-flex item-form uk-flex-middle">
										<div class="label-right uk-width-1-1 uk-text-center" style="width: 100%;">
											<button type="submit" name="create" value="action" class="btn btn-info">Thêm mới</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</section>
				</section>
			</div>
			<div class="uk-width-large-1-4">
				<aside class="aside_node">
					<section class="note_cv_upload">
						<section class="panel-body">
							<?php echo $this->fcSystem['address_address_1'] ?>
						</section>
					</section>
				</aside>
			</div>
		</div>
	</div>
</div>