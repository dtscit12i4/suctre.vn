<?php
if($user_coder)
{
	if($txtMod=='delete')
	{
		#$str->check($_POST);
		$tick = $_POST['tick'];
		foreach ($tick as $value) {
			$conn->query("delete from $tbl_page where id='".$value."'");
			header('location: ?act=page');
		}
	}
}
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý Trang nội dung</h1>
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
			<h3 class="card-title">Quản lý Trang nội dung</h3>
			<div class="table-responsive">
				<form action="?act=page" method="post" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">
					<div class="form-group tab_update_controller">
						<a href="?act=page_update" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<?if($user_coder){?><button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button><?}?>
					</div>

					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Code</th>
								<th style="text-align:center;">Tên trang</th>
								<th style="text-align:center;">Sửa</th>
								<?if($user_coder){?><th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th><?}?>
							</tr>
						</thead>
						<tbody>
							<?php
							$rs		=	$conn->query("select * from $tbl_page order by code");
							while ($row = $rs->fetch_assoc())
							{
							?>
							<tr class="tb_content">
								<td><?=$row['code']?></td>
								<td><b><?=$row['name']?></b></td>
								<td class="text-center"><a href="?act=page_update&id=<?=$row['id']?>">Sửa</a></td>
								<?if($user_coder){?><td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row["id"]?>" /></td><?}?>							
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
<?if($user_coder){?>
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
<?}?>