<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?
/**
* 
*/
class ve_user
{	
	// make safe string before process
	public function admin($user,$pass)
	{
		global $conn, $tbl_user;

		$result = false;
		if($user<>'')
		{
			$rs = $conn->query("select id from $tbl_user where username = '".$user."' and password='".$pass."' and (user_level=2 or user_level=1) and display=1");
			$count = $rs->num_rows;
			if($count>0)
				$result=true;
		}
		return $result;
	}
	// make safe string before process
	public function coder($user,$pass)
	{
		global $conn, $tbl_user;

		$result = false;
		if($user<>'')
		{
			$rs = $conn->query("select id from $tbl_user where username = '".$user."' and password='".$pass."' and user_level=1 and display=1");
			$count = $rs->num_rows;
			if($count>0)
				$result=true;
		}
		return $result;
	}
}
?>