<?
    $sql="select * from $tbl_product where id='".$id."' and visibility=1 and display=1";
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
    <meta http-equiv="refresh" content="0;URL=/du-an/<?=$id?>-<?=$str->to_slug($r['name'])?>.html"/>
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
      <?
            $album=$conn->query("select id from $tbl_product_album where cat='".$id."' and visibility=1 and display=1");
            $sql="select * from $tbl_product where id='".$id."' and visibility=1 and display=1";
            $rs=$conn->query($sql);
            $row=$rs->fetch_assoc();
        ?>
    		<div id="navigation-menu">
                <ul class="ul-project blockleft_list">
                <? if ($row['gioi_thieu']) { ?>
                   <li class="active"><i class="fa fa-flag i_detail" aria-hidden="true"></i> <a id="link" href="#section-1">Giới thiệu</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?} if ($row['tong_quan']) { ?>
                   <li class=""><i class="fa fa-building-o i_detail" aria-hidden="true"></i> <a id="link" href="#section-2">Tổng quan</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?} if ($row['vi_tri']) { ?>
                   <li class=""><i class="fa fa-map-marker i_detail" aria-hidden="true"></i> <a id="link" href="#section-3">Vị trí</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?} if ($row['tien_do']) { ?>
                   <li class=""><i class="fa fa-area-chart i_detail" aria-hidden="true"></i> <a id="link" href="#section-4">Tiến độ</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?} if ($row['tien_ich']) { ?>
                   <li class=""><i class="fa fa-paper-plane-o i_detail" aria-hidden="true"></i> <a id="link" href="#section-5">Tiện ích</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?} if ($album->num_rows>0) { ?>
                   <li class=""><i class="fa fa-picture-o i_detail" aria-hidden="true"></i> <a id="link" href="#section-6">Thư viện hình ảnh</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?} if ($row['link_y']) { ?>
                   <li class=""><i class="fa fa-video-camera i_detail" aria-hidden="true"></i> <a id="link" href="#section-7">Video</a><i class="fa fa-caret-right i_project" aria-hidden="true"></i></li>
                <?}?>
                </ul>
                <div class="clearfix"></div>

            </div>
    	</div>
         
        <div class="col-sm-9 col-xs-12 project-right">
            <div class="block-home-title">
                <h1 class="h1-project"><a style="color: #2c2e83;" href="<?=$root?>du-an-bat-dong-san/" title="Dự án">Dự án</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?=$get->product($id)?></h1>
            </div>
            <div class="clearfix"></div>
            <div class="row content-project" style="margin-right: 0;margin-left: 0;margin-bottom: 0;">
            <? if ($row['gioi_thieu']) { ?>
                <div id="section-1" class="select">
                   <h2 class="title_text">Giới thiệu</h2>
                   <p>
                      <?=htmlspecialchars_decode($row['gioi_thieu'])?>
                   </p>
                </div>
            <?}?>
            <? if ($row['tong_quan']) { ?>
                <div id="section-2" class="select">
                   <h2 class="title_text">Tổng quan</h2>
                   <p>
                      <?=htmlspecialchars_decode($row['tong_quan'])?>
                   </p>
                </div>
            <?}?>
            <? if ($row['vi_tri']) { ?>
                <div id="section-3" class="select">
               <h2 class="title_text">Vị trí</h2>
               <div style="width: 86%;margin: 0 auto;">
               <div class="map_contact">
                  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJl7_xhdqcxRrwgrOSV7AQ-ZLhd9mU7RQ&callback=initMap&language=vi"
             type="text/javascript"></script>
                  <script type="text/javascript">
                     var map;
                     function initialize() {
                         var myLatlng = new google.maps.LatLng(<?=$row['vi_tri']?>);
                         var myOptions = {
                             zoom: 17,
                             center: myLatlng,
                             draggable: true,
                             scrollwheel: true,
                             mapTypeId: google.maps.MapTypeId.ROADMAP
                         }
                         map = new google.maps.Map(document.getElementById("div_id"), myOptions);
                         // Biến text chứa nội dung sẽ được hiển thị
                         var text;
                          text= "<b><strong></strong><?=$row['name']?></b>";
                          var infowindow = new google.maps.InfoWindow(
                          { content: text,
                          size: new google.maps.Size(100,50),
                          position: myLatlng
                          });
                          infowindow.open(map);
                         // Biến text chứa nội dung sẽ được hiển thị
                         var image = '<?=$root?>images/point.png';
                         var marker = new google.maps.Marker({
                             position: myLatlng,
                             map: map,
                             title:"",
                             icon: image,
                         });
                     
                         google.maps.event.addListener(map, 'click', function(event){
                             this.setOptions({scrollwheel:true});
                         });
                         google.maps.event.addListener(map, 'mouseover', function(event){
                             this.setOptions({scrollwheel:false});
                         });
                     
                     }
                  </script>
                  <body onLoad="initialize()">
                     <div  id="div_id" style="height:340px; width:100%;"></div>
                  </body>
               </div>
               </div>
               <!-- end map-contact -->
               <div class="clear"></div>
            </div>
            <?}?>
            <? if ($row['tien_do']) { ?>
            <div id="section-4" class="select" style="margin-top: 15px;">
                   <h2 class="title_text">Tiến độ</h2>
                   <p>
                      <?=htmlspecialchars_decode($row['tien_do'])?>
                   </p>
            </div>
            <?}?>
            <? if ($row['tien_ich']) { ?>
            <div id="section-5" class="select">
                   <h2 class="title_text">Tiện ích</h2>
                   <p>
                      <?=htmlspecialchars_decode($row['tien_ich'])?>
                   </p>
            </div>
            <?}?>
            <? if ($album->num_rows>0) { ?>
            <div id="section-6" class="select">
                <h2 class="title_text">Thư viện hình ảnh</h2>
                    <div class="slidercamera" style="width: 86%;margin: 0 auto;"> <!-- slider camera-->
                        <div id="slider-camera-wrapper">
                          <div class="camera_wrap camera_azure_skin" id="camera_wrap_2">
                            <?
                                    $q=$conn->query("select * from $tbl_product_album where cat='".$id."' and visibility=1 and display=1 order by sort");
                                    while($r=$q->fetch_assoc()){
                                ?>
                            <div data-thumb="" data-src="<?=$root?>uploads/product_album/album_<?=$r['thumbnail']?>">
                              
                            </div>
                             <?}?>
                          </div>
                            <div class="clearfix"></div>
                        </div>
                    </div> 
            </div>
            <script type="text/javascript">
    $(window).load(function() { 
    $('#camera_wrap_2').camera({  
               thumbnails: true,
               time:2500,
               height: '67%',
               pagination: false,
           });
           });
</script>
<?}?>
            <? if ($row['link_y']) { ?>
            <div id="section-7" class="select" style="margin-top: 15px;">
                   <h2 class="title_text">Video</h2>
                   <?
                        if ($row['link_y'] != "") {
                        $xvideo = getYoutubeIdFromUrl($row['link_y']);
                    ?>
                        <div style="width: 86%;margin: 0 auto;">
                            <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="http://youtube.com/embed/<?=$xvideo?>"></iframe>
                            </div>
                        </div>
                    <?}?>
            </div>
            <?}?>
            </div>
            <div class="block-home-title">
                <h3 class="h3-project" style="color: #2c2e83;font-size: 16px;">Các dự án khác</h3>
            </div>
            <div class="clearfix"></div>
            <div class="row" style="margin-top: 5px;">
             <?
             $cat=$get->product($id,'cat');
            $sql="select * from $tbl_product where id <>'".$id."' and visibility=1 and display=1 limit 6";
            // $rs=$conn->query(page($sql,"12"));
            $rs=$conn->query($sql);
             if($rs->num_rows==0){
                echo '<div class="content-project"> Dự án đang được cập nhật...</div>';
            }
            else{
            while ($row=$rs->fetch_assoc()) {
        ?>
            <div class="col-md-4" style="line-height: 1.7;padding-left: 0;padding-right: 0;">
            <div class="col-sm-5" style="padding-right: 0;margin-bottom: 15px;">
                <a href="<?=$url->product($row['id'])?>" title="<?=$row['name']?>"><img class="img-responsive" src="<?=$root?>uploads/product/product_<?=$row['thumbnail']?>" alt="<?=$row['name']?>"></a>
            </div>      
            <div class="col-sm-7" style="margin-bottom: 15px;">
                <p class="content-other"><a href="<?=$url->product($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></p>
            </div> 
            <div class="clearfix"></div>
            </div>
        <?} }?>
            </div>
            <!-- <div class="paging col-md-12" style="margin-top: 15px;">
                <?=showpage($page,$pages,$url->product($id));?>                        
            </div> -->
        </div>
    </div>
</div>
<script src="<?=$root?>js/jquery.malihu.PageScroll2id.js"></script>
<script>
    $(window).scroll(function () {
        if (($(window).scrollTop() > 420) && ($(window).scrollTop() < $('.content-project').height())) {
            $('.blockleft_list').addClass('fixed');
         } else {
            $('.blockleft_list').removeClass('fixed');
         }
     });
</script>
<script type="text/javascript">
    $().ready(function(){
        $(window).scroll(function () {
        $('.blockleft_list li').removeClass('active');
        $('.blockleft_list li').find('.mPS2id-highlight-first').parent('li').addClass('active');
        $('.blockleft_list li').find('.mPS2id-highlight-last').parent('li').addClass('active');
        })
    })
</script>
<script>
    (function($){
      jQuery('a#link').each( function(){
            var $this = jQuery(this),
            target = this.hash;
            jQuery(this).click(function (e){
                e.preventDefault();
                if( $this.length > 0 ){
                    if($this.attr('href') == '#' ){
                    // Do nothing
                    }else{
                    jQuery('html, body').animate({
                        scrollTop: (jQuery(target).offset().top) - 85
                        },1000);
                    }
                }
            });
        });
      $(window).load(function(){
        
        /* Page Scroll to id fn call */
        $("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
          highlightSelector:"#navigation-menu a",
          clickEvents:false
        });
        
        /* jquery.address fn */
        $.address.change(function(event) {
          var hash=event.value.split("/")[1] || "#top";
          $.mPageScroll2id("scrollTo",hash,{
            clicked:$("a[href='"+hash+"']")
          });
                });
        
        $("#navigation-menu a,a[href='#top'],a[rel='m_PageScroll2id']").click(function(e) {
                    e.preventDefault();
                    var href=$(this).attr("href");
                    if($.address.value()==="/"+href){
                      $.address.history(false); 
                      $.address.value("#");
                    }else{
                      $.address.history(true); 
                    }
          $.address.value($(this).attr("href"));
                });
        
        /* demo functions */
        $("a[rel='next']").click(function(e){
          e.preventDefault();
          var val="#"+$(this).parent().parent("section").next().attr("id");
          $.address.value(val);
        });
        
      });
    })(jQuery);
  </script>
<?}?>