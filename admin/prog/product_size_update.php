<?php
$note = '';
?>
<center>
<?php

	if ($txtMod == "add")
	{
        $columns = '';
        $values = '';

        $POST = $_POST;

        if($_POST['txt_length']<>0&&$_POST['txt_width']<>0&&$_POST['txt_height']<>0&&$_POST['txt_volume']=='')
        {
            $POST['txt_volume']=$_POST['txt_length']*$_POST['txt_width']*$_POST['txt_height']/1000000*1.5;
            
        }
        if($_POST['txt_length']<>0&&$_POST['txt_width']<>0&&$_POST['txt_height']<>0&&$_POST['txt_weight']=='')
        {
            $POST['txt_weight']=$_POST['txt_length']*$_POST['txt_width']*$_POST['txt_height']/1000000*0.4*2800;
            
        }
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
        $tbl_product_size      
        ($columns) 
        VALUES 
        ($values)
            ";
        $OK=$conn->query($sql);
        header('location: ?act=size_list&id='.$_POST['txt_cat']);        

	}
    
	if ($txtMod == "edit")
	{

		$id = $_POST['id'];

        $syntax = '';

        $POST = $_POST;
        
           
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
        $tbl_product_size
        SET
        $syntax
        WHERE
        id = $id
            ";
        $OK=$conn->query($sql);
        header('location: ?act=size_list&id='.$get->product_size($id,'cat')); 
        
    
	}
	
	get_form($getMod,$id,$note);
?>
</center>

<?
function get_form($getMod,$id,$note)
{
	global $conn,$get,$user_coder,$tbl_product_material, $url;
	if($getMod=='edit')
	{
		$length = $get->product_size($id,'length');
        $width = $get->product_size($id,'width');
        $height = $get->product_size($id,'height');
        $info= $get->product_size($id,'info');
        $info_en = $get->product_size($id,'info_en');
        $price = $get->product_size($id,'price');
        $price_tv = $get->product_size($id,'price_tv');
        $discount = $get->product_size($id,'discount');
        $time_apply = $get->product_size($id,'time_apply');
        $material = $get->product_size($id,'material');
        $color = $get->product_size($id,'color');
        $volume = $get->product_size($id,'volume');
        $weight = $get->product_size($id,'weight');
	}
	elseif($_POST)
	{
		$length = $_POST['txt_length'];
		$width = $_POST['txt_width'];
        $height = $_POST['txt_height'];
        $info = $_POST['txt_info'];
        $info_en = $_POST['txt_info_en'];
        $price = $_POST['txt_price'];
        $price_tv = $_POST['txt_price_tv'];
        $discount = intval($_POST['txt_discount']);
        $time_apply = $_POST['txt_time_apply'];
        $material = $_POST['txt_material'];
        $color = $_POST['txt_color'];
        $volume = $_POST['txt_volume'];
        $weight = $_POST['txt_weight'];
	}
    else
    {
        $length = '';
        $width = '';
        $height = '';
        $info= '';
        $info_en = '';
        $price = '';
        $price_tv = '';
        $discount = '';
        $time_apply = '';
        $material = '';
        $color = '';
        $volume = '';
        $weight = '';
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
            <li><a href="?act=product_size">Quản lý Chất liệu đá</a></li>
            <li><?if($getMod == "add") echo "Thêm mới"; elseif($getMod == "edit") echo "Chỉnh sửa"; ?></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?=$note!=""?"<div align=center style='color:#990000;'><strong>".$note."</strong></div>":""?>
        <form name="frm_edit" id="frm_edit" action="?<?=$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
            <input type="hidden" name="id" value="<?=$id?>" />
            <input type="hidden" name="txtMod" value="<?=$getMod?>" />
            <?if($getMod=='add'){?><input type="hidden" name="txt_cat" value="<?=$_GET['cat']?>" /><?}?>
            <div class="form-group tab_update_controller">
                <input type="submit" class="btn btn-success" value="Lưu"/>
                <input type="button" class="btn btn-default" value="Xem danh sách" onclick="Forward('?act=size_list&id=<?=$get->product_size($id,'cat')?>');"/>
                
            </div>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="noidung">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kích thước :</label>
                                            <div class="col-md-8">
                                                <span style="display: block;float: left;line-height: 40px;">Dài: </span>
                                                <input style="width: 80px;float: left; margin-left: 10px;" type="number" name="txt_length" value="<?=$length?>" class="form-control">
                                                <span style="display: block;float: left; line-height: 40px;margin-left: 10px;">Rộng: </span>
                                                <input style="width: 80px;float: left; margin-left: 10px;" type="number" name="txt_width" value="<?=$width?>" class="form-control">
                                                <span style="display: block;float: left; line-height: 40px;margin-left: 10px;">Cao: </span>
                                                <input style="width: 80px;float: left; margin-left: 10px;" type="number" name="txt_height" value="<?=$height?>" class="form-control"> 
                                                <span style="display: block;width: 20px;float: left;line-height: 40px; margin-left: 10px;">cm</span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Chú thích:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_info" value="<?=$info?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Chú thích [EN]:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_info_en" value="<?=$info_en?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Giá ($):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_price" id="price" value="<?=$price?>" class="form-control text-right">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Giá (VND):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_price_tv" id="price_tv" value="<?=$price_tv?>" class="form-control text-right">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Giảm giá (%):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_discount" id="discount" value="<?=$discount?>" class="form-control text-right">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Thời gian áp dụng:</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_time_apply" id="time_apply" value="<?=$time_apply?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Chất liệu:</label>
                                            <div class="col-md-8">
                                                <select name="txt_material" class="form-control" id="">
                                                    <?
                                                        $rs = $conn->query("select * from $tbl_product_material where visibility=1");
                                                        while($row=$rs->fetch_assoc()){
                                                            ?>
                                                            <option value="<?=$row['id']?>" <?if($material==$row['id']){echo 'selected';}?>><?=$row['name']?> (<?=$row['name_en']?>)</option>
                                                            <?}
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Màu sắc:</label>
                                            <div class="col-md-8">
                                                <small><i>
                                                    Ví dụ:<br/>
                                                    Trắng Xám - White Grey - 100<br/>
                                                    Đen - Black - 105
                                                </i></small><br/><br/>
                                                <textarea name="txt_color" class="form-control" id="" cols="30" rows="10"><?=$color?></textarea>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Thể tích (m3):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_volume" value="<?=$volume?>" class="form-control">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Khối lượng (kg):</label>
                                            <div class="col-md-8">
                                                <input type="text" name="txt_weight" value="<?=$weight?>" class="form-control">
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