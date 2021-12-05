<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_santri extends CI_Controller {
	function __construct(){
		parent:: __construct();
	
	}

	public function index()
	{
		if($this->session->userdata('level')=='Santri'){
		redirect('santri');		
		}else{
			$this->load->view('login_santri');
		}
	}
	function aksi(){
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$cekdb = $this->db->query('select * from santri where username_san = "'.$username.'" and password_san = "'.$pwd.'" and status_santri="Aktif"');	
			 if($cekdb->num_rows()>0){
			 	foreach ($cekdb->result() as $akun) {
			 		$id_santri =$akun->id_santri;
			 		$nama_santri =$akun->nama_santri;
			 		
			 	}
			 	 	$this->session->set_userdata(array(
				 		'id_santri' => $id_santri,
				 		'nama_santri' => $nama_santri,
				 		'level' => 'Santri',
				 			
				 	));
				 	$this->session->set_flashdata('info', 'Info!, Login Sukses, Selamat Datang !');
			 	    redirect('santri');
		 		
		 		
			 }else{
			 	$this->session->set_flashdata('gagal', '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone">
                    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                    </button>
                    <span class="adminpro-icon adminpro-danger-error admin-check-sucess admin-check-pro-none"></span>
                    <p class="message-alert-none"><strong>Gagal!</strong> Username/Password salah.</p>
                </div>');
			 	$this->load->view('login_santri');
			 }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login_santri', 'refresh');
	}
}
