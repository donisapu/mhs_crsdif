<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mcrud');
		$this->load->library('form_validation');
		if($this->session->userdata('level')!='Admin'){
		redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['jumlah_mhs']=$this->db->query("SELECT * FROM users where status_mhs='aktif'");
		$data['jumlah_kelas']=$this->Mcrud->get_kelas();
		$data['jumlah_mapel']=$this->Mcrud->get_mapel();
		
		$this->load->view('admin/header');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/footer');
		
	}

	public function mahasiswa()
	{
		$data['mahasiswa']=$this->Mcrud->get_mahasiswa()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/mahasiswa', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_mahasiswa()
	{
		$data = array(
            'title' => 'Tambah',
            'button' => 'Simpan',
            'action' => site_url('admin/tambah_mahasiswa_act'),
			'id_mahasiswa' => set_value('id_mahasiswa'),
			'serial_number' => set_value('serial_number'),
			'nim' => set_value('nim'),
			'nama' => set_value('nama'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'tgl_lahir' => set_value('tgl_lahir'),
			'alamat' => set_value('alamat'),
			'no_telp' => set_value('no_telp'),
			
		);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/form_mahasiswa',$data);
		$this->load->view('admin/footer');	
		
	}

	public function tambah_mahasiswa_act()
	{
		$serial_number= $_POST['serial_number'];
		$nim= $_POST['nim'];
		$nama= $_POST['nama'];
		$jenis_kelamin= $_POST['jenis_kelamin'];
		$tgl_lahir= $_POST['tgl_lahir'];
		$alamat= $_POST['alamat'];
		$no_telp= $_POST['no_telp'];
		$status_mhs= 'aktif';
		
		$data = array('rfid_uid'=>$serial_number, 'nim'=>$nim, 'name'=>$nama, 'jenis_kelamin'=>$jenis_kelamin, 'tgl_lahir'=>$tgl_lahir, 'alamat'=>$alamat, 'no_telp'=>$no_telp, 'status_mhs'=>$status_mhs);
		$add = $this->Mcrud->tambah('users',$data);
		if($add > 0){
			$this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			redirect('admin/mahasiswa');
		}else{
			$this->session->set_flashdata('error', 'ulangi beberapa saat lagi');
			
		}	
		
	}

	public function edit_mahasiswa($id)
	{
		$row=$this->Mcrud->getmahasiswa_id($id)->row();
		if($row){
			$data = array(
			'title' => 'Update',
			'button' => 'Update',
            'action' => site_url('admin/edit_mahasiswa_act'),
			'id_mahasiswa' => set_value('id_mahasiswa', $id),
			'serial_number' => set_value('serial_number', $row->rfid_uid),
			'nim' => set_value('nim', $row->nim),
			'nama' => set_value('nama', $row->name),
			'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
			'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
			'alamat' => set_value('alamat', $row->alamat),
			'no_telp' => set_value('no_telp', $row->no_telp),
			
			);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/form_mahasiswa',$data);
		$this->load->view('admin/footer');
		}
		
	}

	public function edit_mahasiswa_act(){
		
		$id_mahasiswa= $_POST['id_mahasiswa'];
		$serial_number= $_POST['serial_number'];
		$nim= $_POST['nim'];
		$nama= $_POST['nama'];
		$jenis_kelamin= $_POST['jenis_kelamin'];
		$tgl_lahir= $_POST['tgl_lahir'];
		$alamat= $_POST['alamat'];
		$no_telp= $_POST['no_telp'];

		$data = 'rfid_uid="'.$serial_number.'", nim="'.$nim.'", name="'.$nama.'", jenis_kelamin="'.$jenis_kelamin.'", tgl_lahir="'.$tgl_lahir.'", alamat="'.$alamat.'", no_telp="'.$no_telp.'"';
		$this->Mcrud->update('users', $data, "id='$id_mahasiswa'");
		
			$this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			redirect ('admin/mahasiswa');
		
	}

	public function hapus_mahasiswa($id){
		$data= "id='$id'";
		$hapus = $this->Mcrud->delete('users', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/mahasiswa');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function aktifkan_mahasiswa($id){
		
		$status_mhs= 'aktif';
		
		$data = ' status_mhs="'.$status_mhs.'"';
		$edit = $this->Mcrud->update("users", $data, "id='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Aktivasi Berhasil !</div>');
			 redirect ('admin/mahasiswa');
		
	}

	public function nonaktifkan_mahasiswa($id){
		
		$status_mhs= 'Tidak aktif';
		
		$data = ' status_mhs="'.$status_mhs.'"';
		$edit = $this->Mcrud->update("users", $data, "id='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Nonaktivasi Berhasil !</div>');
			 redirect ('admin/mahasiswa');
		
	}
	
	public function kelas()
	{
		$data['kelas']=$this->Mcrud->get_kelas()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/kelas', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_kelas(){	
		$nama_kelas= $_POST['nama_kelas'];
				
		$data = array('nama_kelas'=>$nama_kelas);
		$add = $this->Mcrud->tambah('kelas',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/kelas');
	}

	public function edit_kelas($id){
		
		$nama_kelas= $_POST['nama_kelas'];
				
		$data = 'nama_kelas="'.$nama_kelas.'"';
		$edit = $this->Mcrud->update("kelas", $data, "id_kelas='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/kelas');
		
	}
	public function hapus_kelas($id){
		$data= "id_kelas='$id'";
		$hapus = $this->Mcrud->delete('kelas', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/kelas');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function mapel()
	{
		$data['mapel']=$this->Mcrud->get_mapel()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/mapel', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_mapel(){	
		$nama_mapel= $_POST['nama_mapel'];
				
		$data = array('nama_mapel'=>$nama_mapel);
		$add = $this->Mcrud->tambah('mapel',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/mapel');
	}

	public function edit_mapel($id){
		
		$nama_mapel= $_POST['nama_mapel'];
				
		$data = 'nama_mapel="'.$nama_mapel.'"';
		$edit = $this->Mcrud->update("mapel", $data, "id_mapel='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/mapel');
		
	}
	public function hapus_mapel($id){
		$data= "id_mapel='$id'";
		$hapus = $this->Mcrud->delete('mapel', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/mapel');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function detail_kelas()
	{
		$data['detail_kelas']=$this->Mcrud->get_detail_kelas()->result();
		$data['kelas']=$this->Mcrud->get_kelas()->result();
		$data['mapel']=$this->Mcrud->get_mapel()->result();
		$data['mahasiswa']=$this->Mcrud->get_mahasiswa()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/detail_kelas', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_detail_kelas(){	
		$id_kelas= $_POST['id_kelas'];
		$id_mapel= $_POST['id_mapel'];
				
		$data = array('id_kelas'=>$id_kelas, 'id_mapel'=>$id_mapel);
		$add = $this->Mcrud->tambah('detail_kelas',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/detail_kelas');
	}

	public function edit_detail_kelas($id){
		
		$id_kelas= $_POST['id_kelas'];
		$id_mapel= $_POST['id_mapel'];
				
		$data = 'id_kelas="'.$id_kelas.'", id_mapel="'.$id_mapel.'"';
		$edit = $this->Mcrud->update("detail_kelas", $data, "id_detail_kelas='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/detail_kelas');
		
	}
	public function hapus_detail_kelas($id){
		$data= "id_detail_kelas='$id'";
		$hapus = $this->Mcrud->delete('detail_kelas', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/detail_kelas');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function detail_mhs($id)
	{
		$data['id_detail_kelas'] = $id;
		
		$cek=$this->Mcrud->get_detail_kelas_id($id)->row();
		$data['nama_kelas'] = $cek->nama_kelas;
		$data['nama_mapel'] = $cek->nama_mapel;
		
		$data['detail_mhs']=$this->Mcrud->get_detail_mhs($id)->result();
		
		$data['mahasiswa']=$this->Mcrud->get_mahasiswa()->result();

		$this->load->view('admin/header');
		$this->load->view('admin/detail_mhs', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_detail_mhs(){	
		$id_detail_kelas= $_POST['id_detail_kelas'];
		$id_mahasiswa= $_POST['id_mahasiswa'];
				
		$data = array('id_detail_kelas'=>$id_detail_kelas, 'id_mahasiswa'=>$id_mahasiswa);
		$add = $this->Mcrud->tambah('detail_mhs',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/detail_mhs/'.$id_detail_kelas);
	}

	public function hapus_detail_mhs($id, $id_detail_kelas){
		$data= "id_detail_mhs='$id'";
		$hapus = $this->Mcrud->delete('detail_mhs', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/detail_mhs/'.$id_detail_kelas);
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function profil()
	{
		$id=$this->session->id_admin;
		$row=$this->Mcrud->getadmin_id($id)->row();
		if($row){
			$data = array(
			'button' => 'Update',
            'action' => site_url('admin/edit_profil_act'),
			'id_admin' => set_value('id_admin', $row->id_admin),
			'username' => set_value('username', $row->username),
			
			);

		$this->load->view('admin/header');
		$this->load->view('admin/profil', $data);
		$this->load->view('admin/footer');
		}
	}

	function ganti_password_act($id){
		//data yang terekam pada method post atau yang kita ketikan pada inputan
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');
		//proses validasi ganti dan ulangi password password
		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
		if($this->form_validation->run() != false){
			$data = 'password="'.$pass_baru.'"';
			$this->Mcrud->update('admin', $data, "id_admin='$id'");
			$this->session->set_flashdata('berhasil', '<div class="col-md-12" ><div class="alert alert-success alert-message" align="center">Update Password Berhasil ! terimakasih </div></div>
                ');
			redirect('admin/profil');
		}else{
			$this->session->set_flashdata('berhasil', '<div class="col-md-12" ><div class="alert alert-danger alert-message" align="center">Update password gagal pastikan mengisi dengan benar ! terimakasih </div></div>');
			redirect('admin/profil');
		}
	}
	
	public function pembayaran_bangunan()
	{
		$data['kode_bangunan']=$this->Mcrud->kode_pembayaran_bangunan();
		$data['pembayaran_bangunan']=$this->Mcrud->getbangunan()->result();
		$data['santri']=$this->db->query("SELECT * from santri order by id_santri desc")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/pembayaran_bangunan', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_pembayaran_bangunan(){	
		$id_pembayaran_bangunan= $_POST['id_pembayaran_bangunan'];
		$id_santri= $_POST['id_santri'];
		$biaya_bangunan= $_POST['biaya_bangunan'];
		$banyak_angsuran= $_POST['banyak_angsuran'];
		$id_pengguna= $this->session->id_pengguna;
		
		$data = array('id_pembayaran_bangunan'=>$id_pembayaran_bangunan, 'id_santri'=>$id_santri, 'biaya_bangunan'=>$biaya_bangunan, 'banyak_angsuran'=>$banyak_angsuran, 'id_pengguna'=>$id_pengguna);
		$add = $this->Mcrud->tambah('pembayaran_bangunan',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/pembayaran_bangunan');
	}

	public function edit_pembayaran_bangunan($id){
		
		$id_santri= $_POST['id_santri'];
		$biaya_bangunan= $_POST['biaya_bangunan'];
		$banyak_angsuran= $_POST['banyak_angsuran'];
		$id_pengguna= $this->session->id_pengguna;
		
		$data = ' id_santri="'.$id_santri.'", biaya_bangunan="'.$biaya_bangunan.'", banyak_angsuran="'.$banyak_angsuran.'", id_pengguna="'.$id_pengguna.'"';
		$edit = $this->Mcrud->update("pembayaran_bangunan", $data, "id_pembayaran_bangunan='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/pembayaran_bangunan');
		
	}
	public function hapus_pembayaran_bangunan($id){
		$data= "id_pembayaran_bangunan='$id'";
		$hapus = $this->Mcrud->delete('pembayaran_bangunan', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/pembayaran_bangunan');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function detail_pembayaran_bangunan($id)
	{
		$data['detail_bangunan']=$this->Mcrud->getbangunan_id($id)->result();
		$data['id_pembayaran_bangunan'] = $id;
		$cekbayar=$this->db->query("SELECT * FROM pembayaran_bangunan where id_pembayaran_bangunan='$id'");
		$nominal = $cekbayar->row()->biaya_bangunan/$cekbayar->row()->banyak_angsuran;
		$cekdetail=$this->db->query("SELECT * FROM detail_angsuran_bangunan where id_pembayaran_bangunan='$id' order by id_detail_angsuran_bangunan desc limit 1");
		if($cekdetail->num_rows()==0){
		$sisa = 4;
		}else{
		$sisa = $cekdetail->row()->sisa_angsuran-1;
		}
		$data['nominal_angsur']=$nominal;
		$data['sisa_angsuran']=$sisa;
		$this->load->view('admin/header');
		$this->load->view('admin/detail_pembayaran_bangunan', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_detail_pembayaran_bangunan(){	
		$id_pembayaran_bangunan= $_POST['id_pembayaran_bangunan'];
		$nominal_angsur= $_POST['nominal_angsur'];
		$sisa_angsuran= $_POST['sisa_angsuran'];
		$status_bayar_bangunan= $_POST['status_bayar_bangunan'];
		$tgl_bayar= date('Y-m-d');
		$id_pengguna= $this->session->id_pengguna;
		
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = '2000';
						$config['upload_path'] = './aset/bukti_bayar';
						$config['file_name'] = 'buk'.time();
						$this->load->library('upload', $config);
						
						
							$this->upload->do_upload('bukti_bayar');
							$img = $this->upload->data();
							$bukti_bayar = $img['file_name'];

		$data = array('id_pembayaran_bangunan'=>$id_pembayaran_bangunan, 'nominal_angsur'=>$nominal_angsur, 'sisa_angsuran'=>$sisa_angsuran, 'bukti_bayar_bangunan'=>$bukti_bayar, 'status_bayar_bangunan'=>$status_bayar_bangunan, 'tgl_bayar'=>$tgl_bayar, 'id_pengguna'=>$id_pengguna);
		$add = $this->Mcrud->tambah('detail_angsuran_bangunan',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/detail_pembayaran_bangunan/'.$id_pembayaran_bangunan);
	}

	public function edit_detail_pembayaran_bangunan($id){
		
		$id_pembayaran_bangunan= $_POST['id_pembayaran_bangunan'];
		$nominal_angsur= $_POST['nominal_angsur'];
		$status_bayar_bangunan= $_POST['status_bayar_bangunan'];
		$id_pengguna= $this->session->id_pengguna;
			
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

		$data = ' nominal_angsur="'.$nominal_angsur.'", status_bayar_bangunan="'.$status_bayar_bangunan.'", bukti_bayar_bangunan="'.$bukti_bayar.'", id_pengguna="'.$id_pengguna.'"';
		$edit = $this->Mcrud->update("detail_angsuran_bangunan", $data, "id_detail_angsuran_bangunan='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/detail_pembayaran_bangunan/'.$id_pembayaran_bangunan);
		
	}
	// public function hapus_detail_pembayaran_bangunan($id){
	// 	$data= "id_detail_angsuran_bangunan='$id'";
	// 	$hapus = $this->Mcrud->delete('detail_angsuran_bangunan', $data);
	// 	if($hapus > 0){
	// 		 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
	// 		 redirect('admin/detail_pembayaran_bangunan/'.$id);
			 
	// 	}else{
	// 		echo("<script>alert('Not Success')</script>");
	// 	}
	// }

	public function kosongkan_angsuran($id_pembayaran){
		$data= "id_pembayaran_bangunan='$id_pembayaran'";
		$hapus = $this->Mcrud->delete('detail_angsuran_bangunan', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dikosongkan !</div>');
			 redirect('admin/detail_pembayaran_bangunan/'.$id_pembayaran);
			 
		}else{
			$this->session->set_flashdata('success', '<div class="alert alert-danger">Data Belum Ada !</div>');
			 redirect('admin/detail_pembayaran_bangunan/'.$id_pembayaran);
		}
	}

	public function pembayaran_bulanan()
	{
		
		$data['pembayaran_bulanan']=$this->Mcrud->getbulanan()->result();
		
		$this->load->view('admin/header');
		$this->load->view('admin/pembayaran_bulanan', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_pembayaran_bulanan(){	
		$bulan= $_POST['bulan'];
		$tahun= $_POST['tahun'];
		$biaya_bulanan= $_POST['biaya_bulanan'];
		$id_pengguna= $this->session->id_pengguna;
		
		$data = array('bulan'=>$bulan, 'tahun'=>$tahun, 'biaya_bulanan'=>$biaya_bulanan, 'id_pengguna'=>$id_pengguna);
		$add = $this->Mcrud->tambah('pembayaran_bulanan',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/pembayaran_bulanan');
	}

	public function edit_pembayaran_bulanan($id){
		
		$bulan= $_POST['bulan'];
		$tahun= $_POST['tahun'];
		$biaya_bulanan= $_POST['biaya_bulanan'];
		$id_pengguna= $this->session->id_pengguna;
		
		$data = ' bulan="'.$bulan.'", tahun="'.$tahun.'", biaya_bulanan="'.$biaya_bulanan.'", id_pengguna="'.$id_pengguna.'"';
		$edit = $this->Mcrud->update("pembayaran_bulanan", $data, "id_pembayaran_bulanan='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/pembayaran_bulanan');
		
	}
	public function hapus_pembayaran_bulanan($id){
		$data= "id_pembayaran_bulanan='$id'";
		$hapus = $this->Mcrud->delete('pembayaran_bulanan', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/pembayaran_bulanan');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function detail_pembayaran_bulanan($id)
	{
		$data['detail_bulanan']=$this->Mcrud->getbulanan_id($id)->result();
		$data['santri']=$this->Mcrud->getsantri()->result();
		$data['id_pembayaran_bulanan'] = $id;
		$data['kode_bulanan'] = $this->Mcrud->kode_pembayaran_bulanan();
		$cekbayar=$this->db->query("SELECT * FROM pembayaran_bulanan where id_pembayaran_bulanan='$id'");
		$nominal = $cekbayar->row()->biaya_bulanan;
		$data['nominal_bayar']=$nominal;
		$data['bulan']=$cekbayar->row()->bulan;
		$data['tahun']=$cekbayar->row()->tahun;
		
		$this->load->view('admin/header');
		$this->load->view('admin/detail_pembayaran_bulanan', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_detail_pembayaran_bulanan(){	
		$id_detail_pembayaran_bulanan= $_POST['id_detail_pembayaran_bulanan'];
		$id_pembayaran_bulanan= $_POST['id_pembayaran_bulanan'];
		$id_santri= $_POST['id_santri'];
		$nominal_bayar= $_POST['nominal_bayar'];
		$status_bayar_bulanan= $_POST['status_bayar_bulanan'];
		$tgl_bayar= date('Y-m-d');
		$id_pengguna= $this->session->id_pengguna;
		
						$config['allowed_types'] = 'jpg|png|jpeg|jfif';
						$config['max_size'] = '2000';
						$config['upload_path'] = './aset/bukti_bayar';
						$config['file_name'] = 'bag'.time();
						$this->load->library('upload', $config);
						
						
							$this->upload->do_upload('bukti_bayar');
							$img = $this->upload->data();
							$bukti_bayar = $img['file_name'];

		$data = array('id_detail_pembayaran_bulanan'=>$id_detail_pembayaran_bulanan, 'id_pembayaran_bulanan'=>$id_pembayaran_bulanan, 'id_santri'=>$id_santri,'nominal_bayar'=>$nominal_bayar,'bukti_bayar_bulanan'=>$bukti_bayar, 'status_bayar_bulanan'=>$status_bayar_bulanan, 'tgl_pembayaran'=>$tgl_bayar, 'id_pengguna'=>$id_pengguna);
		$add = $this->Mcrud->tambah('detail_pembayaran_bulanan',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/detail_pembayaran_bulanan/'.$id_pembayaran_bulanan);
	}

	public function edit_detail_pembayaran_bulanan($id){
		
		$id_pembayaran_bulanan= $_POST['id_pembayaran_bulanan'];
		$id_santri= $_POST['id_santri'];
		$status_bayar_bulanan= $_POST['status_bayar_bulanan'];
		$nominal_bayar= $_POST['nominal_bayar'];
		$id_pengguna= $this->session->id_pengguna;
			
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

		$data = ' id_santri="'.$id_santri.'", nominal_bayar="'.$nominal_bayar.'", status_bayar_bulanan="'.$status_bayar_bulanan.'", bukti_bayar_bulanan="'.$bukti_bayar.'", id_pengguna="'.$id_pengguna.'"';
		$edit = $this->Mcrud->update("detail_pembayaran_bulanan", $data, "id_detail_pembayaran_bulanan='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/detail_pembayaran_bulanan/'.$id_pembayaran_bulanan);
		
	}
	public function hapus_detail_pembayaran_bulanan($id){
		$data= "id_detail_pembayaran_bulanan='$id'";
		$hapus = $this->Mcrud->delete('detail_pembayaran_bulanan', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/detail_pembayaran_bulanan/'.$id);
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function pengeluaran()
	{
		$data['kode_pengeluaran']=$this->Mcrud->kode_pengeluaran();
		$data['pengeluaran']=$this->Mcrud->getpengeluaran()->result();
		$this->load->view('admin/header');
		$this->load->view('admin/pengeluaran', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_pengeluaran(){	
		$id_pengeluaran= $_POST['id_pengeluaran'];
		$nama_pengeluaran= $_POST['nama_pengeluaran'];
		$tgl_pengeluaran= $_POST['tgl_pengeluaran'];
		$id_pengguna= $this->session->id_pengguna;
		
		$data = array('id_pengeluaran'=>$id_pengeluaran, 'nama_pengeluaran'=>$nama_pengeluaran, 'tgl_pengeluaran'=>$tgl_pengeluaran, 'id_pengguna'=>$id_pengguna);
		$add = $this->Mcrud->tambah('pengeluaran',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/pengeluaran');
	}

	public function edit_pengeluaran($id){
		
		$nama_pengeluaran= $_POST['nama_pengeluaran'];
		$tgl_pengeluaran= $_POST['tgl_pengeluaran'];
		$id_pengguna= $this->session->id_pengguna;
		
		$data = ' nama_pengeluaran="'.$nama_pengeluaran.'", tgl_pengeluaran="'.$tgl_pengeluaran.'", id_pengguna="'.$id_pengguna.'"';
		$edit = $this->Mcrud->update("pengeluaran", $data, "id_pengeluaran='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/pengeluaran');
		
	}
	public function hapus_pengeluaran($id){
		$data= "id_pengeluaran='$id'";
		$hapus = $this->Mcrud->delete('pengeluaran', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/pengeluaran');
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function detail_pengeluaran($id)
	{
		$data['detail_pengeluaran']=$this->Mcrud->getpengeluaran_id($id)->result();
		$data['id_pengeluaran'] = $id;
		$ceknamapeng = $this->db->query("SELECT * FROM pengeluaran where id_pengeluaran='$id'")->row();
		$data['nama_pengeluaran']=$ceknamapeng->nama_pengeluaran;

		$this->load->view('admin/header');
		$this->load->view('admin/detail_pengeluaran', $data);
		$this->load->view('admin/footer');
	}

	public function tambah_detail_pengeluaran(){	
		$id_pengeluaran= $_POST['id_pengeluaran'];
		$nama_barang= $_POST['nama_barang'];
		$harga_satuan= $_POST['harga_satuan'];
		$jumlah= $_POST['jumlah'];
		$subtotal= $harga_satuan*$jumlah;
		// $tgl_beli = date('Y-m-d');
		// $id_pengguna= $this->session->id_pengguna;
		
						// $config['allowed_types'] = 'jpg|png|jpeg|jfif';
						// $config['max_size'] = '2000';
						// $config['upload_path'] = './aset/bukti_bayar';
						// $config['file_name'] = 'buk'.time();
						// $this->load->library('upload', $config);
						
						
						// 	$this->upload->do_upload('bukti_bayar');
						// 	$img = $this->upload->data();
						// 	$bukti_bayar = $img['file_name'];

		$data = array('id_pengeluaran'=>$id_pengeluaran, 'nama_barang'=>$nama_barang, 'harga_satuan'=>$harga_satuan, 'jumlah'=>$jumlah, 'subtotal'=>$subtotal);
		$add = $this->Mcrud->tambah('detail_pengeluaran',$data);
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Disimpan !</div>');
			 redirect('admin/detail_pengeluaran/'.$id_pengeluaran);
	}

	public function edit_detail_pengeluaran($id){
		
		$id_pengeluaran= $_POST['id_pengeluaran'];
		$nama_barang= $_POST['nama_barang'];
		$harga_satuan= $_POST['harga_satuan'];
		$jumlah= $_POST['jumlah'];
		$subtotal= $harga_satuan*$jumlah;
		// $id_pengguna= $this->session->id_pengguna;
			
				// if($_FILES['bukti_bayar']['name']==''){
				// 	$bukti_bayar=$_POST['old'];
				// }else{
				// 		$config['allowed_types'] = 'jpg|png|jpeg|jfif';
				// 		$config['max_size'] = '2000';
				// 		$config['upload_path'] = './aset/bukti_bayar';
				// 		$config['file_name'] = 'buk'.time();
				// 		$this->load->library('upload', $config);
						
				// 			$this->upload->do_upload('bukti_bayar');
				// 			$img = $this->upload->data();
				// 			$bukti_bayar = $img['file_name'];
				// }

		$data = ' nama_barang="'.$nama_barang.'", harga_satuan="'.$harga_satuan.'", jumlah="'.$jumlah.'", subtotal="'.$subtotal.'"';
		$edit = $this->Mcrud->update("detail_pengeluaran", $data, "id_detail_pengeluaran='$id'");
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Diubah !</div>');
			 redirect ('admin/detail_pengeluaran/'.$id_pengeluaran);
		
	}
	public function hapus_detail_pengeluaran($id){
		$data= "id_detail_pengeluaran='$id'";
		$hapus = $this->Mcrud->delete('detail_pengeluaran', $data);
		if($hapus > 0){
			 $this->session->set_flashdata('success', '<div class="alert alert-success">Data Berhasil Dihapus !</div>');
			 redirect('admin/detail_pengeluaran/'.$id);
			 
		}else{
			echo("<script>alert('Not Success')</script>");
		}
	}

	public function laporan_bangunan()
	{
		$data['tgl1'] = $this->input->get('tgl1',true);
		$data['tgl2'] = $this->input->get('tgl2',true);

			if($data['tgl1']!="" && $data['tgl2']!=""){
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna and tgl_bayar >= "'.$data['tgl1'].'" and tgl_bayar <= "'.$data['tgl2'].'"')->result();
			}elseif($data['tgl1']!=""){
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna and tgl_bayar >= "'.$data['tgl1'].'"')->result();
			}elseif($data['tgl2']!=""){
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna and tgl_bayar <= "'.$data['tgl2'].'"')->result();
			}else{
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna')->result();
			}

		
		$this->load->view('admin/header', $data);	
		$this->load->view('admin/laporan_bangunan', $data);
		$this->load->view('admin/footer');
	}

	public function cetak_laporan_bangunan()
	{
		
		$data['tgl1'] = $this->input->get('tgl1',true);
		$data['tgl2'] = $this->input->get('tgl2',true);

			if($data['tgl1']!="" && $data['tgl2']!=""){
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna and tgl_bayar >= "'.$data['tgl1'].'" and tgl_bayar <= "'.$data['tgl2'].'"')->result();
			}elseif($data['tgl1']!=""){
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna and tgl_bayar >= "'.$data['tgl1'].'"')->result();
			}elseif($data['tgl2']!=""){
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna and tgl_bayar <= "'.$data['tgl2'].'"')->result();
			}else{
				$data['laporan_bangunan'] = $this->db->query('SELECT * FROM pembayaran_bangunan a, detail_angsuran_bangunan b, santri c, pengguna d where a.id_pembayaran_bangunan=b.id_pembayaran_bangunan and a.id_santri=c.id_santri and a.id_pengguna=d.id_pengguna')->result();
			}

		$this->load->view('admin/cetak_laporan_bangunan', $data);
		
	}

	public function laporan_bulanan()
	{
		$data['bulan'] = $this->input->get('bulan',true);
		$data['tahun'] = $this->input->get('tahun',true);

			if($data['bulan']!="" && $data['tahun']!=""){
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna and bulan = "'.$data['bulan'].'" and tahun = "'.$data['tahun'].'"')->result();
			}elseif($data['bulan']!=""){
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna and bulan = "'.$data['bulan'].'"')->result();
			}elseif($data['tahun']!=""){
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna and tahun = "'.$data['tahun'].'"')->result();
			}else{
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna')->result();
			}
		
		$this->load->view('admin/header', $data);	
		$this->load->view('admin/laporan_bulanan', $data);
		$this->load->view('admin/footer');
	}

	public function cetak_laporan_bulanan()
	{
		
		$data['bulan'] = $this->input->get('bulan',true);
		$data['tahun'] = $this->input->get('tahun',true);

			if($data['bulan']!="" && $data['tahun']!=""){
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna and bulan = "'.$data['bulan'].'" and tahun = "'.$data['tahun'].'"')->result();
			}elseif($data['bulan']!=""){
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna and bulan = "'.$data['bulan'].'"')->result();
			}elseif($data['tahun']!=""){
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna and tahun = "'.$data['tahun'].'"')->result();
			}else{
				$data['laporan_bulanan'] = $this->db->query('SELECT * FROM pembayaran_bulanan a, detail_pembayaran_bulanan b, santri c, pengguna d where a.id_pembayaran_bulanan=b.id_pembayaran_bulanan and b.id_santri=c.id_santri and b.id_pengguna=d.id_pengguna')->result();
			}

		$this->load->view('admin/cetak_laporan_bulanan', $data);
		
	}

	public function laporan_pengeluaran()
	{
		$data['tgl1'] = $this->input->get('tgl1',true);
		$data['tgl2'] = $this->input->get('tgl2',true);

			if($data['tgl1']!="" && $data['tgl2']!=""){
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna and tgl_pengeluaran >= "'.$data['tgl1'].'" and tgl_pengeluaran <= "'.$data['tgl2'].'"')->result();
			}elseif($data['tgl1']!=""){
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna and tgl_pengeluaran >= "'.$data['tgl1'].'"')->result();
			}elseif($data['tgl2']!=""){
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna and tgl_pengeluaran <= "'.$data['tgl2'].'"')->result();
			}else{
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna')->result();
			}

		
		$this->load->view('admin/header', $data);	
		$this->load->view('admin/laporan_pengeluaran', $data);
		$this->load->view('admin/footer');
	}

	public function cetak_laporan_pengeluaran()
	{
		
		$data['tgl1'] = $this->input->get('tgl1',true);
		$data['tgl2'] = $this->input->get('tgl2',true);

			if($data['tgl1']!="" && $data['tgl2']!=""){
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna and tgl_pengeluaran >= "'.$data['tgl1'].'" and tgl_pengeluaran <= "'.$data['tgl2'].'"')->result();
			}elseif($data['tgl1']!=""){
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna and tgl_pengeluaran >= "'.$data['tgl1'].'"')->result();
			}elseif($data['tgl2']!=""){
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna and tgl_pengeluaran <= "'.$data['tgl2'].'"')->result();
			}else{
				$data['laporan_pengeluaran'] = $this->db->query('SELECT * FROM pengeluaran a, detail_pengeluaran b, pengguna c where a.id_pengeluaran=b.id_pengeluaran and a.id_pengguna=c.id_pengguna')->result();
			}

		$this->load->view('admin/cetak_laporan_pengeluaran', $data);
		
	}
}
