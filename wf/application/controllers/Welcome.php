<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){


		parent::__construct();
		$this->load->model('GrvWF', 'wf');
		
	}

	public function index(){


		$this->load->view('welcome_message');

	}

	public function GrvWf001(){

		$data['nome'] = $this->input->post('nome');
		$data['status'] = $this->input->post('status');
		$data['destinatario'] = $this->input->post('destinatario');
		$data['assunto'] = $this->input->post('assunto');
		$data['corpo'] = $this->input->post('corpo');
		$data['rodape'] = $this->input->post('rodape');
		$data['recorrencia'] = $this->input->post('recorrencia');
		$data['anexo01'] = $this->input->post('anexo01');
		$data['anexo02'] = $this->input->post('anexo02');
		$data['anexo03'] = $this->input->post('anexo03');

		$this->wf->GrvWf001($data);

	}


}
