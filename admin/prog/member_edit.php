<?
    $act = $_GET['act'];
    // $txt_cat = $_GET['txt_cat'];
    $id = $_GET['id'];
    if(isset($_GET['func'])){
    $func = $_GET['func'];
    $txt_username = $_GET['txt_username'];
    $txt_password = $_GET['txt_password'];
    $txt_password2 = $_GET['txt_password2'];
    $txt_email = $_GET['txt_email'];
    $txt_ten = $_GET['txt_ten'];
    $txt_dien_thoai = $_GET['txt_dien_thoai'];
    $txt_dia_chi = $_GET['txt_dia_chi'];
    $txt_level = $_GET['txt_level'];
    $txt_trang_thai = isset($_GET['txt_trang_thai']) ? 1 : 0;
}
	else {
	$func 			= 	'';
	$txt_password   =   '';
    $txt_password2  =   '';
	$txt_username	=	'';
	$txt_email		=	'';
	$txt_ten 		=	'';
	$txt_dien_thoai =	'';
	$txt_dia_chi	=	'';
	$txt_level		=	2;
	$txt_trang_thai	=	1;
	$error			=	'';
}
	include "templates/member.php";
?>
<center>
<?
	$OK = false;

	$id =	$id+0;
	$r	=	$conn->query("select * from $tbl_user where id = '".$id."'");
	if ($r->num_rows == 0)
	{
		Admin_Load("Tài khoản này không tồn tại.","?act=member_list");
		$OK = true;
	}

	if ($func == "update")
	{
		// xác thực về mật khẩu
		if (empty($txt_password))
		{
			// kiểm tra email
			if (kt_email_dung($txt_email))
				$error = "Email sai";
			// kiểm tra tên thành viên
			else if (empty($txt_ten))
				$error = "Vui lòng nhập họ tên";
			// OK all
			else
			{
				$conn->query("update $tbl_user set name = '".$str->safe($txt_ten)."', email = '".$str->safe($txt_email)."', phone = '".$str->safe($txt_dien_thoai)."', address = '".$str->safe($txt_dia_chi)."', user_level = '".($txt_level+0)."', display = '".($txt_trang_thai+0)."' where id = '".$id."'");
				$OK = true;
				admin_load("Updated information for that user.","?act=member_list");
			}
		}
		else
		{
			if ($txt_password != $txt_password2)
				$error = "Mật khẩu không khớp.";
			else
			{
				$conn->query("update $tbl_user set password = '".md5($txt_password)."' where id = '".$id."'");
                //$db->query("update tgp_user set password = '".md5($txt_password.$txt_username)."' where id = '".$id."'");
				$OK = true;
				admin_load("Thông tin đã được chỉnh sửa.","?act=member_list");
			}
		}
	}
	else
	{
		$r	=	$conn->query("select * from $tbl_user where id = '".$id."'");
		while ($row = $r->fetch_assoc())
		{
			$txt_username	=	$row["username"];
			$txt_email		=	$row["email"];
			$txt_ten 		=	$row["name"];
			$txt_dien_thoai =	$row["phone"];
			$txt_dia_chi	=	$row["address"];
			$txt_level		=	$row["user_level"];
			$txt_trang_thai	=	$row["display"];
		}
		$error			=	"";
	}
	
	if (!$OK)
		template_edit("?act=member_edit", "update", $id , $txt_username , $txt_email , $txt_ten , $txt_dien_thoai , $txt_dia_chi , $txt_level , $txt_trang_thai , $error);
?>
</center>