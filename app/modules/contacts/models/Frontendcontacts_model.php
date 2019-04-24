<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontendContacts_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function create(){
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),



			'message' => $this->input->post('message'),

//			'phone1' => $this->input->post('phone1'),
//
//			'gioitinh' => $this->input->post('gioitinh'),
//			'cmtnd' => $this->input->post('cmtnd'),
//			'nganhdangky' => $this->input->post('nganhdangky'),
//			'taitruong' => $this->input->post('taitruong'),
//			'totnghiep' => $this->input->post('totnghiep'),
//			'namtotnghiep' => $this->input->post('namtotnghiep'),
//			'hedaotao' => $this->input->post('hedaotao'),
//			'ktx' => $this->input->post('ktx'),
			'read' => 0,
			'publish' => 1,
			'receiverid' => 1,
			'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
		);
		$this->db->insert('contacts', $data);
		$result = $this->db->affected_rows();
		$this->db->flush_cache();
		return $result;
	}
	
	public function InsertByParam($data =  ''){
		$this->db->insert('contacts', $data);
		$result = $this->db->affected_rows();
		$this->db->flush_cache();
		return $result;
	}
	
	

}