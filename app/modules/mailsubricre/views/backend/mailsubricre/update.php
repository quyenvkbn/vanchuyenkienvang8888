<section class="content-header">
	<h1>Cập nhật Email đăng ký</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
		<li><a href="<?php echo site_url('mailsubricre/backend/mailsubricre/view');?>">Danh sách Mail</a></li>
		<li class="active"><a href="<?php echo site_url('mailsubricre/backend/mailsubricre/update/'.$Detailmailsubricre['id']);?>">Cập nhật Mail</a></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab-info" data-toggle="tab">Thông tin cơ bản</a></li>
				</ul>
				<form class="form-horizontal" method="post" action="">
					<div class="tab-content">
						<div class="box-body">
							<?php $error = validation_errors(); echo !empty($error)?'<div class="callout callout-danger">'.$error.'</div>':'';?>
						</div><!-- /.box-body -->
						<div class="tab-pane active" id="tab-info">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-2 control-label">Họ và tên</label>
									<div class="col-sm-4">
										<?php echo form_input('fullname', set_value('fullname', $Detailmailsubricre['fullname']), 'class="form-control" placeholder="Tên đầy đủ"');?>
									</div>
									<label class="col-sm-2 control-label">Ngày Sinh</label>
									<div class="col-sm-4">
										<?php echo form_input('ngaysinh', set_value('ngaysinh', $Detailmailsubricre['ngaysinh']), 'class="form-control"  placeholder="Ngày tháng năm sinh"'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nghề Đào Tạo</label>
									<div class="col-sm-4">
										<?php echo form_input('nganhdangky', set_value('nganhdangky', $Detailmailsubricre['nganhdangky']), 'class="form-control" placeholder="nganhdangky"');?>
									</div>
					
									<label class="col-sm-2 control-label">Hệ đào tạo</label>
									<div class="col-sm-4">
										<?php echo form_input('hedaotao', set_value('hedaotao', $Detailmailsubricre['hedaotao']), 'class="form-control" placeholder="Hệ đào tạo"');?>
									</div>
									
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Ngày đăng ký</label>
									<div class="col-sm-4">
										<?php echo form_input('created', set_value('created', $Detailmailsubricre['created']), 'class="form-control"  disabled=""');?>
									</div>
<!--									<label class="col-sm-2 control-label">Địa chỉ</label>-->
<!--									<div class="col-sm-4">-->
<!--										--><?php //echo form_input('address', set_value('address', $Detailmailsubricre['address']), 'class="form-control" placeholder="Địa chỉ muốn học"');?>
<!--									</div>-->
								</div>
								<div class="form-group">
									
									<label class="col-sm-2 control-label">Xuất bản</label>
									<div class="col-sm-4">
										<?php echo form_dropdown('publish', $this->configbie->data('publish'), set_value('publish', $Detailmailsubricre['publish']), 'class="form-control select2" style="width: 100%;"');?>
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