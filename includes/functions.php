<?if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');?>
<?
function active_menu($module,$id)
      {
      	global $get;
        if($module=='product_cat')
        {
          $cat = $id;
        }
        if($module=='product')
        {
          $cat = $get->product($id,'cat');
        }
        if($module=='tin_tuc_xem')
        {
          $cat = $get->post($id,'cat');
        }
        if(isset($cat) && ($cat)) return $cat; else return 0;
      }
function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if($qs['vi']){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
function	kt_email_dung($txt_email)
{
	return (!preg_match("/[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+/", $txt_email));	
}
function	kt_user_dung($txt_username)
{
	return (!preg_match("/(^[a-z]+([a-z\_0-9\-]*))$/", $txt_username));
}
// admin_load
function	admin_load($thong_bao,$url)
{
?>
<center>
	<b><font size="2"><?=$thong_bao?></font></b>
	<br /><img vspace="3" src="images/83.gif" />
	<br>Xin đợi vài giây hoặc bấm <b><a href="<?=$url?>">vào đây</a></b> để tiếp tục...
</center>
<head>
	<meta http-equiv="Refresh" content="1; URL=<?=$url?>">
</head>
<?php
	die();
}
///////
function check_code_product($string)
{
	global $str,$conn,$tbl_product;
	$string = $str->safe($string);
	$check=$conn->query("select id from $tbl_product where code='".$string."'");
	if($check->num_rows > 0){
		return false;
	}
	return true;
}
function page($sql,$perpage="1")
{
    global $conn, $page,$pages;
    
    $rs_all=$conn->query($sql);
    $sum = $rs_all->num_rows;
    $pages    = ($sum-($sum%$perpage))/$perpage;
    if ($sum % $perpage <> 0)
    {
      $pages = $pages + 1;
    }
    $page   = ($page==0)?1:(($page>$pages)?$pages:$page);
    $min    =   abs($page-1) * $perpage;
    $max    =   $perpage;
   
    return  $sql." limit ".$min.", ".$max;
}
function count_item($id,$table,$title){
	global $conn;
	$rs=$conn->query("select id from $table where visibility=1 and cat='".$id."'");
	echo '<span style="color:#333;font-style: italic;font-size: 12px;"> ( '.$rs->num_rows." ".$title." )</span>";
}
function count_product($id){
	global $conn,$tbl_product,$tbl_product_cat,$get;
	if($get->product_cat($id,'cat')==0)
	{
		$rs=$conn->query("select a.id from $tbl_product a, $tbl_product_cat b where a.cat=b.id and a.visibility=1 and b.visibility=1 and (b.cat='".$id."' or b.id='".$id."')");
	}
	else
	{
		$rs=$conn->query("select id from $tbl_product where visibility=1 and cat='".$id."'");
	}
	return $rs->num_rows;
}
function count_post($id){
	global $conn,$tbl_post,$tbl_post_cat,$get;
	if($get->post_cat($id,'cat')==0)
	{
		$rs=$conn->query("select a.id from $tbl_post a, $tbl_post_cat b where a.cat=b.id and a.visibility=1 and b.visibility=1 and (b.cat='".$id."' or b.id='".$id."')");
	}
	else
	{
		$rs=$conn->query("select id from $tbl_post where visibility=1 and cat='".$id."'");
	}
	return $rs->num_rows;
}
function upload_image($path,$width,$height,$prefix_image){
	global $POST,$txtMod,$act;
	$POST = $_POST;
	if($act == 'post_item_update'){
		if($_POST['txt_time']) {
			$POST['txt_time']=strtotime($_POST['txt_time']);
		}
		else {
			$POST['txt_time']=time();
		}
	}
	else {
		$POST['txt_time']=time();
	}
	 $max_file_size  =   6048000;
    $up_dir         =   $path;
    $hinh   = false;

    if($txtMod<>''&&$_FILES['txt_thumbnail']['name']<>'')
   {
        $postThumbnailName = $_FILES['txt_thumbnail']['name'];
        $postThumbnailType = $_FILES['txt_thumbnail']['type'];
        $postThumbnailTmpName = $_FILES['txt_thumbnail']['tmp_name'];
        $postThumbnailSize = $_FILES['txt_thumbnail']['size'];
        switch ($postThumbnailType)
        {
            case "image/pjpeg"  : $postThumbnailType = "jpg"; break;
            case "image/jpeg"   : $postThumbnailType = "jpg"; break;
            case "image/gif"    : $postThumbnailType = "gif"; break;
            case "image/x-png"  : $postThumbnailType = "png"; break;
            case "image/png"    : $postThumbnailType = "png"; break;
            default : $postThumbnailType = "unk"; break;
        }
        $file_full_name = time().".".$postThumbnailType;
        if ( ($postThumbnailSize > 0) && ($postThumbnailSize <= $max_file_size) )
            if ($postThumbnailType != "unk")
            {
                    if ( @move_uploaded_file($postThumbnailTmpName,$up_dir.$file_full_name) )
                    {
                        $hinh = true;
                    }
                    else
                        $error = "Unable to upload images.";
                }
            else
            {
                $error = "Wrong file format - Can not upload images.";
            }
        else
        {
            if ($file_size == 0)
            {
                $hinh   = false;
            }
            else
                $error = "Your image exceeds the size allowed.";
        }
    }
    if($hinh) {
            $POST['txt_thumbnail']=$file_full_name;
            $thumbnail_name_new = $prefix_image."_".$file_full_name;
            img_resize($up_dir.$file_full_name,$up_dir.$thumbnail_name_new,"w=".$width."&h=".$height."&zc=1");
        }

}
// resize hình ảnh bất kỳ
function img_resize($src,$dis,$par)
{
 	require_once('../lib_php/phpthumb/phpthumb.class.php');
 	$phpThumb = new phpThumb();
 	$phpThumb->src = $src;
		$r = explode("&",$par);
		for ($i = 0; $i <= count($r); $i++)
		{
			if ($r[$i] != "")
			{
				$q = explode("=",$r[$i]);
				if ($q[0] == 'h') 
					$phpThumb->h = $q[1];
				if ($q[0] == 'w') 
					$phpThumb->w = $q[1];
					
				if ($q[0] == 'zc')
				{
					$phpThumb->zc = $q[1];
				}
				
				if ($q[0] == 'fltr[]')
				{
					$phpThumb->fltr[] = $q[1];
				}
			}
		}
	$phpThumb->q = 100;
	$phpThumb->config_output_format = 'png';
	$phpThumb->config_error_die_on_error = true;
	if ($phpThumb->GenerateThumbnail())
	{
		$phpThumb->RenderToFile($dis);
  	}
  	else
	{
  	}
}
function redirect($url)
{
	if (headers_sent()) 
	{
    	die("Trình duyệt không tự động chuyển hướng, vui lòng <a href='".$url."'> bấm vào đây</a>");
	}
	else
	{
	    exit(header("Location: ".$url));
	}
}

function isAjaxRequest(){
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
		return true;
	return false;
}

function count_online(){
	global $conn;
	$time = 600; // 10 phut
	$ssid = session_id();
	date_default_timezone_set("Asia/Bangkok");
	// xoa het han
	$sql = "delete from tbl_tgp_online where time<".(time()-$time);
	$conn->query($sql);
	//
	$sql = "select id,session_id from tbl_tgp_online order by id desc";
	$q = $conn->query($sql);
	$result['dangxem'] = $q->num_rows;
	$rows = result_array($q);
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	if($i<$result['dangxem']){
		$sql = "update tbl_tgp_online set time='".time()."' where session_id='".$ssid."'";
		$conn->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into tbl_tgp_online (session_id, time) values ('".$ssid."', '".time()."')";
		$conn->query($sql);
		$result['daxem'] = $conn->insert_id;
		$result['dangxem']++;
	}
	
	$is_add = 0;
	$q = $conn->query("select * from tbl_tgp_counter where st_ip='".$_SERVER['REMOTE_ADDR']."' and st_week = '".date("W")."' and st_day = '".date("d")."' order by st_time desc");
	if($q->num_rows == 0){
			$is_add = 1;
	}else{
		$rs = $q->fetch_array();
		if($rs['st_time']+300 < time()){
			$is_add = 1;
		}
	}
	if($is_add){
		$sql = "insert into tbl_tgp_counter(st_time,st_week,st_month,st_day,st_year,st_ip,st_url) value(".time().",".date("W").",".date("m").",".date("d").",".date("Y").",'".$_SERVER['REMOTE_ADDR']."','".getCurrentPageURL()."')";
		$conn->query($sql);
	}	

		$sql = "select * from tbl_tgp_counter where st_year = '".date("Y")."' and st_month = '".((date("m")))."' and   st_day = '".(date("d")-1)."'";
		
		$q0 = $conn->query($sql);
		$statistics['yesterday'] = $q0->num_rows;
		
		$sql = "select * from tbl_tgp_counter where st_year = '".date("Y")."' and st_month = '".((date("m")))."' and   st_day = '".date("d")."'";
		
		$q1 = $conn->query($sql);
		$statistics['today'] = $q1->num_rows;
		
		
		
		$sql = "select * from tbl_tgp_counter where st_year = '".date("Y")."' and st_month = '".date("m")."' and st_week = '".date("W")."'";
		
		$q2 = $conn->query($sql);
		$statistics['week'] = $q2->num_rows;
		$sql = "select * from tbl_tgp_counter where st_year = '".date("Y")."' and st_week = '".(date("W")-1)."'";
		$q3 = $conn->query($sql);
		
		$statistics['last_week'] = $q3->num_rows;
		$sql = "select * from tbl_tgp_counter where st_year = '".date("Y")."' and st_month = '".date("m")."'";
		$q4 = $conn->query($sql);
		$statistics['month'] = $q4->num_rows;
		$sql = "select * from tbl_tgp_counter where st_year = '".date("Y")."' and st_month = '".(date("m")-1)."'";
		
		$q5 = $conn->query($sql);
		$statistics['last_month'] = $q5->num_rows;
		
		$sql = $sql = "select * from tbl_tgp_counter";
		$q6 = $conn->query($sql);
		$statistics['all'] = $q6->num_rows;
		
		$result['advance'] = $statistics;
		
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}

function showpage($currentPage, $maxPage, $path = '') {
	if ($maxPage <= 1)
	{
		return;
	}
	
	
	//$suffix = '/tinhve.html';
    $suffix = '/';
	
	$nav = array(
		// bao nhiêu trang bên trái currentPage
		'left'	=>	2,
		// bao nhiêu trang bên phải currentPage
		'right'	=>	2,
	);
	
	// nếu maxPage < currentPage thì cho currentPage = maxPage
	if ($maxPage < $currentPage) {
		$currentPage = $maxPage;
	}
	
	// số trang hiển thị
	$max = $nav['left'] + $nav['right'];
	
	// phân tích cách hiển thị
	if ($max >= $maxPage) {
		$start = 1;
		$end = $maxPage;
	}
	elseif ($currentPage - $nav['left'] <= 0) {
		$start = 1;
		$end = $max + 1;
	}
	elseif (($right = $maxPage - ($currentPage + $nav['right'])) <= 0) {
		$start = $maxPage - $max;
		$end = $maxPage;
	}
	else {
		$start = $currentPage - $nav['left'];
		if ($start == 2) {
			$start = 1;
		}
		
		$end = $start + $max;
		if ($end == $maxPage - 1) {
			++$end;
		}
	}
	
	$navig = '<div class="block-paging">';
	if ($currentPage >= 2) {
		if ($currentPage >= $nav['left']) {
			if ($currentPage - $nav['left'] > 2 && $max < $maxPage) {
				// thêm nút "First"
				$navig .= '<a href="'.$path.'1'.$suffix.'">1</a>';
				$navig .= '<b>...</b>';
			}
		}
		// thêm nút "«"
		$navig .= '<a href="'.$path.($currentPage - 1).$suffix.'">«</a>';
	}

	for ($i=$start;$i<=$end;$i++) {
		// trang hiện tại
		if ($i == $currentPage) {
			$navig .= '<span class="current_page">'.$i.'</span>';
		}
		// trang khác
		else {
			$pg_link = $path.$i;
			$navig .= '<a href="'.$pg_link.$suffix.'">'.$i.'</a>';
		}
	}
	
	if ($currentPage <= $maxPage - 1) {
		// thêm nút "»"
		$navig .= '<a href="'.$path.($currentPage + 1).$suffix.'">»</a>';
		
		if ($currentPage + $nav['right'] < $maxPage - 1 && $max + 1 < $maxPage) {
			// thêm nút "Last"
			$navig .= '<span class="current_page">...</span>';
			$navig .= '<a href="'.$path.$maxPage.$suffix.'">'.$maxPage.'</a>';
		}
	}
	$navig .= '</div>';
	
	// hiển thị kết quả
	echo $navig;
}

?>