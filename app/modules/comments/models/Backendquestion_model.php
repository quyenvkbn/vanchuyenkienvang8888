<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backendquestion_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function UpdateByPost($field = '', $value = 0){
		$data = array(
			'message' => $this->input->post('message'),
			'updated' => gmdate('Y-m-d H:i:s', time() + 7*3600),
		);
		$this->db->where(array($field => $value))->update('payments_items', $data);
		$result = $this->db->affected_rows();
		$this->db->flush_cache();
		return $result;
	}

	public function countall(){
		$this->db->select('*');
		$this->db->from('payments_items');
		$keyword = $this->input->get('keyword');
		if(!empty($keyword)){
			$keyword = $this->db->escape_like_str($keyword);
			$this->db->where('(payments_items.question LIKE \'%'.$keyword.'%\')');
		}
		$this->db->where(array('payments_items.trash' => 0));
		$count = $this->db->count_all_results();
		$this->db->flush_cache();
		return $count;
	}

	public function view($start = 0, $limit = 0,$param= ''){
		$this->db->select('payments_items.*,customers.fullname,customers.canonical,customers.slug,customers.id as customerid');
		$this->db->from('payments_items');
		$this->db->join('customers','customers.id = payments_items.productsid');
		$keyword = $this->input->get('keyword');
		if(!empty($keyword)){
			$keyword = $this->db->escape_like_str($keyword);
			$this->db->where('(payments_items.question LIKE \'%'.$keyword.'%\')');
		}
		$this->db->limit($limit, $start);
		$this->db->where(array('payments_items.trash' => 0));
		$this->db->where($param);
		$this->db->order_by('payments_items.id desc');
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}

	
	public function delete($id = 0){
		// $this->db->where(array('id' => $id))->delete('payments_items');
		$this->db->where(array('id' => $id))->delete('payments_items');
		$result = $this->db->affected_rows();
		$this->db->flush_cache();
		return $result;
	}
	
	public function ReadByField($field = '', $value = 0){
		$this->db->where($field, $value);
		$this->db->from('payments_items');
		$result = $this->db->get()->row_array();
		$this->db->flush_cache();
		return $result;
	}
	


}