<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogues extends FC_Controller{

	public function __construct(){
		parent::__construct();
		$this->fc_lang = $this->config->item('fc_lang');
		$this->fcCustomer = $this->config->item('fcCustomer');
		/* KIỂM TRA TÌNH TRẠNG WEBSITE */
		if($this->fcSystem['homepage_website'] == 1){
			echo '<img src="'.base_url().'templates/backend/images/close.jpg'.'" style="width:100%;" />';die();
		}
		/* -------------------------- */
	}

	public function View($id = 0, $page = 1){
		$id = (int)$id;
		$page = (int)$page;
		$seoPage = '';
		$DetailCatalogues = $this->FrontendArticlesCatalogues_Model->ReadByField('id', $id, $this->fc_lang);

		//ứng luôn luôn xuyen
		if(!isset($DetailCatalogues) && !is_array($DetailCatalogues) && count($DetailCatalogues) == 0){
			$this->session->set_flashdata('message-danger', $this->lang->line('error_articles_catalogues'));
			redirect(base_url());
		}
		$config['total_rows'] = $this->FrontendArticles_Model->_count(array(
			'select' => '`pr`.`id`',
			'modules' => 'articles',
		), $DetailCatalogues, $this->fc_lang);
		$config['base_url'] = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], 'articles_catalogues', FALSE, TRUE);
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['prefix'] = 'trang-';
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = 12;
			$config['uri_segment'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination"><li >';
			$config['full_tag_close'] = '</li></ul>';
			$config['cur_tag_open'] = '<a class="active" >';
			$config['cur_tag_close'] = '</a>';

			$this->pagination->initialize($config);
			$data['PaginationList'] = $this->pagination->create_links();
			$totalPage = ceil($config['total_rows']/$config['per_page']);
			$page = ($page <= 0)?1:$page;
			$page = ($page > $totalPage)?$totalPage:$page;
			$seoPage = ($page >= 2)?(' - Trang '.$page):'';
			if($page >= 2){
				$data['canonical'] = $config['base_url'].'/trang-'.$page.$this->config->item('url_suffix');
			}
			$page = $page - 1;
			//Đổ bài
			$data['ArticlesList'] = $this->FrontendArticles_Model->_view(array(
				'select' => '`pr`.`id`, `pr`.`viewed`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`created`, `users`.`fullname`',
				'modules' => 'articles',
				'start' => ($page * $config['per_page']),
				'limit' => $config['per_page'],
				'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
			), $DetailCatalogues, $this->fc_lang);
			
		}
		if(!isset($data['canonical']) || empty($data['canonical'])){
			$data['canonical'] = $config['base_url'].$this->config->item('url_suffix');
		}

		
		$data['meta_title'] = (!empty($DetailCatalogues['meta_title'])?$DetailCatalogues['meta_title']:$DetailCatalogues['title']).$seoPage;
		$data['meta_keyword'] = $DetailCatalogues['meta_keyword'];
		$data['meta_description'] = (!empty($DetailCatalogues['meta_description'])?$DetailCatalogues['meta_description']:cutnchar(strip_tags($DetailCatalogues['description']), 255)).$seoPage;
		$data['meta_images'] = !empty($DetailCatalogues['images'])?base_url($DetailCatalogues['images']):'';
		$data['DetailCatalogues'] = $DetailCatalogues;
		$data['canonicalcata'] = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], 'articles_catalogues');
		


//		if ($DetailCatalogues['ishit'] == 1) {
//			$data['template'] = 'articles/frontend/catalogues/gioithieu';
//		}else{
//			;
//
//		}
//		$data['template'] = 'articles/frontend/catalogues/view';


		if ($DetailCatalogues['ishot'] == 1) {
		 	$data['template'] = 'articles/frontend/catalogues/gioithieu';
		 }else{
			$data['template'] = 'articles/frontend/catalogues/view';

		 }
		$this->load->view('homepage/frontend/layouts/home', isset($data)?$data:NULL);
	}
}
