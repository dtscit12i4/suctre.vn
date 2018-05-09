<?php
@session_start();
@ob_start();

// show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('PATH_SYSTEM', __DIR__);
include "../includes/index.php";
include "../config.php";
include "../variables.php";

if(!isset($_GET['act'])){$act="";}else{$act=$str->safe($_GET['act']);} if (empty($act)) $act = "home";
if(!isset($_GET['id'])){$id="";}else{$id=$str->safe($_GET['id']);}
if(!isset($_GET['logout'])){$logout="";}else{$logout=$str->safe($_GET['logout']);}

if(!isset($_GET['id'])) 	$getMod = 'add'; 
else if (isset($_GET['copy'])) $getMod = 'copy';
else $getMod = 'edit';

include 'login_process.php';

if ($login_success)
{	
	if(isAjaxRequest() & isset($_REQUEST['ajax_sort'])){
		include "update_sort.php";
	}
	if(isAjaxRequest() & isset($_REQUEST['ajax_status'])){
		include "status_order.php";
	}
	if(isAjaxRequest() & isset($_REQUEST['ajax_cost_order'])){
		include "ajax_cost_order.php";
	}
	if(isAjaxRequest() & isset($_REQUEST['ajax_delete_order'])){
		include "ajax_delete_order.php";
	}
	if(isAjaxRequest() & isset($_REQUEST['ajax_discount_product'])){
		include "ajax_discount_product.php";
	}
	if(isAjaxRequest() & isset($_REQUEST['ajax_increase_product'])){
		include "ajax_increase_product.php";
	}
	if(isAjaxRequest() & isset($_REQUEST['ajax'])){
		$com = $_POST['com'];
		$id = $_POST['id'];
		$type = $_POST['type'];
		$value = $_POST['value'];
		$conn->query("Update $com set $type = $value where id = '".$id."'");
		die;
	}
	include "tpl/skin/header.php";
		include "tpl/skin/left-menu.php";
		echo "<div class=\"content-wrapper\">";
		#include "prog/search_box.php";
		if (is_file("prog/".$act.".php"))
			include "prog/".$act.".php";
		else
			echo "<b>This function is locked.</b>";
		echo "</div>";
		//include "tpl/skin/copyright.php";
	include "tpl/skin/footer.php";
}
else	include "page_login.php";
?>

