<?php
if($txtMod=='delete')
{
	#$str->check($_POST);
	$tick = $_POST['tick'];
	$id = $_POST['id'];
	foreach ($tick as $value) {
		$conn->query("update $tbl_post set visibility=0 where id='".$value."'");
		header('location: ?act=post_list&id='.$id);
	}
}

?>
<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> <?=$get->post_cat($id,'name')?></h1>
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
			<h3 class="card-title">Danh sách bài viết</h3>
			<div class="table-responsive">
				<form action="?act=post_list" method="post" id="frm-pagelist">
					<input type="hidden" name="txtMod" value="delete">
					<input type="hidden" name="id" value="<?=$id?>">

					<div class="form-group tab_update_controller">
						<a href="?act=post_item_update&cat=<?=$id?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
						<button type="submit" name="xoa" class="btn btn-primary button_2 preview"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</button>
					</div>

					<p>&nbsp;</p>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align:center;">Hình</th>
								<th style="text-align:center;">Tên</th>
								<th style="text-align:center;">Xem trước</th>
								<th style="text-align:center;">Thứ tự</th>
								<th style="text-align:center;">Hiển thị</th>
								<th style="text-align:center;">Sao chép</th>
								<th style="text-align:center;">Sửa</th>
								<th style="text-align:center;">Xóa</br><input type="checkbox" id="chonhet"/></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql="select * from $tbl_post where visibility=1 and cat='".$id."'";
							// $rs		=	$conn->query("select * from $tbl_post where visibility=1 and cat='".$id."'");
							$rs		=	$conn->query(page($sql,20));
							while ($row = $rs->fetch_assoc())
							{
								if($row['thumbnail']<>'no')
								{
									$img = '<img src="'.$root.'uploads/post/post_'.$row['thumbnail'].'" width="60"/>';
								}
								else
								{
									$img = '';
								}
							?>
							<tr class="tb_content">
								<td><?=$img?></td>
								<td><b><?=$row['name']?></b></td>
								<td><a href="<?=$url->post($row['id'],"name")?>" target="_blank">[Xem]</a></td>
								<td class="text-center"><input type = "number" name="txtSort" data-id="<?=$row["id"];?>" data-com="<?=$tbl_post;?>" value="<?=$row["sort"];?>" style="width:50px;text-align: center;"/></td>
								<td class="text-center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="<?=$tbl_post?>" data-id="<?=$row['id']?>"/></td>
								<td class="text-center"><a href="?act=post_item_update&copy=1&id=<?=$row['id']?>">Sao chép</a></td>
								<td class="text-center"><a href="?act=post_item_update&id=<?=$row['id']?>">Sửa</a></td>
								<td class="text-center"><input name="tick[]" type="checkbox" value="<?=$row["id"]?>" /></td>							
							</tr>
							<?php
							}
							?>
						</tbody>
						<tr>
							<td colspan="8" style="text-align:left;">
								<strong>Page : </strong>
								<?php
								if(!isset($pages)){$pages = 0;}
									if ($pages==0) echo ":1:";
						    		for($i=1;$i<=$pages;$i++) {
						    			if ($i==$page) echo "<b>[".$i."]</b> ";
						    			else {
											echo "<a href='?act=post_list&id=".$id."&page=$i'>-$i-</a>";
										}
									}
						    	?>
							</td>
						</tr>
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
		// 	var com = "<?=$tbl_post?>";
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