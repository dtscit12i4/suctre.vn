<?php

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý yêu cầu</h1>
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
			<h3 class="card-title">Danh sách yêu cầu</h3>
			<div class="table-responsive">
					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="text-center">Mã</th>
								<th class="text-center">Ngày đặt</th>
								<th class="text-center">Khách</th>
								<th class="text-center">Thông tin</th>
								<th class="text-center">Báo giá</th>
								<th class="text-center">Tình trạng</th>
								<th class="text-center">Chi tiết</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_inquiry where display=1 order by created desc");
							while ($row = $rs->fetch_assoc())
							{
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
							<?if(!$row['lan']){?>
								<td class="text-right">$ <?=number_format($row['price'],2)?></td>
							<?} else{?>
								<td class="text-right"><?=number_format($row['price_tv'],2)?> đ</td>
							<?}?>
								<td><?=$status?></td>
								<td>									
								 	<a href="?act=orders_special_detail&id=<?=$row['id']?>">Chi tiết yêu cầu</a>
								</td>					
							</tr>
								<?
							}
							?>
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>
