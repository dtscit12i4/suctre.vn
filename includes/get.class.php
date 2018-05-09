<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?php

class ve_get
{
	public function config($code,$col='content')
	{
		global $conn, $tbl_config;
		$rs = $conn->query("select $col from $tbl_config where code='".$code."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function page($code,$col='content')
	{
		global $conn, $tbl_page;
		$rs = $conn->query("select $col from $tbl_page where code='".$code."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function page_by_id($id,$col='name')
	{
		global $conn, $tbl_page;
		$rs = $conn->query("select $col from $tbl_page where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function video_by_id($id,$col='name')
	{
		global $conn, $tbl_video;
		$rs = $conn->query("select $col from $tbl_video where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function product($id,$col='name')
	{
		global $conn, $tbl_product;
		$rs = $conn->query("select $col from $tbl_product where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function product_album($id,$col='name')
	{
		global $conn, $tbl_product_album;
		$rs = $conn->query("select $col from $tbl_product_album where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function product_cat($id,$col='name')
	{
		global $conn, $tbl_product_cat;
		$rs = $conn->query("select $col from $tbl_product_cat where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function product_size($id,$col='info')
	{
		global $conn, $tbl_product_size;
		$rs = $conn->query("select $col from $tbl_product_size where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function product_material($id,$col='name')
	{
		global $conn, $tbl_product_material;
		$rs = $conn->query("select $col from $tbl_product_material where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function gallery($id,$col='name')
	{
		global $conn, $tbl_gallery;
		$rs = $conn->query("select $col from $tbl_gallery where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function gallery_cat($id,$col='name')
	{
		global $conn, $tbl_gallery_cat;
		$rs = $conn->query("select $col from $tbl_gallery_cat where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function post($id,$col='name')
	{
		global $conn, $tbl_post;
		$rs = $conn->query("select $col from $tbl_post where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function post_cat($id,$col='name')
	{
		global $conn, $tbl_post_cat;
		$rs = $conn->query("select $col from $tbl_post_cat where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function account($email,$col='id')
	{
		global $conn, $tbl_account;
		$rs = $conn->query("select $col from $tbl_account where email='".$email."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function gallery_album($id,$col='name')
	{
		global $conn, $tbl_gallery_album;
		$rs = $conn->query("select $col from $tbl_gallery_album where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function account_by_id($id,$col='email')
	{
		global $conn, $tbl_account;
		$rs = $conn->query("select $col from $tbl_account where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function orders_by_id($id,$col='price')
	{
		global $conn, $tbl_orders;
		$rs = $conn->query("select $col from $tbl_orders where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	public function country($id,$col='name')
	{
		global $conn, $tbl_country;
		$rs = $conn->query("select $col from $tbl_country where id='".$id."'");
		$row = $rs->fetch_assoc();
		return $row[$col];
	}
	
}
?>