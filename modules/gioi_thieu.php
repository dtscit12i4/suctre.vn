<div class="block-header-main hidden-xs">
        <div class="block-slide">
        	<?  
            $gal = $conn->query("select * from $tbl_gallery where cat=3 and display=1 and visibility=1 order by id desc");
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
				$rs=$conn->query("select * from $tbl_post where cat=15 and visibility=1 and display=1");
                $count=0;
				while ($row=$rs->fetch_assoc()) {
			?>
    			<li <?if($id==$row['id']||($count==0 && $id==0)) echo 'class="active"';?>><a href="<?=$url->gioi_thieu($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a><i class="fa fa-angle-double-right i_project" aria-hidden="true"></i></li>
    		<? $count++;}?>
    		</ul>
    	</div>
        <div class="col-sm-9 col-xs-12 project-right">
        <?
            if($id==0) {
                $rs=$conn->query("select * from $tbl_post where cat=15 and visibility=1 and display=1");
                $row=$rs->fetch_assoc();
                $id=$row['id'];
            }
        ?>
            <div class="block-home-title">
                <h1 class="h1-project"><a style="color: #2c2e83;" href="<?=$root?>gioi-thieu/" title="Giới thiệu">Giới thiệu</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?=$get->post($id)?></h1>
            </div>
            <div class="clearfix"></div>
        <?
            $sql="select * from $tbl_post where id='".$id."' and visibility=1 and display=1";
            $rs=$conn->query($sql);
            $row=$rs->fetch_assoc();
            if(!$row['content']){
                echo '<div class="content-project"> Thông tin đang được cập nhật...</div>';
            }
            else{
        ?>
            <div class="content-project">
                <?=htmlspecialchars_decode($row['content'])?>
            </div>
        <?}?>
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
