<section class="content-header">
	<h1>Chi tiết Danh mục bài viết</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
		<li><a href="<?php echo site_url('articles/backend/catalogues/view');?>">Danh mục bài viết</a></li>
		<li class="active"><a href="<?php echo site_url('articles/backend/catalogues/read/'.$DetailArticlesCatalogues['id']);?>">Chi tiết Danh mục bài viết</a></li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<section class="invoice">
				<div class="row">
					<div class="col-xs-12">
						<h2 class="page-header">
							<i class="fa fa-envelope"></i> #<?php echo $DetailArticlesCatalogues['id'];?>
							<small class="pull-right">Ngày tạo: <?php echo gettime($DetailArticlesCatalogues['created']);?></small>
						</h2>
					</div><!-- /.col -->
				</div>
				<div class="row invoice-info">
					<?php echo show_flashdata(); ?>
					<div class="col-sm-4 invoice-col">
						<b>Danh mục bài viết</b><br>
						<br>
						<address>
						<strong><?php echo $DetailArticlesCatalogues['title'];?></strong><br>
						</address>
					</div><!-- /.col -->
					<div class="col-sm-8 invoice-col">
						<b>Thông tin</b><br>
						<br>
						<b>Xuất bản:</b> <?php echo ($DetailArticlesCatalogues['publish'] >= 0) ? $this->configbie->data('publish', $DetailArticlesCatalogues['publish']) : 'Không xuất bản';?><br>
						<b>Cột Aside:</b> <?php echo ($DetailArticlesCatalogues['isaside'] >= 0) ? $this->configbie->data('isaside', $DetailArticlesCatalogues['isaside']) : 'Không hiển thị';?><br>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-xs-12">
						<p class="lead">Mô tả:</p>
						<div class="text-muted well well-sm no-shadow">
						<?php echo $DetailArticlesCatalogues['description'];?>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-xs-12">
						<p class="lead">Nội dung:</p>
						<div class="text-muted well well-sm no-shadow">
						<?php echo $DetailArticlesCatalogues['bongda'];?>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="row no-print">
					<div class="col-xs-12">
						<a href="<?php echo site_url('articles/backend/catalogues/update/'.$DetailArticlesCatalogues['id']).'?redirect='.urlencode(current_url());?>" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Cập nhật</a>
						<a href="<?php echo site_url('articles/backend/catalogues/delete/'.$DetailArticlesCatalogues['id']).'?redirect='.urlencode(current_url());?>" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-credit-trash"></i> Xóa bỏ</a>
					</div>
				</div>
			</section><!-- /.content -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</section><!-- /.content -->