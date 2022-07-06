<?php

/**
* 
*/
class AdminDashboard extends CI_Controller {

	//Membangun objek koleksi baru dengan opsional serangkaian item, umumnya Deskriptor.
	public function __construct() {
		parent::__construct();

		//disini akan melakukan perulangan jika Helper/cek_login = noLogin kembali ke halaman login
		if(cek_login() === 'noLogin') {
			redirect('auth/login');
			return false;
		}

		//default timezone Asia/jakarta
		date_default_timezone_set("Asia/Jakarta");
		//memuat model_dashboard
		$this->load->model('Model_dashboard','dashboard');
	}
	
	/*fungsi index adalah fungsi pertama kali diakses, dan function index 
	juga merupakan fungsi default, jika saat memanggil class tanpa menyebutkan fungsinya */
	public function index() {
		$berita = $this->dashboard->getBerita();

		$data['berita'] = $berita->row();
		$data['jmlBerita'] = $berita->num_rows();
		$data['olahraga'] = $this->dashboard->getOlahraga();
		$this->template->load('templateAdmin','admin/dashboard/dashboard',$data);
	}

	// fungsi membuat berita baru
	public function insertBerita() {
		
		//disini melakukan perulangan jika klik submit (simpan) akan membuat berita baru
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('judul','Judul','required|max_length[100]',message_id());
			$this->form_validation->set_rules('isi','Isi','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page insertBerita
			if(!$this->form_validation->run()) {
                generate_errors(['judul','isi']);
                redirect('adminDashboard/insertBerita');
                return false;

				//jika tidak, mengalihkan ke adminDashboard
            } else {
				$this->dashboard->insertBerita();
				redirect('adminDashboard');
				return true;
            }

			// disini jika error dalam melakukan submit, ambil error dan nilai lama
		} else {
			$data['errors'] = get_errors();
			$data['old_value'] = get_old_value();
			$data['berita'] = $this->dashboard->getBerita()->row();
			$this->template->load('templateAdmin','admin/dashboard/insertBerita',$data);
		}
	}

	//fungsi edit berita
	public function editBerita() {
				
		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('judul','Judul','required|max_length[100]',message_id());
			$this->form_validation->set_rules('isi','Isi','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page editBerita
			if(!$this->form_validation->run()) {
                generate_errors(['judul','isi'],false);
                redirect('adminDashboard/editBerita');
                return false;

				//jika tidak, mengalihkan ke adminDashboard
            } else {
				$this->dashboard->editBerita();
				redirect('adminDashboard');
				return true;
            }

			// disini jika error dalam melakukan submit, ambil error dan berita
		} else {
			$data['errors'] = get_errors();
			$data['berita'] = $this->dashboard->getBerita()->row();
			$this->template->load('templateAdmin','admin/dashboard/editBerita',$data);
		}
	}

	/* olahraga */
	//fungsi insert Olahraga
	public function insertOlahraga() {
		
		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('judulBesar','Judul Besar','required|max_length[50]',message_id());
			$this->form_validation->set_rules('judulKecil','Judul Kecil','max_length[100]',message_id());
			$this->form_validation->set_rules('urlimage','Url image utama','max_length[1000]',message_id());
			$this->form_validation->set_rules('isi','Isi','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page insertOlahraga
			if(!$this->form_validation->run()) {
				generate_errors(['judulBesar','judulKecil','urlimage','isi']);
				redirect('adminDashboard/insertOlahraga');
				return false;

				//jika tidak, mengalihkan ke adminDashboard
			} else {

				$this->dashboard->insertOlahraga();
				redirect('adminDashboard');
				return true;
			}

			// disini jika error dalam melakukan submit, ambil error dan nilai lama
		} else {
			$data['errors'] = get_errors();
			$data['old_value'] = get_old_value();
			$this->template->load('templateAdmin','admin/dashboard/insertOlahraga',$data);
		}
	}

	//fungsi edit olahraga
	public function editOlahraga() {
		
		//disini melakukan perulangan jika klik submit (simpan) 
		if(isset($_POST['submit'])) {

			//disini akan memuat helper form_validation dengan syaratnya
			$this->form_validation->set_rules('judulBesar','Judul Besar','required|max_length[50]',message_id());
			$this->form_validation->set_rules('judulKecil','Judul Kecil','max_length[100]',message_id());
			$this->form_validation->set_rules('urlimage','Url image utama','max_length[1000]',message_id());
			$this->form_validation->set_rules('isi','Isi','required',message_id());
			$this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

			//jika error, kembali ke page editOlahraga
			if(!$this->form_validation->run()) {
				generate_errors(['judulBesar','judulKecil','urlimage','isi'],false);
				redirect('adminDashboard/editOlahraga/'.$this->input->post('olahraga_id'));
				return false;

				//jika tidak, mengalihkan ke adminDashboard
			} else {

				$this->dashboard->editOlahraga();
				redirect('adminDashboard');
				return true;
			}

			// disini jika error dalam melakukan submit, ambil error dan data olahraga
		} else {
			$data['errors'] = get_errors();
			$data['olahraga'] = $this->dashboard->getOneOlahraga();
			$this->template->load('templateAdmin','admin/dashboard/editOlahraga',$data);
		}
	}

	//disini adalah fungsi untuk mendelete olahraga
	public function deleteOlahraga() {
		
		$del = $this->dashboard->deleteOlahraga();
		if($del === 'dataForeignKey') {
			redirect('adminDashboard/index/dataForeignKey');
		} elseif($del === 'error') {
			redirect('adminDashboard/index/error');
		} else {
			redirect('adminDashboard');
		}

		return true;
	}
}