<?php require_once 'application/config/My_constants.php';

class Search extends CI_Controller {

	public function go_search()
	{
		$search_info['input'] = $this->input->post('searchInput');
		if(!$search_info['input']){
			$this->load->view('welcome');
		}else{
			$this->load->model('Info_model','info');
			$offset = $this->input->post('offset');
			if(!$offset){
				$offset = '0';
			}
			$search_info['offset'] = $offset;
			
			$query = $this->info->query_infos($search_info);
			if($query->num_rows()>0){
				$search_info['result'] = GO_SEARCH_RESULT_OK;
				$search_info['result_infos'] = $query->result_array();
				//加载修改日志
				for ($i = 0; $i < sizeof($search_info['result_infos']); $i++){
					$query_history = $this->info->query_historys($search_info['result_infos'][$i]['info_id']);
					if($query_history->num_rows()>0){
						$search_info['result_infos'][$i]['history'] = $query_history->result_array();
					}else{
						$search_info['result_infos'][$i]['history'] = array();
					}
				}
				
			}else{
				$search_info['result'] = GO_SEARCH_RESULT_NO;
				$this->load->model('No_info_model','no_info');
				$this->no_info->insert_no($search_info['input']);
			}
			$this->load->view('results',$search_info);
		}
	}
}