<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller 
{	public function __construct()
	{	parent::__construct();
	
		// cek session user. jika tidak ada session, maka redirect ke login
		if ( $this->session->userdata('userid') and 
			 $this->session->userdata('pass') )
		{	$this->load->model('m_aplikasi');
		} else
		{	redirect(base_url('login'));
		}
	}	
	
	public function index()
	{	$this->load->view('v_aplikasi');		
	}
	
	public function kalkulator()
	{	$angka1 = $this->input->post('angka1');
		$angka2 = $this->input->post('angka2');
	
		if ( isset($angka1) and isset($angka2)) 
		{	// mengecek masukan dari form
			$angka1 = $this->input->post('angka1');
			$angka2 = $this->input->post('angka2');
			$pilih_hitung = $this->input->post('pilih-hitung');
			$hasil_hitung = 0;
			
			
			// mengecek proses perhitungan yang diminta
			if ($pilih_hitung == "+"){
				$hasil_hitung = $angka1 + $angka2;
			}
			else if ($pilih_hitung == "-"){
				$hasil_hitung = $angka1 - $angka2;
			}
			else if ($pilih_hitung == "*"){
				$hasil_hitung = $angka1 * $angka2;
			}
			else if ($pilih_hitung == "/"){
				$hasil_hitung = $angka1 / $angka2;
			}
			
			// membungkus semua data perhitungan untuk ditampilkan di view
			$data['angka1'] = $angka1;
			$data['angka2'] = $angka2;
			$data['pilih_hitung'] = $pilih_hitung;
			$data['hasil_hitung'] = $hasil_hitung;
		}
	
		$data['page'] = 'kalkulator';
		$this->load->view('v_aplikasi',$data);
		unset($angka1,$angka2,$pilih_hitung,$hasil_hitung,$data);
	}
	//main page jika butuh banyak page
	public function tambah_tugas()
	{	$data['page'] = 'tambah_tugas';
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	
	public function proses_tambah_tugas()
	{	$data['matkul'] = $this->input->post('matkul');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$data['mulai'] = $this->input->post('mulai');
		$data['selesai'] = $this->input->post('selesai');
		$data['status'] = $this->input->post('status');
		
		// menyimpan data tugas di model m_aplikasi 
		// function tambah_tugas dengan parameter $data
		$this->m_aplikasi->tambah_tugas($data);
		
		redirect(base_url('aplikasi/daftar_tugas'));
		unset($data);
	}
	
	public function daftar_tugas()
	{	$data['page'] = 'daftar_tugas';
	
		// mengambil semua baris (menggunakan fungsi result()) 
		// di model m_aplikasi function daftar_tugas
		$data['daftar_mhs'] = $this->m_aplikasi->daftar_tugas()->result();
		
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	
	public function ubah_tugas($nim)
	{	$data['page'] = 'ubah_tugas';
		
		// mengambil hanya satu baris (menggunakan fungsi row()) 
		// di model m_aplikasi function daftar_tugas dengan parameter $nim
		$data['mhs'] = $this->m_aplikasi->data_tugas($nim)->row();
		
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	
	public function proses_ubah_tugas()
	{	$data['matkul'] = $this->input->post('matkul');
	$data['deskripsi'] = $this->input->post('deskripsi');
	$data['selesai'] = $this->input->post('selesai');
	$data['status'] = $this->input->post('status');
		$nim = $this->input->post('id_tugas');
		
		// mengubah data tugas di model m_aplikasi function ubah_tugas
		// dengan parameter $nim dan $data
		$this->m_aplikasi->ubah_tugas($nim,$data);	
		
		redirect(base_url('aplikasi/daftar_tugas'));
		unset($nim,$data);
	}
	
	public function hapus_tugas($id_tugas)
	{	// menghapus data tugas di model m_aplikasi 
		// function hapus_tugas dengan parameter $nim
		$this->m_aplikasi->hapus_tugas($id_tugas);
		
		redirect(base_url('aplikasi/daftar_tugas'));
	}
	
	public function logout()
	{	// memutus koneksi di model m_aplikasi function putus_koneksi
		$this->m_aplikasi->putus_koneksi();	
		
		// semua variabel session akan dihapus dari memory
		$array_session = $this->session->all_userdata();
		$this->session->unset_userdata($array_session);	
		unset($array_session);
		
		// memutus session
		$this->session->sess_destroy();		
		
		// kembali lagi ke login
		redirect(base_url('login'));
	}

}
// End of file Aplikasi.php 
// Location: ./application/controllers/Aplikasi.php 