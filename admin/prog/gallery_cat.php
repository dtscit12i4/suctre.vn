<?php
if($txtMod=='delete')
{
	$tick = $_POST['tick'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_gallery_cat set visibility=0 where id='".$value."'");
		header('location: ?act=gallery_cat');
	}
}

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý hình ảnh</h1>
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
			<h3 class="card-title">Quản lý hình ảnh</h3>
			<div class="table-responsive">
				<form action="?act=gallery_cat" method="POST" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">

					<div class="form-group tab_update_controller">
						<a href="?act=gallery_cat_update" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					</div>

					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Tên mục</th>
								<th class="text-center">danh sách hình</th>
								<th class="text-center">Thứ tự</th>
								<th class="text-center">Hiển thị</th>
								<th class="text-center">Sửa</th>
								<th class="text-center">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_gallery_cat where visibility=1 order by sort");
							while ($row = $rs->fetch_assoc())
							{
							?>
							<tr class="tb_content">
								<td><b><?=$row['name']?></b></td>
								<td><b><a href="?act=gallery_list&id=<?=$row['id']?>">Danh sách hình <?count_item($row['id'],$tbl_gallery,"hình")?></a></b></td>
								<td class="text-center"><input type = "number" name="txtSort" data-id="<?=$row["id"];?>" data-com="<?=$tbl_gallery_cat?>" value="<?=$row["sort"];?>" style="width:50px;text-align: center;" /></td>
								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_gallery_cat?>" data-id="<?=$row['id']?>"/></td>
								<td class="text-center"><a href="?act=gallery_cat_update&id=<?=$row['id']?>">Sửa</a></td>
								<td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row["id"]?>" /></td>							
							</tr>
								<?
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
		// $("input[name='txtSort']").change(function(){
		// 	var base_url = "<?=$root?>";
		// 	var value = $(this).val();
		// 	var id = $(this).data("id");
		// 	var com = $(this).data("com");
		// 	var column = "sort";
		// 	$.ajax({
		// 		url:base_url+"admin/update_sort.php",
		// 		data:{id:id,value:value,com:com,column:column},
		// 		type:"gallery",
		// 		success:function(data) {
		// 			if(!data){
		// 				alert("Đã có lỗi xảy ra !!!");//alert("Đã cập nhật số thứ tự thành công!!!");
		// 			}
		// 			else {
		// 				location.reload();
		// 			}
		// 		}
		// 	})
		// })
	})
</script>