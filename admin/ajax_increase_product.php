<?
	if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
	if(isset($_POST['id'])){
		$id=$_POST['id'];
		$value=$_POST['value'];
		$array_id=explode('-',$id);
		if($array_id[1]=='all'){
			$ok=$conn->query("update $tbl_product_size set price=(price+price*$value/100),price_tv=(price_tv+price_tv*$value/100)");
			if($ok){
				die("update price success");
			}
		}
		if($array_id[1]=='haschild'){
			$ok=$conn->query("update $tbl_product_size set price=(price+price*$value/100),price_tv=(price_tv+price_tv*$value/100) where cat IN (select a.id from $tbl_product a,$tbl_product_cat b where a.cat=b.id and b.cat='".$array_id[0]."')");
			if($ok){
				die("update price success");
			}
		}
		if($array_id[1]=='nochild'){
			$ok=$conn->query("update $tbl_product_size set price=(price+price*$value/100),price_tv=(price_tv+price_tv*$value/100) where cat IN (select a.id from $tbl_product a,$tbl_product_cat b where a.cat=b.id and b.id='".$array_id[0]."')");
			if($ok){
				die("update price success");
			}
		}
		if($array_id[1]=='child'){
			$ok=$conn->query("update $tbl_product_size set price=(price+price*$value/100),price_tv=(price_tv+price_tv*$value/100) where cat IN (select id from $tbl_product where cat='".$array_id[0]."')");
			if($ok){
				die("update price success");
			}
		}
	} 
?>