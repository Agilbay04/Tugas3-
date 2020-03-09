<!-- 
/*
| -------------------------------------------------------------------
| MEMBUAT CONTROLLER Crud.php
| -------------------------------------------------------------------
| Gunananya untuk menampilkan data dari database
*/
 -->

<?php 

class Crud extends CI_Controller{
	/*
	| -------------------------------------------------------------------
	| PERTAMA PANGGIL MODEL M_data
	| -------------------------------------------------------------------
	| Gunananya untuk meload semua operasi sql database untuk mengambil 
	| data di database berada di model M_data
	*/	
	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
                $this->load->helper('url');
	}

	/*
	| -------------------------------------------------------------------
	| KEDUA MEMPARSING DATA KE VIEW V_tampil
	| -------------------------------------------------------------------
	| Gunananya untuk menampilkan data ke view V_tampil agar data dari 
	| database bisa dilihat user. 
	*/
	function index(){
		$data['user'] = $this->M_data->tampil_data()->result();
		$this->load->view('V_tampil',$data);
	}

	/*
	| -------------------------------------------------------------------
	| MENGINPUT DATA KE DATABASE DENGAN CI
	| -------------------------------------------------------------------
	| 1. Membuat function tambah
	| 2. Buat syntax atau perintah untuk menampilkan form V_input yang 
	| 	 digunakan sebagai tempat untuk mengimputkan data dan kemudian
	|    disimpan ke database 
	*/
	function tambah(){
		$this->load->view('V_input');
	}

	
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->M_data->input_data($data,'user');
		redirect('Crud/index');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->M_data->hapus_data($where,'user');
		redirect('Crud/index');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->M_data->edit_data($where,'user')->result();
		$this->load->view('V_edit',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
	
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->M_data->update_data($where,$data,'user');
		redirect('Crud/index');
	}
}