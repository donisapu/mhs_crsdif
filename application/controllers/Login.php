<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent:: __construct();
	
	}

	public function index()
	{
		if($this->session->userdata('level')=='Admin'){
		redirect('admin');		
		}else{
			$this->load->view('login');
		}
	}
	function aksi(){
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$cekdb = $this->db->query('select * from admin where username = "'.$username.'" and password = "'.$pwd.'"');	
			 if($cekdb->num_rows()>0){
			 	foreach ($cekdb->result() as $akun) {
			 		$id_admin =$akun->id_admin;
			 		$username =$akun->username;
			 		$level ='Admin';
			 	}
			 	 	$this->session->set_userdata(array(
				 		'id_admin' => $id_admin,
				 		'username' => $username,
				 		'level' => $level,
				 			
				 	));
				 	$this->session->set_flashdata('info', 'Info!, Login Sukses, Selamat Datang !');
			 	    redirect('admin');
		  	}else{
			 	$this->session->set_flashdata('gagal', '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone">
                    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                    </button>
                    <span class="adminpro-icon adminpro-danger-error admin-check-sucess admin-check-pro-none"></span>
                    <p class="message-alert-none"><strong>Gagal!</strong> Username/Password salah.</p>
                </div>');
			 	$this->load->view('login');
			 }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}
