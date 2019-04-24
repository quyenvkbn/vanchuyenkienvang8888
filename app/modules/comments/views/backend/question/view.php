<section class="content-header">
    <h1>Danh sách hỏi đáp</h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin'); ?>"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
        <li class="active"><a href="<?php echo site_url('comments/backend/question/view'); ?>">Danh sách hỏi đáp</a>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!--	<h3 class="box-title pull-right">
				<div class="btn-group">
					<a href="<?php echo site_url('comments/backend/question/create'); ?>" class="btn btn-default btn-flat"><i class="fa fa-plus"></i> Thêm mới</a>
				</div>
			</h3>-->
                    <div class="box-tools pull-left">
                        <form method="get" action="<?php echo site_url('comments/backend/question/view'); ?>">
                            <div class="input-group pull-left" style="width: 250px;">
                                <input type="text" name="keyword"
                                       value="<?php echo htmlspecialchars($this->input->get('keyword')); ?>"
                                       class="form-control" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" value="action" class="btn btn-default"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <?php echo show_flashdata();
                $array = array(
                    'products' => 'Bài giảng',
                    'articles' => 'Bài viết',
                    'gallerys' => 'Hình Ảnh',
                    'videos' => 'Video',
                );
                ?>
                <?php if (isset($listComment) && is_array($listComment) && count($listComment)) { ?>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Câu hỏi</th>
                                <th>Tên luật sư</th>
                                <th style="text-align:center;">Ngày tạo</th>
                                <th style="text-align:center;">Gửi tới luật sư</th>
                                <th style="text-align:center;">Tình trạng</th>
                                <th style="text-align:center;">Xuất bản</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            <?php foreach ($listComment as $key => $comment) {

                                $href = rewrite_url($comment['canonical'], $comment['slug'], $comment['customerid'], 'customers');
                                ?>

                                <tr>
                                    <td><?php echo $comment['id']; ?></td>
                                    <td class=""><?php echo $comment['question']; ?></td>
                                    <td class=""><a href="<?php echo $href?>" target="_blank"> <?php echo $comment['fullname']; ?></a></td>

                                    <td style="text-align:center;"><?php echo gettime($comment['created'], 'd/m/Y'); ?></td>
                                    <td>
                                        <a href="<?php echo site_url('comments/backend/question/set/publish_luatsu/' . $comment['id'] . '?redirect=' . urlencode(current_url())); ?>"
                                           title="" class="status-publish">
                                            <img
                                                src="<?php echo ($comment['publish_luatsu'] > 0) ? 'templates/backend/images/publish-check.png' : 'templates/backend/images/publish-deny.png'; ?>"
                                                alt=""/>
                                        </a>
                                    </td>
                                    <td style="text-align:center;">
                                        <?php if($comment['message']==''){
                                            echo "Chưa trả lời";
                                        }elsE{
                                            echo "Đã trả lời";
                                        }?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('comments/backend/question/set/publish/' . $comment['id'] . '?redirect=' . urlencode(current_url())); ?>"
                                           title="" class="status-publish">
                                            <img
                                                src="<?php echo ($comment['publish'] > 0) ? 'templates/backend/images/publish-check.png' : 'templates/backend/images/publish-deny.png'; ?>"
                                                alt=""/>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" style="min-width: 80px;">
                                            <a href="<?php echo site_url('comments/backend/question/delete/' . $comment['id']) . '?redirect=' . urlencode(current_url()); ?>"
                                               class="btn btn-default"><span class="fa fa-trash"></span></a>
                                            <a href="<?php echo site_url('comments/backend/question/update/' . $comment['id']) . '?redirect=' . urlencode(current_url()); ?>"
                                               class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div><!-- /.box-body -->
                <?php } else { ?>
                    <div class="box-body">
                        <div class="callout callout-danger">Không có dữ liệu</div>
                    </div><!-- /.box-body -->
                <?php } ?>
                <div class="box-footer clearfix">
                    <?php echo isset($listPagination) ? $listPagination : ''; ?>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<style>
    .red {
        color: #ff0000;
    }
</style>