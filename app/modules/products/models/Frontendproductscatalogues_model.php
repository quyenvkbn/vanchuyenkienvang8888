<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendProductsCatalogues_Model extends FC_Model{

	public function __construct(){
		parent::__construct();
	}


	public function Search( $start = 0, $limit = 0, $lang = 'vietnamese'){
		$keyword = $this->input->get('key');
		$this->db->where(array('trash' => 0, 'alanguage' => $lang));
		$s1 = $this->input->get('s1');
		$s2 = $this->input->get('s2');
		$s3 = $this->input->get('s3');
		$s4 = $this->input->get('s4');
		$s5 = $this->input->get('s5');
		$s6 = $this->input->get('s6');
		$this->db->where(array('trash' => 0,'publish' => 1, 'alanguage' => $lang));
		if(!empty($s1)){
			$s1 = $this->db->escape_like_str($s1);
			$this->db->where('(thitruong = \''.$s1.'\')');
		}
		if(!empty($s2)){
			$s2 = $this->db->escape_like_str($s2);
			$this->db->where('(cataloguesid = \''.$s2.'\')');
		}
		if(!empty($s3)){
			$s3 = $this->db->escape_like_str($s3);
			$this->db->where('(thunhap = \''.$s3.'\')');
		}
		if(!empty($s4)){
			$s4 = $this->db->escape_like_str($s4);
			$this->db->where('(dotuoi = \''.$s4.'\')');
		}
		if(!empty($s5)){
			$s5 = $this->db->escape_like_str($s5);
			$this->db->where('(hannophoso = \''.$s5.'\')');
		}
		if(!empty($s6)){
			$s6 = $this->db->escape_like_str($s6);
			$this->db->where('(thituyen = \''.$s6.'\')');
		}





		// $pricefrom = $this->input->get('pricefrom');
		// $priceto = $this->input->get('priceto');
		// if(!empty($pricefrom) && !empty($priceto)){
		// 	$this->db->where('(price BETWEEN '.$pricefrom.' AND \''.$priceto.'\')');
		// }

		// $k = $this->input->get('search_in_description');
		// if(!empty($k) && $k == 1){
		// 	$k = $this->db->escape_like_str($keyword);
		// 	$this->db->or_where('(description LIKE \'%'.$k.'%\')');
		// }
		
		if(!empty($keyword)){
			$keyword = $this->db->escape_like_str($keyword);
			$this->db->where('(title LIKE \'%'.$keyword.'%\')');
		}
		$this->db->from('products');
		$this->db->order_by('id DESC');
		$this->db->limit($limit, $start);
		
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		//echo $this->db->last_query();die;
		return $result;
	}
	
	//-----------------------------------------------------
	// Tìm kiếm
	//-----------------------------------------------------
	public function Countsearch($lang = 'vietnamese'){
		$keyword = $this->input->get('key');
		$s1 = $this->input->get('s1');
		$s2 = $this->input->get('s2');
		$s3 = $this->input->get('s3');
		$s4 = $this->input->get('s4');
		$s5 = $this->input->get('s5');
		$s6 = $this->input->get('s6');
		$this->db->where(array('trash' => 0,'publish' => 1, 'alanguage' => $lang));
		if(!empty($s1)){
			$s1 = $this->db->escape_like_str($s1);
			$this->db->where('(thitruong = \''.$s1.'\')');
		}
		if(!empty($s2)){
			$s2 = $this->db->escape_like_str($s2);
			$this->db->where('(cataloguesid = \''.$s2.'\')');
		}
		if(!empty($s3)){
			$s3 = $this->db->escape_like_str($s3);
			$this->db->where('(thunhap = \''.$s3.'\')');
		}
		if(!empty($s4)){
			$s4 = $this->db->escape_like_str($s4);
			$this->db->where('(dotuoi = \''.$s4.'\')');
		}
		if(!empty($s5)){
			$s5 = $this->db->escape_like_str($s5);
			$this->db->where('(hannophoso = \''.$s5.'\')');
		}
		if(!empty($s6)){
			$s6 = $this->db->escape_like_str($s6);
			$this->db->where('(thituyen = \''.$s6.'\')');
		}
		
		// $k = $this->input->get('search_in_description');
		// if(!empty($k) && $k == 1){
		// 	$k = $this->db->escape_like_str($keyword);
		// 	$this->db->or_where('(description LIKE \'%'.$k.'%\')');
		// } 
		
		if(!empty($keyword)){
			$keyword = $this->db->escape_like_str($keyword);
			$this->db->where('(title LIKE \'%'.$keyword.'%\')');
		}

		// $pricefrom = $this->input->get('pricefrom');
		// $priceto = $this->input->get('priceto');
		// if(!empty($pricefrom) && !empty($priceto)){
		// 	$this->db->where('(price BETWEEN '.$pricefrom.' AND \''.$priceto.'\')');
		// }

		$this->db->from('products');
		$result = $this->db->count_all_results();
		$this->db->flush_cache();
				//echo $this->db->last_query();die;

		return $result;
	}

	public function Count($lang = 'vietnamese'){
		$this->db->where(array('trash' => 0, 'publish' => 1, 'alanguage' => $lang, 'parentid' => 0));
		$this->db->from('products_catalogues');
		$result = $this->db->count_all_results();
		$this->db->flush_cache();
		return $result;
	}

	//-----------------------------------------------------
	// All
	//-----------------------------------------------------
	public function All( $start = 0, $limit = 0, $lang = 'vietnamese'){
		$keyword = $this->input->get('key');
		$this->db->where(array('trash' => 0, 'publish' => 1, 'alanguage' => $lang, 'parentid' => 0));
		$this->db->from('products_catalogues');
		$this->db->order_by('order asc, id DESC');
		$this->db->limit($limit, $start);
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}
	//-----------------------------------------------------
	// Xem chi tiết danh mục
	//-----------------------------------------------------
	public function ReadByField($field = '', $value = 0, $lang = 'vietnamese'){
		$this->db->where(array('trash' => 0));
		$this->db->from('products_catalogues');
		$this->db->where(array($field => $value, 'alanguage' => $lang))->limit(1, 0);
		$result = $this->db->get()->row_array();
		$this->db->flush_cache();
		return $result;
	}

	
	public function ReadByFieldArr($field = '', $limit = 0){
		$this->db->where(array('trash' => 0));
		$this->db->from('products_catalogues');
		$this->db->where($field);
		if($limit > 0){
			$this->db->limit($limit, 0);
		}
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}
	//-----------------------------------------------------
	// Cập nhật lượt xem danh mục
	//-----------------------------------------------------
	public function UpdateViewed($field = '', $value = 0, $lang = 'vietnamese'){
		$this->db->where(array($field => $value, 'alanguage' => $lang))->set('viewed', 'viewed+1', FALSE)->update('products_catalogues');
		$result = $this->db->affected_rows();
		$this->db->flush_cache();
		return $result;
	}

	//-----------------------------------------------------
	// Hiển thị danh mục theo field
	//-----------------------------------------------------
	public function ReadAllByField($field = '', $value = 0, $lang = 'vietnamese'){
		$this->db->where(array('trash' => 0));
		$this->db->from('products_catalogues');
		$this->db->where(array($field => $value, 'alanguage' => $lang));
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}

	//-----------------------------------------------------
	// Hiển thị cấu trúc Breadcrumb
	//-----------------------------------------------------
	public function Breadcrumb($lft = 0, $rgt = 0, $lang = 'vietnamese', $select = 'id, title, slug, canonical, lft, rgt'){
		$this->db->select($select);
		$this->db->where(array('trash' => 0, 'alanguage' => $lang));
		$this->db->where(array(
			'lft <=' => $lft,
			'rgt >=' => $rgt,
		));
		$this->db->from('products_catalogues');
		$this->db->order_by('lft ASC, order ASC');
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}

	//-----------------------------------------------------
	// Hiển thị danh mục theo cấp con
	//-----------------------------------------------------
	public function ReadAllByAutoSub($catalogues = NULL){
		$this->db->where(array('trash' => 0));
		$this->db->from('products_catalogues');
		if($catalogues['rgt'] - $catalogues['lft'] == 1){
			$this->db->where(array('parentid' => $catalogues['parentid']));
		}
		else{
			$this->db->where(array('parentid' => $catalogues['id']));
		}
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}


	//-----------------------------------------------------
	// Xem danh mục cho sitemap
	//-----------------------------------------------------
	public function ReadAllForSitemap($select = 'id, title, slug, canonical, images, description, created'){
		$this->db->select($select);
		$this->db->where(array('trash' => 0));
		$this->db->from('products_catalogues');
		$this->db->order_by('created DESC');
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}
	public function ReadByCondition($param = '', $flag = FALSE){
		$param['select'] = ((isset($param['select'])) ? $param['select'] : 'id, title, slug, canonical');
		$param['where'] = ((isset($param['where'])) ? $param['where'] : '');
		$param['order_by'] = ((isset($param['order_by'])) ? $param['order_by'] : 'id desc');
		$param['limit'] = ((isset($param['limit'])) ? (int)$param['limit'] : 0);
		
		
		$this->db->select($param['select']);
		$this->db->from('products_catalogues');
		$this->db->where($param['where']);
		if($param['limit'] > 0){
			$this->db->limit($param['limit'], 0);
		}
		
		$this->db->order_by($param['order_by']);
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		if($flag == TRUE){
			if(isset($result) && is_array($result) && count($result)){
				foreach($result as $key => $val){
					$result[$key]['post'] = $this->ReadArticles($val['id']);
				}
			}
		}
		return $result;
	}
	
	public function ReadArticles($cataloguesid = 0){
		$this->db->select('id, title, slug, canonical, images, description, created');
		$this->db->where(array('trash' => 0,'cataloguesid' => $cataloguesid));
		$this->db->from('articles');
		$this->db->limit(4, 0);
		$this->db->order_by('order asc, id desc');
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}
	

}
