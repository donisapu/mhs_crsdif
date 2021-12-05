<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	public function get_kelas()
	{
		return $this->db->query("SELECT * FROM kelas");
	}

	public function get_mapel()
	{
		return $this->db->query("SELECT * FROM mapel");
	}

	public function get_mahasiswa()
	{
		return $this->db->query("SELECT * FROM users");
	}

	public function getmahasiswa_id($id)
	{
		return $this->db->query("SELECT*FROM users where id='$id'");
		
	}

	public function get_detail_kelas()
	{
		return $this->db->query("SELECT * FROM detail_kelas a, kelas b, mapel c where a.id_kelas=b.id_kelas and a.id_mapel=c.id_mapel");		
	}

	public function get_detail_kelas_id($id)
	{
		return $this->db->query("SELECT * FROM detail_kelas a, kelas b, mapel c where a.id_kelas=b.id_kelas and a.id_mapel=c.id_mapel and a.id_detail_kelas='$id'");		
	}
	
	public function get_detail_mhs($id)
	{
		return $this->db->query("SELECT * FROM detail_mhs a, detail_kelas b, users c where a.id_detail_kelas=b.id_detail_kelas and a.id_mahasiswa=c.id and a.id_detail_kelas='$id'");	
	}

    public function getadmin()
	{
		return $this->db->query('SELECT*FROM admin');
	}

	public function getadmin_id($id)
	{
		return $this->db->query("SELECT*FROM admin where id_admin='$id'");
		
	}

	
		

//-------------------------------------------------------------------
	
	//belum diedit
	public function tambah($tabel, $data){
		$add=$this->db->insert($tabel, $data);
		return $add;
	}
	


	public function delete($tabel, $id){
		$this->db->query("DELETE FROM $tabel where $id");
		return $this->db->affected_rows();
	}

	public function update($tabel, $data, $id){
		$this->db->query("UPDATE $tabel set $data where $id");
		return $this->db->affected_rows();
	}


	function kode_pembayaran_bangunan(){
		$this->db->select('right(id_pembayaran_bangunan,3) as kode', false);
		$this->db->order_by('id_pembayaran_bangunan','desc');
		$this->db->limit(1);
		$query=$this->db->get('pembayaran_bangunan');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='PBA'.date('ymd').$kodemax;

		return $kodejadi;
	}

	function kode_pengeluaran(){
		$this->db->select('right(id_pengeluaran,3) as kode', false);
		$this->db->order_by('id_pengeluaran','desc');
		$this->db->limit(1);
		$query=$this->db->get('pengeluaran');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='PEN'.date('ymd').$kodemax;

		return $kodejadi;
	}

	function kode_pembayaran_bulanan(){
		$this->db->select('right(id_detail_pembayaran_bulanan,3) as kode', false);
		$this->db->order_by('id_detail_pembayaran_bulanan','desc');
		$this->db->limit(1);
		$query=$this->db->get('detail_pembayaran_bulanan');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='PBU'.date('ymd').$kodemax;

		return $kodejadi;
	}

	function kode_santri(){
		$this->db->select('right(id_santri,3) as kode', false);
		$this->db->order_by('id_santri','desc');
		$this->db->limit(1);
		$query=$this->db->get('santri');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='ST'.$kodemax;

		return $kodejadi;
	}


	
}
