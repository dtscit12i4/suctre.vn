<?php
if($txtMod=='delete')
{
	#$str->check($_gallery);
	$tick = $_POST['tick'];
	$id = $_POST['id'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_gallery set visibility=0 where id='".$value."'");
		header('location: ?act=gallery_list&id='.$id);
	}
}

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> <?=$get->gallery_cat($id,'name')?></h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i> Home</a></li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Danh sách hình ảnh</h3>
			<div class="table-responsive">
				<form action="?act=gallery_list" method="POST" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">
					<input type="hidden" name="id" value="<?=$id?>">

					<div class="form-group tab_update_controller">
						<a href="?act=gallery_item_update&cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					</div>

					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Hình</th>
								<th style="text-align:center;">Tên</th>
								<?if($id==9){?>
								<th style="text-align:center;">Album</th>
								<?}?>
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_gallery where visibility=1 and cat='".$id."' order by sort");
							while ($row = $rs->fetch_assoc())
							{
								if($row['thumbnail']<>'no')
								{
									$img = '<img src="'.$root.'uploads/gal/'.$row['thumbnail'].'" width="60"/>';
								}
								else
								{
									$img = '';
								}
							?>
							<tr class="tb_content">
								<td><?=$img?></td>
								<td><b><?=$row['name']?></b></td>
								<?if($id==9){?>
								<td><a href="?act=gallery_album_list&id=<?=$row['id']?>" target="_blank">[Album]</a></td>
								<?}?>
								<td class="text-center"><input type = "number" name="txtSort" data-id="<?=$row["id"];?>" data-com="<?=$tbl_gallery;?>" value="<?=$row["sort"];?>" style="width:50px;text-align: center;"/></td>
								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_gallery?>" data-id="<?=$row['id']?>"/></td>
								<td class="text-center"><a href="?act=gallery_item_update&id=<?=$row['id']?>">Sửa</a></td>
								<td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row["id"]?>" /></td>							
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$().ready(function(){
		$("#chonhet").click(function(){
			var status=this.checked;
			$("input[name='tick[]']").each(function(){this.checked=status;})
		});

		$(".button_2").click(function(){
			var listid="";
			$("input[name='tick[]']").each(function(){
				if (this.checked) listid = listid+","+this.value;
		    	})
			listid=listid.substr(1);
			if (listid=="") { 
				alert("Bạn chưa chọn mục nào"); 
				return false;
			}
			hoi = confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi == true)
				$("#frm-pagelist").submit();
			return false;
		})
	})
</script>