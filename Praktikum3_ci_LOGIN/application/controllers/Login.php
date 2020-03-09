<!-- 
/*
| -------------------------------------------------------------------
| Membuat controller Login.php
| -------------------------------------------------------------------
*/
-->

<?php 

class Login extends CI_Controller{
	
	/*
	| -------------------------------------------------------------------
	| Seperti biasa pada saat class dijalankan, yang diload pertama adalah
	| model M_login kumpulan operasi sql database
	| -------------------------------------------------------------------
	*/
	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');

	}

	/*
	| -------------------------------------------------------------------
	| function index() berfungsi menampilkan meload form view V_login
	| -------------------------------------------------------------------
	*/
	function index(){
		$this->load->view('V_login');
	}

	function aksi_login(){
		/*
		| -------------------------------------------------------------------
		| Syntax ini menangkap data username dan password yang dikirim lalu 
		| dimasukkan ke dalam array, agar bisa dikirimkan lagi ke odel M_login
		| -------------------------------------------------------------------
		*/
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		
		/*
		| -------------------------------------------------------------------
		| Syntax ini akan mengecek apakah email dan password yang dimasukkan
		| di form login terdaftar dan ada di database
		| -------------------------------------------------------------------
		*/
		$cek = $this->M_login->cek_login("admin",$where)->num_rows();
		
		/*
		| -------------------------------------------------------------------
		| Syntax ini berfungsi untuk mengecek ketika user sudah mengisikan 
		| Username dan Password terdaftar di database dan session berstatus
		| login maka diahlihkan ke controller admin
		| -------------------------------------------------------------------
		*/
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin"));

		}else{
			/*
			| -------------------------------------------------------------------
			| dan jika Username dan Password salah maka akan ditampilkan pesan 
			| berikut:
			| -------------------------------------------------------------------
			*/
			echo "Username dan password salah !";
		}
	}

	/*
	| -------------------------------------------------------------------
	| function logout menghapus semua session dan kita kembali lagi ke 
	| halaman login
	| -------------------------------------------------------------------
	*/
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}