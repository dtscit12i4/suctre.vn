<?php
@session_start();
@ob_start();

// show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../includes/index.php";
include "../config.php";
include "../variables.php";

if(!isset($_GET['act'])){$act="";}else{$act=$str->safe($_GET['act']);} if (empty($act)) $act = "home";
if(!isset($_GET['id'])){$id="";}else{$id=$str->safe($_GET['id']);}
if(!isset($_GET['logout'])){$logout="";}else{$logout=$str->safe($_GET['logout']);}

if(!isset($_GET['id'])) 	$getMod = 'add'; else 	$getMod = 'edit';

include 'login_process.php';

if ($login_success) {
	if(isset($_POST['id'])) {
		$table = $_POST['tbl'];
		$id = $_POST['id'];
		$value = $_POST['value'];
		$type = $_POST['type'];
		$value = ($value > 0 ) ? 0 : 1;
		$db->query("Update $table set $type = $value where id = ".$id);
		echo $value;
	}
}
?>