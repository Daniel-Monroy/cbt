<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Records
 */
class Records extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('records/records_model');
		$this->load->model('institutes/institutes_model');
		$this->load->model('plans/plans_model');
		$this->load->model('groups/groups_model');
	}
	
	public function index(){
		redirect('records/records/nwr');
	}

	public function nwr(){
		if ($this->session->flashdata('msg_success')) {
            $data['message'] = $this->session->flashdata('msg_success');
        }
		$data['extraHeadContent']    =  get_assets("records/records.css");
		
		$data['extraFooterContent']  =  get_assets("records/records.js");
		$data['extraFooterContent'] .=  get_assets("records/new_member.js");
		$data['extraFooterContent'] .=  get_assets("records/validate.js");
		$this->_form_validation();
		if($this->form_validation->run() === FALSE) {
			$records_info = $this->records_model->get_all(null, null);
			if ($records_info->num_rows()>0) {
				foreach ($records_info->result() as $record_info) {
					$data['code'] = $record_info->code + 1;
				}
			}else{
				$data['code'] = 9999;
			}
			$plans_info = $this->plans_model->get_all();
			$data['plans']['-1'] = "Selecciona una carrera";
			foreach ($plans_info->result() as $plan_info) {
				$data['plans'][$plan_info->plan_id] = $plan_info->description;
			}

			$groups_info = $this->groups_model->get_all();
			$data['groups']['-1'] = "Selecciona un grupo";
			foreach ($groups_info->result() as $group_info) {
				$data['groups'][$group_info->group_id] = $group_info->name;
			}
			$data['code'] = [
	            'name'  => 'code',
	            'type'  => 'text',
	            'readonly' => 'readonly',
	            'value' => $this->form_validation->set_value('code', $data['code']),
	            'required' => 'required',
	            'autofocus' => 'autofocus',
	            'placeholder' => 'Código',
	            'class' => 'form-control code'
	        ];
	        $data['student_name'] = [
	            'name'  => 'student_name',
	            'type'  => 'text',
	            'value' => $this->form_validation->set_value('student_name'),
	            'placeholder' => 'Juan Perez',
	            'class' => 'form-control student_name'
	        ];
	        $data['student_email'] = [
	            'name'  => 'student_email',
	            'type'  => 'text',
	            'value' => $this->form_validation->set_value('student_email'),
	            'placeholder' => 'juanperez@gmail.com',
	            'class' => 'form-control student_email'
	        ];
	        
	        $data['student_invited'] = [
	            'name'  => 'student_invited',
	            'type'  => 'text',
	            'value' => $this->form_validation->set_value('student_invited'),
	            'placeholder' => 'Antonio Tapia Jímenez',
	            'class' => 'form-control student_invited'
	        ];
	        $data['student_invited_validate'] = [
	            'type'  => 'text',
	            'value' => $this->form_validation->set_value('student_invited_validate'),
	            'placeholder' => 'Antonio Tapia Jímenez',
	            'class' => 'form-control student_invited_validate'
	        ];

			$this->load->view('records/index', $data);
		
		} else {
			$record_info = $_POST;
			
			$records_info = $this->records_model->get_all(null, null);
			if ($records_info->num_rows()>0) {
				foreach ($records_info->result() as $records) {
					$record_info['code'] = $records->code + 1;
				}
			}else{
				$record_info['code'] = 9999;
			}

			$max_id = $this->records_model->add($record_info);
	        $this->genete_qr($max_id);
	        
	        $config_email = array();
	        $config_email['subjet'] = "CÓDIGO CBT-GRADUACIÓN 2019";
	        $message_info = array(
	          'record_number' => $record_info['code'],
	          'student_name'  => $record_info['student_name'],
	          'date'          => date('Y-m-d H:i:s'),
	          'email'         => $record_info['student_email'],
	          "description"   => "CÓDIGO QR DEL REGISTRO DE INVITADOS PARA LA GRADUACIÓN CBT-2019"
	        );
	        $send_email = $this->send_email($config_email, $message_info);
	        $this->session->set_flashdata('msg_success', '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$this->lang->line('record_saved').$mensaje.'</div> <script>localStorage.removeItem("cbt_guests");localStorage.removeItem("cbt_records");</script>');
           	redirect('records/records/nwr', $data);			
		}	

	}


    function send_email($config, $message_info){
    	$this->config->load('config_email');
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($this->config->item('sender_email'), $this->config->item('sender_name'));
        $this->email->to($message_info['email']);
       	$config['content']  = $this->load->view('cmn/eml/record_complete', $message_info, true);
       	$this->email->subject($config['subjet']);
       	$this->email->message($config['content']);
   		/*ARCHIVOS ADJUNTOS*/
       	$this->email->attach('files/records_qr/'.$message_info["record_number"].'.png');
        if ($this->email->send()) {
        	return "ok";
        }
    }
    
    public function genete_qr($id){
		$this->load->library('ciqrcode');
		$data['record_info'] = $this->records_model->get_all("record_id", $id)->row();
		$code = $data['record_info']->code;
        $params['data'] = id_encode($code);
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH."files/records_qr/$code.png";
        $this->ciqrcode->generate($params);
	}

	function _form_validation(){
        $this->form_validation->set_rules('plan_id',      'Carrera',   'trim|required|valid_combo_id');
        $this->form_validation->set_rules('group_id', 	  'Grupo',     'trim|required|valid_combo_id');
        $this->form_validation->set_rules('student_name', 'Nombre',    'trim|max_length[255]');
       	$this->form_validation->set_rules('student_email','Email',     'trim|required|valid_email');
        $this->form_validation->set_rules('invited_list' ,'Invitados', 'trim|required');
        $this->form_validation->set_error_delimiters('<small>', '</small><br/>');
    }
	
}

/* End of file Records.php */