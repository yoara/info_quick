<?php require_once 'application/config/My_constants.php';

class Study_ask extends CI_Controller {
	public function go_input_name()
	{
		$this->load->view('study_ask/input_name');
	}
	public function go_ask()
	{
		$search_info['input'] = $this->input->post('nameBox');
		if(!$search_info['input']){
			echo "<script>alert('PLS input your info');window.history.go(-1)</script>";
			return;
		}else{
			$search_info['input'] = strtoupper(trim($search_info['input']));
			$this->load->model('Study_answer_model','answer');
			
			$query = $this->answer->query_is_answered($search_info['input'],NOWASK);
			if($query->num_rows()>0){
				echo "<script>alert('You are done,TKS');window.history.go(-1)</script>";
				return;
			}else{
				$this->load->model('Study_question_model','question');
				$query_question = $this->question->query_All(NOWASK);	//参数为轮数
				$search_info['question'] = $query_question->result_array();
				//加载选择题
				for ($i = 0; $i < sizeof($search_info['question']); $i++){
					if($search_info['question'][$i]['is_select']>=1){
						$query_select = $this->question->query_selects($search_info['question'][$i]['id']);
						if($query_select->num_rows()>0){
							$search_info['question'][$i]['select'] = $query_select->result_array();
						}else{
							$search_info['question'][$i]['select'] = array();
						}
					}
				}
				$this->load->view('study_ask/asks',$search_info);
			}
		}
	}
	public function go_answer()
	{
		$user = strtoupper(trim($this->input->post('nameBox')));
		$answer_value = $this->input->post('valueBox');
		
		$this->load->model('Study_answer_model','answer');
		$answer_data = array();
		//题目ID~答案^题目ID~答案
		
		$data = explode("^",$answer_value);
		foreach ($data as $value) {
			$id_value = explode("~",$value);
			$answer_data_info = array(
				"question_id" => $id_value[0], 
				"answer" => $id_value[1], 
				"user" => $user,
				"study_id" => NOWASK
			);
			$answer_data[] = $answer_data_info;
		}
		$this->answer->insert_answer($answer_data);
		
		echo "<script>alert('It is over,TKS,88');</script>";
		$this->load->view('go_welcome');
	}
	
	public function go_see()
	{
		$search_info['input'] = $this->input->post('nameBox');
		if(!$search_info['input']){
			echo "<script>alert('PLS input your info');window.history.go(-1)</script>";
			return;
		}else{
			$search_info['input'] = strtoupper(trim($search_info['input']));
			$this->load->model('Study_question_model','question');
			$this->load->model('Study_answer_model','answer');
			$query_question = $this->question->query_All(NOWASK);	//参数为轮数
			
			$search_info['question'] = $query_question->result_array();
			//加载用户答案
			for ($i = 0; $i < sizeof($search_info['question']); $i++){
				$query_user = $this->answer->query_user_answer($search_info['input'],
						$search_info['question'][$i]['id']);
				$query_select = $this->question->query_selects($search_info['question'][$i]['id']);
				if($query_user->num_rows()>0){
					$qu = $query_user->result_array();
					$search_info['question'][$i]['user_answer'] = $qu[0]['answer'];
					if($query_user->num_rows()>0){
						$qs = $query_select->result_array();
						$search_info['question'][$i]['norma_answer_select'] = "";
						$search_info['question'][$i]['user_answer_select'] = "";
						foreach ($qs as $value) {
							if(strpos($search_info['question'][$i]['norma_answer'], $value['select_value'])!==FALSE){
								$search_info['question'][$i]['norma_answer_select'] = 
								$search_info['question'][$i]['norma_answer_select'] . 
								$value['select_value'] .".". $value['select_answer']."<br/>";
							}
							if(strpos($search_info['question'][$i]['user_answer'], $value['select_value'])!==FALSE){
								$search_info['question'][$i]['user_answer_select'] = 
								$search_info['question'][$i]['user_answer_select'] . 
								$value['select_value'] .".". $value['select_answer']."<br/>";
							}
						}
					}
				}else{
					$search_info['question'][$i]['norma_answer'] = '没有答题';
					$search_info['question'][$i]['norma_answer_select'] = '';
					$search_info['question'][$i]['user_answer'] = '没有答题';
					$search_info['question'][$i]['user_answer_select'] = '';
				}
			}
			$this->load->view('study_ask/answer_compare',$search_info);
		}
	}
	public function go_seeAll()
	{
		$search_info['ques_all'] = array();
		$search_info['has_answer'] = 'NO';
		$this->load->model('Study_question_model','question');
		$this->load->model('Study_answer_model','answer');
		$query_question = $this->question->query_All(NOWASK);	//参数为轮数
		
		//初始化題目ID到数组
		if($query_question->num_rows()>0){
			$qs = $query_question->result_array();
			foreach ($qs as $value) {
				$index = ''.$value['id'];
				$search_info['ques_all'][$index] = array();
				$search_info['ques_all'][$index]['A'] = 0;
				$search_info['ques_all'][$index]['B'] = 0;
				$search_info['ques_all'][$index]['C'] = 0;
				$search_info['ques_all'][$index]['D'] = 0;
				$search_info['ques_all'][$index]['E'] = 0;
				$search_info['ques_all'][$index]['title'] = $value['question'];
				$search_info['ques_all'][$index]['message'] = '';
			}
		}
		
		//查询各人答题
		$lunshu = NOWASK;
		$question_id = NOWASK*100;
		$answer_all = $this->answer->query_all_answer($question_id);
		if($answer_all->num_rows()>0){
			$search_info['has_answer'] = 'OK';
			$qs = $answer_all->result_array();
			foreach ($qs as $value) {
				$index = ''.$value['question_id'];
				$answer_level = $value['answer'];
				if(strlen($answer_level)>1){
					if($answer_level!='没有答题'){
						$search_info['ques_all'][$index]['message'] = $search_info['ques_all'][$index]['message'].
							$answer_level.'<br/><br/>';
					}else{
						$search_info['ques_all'][$index]['message'] = $search_info['ques_all'][$index]['message'].
							''.'<span><span/>';
					}
				}else{
					$search_info['ques_all'][$index][$answer_level] = 
						$search_info['ques_all'][$index][$answer_level] + 1;
				}
			}
		}
		
		$this->load->view('study_ask/see_all',$search_info);
	}
}