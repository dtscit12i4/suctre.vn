<?php
	//	Kiểm tra sự tồn tại của ID
    $func = $_POST['func'];
    if ($_POST["func"]=="del") $id = $_POST["id"]; else $id = $_GET['id'];
    $tik = $_POST['tik'];
    $page = $_GET['page'];
	
		
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$db->query("update tbl_post set visibility = 1 where id='".$tik[$i]."'");
		}
		admin_load("Đã xóa các Bài viết đã chọn.","?act=cms_list&id=".$id);
		die();
	}
	$cat_name = get_sql("select name from tbl_category where id=".$id);
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý bài viết</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
      <li><a href="?act=cms_manager">Quản lý nội dung</a></li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý bài viết</h3>

			<div class="table-responsive">
				<form action="?act=cms_list&id=<?=$_GET['id']?>" id="frm_sanpham" enctype="multipart/form-data" method="post">


					<a href="?act=cms_new&txt_cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
								<?if($rc->user_by_username($ses_user,'level_id')==1){?>
					<button style="float:right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button><?}?>
						<p></p>
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$_GET['id']?>" />
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Hình</th>
								<th style="text-align:center;">Tên</th>
								<th style="text-align:center;">Lượt xem</th>
								<th style="text-align:center;">Xem trước</th>
								<?if($rc->user_by_username($ses_user,'level_id')==1){?>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Nổi bật</th>
								<th style="text-align:center;">Khóa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
								<?}?>
								<th style="text-align:center;">Sửa</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$page		=	$page + 0;
								$perpage	=	20;
								if($rc->user_by_username($ses_user,'level_id')==1)
								{
									if($id<>'')
									{
										$r_all		=	$db->select("tbl_post","visibility=0 and cat = '".$id."'");
									}
									else
									{
										$r_all		=	$db->select("tbl_post","visibility=0");									
									}
								}
								else
								{
									if($id<>'')
									{
										$r_all		=	$db->select("tbl_post","visibility=0 and user_id='".$rc->user_by_username($ses_user,'id')."' and cat = '".$id."'");
									}
									else
									{
										$r_all		=	$db->select("tbl_post","visibility=0 and user_id='".$rc->user_by_username($ses_user,'id')."'");									
									}
								}
								$sum		=	$db->num_rows($r_all);
								$pages		=	($sum-($sum%$perpage))/$perpage;
								if ($sum % $perpage <> 0 )	$pages = $pages+1;
								$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
								$min 		= 	abs($page-1) * $perpage;
								$max 		= 	$perpage;

								$count	=	$min;
								if($rc->user_by_username($ses_user,'level_id')==1)
								{
									if($id<>'')
									{
										$r	=$db->select("tbl_post","visibility=0 and cat = '".$id."'","order by id desc, time desc limit $min, $max");
									}
									else
									{
										$r	=$db->select("tbl_post","visibility=0","order by id desc, time desc limit $min, $max");								
									}
								}
								else
								{
									if($id<>'')
									{
										$r		=	$db->select("tbl_post","visibility=0 and user_id='".$rc->user_by_username($ses_user,'id')."' and cat = '".$id."'","order by id desc, time desc limit $min, $max");
									}
									else
									{
										$r		=	$db->select("tbl_post","visibility=0 and user_id='".$rc->user_by_username($ses_user,'id')."'","order by id desc, time desc limit $min, $max");								
									}
								}
									
								while ($row = $db->fetch($r))
								{
									$count++;
							?>
							<tr class="tb_content">
							    <td align="center">
							    	<?if($row['thumbnail']!=''){?>
							    	<img src="<?=$root?>uploads/post_thumbnail/<?=$row['thumbnail_folder']?>/600x314_<?=$row['thumbnail']?>" width="80px" class="img-responsive"/>    
							        <?}?>
							    </td>
								<td style="text-align:left !important;"><a href="?act=cms_edit&id=<?=$row["id"]?>" style="text-decoration:none;font-weight:bold;"><?=$row["name"]?></a><br/>
									Ngày đăng: <?=date('d/m/Y',$row["time"])?> - Bởi: <b><?=$rc->user($row['user_id'],'username')?></b><br/>

									<?if($row['tags']<>''){?>
										<br/>Tags: <?
						                if($row['tags']!=''){
						                $tach1       =   explode(",",$row['tags']);						               
							                foreach($tach1 as $tach2)
							                {
											$rs_tags = $db->select("tbl_tags","id='".$tach2."'");
											$row_tags = $db->fetch($rs_tags);
							                ?>
							                    <a style="color:green" href="<?=$root?>tags/<?=$row_tags['slug']?>/" target="_blank"><?=$row_tags['name']?></a>,
							                  <?
							              	}
						              	}?>
									<?}?>
								</td>
								<td align="center"><?=$row['views']?></td>
								<td>
								<a href="<?=$root?>post/<?=$str->to_slug($row['name'])?>-<?=$row['id']?>.html" target="_blank">[Xem]</a></td>


								<?if($rc->user_by_username($ses_user,'level_id')==1){?>
								<td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="tbl_post" data-id="<?=$row['id']?>"/></td>
								<td align="center"><input type="checkbox" <?=($row['highlight']) ? 'checked' : ''?> class="switch-input" data-type="highlight" data-com="tbl_post" data-id="<?=$row['id']?>"/></td>
								<td align="center"><input type="checkbox" <?=($row['locked']) ? 'checked' : ''?> class="switch-input" data-type="locked" data-com="tbl_post" data-id="<?=$row['id']?>"/></td>
								<td align="center"><input name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
								<?}?>

								<td align="center">
								<?if($row['locked']==0){?>
								<a href="?act=cms_edit&id=<?=$row["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<?}else{?>Locked<?}?>
								</td>
							</tr>
							<?
							}
							?>
						</tbody>
					</table>
					<div class="paging">
						<ul class="pagination pagination-md">
							<?php
					    		for($i=1;$i<=$pages;$i++) {
					    			if (($_GET['page'] == $i) ||(!isset($_GET['page']) && $i == 1))
					    				echo "<li class=\"active\"><a href='?act=cms_list&id=".$id."&page=$i'>".$i."</a></li>";
					    			else
					    				echo "<li><a href='?act=cms_list&id=".$id."&page=$i'>".$i."</a></li>";
								}
					    	?>
	                  </ul>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$("#chonhet").click(function(){
			var status=this.checked;
			$("input[name='tik[]']").each(function(){this.checked=status;})
		});

		$(".button_2").click(function(){
			var listid="";
			$("input[name='tik[]']").each(function(){
				if (this.checked) listid = listid+","+this.value;
		    	})
			listid=listid.substr(1);
			if (listid=="") { 
				alert("Bạn chưa chọn mục nào"); 
				return false;
			}
			hoi = confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi == true)
				$("#frm_sanpham").submit();
			return false;
		})
	})
</script>