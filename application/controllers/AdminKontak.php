<?php

/**
* 
*/
class AdminKontak extends CI_Controller {

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
		$this->load->model('Model_kontak','kontak');
	}
	
	/*fungsi index adalah fungsi pertama kali diakses, dan function index 
	juga merupakan fungsi default, jika saat memanggil class tanpa menyebutkan fungsinya */
	public function index() {
		$kontak = $this->kontak->getKontak();
		$data['jmlKontak'] = $kontak->num_rows();
		$data['kontak'] = $kontak->row();
		$this->template->load('templateAdmin','admin/kontak/kontak',$data);
	}

	//fungsi membuat kontak baru
	public function insertKontak() {

		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('no_telp','No telp','required|max_length[32]',message_id());
			$this->form_validation->set_rules('email','Email','required|max_length[32]',message_id());
			$this->form_validation->set_rules('facebook','Facebook','required|max_length[32]',message_id());
			$this->form_validation->set_rules('alamat','Alamat','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page insert kontak
			if(!$this->form_validation->run()) {
                generate_errors(['no_telp','email','facebook','alamat']);
                redirect('adminKontak/insertKontak');
                return false;

				//jika tidak, mengalihkan ke adminKontak
            } else {
                
				$this->kontak->insertKontak();
				redirect('adminKontak');
				return true;
            }

			// disini jika error dalam melakukan submit, ambil error dan data olahraga
		} else {
			$data['errors'] = get_errors();
			$data['old_value'] = get_old_value();
			$this->template->load('templateAdmin','admin/kontak/insertKontak',$data);
		}
	}

	//fungsi edit kontak
	public function editKontak() {
		
		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('no_telp','No telp','required|max_length[32]',message_id());
			$this->form_validation->set_rules('email','Email','required|max_length[32]',message_id());
			$this->form_validation->set_rules('facebook','Facebook','required|max_length[32]',message_id());
			$this->form_validation->set_rules('alamat','Alamat','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page edit kontak
			if(!$this->form_validation->run()) {
                generate_errors(['no_telp','email','facebook','alamat'],false);
                redirect('adminKontak/editKontak');
                return false;

				//jika tidak, mengalihkan ke admin kontak
            } else {
                
				$this->kontak->editKontak();
				redirect('adminKontak');
				return true;
            }

			// disini jika error dalam melakukan submit, ambil error dan data kontak
		} else {
			$data['errors'] = get_errors();
			$data['kontak'] = $this->kontak->getKontak()->row();
			$this->template->load('templateAdmin','admin/kontak/editKontak',$data);
		}
	}
}