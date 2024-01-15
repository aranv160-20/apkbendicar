<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'denda', 
			'label' => 'Denda', 
			'icon' => '<i class="fa fa-money "></i>'
		),
		
		array(
			'path' => 'kendaraan', 
			'label' => 'Kendaraan', 
			'icon' => '<i class="fa fa-automobile "></i>'
		),
		
		array(
			'path' => 'peminjaman', 
			'label' => 'Peminjaman', 
			'icon' => '<i class="fa fa-arrow-up "></i>'
		),
		
		array(
			'path' => 'pengembalian', 
			'label' => 'Pengembalian', 
			'icon' => '<i class="fa fa-arrow-down "></i>'
		),
		
		array(
			'path' => 'penyewa', 
			'label' => 'Penyewa', 
			'icon' => '<i class="fa fa-user-plus "></i>'
		),
		
		array(
			'path' => 'petugas', 
			'label' => 'Petugas', 
			'icon' => '<i class="fa fa-user "></i>'
		),
		
		array(
			'path' => 'tbl_user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-users "></i>'
		)
	);
		
	
	
			public static $jk = array(
		array(
			"value" => "L", 
			"label" => "Laki-Laki", 
		),
		array(
			"value" => "P", 
			"label" => "Perempuan", 
		),);
		
			public static $level = array(
		array(
			"value" => "Administrator", 
			"label" => "Administrator", 
		),
		array(
			"value" => "Owner", 
			"label" => "Owner", 
		),
		array(
			"value" => "Petugas", 
			"label" => "Petugas", 
		),
		array(
			"value" => "Customer", 
			"label" => "Customer", 
		),);
		
}