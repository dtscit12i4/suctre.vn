<div class="block-header-main hidden-xs">
        <div class="block-slide">
        	<?  
            $gal = $conn->query("select * from $tbl_gallery where cat=8 and display=1 and visibility=1 order by id desc");
            if($gal->num_rows > 0){
                $row_gal=$gal->fetch_assoc();
        ?>
            <img src="<?=$root?>uploads/gal/<?=$row_gal['thumbnail']?>" alt="<?=$row_gal['name']?>" class="img-responsive">
            <?}?>
        </div>
</div>
<div class="container">
    <div class="row">
    	<div class="col-xs-12 project-right">
			<div class="block-home-title" style="border-bottom: none;">
				<h1 class="h1-project" style="color: #2c2e83;border-bottom: none;"><?=htmlspecialchars_decode($get->page('so_do','name'))?></h1>
			</div>
			<div class="content-project" style="margin-top: 10px;">
            <?
              if(!$get->page('so_do')){
                echo 'Thông tin đang được cập nhật...';
            }
            else{
            ?>
				<?=htmlspecialchars_decode($get->page('so_do'))?>
            <?}?>
			</div>
    	</div>
    </div>
</div>