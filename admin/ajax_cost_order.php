<?
	if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	if ($login_success)
	{
		if(isset($_POST['id_price'])) {
			$result=array();
			$table = $_POST['com'];
			$id_price = $_POST['id_price'];
			$value = $_POST['value'];
			$value_price = $_POST['value_price'];
			$value_money = $_POST['value_money'];
			$column = $_POST['column'];
			$column_price = $_POST['column_price'];
			$column_money = $_POST['column_money'];
			$ok=$conn->query("update $table set $column ='".$value."', $column_price ='".$value_price."', $column_money ='".$value_money."' where id ='".$id_price."'");
			if($ok){
                $result['notify']="Update success";
			}
			die(json_encode($result));
		}
		if(isset($_POST['id'])) {
			$result=array();
			$table = $_POST['com'];
			$id = $_POST['id'];
			$value = $_POST['value'];
			$value_price = $_POST['value_price'];
			$column = $_POST['column'];
			$column_price = $_POST['column_price'];
			$ok=$conn->query("update $table set $column ='".$value."', $column_price ='".$value_price."' where id ='".$id."'");
			if($ok){
                $result['notify']="Update success";
			}
			die(json_encode($result));
		}
	}
?>