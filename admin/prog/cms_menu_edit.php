<?php
	$id = $_GET['id'];
    $txt_cat = $_POST['txt_cat'];
    $txt_ten = $_POST['txt_ten'];
    $txt_info = $_POST['txt_info'];
    $txt_hien_thi = isset($_POST['txt_hien_thi']) ? 1 : 0;
    $txt_noi_bat = isset($_POST['txt_noi_bat']) ? 1 : 0;

    $txt_title = $_POST['txt_title'];
    $txt_keyword = $_POST['txt_keyword'];
    $txt_description = $_POST['txt_description'];

    if ($_POST["func"]=="update") 
    {
        $id = $_POST["id"];
    }
    else 
    {
        $id = $_GET['id'];
    }
    include "templates/cms_menu.php";
	if (empty($func)) $func = $_POST['func'];
	$id = $id+0;
	//	Kiểm tra sự tồn tại của ID
	$r	= $db->select("tbl_category","id = '".$id."'");
	if ($db->num_rows($r) == 0)
		admin_load("Không tồn tại mục này.","?act=cms_manager");
?>
<center>
<?php
	$OK = false;
	$max_file_size	=	6048000;
	$up_dir			=	"../uploads/cms_menu/";
	if ($func == "update")
	{
		$id = $_POST['id'];
		if (empty($txt_ten))
		{
			$error = "Bạn chưa nhập tên mục.";
		}
		else
		{
			// kiểm tra file uploads.
			$file_type = $_FILES['txt_hinh']['type'];
			$file_name = $_FILES['txt_hinh']['name'];
			$file_size = $_FILES['txt_hinh']['size'];
			switch ($file_type)
			{
				case "image/pjpeg"	: $file_type = "jpg"; break;
				case "image/jpeg"	: $file_type = "jpg"; break;
				case "image/gif" 	: $file_type = "gif"; break;
				case "image/x-png" 	: $file_type = "png"; break;
                case "image/png" 	: $file_type = "png"; break;
				default : $file_type = "unk"; break;
			}
			$time = time();
			$file_full_name = $time.".".$file_type;
			if ( ($file_size > 0) && ($file_size <= $max_file_size) )
			{
				if ($file_type != "unk")
				{
					if ( @move_uploaded_file($_FILES['txt_hinh']['tmp_name'],$up_dir.$file_full_name) )
					{
						$OK = true;
						$hinh = true;
					}
					else
					{
						$error = "Unable to upload images.";
					}
				}
				else
				{
					$error = "Wrong file format - Can not upload images.";
				}
			}
			else
			{
				if ($file_size == 0)
				{
					$OK		= true;
					$hinh	= false;
				}
				else
				{
					$error = "Your image exceeds the size allowed.";
				}
			}

			if ($OK)
			{
				$db->query("update tbl_category set name = '".$db->escape($txt_ten)."', display = '".($txt_hien_thi+0)."', info = '".$txt_info."', seo_title = '".($txt_title)."', seo_description = '".($txt_description)."', seo_keyword = '".($txt_keyword)."' where id = '".$id."'");
				
				if ($hinh)
				{
					$db->update("tbl_category","hinh",$file_full_name," id = '".$id."'");  
				}
				admin_load("Cập nhật thành công.","?act=cms_manager");
				$OK = true;
			}
		}
	}
	else
	{
		$r	= $db->select("tbl_category","id = '".$id."'");
		while ($row = $db->fetch($r))
		{
			$txt_ten		=	$row["name"];
			$txt_cat		=	$row["cat"];
			$txt_info		=	$row["info"];
			$txt_hien_thi	=	$row["display"];

			$txt_title    = $row["seo_title"];
            $txt_keyword    = $row["seo_keyword"];
            $txt_description    = $row["seo_description"];
		}
	}
	
	if (!$OK)
		template_edit("?act=cms_menu_edit&id=".$id,"update",$id,$txt_cat,$txt_ten,$txt_hien_thi,$txt_info,$txt_noi_bat,$txt_title,$txt_keyword,$txt_description,$error);
?>
</center>