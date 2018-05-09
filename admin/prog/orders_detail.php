
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
    <h1><i class="fa fa-dashboard"></i> Quản lý chi tiết Đơn hàng</h1>
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
			<h3 class="card-title">Chi tiết đơn hàng</h3>
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
							$rs		=	$conn->query("select * from $tbl_orders where id='".$id."'");
							$row = $rs->fetch_assoc();
							$array_info=json_decode($row['info'],true);
								switch($row['status']){
									case '0': $status = "New order"; break;
									case '3': $status = "Received"; break;
									case '4': if($array_info['Country']=='Vietnam') $status = "Payed 50%"; break;
									case '5': if($array_info['Country']!='Vietnam') $status = "Payed 100%"; break;
									case '6': if($array_info['Country']=='Vietnam') $status = "Payed 100%"; break;
									case '7': $status = "Transferred"; break;
									case '10': $status = "Successful delivery"; break;
									case '13': $status = "Cancel order"; break;
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
									<input id="delete_order" data-id="<?=$id?>" data-com="<?=$tbl_orders?>" class="btn btn-primary" type="submit" value="Xóa" style="margin-bottom: 25px;"></input>
									<select id="status_order" name="txt_status" data-id="<?=$id?>" data-com="<?=$tbl_orders?>" class="form-control">
                                        <option value="0">New order</option>
                                        <option <?if($row['status']==3) echo 'selected';?> value="3">Received</option>
                                        <?if($array_info['Country']=='Vietnam'){?>
                                        <option <?if($row['status']==4) echo 'selected';?> value="4">Payed 50%</option>
                                        <?}?>
                                        <?if($array_info['Country']!='Vietnam'){?>
                                        <option <?if($row['status']==5) echo 'selected';?> value="5">Payed 100%</option>
                                        <?}?>
                                        <?if($array_info['Country']=='Vietnam'){?>
                                        <option <?if($row['status']==6) echo 'selected';?> value="6">Payed 100%</option>
                                        <?}?>
                                        <option <?if($row['status']==7) echo 'selected';?> value="7">Transferred</option>
                                        <option <?if($row['status']==10) echo 'selected';?> value="10">Successful delivery</option>
                                        <option <?if($row['status']==13) echo 'selected';?> value="13">Cancel order</option>
                                    </select>
								</td>
								<!-- <td><?=$status?></td> -->
							</tr>
						</tbody>
					</table>
			</div>
			<div class="content-order">
				<h3 class="card-title">Đơn hàng bao gồm</h3>
				<?if($row['content']) echo $row['content'];else echo $row['content_tv'];?>
				<form id="frm_cost_order" action="" method="post" data-id="<?=$id?>" data-com="<?=$tbl_orders?>" style="text-align: right;margin-top: 15px; border: 1px solid #ddd;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;padding-right: 15px;margin-bottom: 15px;">
					<div style="float:left;">
					<?if(!$row['price_tv']){?>
						<label>Khách đã trả ($):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_price" value="<?=$row['money']?>">
					<?} else{?>
						<label>Khách đã trả (VND):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_price" value="<?=$row['money_tv']?>">
					<?}?>
					</div style="float:right;">
					<div>
					<?if(!$row['price_tv']){?>
						<label>Phí vận chuyển ($):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_cost" value="<?=$row['cost_transportation']?>">
					<?} else {?>
						<label>Phí vận chuyển (VND):</label>
						<input style="text-align: right;padding-right: 10px;" type="text" name="txt_cost" value="<?=$row['cost_transportation_tv']?>">
					<?}?>
						<input type="submit" class="btn btn-primary" name="submit_cost" value="Lưu">
					</div>
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
							<?if(!$row['price_tv']){?>
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
		var id=$(this).data("id");
		var com=$(this).data("com");
		var value=$(this).val();
		var column = "status";
		console.log(id);
		console.log(com);
		console.log(value);
		console.log(column);
		$.ajax({
			url: base_url+"admin/index.php",
			dataType: "JSON",
			type: "POST",
			data:{id:id,value:value,com:com,column:column,ajax_status: true},
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
		var id=$(this).data("id");
		var com=$(this).data("com");
	<?if(!$row['price_tv']){?>
		var column = "cost_transportation";
		var column_price = "money";
	<?} else {?>
		var column = "cost_transportation_tv";
		var column_price = "money_tv";
	<?}?>
		console.log(value);
		console.log(id);
		console.log(com);
		console.log(column);
		$.ajax({
			url: base_url+"admin/index.php",
			dataType: "JSON",
			type: "POST",
			data:{id:id,value:value,value_price:value_price,column_price:column_price,com:com,column:column,ajax_cost_order: true},
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
					location.href="?act=orders";			
				}
			}
		})
	})
})
</script>