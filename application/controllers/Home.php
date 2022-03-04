<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('googlemaps');
		// $this->load->library('googlemaps');  => codingan ini kita ambil dari folder librari
			$this->load->model('m_rumah');
		// Menampilkan database ke konten di halaman perumahan
	
	}

	public function index()
	{	
// Untuk konfigurasi peta, jdi kalo tidak ada koding config center dan zoom maka eror
		$config	['center'] = '2.9789265,99.6460781'; 
		// '-0.9239946,100.3602393'; => ini adalah titik kordinat pada maps.
		$config	['zoom'] = 15;
		// angka 15 itu adalah zoom in sampe 15 kali.
		$this->googlemaps->initialize($config);
// =====================================================
		$rumah=$this->m_rumah->list_rumah();
		foreach ($rumah as $key => $value) {
			$marker=array();
			$marker['position']="$value->latitude,$value->longitude";
			$marker['animation']="BOUNCE";
			// Untuk animation pin, bisa menggunakan DROP/BOUNCE

			// berfungsi untuk membuat info ketika kta klik pin maps tersbut.
			$marker['infowindow_content'] ='<div class="media" style="width:250px;">';
			$marker['infowindow_content'] .='<div class="media-body">';
			$marker['infowindow_content'] .='<h5> Nama Rumah :'.$value->nama_rumkit.'</h5>';
			$marker['infowindow_content'] .='<p> No Telpon : '.$value->no_telpon.'</p>';
			$marker['infowindow_content'] .='<p> Alamat :'.$value->alamat.'</p>';
			$marker['infowindow_content'] .='<p> Deskripsi :'.$value->deskripsi.'</p>';
			$marker['infowindow_content'].='<center><img src="'.base_url("{$value->gambar}").'"class="media"style="width:180px">';
			$marker['infowindow_content'].='<p>|------------------------------|</p>';
			$marker['infowindow_content'].='<center><a href="'.base_url("home/tampil_detail/{$value->id_rumkit}").'" class="link_detail btn btn-primary" style="width:220px">Lihat Detail Dong</a></p>';
			$marker['infowindow_content'] .='</div>';
			$marker['infowindow_content'] .='</div>';
		    // End---------------------------------------------------------------------------	
			$this->googlemaps->add_marker($marker);
			// $this->googlemaps->add_marker($marker); --> Berfungsi untuk menampilkan pin/penanda
			
		}

		$data = array (
				'title' => 'Pemetaan Perumahan Asahan',		
				'map' => $this->googlemaps->create_map(),
				'isi' => 'v_home'
		);
		$this->load->view('template/v_wrapper', $data, FALSE);
	}



	public function list_rumah()
	{
	$data = array(
			            'title' => ' Sistem Informasi Geografi',
			            'map'	=> $this->googlemaps->create_map(),
			            'rumah'=> $this->m_rumah->list_rumah(),
			            'isi'   => 'v_list_rumah'
			            );
       $this->load->view('template/v_wrapper',$data, FALSE);	
	}

	public function tampil_detail($id_rumkit)

	{
		//memanggil Peta
		$this->load->library('googlemaps');
		$this->data['rumah'] = $this->m_rumah->detail($id_rumkit);
		$config['center']= '2.983638, 99.627427';
		$config = array();
		$config['center'] = 'auto';
		$config['zoom']= '15';
		$config['onboundschanged'] = 'if (!centreGot) {
						var mapCentre = map.getCenter();
						marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
		});
		}
		centreGot = true;';
		$config['directions'] = TRUE;
		$config['directionsStart'] = 'auto';
		$config['directionsEnd'] =  $this->data['rumah']->latitude.','.$this->data['rumah']->longitude;
		$config['directionsDivID'] = 'directionsDiv';
		$this->googlemaps->initialize($config);

		$marker = array();
		//penanda
		$marker['draggable']=FALSE;
		$marker['ondragend']='setMapToForm(event.latLng.lat(), event.latLng.lng())';
		
		//==========================
		if ($this->form_validation->run()==FALSE) {
			$data = array(
				            'title'  => ' Sistem Informasi Geografi',
				            'map'	 => $this->googlemaps->create_map(),
				            'rumah'=> $this->m_rumah->detail($id_rumkit),
				            'isi'    => 'v_tampil_detail'
				            );
       $this->load->view('template/v_wrapper',$data, FALSE);	
	}
}

	public function tambah_rumah()
	{
		$this->user_login->cek_login();
		//memanggil Peta
		$this->load->library('googlemaps');
		$config['center']= '2.983638, 99.627427';
		$config['zoom']= '15';
		$this->googlemaps->initialize($config);
		//penanda
		$marker['position']='2.983638, 99.627427';
		$marker['draggable']=true;
		$marker['ondragend']='setMapToForm(event.latLng.lat(), event.latLng.lng())';

		$this->googlemaps->add_marker($marker);
		//==========================
		$this->form_validation->set_rules('nama_rumkit', 'Nama Rumkits','required',
				array('required' => '%s Harus Diisi'));
		if ($this->form_validation->run()==FALSE) {
	$data = array(
			            'title' => ' Sistem Informasi Geografi',
			            'map'	=> $this->googlemaps->create_map(),
			           
			            'isi'   => 'v_tambah_rumah'
			            );
       $this->load->view('template/v_wrapper',$data, FALSE);	
       
	}else {
		$config['upload_path'] = './foto/'; 
    	$config['allowed_types'] = 'gif|jpg|png|jpeg'; 
    	$now = date('Y-m-d-H-i-s'); 
    	$config['file_name'] = $now.'.png'; 
    	$config['max_size'] = 0; 
    	// $config['max_width'] = 1024;
    	// $config['max_height'] = 768; 
    	$this->load->library('upload', $config); 
    	$this->upload->initialize($config); 
    if ( ! $this->upload->do_upload('filefoto')) { 
      $error = array('error' => $this->upload->display_errors()); 
      print_r($error); 
    } else { 
      $data = array('upload_data' => $this->upload->data()); 
    
    	$pet = $config['upload_path'].$config['file_name']; 
    	// print_r($pet); 
		$data = array( 
							'nama_rumkit'=>$this->input->post('nama_rumkit'),
							'kecamatan'=>$this->input->post('kecamatan'),
							'no_telpon'  =>$this->input->post('no_telpon'),
							'alamat'	 =>$this->input->post('alamat'),
							'latitude'   =>$this->input->post('latitude'),
							'longitude'  =>$this->input->post('longitude'),
							'deskripsi' =>$this->input->post('deskripsi'),
							'gambar' => $pet
							
						 );
	}
			$this->m_rumah->ambil_input($data);
			$this->session->set_flashdata('sukses','data Berhasil di simpan');
			redirect('home/list_rumah');
	}
}

public function edit($id_rumkit)
	{
		$this->user_login->cek_login();
		//memanggil Peta
		$this->load->library('googlemaps');
		$config['center']= '2.983638, 99.627427';
		$config['zoom']= '15';
		$this->googlemaps->initialize($config);
		//penanda
		$marker['position']='2.983638, 99.627427';
		$marker['draggable']=true;
		$marker['ondragend']='setMapToForm(event.latLng.lat(), event.latLng.lng())';

		$this->googlemaps->add_marker($marker);
		//==========================
		$this->form_validation->set_rules('nama_rumkit', 'Nama Apotik','required',
				array('required' => '%s Harus Diisi'));

		if ($this->form_validation->run()==FALSE) {
			$data = array(
				            'title'  => ' Sistem Informasi Geografi',
				            'map'	 => $this->googlemaps->create_map(),
				            'rumah' => $this->m_rumah->detail($id_rumkit),
			            	
				            'isi'    => 'v_edit_rumah'
				            );
	       $this->load->view('template/v_wrapper',$data, FALSE);	
	}else{
	if ($_FILES["filefoto"]["name"] !== '') { 
      	 $config['upload_path'] = './foto/'; 
      	 $config['allowed_types'] = 'gif|jpg|png'; 
     	 $now = date('Y-m-d-H-i-s'); $config['file_name'] = 
     	 $now.'.png'; $config['max_size'] = 0; 
      // $config['max_width'] = 1024; 
      // $config['max_height'] = 768; 
      $this->load->library('upload', $config); 
      $this->upload->initialize($config); 

    if ( ! $this->upload->do_upload('filefoto')) { 
        $error = array('error' => $this->upload->display_errors());
        print_r($error); 
      } else{ 
        $data = array('upload_data' => $this->upload->data()); 
      } 
    $pet = $config['upload_path'].$config['file_name']; 
    // print_r($pet); 
			$data = array(
							'id_rumkit'  =>$id_rumkit,
							'nama_rumkit'=>$this->input->post('nama_rumkit'),
							'kecamatan'=>$this->input->post('kecamatan'),
							'no_telpon'  =>$this->input->post('no_telpon'),
							'alamat'	 =>$this->input->post('alamat'),
							'latitude'   =>$this->input->post('latitude'),
							'longitude'  =>$this->input->post('longitude'),
							'deskripsi' =>$this->input->post('deskripsi'),
							
							

						 );
			$this->m_rumah->edit($data);
			$this->session->set_flashdata('sukses','data Berhasil di edit');
			redirect('home/list_rumah');
		} else {
			$data = array(
							'id_rumkit'  =>$id_rumkit,
							'nama_rumkit'=>$this->input->post('nama_rumkit'),
							'no_telpon'  =>$this->input->post('no_telpon'),
							'alamat'	 =>$this->input->post('alamat'),
							'latitude'   =>$this->input->post('latitude'),
							'longitude'  =>$this->input->post('longitude'),
							'deskripsi' =>$this->input->post('deskripsi'),
							'gambar' 	 =>$pet

							
						 );
		
			$this->m_rumah->edit($data);

		}
			$this->session->set_flashdata('sukses','data Berhasil di edit');
			redirect('home/list_rumah');

	}
}

public function delete($id_rumkit)
	{	
		{
		
		$data = array('id_rumkit' => $id_rumkit);
		$this->m_rumah->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di hapus !!!');
		redirect('home/list_rumah');
	}	
	}


// ======================================================================================

}