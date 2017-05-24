<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ( $this->session->userdata('userid') and 
	 $this->session->userdata('pass') ) { 
?>
<!doctype html>
<html>
<head>
<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?=site_url('assets/css/bootstrap.css')?>" rel="stylesheet">		
	<link href="<?=base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
</head>
<body>
<div class="container">
<fieldset>
<? if ((isset($page)) and ($page == 'tambah_mahasiswa')) { ?>
	<legend>Tambah Mahasiswa</legend>
	<?=form_open('aplikasi/proses_tambah_mahasiswa','class="form-horizontal"')?>
	<table>
		<tr><td>NIM </td><td>: <input type="text" name="nim" placeholder="NIM"/></td> </tr>
		<tr><td>Nama </td><td>: <input type="text" name="nama" placeholder="Nama"/></td> </tr>
		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>		
	</table>
	</form>
<? 
} else if ((isset($page)) and ($page == 'ubah_mahasiswa')) { ?>
	<legend>Ubah Mahasiswa</legend>
	<?=form_open('aplikasi/proses_ubah_mahasiswa','class="form-horizontal"')?>
	<input type="hidden" name="nim" value="<?=$mhs->nim ?>">
	<table>
		<tr><td>NIM </td><td>: <input type="text" name="nim" value="<?=$mhs->nim ?>" disabled/></td> </tr>
		<tr><td>Nama </td><td>: <input type="text" name="nama" value="<?=$mhs->nama ?>"/></td> </tr>
		<tr><td><button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i> Ubah</button></td> </tr>		
	</table>
	</form>
<? 
// menghapus variabel dari memory
unset($mhs);
} else if ((isset($page)) and ($page == 'daftar_mahasiswa')) { ?>
	<legend>Daftar Mahasiswa</legend>
	<table class="table table-bordered">
		<tr><td width="10%"><center>NIM</center></td>
			<td width="60%"><center>Nama</center></td>
			<td colspan="2"><center>Aksi</center></td>
		<tr/>
		<?	foreach ($daftar_mhs as $r)
			{	echo "<tr><td>".$r->nim."</td>
						  <td>".$r->nama."</td>
						  <td><center><a href='".base_url('aplikasi/ubah_mahasiswa/'.$r->nim)."'><i class='icon-edit'></i> Ubah</a></center>
						  </td>
						  <td><center><a href='".base_url('aplikasi/hapus_mahasiswa/'.$r->nim)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></center>
						  </td>
					  <tr/>";
			}
		?>
	</table>
	<br/>
	<a href="<?=base_url('aplikasi/tambah_mahasiswa');?>"><i class="icon-plus-sign"></i> Tambah Mahasiswa</a>
<? 
// menghapus variabel dari memory
unset($daftar_mhs,$r);
} else { // home
?>	
	<legend>Home</legend>
	Selamat datang <?=$this->session->userdata('nama')?> <br/><br/>
	<a href="<?=base_url('aplikasi/kalkulator');?>"><i class="icon-hand-right"></i> Kalkulator</a><br/>
	<a href="<?=base_url('aplikasi/daftar_mahasiswa');?>"><i class="icon-hand-right"></i> Daftar Mahasiswa</a>	
<?  
} 
?>
<hr/>
<a href="<?=base_url('aplikasi');?>"><i class="icon-home"></i> Home</a> || <a href="<?=base_url('aplikasi/logout');?>" onClick="return confirm('Apakah Anda ingin logout?')"><i class="icon-off"></i> Logout</a><br/>

<? 	unset($page);
	//echo "<pre>";
	//print_r($this->session->all_userdata());
	//echo "</pre>";
	
?>

</fieldset>
</div>

<script src="<?=site_url('assets/js/jquery.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
<script src="<?=base_url('assets/js/tooltip.js')?>"></script>
</body>
</html>
<? } ?>