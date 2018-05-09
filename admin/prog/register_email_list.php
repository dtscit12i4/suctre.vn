<?php

    if(isset($_POST['id'])) $id = $_POST['id'];else $id='';
    if(isset($_POST['func'])) $func = $_POST['func'];else $func='';
    if(isset($_POST['tik'])) $tik = $_POST['tik'];else $func='';
	if ($func == "del")
	{
		for ($i = 0; $i < count($tik); $i++)
		{
			$conn->query("update $tbl_email set display = 0 ,deleted='".time()."' where id = '".$tik[$i]."'");
		}
		header("location: ?act=register_email_list");
	}
?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Quản lý Emai khách đăng ký nhận tin</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
    </ul>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Danh sách Email đăng ký nhận tin</h3>
			<div class="table-responsive">
				<form action="?act=register_email_list" method="post" id="frm_sanpham">
					<input type="hidden" name="func" value="del" />
					<input type="hidden" name="id" value="<?=$id?>" />
					<button style="float: right;" type="submit" name="xoa" class="btn btn-primary button_2"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					<p style="clear:both;">&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Email</th>
								<th style="text-align:center;">Thời gian</th>
								<th style="text-align:center;">Xóa</br><input 
								type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
						<?php
							$q	=$conn->query("select * from $tbl_email where display=1");
							while ($r = $q->fetch_assoc())
							{
							?>
							<tr class="tb_content">
								<td style="text-align:center;"><?=$r["email"]?></td>
								<td style="text-align:center;"><?=date("d/m/Y - H\h:i\'",$r["created"])?></td>
								<td style="text-align:center;"><input name="tik[]" type="checkbox" value="<?=$r["id"]?>" /></td>
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
			$("input[name='tik[]']").each(function(){this.checked=status;})
		});

		$(".button_2").click(function(){
			var listid="";
			$("input[name='tik[]']").each(function(){
				if (this.checked) listid = listid+","+this.value;
		    	})
			listid=listid.substr(1);
			if (listid=="") { 
				alert("Bạn chưa chọn mục nào"); 
				return false;
			}
			hoi = confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi == true)
				$("#frm_sanpham").submit();
			return false;
		})
	})
</script>