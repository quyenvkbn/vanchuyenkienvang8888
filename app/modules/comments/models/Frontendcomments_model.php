<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendComments_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	

	public function countall($module = '', $moduleid = 0){
		$this->db->select('*');
		$this->db->from('comments');
		
		$this->db->where(array(
			'trash' => 0,
			'module' => $module,
			'moduleid' => $moduleid,
			'publish' => 1,
		));
		$count = $this->db->count_all_results();
		$this->db->flush_cache();
		return $count;
	}

	public function view($start = 0, $limit = 0, $module = '', $moduleid = 0){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where(array(
			'trash' => 0,
			'module' => $module,
			'moduleid' => $moduleid,
			'publish' => 1,
		));
		$this->db->limit($limit, $start);
		$this->db->where(array('trash' => 0));
		$this->db->order_by('id desc');
		$result = $this->db->get()->result_array();
		$this->db->flush_cache();
		return $result;
	}


}