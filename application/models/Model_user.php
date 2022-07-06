<?php

/* model user
* dimana nanti mencari, menampilkan, insert, update, dan delete di database  
*/
//model user koneksi ke database
class Model_user extends CI_Model {
	
	//login
	public function login() {
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);

		// cek username
		$user = $this->db->get_where('user',['username'=>$username]);
		if($user->num_rows() == 1) {
			$r = $user->row();

			//cek password
			if(password_verify($password,$r->password)) {

				$this->session->set_userdata('COSTUME',[ 
					'login' => 'yes',
					'nama' => $r->nama,
					'level' => $r->level,
					'user_id' => $r->user_id
				]);

				$this->updateLastLogin();

				return 'loginYes';

			} else {
				return "noPassword";
			}

		} else {
			return "noUsername";
		}
	}

	//membuat user baru, dengan koneksi database
	public function insertUser($level) {

		$data = [
			'user_id' => $this->uuid->generate_uuid(),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'level' => $level
		];

		$this->db->insert('user',$data);
		return true;
	}

	//mengedit user baru, dengan koneksi database
	public function editUser($level) {

		if(empty(trim($this->input->post('password')))) {
			$data = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'level' => $level
			];
		} else {
			$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$data = [
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'level' => $level
			];
		}

		$this->db->where('user_id',$this->input->post('user_id'));
		$this->db->update('user',$data);
		return true;
	}

	//untuk memanggil user dari database
	public function getUser() {
		$where = [
			'user_id !=' => $this->session->userdata('COSTUME')['user_id'],
			'level !=' => 'superAdmin'
		];

		if($this->session->userdata('COSTUME')['level'] == 'superAdmin') 
		$where = [
			'user_id !=' => $this->session->userdata('COSTUME')['user_id'],
		];

		$this->db->where($where);
		return $this->db->get('user')->result();
	}

	public function getOneUser($user_id) {
		return $this->db->get_where('user',['user_id'=>$user_id])->row();
	}

	public function deleteUser() {
		$this->db->where('user_id',$this->uri->segment(3));
		$this->db->delete('user');
		return true;
	}

	//login akan terupdate kapan terakhir kali login
	public function updateLastLogin() {
		$this->db->set('lastLogin',time());
		$this->db->where('user_id',$this->session->userdata('COSTUME')['user_id']);
		$this->db->update('user',$data);

		return true;
	}
}