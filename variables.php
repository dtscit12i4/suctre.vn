<?php

$conn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
mysqli_set_charset($conn,"utf8");

// $acc = new ve_account();
$account = new ve_account();
$get = new ve_get();
$num = new ve_number();
$str = new ve_string();
$system = new ve_system();
$user = new ve_user();
$url = new ve_url();
$url1 = new ve_url1();

$tbl_account = $prefix.'account';
$tbl_product_album = $prefix.'product_album';
$tbl_gallery_album  = $prefix.'gallery_album ';
$tbl_inquiry = $prefix.'inquiry';
$tbl_email = $prefix.'email';
$tbl_contact = $prefix.'contact';
$tbl_config = $prefix.'config';
$tbl_country = $prefix.'country';
$tbl_page = $prefix.'page';
$tbl_video = $prefix.'video';
$tbl_post = $prefix.'post';
$tbl_post_cat = $prefix.'post_cat';
$tbl_gallery = $prefix.'gallery';
$tbl_gallery_cat = $prefix.'gallery_cat';
$tbl_orders = $prefix.'orders';
$tbl_product = $prefix.'product';
$tbl_product_cat = $prefix.'product_cat';
$tbl_product_size = $prefix.'product_size';
$tbl_product_material = $prefix.'product_material';
$tbl_user = $prefix.'user';
$tbl_orders = $prefix.'orders';

// $module
if(!isset($_GET['module'])) $module = ''; else $module = $_GET['module']; if($module=='') $module = 'home';

// $slug
if(!isset($_GET['slug'])) $slug = ''; else $slug = $_GET['slug'];
$slug_arr = explode('-', $slug);

$id = intval($slug_arr[0]);

// $page
if(!isset($_GET['page'])) $page = ''; else $page = $_GET['page'];


if(!isset($_POST['txtMod'])) $txtMod = ''; else $txtMod = $str->safe($_POST['txtMod']);


if(!isset($_POST['txtAdminUser'])) $txtAdminUser = ''; else $txtAdminUser = $str->safe($_POST['txtAdminUser']);
if(!isset($_POST['txtAdminPass'])) $txtAdminPass = ''; else $txtAdminPass = md5($_POST['txtAdminPass']);


?>