<?php

/**
* 
*/

class Model_settings extends CI_Model {


	/* model tampil logo
	* dimana nanti menampilkan, insert, update di database 
	*/
	public function tampilLogo() {
	    return $this->db->get('logo');
	}
	
	//fungsi yang koneksi ke database
	public function insertLogo($upload_data) {

		$data = [
			'logo_id' => $this->uuid->generate_uuid(),
			'file_name' => $upload_data[0]['file_name']
		];
		$this->db->insert('logo',$data);
		return true;
	}

	public function updateLogo($upload_data,$logo_id) {

		$data = [
			'file_name' => $upload_data[0]['file_name']
		];
		$this->db->where('logo_id',$logo_id);
		$this->db->update('logo',$data);
		return true;
	}

	/* opening word
	* dimana nanti menampilkan, insert, update di database  
	*/
	//fungsi yang koneksi ke database
	public function tampilOpeningWord() {
	    return $this->db->get('opening_word');
	}

	public function insertOpeningWord() {
	    $data = [
	    	'opening_word_id' => $this->uuid->generate_uuid(),
	    	'title_opening' => $this->input->post('title_opening'),
	    	'url_background' => $this->input->post('url_background'),
	    	'word' => $this->input->post('word',false)
	    ];
	    $this->db->insert('opening_word',$data);
	    return true;
	}

	public function editOpeningWord() {
	    $data = [
	    	'title_opening' => $this->input->post('title_opening'),
	    	'url_background' => $this->input->post('url_background'),
	    	'word' => $this->input->post('word',false)
	    ];
	    $this->db->update('opening_word',$data);
	    return true;
	}
}