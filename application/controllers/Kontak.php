<?php

/**
* 
*/
class Kontak extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_kontak','kontak');
	}

	//fungsi utama buat bisa nanti diopanggil dari hutan
	public function index() {
		$kontak = $this->kontak->getKontak();
		$data['jmlKontak'] = $kontak->num_rows();
		$data['kontak'] = $kontak->row();
		$this->template->load('template','profil/kontak',$data);
	}
}