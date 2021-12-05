<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library('form_validation');
		if($this->session->userdata('level')!='Santri'){
		redirect('login_santri','refresh');
		}
	}

	public function index()
	{
		$data['informasi']=$this->Mcrud->getinformasi()->result();

		$this->load->view('santri/header');
		$this->load->view('santri/home', $data);
		$this->load->view('santri/footer');
		
	}

	public function detail_informasi($id)
	{
		$data['informasi']=$this->Mcrud->getinformasi_id($id)->row();
		$this->load->view('santri/header');
		$this->load->view('santri/detail_informasi', $data);
		$this->load->view('santri/footer');
	}

	public function biodata($id)
	{
		$row=$this->Mcrud->getsantri_id($id)->row();
		if($row){
			$data = array(
			'title' => 'Update',
			'button' => 'Update',
            'action' => site_url('santri/edit_santri_act'),
			'id_santri' => set_value('id_santri', $row->id_santri),
			'nama_santri' => set_value('nama_santri', $row->nama_santri),
			'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
			'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
			'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
			'alamat_san' => set_value('alamat_san', $row->alamat_san),
			'no_telp_san' => set_value('no_telp_san', $row->no_telp_san),
			'ktp_wali' => set_value('ktp_wali', $row->ktp_wali),
			'nama_wali' => set_value('nama_wali', $row->nama_wali),
			'username_san' => set_value('username_san', $row->username_san),
			'password_san' => set_value('password_san', $row->password_san),

			);
		
		$this->load->view('santri/header', $data);
		$this->load->view('santri/biodata',$data);
		$this->load->view('santri/footer');
		}
		
	}

	public function edit_santri_act(){
		
		$id_santri= $_POST['id_santri'];
		$nama_santri= $_POST['nama_santri'];
		$jenis_kelamin= $_POST['jenis_kelamin'];
		$tgl_lahir= $_POST['tgl_lahir'];
		$tempat_lahir= $_POST['tempat_lahir'];
		$alamat_san= $_POST['alamat_san'];
		$no_telp_san= $_POST['no_telp_san'];
		$nama_wali= $_POST['nama_wali'];
		$username_san= $_POST['username_san'];
		$password_san= $_POST['password_san'];
		
				if($_FILES['ktp_wali']['name']==''){
					$ktp_wali=$_POST['old'];
				}else{
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = '2000';
						$config['upload_path'] = './aset/gbr_ktp';
						$config['file_name'] = 'ktp'.time();
						$this->load->library('upload', $config);
						
							$this->upload->do_upload('ktp_wali');
							$img = $this->upload->data();
							$ktp_wali = $img['file_name'];
				}
		

		$data = 'nama_santri="'.$nama_santri.'", jenis_kelamin="'.$jenis_kelamin.'", tgl_lahir="'.$tgl_lahir.'", tempat_lahir="'.$tempat_lahir.'", alamat_san="'.$alamat_san.'", no_telp_san="'.$no_telp_san.'", ktp_wali="'.$ktp_wali.'",nama_wali="'.$nama_wali.'",username_san="'.$username_san.'", password_san="'.$password_san.'"';
		$this->Mcrud->update('santri', $data, "id_santri='$id_santri'");
		
			$this->session->set_flashdata('success', '<div class="alert alert-success">Biodata Berhasil Diubah !</div>');
			redirect ('santri/biodata/'.$id_santri);
		
	}

	public function pembayaran_bangunan()
	{
		$data['kode_bangunan']=$this->Mcrud->kode_pembayaran_bangunan();
		$data['pembayaran_bangunan']=$this->Mcrud->getbangunan()->result();
		$data['santri']=$this->Mcrud->getsantri()->result();
		$this->load->view('santri/header');
		$this->load->view('santri/pembayaran_bangunan', $data);
		$this->load->view('santri/footer');
	}


	public function detail_pembayaran_bangunan($id)
	{
		$data['detail_bangunan']=$this->Mcrud->getbangunan_id($id)->result();
		$data['id_pembayaran_bangunan'] = $id;
		$cekbayar=$this->db->query("SELECT * FROM pembayaran_bangunan where id_pembayaran_bangunan='$id'");
		$nominal = $cekbayar->row()->biaya_bangunan/$cekbayar->row()->banyak_angsuran;
		$sisa = $cekbayar->row()->banyak_angsuran-$cekbayar->num_rows()-1;
		$data['nominal_angsur']=$nominal;
		$data['sisa_angsuran']=$sisa;
		$this->load->view('santri/header');
		$this->load->view('santri/detail_pembayaran_bangunan', $data);
		$this->load->view('santri/footer');
	}

	
	public function edit_detail_pembayaran_bangunan($id){
		
		$id_pembayaran_bangunan= $_POST['id_pembayaran_bangunan'];
		$nominal_angsur= $_POST['nominal_angsur'];
		$status_bayar_bangunan= 'Tunggu Konfirmasi';
			
				if($_FILES['bukti_bayar']['name']==''){
					$bukti_bayar=$_POST['old'];
				}else{
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = '2000';
						$config['upload_path'] = './aset/bukti_bayar';
						$config['file_name'] = 'buk'.time();
						$this->load->library('upload', $config);
						
							$this->upload->do_upload('bukti_bayar');
							$img = $this->upload->data();
							$bukti_bayar = $img['file_name'];
				}

		$data = ' nominal_angsur="'.$nominal_angsur.'", bukti_bayar_bangunan="'.$bukti_bayar.'", status_bayar_bangunan="'.$status_bayar_bangunan.'"';
		$edit = $this->Mcrud->update("detail_angsuran_bangunan", $data, "id_detail_angsuran_bangunan='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('santri/detail_pembayaran_bangunan/'.$id_pembayaran_bangunan);
		
	}
	
	public function cetak_bukti_bangunan($id)
	{
		$data['detail_bangunan']=$this->db->query("SELECT * FROM detail_angsuran_bangunan a, pembayaran_bangunan b, santri c where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and b.id_santri=c.id_santri and a.id_detail_angsuran_bangunan='$id'")->row();
		$this->load->view('santri/cetak_bukti_bangunan', $data);
	}


	public function pembayaran_bulanan()
	{
		
		$data['pembayaran_bulanan']=$this->Mcrud->getbulanan()->result();
		
		$this->load->view('santri/header');
		$this->load->view('santri/pembayaran_bulanan', $data);
		$this->load->view('santri/footer');
	}

	

	public function detail_pembayaran_bulanan()
	{
		//$data['id_santri'] = $id;
		$cekbayar=$this->db->query("SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_pengguna=d.id_pengguna and b.id_santri=c.id_santri");
		$data['detail_bulanan'] = $cekbayar->result();	
		$nominal = $cekbayar->row()->biaya_bulanan;
		$data['nominal_bayar']=$nominal;
		$data['bulan']=$cekbayar->row()->bulan;
		$data['tahun']=$cekbayar->row()->tahun;
		
		$this->load->view('santri/header');
		$this->load->view('santri/detail_pembayaran_bulanan', $data);
		$this->load->view('santri/footer');
	}

	public function edit_detail_pembayaran_bulanan($id){
		
		$id_pembayaran_bulanan= $_POST['id_pembayaran_bulanan'];
		$id_santri= $_POST['id_santri'];
		$nominal_bayar= $_POST['nominal_bayar'];
		$status_bayar_bulanan= 'Tunggu Konfirmasi';
			
				if($_FILES['bukti_bayar']['name']==''){
					$bukti_bayar=$_POST['old'];
				}else{
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = '2000';
						$config['upload_path'] = './aset/bukti_bayar';
						$config['file_name'] = 'bul'.time();
						$this->load->library('upload', $config);
						
							$this->upload->do_upload('bukti_bayar');
							$img = $this->upload->data();
							$bukti_bayar = $img['file_name'];
				}

		$data = ' id_santri="'.$id_santri.'", nominal_bayar="'.$nominal_bayar.'", bukti_bayar_bulanan="'.$bukti_bayar.'", status_bayar_bulanan="'.$status_bayar_bulanan.'"';
		$edit = $this->Mcrud->update("detail_pembayaran_bulanan", $data, "id_detail_pembayaran_bulanan='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('santri/detail_pembayaran_bulanan/'.$id_santri);
		
	}

	public function cetak_bukti_bulanan($id)
	{
		$data['detail_bulanan']=$this->db->query("SELECT * FROM detail_pembayaran_bulanan a, pembayaran_bulanan b, santri c where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and a.id_santri=c.id_santri and a.id_detail_pembayaran_bulanan='$id'")->row();
		$this->load->view('santri/cetak_bukti_bulanan', $data);
	}

	public function pengguna()
	{
		$data['pengguna']=$this->Mcrud->getpengguna()->result();
		$this->load->view('santri/header');
		$this->load->view('santri/pengguna', $data);
		$this->load->view('santri/footer');
	}

	public function tambah_pengguna(){	
		$nama_pengguna= $_POST['nama_pengguna'];
		$no_telp= $_POST['no_telp'];
		$alamat= $_POST['alamat'];
		$username= $_POST['username'];
		$password= $_POST['password'];
		$level= $_POST['level'];
		
		$data = array('nama_pengguna'=>$nama_pengguna, 'no_telp'=>$no_telp, 'alamat'=>$alamat, 'username'=>$username, 'password'=>md5($password), 'level'=>$level);
		$add = $this->Mcrud->tambah('pengguna',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('santri/pengguna');
	}

	public function edit_pengguna($id){
		
		$nama_pengguna= $_POST['nama_pengguna'];
		$no_telp= $_POST['no_telp'];
		$alamat= $_POST['alamat'];
		$username= $_POST['username'];
		$password= $_POST['password'];
		$level= $_POST['level'];
		
		$data = ' nama_pengguna="'.$nama_pengguna.'", no_telp="'.$no_telp.'", alamat="'.$alamat.'", username="'.$username.'", password="'.md5($password).'", level="'.$level.'"';
		$edit = $this->Mcrud->update("pengguna", $data, "id_pengguna='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('santri/pengguna');
		
	}

	public function hapus_pengguna($id){
		$data= "id_pengguna='$id'";
		$hapus = $this->Mcrud->delete('pengguna', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('santri/pengguna');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	
	public function gantipassword()
	{
		$this->load->view('santri/header');
		$this->load->view('santri/gantipassword');
		$this->load->view('santri/footer');
	}

	function ganti_password_act($id){
		//data yang terekam pada method post atau yang kita ketikan pada inputan
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');
		//proses validasi ganti dan ulangi password password
		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
		if($this->form_validation->run() != false){
			$data = 'password_san="'.$pass_baru.'"';
			$this->Mcrud->update('santri', $data, "id_santri='$id'");
			$this->session->set_flashdata('berhasil', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Update Password Berhasil ! terimakasih </div></div>
                ');
			redirect('santri/gantipassword');
		}else{
			$this->session->set_flashdata('berhasil', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Update password gagal pastikan mengisi dengan benar ! terimakasih </div></div>');
			redirect('santri/gantipassword');
		}
	}
	
}
