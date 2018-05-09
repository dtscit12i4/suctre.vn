<?php
if($txtMod=='delete')
{
	$tick = $_POST['tick'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_country set visibility=0 where id='".$value."'");
		header('location: ?act=country');
	}
}

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý Danh sách quốc gia</h1>
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
			<h3 class="card-title">Danh sách quốc gia</h3>
			<div class="table-responsive">
				<form action="?act=country" method="POST" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">

					<div class="form-group tab_update_controller">
						<a href="?act=country_update" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button> 
					</div>

					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Tên</th>
								<th class="text-center">Mã</th>
								<th class="text-center">Hiển thị</th>
								<th class="text-center">Sửa</th>
								<th class="text-center">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_country where visibility=1 order by name");
							while ($row = $rs->fetch_assoc())
							{
							?>
							<tr class="tb_content">
								<td><b><?=$row['name']?></b></td>
								<td><b><?=$row['code']?></b></td>							

								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_country?>" data-id="<?=$row['id']?>"/></td>
								<td class="text-center"><a href="?act=country_update&id=<?=$row['id']?>">Sửa</a></td>
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