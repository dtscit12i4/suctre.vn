<?
    $sql="select * from $tbl_post where id='".$id."' and visibility=1 and display=1";
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
$exact_url = $id.'-'.$str->to_slug($r['name']).".html";

if($_GET['slug']!=$exact_url)
{
    ?>
    <meta http-equiv="refresh" content="0;URL=/tin-tuc-xem/<?=$id?>-<?=$str->to_slug($r['name'])?>.html"/>
    <?
}
?>
<div class="block-header-main hidden-xs">
        <div class="block-slide">
        	<?  
            $gal = $conn->query("select * from $tbl_gallery where cat=5 and display=1 and visibility=1 order by id desc");
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
				$rs=$conn->query("select * from $tbl_post_cat where cat=1 and visibility=1 and display=1");
				while ($row=$rs->fetch_assoc()) {
			?>
    			<li <?if($id==$row['id']|$row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->post_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a><i class="fa fa-angle-double-right i_project" aria-hidden="true"></i></li>
    		<?}?>
    		</ul>
    	</div>
        <div class="col-sm-9 col-xs-12 project-right">
            <div class="block-home-title">
                <h1 class="h1-project"><a style="color: #2c2e83;" href="<?=$root?>tin-tuc/" title="Tin tức">Tin tức</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?=$get->post_cat($get->post($id,'cat'))?></h1>
            </div>
            <div class="clearfix"></div>
        <?
            $sql="select * from $tbl_post where id='".$id."' and visibility=1 and display=1";
            $rs=$conn->query($sql);
            $row=$rs->fetch_assoc();
        ?>
            <div class="content-project" style="margin-top: 10px;">
            <h2 class="title-news"><?=$row['name']?></h2>    
            <?
                if((!$row['content']) && (!$row['info'])){
                echo 'Thông tin đang được cập nhật...';
            }
            else{
            ?>
            <p style="color: #777;font-style: italic;margin-bottom: 15px;">
            <?=$row['info']?>
                
            </p>     
            <?=htmlspecialchars_decode($row['content'])?> 
            <?}?> 
            </div>
            <div class="block-home-title">
                <h3 class="h3-project" style="color: #2c2e83;">Tin liên quan</h3>
            </div>
            <div class="clearfix"></div>
            <ul class="ul-news">
            <?
                $cat=$get->post($id,'cat');
                $rs=$conn->query("select * from $tbl_post where cat='".$cat."' and id<>'".$id."' and visibility=1 and display=1");
                if($rs->num_rows==0){
                echo '<div class="content-project"> Thông tin đang được cập nhật...</div>';
            }
            else{
                while ($row=$rs->fetch_assoc()) {
            ?>
                <li><i class="fa fa-check-circle" aria-hidden="true"></i> <a href="<?=$url->post($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
            <?} }?>
            </ul>
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