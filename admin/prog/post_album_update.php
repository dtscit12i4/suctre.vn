<?php
$note = '';
?>
<center>
<?php

	if ($txtMod == "add")
	{
        #$str->check($_POST);
        #
        $columns = '';
        $values = '';

        // $POST = $_POST;

        if($_POST['txt_name']=='')
        {
            $note = 'Vui lòng nhập tên';
        }
        else
        {
            upload_image("../uploads/post_album/",900,600,"album");
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
            $tbl_post_album      
            ($columns) 
            VALUES 
            ($values)
                ";
            $conn->query($sql);
            header('location: ?act=post_album_list&id='.$_POST['txt_cat']);      
        }
	}
	if ($txtMod == "edit")
	{
		$id = $_POST['id'];
        
        // $POST = $_POST;
        $syntax = '';
        if($_POST['txt_name']=='')
        {
            $note = 'Vui lòng nhập tên';
        }
        else
        {
            upload_image("../uploads/post_album/",900,600,"album");
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
            $tbl_post_album
            SET
            $syntax
            WHERE
            id = $id
                ";
            $conn->query($sql);
            header('location: ?act=post_album_list&id='.$_POST['txt_cat']);  
        }
	}
	
	get_form($getMod,$id,$note);
?>
</center>

<?
function get_form($getMod,$id,$note)
{
	global $conn,$get,$user_coder,$tbl_gallery_cat, $url,$str;
	if($getMod=='edit')
	{
		$name = $get->post_album($id,'name');
		$info = $get->post_album($id,'info');
        $content = $get->post_album($id,'content');
        $cat = $get->post_album($id,'cat');
	}
	elseif($_POST)
	{
		$name = $_POST['txt_name'];
        $info = $_POST['txt_info'];
        $content = $_POST['txt_content'];
        $cat = $_POST['txt_cat'];
	}
    else
    {
        $name = '';
        $info = '';
        $content = '';
        $cat = $_GET['cat'];
    }

    if($getMod=='edit')
    {
        $cat_name = $get->post($get->post_album($id,'cat'),'name');
        $cat_url = "?act=post_album_list&id=".$get->post_album($id,'cat');
    }
    else
    {
        $cat_name = $get->post($_GET['cat'],'name');
        $cat_url = "?act=post_album_list&id=".$_GET['cat'];
    }


?>
<div class="page-title">
    <div>
        <h1><i class="fa fa-edit"></i><?if($getMod == "add") echo "Thêm mới"; elseif($getMod == "edit") echo "Chỉnh sửa"; else echo "Sao chép";?></h1>
        <p></p>
    </div>
    <div>
        <ul class="breadcrumb">
            <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="<?=$cat_url?>"><?=$cat_name?></a></li>
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
            <input type="hidden" name="txt_cat" value="<?=$cat?>" />
            <div class="form-group tab_update_controller">
                <input type="submit" class="btn btn-success" value="Lưu"/>
                <input type="button" class="btn btn-default" value="Xem danh sách" onclick="Forward('<?=$cat_url?>');"/>
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
                                                <span>Kích thước: 1200x800 pixels</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tên :</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_name" value="<?=$name?>" class="form-control">
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
                                        
                                    </div>
                                </div>
                            </div>
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