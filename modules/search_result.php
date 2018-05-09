<div class="block-header-main hidden-xs">
        <div class="block-slide">
          <?  
            $gal = $conn->query("select * from $tbl_gallery where cat=4 and display=1 and visibility=1 order by id desc");
            if($gal->num_rows > 0){
                $row_gal=$gal->fetch_assoc();
        ?>
            <img src="<?=$root?>uploads/gal/<?=$row_gal['thumbnail']?>" alt="<?=$row_gal['name']?>" class="img-responsive">
            <?}?>
        </div>
</div>
<div class="container">
    <div class="row">
      <div class="col-sm-3 col-xs-12 project-left">
        <ul class="ul-project cat_ul">
      <?
        $rs=$conn->query("select * from $tbl_product_cat where visibility=1 and display=1");
        while ($row=$rs->fetch_assoc()) {
      ?>
          <li <?if($id==$row['id']) echo 'class="active"';?>><a href="<?=$url->product_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a><i class="fa fa-angle-double-right i_project" aria-hidden="true"></i></li>
        <?}?>
        </ul>
      </div>
      <div class="col-sm-9 col-xs-12 project-right">
          <div class="block-home-title">
            <a style="color: #312883;" href="<?=$root?>" title="bất động sản đà nẵng"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> 
            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            Kết quả tìm kiếm
        </div>
          <?
          $s_key = $_GET['search_key'];
          if($s_key=='')
          {
            header('location: '.$root.'du-an-bat-dong-san/');
          }
          else
          {
            $rs = $conn->query("select * from $tbl_product where name like '%$s_key%' or seo_description like '%$s_key%' or seo_keywords like '%$s_key%' and visibility=1 and display=1 limit 100");
            if($rs->num_rows==0){
                echo '<div class="content-project text-center" style="color:red;"> Không có dự án nào cho từ khóa này</div>';
            }
            else{
          while ($row=$rs->fetch_assoc()) {
          ?>
         <div class="row content-project">
            <div class="col-md-5">
                <a href="<?=$url->product($row['id'])?>" title="<?=$row['name']?>"><img class="img-responsive" src="<?=$root?>uploads/product/product_<?=$row['thumbnail']?>" alt="<?=$row['name']?>"></a>
            </div>      
            <div class="col-md-7">
                <h2 class="h2-project"><a href="<?=$url->product($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></h2>
                <p><?=$str->crop(htmlspecialchars_decode($row['info']),50)?></p>
                <div class="view-more-project">
                    <p class="line-more"></p>
                    <p class="text-right"><a style="color:#e2b600;" href="<?=$url->product($row['id'])?>" title="Chi tiết">Chi tiết <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
            </div>
            </div> 
            </div>
          <?} } }?> 
      </div>
  </div>              
</div>
