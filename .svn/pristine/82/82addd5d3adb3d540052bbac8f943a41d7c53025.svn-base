<?php require_once 'application/config/My_constants.php';

class Infos extends CI_Controller {

	public function go_add(){
		$id = $this->input->post('info_id');
		if($id){
			$this->load->model('Info_model','info');
			$query = $this->info->get_info($id);
			$data['info_body'] = $query->row_array();
		}else{
			$data['info_body'] = array(
				'title'=>'',
				'content'=>'',
				'opter'=>''
			);
		}
		$this->load->view('info/info_form',$data);
	}
	
	public function add_info()
	{
		$data = array(
			'title'=>$this->input->post('title')?$this->input->post('title'):'无标题',
			'content'=>$this->input->post('content')?$this->input->post('content'):'无内容',
			'label'=>$this->input->post('labels')?$this->input->post('labels'):array('Java'),
			'opter'=>$this->input->post('opter')?$this->input->post('opter'):'匿名',
		);
		//先增加对应的标签
		$this->load->model('Label_model','label');
		foreach ($data['label'] as $value) {
			$_label['name'] = strtoupper($value);
			$this->label->add_label_num($_label);
		}
		
		$this->load->model('Info_model','info');
		$this->info->insert_info($data);
		
		echo "<script>alert('添加完成');</script>";
		$this->load->view('go_welcome');
	}
	
	public function edit_info(){
		$data = array(
			'title'=>$this->input->post('title')?$this->input->post('title'):'无标题',
			'content'=>$this->input->post('content')?$this->input->post('content'):'无内容',
			'label'=>$this->input->post('labels')?$this->input->post('labels'):array('杂文'),
			'opter'=>$this->input->post('opter')?$this->input->post('opter'):'匿名',
			'info_id'=>$this->input->post('info_id')
		);
		//先增加对应的标签
		$this->load->model('Label_model','label');
		foreach ($data['label'] as $value) {
			$_label['name'] = strtoupper($value);
			$this->label->add_label_num($_label);
		}
		
		$this->load->model('Info_model','info');
		$this->info->edit_info($data);
		
		echo "<script>alert('编辑完成');</script>";
		$this->load->view('go_welcome');
	}
	
	public function compare($info_id,$old_version){
		$this->load->model('Info_model','info');
		$info = $this->info->get_info($info_id);
		$info_history = $this->info->get_history_version($info_id,$old_version);
		
		$data['info'] = $info->row_array();
		$data['info_history'] = $info_history->row_array();
		
		$this->load->view('info/compare',$data);
	}
	
	public function go_no_infos(){
		$this->load->model('No_info_model','no_info');
		$query = $this->no_info->query_no_infos();
		$search_info = array();
		if($query->num_rows()>0){
			//遍历，清除已经有的
			$no_i = $query->result_array();
			$has_do = array();
			$this->load->model('Info_model','info');
			for($i=0;$i<sizeof($no_i);$i++){
				$query_num = $this->info->has_infos($no_i[$i]['input']);
				if($query_num>0){
					//有资料了，则设置为已处理
					$no_i[$i]['is_do'] = 1;
					$has_do[] = $no_i[$i];
				}else{
					$search_info[] = $no_i[$i];
				}
			}
			$this->no_info->update_has_do($has_do);
		}
		$data['no_infos'] = $search_info;
		$this->load->view('info/no_infos',$data);
	}
}