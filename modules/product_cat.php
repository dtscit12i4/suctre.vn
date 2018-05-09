<?
    $sql="select * from $tbl_product_cat where id='".$id."' and visibility=1 and display=1";
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
    <meta http-equiv="refresh" content="0;URL=/danh-muc-du-an/<?=$id?>-<?=$str->to_slug($r['name'])?>/"/>
    <?
}
?>
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
                <h1 class="h1-project"><a style="color: #2c2e83;" href="<?=$root?>du-an-bat-dong-san/" title="Dự án">Dự án</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?=$get->product_cat($id)?></h1>
            </div>
            <div class="clearfix"></div>
        <?
            $sql="select * from $tbl_product where cat='".$id."' and visibility=1 and display=1";
            $rs=$conn->query(page($sql,"12"));
            if($rs->num_rows==0){
                echo '<div class="content-project"> Dự án đang được cập nhật...</div>';
            }
            else{
            while ($row=$rs->fetch_assoc()) {
        ?>
            <div class="row content-project">
            <div class="col-sm-5">
                <a href="<?=$url->product($row['id'])?>" title="<?=$row['name']?>"><img class="img-responsive" src="<?=$root?>uploads/product/product_<?=$row['thumbnail']?>" alt="<?=$row['name']?>"></a>
            </div>      
            <div class="col-sm-7">
                <h2 class="h2-project"><a href="<?=$url->product($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></h2>
                <p><?=$str->crop(htmlspecialchars_decode($row['info']),50)?></p>
                <div class="view-more-project">
                    <p class="line-more"></p>
                    <p class="text-right"><a style="color:#e2b600;" href="<?=$url->product($row['id'])?>" title="Chi tiết">Chi tiết <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
            </div>
            </div> 
            </div>
        <?} }?>
            <div class="paging col-md-12">
                <?=showpage($page,$pages,$url->product_cat($id));?>                        
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
<?}?>