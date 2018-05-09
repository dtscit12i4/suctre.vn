<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
// session_start();
// @error_reporting(0);
// @set_time_limit(0);

// include "../includes/index.php";
// include "../config.php";
// include "../variables.php";
if(!isset($_GET['logout'])){$logout="";}else{$logout=$str->safe($_GET['logout']);}
include 'login_process.php';
if ($login_success)
{	
	if(isset($_POST['id'])) {
		$table = $_POST['com'];
		$id = $_POST['id'];
		$value = $_POST['value'];
		$column = $_POST['column'];
		$conn->query("update $table set $column ='".$value."' where id ='".$id."'");
		die("1");
	}
}
?>