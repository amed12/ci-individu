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
	public function tambah_mahasiswa()
	{	$data['page'] = 'tambah_mahasiswa';
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	
	public function proses_tambah_mahasiswa()
	{	$data['nim'] = $this->input->post('nim');
		$data['nama'] = $this->input->post('nama');
		
		// menyimpan data mahasiswa di model m_aplikasi 
		// function tambah_mahasiswa dengan parameter $data
		$this->m_aplikasi->tambah_mahasiswa($data);
		
		redirect(base_url('aplikasi/daftar_mahasiswa'));
		unset($data);
	}
	
	public function daftar_mahasiswa()
	{	$data['page'] = 'daftar_mahasiswa';
	
		// mengambil semua baris (menggunakan fungsi result()) 
		// di model m_aplikasi function daftar_mahasiswa
		$data['daftar_mhs'] = $this->m_aplikasi->daftar_mahasiswa()->result();
		
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	
	public function ubah_mahasiswa($nim)
	{	$data['page'] = 'ubah_mahasiswa';
		
		// mengambil hanya satu baris (menggunakan fungsi row()) 
		// di model m_aplikasi function daftar_mahasiswa dengan parameter $nim
		$data['mhs'] = $this->m_aplikasi->data_mahasiswa($nim)->row();
		
		$this->load->view('v_aplikasi',$data);
		unset($data);
	}
	
	public function proses_ubah_mahasiswa()
	{	$data['nama'] = $this->input->post('nama');
		$nim = $this->input->post('nim');
		
		// mengubah data mahasiswa di model m_aplikasi function ubah_mahasiswa
		// dengan parameter $nim dan $data
		$this->m_aplikasi->ubah_mahasiswa($nim,$data);	
		
		redirect(base_url('aplikasi/daftar_mahasiswa'));
		unset($nim,$data);
	}
	
	public function hapus_mahasiswa($nim)
	{	// menghapus data mahasiswa di model m_aplikasi 
		// function hapus_mahasiswa dengan parameter $nim
		$this->m_aplikasi->hapus_mahasiswa($nim);
		
		redirect(base_url('aplikasi/daftar_mahasiswa'));
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