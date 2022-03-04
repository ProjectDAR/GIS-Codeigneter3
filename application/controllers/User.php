<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('googlemaps');
		// $this->load->library('googlemaps');  => codingan ini kita ambil dari folder librari 
		$this->load->model('m_user');
		
	}

	public function index()
	{
		$this->user_login->cek_login();
		$data = array (

				'title' => 'Data User Admin',
				'map' => $this->googlemaps->create_map(),
				'isi' => 'v_home'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function about()
	{
		
		$data = array (

				'title' => 'Tentang Kami',
				'map' => $this->googlemaps->create_map(),
				'isi' => 'user/v_about'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	public function list_user()
	{
	$data = array(
			            'title' => ' Sistem Informasi Geografi',
			            'map'	=> $this->googlemaps->create_map(),
			          	'user'=> $this->m_user->list_user(),
			            'isi'   => 'user/v_list'
			            );
       $this->load->view('template/v_wrapper',$data, FALSE);	
	}	

	public function tambah_user()
	{
		$this->user_login->cek_login();
		$this->form_validation->set_rules('nama_user','Nama User','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		

		if ($this->form_validation->run()==FALSE) {
			$data = array (
				'title' => 'Input Data User Mamang Admin',
				'map' => $this->googlemaps->create_map(),
				'isi' => 'user/v_add'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
		}else{
			// $data = array() --> variabel data array akan di proses di folder models > M_rumkit dan di proses di dlam variabel ini : $this->db->insert('tbl_rumkit',$data);
			$data = array(

							'nama_user'=>$this->input->post('nama_user'),
							'username'=>$this->input->post('username'),
							'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),	
						 );
			// $this->m_rumkit->input($data); --> Untuk mengirim $data array ke dalam input agar di proses menjadi simpan data.
			$this->m_user->input($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
			redirect('user/list_user');
		}
		
	}

	public function edit($id_user)
	{
		
		$this->form_validation->set_rules('nama_user','Nama User','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()==FALSE) {
			$data = array (
				'title' => 'Input Data User Mamang Admin',
				'map' => $this->googlemaps->create_map(),
				'user' => $this->m_user->detail($id_user),
				'isi' => 'user/v_edit'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
		}else{
			// $data = array() --> variabel data array akan di proses di folder models > M_rumkit dan di proses di dlam variabel ini : $this->db->insert('tbl_rumkit',$data);
			$data = array(
							'id_user'=>$id_user,
						    'nama_user'=>$this->input->post('nama_user'),
							'username'=>$this->input->post('username'),
							'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						 );
			// $this->m_rumkit->input($data); --> Untuk mengirim $data array ke dalam input agar di proses menjadi simpan data.
			$this->m_user->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Ubah !!!');
			redirect('user/list_user');
		}


		
	}


	public function delete($id_user)
	{	
		{
		
		$data = array('id_user' => $id_user);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di hapus !!!');
		redirect('user/list_user');
	}	
	}

	public function login()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==TRUE) {	
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$this->user_login->login($username,$password);
		}

	$data = array(
			            'title' => 'Form Login',
			            'map'	=> $this->googlemaps->create_map(),
			          	
			            'isi'   => 'v_login'
			            );
       $this->load->view('template/v_wrapper',$data, FALSE);	
	}

	public function logout()
	{
		$this->user_login->logout($username,$password);
	}

	public function registrasi()
	{
		$this->user_login->cek_login();
		$this->form_validation->set_rules('nama_user','Nama User','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		

		if ($this->form_validation->run()==FALSE) 
		{
			$data = array (
				'title' => 'Regstrasi Form',
				'map' => $this->googlemaps->create_map(),
				'isi' => 'user/v_regis'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
		}else{
			// $data = array() --> variabel data array akan di proses di folder models > M_rumkit dan di proses di dlam variabel ini : $this->db->insert('tbl_rumkit',$data);
			$data = array(

							'nama_user'=>$this->input->post('nama_user'),
							'username'=>$this->input->post('username'),
							'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
							// kodingan 161, untuk mengeskripsikan pasword
						 );
			// $this->m_rumkit->input($data); --> Untuk mengirim $data array ke dalam input agar di proses menjadi simpan data.
			$this->m_user->regis($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
			redirect('user/list_user');
		}
		
	}

}
