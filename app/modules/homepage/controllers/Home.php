<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends FC_Controller{

	public function __construct(){
		parent::__construct();
		$this->fc_lang = $this->config->item('fc_lang');
		$this->load->model(array('slides/FrontendSlides_Model', 'address/Frontendaddress_Model', 'lichhoc/FrontendChungchi_Model'));
		$this->load->library(array('lichhoc/configbie'));
		$this->fcCustomer = $this->config->item('fcCustomer');

	}

	public function Index($page = 1){
		/* KIỂM TRA TÌNH TRẠNG WEBSITE */
		if($this->fcSystem['homepage_website'] == 1){
			echo '<img src="'.base_url().'templates/backend/images/close.jpg'.'" style="width:100%;" />';die();
		}

		if ($this->fcSystem['homepage_about'] > 0) {
			$data['about'] = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
				'select' => 'id, title, slug, canonical,description, images',
				'where' => array('trash' => 0,'publish' => 1, 'id' => $this->fcSystem['homepage_about'], 'alanguage' => ''.$this->fc_lang.''),
				'limit' => 1,
				'order_by' => 'order asc, id desc'));
				if(isset($data['about']) && is_array($data['about']) && count($data['about'])){
					foreach($data['about'] as $key => $val){
						$data['about'][$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
							'modules' => 'articles',
							'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`',
							'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
							'limit' => 5,
							'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
							'cataloguesid' => $val['id'],
						));
					}
				}
		}
		if ($this->fcSystem['homepage_service'] > 0) {
			$data['service'] = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
				'select' => 'id, title, slug, canonical,description, images',
				'where' => array('trash' => 0,'publish' => 1, 'id' => $this->fcSystem['homepage_service'], 'alanguage' => ''.$this->fc_lang.''),
				'limit' => 1,
				'order_by' => 'order asc, id desc'));
				if(isset($data['service']) && is_array($data['service']) && count($data['service'])){
					foreach($data['service'] as $key => $val){
						$data['service'][$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
							'modules' => 'articles',
							'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`',
							'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
							'limit' => 4,
							'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
							'cataloguesid' => $val['id'],
						));
					}
				}
		}
		if ($this->fcSystem['homepage_news'] > 0) {
			$data['news'] = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
				'select' => 'id, title, slug, canonical,description, images',
				'where' => array('trash' => 0,'publish' => 1, 'id' => $this->fcSystem['homepage_news'], 'alanguage' => ''.$this->fc_lang.''),
				'limit' => 1,
				'order_by' => 'order asc, id desc'));
				if(isset($data['news']) && is_array($data['news']) && count($data['news'])){
					foreach($data['news'] as $key => $val){
						$data['news'][$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
							'modules' => 'articles',
							'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`',
							'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
							'limit' => 8,
							'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
							'cataloguesid' => $val['id'],
						));
					}
				}
		}
		if ($this->fcSystem['homepage_representative'] > 0) {
			$data['representative'] = $this->FrontendArticlesCatalogues_Model->ReadByCondition(array(
				'select' => 'id, title, slug, canonical,description, images',
				'where' => array('trash' => 0,'publish' => 1, 'id' => $this->fcSystem['homepage_representative'], 'alanguage' => ''.$this->fc_lang.''),
				'limit' => 1,
				'order_by' => 'order asc, id desc'));
				if(isset($data['representative']) && is_array($data['representative']) && count($data['representative'])){
					foreach($data['representative'] as $key => $val){
						$data['representative'][$key]['post'] = $this->FrontendArticles_Model->_read_condition(array(
							'modules' => 'articles',
							'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`',
							'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
							'limit' => 10,
							'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
							'cataloguesid' => $val['id'],
						));
					}
				}
		}

		
		$data['link'] = '/';
		
		$data['active'] = 1;
		$data['meta_title'] = $this->fcSystem['seo_meta_title'];
		$data['meta_keyword'] = $this->fcSystem['seo_meta_keywords'];
		$data['meta_description'] = $this->fcSystem['seo_meta_description'];
		$data['template'] = 'homepage/frontend/home/index';
		$this->load->view('homepage/frontend/layouts/home', isset($data)?$data:NULL);
		
	}

	
	public function Sitemap($type = 'html'){
		$data['ArticlesNews'] = $this->FrontendArticles_Model->ReadAllForSitemap($this->fc_lang, 0, 0, 100 );
		$data['ArticlesCatalogues'] = $this->FrontendArticlesCatalogues_Model->ReadAllForSitemap($this->fc_lang);
		$this->load->view('homepage/frontend/home/sitemap_'.$type, isset($data)?$data:NULL);
	}
	public function email(){
		$data['email'] = $this->input->post('email');
		$data['message'] = 'Đăng ký nhận phiếu giảm giá'; 
		if(isset($data) && is_array($data) && count($data)){
			$this->db->insert('contacts', $data);
			$result = $this->db->affected_rows();
			$this->db->flush_cache();
		}
		if($result > 0){
			echo 'Gửi đăng kí thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất';die();
		}
	}
	
	public function chungchi($page = 1){
		$page = (int)$page;
		$data['meta_title'] = 'Tuyển dụng nhân sự';
		$data['meta_keywords'] = '';
		$data['meta_description'] = '';

		if($this->input->post('create')){

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', ' / ');
			$this->form_validation->set_rules('title', 'Vị trí tuyển dụng', 'trim|required');
			$this->form_validation->set_rules('cityid', 'Địa điểm làm việc', 'trim|callback__City');
			$this->form_validation->set_rules('degree','Trình độ học vấn', 'trim|callback__Degree');
			$this->form_validation->set_rules('form', 'Hình thức làm việc', 'trim|callback__Form');
			$this->form_validation->set_rules('money', 'Mức lương', 'trim|is_natural_no_zero|callback__Money');
			$this->form_validation->set_rules('content', 'Mục tiêu nghề nghiệp', 'trim|required');

			$this->form_validation->set_rules('fullname', 'Họ tên ứng viên', 'trim|required');
			$this->form_validation->set_rules('email', 'Email liên hệ', 'trim|required');
			$this->form_validation->set_rules('phone', 'Số điện thoại liên hệ', 'trim|required|is_natural');
			$this->form_validation->set_rules('type', 'Bằng cấp/chứng chỉ', 'trim|required');
			$this->form_validation->set_rules('school', 'Trường/Đơn vị đào tạo', 'trim|required');
			$this->form_validation->set_rules('classify', 'Xếp loại tốt nghiệp', 'trim|callback__Classify');

			if ($this->form_validation->run($this)){

				$resultid = $this->FrontendChungchi_Model->Create();
				if($resultid > 0){
					$this->session->set_flashdata('message-success', 'Đăng tin tuyển dụng thành công!. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất');
					redirect('tuyen-dung-nhan-su');
				}
			}
		}
		
		$data['template'] = 'homepage/frontend/home/chungchi';
		$this->load->view('homepage/frontend/layouts/home', isset($data)?$data:NULL);
	}
	public function _City() {
		$cityid = $this->input->post('cityid');
		if(!isset($cityid) || $cityid == 0 || $cityid == '') {
			$this->form_validation->set_message('_City','Địa điểm làm việc trường bắt buộc');
			return FALSE;
		}
		return TRUE;
	}
	public function _Degree() {
		$degree = $this->input->post('degree');
		if(!isset($degree) || $degree == 0 || $degree == '') {
			$this->form_validation->set_message('_Degree','Trình độ học vấn trường bắt buộc');
			return FALSE;
		}
		return TRUE;
	}
	public function _Form() {
		$form = $this->input->post('form');
		if(!isset($form) || $form == 0 || $form == '') {
			$this->form_validation->set_message('_Form','Hình thức làm việc trường bắt buộc');
			return FALSE;
		}
		return TRUE;
	}
	public function _Money() {
		$money = $this->input->post('money');
		if(!isset($money) || $money == 0 || $money == '') {
			$this->form_validation->set_message('_Money','Mức lương trường bắt buộc');
			return FALSE;
		}
		return TRUE;
	}
	public function _Classify() {
		$classify = $this->input->post('classify');
		if(!isset($classify) || $classify == 0 || $classify == '') {
			$this->form_validation->set_message('_Classify','Xếp loại tốt nghiệp trường bắt buộc');
			return FALSE;
		}
		return TRUE;
	}
}
