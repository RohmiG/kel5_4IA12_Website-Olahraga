<?php

/**
* 
*/

//codingan untuk profiweb dan kontak

class AdminSettings extends CI_Controller {

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
        $this->load->model('Model_settings','settings');
    }

    public function index() {
        $this->openingWord();
    }
	
    //fungsi logo, menampilan logo
	public function logo() {
        $data['logo'] = $this->settings->tampilLogo()->row_array();
		$this->template->load('templateAdmin','admin/logo/logo',$data);
	}

    //akan memasukkan logo -->
	public function insertLogo() {

	    //disini melakukan perulangan jika klik submit (simpan)
	    if(isset($_POST['submit'])) {

	    	$config['upload_path']          = './assets/img/logo';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1325;
            $config['max_height']           = 1325;
            $config['encrypt_name']			= TRUE;

            $this->load->library('upload', $config);

            //jika error, kembali ke page insertLogo
            if ( ! $this->upload->do_upload('logo')) {
                
               generateFileUploadErrors();
               redirect('adminSettings/insertLogo');
               return false;
            }
            else {
                $upload_data = [$this->upload->data()];

                // cek apakah file sudah ada
                $data_logo = $this->settings->tampilLogo();
                $logo = $data_logo->row_array();
                $cek = $data_logo->num_rows();
                if($cek >= 1) {
                    if(file_exists('assets/img/logo/'.$logo['file_name'])) {
                        unlink('assets/img/logo/'.$logo['file_name']);
                    }

                    $this->settings->updateLogo($upload_data,$logo['logo_id']);
                    redirect('adminSettings/logo');

                } else {

                    $this->settings->insertLogo($upload_data);
                    redirect('adminSettings/logo');
                }

                return true;
            }

	    } else {
            $data['error'] = getFileUploadErrors();
	    	$this->template->load('templateAdmin','admin/logo/insertLogo',$data);
	    }
	}

    /* opening word */

    public function openingWord() {

        $openingWord = $this->settings->tampilOpeningWord();
        $data['jmlOpeningWord'] = $openingWord->num_rows();
        $data['openingWord'] = $openingWord->row_array();
        $this->template->load('templateAdmin','admin/openingWord/openingWord',$data);
    }

    public function insertOpeningWord() {
        
        if(isset($_POST['submit'])) {

            $this->form_validation->set_rules('title_opening', 'Title Opening', 'required|max_length[50]',message_id());
            $this->form_validation->set_rules('url_background', 'Url background', 'max_length[100]',message_id());
            $this->form_validation->set_rules('word', 'Word', 'required|max_length[255]',message_id());
            $this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

            if(!$this->form_validation->run()) {
                generate_errors(['title_opening','url_background','word']);
                redirect('adminSettings/insertOpeningWord/'.$this->input->post('opening_word_id'));
                return false;

            } else {
                $this->settings->insertOpeningWord();
                redirect('adminSettings/openingWord');
                return true;
            }

        } else {
            $data['errors'] = get_errors();
            $data['old_value'] = get_old_value();
            $this->template->load('templateAdmin','admin/openingWord/insertOpeningWord',$data);
        }
    }

    //fungsi edit opening word
    public function editOpeningWord() {
        
        if(isset($_POST['submit'])) {

            $this->form_validation->set_rules('title_opening', 'Title Opening', 'required|max_length[50]',message_id());
            $this->form_validation->set_rules('url_background', 'Url background', 'max_length[150]',message_id());
            $this->form_validation->set_rules('word', 'Word', 'required|max_length[255]',message_id());
            $this->form_validation->set_error_delimiters('<p class="warning">', '</p>');

            if(!$this->form_validation->run()) {
                generate_errors(['title_opening','url_background','word'],false);
                redirect('adminSettings/editOpeningWord');
                return false;

            } else {
                $this->settings->editOpeningWord();
                redirect('adminSettings/openingWord');
                return true;
            }

        } else {
            $data['errors'] = get_errors();
            $data['openingWord'] = $this->settings->tampilOpeningWord()->row_array();
            $this->template->load('templateAdmin','admin/openingWord/editOpeningWord',$data);
        }
    }
}