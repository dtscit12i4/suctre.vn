<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?
/**
* 
*/
class ve_url1
{		
	public function post($id,$col="name")
	{
		global $root1, $str, $get;

		$result = $root1."post/".$id."-".$str->to_slug($get->post($id,$col)).".html";
		
		return $result;
	}
	
	public function product($id,$col="name")
	{
		global $root1, $str, $get;

		$result = $root1."product/".$id."-".$str->to_slug($get->product($id,$col))."-(".strtoupper($str->to_slug($get->product($id,"code"))).").html";
		
		return $result;
	}
	public function product_cat($id,$col="name")
	{
		global $root1, $str, $get;

		$result = $root1."product-cat/".$id."-".$str->to_slug($get->product_cat($id,$col))."/";
		
		return $result;
	}
}
?>