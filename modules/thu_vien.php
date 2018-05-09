        <div class="container">
        		<div class="block-home-title"><h1 class="h1-photo">Thư viện</h1></div>
                <div class="block-slider">
                 <?
                    $rs=$conn->query("select * from $tbl_gallery where cat=9 and visibility=1 and display=1 order by id desc");
                    if($rs->num_rows==0){
                      echo '<div style="padding-left:15px;" class="content-project"> Thông tin đang được cập nhật...</div>'; 
                    }
                    else {
                    while($r=$rs->fetch_assoc()){
                  ?>
                  <div class="col-sm-4 col-xs-6 scroller_horizontal respon-photo">
                    <div class="item">
                    <a class="fancybox" href="<?=$root?>uploads/gal/<?=$r['thumbnail']?>" data-fancybox-group="gallery_<?=$r['id']?>" title="<?=$r['name']?>"><figure><img class="replace-2x img-responsive" src="<?=$root?>uploads/gal/photo_<?=$r['thumbnail']?>" alt="<?=$r['name']?>"></figure></a>
                    <div class="slider-text">
                      <a class="fancybox" href="<?=$root?>uploads/gal/<?=$r['thumbnail']?>" title="<?=$r['name']?>"><?=$str->crop($r['name'],6)?></a>  
                      <a style="display: block;float:right;font-size: 20px;" class="fancybox text-right" href="<?=$root?>uploads/gal/<?=$r['thumbnail']?>" title="<?=$r['name']?>"><i style="color:transparent;" class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                    </div>
                    <?
                                        $alb=$conn->query("select * from $tbl_gallery_album where display=1 and visibility=1 and cat='".$r['id']."'");
                                        while($row_alb=$alb->fetch_assoc()){
                                    ?>
                      
                      <a class="other_fancy fancybox" href="<?=$root?>uploads/gallery_album/<?=$row_alb['thumbnail']?>" data-fancybox-group="gallery_<?=$r['id']?>" title="<?=$r['name']?>"><figure><img class="replace-2x img-responsive" src="<?=$root?>uploads/gallery_album/album_<?=$row_alb['thumbnail']?>" alt="<?=$r['name']?>"></figure></a>
                    <div class="other_fancy slider-text">
                      <a class="fancybox" href="<?=$root?>uploads/gallery_album/<?=$row_alb['thumbnail']?>" title="<?=$r['name']?>"><?=$str->crop($r['name'],6)?></a>  
                      <a style="display: block;float:right;font-size: 20px;" class="fancybox text-right" href="<?=$root?>uploads/gallery_album/<?=$row_alb['thumbnail']?>" title="<?=$r['name']?>"><i style="color:transparent;" class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                    </div>
                     <?}?>
                    </div>
                    <div class="slider-content">
                    </div>
                   </div>
                 <?} }?>   
                </div>
        </div><!-- /end project-->
       <script type="text/javascript">
     $(window).load(function() {
       $(".fancybox").fancybox({ 
        openEffect: "none",
        closeEffect: "none",
        //  minWidth  : 800,
        // minHeight : 456,
        //  minWidth  : "60%", 
        // minHeight : "40%", 
        maxWidth: "100%",
        maxHeight: "100%",
        helpers : {
            title : {
                type: 'inside',
            }
        }
    });
       });
    </script>