<?
	if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	if ($login_success)
	{
		if(isset($_POST['id'])) {
			$result=array();
			$table = $_POST['com'];
			$id = $_POST['id'];
			$column = $_POST['column'];
			$ok=$conn->query("update $table set $column ='".'0'."' where id ='".$id."'");
			if($ok){
                $result['notify']="Delete order success";
			}
			die(json_encode($result));
		}
	}
?>