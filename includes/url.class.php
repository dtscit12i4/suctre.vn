<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?
/**
* 
*/
class ve_url
{		
	public function post($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."tin-tuc-xem/".$id."-".$str->to_slug($get->post($id,$col)).".html";
		
		return $result;
	}
	public function tuyen_dung($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."tuyen-dung-xem/".$id."-".$str->to_slug($get->post($id,$col)).".html";
		
		return $result;
	}
	public function gioi_thieu($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."gioi-thieu/".$id."-".$str->to_slug($get->post($id,$col)).".html";
		
		return $result;
	}
	public function product($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."du-an/".$id."-".$str->to_slug($get->product($id,$col)).".html";
		
		return $result;
	}
	public function product_cat($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."danh-muc-du-an/".$id."-".$str->to_slug($get->product_cat($id,$col))."/";
		
		return $result;
	}
	public function post_cat($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."tin-tuc/".$id."-".$str->to_slug($get->post_cat($id,$col))."/";
		
		return $result;
	}
	public function tuyen_dung_cat($id,$col="name")
	{
		global $root, $str, $get;

		$result = $root."tuyen-dung/".$id."-".$str->to_slug($get->post_cat($id,$col))."/";
		
		return $result;
	}
}
?>