<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<div class="page-title">
	<div>
		<h1><i class="fa fa-dashboard"></i> Quản lý nội dung chính</h1>
		<p></p>
	</div>
	<div>
	    <ul class="breadcrumb">
	    	<li><a href="?act=home"><i class="fa fa-home fa-lg"></i></a></li>
	    	<li><a href="?act=cms_manager">Quản lý danh mục</a></li>
	    </ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h3 class="card-title">Quản lý nội dung chính</h3>
			<div class="table-responsive">
				<form action="" enctype="multipart/form-data" method="GET">
					<input type="hidden" name="act" value="cms_manager" />
					<input type="hidden" name="func" value="sort" />

				<a href="?act=cms_menu_new" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
				<p>&nbsp;</p>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align:center;">Nhóm</th>
							<th style="text-align:center;">Tên mục</th>
							<th style="text-align:center;">Hiển thị</th>
							<th style="text-align:center;">Thêm bài viết</th>
							<th style="text-align:center;">Sửa</th>
							<th style="text-align:center;">Xem</th>
						</tr>
					</thead>
					<tbody>
							<?php
								$r2	=	$db->select("tbl_category","visibility=0","order by id");
								while ($row2 = $db->fetch($r2))
								{
							?>
							  <tr class="tb_content">
							    <td>&nbsp;</td>
							    <td style="text-align:left;"><img src="images/node.gif" align="absmiddle" /> <img src="images/lang_vn.gif" align="absmiddle" /> <a class="a_sp" href="?act=cms_list&id=<?=$row2["id"]?>"><?=$row2["name"]?></a> 
							    </td>

							    <td align="center"><input type="checkbox" data-toggle="tooltip" title="tick chọn" <?=($row2['display']) ? 'checked' : ''?> class="switch-input" data-type="display" data-com="tbl_category" data-id="<?=$row2['id']?>"/></td>

							    <td align="center"><a href="?act=cms_new&txt_cat=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-plus-square" aria-hidden="true"></i></a></td>

							    <td align="center"><a href="?act=cms_menu_edit&id=<?=$row2["id"]?>" class="icon-form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

							    <td align="center"><a href="<?=$root?>cat/<?=$row2['slug']?>/" target="_blank">[Xem]</i></a></td>
							  </tr>
							<?php
								}
							?>
					</tbody>
				</form>
				</table>
			</div>
		</div>
	</div>
</div>