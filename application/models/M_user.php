<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model {

// function untuk memanggil databse ke halaman content rumkit.
public function list_user()
{
	$this->db->select('*');
	$this->db->from('tbl_user');
	$this->db->order_by('id_user','desc');
	return $this->db->get()->result();
}

public function input($data)
{
	$this->db->insert('tbl_user',$data);
}

	public function detail($id_user)
{
	$this->db->select('*');
	$this->db->from('tbl_user');
	$this->db->where('id_user',$id_user);
	return $this->db->get()->row();
}

public function edit($data)
{
	$this->db->where('id_user',$data['id_user']);
	$this->db->update('tbl_user',$data);
}

public function delete($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('tbl_user',$data);
	}
// End....
public function login($username,$password)
{
	$this->db->select('*');
	$this->db->from('tbl_user');
	$this->db->where(array(
					'username'=>$username,
					'password'=>$password,
	));
	return $this->db->get()->row();
}

public function regis($data)
{
	$this->db->insert('tbl_user',$data);
}



}
 ?>