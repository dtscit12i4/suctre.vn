<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?
	class ve_account
	{
		public function valid_email($email)
		{
		global $conn, $tbl_account;
		$result=true;
		$rs = $conn->query("select id from $tbl_account where email='".$email."'");
		$count = $rs->num_rows;

		if($count>0)
		{
		$result=false;
		}

		// if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		// {
		// $result=false;
		// }

		return $result;

		}
	}
?>