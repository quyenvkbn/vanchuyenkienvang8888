<section class="content-header">
	<h1>Cập nhật Nhóm hỗ trợ trực tuyến</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
		<li><a href="<?php echo site_url('supports/backend/catalogues/view');?>">Nhóm hỗ trợ trực tuyến</a></li>
		<li class="active"><a href="<?php echo site_url('supports/backend/catalogues/update/'.$DetailSupportsCatalogues['id']);?>">Cập nhật Nhóm hỗ trợ trực tuyến</a></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab-info" data-toggle="tab">Thông tin cơ bản</a></li>
					<li><a href="#tab-advanced" data-toggle="tab">Nâng cao</a></li>
				</ul>
				<form class="form-horizontal" method="post" action="">
					<div class="tab-content">
						<div class="box-body">
							<?php $error = validation_errors(); echo !empty($error)?'<div class="callout callout-danger">'.$error.'</div>':'';?>
						</div><!-- /.box-body -->
						<div class="tab-pane active" id="tab-info">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Nhóm hỗ trợ</label>
									<div class="col-sm-10">
										<?php echo form_input('title', set_value('title', $DetailSupportsCatalogues['title']), 'class="form-control" placeholder="Nhóm hỗ trợ trực tuyến"');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Địa chỉ</label>
									<div class="col-sm-4">
										<?php echo form_input('address', set_value('address', $DetailSupportsCatalogues['address']), 'class="form-control" placeholder="Địa chỉ"');?>
									</div>
									<label class="col-sm-2 control-label">Hotline</label>
									<div class="col-sm-4">
										<?php echo form_input('hotline', set_value('hotline', $DetailSupportsCatalogues['hotline']), 'class="form-control" placeholder="Hotline"');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Mô tả</label>
									<div class="col-sm-10">
										<?php echo form_textarea('description', htmlspecialchars_decode(set_value('description', $DetailSupportsCatalogues['description'])), 'class="textarea" placeholder="Mô tả" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"');?>
									</div>
								</div>
							</div><!-- /.box-body -->
						</div><!-- /.tab-pane -->
						<div class="tab-pane" id="tab-advanced">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Xuất bản</label>
									<div class="col-sm-2">
										<?php echo form_dropdown('publish', $this->configbie->data('publish'), set_value('publish', $DetailSupportsCatalogues['publish']), 'class="form-control select2" style="width: 100%;"');?>
									</div>
								</div>
							</div><!-- /.box-body -->
						</div><!-- /.tab-pane -->
					</div><!-- /.tab-content -->
					<div class="box-footer">
						<button type="reset" class="btn btn-default">Làm lại</button>
						<button type="submit" name="update" value="action" class="btn btn-info pull-right">Cập nhật</button>
					</div><!-- /.box-footer -->
				</form>
			</div><!-- nav-tabs-custom -->
		</div><!-- /.col -->
	</div> <!-- /.row -->
</section><!-- /.content -->