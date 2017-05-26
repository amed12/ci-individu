<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if ( $this->session->userdata('userid') and 
	 $this->session->userdata('pass') ) { 
?>
<!doctype html>
<html>
<head>
<title>Sistem Pencatat Tugas kuliah online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?=site_url('assets/css/bootstrap.css')?>" rel="stylesheet">		
	<link href="<?=base_url('assets/css/bootstrap-responsive.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>
<body>
<div class="container">
<fieldset>
<? if ((isset($page)) and ($page == 'tambah_mahasiswa')) { ?>
	<legend>Tambah Mahasiswa</legend>
	<?=form_open('aplikasi/proses_tambah_mahasiswa','class="form-horizontal"')?>
	<div class="col-md-2">
		<div class="row">
			
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="<?=base_url('assets/uin.png')?>">
					</a>
				</div>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?=base_url('aplikasi');?>"><span class="fa fa-home"></span>  Dashboard</a></li>			
					
			<li><a href="<?=base_url('aplikasi/logout');?>" onClick="return confirm('Apakah Anda ingin logout?')"><span class="fa fa-sign-in"></span>  Logout</a></li>
			</ul>
			</div>	
		
	<table>
		<tr><td>Matkul </td><td>: <input type="text" name="matkul" placeholder="Matkul"/></td> </tr>
		<tr><td>Deskripsi </td><td>: <textarea class="form-control" name="deskripsi" placeholder="Deskripsi"/></textarea></td> </tr>
		<tr><td>Tanggal Mulai </td><td>: <input type="date" name="mulai" value="<?php echo date("Y-m-d");?>" placeholder="Tanggal Mulai" disabled/></td> </tr>
		<tr><td>Deadline </td><td>: <input type="date" name="selesai" placeholder="Deadline"/></td> </tr>
		<tr><td>Status </td><td>: <select class="form-control"  name="status" placeholder="Status"/><option value="Baru Mulai">Baru Mulai</option><option value="Proses Pengerjaan">Proses Pengerjaan</option><option value="Pekerjaan Selesai">Pekerjaan Selesai</option></select></td> </tr>

		<tr><td><button type="submit" name="simpan" class="btn btn-primary"><i class="icon-ok icon-white"></i> Simpan</button></td> </tr>		
	</table>
	</form>
<? 
} else if ((isset($page)) and ($page == 'ubah_mahasiswa')) { ?>
	<legend><a style="font-color:yellow">Ubah Mahasiswa</a></legend>
	<?=form_open('aplikasi/proses_ubah_mahasiswa','class="form-horizontal"')?>
	<div class="col-md-2">
		<div class="row">
			
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="<?=base_url('assets/uin.png')?>">
					</a>
				</div>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?=base_url('aplikasi');?>"><span class="fa fa-home"></span>  Dashboard</a></li>			
					
			<li><a href="<?=base_url('aplikasi/logout');?>" onClick="return confirm('Apakah Anda ingin logout?')"><span class="fa fa-sign-in"></span>  Logout</a></li>
			</ul>
			</div>	
	
	<input type="hidden" name="nim" value="<?=$mhs->id_tugas ?>">
	<table>
		<tr><td>Matkul </td><td>: <input type="text" name="nim" value="<?=$mhs->matkul ?>" disabled/></td> </tr>
		<tr><td>Deskripsi </td><td>: 
		<textarea name="deskripsi"><?=$mhs->deskripsi ?></textarea></td> </tr>
		<tr><td>Deadline </td><td>: <input type="date" name="nama" value="<?=$mhs->selesai ?>"/></td> </tr>
		<?php 
		$jupuk = $mhs->status;
		?>
		
		<tr><td>Status </td><td>: <select name="status">
  <option <?=($jupuk=='Baru Mulai')?'selected="selected"':''?>>Baru Mulai</option>
  <option <?=($jupuk=='Proses Pengerjaan')?'selected="selected"':''?>>Proses Pengerjaan</option>
  <option <?=($jupuk=='Pekerjaan Selesai')?'selected="selected"':''?>>Pekerjaan Selesai</option>
  </select>
		</td> </tr>
		
		<tr><td><button type="submit" name="ubah" class="btn btn-primary"><i class="icon-ok icon-white"></i> Ubah</button></td> </tr>		
	</table>
	</form>

<? 
// menghapus variabel dari memory
unset($mhs);
} else if ((isset($page)) and ($page == 'daftar_mahasiswa')) { ?>  

<div class="col-md-2">

		<div class="row">
			
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="<?=base_url('assets/uin.png')?>">
					</a>
				</div>
		</div>

		<div class="row">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?=base_url('aplikasi');?>"><span class="fa fa-home"></span>  Dashboard</a></li>			
					
			<li><a href="<?=base_url('aplikasi/logout');?>" onClick="return confirm('Apakah Anda ingin logout?')"><span class="fa fa-sign-in"></span>  Logout</a></li>
			</ul>
			</div>
			</div>	
	<legend>Daftar Tugas</legend>
	<table class="table table-bordered">
		<tr><td width="10%"><center>ID_TUGAS</center></td>
			<td width="60%"><center>Mata Kuliah</center></td>
			<td width="70%"><center>Deskripsi</center></td>
			<td width="20%"><center>Tanggal Mulai</center></td>
			<td width="20%"><center>Deadline</center></td>
			<td width="20%"><center>Status</center></td>
			<td colspan="2"><center>aksi</center></td>
		<tr/>
		<?	foreach ($daftar_mhs as $r)
			{	echo "<tr><td>".$r->id_tugas."</td>
						  <td>".$r->matkul."</td>
						  <td>".$r->deskripsi."</td>
						  <td>".$r->mulai."</td>
						  <td>".$r->selesai."</td>
						  <td>".$r->status."</td>
						  <td><center><a href='".base_url('aplikasi/ubah_mahasiswa/'.$r->id_tugas)."'><i class='icon-edit'></i> Ubah</a></center>
						  </td>
						  <td><center><a href='".base_url('aplikasi/hapus_mahasiswa/'.$r->id_tugas)."'  onClick=\"return confirm('Apakah Anda ingin menghapus data ini?')\"><i class='icon-remove'></i> Hapus</a></center>
						  </td>
					  <tr/>";
			}
		?>
	</table>
	<br/>
	<a href="<?=base_url('aplikasi/tambah_mahasiswa');?>"><i class="icon-plus-sign"></i> Tambah Tugas</a>
<? 
// menghapus variabel dari memory
unset($daftar_mhs,$r);
} else { // home
?>	
	<div class="col-md-2">
		<div class="row">
			
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="<?=base_url('assets/uin.png')?>">
					</a>
				</div>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="<?=base_url('aplikasi');?>"><span class="fa fa-home"></span>  Dashboard</a></li>			
			<li><a href="<?=base_url('aplikasi/daftar_mahasiswa');?>"><span class="fa fa-book"></span>  Entry Tugas</a></li>        									
			<li><a href="<?=base_url('aplikasi/logout');?>" onClick="return confirm('Apakah Anda ingin logout?')"><span class="fa fa-sign-in"></span>  Logout</a></li>
			</ul>
			</div>		
	<legend>Home</legend>
	Selamat datang <?=$this->session->userdata('nama')?> <br/><br/>
		
<?  
} 
?>
<hr/>


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