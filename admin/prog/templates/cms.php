<div class="page-title">
  <div>
    <h1><i class="fa fa-edit"></i> <?=($_GET['act'] == "cms_new") ? "Quản lý thêm bài viết" : "Quản lý sửa bài viết"?></h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li>Quản lý nội dung</li>
      <li><?=($_GET['act'] == "cms_new") ? "thêm bài viết" : "sửa bài viết"?></li>
    </ul>
  </div>
</div>

<?
function	template_edit($url,$func,$id,$txt_cat,$txt_ten,$txt_chu_thich,$txt_hinh,$txt_hinh_note,$txt_noi_dung,$txt_hien_thi,$txt_noi_bat,$txt_date,$error,$txt_title,$txt_keyword,$txt_description,$txt_tags,$txt_tags_new)
{
global $db, $rc, $root,$ses_user;
$thumbnail_folder = $rc->post($id,'thumbnail_folder');
$thumbnail_name = $rc->post($id,'thumbnail');
$thumbnail_url = $root."uploads/post_thumbnail/".$thumbnail_folder."/".$thumbnail_name;
$tags_name = get_sql("select name from tbl_tags where id='".$txt_tags."'");

?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-text-input").tokenInput("json_tags.php", {            
                minChars: 3,
                searchDelay: 200,
	                prePopulate: [
	                <?
	                if($txt_tags!=''){

		                $tach1       =   explode(",",$txt_tags);
		                $count=0;
			                foreach($tach1 as $tach2)
			                {
			                	$count++;
								$rs_tags = $db->select("tbl_tags","id='".$tach2."'");
								$row_tags = $db->fetch($rs_tags);
								$tag_name = trim($row_tags['name']);
								if($count!=count($tach1)){$suffix = ',';}else{$suffix="";}
				                
			                    echo '{id:'.$tach2.', name: "'.$tag_name.'"}'.$suffix."\n";			                  	
			              	}
		              	}
	              	?>
	              	]
            });
    });
</script>
<div class="row">
	<div class="col-md-12">
		<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
		<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" />
		<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
		<input type="hidden" name="txt_cat" value="<?=$txt_cat?>" />
		<input type="hidden" name="id" value="<?=$id?>" />
		<input type="hidden" name="func" value="<?=$func?>" />
		<div class="form-group">
			<input type="submit" class="btn btn-success" name="submit" value="Lưu"/>
			<input type="button" class="btn btn-default" name="submit" value="Xem danh sách" onclick="Forward('?act=cms_list');"/>
		</div>
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#noidung" aria-controls="home" role="tab" data-toggle="tab">Nội dung</a>
				</li>

		        <?
				if($rc->user_by_username($ses_user,'level_id')==1)
				{
				?>
				<li role="presentation">
					<a href="#seo" aria-controls="tab" role="tab" data-toggle="tab">SEO</a>
				</li>
				<?}?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="noidung">
					<div class="row">
						<div class="col-xs-12">
						    <div class="card">
						      <div class="card-body">

						        <div class="form-group">
							            <label class="control-label col-md-3">Tiêu đề :</label>
							            <div class="col-md-8">
							            	<input type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control">
							            </div>
							            <div class="clearfix"></div>
							    </div>
						        <div class="form-group">
						            <label class="control-label col-md-3">Sơ lược bài viết :</label>
						            <div class="col-md-8">
						            	<textarea rows="5" name="txt_chu_thich" class="form-control"><?=$txt_chu_thich?></textarea>
						            </div>
						            <div class="clearfix"></div>
						        </div>
						        <div class="form-group">
						            <label class="control-label col-md-3">Nhóm :</label>
						            <div class="col-md-8">
						            	<select name="txt_cat" id="" class="form-control">
						            	<?
						            	$rs = $db->select("tbl_category","visibility=0","order by id");
						            	while($row=$db->fetch($rs)){
						            	?>
						            		<option value="<?=$row['id']?>" <?if($row['id']==$txt_cat){echo 'selected';}?>><?=$row['name']?></option>
						            	<?}?>
						            	</select>
						            </div>
						            <div class="clearfix"></div>
						        </div>

						      	<div class="col-xs-12 col-md-6">
							        <div class="form-group">
							            <label class="control-label col-md-3">Hình ảnh :</label>
							            <div class="col-md-8">
							            	<input type="file" name="txt_hinh" value="" class="form-control">
							           		<span>Kích thước chuẩn: 1200*628 px</span><br/>
							           		<?if($func=='update'){?>
							           		<img src="<?=$thumbnail_url?>" class="img-responsive" />
							           		<?}?>
							            </div>
							            <div class="clearfix"></div>
							        </div>
						        </div>
						        <div class="col-xs-12 col-md-6">
							        <?
									if($rc->user_by_username($ses_user,'level_id')==1)
									{
									?>
						        	<div class="form-group">
							            <div class="animated-checkbox">
							                <label>
							                	<input type="checkbox" name="txt_hien_thi" <?=(!isset($txt_hien_thi) || $txt_hien_thi==1)?'checked="checked"':''?>/><span class="label-text">Hiển thị</span>
							                </label>
							                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							                <label>
							                	<input type="checkbox" name="txt_noi_bat" <?=(!isset($txt_noi_bat) || $txt_noi_bat==1)?'checked="checked"':''?>/><span class="label-text">Nổi bật</span>
							                </label>
						              	</div>
							        </div>
							        <div class="form-group">
							            <label class="control-label col-md-3">Ngày đăng :</label>
							            <div class="col-md-8">
							            	<input type="text" name="txt_date" value="<?=$txt_date?>" class="form-control">
							            </div>
							            <div class="clearfix"></div>
							        </div>
							        <?}?>
						        </div>
						        <div class="form-group">
						            <label class="control-label col-md-12">Nội dung :</label>
						            <div class="col-md-12">
						            	<textarea class="form-control" id="txt_noi_dung" name="txt_noi_dung" id="" rows="30" cols="80"><?=$txt_noi_dung?></textarea>
						            	<script type="text/javascript">
							            // This is a check for the CKEditor class. If not defined, the paths must be checked.
							            if ( typeof CKEDITOR == 'undefined' ){document.write('') ;}
							            else
							            {
							                var editor = CKEDITOR.replace( 'txt_noi_dung' );
							                CKFinder.setupCKEditor( editor, '../ckfinder' );
							            }
							            </script>
						            </div>
						            <div class="clearfix"></div>
						        </div>


								<?
								if($rc->user_by_username($ses_user,'level_id')==1)
								{
								?>
						        <div class="form-group">
							            <label class="control-label col-md-3">Tags :<br/>
							            <a href="?act=tags_list" target="_blank"><b>Danh sách Tags</b></a><br/>
							            <a href="?act=tags_new" target="_blank"><b>Thêm tag mới</b></a><br/>
							            </label>
							            <div class="col-md-8">
							            	<input type="text" id="my-text-input" name="txt_tags" value="<?=$txt_tags?>" class="form-control">
							            </div>
							            <div class="clearfix"></div>
							    </div>
						        <div class="form-group">
						            <label class="control-label col-md-3">Thêm tag mới :</label>
						            <div class="col-md-8">
						            	<small>Nhập mỗi tag mới theo từng dòng</small>
						            	<textarea rows="5" name="txt_tags_new" class="form-control"><?=$txt_tags_new?></textarea>
						            </div>
						            <div class="clearfix"></div>
						        </div>
						        <?}?>
						      </div>
						    </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div role="tabpanel" class="tab-pane" id="seo">
					<?php
						include "seo.php";
					?>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?
}
function	show_cat($name,$id)
{
	global $db;
	
$r2 = $db->select("tgp_cat","_cms = 1","order by thu_tu asc");
?>
<select name="<?=$name?>" class="inputbox" style="width:50%;">
<?php
while ($row2 = $db->fetch($r2))
{
	echo "<optgroup label='".$row2["ten"]."'>";
	$r	=	$db->select("tgp_cms_menu","cat = '".$row2["id"]."'","order by thu_tu asc");
	while ($row = $db->fetch($r))
	{
		echo "<option value='".$row["id"]."'";
		if ($id == $row["id"]) echo " selected ";
		echo ">".$row["ten"]."</option>";
	}
	echo "</optgroup>";
}
?>
</select>
<?php
}
?>
<script type="text/javascript">
    $().ready(function(){
        $(".tab-category li a").click(function(){
            $(".tab-category li").removeClass("active");
            $id = $(this).attr("href");
            $(this).parent().addClass("active");
            $(".tab-category .tab").fadeOut(function(){
                $(".tab-category .tab").removeClass("active");
                $(".tab-category .tab"+$id).fadeIn().addClass("active");
                
            })
            return false;
        })
    })
</script>

<style>
.tottip{
    position: relative;
}
.tottip:hover .hover_tottip{
    display: block;
}
.hover_tottip{
    position: absolute;
    bottom: 100%;
    right:100px;
    background: #555;
    color:#fff;
    display: none;
    padding: 4px 10px;
}
</style>