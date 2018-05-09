<div class="page-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Trang chủ</h1>
    <p></p>
  </div>
  <div>
    <ul class="breadcrumb">
      <li><i class="fa fa-home fa-lg"></i></li>
      <li><a href="?act=home">Home</a></li>
    </ul>
  </div>
</div>
<div class="row">
  <h3>Sơ đồ trang</h3>
  <table class="table table-bordered table-hover">
      <thead><td>Chức năng</td><td>Diễn giải</td><td>Quản lý</td></thead>
      <tr><td><b>Trang chủ</b></td><td></td><td>-</td></tr>
      <tr><td><b>Danh mục dự án</b></td><td></td><td><a href="?act=product_cat">Xem tất cả</a></td></tr>   
      <?php
      $rs   = $conn->query("select * from $tbl_product_cat where visibility=1 and cat=0 order by sort");
      while ($row = $rs->fetch_assoc())
      {
      ?>
      <tr><td></td><td><a href="?act=product_list&id=<?=$row['id']?>"><b><?=$row['name']?> </b></a> <small><i>(<?=count_product($row['id'])?> dự án)</i></small></td><td><a href="?act=product_cat_update&id=<?=$row['id']?>">Chỉnh sửa</a></td></tr>      
          <?php
          $rs2   = $conn->query("select * from $tbl_product_cat where visibility=1 and cat='".$row['id']."' order by sort");
          while ($row2 = $rs2->fetch_assoc())
          {
          ?>
          <tr><td></td><td><a href="?act=product_list&id=<?=$row2['id']?>">--------------- <?=$row2['name']?></a> <small><i>(<?=count_product($row2['id'])?> dự án)</i></small></td><td><a href="?act=product_cat_update&id=<?=$row2['id']?>">Chỉnh sửa</a></td></tr>  
      <?}}?>

      

      <tr><td><b>Hình ảnh</b></td><td></td><td><a href="?act=gallery_cat">Xem tất cả</a></td></tr>   
      <?php
      $rs   = $conn->query("select * from $tbl_gallery_cat where visibility=1 order by id");
      while ($row = $rs->fetch_assoc())
      {
      ?>
      <tr><td></td><td><a href="?act=gallery_list&id=<?=$row['id']?>"><b><?=$row['name']?></b></a></td><td><a href="?act=gallery_cat_update&id=<?=$row['id']?>">Chỉnh sửa</a></td></tr>    
      <?}?>

      <tr><td><b>Bài viết</b></td><td></td><td><a href="?act=post_cat">Xem tất cả</a></td></tr>   
       <?php
      $rs   = $conn->query("select * from $tbl_post_cat where visibility=1 and cat=0 order by sort");
      while ($row = $rs->fetch_assoc())
      {
      ?>
      <tr><td></td><td><a href="?act=post_list&id=<?=$row['id']?>"><b><?=$row['name']?> </b></a> <small><i>(<?=count_post($row['id'])?> bài viết)</i></small></td><td><a href="?act=product_cat_update&id=<?=$row['id']?>">Chỉnh sửa</a></td></tr>      
          <?php
          $rs2   = $conn->query("select * from $tbl_post_cat where visibility=1 and cat='".$row['id']."' order by sort");
          while ($row2 = $rs2->fetch_assoc())
          {
          ?>
          <tr><td></td><td><a href="?act=post_list&id=<?=$row2['id']?>">--------------- <?=$row2['name']?></a> <small><i>(<?=count_post($row2['id'])?> bài viết)</i></small></td><td><a href="?act=post_cat_update&id=<?=$row2['id']?>">Chỉnh sửa</a></td></tr>  
      <?}}?>

      <tr><td><b>Trang nội dung</b></td><td></td><td><a href="?act=page">Xem tất cả</a></td></tr>   
      <?php
      $rs   = $conn->query("select * from $tbl_page order by code");
      while ($row = $rs->fetch_assoc())
      {
      ?>
      <tr><td></td><td><a href="?act=page"><b><?=$row['name']?> </b></a></td><td><a href="?act=page_update&id=<?=$row['id']?>">Chỉnh sửa</a></td></tr>    
      <?}?>
  </table>
</div>