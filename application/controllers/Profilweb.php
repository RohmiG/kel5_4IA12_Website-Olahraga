<?php

/**
* 
*/
class Profilweb extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Model_profilweb','profilweb');
	}

	//fungsi utama buat bisa nanti dipanggil dari hutan
	public function index() {
		$data['profilweb'] = $this->profilweb->getProfilweb()->row();
		$this->template->load('template','profil/profilweb',$data);
	}
}