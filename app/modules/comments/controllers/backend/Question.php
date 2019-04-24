<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends FC_Controller{

	public function __construct(){
		parent::__construct();
		$this->fcUser = $this->config->item('fcUser');
		if(!$this->fcUser) redirect('admin/login');
		$this->load->model(array('Backendquestion_model', 'products/BackendProducts_Model'));
		$this->load->library('ConfigBie');
	}

	public function view($page = 1){
		$page = (int)$page;
		$config['total_rows'] = $this->Backendquestion_model->countall();
		if($config['total_rows'] > 0){
			$this->load->library('pagination');
			$config['base_url'] = base_url('comments/backend/question/view');
			$config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
			$config['first_url'] = $config['base_url'].$config['suffix'];
			$config['per_page'] = 10;
			$config['uri_segment'] = 5;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
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
			$data['listComment'] = $this->Backendquestion_model->view(($page * $config['per_page']), $config['per_page'],array());
			//echo "<pre>";var_dump($data['listComment']);die;
		}
		
		
		$data['template'] = 'comments/backend/question/view';
		$this->load->view('dashboard/backend/layouts/home', isset($data)?$data:NULL);
	}
	public function set($type = NULL, $id = 0){
		$redirect = $this->input->get('redirect');
		$id = (int)$id;
		$data['comments'] = $this->Backendquestion_model->ReadByField('id', $id);
		$temp[$type] = (($data['comments'][$type] == 1)?0:1);
		$temp['updated'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
		$this->db->where('id', $id);
		$this->db->update('payments_items', $temp);
		redirect((!empty($redirect)) ? $redirect : 'comments/backend/question/view');
	}

	public function delete($id = 0){
		$id = (int)$id;
		$data['Detailcomments'] = $this->Backendquestion_model->ReadByField('id',$id);
		if(!isset($data['Detailcomments']) && !is_array($data['Detailcomments']) && count($data['Detailcomments']) == 0){
			$this->session->set_flashdata('message-danger', ' không tồn tại');
			redirect_custom('comments/backend/question/view');
		}
		if($this->input->post('delete')){
			$flag = $this->Backendquestion_model->delete($id);
			if($flag > 0){
				$this->session->set_flashdata('message-success', 'Xóa  thành công');
				redirect('comments/backend/question/view');
			}
		}
		$data['template'] = 'comments/backend/question/delete';
		$this->load->view('dashboard/backend/layouts/home', isset($data)?$data:NULL);
	}

	public function Update($id = 0){
		$this->commonbie->Permissions(array(
			'uri' => 'comments/backend/question/update'
		));
		$id = (int)$id;
		$data['DetailComments'] = $this->Backendquestion_model->ReadByField('id', $id);
		if(!isset($data['DetailComments']) && !is_array($data['DetailComments']) && count($data['DetailComments']) == 0){
			$this->session->set_flashdata('message-danger', 'Bài viết không tồn tại');
			redirect_custom('comments/backend/question/view');
		}

		if($this->input->post('update')){
			$message = $this->input->post('message');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', ' / ');
			$this->form_validation->set_rules('question', 'Câu hỏi', 'trim|required');
			if ($this->form_validation->run($this)){
				$this->Backendquestion_model->UpdateByPost('id',$data['DetailComments']['id']);
				$this->session->set_flashdata('message-success', 'Cập nhật bài viết thành công');
				redirect_custom('comments/backend/question/view');
			}
		}
		$data['template'] = 'comments/backend/question/update';
		$this->load->view('dashboard/backend/layouts/home', isset($data)?$data:NULL);
	}

}
