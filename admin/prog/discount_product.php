<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý giá cả sản phẩm</h1>
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
			<h3 class="card-title">Quản lý giảm giá</h3>
			<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<tbody style="text-align: center;">
							<tr class="tb_content">
								<td>Giảm giá cho:</td>
								<td>
								<?
									$rs_cat=$conn->query("select * from $tbl_product_cat where cat=0 and visibility=1 and display=1");
									if($rs_cat->num_rows > 0) {
								?>
									<select id="select_product_discount" name="select_product">
										<option style="font-weight: bold;" value="0-all">Tất cả</option>
									<?
										while ($row_cat=$rs_cat->fetch_assoc()) {
											$rs=$conn->query("select * from $tbl_product_cat where cat='".$row_cat['id']."' and visibility=1 and display=1");
											if($rs->num_rows > 0){
									?>
										<option style="font-weight: bold;" value="<?=$row_cat['id']?>-haschild"><?=$row_cat['name_en']?></option>
									<?} else {?>
										<option style="font-weight: bold;" value="<?=$row_cat['id']?>-nochild"><?=$row_cat['name_en']?></option>
									<?}?>
										<?
											$rs=$conn->query("select * from $tbl_product_cat where cat='".$row_cat['id']."' and visibility=1 and display=1");
											if($rs->num_rows > 0){
												while ($row=$rs->fetch_assoc()) {
										?>
											<option value="<?=$row['id']?>-child">--<?=$row['name_en']?></option>
										<?} }?>
									<?}?>
									</select>
								<?}?>
								</td>
								<td>
									<label>Giảm giá (%):</label>
									<input type="text" class="text-right" name="discount_price">
								</td>
								<td>
									<label>Thời gian áp dụng:</label>
									<input type="text" name="time_apply">
								</td>
								<td><button id="button_discount" type="button" class="btn btn-primary">Lưu</button></td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
		<div class="card">
			<h3 class="card-title">Quản lý tăng giá</h3>
			<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<tbody style="text-align: center;">
							<tr class="tb_content">
								<td>Tăng giá cho:</td>
								<td>
								<?
									$rs_cat=$conn->query("select * from $tbl_product_cat where cat=0 and visibility=1 and display=1");
									if($rs_cat->num_rows > 0) {
								?>
									<select id="select_product_increase" name="select_product">
										<option style="font-weight: bold;" value="0-all">Tất cả</option>
									<?
										while ($row_cat=$rs_cat->fetch_assoc()) {
											$rs=$conn->query("select * from $tbl_product_cat where cat='".$row_cat['id']."' and visibility=1 and display=1");
											if($rs->num_rows > 0){
									?>
										<option style="font-weight: bold;" value="<?=$row_cat['id']?>-haschild"><?=$row_cat['name_en']?></option>
									<?} else {?>
										<option style="font-weight: bold;" value="<?=$row_cat['id']?>-nochild"><?=$row_cat['name_en']?></option>
									<?}?>
										<?
											$rs=$conn->query("select * from $tbl_product_cat where cat='".$row_cat['id']."' and visibility=1 and display=1");
											if($rs->num_rows > 0){
												while ($row=$rs->fetch_assoc()) {
										?>
											<option value="<?=$row['id']?>-child">--<?=$row['name_en']?></option>
										<?} }?>
									<?}?>
									</select>
								<?}?>
								</td>
								<td>
									<label>Tăng giá (%):</label>
									<input type="text" class="text-right" name="increase_price">
								</td>
								<td><button id="button_increase" type="button" class="btn btn-primary">Lưu</button></td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$().ready(function(){
		$('#button_discount').click(function(){
			var value=$('input[name="discount_price"]').val();
			var apply=$('input[name="time_apply"]').val();
			var id=$('#select_product_discount').val();
			if(confirm("Bạn có muốn giảm giá cho mục đã chọn?")==true)
				$.ajax({
					url: base_url+"admin/index.php",
					type: "POST",
					data: {id:id,value:value,apply:apply,ajax_discount_product: true},
					success: function(result){
						if(result) alert(result);
					}
				})
		})
		$('#button_increase').click(function(){
			var value=$('input[name="increase_price"]').val();
			var id=$('#select_product_increase').val();
			if(confirm("Bạn có muốn tăng giá cho mục đã chọn?")==true)
				$.ajax({
					url: base_url+"admin/index.php",
					type: "POST",
					data: {id:id,value:value,ajax_increase_product: true},
					success: function(result){
						if(result) alert(result);
					}
				})
		})
	})
</script>