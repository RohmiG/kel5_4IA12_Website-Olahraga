<?php

/* model profilweb
* dimana nanti dimasukkan, update di database 
*/
class Model_profilweb extends CI_Model {

	public function getProfilweb() {
		return $this->db->get('profilweb');
	}

	//fungsi insert profilweb yang nanti koneksi ke database
	public function insertProfilweb() {
		$data = [
			'profilweb_id' => $this->uuid->generate_uuid(),
			'judul_profilweb' => $this->input->post('judul_profilweb'),
			'isi' => $this->input->post('isi')
		];
		$this->db->insert('profilweb',$data);
		return true;
	}

	public function editProfilweb() {
		$data = [
			'judul_profilweb' => $this->input->post('judul_profilweb'),
			'isi' => $this->input->post('isi')
		];
		$this->db->update('profilweb',$data);
		return true;
	}
}