<?php
class No_info_model extends CI_Model{
	var $no_id;
	var $input;
	var $is_do;
	function __construct()
	{
		parent::__construct();
	}
	
	public function insert_no($input)
	{
		$insert_data['input'] = $input;
		$this->load->database();
		$this->db->insert('NO_INFO',$insert_data);
	}
	
	public function query_no_infos(){
		$this->load->database();
		$this->db->where('is_do',0);
		$query = $this->db->get('NO_INFO');
		
		return $query;
	}
	public function update_has_do($has_do){
		if(sizeof($has_do)>0){
			$this->load->database();
			$this->db->update_batch('NO_INFO', $has_do, 'no_id'); 
		}
	}
}