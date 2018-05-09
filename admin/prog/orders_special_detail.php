
<style>
    input[type='number'] {
        -moz-appearance:textfield;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
</style>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý chi tiết yêu cầu</h1>
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
			<h3 class="card-title">Chi tiết yêu cầu</h3>
			<div class="table-responsive">
					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Mã</th>
								<th class="text-center">Ngày đặt</th>
								<th class="text-center">Khách</th>
								<th class="text-center">Thông tin thanh toán</th>
								<th class="text-center">Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_inquiry where id='".$id."'");
							$row = $rs->fetch_assoc();
							$array_info=json_decode($row['info'],true);
								switch($row['status']){
									case '0': $status = "New inquiry"; break;
									case '3': $status = "Received"; break;
									case '4': if($array_info['Country']!='Vietnam') $status = "deposited 50%"; break;
									case '5': if($array_info['Country']=='Vietnam') $status = "deposited 50%"; break;
									case '6': $status = "Payed 100%"; break;
									case '8': $status = "Transferred"; break;
									case '11': $status = "Successful delivery"; break;
									case '14': $status = "Cancel inquiry"; break;
									default: $status = "Unknown";
								}
							?>
							<tr class="tb_content">
								<td><h4><b>#<?=$row['id']?></b></h4></td>
								<td class="text-center"><?=date('d/m/Y H:s',$row['created'])?></td>
								<td>
									<h4><b><?=$get->account_by_id($row['account_id'],'email')?></b><br><?=$get->account_by_id($row['account_id'],'name')?></h4>
									<?if($get->account_by_id($row['account_id'],'email')){?>
									<h4><a target="_blank" href="?act=account_item&id=<?=$row['id']?>">[Chi tiết tài khoản]</a></h4>
									<?}?>
								</td>
								<td>		
									<?
										foreach ($array_info as $key => $value) {
											echo $key.": ".$value."<br />";
										}
										// $str->check($array_info);
									?>							
								</td>
								<td style="text-align: center;">
									<input id="delete_order" data-id="<?=$id?>" data-com="<?=$tbl_inquiry?>" class="btn btn-primary" type="submit" value="Xóa" style="margin-bottom: 25px;"></input>
									<select id="status_order" name="txt_status" data-id="<?=$id?>" data-com="<?=$tbl_inquiry?>" class="form-control">
                                        <option value="0">New inquiry</option>
                                        <option <?if($row['status']==3) echo 'selected';?> value="3">Received</option>
                                        <?if($array_info['Country']!='Vietnam'){?>
                                        <option <?if($row['status']==4) echo 'selected';?> value="4">deposited 50%</option>
                                        <?}?>
                                        <?if($array_info['Country']=='Vietnam'){?>
                                        <option <?if($row['status']==5) echo 'selected';?> value="5">deposited 50%</option>
                                        <?}?>
                                        <option <?if($row['status']==6) echo 'selected';?> value="6">Payed 100%</option>
                                        <option <?if($row['status']==8) echo 'selected';?> value="8">Transferred</option>
                                        <option <?if($row['status']==11) echo 'selected';?> value="11">Successful delivery</option>
                                        <option <?if($row['status']==14) echo 'selected';?> value="14">Cancel inquiry</option>
                                    </select>
								</td>
								<!-- <td><?=$status?></td> -->
							</tr>
						</tbody>
					</table>
			</div>
			<div class="content-order">
				<h3 class="card-title">Yêu cầu bao gồm</h3>
				<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Sản phẩm</th>
								<th class="text-center">Mã SP</th>
								<th class="text-center">Kích thước</th>
								<th class="text-center">Loại đá</th>
								<th class="text-center">Màu sắc</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Comment</th>
							</tr>
						</thead>
						<tbody>
							<tr class="tb_content">
								<td class="text-center"><?=$get->product($row['product_id'],'name_en')?></td>
								<td class="text-center"><?=$get->product($row['product_id'],'code')?></td>
								<td class="text-center"><?=$row['size']?></td>
								<td class="text-center"><?=$row['material']?></td>
								<td class="text-center"><?=$row['color']?></td>
								<td class="text-center"><?=$row['quantity']?></td>
								<td><?=$row['comment']?></td>
							</tr>
						</tbody>
					</table>
				<form id="frm_cost_order" action="" method="post" data-id="<?=$id?>" data-com="<?=$tbl_inquiry?>" style="text-align: center;margin-top: 15px; border: 1px solid #ddd;padding-top: 15px;padding-bottom: 15px;margin-bottom: 15px;">
					<div class="col-md-4">
					<?if(!$row['lan']){?>
						<label>Báo giá ($):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_price" value="<?=$row['price']?>">
					<?} else {?>
						<label>Báo giá (VND):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_price" value="<?=$row['price_tv']?>">
					<?}?>
					</div>
					<div class="col-md-4">
					<?if(!$row['lan']){?>
						<label>Khách đã trả ($):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_money" value="<?=$row['money']?>">
					<?} else {?>
						<label>Khách đã trả (VND):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_money" value="<?=$row['money_tv']?>">
					<?}?>
					</div>
					<div class="col-md-4">
					<?if(!$row['lan']){?>
						<label>Phí vận chuyển ($):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_cost" value="<?=$row['cost_transportation']?>">
					<?} else {?>
						<label>Phí vận chuyển (VND):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_cost" value="<?=$row['cost_transportation_tv']?>">
					<?}?>
					</div>
					<div class="clearfix"></div>
					<input style="margin-top: 15px;" type="submit" class="btn btn-primary" name="submit_cost" value="Lưu">
				</form>
			</div>
			<h3 class="card-title">Tình trạng thanh toán</h3>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Tổng tiền</th>
								<th class="text-center">Tiền khách đã trả</th>
								<th class="text-center">Khách còn nợ</th>
							</tr>
						</thead>
						<tbody>
							<tr class="tb_content">
							<?if(!$row['lan']){?>
								<td class="text-center">$ <?=$row['price']+$row['cost_transportation']?></td>
								<td class="text-center">$ <?=$row['money']?></td>
								<td class="text-center">$ <?=$row['price']+$row['cost_transportation']-$row['money']?></td>
							<?} else {?>
								<td class="text-center"><?=$row['price_tv']+$row['cost_transportation_tv']?> đ</td>
								<td class="text-center"><?=$row['money_tv']?> đ</td>
								<td class="text-center"><?=$row['price_tv']+$row['cost_transportation_tv']-$row['money_tv']?> đ</td>
							<?}?>
							</tr>
						</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$().ready(function(){
	$('#status_order').click(function(){
        $(this).each(function(){
        $(this).data('lastValue', $(this).val());
        })
    })
	$('#status_order').on('change',function(){
		var lastRole = $(this).data('lastValue');
		var id_inquiry=$(this).data("id");
		var com=$(this).data("com");
		var value=$(this).val();
		var column = "status";
		console.log(id_inquiry);
		console.log(com);
		console.log(value);
		console.log(column);
		$.ajax({
			url: base_url+"admin/index.php",
			dataType: "JSON",
			type: "POST",
			data:{id_inquiry:id_inquiry,value:value,com:com,column:column,ajax_status: true},
			success: function(result){
				if(result.status=='no'){
					alert("Must change folow order");
                    $('#status_order').val(lastRole);
				}
				else if(result.status=='none'){
					alert("Can't cancel order");
                    $('#status_order').val(lastRole);
				}
				else {
					alert("Change status order success");
				}
			}
		})
	})
	$("#frm_cost_order").submit(function(){
		var value=$("input[name='txt_cost']").val();
		var value_price=$("input[name='txt_price']").val();
		var value_money=$("input[name='txt_money']").val();
		var id_price=$(this).data("id");
		var com=$(this).data("com");
	<?if(!$row['lan']){?>
		var column = "cost_transportation";
		var column_price = "price";
		var column_money = "money";
	<?} else {?>
		var column = "cost_transportation_tv";
		var column_price = "price_tv";
		var column_money = "money_tv";
	<?}?>
		$.ajax({
			url: base_url+"admin/index.php",
			dataType: "JSON",
			type: "POST",
			data:{id_price:id_price,value:value,value_price:value_price,value_money:value_money,com:com,column_money:column_money,column:column,column_price:column_price,ajax_cost_order: true},
			success: function(result){
				if(result.notify){
					alert(result.notify);	
					window.location.reload();				
				}
			}
		})
		return false;
	})
	$('#delete_order').click(function(){
		var id=$(this).data("id");
		var com=$(this).data("com");
		var column = "display";
		if(confirm("Are you want to delete this order?")==true)
			$.ajax({
			url: base_url+"admin/index.php",
			dataType: "JSON",
			type: "POST",
			data:{id:id,com:com,column:column,ajax_delete_order: true},
			success: function(result){
				if(result.notify){
					alert(result.notify);	
					location.href="?act=orders_special";			
				}
			}
		})
	})
})
</script>