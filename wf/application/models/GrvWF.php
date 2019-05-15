<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrvWF extends CI_Model {

	public function GrvWf001($data = null){

		if($data != null):

			$this->db->insert('wf001', $data);

		endif;
	}

}


