<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class M_rumah extends CI_Model {

// function untuk memanggil databse ke halaman content rumkit.
public function list_rumah()
{
	$this->db->select('*');
	$this->db->from('tbl_rumkit');
	$this->db->order_by('id_rumkit','desc');
	return $this->db->get()->result();
}
// End....
public function ambil_input($data)
{
	$this->db->insert('tbl_rumkit',$data);
}

// =================================================
public function detail($id_rumkit)
{
	$this->db->select('*');
	$this->db->from('tbl_rumkit');
	$this->db->where('id_rumkit',$id_rumkit);
	return $this->db->get()->row();
}
 // fungsi detail ini untuk memanggil data bersdarkan id nya atau nomor urut nya, jadi apabila no urut nya 3 maka no 3 itula nnti yg akan brubah. 
// ================================================

public function delete($data)
	{
		$this->db->where('id_rumkit',$data['id_rumkit']);
		$this->db->delete('tbl_rumkit',$data);
	}

	public function edit($data)
	{
		$this->db->where('id_rumkit',$data['id_rumkit']);
		$this->db->update('tbl_rumkit',$data);
	}


}
 ?>