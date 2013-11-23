<?php
class Info_model extends CI_Model{
	var $info_id;
	var $title;
	var $content;
	var $label;
	var $opter;
	var $opt_time;
	var $version;
	//history
	var $old_id;
	var $old_version;
	var $old_opter;
	var $old_opt_time;
	
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function query_infos($data,$size='10'){
		$this->load->database();
		$keys = preg_split('/\s+/', $data['input']);
		for($i=0;$i<sizeof($keys);$i++){
			if($i==0){
				$this->db->like('content',$keys[$i]);
			}else{
				$this->db->or_like('content',$keys[$i]);
			}
		}
		
		$query = $this->db->get('Info',$size,$data['offset']);
		return $query;
	}
	
	public function query_historys($info_id){
		$this->load->database();
		$this->db->where('old_id',$info_id);
		$this->db->order_by("old_version", "desc"); 
		$query = $this->db->get('Info_history');
		return $query;
	}
	
	public function insert_info($data)
	{
		$label = "";
		foreach ($data['label'] as $value) {
			$label = $label.$value.";";
		}
		$insert_data['label'] = strtoupper($label);
		$insert_data['title'] = $data['title'];
		$insert_data['content'] = $data['content'];
		$insert_data['opter'] = $data['opter'];
		$insert_data['opt_time'] = date("Y-m-d H:i:m");
		
		$this->load->database();
		$this->db->insert('INFO',$insert_data);
	}
	
	public function edit_info($data){
		//添加历史
		$this->load->database();
		$this->db->where('info_id',$data['info_id']);
		$query = $this->db->get('INFO');
		$result = $query->row_array();
		
		$history['old_id'] = $result['info_id'];
		$history['old_version'] = $result['version'];
		$history['old_content'] = $result['content'];
		$history['old_opter'] = $result['opter'];
		$history['old_label'] = $result['label'];
		$history['old_opt_time'] = $result['opt_time'];
		
		$this->db->insert('INFO_HISTORY',$history);
		$data['version'] = $history['old_version'];
		
		//修改
		$label = "";
		foreach ($data['label'] as $value) {
			$label = $label.$value.";";
		}
		
		$edit_data['label'] = strtoupper($label);
		$edit_data['version'] = $data['version']+1;
		$edit_data['content'] = $data['content'];
		$edit_data['opter'] = $data['opter'];
		$edit_data['opt_time'] = date("Y-m-d H:i:m");
		
		$this->db->where('info_id', $data['info_id']);
		$this->db->update('INFO',$edit_data);
	}
	
	public function get_info($id)
	{
		$this->load->database();
		$this->db->where('info_id',$id);
		$query = $this->db->get('INFO');
		
		return $query;
	}
	
	public function get_history_version($id,$version)
	{
		$this->load->database();
		$this->db->where('old_id',$id);
		$this->db->where('old_version',$version);
		$query = $this->db->get('INFO_history');
		
		return $query;
	}
	
	public function has_infos($input){
		$this->load->database();
		$this->db->like('title',$input);
		$this->db->or_like('content',$input);
		$this->db->from('Info');
		$query_num = $this->db->count_all_results();
		return $query_num;
	}
}