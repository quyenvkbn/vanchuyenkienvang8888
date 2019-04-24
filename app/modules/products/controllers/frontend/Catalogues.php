<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogues extends FC_Controller{

	public function __construct(){
		parent::__construct();
		$this->fc_lang = $this->config->item('fc_lang');
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

		$DetailCatalogues = $this->FrontendProductsCatalogues_Model->ReadByField('id', $id, $this->fc_lang );
		if(!isset($DetailCatalogues) && !is_array($DetailCatalogues) && count($DetailCatalogues) == 0){
			$this->session->set_flashdata('message-danger',  $this->lang->line('error_products_catalogues'));
			redirect(base_url());
		}

		$data['Breadcrumb'] = $this->FrontendProductsCatalogues_Model->Breadcrumb($DetailCatalogues['lft'], $DetailCatalogues['rgt'], $this->fc_lang);
		
		// $data['idgoc'] = showcatidgoc($DetailCatalogues['id'], $DetailCatalogues['parentid'], 'products');

		// $data['list_cat'] = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
		// 	'select' => 'id, title, slug, canonical, parentid',
		// 	'where' => array('trash' => 0, 'publish' => 1, 'parentid' => $id, 'alanguage' => ''.$this->fc_lang.''), 
		// 	'order_by' => 'order asc, id desc'
		// ));
		// if(isset($data['list_cat']) && is_array($data['list_cat']) && count($data['list_cat'])){
		// 	foreach($data['list_cat'] as $key => $val){
		// 		$data['list_cat'][$key]['post'] = $this->FrontendProducts_Model->_read_condition(array(
		// 			'modules' => 'products',
		// 			'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`, `pr`.`description`, `pr`.`saleoff`, `pr`.`viewed`, `pr`.`created`',
		// 			'where' => '`pr`.`trash` = 0 AND `pr`.`publish` = 1  AND `pr`.`alanguage` = \''.$this->fc_lang.'\'',
		// 			'limit' => 8,
		// 			'order_by' => '`pr`.`order` asc, `pr`.`id` desc',
		// 			'cataloguesid' => $val['id'],
		// 		));
		// 	}
		// }	

		// $data['parentid_cat'] = $this->FrontendProductsCatalogues_Model->ReadAllByField('parentid', $data['idgoc'], $this->fc_lang);

		// $data['parentid_cat'] =  $this->FrontendProductsCatalogues_Model->ReadAllByField('parentid', $DetailCatalogues['id'], $this->fc_lang );

		 $data['products_cat'] = $this->FrontendProductsCatalogues_Model->ReadByCondition(array(
	               'select' => 'id, title, slug, canonical, description, lft, rgt, parentid',
	               'where' => array('trash' => 0,'publish' => 1,'parentid' => '0', 'alanguage' => ''.$this->fc_lang.''),
	               'order_by' => 'order asc, id desc',
    	       ));

		// $data['maxprice'] = $this->FrontendProducts_Model->_vieworder(array(
		// 	'select' => 'MIN(`pr`.`saleoff`) as max',
		// 	'modules' => 'products',
		// 	'start' => 0,
		// 	'limit' => 1,
		// ), $DetailCatalogues);

		$config['total_rows'] = $this->FrontendProducts_Model->_count(array(
			'select' => '`pr`.`id`',
			'modules' => 'products',
		), $DetailCatalogues, $this->fc_lang);

		$config['base_url'] = rewrite_url($DetailCatalogues['canonical'], $DetailCatalogues['slug'], $DetailCatalogues['id'], 'products_catalogues', FALSE, TRUE);
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['prefix'] = 'trang-';
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = 24; //số sản phẩm trên 1 trang
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
			$data['productsList'] = $this->FrontendProducts_Model->_view(array(
				'select' => '`pr`.`id`, `pr`.`title`, `pr`.`slug`, `pr`.`canonical`, `pr`.`images`,
				`pr`.`description`, `pr`.`price`, `pr`.`saleoff`, `pr`.`content2`, `pr`.`highlight`, `pr`.`psale`, `pr`.`isfooter`
				, `pr`.`created`, `pr`.`item1`, `pr`.`item11`, `pr`.`item2`, `pr`.`item21`, `pr`.`item3`, `pr`.`item31`, `pr`.`item4`, `pr`.`item41`, `pr`.`item5`',
				'modules' => 'products',
				'order_by' => '`pr`.`order` asc ,`pr`.`id` desc',
				'start' => ($page * $config['per_page']),
				'limit' => $config['per_page'],
			), $DetailCatalogues, $this->fc_lang);

			if(!isset($data['canonical']) || empty($data['canonical'])){
				$data['canonical'] = $config['base_url'].$this->config->item('url_suffix');
			}
		}

		$data['link'] = 'products.html';
		$data['meta_title'] = (!empty($DetailCatalogues['meta_title'])?$DetailCatalogues['meta_title']:$DetailCatalogues['title']).$seoPage;
		$data['meta_keyword'] = $DetailCatalogues['meta_keyword'];
		$data['meta_description'] = (!empty($DetailCatalogues['meta_description'])?$DetailCatalogues['meta_description']:cutnchar(strip_tags($DetailCatalogues['description']), 255)).$seoPage;
		$data['meta_images'] = !empty($DetailCatalogues['images'])?base_url($DetailCatalogues['images']):'';
		$data['DetailCatalogues'] = $DetailCatalogues;


//	if ($DetailCatalogues['ishome'] == 1) {
//		$data['template'] = 'products/frontend/catalogues/canhan';
//	}else{
//		if ($DetailCatalogues['highlight'] == 1) {
//			$data['template'] = 'products/frontend/catalogues/doanhnghiep';
//		}else{
//
//			$data['template'] = 'products/frontend/catalogues/view';
//		}
//
//
//	}



		$data['template'] = 'products/frontend/catalogues/view';
		$this->load->view('homepage/frontend/layouts/home', isset($data)?$data:NULL);
	}
}
