
    <div class="container-fluid slidercamera"> <!-- slider camera-->
      <div class="row">
        <div id="slider-camera-wrapper">
          <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <?
                    $q=$conn->query("select * from $tbl_gallery where cat=1 and visibility=1 and display=1 order by rand()");
                    while($r=$q->fetch_assoc()){
                ?>
            <div data-thumb="" data-src="<?=$root?>uploads/gal/<?=$r['thumbnail']?>">
              <div class="camera_caption fadeFromBottom">
              <div class="hidden-xs wow slideInLeft" data-wow-duration="1s">
                <h2>
                  <a class="anim-05" href="<?=$r['info']?>" title="<?=$r['name']?>">
                  <?=$r['name']?>
                  </a>    
                </h2>
                <div class="clearfix"></div>
                <div style="float:left;width: 69%;padding-left: 0;padding-right: 0;background: rgba(49, 55, 143,0.9) none repeat scroll 0 0;"><?=htmlspecialchars_decode($r['content'])?></div>
                <div style="float:left;width: 30%;padding-left: 0;padding-right: 0;margin-left: 1%">
                  <span class="span-cammera" style="display: block;width: 100%;font-size: 14px;"><a href="<?=$r['info']?>">Xem thêm <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></span>
                </div>
                <div class="clearfix"></div>
              </div>
              </div>
            </div>
             <?}?>
             
          </div>
            <div class="clearfix"></div>
        </div>
      </div>
    </div> <!-- end slider cammera-->
        <div class="container">
        		<div class="block-home-title"><h2>Dự án</h2></div>
                <div class="block-slider">
                <ul class="scroller_horizontal">
                 <?
                    $rs=$conn->query("select * from $tbl_product where visibility=1 and display=1 order by id desc");
                    if($rs->num_rows>0){
                    while($r=$rs->fetch_assoc()){
                  ?>
                  <li>
                    <div class="item">
                      <a href="<?=$url->product($r['id'])?>" title="<?=$r['name']?>"><figure><img class="replace-2x img-responsive" src="<?=$root?>uploads/product/product_<?=$r['thumbnail']?>" alt="<?=$r['name']?>"></figure></a>
                    <div class="slider-text">
                      <a href="<?=$url->product($r['id'])?>" title="<?=$r['name']?>"><?=$str->crop($r['name'],6)?></a>  
                      <a style="display: block;float:right;font-size: 20px;" class="text-right" href="<?=$url->product($r['id'])?>.html" title="<?=$r['name']?>"><i style="color:transparent;" class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                    </div>
                    </div>
                    <div class="slider-content">
                        <?=htmlspecialchars_decode($r['info'])?>
                    </div>
                  </li>
                 <?} }?>   
                </ul>
                </div>
            <div class="view-more">
                <p class="line-more"></p>
                <p class="text-right"><a href="<?=$root?>du-an-bat-dong-san/" title="Xem thêm">Xem thêm <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
            </div>
        </div><!-- /end project-->
        
        <div class="block-grey">
	        <div class="container">
            <div class="row">
              <div class="col-md-4">
  	        		<div class="block-home-title"><h2>Tin tức nổi bật</h2></div>
                <div class="block-slider">
                  <div class="scroller_slider slider center">
                   <?
                      $rs=$conn->query("select a.* from $tbl_post a,$tbl_post_cat b where a.cat=b.id and b.cat=1 and a.visibility=1 and a.display=1 and b.visibility=1 and b.display=1 order by a.id desc");
                      if($rs->num_rows>0){
                      while($r=$rs->fetch_assoc()){
                    ?>
                    <div class="center-slick">
                      <div class="item">
                            <a href="<?=$url->post($r['id'])?>" title="<?=$r['name']?>"><img class="replace-2x img-responsive" src="<?=$root?>uploads/post/post_<?=$r['thumbnail']?>" alt="<?=$r['name']?>"></a>
                      </div>
                      <div class="slider-content">
                          <a href="<?=$url->post($r['id'])?>" title="<?=$r['name']?>"><?=$r['name']?></a> <br />
                            <!-- <span style="color: #6d6d6d;"><?=date("d\ /\ m/ \ Y",$r['time'])?></span> -->
                            <span style="color: #6d6d6d;"><?=htmlspecialchars_decode($r['info'])?></span>
                      </div>
                    </div>
                   <?} }?>   
                  </div>
                </div>
                <div class="view-more view-more-news">
                  <p class="line-more"></p>
                  <p class="text-right"><a href="<?=$root?>tin-tuc/" title="Xem thêm">Xem thêm <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="block-home-title"><h2>Tin tức</h2></div>
                <div class="block-slider">
                <?
                  $rs=$conn->query("select a.* from $tbl_post a,$tbl_post_cat b where a.cat=b.id and b.cat=1 and a.visibility=1 and a.display=1 and b.visibility=1 and b.display=1 order by a.time desc limit 5");
                  while ($row=$rs->fetch_assoc()) {
                ?>
                  <div class="box_news">
                  <div class="col-sm-4">
                    <a href="<?=$url->post($row['id'])?>" title="<?=$row['name']?>"><img class="img-responsive" src="<?=$root?>uploads/post/post_<?=$row['thumbnail']?>" alt="<?=$row['name']?>"></a>
                  </div>
                  <div class="col-sm-8 box_news_content" style="padding-left: 0;padding-right: 0">
                    <h2 class="h2-home"><a href="<?=$url->post($row['id'])?>" title="<?=$row['name']?>"><?=$str->crop($row['name'],'12')?></a></h2>
                    <p style="color: #aaa;"><?=date('l',$row['time'])?> <?=date('d.m.Y',$row['time'])?></p>
                  </div>
                  <div class="clearfix"></div>
                  </div>
                <?}?>
                </div>
                 <div class="view-more view-more-news">
                  <p class="line-more"></p>
                  <p class="text-right"><a href="<?=$root?>tin-tuc/" title="Xem thêm">Xem thêm <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a></p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="block-home-title"><h2>Video</h2></div>
                <div class="block-slider">
                  <div class="col-md-12">
                  <div class="box_video">
                    <?
                      $rs=$conn->query("select * from $tbl_video where display=1");
                      if($rs->num_rows >0){
                        $row=$rs->fetch_assoc();
                        $xvideo = getYoutubeIdFromUrl($row['link']);
                    ?>
                      <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="http://youtube.com/embed/<?=$xvideo?>"></iframe>
                      </div>
                    <?}?>
                  </div>
                  <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <?$rs=$conn->query("select * from $tbl_post where cat=10 and visibility=1 and display=1 order by time desc");?>
                <div class="block-home-title" style="margin-top: 15px;"><h2><?=$get->post_cat(10)?></h2></div>
                <ul id="scroller">
              <?
                while ($row=$rs->fetch_assoc()) {
              ?>
                <li class="box-news">
                  <div class="news-img col-xs-4">
                    <figure>
                      <a href="<?=$url->post($row['id'])?>"><img src="<?=$root?>uploads/post/post_<?=$row['thumbnail']?>" alt="<?=$row['name']?>" class="img-responsive"></a>
                    </figure>
                  </div>
                  <div class="news-title col-xs-8">
                    <a href="<?=$url->post($row['id'])?>"><?=$row['name']?></a>
                  </div>
                  <div class="clearfix"></div>
                </li>
                <?}?>     
              </ul>
              </div>
            </div>
	        </div>
        </div><!-- /end news-->
        <script type="text/javascript">
        $(window).load(function() {
          $('.scroller_horizontal').slick({
  dots: false,
  infinite: true, 
  speed: 1000,  
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: false,
  responsive: [
    {
      breakpoint: 991, 
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600, 
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false
      }
    },
    { 
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      } 
    }
  ]
});
});
        </script>
<script type="text/javascript">
    (function($) {
      $(function() { //on DOM ready
        $("#scroller").simplyScroll({
          customClass: 'vert',
          orientation: 'vertical',
                manualMode: 'loop',
          frameRate: 20,
          speed: 3
        });
      });
    })(jQuery);
    </script>