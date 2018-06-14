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
            upload_image("../uploads/product/",500,300,"product");
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
            $tbl_product       
            ($columns) 
            VALUES 
            ($values)
                ";
            $conn->query($sql);
            header('location: ?act=product_list&id='.$_POST['txt_cat']);      
        }
	}
	if ($txtMod == "copy")
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
            upload_image("../uploads/product/",500,300,"product");
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
            $tbl_product       
            ($columns) 
            VALUES 
            ($values)
                ";
            $conn->query($sql);
            header('location: ?act=product_list&id='.$_POST['txt_cat']);      
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
                    
                upload_image("../uploads/product/",500,300,"product");
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
                $tbl_product
                SET
                $syntax
                WHERE
                id = $id
                    ";
                $conn->query($sql);
                header('location: ?act=product_list&id='.$_POST['txt_cat']); 
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
		$name = $get->product($id,'name');
        $info = $get->product($id,'info');
        $content = $get->product($id,'content');
        $seo_title = $get->product($id,'seo_title');
        $seo_keywords = $get->product($id,'seo_keywords');
        $seo_description = $get->product($id,'seo_description');
        $cat = $get->product($id,'cat');
	}
    elseif($getMod=='copy')
    {
        $thumbnail = $get->product($id,'thumbnail');
        $sort = $get->product($id,'sort');
        $display = $get->product($id,'display');
        $hot_item = $get->product($id,'hot_item');
        $name = $get->product($id,'name');
        $info = $get->product($id,'info');
        $content = $get->product($id,'content');
        $seo_title = $get->product($id,'seo_title');
        $seo_keywords = $get->product($id,'seo_keywords');
        $seo_description = $get->product($id,'seo_description');
        $cat = $get->product($id,'cat');
    }
	elseif($_POST)
	{
		$name = $_POST['txt_name'];
        $gioithieu = $_POST['txt_content'];
        $info = $_POST['txt_info'];
        $seo_title = $_POST['txt_seo_title'];
        $seo_keywords = $_POST['txt_seo_keywords'];
        $seo_description = $_POST['txt_seo_description'];
        $cat = $_POST['txt_cat'];
	}
    else
    {
        $name = '';
        $info = '';
        $content = '';
        $seo_title = '';
        $seo_keywords = '';
        $seo_description = '';
        $cat = $_GET['cat'];
    }

    if($getMod=='edit')
    {
        $cat_name = $get->product_cat($get->product($id,'cat'),'name');
        $cat_url = "?act=product_list&id=".$get->product($id,'cat');
    }
    elseif($getMod=='copy')
    {
        $cat_name = $get->product_cat($get->product($id,'cat'),'name');
        $cat_url = "?act=product_list&id=".$get->product($id,'cat');
    }
    else
    {
        $cat_name = $get->product_cat($_GET['cat'],'name');
        $cat_url = "?act=product_list&id=".$_GET['cat'];
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
            <input type="hidden" name="txt_hot_item" value="<?=$hot_item?>" />
            <input type="hidden" name="txt_display" value="<?=$display?>" />
            <?}?>
            <div class="form-group tab_update_controller">
                <input type="submit" class="btn btn-success" value="Lưu"/>
                <input type="button" class="btn btn-default" value="Xem danh sách" onclick="Forward('<?=$cat_url?>');"/>
                <?if($getMod=='edit'){?>
                <input type="button" class="btn btn-primary preview" value="Xem" onclick=" window.open('<?=$url->product($id,"name")?>','_blank');"/><?}?>
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
                                                    $rs = $conn->query("select * from $tbl_product_cat where cat=0 and visibility=1 order by sort");
                                                    while($row=$rs->fetch_assoc()){
                                                    ?>
                                                        <option <?if($cat==$row['id']){echo 'selected';}?> value="<?=$row['id']?>"><?=$row['name']?></option>

                                                        <?
                                                        $rs2 = $conn->query("select * from $tbl_product_cat where cat='".$row['id']."' and visibility=1 order by sort");
                                                        while($row2=$rs2->fetch_assoc()){
                                                        ?>
                                                            <option <?if($cat==$row2['id']){echo 'selected';}?> value="<?=$row2['id']?>">---------- <?=$row2['name']?></option>
                                                        <?}
                                                    }?>                                                    
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
                                                <textarea class="form-control" id="txt_content" name="txt_content" id="" rows="30"><?=$content?></textarea>
                                                <script type="text/javascript">
                                                // This is a check for the CKEditor class. If not defined, the paths must be checked.
                                                if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
                                                else
                                                {
                                                    var editor = CKEDITOR.replace( 'txt_content' );
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