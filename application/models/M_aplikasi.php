<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aplikasi extends CI_Model 
{	function __construct()
	{	parent::__construct();
	}
	
	function tambah_mahasiswa($data)
	{	// query binding ditandai dengan "?" untuk security
		$this->db->query("insert into mahasiswa (nim,nama) values
			(?,?)", array($data['nim'],$data['nama']));
		
		
		// menghapus variabel dari memory
		unset($data);
	}
	
	function daftar_mahasiswa()
	{	$query = $this->db->query("SELECT nim,nama 
			FROM mahasiswa order by nim asc");
		
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
	}
	
	function data_mahasiswa($nim)
	{	// query binding ditandai dengan "?" untuk security
		$query = $this->db->query("SELECT nim,nama 
			FROM mahasiswa where nim = ? ",array($nim));
		
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($nim);
	}
	
	function ubah_mahasiswa($nim, $data)
	{	// query binding ditandai dengan "?" untuk security
		$this->db->query("update mahasiswa set nama = ?
			where nim = ? ", array($data['nama'],$nim));
		
		// menghapus variabel dari memory
		unset($nim, $data);
	}
	
	function hapus_mahasiswa($nim)
	{	// query binding ditandai dengan "?" untuk security
		$this->db->query("delete from mahasiswa 
			where nim = ? ", array($nim));
		
		// menghapus variabel dari memory
		unset($nim);
	}
	
	function putus_koneksi()
	{	$this->db = null;
	}
}
// End of file M_aplikasi.php 
// Location: ./application/models/M_aplikasi.php 
