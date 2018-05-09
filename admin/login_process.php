<?
$login_success = false;

if($txtAdminUser<>'')
{
	$_SESSION['ses_admin_user'] = $txtAdminUser;
	$_SESSION['ses_admin_pass'] = $txtAdminPass;
}


if(!isset($_SESSION['ses_admin_user'])) $ses_admin_user = ''; else $ses_admin_user = $str->safe($_SESSION['ses_admin_user']);
if(!isset($_SESSION['ses_admin_pass'])) $ses_admin_pass = ''; else $ses_admin_pass = $str->safe($_SESSION['ses_admin_pass']);

if($user->admin($ses_admin_user,$ses_admin_pass)==true)
{
	$login_success = true;
	$rs_member=$conn->query("select * from $tbl_user where username='".$ses_admin_user."'");
	$row_member=$rs_member->fetch_assoc();
	$_SESSION["id"]	        =	$row_member['id'];
	$_SESSION["username"]	=	$row_member['username'];
    $_SESSION["level"]	    =	$row_member['user_level'];
}

if($user->coder($ses_admin_user,$ses_admin_pass)==true)
{
	$user_coder = true;
}
else
{
	$user_coder = false;
}
if($logout=='OK')
{
	unset($_SESSION['ses_admin_user']);
	unset($_SESSION['ses_admin_pass']);
	header('location: ?act=home');
}
