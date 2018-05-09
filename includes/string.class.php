<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?
/**
* 
*/
class ve_string
{	
	// make safe string before process
	public function safe($str)
	{
		$str = trim(htmlspecialchars($str));
		$str = str_replace("'", "\'", $str);
		$str = str_replace('"', '\"', $str);
		return $str;
	}

	// check string, post, request, get, session ...
	public function check($str) {
	  echo '<pre>';
	  print_r($str);
	  echo '</pre>';
	 // die();
	}

	public function to_slug($str) {
	    $str = trim(mb_strtolower(self::vn_str_filter($str)));
	    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
	    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
	    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
	    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
	    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
	    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
	    $str = preg_replace('/(đ)/', 'd', $str);
	    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
	    $str = preg_replace('/([\s]+)/', '-', $str);
	    $str = str_replace('---', '-', $str);
	    $str = str_replace('--', '-', $str);
	    $src	=	array ( "?", "." , "," , "\"", "'", ":", "%", "/", "&");
	    for ($i = 0; $i < count($src); $i++)
			$str	=	str_replace($src[$i],'',$str);
	    return $str;
	}

	public function vn_str_filter ($str){

	       $unicode = array(

	           'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

	           'd'=>'đ',

	           'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

	           'i'=>'í|ì|ỉ|ĩ|ị',

	           'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

	           'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

	           'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

	           'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

	           'D'=>'Đ',

	           'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

	           'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

	           'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

	           'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

	           'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

	       );

	      foreach($unicode as $nonUnicode=>$uni){

	           $str = preg_replace("/($uni)/i", $nonUnicode, $str);

	      }

	       return $str;

	   }
	   public function crop($text,$qty)
		{
			$txt			=	$text;
			$arr_replace	=	array("<p>","</p>","<br>","<br />","  ");
			$text			=	str_replace($arr_replace,"",$text);
			$dem			=	0;
			for ( $i=0 ; $i < strlen($text) ; $i++ )
			{
				if ($text[$i] == ' ') $dem++;
				if ($dem == $qty)	break;
			}
			$text		=	substr($text,0,$i);
			if ($i	<	strlen($txt))
				$text .= " ...";
			return	$text;
		}
	}
?>