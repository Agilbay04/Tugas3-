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

	/*
	| -------------------------------------------------------------------
	| BUAT FUNCTION tambah_aksi()
	| -------------------------------------------------------------------
	| Gunananya untuk menghandle inputan pada form view input 
	| 1. kita menangkap iputan dari form dengan function $this->input->post
	|    ('nama form iput') kemudian jadikan array
	| 2. Kemudian menginput data ke database dengan model M_data. Pada parameter pertama kita iput array data
	|    yang berisi data-data dari input, pada parameter kedua di isi nama tabel tujuan penyimpanan 
	| 3. Kemudian setelah data tersimpan mengalihkan ke method index redirect('Crud/index');
	*/
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
 
	/*
	| -------------------------------------------------------------------
	| BUAT FUNCTION hapus()
	| -------------------------------------------------------------------
	| pada function hapus() siberikan variable $id disini berguna untuk
	| menangkap data id yang dikirim melalu url dari link hapus kemudian 
	| dijadikan array, kemudian kita kirimkan data arraynya ke model 
	| M_data 
	*/
	function hapus($id){
		$where = array('id' => $id);
		$this->M_data->hapus_data($where,'user');
		redirect('Crud/index');
	}
 
	/*
	| -------------------------------------------------------------------
	| BUAT FUNCTION edit()
	| -------------------------------------------------------------------
	| Di Function ini id dijadikan menjadi array yang akan kita gunakan 
	| untuk mengambil data menurut id  dengan menggunakan function 
	| edit_data pada model M_data
	*/
	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->M_data->edit_data($where,'user')->result();
		$this->load->view('V_edit',$data);
	}

	/*
	| -------------------------------------------------------------------
	| BUAT FUNCTION update()
	| -------------------------------------------------------------------
	*/
	function update(){
		/*
		| -------------------------------------------------------------------
		| syntax berikut menangkap data lama dari form edit 
		| -------------------------------------------------------------------
		*/
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		
		/*
		| -------------------------------------------------------------------
		| kemudian kita masukkan data yang akan kita update ke dalam variabel
		| data
		| -------------------------------------------------------------------
		*/
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
		
		/*
		| -------------------------------------------------------------------
		| variable where berikut yang menentukan data mana yang akan di update
		| berdasarkan id
		| -------------------------------------------------------------------
		*/
		$where = array(
			'id' => $id
		);
		
		/*
		| -------------------------------------------------------------------
		| Setelah itu kita panggil method update_data() pada model M_data
		| untuk menjalankan proses update data
		| -------------------------------------------------------------------
		*/
		$this->M_data->update_data($where,$data,'user');
		redirect('Crud/index');
	}
}