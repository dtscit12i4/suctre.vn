<?php
$timexpired = 600;
$timeout = time() - $timexpired;
mysqli_query($conn,"DELETE FROM `tbl_tgp_online` WHERE `time` < ".$timeout."");
mysqli_query($conn,"OPTIMIZE TABLE `tbl_tgp_online`");

if (empty($HTTP_X_FORWARDED_FOR)) $IP_NUMBER = getenv("REMOTE_ADDR");
else $IP_NUMBER = $HTTP_X_FORWARDED_FOR;
$url_str	=	getenv("QUERY_STRING");
// check("SELECT * FROM tbl_tgp_online WHERE ip='$IP_NUMBER' and user=".$THANHVIEN["id"]);
$result = mysqli_query($conn,"SELECT * FROM tbl_tgp_online WHERE ip='$IP_NUMBER' and user=".$THANHVIEN["id"]);
if($result) mysqli_query($conn,"UPDATE tbl_tgp_online SET time='".time()."', site='".$url_str."' WHERE `ip`='$IP_NUMBER' and user=".$THANHVIEN["id"]);
else
{
	$sql	=	"INSERT INTO tbl_tgp_online VALUES ('$IP_NUMBER','".time()."','".$url_str."','".getenv("HTTP_USER_AGENT")."',".$THANHVIEN["id"].")";
	mysqli_query($conn,$sql);
	
		// Bat dau dem theo ngay 
		$result = mysqli_query($conn,"SELECT * FROM tbl_tgp_online_daily WHERE ngay='".$date->vn_other(time(),"d/m/Y")."'");
		if($result) mysqli_query($conn,"UPDATE tbl_tgp_online_daily SET bo_dem = bo_dem+1 WHERE `ngay`='".$date->vn_other(time(),"d/m/Y")."'");
		else mysqli_query($conn,"INSERT INTO tbl_tgp_online_daily VALUES ('".$date->vn_other(time(),"d/m/Y")."',1)");
		// Ket thuc
}
// Ket thuc
?>