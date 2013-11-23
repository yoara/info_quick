<?php
class Study_answer_model extends CI_Model{
	var $id;
	var $question_id;
	var $answer;
	var $user;
	var $study_id;
	
	function __construct()
	{
		parent::__construct();
	}

	public function query_is_answered($input,$lunshu){
		$this->load->database();
		$this->db->where('user',$input);
		$this->db->where('study_id',$lunshu);
		return $this->db->get('Study_answer');
	}
	
	public function query_user_answer($user,$question_id){
		$this->load->database();
		$this->db->where('user',$user);
		$this->db->where('question_id',$question_id);
		return $this->db->get('Study_answer');
	}
	
	public function insert_answer($data)
	{
		$this->load->database();
		foreach ($data as $value) {
			$this->db->insert('Study_answer',$value);
		}
	}
}