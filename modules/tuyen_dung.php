<?
    if($id<>0) {
         $sql="select * from $tbl_post_cat where id='".$id."' and visibility=1 and display=1";
    $rs=$conn->query($sql);
    $r = $rs->fetch_assoc();
    if($rs->num_rows==0){
        ?>
        <br /><br />
        <strong>Không tồn tại đường dẫn này</strong>
        <meta http-equiv="refresh" content="2;URL=<?=$root?>"/>
        <?
    }
else
{
$exact_url = $id.'-'.$str->to_slug($r['name']);

if($_GET['slug']!=$exact_url)
{
    ?>
    <meta http-equiv="refresh" content="0;URL=/tuyen-dung/<?=$id?>-<?=$str->to_slug($r['name'])?>/"/>
    <?
}
}
}
else {
    if(isset($_GET['slug'])){
    if($_GET['slug']!='')
{
    ?>
    <meta http-equiv="refresh" content="0;URL=/tuyen-dung/"/>
    <?
}
}
}
?>
<div class="block-header-main hidden-xs">
        <div class="block-slide">
        	<?  
            $gal = $conn->query("select * from $tbl_gallery where cat=6 and display=1 and visibility=1 order by id desc");
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
				$rs=$conn->query("select * from $tbl_post_cat where cat=2 and visibility=1 and display=1");
				while ($row=$rs->fetch_assoc()) {
			?>
    			<li <?if($id==$row['id']) echo 'class="active"';?>><a href="<?=$url->tuyen_dung_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a><i class="fa fa-angle-double-right i_project" aria-hidden="true"></i></li>
    		<?}?>
            <?
                $rs=$conn->query("select * from $tbl_post where cat=2 and visibility=1 and display=1");
                while ($row=$rs->fetch_assoc()) {
            ?>
                <li <?if($id==$row['id']) echo 'class="active"';?>><a href="<?=$url->tuyen_dung($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a><i class="fa fa-angle-double-right i_project" aria-hidden="true"></i></li>
            <?}?>
                <li <?if($module=='lien_he') echo 'class="active"';?>><a href="<?=$root?>lien-he.html" title="Thông tin liên hẹ">Thông tin liên hệ</a><i class="fa fa-angle-double-right i_project" aria-hidden="true"></i></li>
    		</ul>
    	</div>
        <div class="col-sm-9 col-xs-12 project-right">
            <div class="block-home-title">
                <?if($id==0){?>
                <h1 class="h1-project"><a style="color: #2c2e83;" href="<?=$root?>tuyen-dung/" title="Tuyển dụng">Tuyển dụng</a></h1>
            <?} else{?>
                <h1 class="h1-project"><a style="color: #2c2e83;" href="<?=$root?>tuyen-dung/" title="Tuyển dụng">Tuyển dụng</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?=$get->post_cat($id)?></h1>
            <?}?>
            </div>
            <div class="clearfix"></div>
        <?
            if($id==0) {
                $sql="select a.* from $tbl_post a,$tbl_post_cat b where a.cat=b.id and b.cat=2 and a.visibility=1 and a.display=1 and b.visibility=1 and b.display=1 order by a.time desc";
            }
            else {
                $sql="select * from $tbl_post where cat='".$id."' and visibility=1 and display=1 order by time desc";
            }
            $rs=$conn->query(page($sql,"12"));
            if($rs->num_rows==0){
                echo '<div class="content-project"> Thông tin đang được cập nhật...</div>';
            }
            else{
            while ($row=$rs->fetch_assoc()) {
        ?>
            <div class="row content-project">
            <div class="col-sm-5">
                <a href="<?=$url->tuyen_dung($row['id'])?>" title="<?=$row['name']?>"><img class="img-responsive" src="<?=$root?>uploads/post/post_<?=$row['thumbnail']?>" alt="<?=$row['name']?>"></a>
            </div>      
            <div class="col-sm-7">
                <h2 class="h2-project"><a href="<?=$url->tuyen_dung($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></h2>
                <p><?=$str->crop(htmlspecialchars_decode($row['info']),50)?></p>
                <div class="view-more-project">
                    <p class="line-more"></p>
                    <p class="text-right"><a style="color:#e2b600;" href="<?=$url->tuyen_dung($row['id'])?>" title="Xem thêm">Chi tiết <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
            </div>
            </div> 
            </div>
        <?} }?>
            <div class="paging col-md-12">
            <?if($id==0) {?>
                <?=showpage($page,$pages,$root.'tuyen-dung/');?>  
            <?} else{?> 
                <?=showpage($page,$pages,$url->tuyen_dung_cat($id));?> 
            <?}?> 
            </div>
        </div>
    </div>
</div>
<script>
    $(window).scroll(function () {
        if (($(window).scrollTop() > 420) && ($(window).scrollTop() < $('.project-right').height())) {
            $('.cat_ul').addClass('fixed');
         } else {
            $('.cat_ul').removeClass('fixed');
         }
     });
</script>
