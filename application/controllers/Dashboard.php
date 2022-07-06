<?php

/**
* 
*/
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_dashboard','dashboard');
	}
	
	/*fungsi index adalah fungsi pertama kali diakses, dan function index 
	juga merupakan fungsi default, jika saat memanggil class tanpa menyebutkan fungsinya */
	public function index() {
		$this->load->model('Model_settings','settings');
		$data['berita'] = $this->dashboard->getBerita()->row();
		$data['olahraga'] = $this->dashboard->getOlahraga(2);
		$data['openingWord'] = $this->settings->tampilOpeningWord()->row_array();
		
		//disini untuk nanti dipanggil oleh template
		$this->template->load('template','dashboard/dashboard',$data);
	}

	/*fungsi untuk membuat olahraga dapat mengupdate dan menampilan data baru */
	public function ajaxGetOlahraga() {
		$data = $this->dashboard->getOlahraga(4,$this->input->get('offset',true));
		$i = 0;
		foreach($data as $r) {
			$hasil[$i] = $r;
			$hasil[$i]->post = generate_post($r->post);
			$i++;
		}
		echo json_encode($hasil??null);
		return true;
	}

	/*fungsi untuk memanggil data yang ada */
	public function olahragaDetail() {
		$data['errors'] = get_errors();
		$data['old_value'] = get_old_value();
		$data['metaData'] = get_metaData();

		$data['olahraga'] = $this->dashboard->getOneOlahraga();
		$data['listOlahraga'] = $this->dashboard->listOlahraga();
		$this->template->load('template','dashboard/olahragaDetail',$data);
	}
}
