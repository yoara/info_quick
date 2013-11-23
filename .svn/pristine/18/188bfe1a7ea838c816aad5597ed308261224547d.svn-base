<?php
class Label_model extends CI_Model{
	var $name;
	var $contain_num;
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 插入一条新的标签
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:12:25
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function insert_label($date){
		$this->name = $date['name'];
		$this->contain_num = 1;
		
		$this->load->database();
		$this->db->insert('LABEL',$this);
	}
	
	public function has_label($date){
		$this->name = $date['name'];
		
		$this->load->database();
		$this->db->where('name',$this->name);
		$query = $this->db->get('LABEL');
		
		if($query['']>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/**
	 * 往标签里的统计数+1，如果没有该标签，则新增标签
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-8-9 下午04:24:01
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function add_label_num($data){
		$this->name = $data['name'];
		
		$this->load->database();
		$this->db->where('name',$this->name);
		$query = $this->db->get('LABEL');
		
		if($query->num_rows()>0){
			$result = $query->row_array();
			$this->db->where('name', $this->name);
			$this->contain_num = $result['contain_num']+1;
			$this->db->update('LABEL', $this); 
		}else{
			$this->contain_num = 1;
			$this->db->insert('LABEL',$this);
		}
	}
	
	/**
	 * 删除博客时-1 label
	 */
	public function cut_label_num($name){
		$this->name = $name;
		$this->load->database();
		$this->db->where('name',$this->name);
		$query = $this->db->get('LABEL');
		if($query->num_rows()>0){
			$result = $query->row_array();
			$this->db->where('name', $this->name);
			$this->contain_num = $result['contain_num']-1;
			if($this->contain_num<0){
				$this->contain_num = 0;
			}
			$this->db->update('LABEL', $this); 
		}
	}
	
	/**
	 * 查询博客标签
	 */
	public function query_labels(){
		$this->load->database();
		$this->db->order_by('contain_num','desc');
		$query = $this->db->get('LABEL');
		return $query;
	}
}