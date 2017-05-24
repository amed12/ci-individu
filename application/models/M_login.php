<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model 
{	function __construct()
	{	parent::__construct();
	}
	
	// cek keberadaan user di sistem
	function db_cek_login($userid, $password)
	{	// query binding ditandai dengan "?" untuk security
		$query = $this->db->query("SELECT 
			id_user,password,nama FROM user 
			WHERE id_user= ? AND 
			password= md5(?)",
			array($userid,$password)
			);
			
		// mengembalikan hasil query
		return $query;
		
		// menghapus query dari memory
		$query = null;
		
		// menghapus variabel dari memory
		unset($userid,$password);		
	}	
}
// End of file M_login.php 
// Location: ./application/models/M_login.php 