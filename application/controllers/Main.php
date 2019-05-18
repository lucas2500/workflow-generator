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
		$data['anexo01'] = $this->input->post('anexo01');
		$data['anexo02'] = $this->input->post('anexo02');
		$data['anexo03'] = $this->input->post('anexo03');

		$path = "./uploads/";
		if ( ! is_dir($path)) {

			mkdir($path, 0777, $recursive = true);
		}

		$ConfigFile01['upload_path']   = $path;
		$ConfigFile01['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
		$ConfigFile01['encrypt_name']  = FALSE;
		$ConfigFile01['file_name'] = $data['anexo01'];

		$this->upload->initialize($ConfigFile01);

		if ($this->upload->do_upload('anexo01')) {

			$file = $this->upload->data();
			$data['anexo01'] = $file['raw_name'].$file['file_ext'];

		} 

		$ConfigFile02['upload_path']   = $path;
		$ConfigFile02['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
		$ConfigFile02['encrypt_name']  = FALSE;
		$ConfigFile02['file_name'] = $data['anexo02'];

		if ($this->upload->do_upload('anexo02')) {

			$file2 = $this->upload->data();
			$data['anexo02'] = $file2['raw_name'].$file['file_ext'];

		} 

		$ConfigFile03['upload_path']   = $path;
		$ConfigFile03['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
		$ConfigFile03['encrypt_name']  = FALSE;
		$ConfigFile03['file_name'] = $data['anexo03'];

		if ($this->upload->do_upload('anexo03')) {

			$file3 = $this->upload->data();
			$data['anexo03'] = $file2['raw_name'].$file['file_ext'];

		} 

		$this->wf->GrvWf001($data);
		redirect('Main/index');

	}

}
