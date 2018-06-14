<?php
$timexpired = 600;
$timeout = time() - $timexpired;
$conn->query("DELETE FROM `tbl_tgp_online` WHERE `time` < ".$timeout."");
$conn->query("OPTIMIZE TABLE `tbl_tgp_online`");

if (empty($HTTP_X_FORWARDED_FOR)) $IP_NUMBER = getenv("REMOTE_ADDR");
else $IP_NUMBER = $HTTP_X_FORWARDED_FOR;
$url_str	=	getenv("QUERY_STRING");
// check("SELECT * FROM tbl_tgp_online WHERE ip='$IP_NUMBER' and user=".$THANHVIEN["id"]);
$result = $conn->query("SELECT * FROM tbl_tgp_online WHERE ip='$IP_NUMBER' and user=".$THANHVIEN["id"]);
if ($result) {
	$rows = $result->num_rows;
}
else {
	$rows = 0;
}
if($rows != 0) $conn->query("UPDATE tbl_tgp_online SET time='".time()."', site='".$url_str."' WHERE `ip`='$IP_NUMBER' and user=".$THANHVIEN["id"]);
else
{
	$sql	=	"INSERT INTO tbl_tgp_online VALUES ('$IP_NUMBER','".time()."','".$url_str."','".getenv("HTTP_USER_AGENT")."',".$THANHVIEN["id"].")";
	$conn->query($sql);
	
		// Bat dau dem theo ngay 
		$result = $conn->query("SELECT * FROM tbl_tgp_online_daily WHERE ngay='".$date->vn_other(time(),"d/m/Y")."'");
		if ($result) {
			$rows = $result->num_rows;
		}
		else {
			$rows = 0;
		}
		if($rows != 0) $conn->query("UPDATE tbl_tgp_online_daily SET bo_dem = bo_dem+1 WHERE `ngay`='".$date->vn_other(time(),"d/m/Y")."'");
		else $conn->query("INSERT INTO tbl_tgp_online_daily VALUES ('".$date->vn_other(time(),"d/m/Y")."',1)");
		// Ket thuc
}
// Ket thuc
?>