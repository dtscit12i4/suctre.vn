<?
	if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	if ($login_success)
	{
		if(isset($_POST['id'])) {
			$result=array();
			$table = $_POST['com'];
			$id = $_POST['id'];
			$value = $_POST['value'];
			$column = $_POST['column'];
			$rs_or=$conn->query("select status from $table where id='".$id."'");
			$row_or=$rs_or->fetch_assoc();
			if($value!=13){
				if(($value > $row_or['status']+3) || ($value < $row_or['status'])){
					$result['status']='no';
					die(json_encode($result));
				}
			}
			else {
				if($row_or['status']>=5){
					$result['status']='none';
					die(json_encode($result));
				}
			}
			switch($value){
				case '3': $status = "received"; break;
				case '4': $status = "payed50"; break;
				case '5': $status = "payed"; break;
				case '6': $status = "payed"; break;
				case '7': $status = "transferred"; break;
				case '10': $status = "successful"; break;
				case '13': $status = "cancel"; break;
			}
			$conn->query("update $table set $column ='".$value."', $status='".time()."' where id ='".$id."'");
			$result['status']='ok';
			die(json_encode($result));
		}
		if(isset($_POST['id_inquiry'])) {
			$result=array();
			$table = $_POST['com'];
			$id = $_POST['id_inquiry'];
			$value = $_POST['value'];
			$column = $_POST['column'];
			$rs_or=$conn->query("select status from $table where id='".$id."'");
			$row_or=$rs_or->fetch_assoc();
			if($value!=14){
				if(($value > $row_or['status']+3) || ($value < $row_or['status'])){
					$result['status']='no';
					die(json_encode($result));
				}
			}
			else {
				if($row_or['status']>=4){
					$result['status']='none';
					die(json_encode($result));
				}
			}
			switch($value){
				case '3': $status = "received"; break;
				case '4': $status = "deposit"; break;
				case '5': $status = "deposit"; break;
				case '6': $status = "payed"; break;
				case '8': $status = "transferred"; break;
				case '11': $status = "successful"; break;
				case '14': $status = "cancel"; break;
			}
			$conn->query("update $table set $column ='".$value."', $status='".time()."' where id ='".$id."'");
			$result['status']='ok';
			die(json_encode($result));
		}
	}
?>