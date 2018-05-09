<?php
$note = '';
?>
<center>
<?php

   //  $max_file_size  =   6048000;
   //  $up_dir         =   "../uploads/product_cat/";
   //  $hinh   = false;

   //  if($txtMod<>''&&$_FILES['txt_thumbnail']['name']<>'')
   // {
   //      $postThumbnailName = $_FILES['txt_thumbnail']['name'];
   //      $postThumbnailType = $_FILES['txt_thumbnail']['type'];
   //      $postThumbnailTmpName = $_FILES['txt_thumbnail']['tmp_name'];
   //      $postThumbnailSize = $_FILES['txt_thumbnail']['size'];
   //      switch ($postThumbnailType)
   //      {
   //          case "image/pjpeg"  : $postThumbnailType = "jpg"; break;
   //          case "image/jpeg"   : $postThumbnailType = "jpg"; break;
   //          case "image/gif"    : $postThumbnailType = "gif"; break;
   //          case "image/x-png"  : $postThumbnailType = "png"; break;
   //          case "image/png"    : $postThumbnailType = "png"; break;
   //          default : $postThumbnailType = "unk"; break;
   //      }
   //      $file_full_name = time().".".$postThumbnailType;
   //      if ( ($postThumbnailSize > 0) && ($postThumbnailSize <= $max_file_size) )
   //          if ($postThumbnailType != "unk")
   //          {
   //                  if ( @move_uploaded_file($postThumbnailTmpName,$up_dir.$file_full_name) )
   //                  {
   //                      $hinh = true;
   //                  }
   //                  else
   //                      $error = "Unable to upload images.";
   //              }
   //          else
   //          {
   //              $error = "Wrong file format - Can not upload images.";
   //          }
   //      else
   //      {
   //          if ($file_size == 0)
   //          {
   //              $hinh   = false;
   //          }
   //          else
   //              $error = "Your image exceeds the size allowed.";
   //      }
   //  }
	if ($txtMod == "add")
	{
        $columns = '';
        $values = '';

        // $POST = $_POST;
        // if($hinh) {
        //     $POST['txt_thumbnail']=$file_full_name;
        //     $thumbnail_name_new = "productcat_".$file_full_name;
        //     img_resize($up_dir.$file_full_name,$up_dir.$thumbnail_name_new,"w=450&h=600&zc=1");
        // }
        if($_POST['txt_name']=='')
        {
            $note = 'Vui lòng nhập tên';
        }
        else
        {
            upload_image("../uploads/product_cat/",500,300,"productcat");
            foreach ($POST as $key => $value) {
                $value = $str->safe($value);
                if($key=='txtMod'|$key=='id')
                {
                    continue;
                }
                $i = substr($key,4);
                $columns .= ",".$i;

                $values .= ",'".$value."'";
            }
            $columns = substr($columns,1);
            $values = substr($values,1);
            $sql = "
            INSERT INTO
            $tbl_product_cat        
            ($columns) 
            VALUES 
            ($values)
                ";
            $conn->query($sql);
            header('location: ?act=product_cat');        
        }
	}
	if ($txtMod == "copy")
    {
        $columns = '';
        $values = '';

        // $POST = $_POST;
        // if($hinh) {
        //     $POST['txt_thumbnail']=$file_full_name;
        //     $thumbnail_name_new = "productcat_".$file_full_name;
        //     img_resize($up_dir.$file_full_name,$up_dir.$thumbnail_name_new,"w=450&h=600&zc=1");
        // }
        if($_POST['txt_name']=='')
        {
            $note = 'Vui lòng nhập tên';
        }
        else
        {
            upload_image("../uploads/product_cat/",500,300,"productcat");
            foreach ($POST as $key => $value) {
                $value = $str->safe($value);
                if($key=='txtMod'|$key=='id')
                {
                    continue;
                }
                $i = substr($key,4);
                $columns .= ",".$i;

                $values .= ",'".$value."'";
            }
            $columns = substr($columns,1);
            $values = substr($values,1);
            $sql = "
            INSERT INTO
            $tbl_product_cat        
            ($columns) 
            VALUES 
            ($values)
                ";
            $conn->query($sql);
            header('location: ?act=product_cat');        
        }
    }
    
	if ($txtMod == "edit")
	{

		$id = $_POST['id'];
        
        // $POST = $_POST;
        // if($hinh) {
        //     $POST['txt_thumbnail']=$file_full_name;
        //     $thumbnail_name_new = "productcat_".$file_full_name;
        //     img_resize($up_dir.$file_full_name,$up_dir.$thumbnail_name_new,"w=450&h=600&zc=1");
        // }

        $syntax = '';
        
        if($_POST['txt_name']=='')
        {
            $note = 'Vui lòng nhập tên';
        }
        else
        {
            upload_image("../uploads/product_cat/",500,300,"productcat");
            //================================
            foreach ($POST as $key => $value) {
                $value = $str->safe($value);
                if($key=='txtMod'|$key=='id')
                {
                    continue;
                }
                $i = substr($key,4);
                $syntax .= ",".$i ."= '".$value."'";
            }
            $syntax = substr($syntax,1);
            $sql = "
            UPDATE
            $tbl_product_cat
            SET
            $syntax
            WHERE
            id = $id
                ";
            $conn->query($sql);
            
            header('location: ?act=product_cat'); 
        }
	}
	
	get_form($getMod,$id,$note);
?>
</center>

<?
function get_form($getMod,$id,$note)
{
	global $conn,$get,$user_coder,$tbl_product_cat, $url;
	if($getMod=='edit')
	{
		$name = $get->product_cat($id,'name');
        $info = $get->product_cat($id,'info');
        $content = $get->product_cat($id,'content');
        $seo_title = $get->product_cat($id,'seo_title');
        $seo_keywords = $get->product_cat($id,'seo_keywords');
        $seo_description = $get->product_cat($id,'seo_description');
        $cat = $get->product_cat($id,'cat');
	}
    elseif($getMod=='copy')
    {
        $thumbnail = $get->product_cat($id,'thumbnail');
        $sort = $get->product_cat($id,'sort');
        $display = $get->product_cat($id,'display');
        $name = $get->product_cat($id,'name');
        $info = $get->product_cat($id,'info');
        $content = $get->product_cat($id,'content');
        $seo_title = $get->product_cat($id,'seo_title');
        $seo_keywords = $get->product_cat($id,'seo_keywords');
        $seo_description = $get->product_cat($id,'seo_description');
        $cat = $get->product_cat($id,'cat');
    }
	elseif($_POST)
	{
		$name = $_POST['txt_name'];
        $info = $_POST['txt_info'];
        $content = $_POST['txt_content'];
        $seo_title = $_POST['txt_seo_title'];
        $seo_keywords = $_POST['txt_seo_keywords'];
        $seo_description = $_POST['txt_seo_description'];
        $cat = $_POST['txt_cat'];
	}
    else
    {
        $name =  '';
        $info =  '';
        $content =  '';
        $seo_title = '';
        $seo_keywords = '';
        $seo_description = '';
        $cat = 0;
    }

?>
<div class="page-title">
    <div>
        <h1><i class="fa fa-edit"></i> <?if($getMod == "add") echo "Thêm mới"; elseif($getMod == "edit") echo "Chỉnh sửa"; else echo "Sao chép";?></h1>
        <p></p>
    </div>
    <div>
        <ul class="breadcrumb">
            <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="?act=product_cat">Quản lý Danh mục dự án</a></li>
            <li><?if($getMod == "add") echo "Thêm mới"; elseif($getMod == "edit") echo "Chỉnh sửa"; else echo "Sao chép";?></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?=$note!=""?"<div align=center style='color:#990000;'><strong>".$note."</strong></div>":""?>
        <form name="frm_edit" id="frm_edit" action="?<?=$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
            <input type="hidden" name="id" value="<?=$id?>" />
            <input type="hidden" name="txtMod" value="<?=$getMod?>" />
            <?if($getMod=='copy'){?>
            <input type="hidden" name="txt_sort" value="<?=$sort?>" />
            <input type="hidden" name="txt_thumbnail" value="<?=$thumbnail?>" />
            <input type="hidden" name="txt_display" value="<?=$display?>" />
            <?}?>
            <div class="form-group tab_update_controller">
                <input type="submit" class="btn btn-success" value="Lưu"/>
                <input type="button" class="btn btn-default" value="Xem danh sách" onclick="Forward('?act=product_cat');"/>
                <?if($getMod=='edit'){?><input type="button" class="btn btn-primary preview" value="Xem" onclick=" window.open('<?=$url->product_cat($id)?>','_blank');"/><?}?>
            </div>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
                    </li>
					<li role="presentation">
						<a href="#seo" aria-controls="tab" role="tab" data-toggle="tab">SEO</a>
					</li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="noidung">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Hình ảnh :</label>
                                            <div class="col-md-8">
                                                <input type="file" name="txt_thumbnail" value="" class="form-control">
                                                <span>Kích thước: 1500x900 pixels</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tên trang :</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_name" value="<?=$name?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nhóm:</label>
                                            <div class="col-md-8">
                                                <select name="txt_cat" class="form-control">
                                                    <option value="0">- Danh mục gốc -</option>
                                                    <?
                                                    $sql = '';
                                                    if($getMod=='edit') $sql = " and id<>'".$id."'";
                                                    $rs = $conn->query("select * from $tbl_product_cat where cat=0 $sql and visibility=1 order by sort");
                                                    while($row=$rs->fetch_assoc()){
                                                    ?>
                                                        <option <?if($cat==$row['id']){echo 'selected';}?> value="<?=$row['id']?>"><?=$row['name']?></option>
                                                    <?}?>                                                    
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                       <div class="form-group">
                                            <label class="control-label col-md-3">Chú thích :</label>
                                            <div class="col-md-8">
                                                <textarea name="txt_info" class="form-control" rows="5"><?=$info?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nội dung :</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" id="txtContent" name="txt_content" id="" rows="30"><?=$content?></textarea>
                                                <script type="text/javascript">
                                                // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                                if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                                else
                                                {
                                                    var editor = CKEDITOR.replace( 'txtContent' );
                                                    CKFinder.setupCKEditor( editor, '../ckfinder' );
                                                }
                                                </script>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="seo">
                        <div class="row">
                              <div class="col-xs-12">
                                  <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                          <label class="control-label col-md-3">Title</label>
                                          <div class="col-md-8">
                                            <input type="text" name="txt_seo_title" value="<?=$seo_title?>" class="form-control">
                                          </div>
                                          <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-md-3">Meta Description</label>
                                          <div class="col-md-8">
                                            <textarea rows="4" class="form-control" name="txt_seo_description"><?=$seo_description?></textarea>
                                          </div>
                                          <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                          <label class="control-label col-md-3">Meta Keywords</label>
                                          <div class="col-md-8">
                                            <textarea rows="4" name="txt_seo_keywords" class="form-control"><?=$seo_keywords?></textarea>
                                          </div>
                                          <div class="clearfix"></div>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?
}
?>