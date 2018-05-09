<?php
/*if($txtMod=='delete')
{
	$tick = $_POST['tick'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_account set visibility=0 where id='".$value."'");
		header('location: ?act=account');
	}
}*/

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý tài khoản đăng ký</h1>
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
			<h3 class="card-title">Danh sách tài khoản đăng ký</h3>
			<div class="table-responsive">
				<form action="?act=account" method="POST" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">
<!-- 
					<div class="form-group tab_update_controller">
						<a href="?act=account_update" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button> 
					</div> -->

					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Email / Họ tên</th>
								<th class="text-center">Địa chỉ</th>
								<th class="text-center">Thông tin</th>
								<th class="text-center">Tình trạng</th>
								<!-- <th class="text-center">Sửa</th>
								<th class="text-center">Xóa</br><input type="checkbox" id="chonhet"/></th> -->
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_account order by created desc");
							while ($row = $rs->fetch_assoc())
							{
							?>
							<tr class="tb_content">
								<td>
									<h4><b><?=$row['email']?></b></h4><br>
									Fullname: <b><?=$row['name']?></b><br>
									Phone: <b><?=$row['phone']?></b><br>
									Created: <b><?=date('d/m/Y H:s', $row['created'])?></b>
									<h4><a href="?act=account_item&id=<?=$row['id']?>">[Chi tiết tài khoản]</a></h4>
								</td>
								<td>									
									Address: <b><?=$row['address1']?></b>, <b><?=$row['address2']?></b>, <b><?=$row['state']?></b>, <b><?=$row['city']?></b><br>				
									Postal code: <b><?=$row['postal_code']?></b><br>
									Country: <b><?=$get->country($row['country'],'name')?></b><br>
								</td>
								<td>
								<?
									$rs_order = $conn->query("select * from $tbl_orders where display=1 and account_id='".$row['id']."'");
								?>									
								 	<b>Số đơn hàng: <?=$rs_order->num_rows?><br/></b>				
								 	-- Số ĐH đã hủy: 32<br/>				
								 	-- Số ĐH đã thanh toán: 20<br/>			
								 	<i>------- Số đang giao: 5<br/>			
								 	------- Số đã giao: 15	</i><br/><br/>		
								 	<b>Sản phẩm yêu thích: <?if($row['favorite']) echo count(explode(",",$row['favorite']));else echo '0';?><br/></b>
								</td>

								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_account?>" data-id="<?=$row['id']?>"/></td>
								<!-- <td class="text-center"><a href="?act=account_update&id=<?=$row['id']?>">Chi tiết</a></td>
								<td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row["id"]?>" /></td>	 -->						
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