<?php

/**
* 
*/
/* disini adalah tempat untuk koneksi dengan database */
class Model_dashboard extends CI_Model {
	
	//fungsi membuat berita baru jika tidak ada berita, yang nanti dimasukkan ke database
	public function insertBerita() {

		$data = [
			'berita_id' => $this->uuid->generate_uuid(),
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi')
		];
		$this->db->insert('berita',$data);
		return true;
	}

	//sama dengan fungsi diatas, editberita tempat mengedit
	public function editBerita() {

		$data = [
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi')
		];
		$this->db->update('berita',$data);
		return true;
	}

	public function getBerita() {
		return $this->db->get('berita');
	}

	/* model olahraga
	* dimana nanti dimasukkan, update, dan delete di database 
	*/
	public function insertOlahraga() {
		
		$data = [
			'judulBesar' => $this->input->post('judulBesar'),
			'judulKecil' => $this->input->post('judulKecil'),
			'urlimage' => $this->input->post('urlimage'),
			'isi' => $this->input->post('isi',false),
			'olahraga_id' => $this->uuid->generate_uuid(),
			'post' => time()
		];

		$this->db->insert('olahraga',$data);
		return true;
	}

	public function editOlahraga() {
		$olahraga_id = $this->input->post('olahraga_id');
		$data = [
			'judulBesar' => $this->input->post('judulBesar'),
			'judulKecil' => $this->input->post('judulKecil'),
			'urlimage' => $this->input->post('urlimage'),
			'isi' => $this->input->post('isi',false),
			'post' => time()
		];

		$this->db->where('olahraga_id',$olahraga_id);
		$this->db->update('olahraga',$data);
		return true;
	}

	public function deleteOlahraga() {
		
		$olahraga_id = $this->uri->segment(3);
		$this->db->where('olahraga_id',$olahraga_id);
		$del = $this->db->delete('olahraga');
		if(!$del) {

			if($this->db->error()['code'] === 1451) {
				return "dataForeignKey";
			} else {
				return "error";
			}

		} else {
			return $del;
		}
	}

	/* disni akan membatasi data yang muncul, buat tidak berulang-ulang. 
	dalam database*/
	public function getOlahraga($limit=0,$offset=0) {
		if($limit != 0 && $offset == 0) {
			$this->db->limit($limit);
		} else if($limit !=0 && $offset != 0) {
			$this->db->limit($limit,$offset);
		}
		$this->db->order_by("post","DESC");
		return $this->db->get("olahraga")->result();
	}

	//disini akan menampilkan data beberapa kolom tersebut
	public function listOlahraga() {
		$this->db->select('olahraga_id, judulBesar, post');
		$this->db->where('olahraga_id !=',$this->uri->segment(3));
		return $this->db->get('olahraga')->result();
	}

	/* URI(Uniform Resource Identifier) disini mengambil data melalui url.
	cara penyebutan uri segment pada codeigniter sendiri misalnya segment 1, 
	segment 2, segment 3 dan seterusnya. dengan begitu kita memakai segment3 karena
	data yang di kirimkan melalui url di codeigniter biasanya terletak pada segment 3 */
	public function getOneOlahraga() {
		return $this->db->get_where('olahraga',['olahraga_id'=>$this->uri->segment(3)])->row();
	}
}