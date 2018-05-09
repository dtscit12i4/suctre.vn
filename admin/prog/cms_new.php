<?php
    $act = $_POST['act'];
    $txt_ten = $_POST['txt_ten'];
    $txt_hinh = $_POST['txt_hinh'];
    $txt_hinh_note = $_POST['txt_hinh_note'];
    if($_POST['txt_hien_thi']=='on'){$txt_hien_thi=1;}else{$txt_hien_thi=0;}
    if($_POST['txt_noi_bat']=='on'){$txt_noi_bat=1;}else{$txt_noi_bat=0;}

    $txt_chu_thich = $_POST['txt_chu_thich'];
    $txt_noi_dung = $_POST['txt_noi_dung'];
    $txt_date = $_POST['txt_date'];
    $txt_title = $_POST['txt_title'];
    $txt_keyword = $_POST['txt_keyword'];
    $txt_description = $_POST['txt_description'];
    $txt_tags = $_POST['txt_tags'];
    $txt_tags_new = trim($_POST['txt_tags_new']);

    $func = $_POST['func'];
    if ($_POST["func"]=="new") 
    {
    $id = $_POST["id"];
    $txt_cat = $_POST['txt_cat']; 
    }
    else 
    {
    $id = $_GET['id'];
    $txt_cat = $_GET['txt_cat'];
    } 
    include "templates/cms.php";
   
?>
<center>
<?php
	$max_file_size	=	6048000;
	$new_upload_folder = date('Y')."-".date('m');

	$up_dir_root			=	"../uploads/post_thumbnail/";
	if (!file_exists($up_dir_root."/".$new_upload_folder."/")){
		mkdir($up_dir_root."/".$new_upload_folder."/", 0777);
	}
	$up_dir			=	"../uploads/post_thumbnail/".$new_upload_folder."/";

	$OK = false;
	
	if ($func == "new")
	{
		if($rc->user_by_username($ses_user,'level_id')==1)
		{
			if($txt_tags_new<>''){
            
	            $tach1       =   explode("\n",$txt_tags_new);           
	            foreach($tach1 as $tach2)
	            {
					$new_slug = $str->to_slug($tach2);
	            	$id_exist_slug = get_sql("select id from tbl_tags where slug='".$new_slug."'");
	            	
	            	if($id_exist_slug>0)
	            	{
	            	}
	            	else{
	            		$idnew = $db->insert('tbl_tags','name,slug,display',"'".trim($tach2)."','".$new_slug."',1");
	            		$txt_tags .= ",".$idnew;
	            	}
	          	}
			}
		}
		if (empty($txt_ten))
			$error = "Vui lòng nhập tiêu đề.";
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
			$file_full_name = $str->vn_str_filter($file_name);
			if ( ($file_size > 0) && ($file_size <= $max_file_size) )
				if ($file_type != "unk")
						if ( @move_uploaded_file($_FILES['txt_hinh']['tmp_name'],$up_dir.$file_full_name) )
						{
							$OK = true;
							$hinh = true;
						}
						else
							$error = "Unable to upload images.";
				else
				{
					$error = "Wrong file format - Can not upload images.";
				}
			else
			{
				if ($file_size == 0)
				{
					$OK		= true;
					$hinh	= false;
				}
				else
					$error = "Your image exceeds the size allowed.";
			}
			// Process xong
			if ($OK)
			{
				$time = time($txt_date);
			
				$id = $db->insert("tbl_post","name,cat,info,content,time,user_id","'".$db->escape($txt_ten)."','".$txt_cat."','".$txt_chu_thich."','".$txt_noi_dung."','".time()."','".$rc->user_by_username($ses_user,'id')."'");

				if($rc->user_by_username($ses_user,'level_id')==1)
				{
					echo 'admin';
					$db->query("update tbl_post set display='".$txt_hien_thi."',highlight='".$txt_noi_bat."',seo_title='".$txt_title."',seo_description='".$txt_description."',seo_keyword='".$txt_keyword."',tags='".$txt_tags."',user_id='".$rc->user_by_username($ses_user,'id')."' where id='".$id."'");
				}
				
				if ($hinh)
				{
                     $txt_hinh_2	= "600x314_".$file_full_name;
                   	 img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_2,"w=600&h=314&zc=1");
					 $db->update("tbl_post","thumbnail,thumbnail_folder","'".$file_full_name."','".$new_upload_folder."'","id = '".$id."'");
                    
				}
				
				admin_load("Cập nhật thành công...","?act=cms_list");
			}
		}
	}
	else
	{
		$txt_ten		= '';
        $txt_hinh		= '';
		$txt_chu_thich	= '';
		$txt_hinh_note	= '';
		$txt_noi_dung	= '';
        $txt_hien_thi	= '';
		$txt_noi_bat	= 0;
		$txt_hien_thi	= 1;
        $txt_title    = "";
        $txt_keyword    = "";
        $txt_description    = "";
	}
	
	if (!$OK)
		template_edit("?act=cms_new", "new", 0 ,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_hinh_note,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_date,$error,$txt_title,$txt_keyword,$txt_description,$txt_tags,$txt_tags_new)
?>
</center>