<?php
if($txtMod=='delete')
{
	#$str->check($_POST);
	$tick = $_POST['tick'];
	$id = $_POST['id'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_product_size set visibility=0 where id='".$value."'");
		header('location: ?act=size_list&id='.$id);
	}
}

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> <?=$get->product($id,'code')?> - <?=$get->product($id,'name')?> (<?=$get->product($id,'name_en')?>)</h1>
    <p></p>
  </div>
  <div>
  <?
  	$id_cat=$get->product($id,'cat');
  ?>
    <ul class="breadcrumb" style="text-transform: none;">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i> Home</a> / <a href="?act=product_cat" title="Danh mục sản phẩm">Danh mục sản phẩm</a> / <a href="?act=product_list&id=<?=$id_cat?>" title="<?=$get->product_cat($id_cat,'name')?>"><?=$get->product_cat($id_cat,'name')?></a> / <?=$get->product($id,'name')?></li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<p style="margin-top: 15px;"><img style="width: 60px" src="<?=$root?>uploads/product/<?=$get->product($id,'thumbnail')?>" alt="<?=$get->product($id,'name')?>"></p>
			<h3 class="card-title">Danh sách size</h3>
			<div class="table-responsive">
				<form action="?act=size_list" method="post" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">
					<input type="hidden" name="id" value="<?=$id?>">
					<div class="form-group tab_update_controller">
						<a href="?act=product_size_update&cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button  type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					</div>
					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Kích thước</th>
								<th style="text-align:center;">Giá gốc($)</th>
								<th style="text-align:center;">Giá gốc(vnd)</th>
								<th style="text-align:center;">Giảm giá</th>
								<th style="text-align:center;">Thời gian</th>
								<th style="text-align:center;">Chất liệu</th>
								<th style="text-align:center;">Màu sắc</th>
								<th style="text-align:center;">Thể tích</th>
								<th style="text-align:center;">Cân nặng</th>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_product_size where visibility=1 and cat='".$id."' order by id");
							while ($row = $rs->fetch_assoc())
							{
								$name = $row['length']."x".$row['width']."x".$row['height']."cm";
							?>
							<tr class="tb_content">
								<td><b><?=$name?></b></td>
								<?
									if($row['discount']){
										$new_price  = $row['price']-$row['price']*$row['discount']/100;
										$new_price_tv  = $row['price_tv']-$row['price_tv']*$row['discount']/100;
									}
								?>
								<td class="text-right"><?if($row['discount']) echo '<p style="text-decoration:line-through;color:#595959;">$ '.number_format($row['price']).'</p><b style="color:red;">$ '.number_format($new_price,2).'</b>'; else echo '<b style="color:red;">$ '.number_format($row['price']);?></td>
								<td class="text-right"><?if($row['discount']) echo '<p style="text-decoration:line-through;color:#595959;">'.number_format($row['price_tv']).' đ</p><b style="color:red;">'.number_format($new_price_tv).' đ</b>'; else echo '<b style="color:red;">'.number_format($row['price_tv']).' đ';?></td>
								<td class="text-right"><?=number_format($row['discount'])?>%</td>
								<td class="text-center"><?=$row['time_apply']?></td>
								<td><?=$get->product_material($row['material'],'name')?> (<?=$get->product_material($row['material'],'name_en')?>)</td>
								<td><?=str_replace("\n","<br/>",$row['color'])?></td>
								<td><?=$row['volume']?> m3</td>
								<td><?=$row['weight']?> kg</td>

								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_product_size?>" data-id="<?=$row['id']?>"/></td>

								<td class="text-center"><a href="?act=product_size_update&id=<?=$row['id']?>">Sửa</a></td>
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
		// $("input[name='stt']").change(function(){
		// 	var base_url = "<?=$root?>";
		// 	var value = $(this).val();
		// 	var id = $(this).data("id");
		// 	var com = "<?=$tbl_product?>";
		// 	var filed = "sort";
		// 	$.ajax({
		// 		url:base_url+"admin/update_stt.php",
		// 		data:{id:id,value:value,com:com,filed:filed},
		// 		type:"POST",
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