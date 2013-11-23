<?php
class Study_question_model extends CI_Model{
	var $id;
	var $study_id;
	var $question;
	var $norma_answer;
	var $is_select;
	
	//select
	var $select_id;
	var $question_id;
	var $select_value;
	var $select_answer;
	
	function __construct()
	{
		parent::__construct();
	}
	/**
	 * 获得所有试题，参数为轮数。人为设置
	 * @return return_type
	 * @param unknown_type $date
	 * @author yoara
	 * @version 1.0.0
	 * 2013-11-11 上午09:51:58
	 * <p>Copyright: 版权所有2013</p>
	 */
	public function query_All($input){
		$this->load->database();
		$this->db->where('study_id',$input);
		return $this->db->get('Study_question');
	}
	
	public function query_selects($input){
		$this->load->database();
		$this->db->where('question_id',$input);
		return $this->db->get('Study_question_select');
	}
}