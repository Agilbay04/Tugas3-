<?php 
/*
| -------------------------------------------------------------------
| Membuat model M, disini terdapat operasi database mengambil data 
| dari data base.
| -------------------------------------------------------------------
*/
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}