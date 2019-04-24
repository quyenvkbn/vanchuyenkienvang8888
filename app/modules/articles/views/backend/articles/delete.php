<section class="content-header">
	<h1>Xóa bài viết</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
		<li><a href="<?php echo site_url('articles/backend/articles/view');?>">bài viết</a></li>
		<li class="active"><a href="<?php echo site_url('articles/backend/articles/delete/'.$DetailArticles['id']);?>">Xóa bài viết</a></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="">
				<section class="invoice">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="page-header">
								<i class="fa fa-envelope"></i> #<?php echo $DetailArticles['id'];?>
								<small class="pull-right">Ngày tạo: <?php echo gettime($DetailArticles['created']);?></small>
							</h2>
						</div><!-- /.col -->
					</div>
					<div class="row invoice-info">
							<div class="box-body">
								<?php $error = validation_errors(); echo !empty($error)?'<div class="callout callout-danger">'.$error.'</div>':'';?>
							</div><!-- /.box-body -->
						<div class="col-sm-4 invoice-col">
							<b>Bài viết</b><br>
							<br>
							<address>
							<strong><?php echo $DetailArticles['title'];?></strong><br>
							</address>
						</div><!-- /.col -->
						<div class="col-sm-8 invoice-col">
							<b>Thông tin</b><br>
							<br>
							<b>Xuất bản:</b> <?php echo ($DetailArticles['publish'] >= 0) ? $this->configbie->data('publish', $DetailArticles['publish']) : 'Không xuất bản';?><br>
							<b>Bài viết hữu ích:</b> <?php echo ($DetailArticles['isaside'] >= 0) ? $this->configbie->data('isaside', $DetailArticles['isaside']) : 'Không hiển thị';?><br>
							<b>Nổi bật:</b> <?php echo ($DetailArticles['highlight'] >= 0) ? $this->configbie->data('highlight', $DetailArticles['highlight']) : 'Không nổi bật';?><br>
						</div><!-- /.col -->
					</div><!-- /.row -->
					<div class="row">
						<div class="col-xs-12">
							<p class="lead">Mô tả:</p>
							<div class="text-muted well well-sm no-shadow">
							<?php echo $DetailArticles['description'];?>
							</div>
						</div><!-- /.col -->
						<div class="col-xs-12">
							<p class="lead">Nội dung:</p>
							<div class="text-muted well well-sm no-shadow">
							<?php echo $DetailArticles['content'];?>
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
					<div class="row">
						<div class="box-footer">
							<button type="reset" class="btn btn-default">Làm lại</button>
							<button type="submit" name="delete" value="action" class="btn btn-info pull-right">Xóa bỏ</button>
						</div><!-- /.box-footer -->
					</div>
				</section><!-- /.content -->
			</form>
		</div><!-- /.col -->
	</div><!-- /.row -->
</section><!-- /.content -->