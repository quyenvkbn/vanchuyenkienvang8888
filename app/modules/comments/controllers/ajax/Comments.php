<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends FC_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->fcUser = $this->config->item('fcUser');
        if (!$this->fcUser) redirect('admin/login');
        $this->load->model(array('BackendComments_Model', 'FrontendComments_Model'));
        $this->load->library('ConfigBie');
    }

    public function addcomment()
    {

        $alert = array(
            'error' => '',
            'message' => '',
            'result' => ''
        );
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', ' / ');
        $this->form_validation->set_rules('fullname', 'Họ và tên', 'trim|required');
        $this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|required');
        $this->form_validation->set_rules('contents', 'Nội dung', 'trim|required');
//		$this->form_validation->set_rules('contents', 'Điểm đánh giá', 'trim|required|is_natural_no_zero');
        if ($this->form_validation->run($this)) {
            $post = $this->input->post('post');
            $data = '';
            if (isset($post) && is_array($post) && count($post)) {
                foreach ($post as $key => $val) {
                    $data[$val['name']] = $val['value'];
                }
                $data['fullname'] = $this->input->post('fullname');
                $data['phone'] = $this->input->post('phone');
                $data['message'] = $this->input->post('contents');
                $data['module'] = $this->input->post('module');
                $data['moduleid'] = $this->input->post('moduleid');
                $data['publish'] = 0;
                $data['created'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
				$data['star'] = $this->input->post('star');
                if (isset($data) && is_array($data) && count($data)) {
                    $this->db->insert('comments', $data);
                    $this->db->flush_cache();
                }
            }
        } else {
            $alert['error'] = validation_errors();
        }

        echo json_encode($alert);
        die();
    }


    public function listComment()
    {
        $module = $this->input->post('module');
        $moduleid = $this->input->post('moduleid');
        $page = $this->input->post('page');
        //var_dump($module);die;

        $page = (int)$page;
        $config['total_rows'] = $this->FrontendComments_Model->countall($module, $moduleid);
        //echo $this->db->last_query();die;
        if ($config['total_rows'] > 0) {

            $this->load->library('pagination');
            $config['base_url'] ='#" data-page="';
            $config['suffix'] = $this->config->item('url_suffix') . (!empty($_SERVER['QUERY_STRING']) ? ('?' . $_SERVER['QUERY_STRING']) : '');
            $config['first_url'] = $config['base_url'] . $config['suffix'];
            $config['per_page'] = 10;
            $config['cur_page'] = $page;
            $config['page'] = $page;
            $config['uri_segment'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            $config['full_tag_open'] = '<div class="pagination" id="ajax-pagination-cmt">';
            $config['full_tag_close'] = '</div>';
            $config['first_tag_open'] = '';
            $config['first_tag_close'] = '';
            $config['last_tag_open'] = '';
            $config['last_tag_close'] = '';
            $config['cur_tag_open'] = '<a class="active">';
            $config['cur_tag_close'] = '</a>';
            $config['next_tag_open'] = '';
            $config['next_tag_close'] = '';
            $config['prev_tag_open'] = '';
            $config['prev_tag_close'] = '';
            $config['num_tag_open'] = '';
            $config['num_tag_close'] = '';
            $this->pagination->initialize($config);
            $data['listPagination'] = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows'] / $config['per_page']);
            $page = ($page <= 0) ? 1 : $page;
            $page = ($page > $totalPage) ? $totalPage : $page;
            $page = $page - 1;
            $data['listComment'] = $this->FrontendComments_Model->view(($page * $config['per_page']), $config['per_page'], $module, $moduleid);
            $data['listComment'] = recursive($data['listComment']);
        }
        $html = '';

        if (isset($data['listComment']) && is_array($data['listComment']) && count($data['listComment'])) {
            foreach ($data['listComment'] as $key => $val) {
                $html = $html . '<li class="par">
                        <div class="article uk-clearfix">
                            <div class="thumb">
                                <img src="templates/frontend/resources/images/ys.jpg" alt="">
                            </div>
                            <div class="infor">
                                <div class="rh">
                                    <span>'.$val['fullname'].'</span>
                                    <label class="sttB"><i class="fa fa-check-circle"></i>Đã mua</label>
                                    <font class="rab">
                                        <a href="" class="cmtd">'.$val['created'].'</a>
                                    </font>
                                </div>
                                <div class="rc">
                                    <p>
                                                                  <span>';
                                    for($i=0 ; $i < $val['star']; $i++){
                                        $html = $html . '<i class="fa fa-star"></i>';
                                                                 }

                $html = $html . ' </span>
                                        <i>'.$val['message'].'</i>
                                    </p>
                                </div>
                            </div>
                            <div class="uk-clearfix"></div>
                        </div>
                    </li>';

            }
            $html = $html . '<li class="ajax-pagination">'.$data['listPagination'].'</li>';
        } else {
            $html = $html . '<li class="single_comment_area">Chưa có bình luận nào</li>';
        }

        echo json_encode(array(
            'html' => $html,
        ));
        die();
    }


}



/*
 foreach ($data['listComment'] as $key => $val) {
                $html = $html . '<li class="single_comment_area">';
                $html = $html . '<div class="info uk-flex uk-flex-middle mb10"><div class="comment-wrapper d-flex"><div class="comment-author">
									<img src="templates\frontend\resources\south\img\user.png" alt="' . $val['fullname'] . '">
								</div>

								<div class="comment-content">
									<div class="comment-meta">
										<a href="javascript:void();" class="comment-author-name">' . $val['fullname'] . '</a> |
										<a href="javascript:void();" class="comment-date">' . gettime($val['created'], 'd/m/Y') . '</a>

									</div>
									<p>' . $val['contents'] . '</p>
								</div></div><ol class="children">';
//						$html = $html .'<div class="avatar ec-cover"><img src="templates/avatar.png" alt="'.$val['fullname'].'" /></div>';
//						$html = $html.'<div class="author">';
//							$html = $html .'<div class="meta"><span class="user uk-text-bold">'.$val['fullname'].'</span> </div>';
//							$html = $html .'<div class="meta"><span class="date">'.gettime($val['created'],'d/m/Y').' </span> </div>';
//
//						$html = $html.'</div>';
//					$html = $html .'</div>';
//					$html = $html.'<div class="content">';
//						$html = $html.'<p>'.$val['contents'].'</p>';
//					$html = $html.'</div>';
                if (isset($val['child']) && is_array($val['child']) && count($val['child'])) {
                    foreach ($val['child'] as $keyg => $vals) {
                        $html = $html . '
								<li class="single_comment_area">
									<div class="comment-wrapper d-flex">
										<!-- Comment Meta -->
										<div class="comment-author">
											<img src="templates\frontend\resources\south\img\user.png" alt="' . $vals['fullname'] . '">
										</div>
										<!-- Comment Content -->
										<div class="comment-content">
											<div class="comment-meta">
												<a href="javascript:void();" class="comment-author-name">' . $vals['fullname'] . '</a> |
												<a href="javascript:void();" class="comment-date">' . gettime($vals['created'], 'd/m/Y') . '</a> |
												<a href="javascript:void();" class="comment-reply">Trả lời</a>
											</div>
                                                <p>' . $vals['contents'] . '</p>
										</div>
									</div>
								</li>
							';
                    }
                }

                $html = $html . '  </ol></li>';
            }
 */
