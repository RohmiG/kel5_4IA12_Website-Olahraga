<?php

/**
* 
*/
class adminProfilweb extends CI_Controller {

	//Membangun objek koleksi baru dengan opsional serangkaian item, umumnya Deskriptor.
	public function __construct() {
		parent::__construct();
		//disini akan melakukan perulangan jika Helper/cek_login = noLogin kembali ke halaman login
		if(cek_login() === 'noLogin') {
			redirect('auth/login');
			return false;

			//Jika user data admin / SuperAdmin, mengalihkan ke adminDashboard
		} elseif($this->session->userdata('COSTUME')['level'] != 'admin' && $this->session->userdata('COSTUME')['level'] != 'superAdmin') {
			redirect('adminDashboard');
			return false;
		}
		//memuat model
		$this->load->model('Model_profilweb','profilweb');
	}

	public function index() {
		$this->profilweb();
	}
	
	// profilweb
	public function profilweb() {

		$profilweb = $this->profilweb->getProfilweb();
		$data['jmlProfilweb'] = $profilweb->num_rows();
		$data['profilweb'] = $profilweb->row();
		$this->template->load('templateAdmin','admin/profil/profilweb',$data);
	}

	public function insertProfilweb() {

		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini melakukan perulangan jika klik submit (simpan) 
			$this->form_validation->set_rules('judul_profilweb','Judul profilweb','required|max_length[50]',message_id());
			$this->form_validation->set_rules('isi','Isi','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page insert profilweb
			if(!$this->form_validation->run()) {

				generate_errors(['judul_profilweb','isi']);
				redirect('adminProfilweb/insertProfilweb');
				return false;

				//jika tidak, mengalihkan ke adminKontak
			} else {

				$this->profilweb->insertProfilweb();
				redirect('adminProfilweb/profilweb');
				return true;
			}

			// disini jika error dalam melakukan submit, ambil error dan data olahraga
		} else {
			$data['errors'] = get_errors();
			$data['old_value'] = get_old_value();
			$this->template->load('templateAdmin','admin/profil/insertProfilweb',$data);
		}
	}

	public function editProfilweb() {
		
		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('judul_profilweb','Judul profilweb','required|max_length[50]',message_id());
			$this->form_validation->set_rules('isi','Isi','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page edit profilweb
			if(!$this->form_validation->run()) {

				generate_errors(['judul_profilweb','isi'],false);
				redirect('adminProfilweb/editProfilweb');
				return false;

				//jika tidak, mengalihkan ke admin kontak
			} else {

				$this->profilweb->editProfilweb();
				redirect('adminProfilweb/profilweb');
				return true;
			}
			
			// disini jika error dalam melakukan submit, ambil error dan data kontak
		} else {
			$data['errors'] = get_errors();
			$data['profilweb'] = $this->profilweb->getProfilweb()->row();
			$this->template->load('templateAdmin','admin/profil/editProfilweb',$data);
		}
	}
}