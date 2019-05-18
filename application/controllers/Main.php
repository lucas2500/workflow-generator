<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){


		parent::__construct();
		$this->load->model('GrvWF', 'wf');
		
	}

	public function index(){

		$this->load->view('Main_view');

	}

	public function GrvWf001(){

		$data['nome'] = $this->input->post('nome');
		$data['status'] = $this->input->post('status');
		$data['destinatario'] = $this->input->post('destinatario');
		$data['assunto'] = $this->input->post('assunto');
		$data['corpo'] = $this->input->post('corpo');
		$data['rodape'] = $this->input->post('rodape');
		$data['recorrencia'] = $this->input->post('recorrencia');
		$data['anexo01'] = "";
		$data['anexo02'] = "";
		$data['anexo03'] = "";

		$path = "./uploads/";
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		$FileConfig01['upload_path']   = $path;
		$FileConfig01['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
		$FileConfig01['file_name'] = $data['anexo01'];

		$this->upload->initialize($FileConfig01);

		if ($this->upload->do_upload('anexo01')) {

			$file = $this->upload->data();
			$data['anexo01'] = $file['raw_name'].$file['file_ext'];
		} 

		$FileConfig02['upload_path']   = $path;
		$FileConfig02['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
		$FileConfig02['file_name'] = $data['anexo02'];

		$this->upload->initialize($FileConfig02);

		if ($this->upload->do_upload('anexo02')) {

			$file = $this->upload->data();
			$data['anexo02'] = $file['raw_name'].$file['file_ext'];
		} 

		$FileConfig03['upload_path']   = $path;
		$FileConfig03['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
		$FileConfig03['file_name'] = $data['anexo03'];

		$this->upload->initialize($FileConfig02);

		if ($this->upload->do_upload('anexo03')) {

			$file = $this->upload->data();
			$data['anexo03'] = $file['raw_name'].$file['file_ext'];
		} 

		$this->wf->GrvWf001($data);
		redirect('Main/index');

	}


}
