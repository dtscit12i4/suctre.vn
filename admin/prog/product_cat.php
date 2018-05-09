<?php
if($txtMod=='delete')
{
	#$str->check($_POST);
	$tick = $_POST['tick'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_product_cat set visibility=0 where id='".$value."'");
		header('location: ?act=product_cat');
	}
}

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý Danh mục dự án</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb" style="text-transform: none;">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i> Home</a> / Danh mục dự án</li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý Danh mục dự án</h3>
			<div class="table-responsive">
				<form action="?act=product_cat" method="post" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">

					<div class="form-group tab_update_controller">
						<a href="?act=product_cat_update" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					</div>
					<p>&nbsp;</p>
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center">Hình ảnh</th>
								<th class="text-center">Tên</th>
								<th class="text-center">Danh sách dự án</th>
								<th class="text-center">Xem trước</th>
								<th class="text-center">Thứ tự</th>
								<th class="text-center">Hiển thị</th>
								<th class="text-center">Sao chép</th>
								<th class="text-center">Sửa</th>
								<th class="text-center">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_product_cat where visibility=1 and cat=0 order by sort");
							while ($row = $rs->fetch_assoc())
							{
								if($row['thumbnail']<>'no')
								{
									$img = '<img src="'.$root.'uploads/product_cat/productcat_'.$row['thumbnail'].'" width="60"/>';
								}
								else
								{
									$img = '';
								}
							?>
							<tr class="tb_content">
								<td><?=$img?></td>
								<td><b><?=$row['name']?></b> <small style="color: #c00"><i>(<?=count_product($row['id'])?> dự án)</i></small></td>
								<td><b><a href="?act=product_list&id=<?=$row['id']?>">Danh sách dự án</a></b></td>
							
								<td><a href="<?=$url->product_cat($row['id'],"name")?>" target="_blank">[Xem]</a></td>
								<td class="text-center"><input type = "number" name="txtSort" data-id="<?=$row["id"];?>" data-com="<?=$tbl_product_cat;?>" value="<?=$row["sort"];?>" style="width:50px;text-align: center;"/></td>
								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_product_cat?>" data-id="<?=$row['id']?>"/></td>
								<td class="text-center"><a href="?act=product_cat_update&copy=1&id=<?=$row['id']?>">Sao chép</a></td>
								<td class="text-center"><a href="?act=product_cat_update&id=<?=$row['id']?>">Sửa</a></td>
								<td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row["id"]?>" /></td>							
							</tr>

								<?php
								$rs2		=	$conn->query("select * from $tbl_product_cat where visibility=1 and cat='".$row['id']."' order by sort");
								while ($row2 = $rs2->fetch_assoc())
								{									
									if($row2['thumbnail']<>'no')
									{
										$img = '<img src="'.$root.'uploads/product_cat/productcat_'.$row2['thumbnail'].'" width="60"/>';
									}
									else
									{
										$img = '';
									}
								?>
								<tr class="tb_content">
									<td><?=$img?></td>
									<td><b>-------- <?=$row2['name']?></b> <small style="color: #c00"><i>(<?=count_product($row2['id'])?> dự án)</i></small></td>
									<td><b><a href="?act=product_list&id=<?=$row2['id']?>">Danh sách dự án</a></b></td>
									<td><a href="<?=$url->product_cat($row2['id'],"name")?>" target="_blank">[Xem]</a></td>
									<td class="text-center"><input type = "number" name="txtSort" data-id="<?=$row2["id"];?>" data-com="<?=$tbl_product_cat?>" value="<?=$row2["sort"];?>" style="width:50px;text-align: center;"/></td>
									<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row2['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_product_cat?>" data-id="<?=$row2['id']?>"/></td>
									<td class="text-center"><a href="?act=product_cat_update&copy=1&id=<?=$row2['id']?>">Sao chép</a></td>
									<td class="text-center"><a href="?act=product_cat_update&id=<?=$row2['id']?>">Sửa</a></td>
									<td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row2["id"]?>" /></td>						
								</tr>
								<?
								}
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