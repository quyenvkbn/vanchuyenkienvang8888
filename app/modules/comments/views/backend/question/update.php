<section class="content-header">
	<h1>Cập nhật </h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
		<li><a href="<?php echo site_url('comments/backend/question/view');?>"> Đánh giá sản phẩm</a></li>
		<li class="active"><a href="<?php echo site_url('comments/backend/question/update/'.$DetailComments['id']);?>">Cập nhật bản ghi</a></li>
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
									<label class="col-sm-2 control-label">Câu hỏi</label>
									<div class="col-sm-10">
										<?php echo form_textarea('question', htmlspecialchars_decode(set_value('question', $DetailComments['question'])), 'class="textarea" placeholder="Câu hỏi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"');?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Trả lời lại</label>
									<div class="col-sm-10">
										<?php echo form_textarea('message', htmlspecialchars_decode(set_value('message', $DetailComments['message'])), 'class="textarea" placeholder="Trả lời lại" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"');?>
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