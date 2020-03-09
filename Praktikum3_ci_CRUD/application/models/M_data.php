<!-- 
/*
| -------------------------------------------------------------------
| MEMBUAT MODEL M_data.php
| -------------------------------------------------------------------
| Gunananya untuk menampung semua operasi sql database, yang nantinya
| digunakan untuk mengambil dan mengolah data dari database
*/	
 -->

<?php 

class M_data extends CI_Model{
	/*
	| -------------------------------------------------------------------
	| OPERASI UNTUK MENAMPILKAN DATA
	| -------------------------------------------------------------------
	| Syntax berikut berfungsi untuk mengambil data dari database, nama
	| tabel dari database yang akan kita tampilkan kita tuliskan
	| pada paramater get(''); 
	*/
	function tampil_data(){
		return $this->db->get('user');
	}

	/*
	| -------------------------------------------------------------------
	| OPERASI INSERT SQL KE DATABASE
	| -------------------------------------------------------------------
	| Gunananya untuk menginsertkan atau menginputkan data ke database 
	| tujuan 
	*/
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	/*
	| -------------------------------------------------------------------
	| OPERASI SQL UNTUK MENGHAPUS DATA DI DATABASE
	| -------------------------------------------------------------------
	| Terdapat fungsi where yang berguna menyeleksi query dan delete untuk
	| menghapus data di database
	*/
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	/*
	| -------------------------------------------------------------------
	| PROSES PENGAMBILAN DATA BERDASARKAN id
	| -------------------------------------------------------------------
	| di function edit_data() terjadi proses pengambilan data yang mau di
	| edit berdasarkan id
	*/
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	/*
	| -------------------------------------------------------------------
	| OPERASI SQL UNTUK MENGUPDATE DATA DI DATABASE
	| -------------------------------------------------------------------
	| Terdapat fungsi where yang berguna menyeleksi query dan update untuk
	| mengupdate data yang diubah yang terdapat di database
	*/
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}