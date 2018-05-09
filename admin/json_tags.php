<?
session_start();
@error_reporting(1);
@set_time_limit(0);


include "../functions/index.php";
include "../includes/config.php";
include "../includes/functions.php";

include "kt_login.php";
include "kt_admin.php";
include "function.php";

$name = trim(strip_tags($_GET['q']));//retrieve the search term that autocomplete sends
if($name<>''){
$rs = $db->query("SELECT id,name FROM tbl_tags where name like '%$name%' or seo_keyword like '%$name%'");
while ($row = $db->fetch_array($rs))//loop through the retrieved values
{
	$row_set[] = $row;//build an array
}
echo json_encode($row_set);//format the array into json data
}
?>