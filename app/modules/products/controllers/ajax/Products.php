<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends FC_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model(array(
			'BackendProducts_Model',
			'FrontendProducts_Model',
			'tags/BackendTags_Model',
		));
		$this->load->library(array('configbie'));
		$this->fc_lang = $this->config->item('fc_lang');
	}

	//* LẤY ĐỊA ĐIỂM *//
	public function ajax_change_location(){
		$id = $this->input->post('id');
		$_html = '';
		$this->location = $this->BackendProducts_Model->location_dropdown(array(
			'where' => array('parentid' => $id),
		), true);
		if(isset($this->location) && is_array($this->location) && count($this->location)){
			foreach($this->location as $key => $val){
				$_html = $_html . '<option value="'.$key.'">'.$val.'</option>';
			}
		}
		echo json_encode(array(
			'html' => $_html,
		));
		die();
		
	}
	
	public function ajax_get_project_list(){
		$data['cityid'] = $this->input->post('cityid');
		$data['districtid'] = $this->input->post('districtid');
		$data['wardid'] = $this->input->post('wardid');
		$param['where'] = '';
		$_html = '';
	
		if($data['cityid'] > 0 && $data['districtid'] == 0){
			$param['where'] = array(
				'cityid' => $data['cityid'],
			);
		}else if($data['cityid'] > 0 && $data['districtid'] > 0 && $data['wardid']  == 0){
			$param['where'] = array(
				'cityid' => $data['cityid'],
				'districtid' => $data['districtid'],
			);
		}else if($data['cityid'] > 0 && $data['districtid'] > 0 && $data['wardid']  > 0){
			$param['where'] = array(
				'cityid' => $data['cityid'],
				'districtid' => $data['districtid'],
				'wardid' => $data['wardid'],
			);
		}else{
			echo $_html;die();
		}
		$param['where']['trash'] = 0;
		
		$listProject = $this->Autoload_Model->_get_where(array(
			'select' => 'id, title',
			'table' => 'places',
			'where' => $param['where'],
			'order_by' => 'title asc',
		), TRUE);
		
		if(isset($listProject) && is_array($listProject) && count($listProject)){
			$_html = $_html.'<option value="0">[Chọn dự án]</option>';
			foreach($listProject as $key => $val){
				$_html = $_html.'<option value="'.$val['id'].'">'.$val['title'].'</option>';
			}
		}else{
			$_html = $_html.'<option value="0">Không có dự án phù hợp</option>';
		}
		
		echo json_encode(array(
			'html' => $_html,
		)); die();
	}
	public function sort(){
		$data = NULL;
		$post = $this->input->post();
		foreach($post['order'] as $key => $val){
			$data[] = array(
				'id' => $key,
				'order' => $val,
			);
		}
		$flag = $this->BackendProducts_Model->UpdateBatchByField($data, 'id');
	}

	public function viewed(){
		$id = $this->input->post('id');
		if(!isset($_COOKIE['products_viewed_'.$id])){
			$flag = $this->FrontendProducts_Model->UpdateViewed('id', $id);
			setcookie('products_viewed_'.$id, 1, NULL, '/');
		}
	}
	public function createLink() {
		$link = $this->input->post('canonical');
		$link = slug($link);
	}
	public function sort_order() {
		sleep(0.5);
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$data = $this->input->post('number');
		if(isset($table) && !empty($table) && $id > 0) {
			$this->BackendProducts_Model->_update_sort_order($table, $id, $data);
		}
	}
	
	public function convert_commas_price(){
		$price = $this->input->post('price');
		$price_explode = explode('.',$price);
		if(count($price_explode) == 1){
			$price = (int)$price;
			
		}else{
			$price = str_replace('.','',$price);
			$price = (int)$price;
		}
		$price = str_replace(',','.',number_format($price));
		
		echo $price;die();
	}
	
	public function attributes(){
		$post = $this->input->post('post');
		$post_array = explode('-', $post);
		$temp = '';
		$_cat_ = '';
		$_attribute_cat = '';
		$_str = '';
		if(isset($post_array) && is_array($post_array) && count($post_array)){
			$_cat_ = $this->BackendProducts_Model->_get_where(array(
				'select' => 'id, title, slug, canonical, attributes',
				'table' => 'products_catalogues',
				'where' => array('trash' => 0,),
				'where_in' => $post_array,
				'where_in_field' => 'id',
			), TRUE); 
		}
		
		if(isset($_cat_) && is_array($_cat_) && count($_cat_)){
			foreach($_cat_ as $key => $val){
				$attributes_decode = json_decode($val['attributes'], TRUE);
				$temp['attribute_catalogue'] = $attributes_decode['attribute_catalogue'];
				$temp['attribute'] = $attributes_decode['attribute'];
			}
		}
		if(count($temp['attribute_catalogue']) == 0 || $temp['attribute_catalogue'][0] == ''){
			echo $_str;die();
		}
	
		
		if(isset($_cat_) && is_array($_cat_) && count($_cat_)){
			$_attribute_cat = $this->BackendAttributes_Model->_get_where(array(
				'select' => 'id, title, keyword',
				'table' => 'attributes_catalogues',
				'where' => array('trash' => 0),
				'where_in' => $temp['attribute_catalogue'],
				'where_in_field' => 'id'
			), TRUE);
		}
		
		if(isset($_attribute_cat) && is_array($_attribute_cat) && count($_attribute_cat)){
			foreach($_attribute_cat as $key => $val){
				$_attribute_cat[$key]['attributes'] = $this->BackendAttributes_Model->_get_where(array(
					'select' => 'id, title',
					'table' => 'attributes',
					'where' => array('trash' => 0,'cataloguesid' => $val['id']),
				), TRUE);
			}
		}
		
		if(isset($_attribute_cat) && is_array($_attribute_cat) && count($_attribute_cat)){
			foreach($_attribute_cat as $key => $val){
				$_str = $_str.'<div class="form-group">';
					$_str = $_str.'<label class="col-sm-2 control-lanel">'.$val['title'].'</label>';
					$_str = $_str.'<div class="col-sm-10">';
					if(isset($val['attributes']) && is_array($val['attributes']) && count($val['attributes'])){
						$_str = $_str.'<div class="checkbox" style="padding:0;">';
						foreach($val['attributes'] as $keyAttr => $valAttr){
							if(isset($temp['attribute'][$val['keyword']]) && in_array($valAttr['id'], $temp['attribute'][$val['keyword']]) == false) continue;
							$_str = $_str.'<label class="tpInputLabel" style="width:168px;">';
								$_str = $_str.'<input name="attr['.$valAttr['id'].']" type="checkbox" class="tpInputCheckbox" value="'.$valAttr['id'].'" /><span>'.$valAttr['title'].'</span>';
							$_str = $_str.'</label>';
						}
						$_str = $_str.'</div>';
					}
					$_str = $_str.'</div>';
				$_str = $_str.'</div>';
				$_str = $_str.'<script>$(document).ready(function() {$(".tpInputLabel").on("click", function() {if($(this).find(".tpInputCheckbox").is(":checked")) {$(this).addClass("checked");}else {$(this).removeClass("checked");}});});</script>';
			}
		}
		echo $_str;die();
	}
	
	public function delete(){
		$error = true;
		$message = '';
		$id = $this->input->post('post');
		if(isset($id) && is_array($id) && count($id)){
			foreach($id as $key => $val){
				$DetailProducts = $this->BackendProducts_Model->ReadByField('id', $val);
				$flag = $this->BackendProducts_Model->DeleteByField('id', $val);
				if($flag > 0){
					if(!empty($DetailProducts['canonical'])){
						$this->BackendRouters_Model->Delete($DetailProducts['canonical'], 'products/frontend/products/view', $DetailProducts['id'], 'number');
					}
					$this->BackendProducts_Model->_delete_relationship('products', $val);
					$this->BackendTags_Model->DeleteByModule($val, 'products');
					$error = false;
					$message = 'Bản ghi đã được xóa thành công';
				}
			}
		}else{
			$message = 'Có lỗi trong quá trình xóa bản ghi, vui lòng kiểm tra lại';
		}
		echo json_encode(array(
			'error' => $error,
			'message' => $message,
		)); die();
	}

	public function filter(){
		
		$post = $this->input->post('post');
		$attribute = explode('-', $post);
		$page = $this->input->post('page');
		$temp_attribute['cataloguesid'] = $this->input->post('cataloguesid');
		$page = (int)$page;
		$config['total_rows'] = $this->FrontendProducts_Model->countajaxproduct($attribute, $temp_attribute['cataloguesid'], $this->fc_lang);
		
		$result = '';
		
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['base_url'] ='#" data-page="';
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = 24;
			$config['cur_page'] = $page;
			$config['page'] = $page;
			$config['uri_segment'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = '<div class="pagination mb30"><ul class="uk-pagination uk-pagination-right" id="ajax-pagination">';
			$config['full_tag_close'] = '</ul></div>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="uk-active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['listPagination'] = $this->pagination->create_links();
			$totalPage = ceil($config['total_rows']/$config['per_page']);
			$page = ($page <= 0)?1:$page;
			$page = ($page > $totalPage)?$totalPage:$page;
			$page = $page - 1;
			$data['listProduct'] = $this->FrontendProducts_Model->viewajaxproduct(($page * $config['per_page']), $config['per_page'], $attribute, $temp_attribute['cataloguesid'], $this->fc_lang);	
		}
		$html = '';
		if(isset($data['listProduct']) && is_array($data['listProduct']) && count($data['listProduct'])){
			$html = $html .'<ul class="uk-grid list-products lib-grid-20 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-match="{target: \'.product .title\'}">';
			foreach($data['listProduct'] as $key => $val){
				$title = $val['title'];
				$href = rewrite_url($val['canonical'], $val['slug'], $val['id'], 'products');
				$image = getthumb($val['images']);
				$price = (($val['saleoff'] > 0) ? str_replace(',', '.', number_format($val['saleoff'])).' <span>₫</span>' : 'Liên hệ');
				
				$html = $html.'<li class="mb20">';
                    $html = $html.'<article class="products">';
                        $html = $html.'<div class="thumb">';
                            $html = $html.'<a title="'.$title.'" href="'.$href.'" class="img-scaledown">';
                                $html = $html.'<img src="'.$image.'" alt="'.$title.'" />';
                            $html = $html.'</a>';
                        $html = $html.'</div>';
                        $html = $html.'<div class="infor">';
                            $html = $html.'<h3 class="title">';
                                $html = $html.'<a title="'.$title.'" href="'.$href.'" >'.$title.'</a>';
                            $html = $html.'</h3>';
                            $html = $html.'<div class="price-prd uk-text-center">'.$price.'</div>';
                        $html = $html.'</div>';
                    $html = $html.'</article>';
                $html = $html.'</li>';
			}
			$html = $html.'</ul>'.$data['listPagination'];
		}
		echo json_encode(array(
			'html' => $html,
		));
		die();
	}
}
