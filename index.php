<?php
@session_start();
@ob_start();

// show PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('PATH_SYSTEM', 'tinhve');

include "includes/index.php";
include "config.php";
include "variables.php";


// if($module=='logout'){unset($_SESSION['ses_login_email']);unset($_SESSION['ses_login_pass']);header('location: '.$root.'account/');}



echo '
	<!DOCTYPE html>
	<html lang="vi" xml:lang="vi" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">

 ';

include "page_header.php";

?>
	
	<body>

    <div class="tv_wrapper">
      <!--  <div class="menumobile hidden-lg hidden-md"> <!-- mmenu -->
          <!--  <div class="header">
                <a href="#menu"></a>
                <div class="clear"></div>
            </div>
            <nav id="menu">
                <ul>
                    <li <?if($module==''|$module=='home') echo 'class="active"';?>><a href="<?=$root?>">Trang chủ</a></li>
                            <li <?if($module=='gioi_thieu') echo 'class="active"';?>><a href="<?=$root?>gioi-thieu/">Giới thiệu</a></li>
                            <li <?if($module=='product_cat'|$module=='product'|$module=='product_categories') echo 'class="active"';?>><a href="<?=$root?>du-an-bat-dong-san/">Dự án</a>
                                <ul class="child-menu">
                                <?
                                    $rs=$conn->query("select * from $tbl_product_cat where visibility=1 and display=1");
                                    while ($row=$rs->fetch_assoc()) {
                                ?>
                                    <li <?if($row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->product_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
                                <?}?>
                                </ul>
                            </li>
                            <li <?if($module=='tin_tuc'|$module=='tin_tuc_xem') echo 'class="active"';?>><a href="<?=$root?>tin-tuc/">Tin tức</a>
                                <ul class="child-menu-news">
                                <?
                                    $rs=$conn->query("select * from $tbl_post_cat where cat=1 and visibility=1 and display=1");
                                    while ($row=$rs->fetch_assoc()) {
                                ?>
                                    <li <?if($row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->post_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
                                <?}?>
                                </ul>
                            </li>
                            <li <?if($module=='thu_vien') echo 'class="active"';?>><a href="<?=$root?>thu-vien.html">Thư viện</a></li>
                            <li <?if($module=='tuyen_dung'|$module=='tuyen_dung_xem') echo 'class="active"';?>><a href="<?=$root?>tuyen-dung/">Tuyển dụng</a></li>
                            <li <?if($module=='lien_he') echo 'class="active"';?>><a href="<?=$root?>lien-he.html">Liên hệ</a></li>
                </ul>
            </nav>
        </div> -->
    	<div class="block-top">
    		<div class="container container-new">
    			<div class="row">
    				<div class="col-sm-5 top-left">
    					<i class="fa fa-phone" aria-hidden="true"></i> <?=$get->config('phone')?>
    				</div>
    				<div class="col-sm-7 text-right top-right hidden-xs">    					
    					<i class="fa fa-envelope-o" aria-hidden="true"></i> <?=$get->config('email')?>
    					<a class="fb" style="background: #3072aa;" target="_blank" href="<?=$get->config('social_facebook')?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    					<a class="gplus" style="background: #cd3333;" target="_blank" href="<?=$get->config('social_googleplus')?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                         <a class="ins" style="background: #0082cb;border-radius: 50%;font-size: 12px;font-weight: bold;line-height: 20px;" target="_blank" href="<?=$get->config('social_zalo')?>">z</a>
    					<a class="youtube" style="background: #cd3333;" target="_blank" href="<?=$get->config('social_youtube')?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
    					<!--<a class="ins" style="background: #2e5789;" target="_blank" href="<?=$get->config('social_instagram')?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>-->
    					<a class="skype" style="background: #26aff2;" href="skype:<?=$get->config('skype')?>?chat"><i class="fa fa-skype" aria-hidden="true"></i></a>
    				</div>
    			</div>
    		</div>
    	</div><!--/end block-top-->
        
    	<div class="block-header" id="task_flyout">
    		<div class="container container-new">
    			<div class="row" style="position: relative;">
    				<div class="col-md-5 logo"><a href="<?=$root?>"><img class="img-responsive" src="<?=$root?>images/logo_hoangbaokhanh.png" alt="hoangbaokhanh"></a></div>
    				<div class="col-md-7 text-right">
    					<ul class="menutop hidden-sm hidden-xs">
    						<li <?if($module==''|$module=='home') echo 'class="active"';?>><a href="<?=$root?>">Trang chủ</a></li>
    						<li <?if($module=='gioi_thieu') echo 'class="active"';?>><a href="<?=$root?>gioi-thieu/">Giới thiệu</a></li>
    						<li <?if($module=='product_cat'|$module=='product'|$module=='product_categories') echo 'class="active"';?>><a href="<?=$root?>du-an-bat-dong-san/">Dự án</a>
                                <ul class="child-menu">
                                <?
                                    $rs=$conn->query("select * from $tbl_product_cat where visibility=1 and display=1");
                                    while ($row=$rs->fetch_assoc()) {
                                ?>
                                    <li <?if($row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->product_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
                                <?}?>
                                </ul>
                            </li>
    						<li <?if($module=='tin_tuc'|$module=='tin_tuc_xem') echo 'class="active"';?>><a href="<?=$root?>tin-tuc/">Tin tức</a>
                                <ul class="child-menu-news">
                                <?
                                    $rs=$conn->query("select * from $tbl_post_cat where cat=1 and visibility=1 and display=1");
                                    while ($row=$rs->fetch_assoc()) {
                                ?>
                                    <li <?if($row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->post_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
                                <?}?>
                                </ul>
                            </li>
                <li <?if($module=='thu_vien') echo 'class="active"';?>><a href="<?=$root?>thu-vien.html">Thư viện</a></li>
    						<li <?if($module=='tuyen_dung'|$module=='tuyen_dung_xem') echo 'class="active"';?>><a href="<?=$root?>tuyen-dung/">Tuyển dụng</a></li>
    						<li <?if($module=='lien_he') echo 'class="active"';?>><a href="<?=$root?>lien-he.html">Liên hệ</a></li>
    					</ul>
                        <button type="button" class="button-search hidden-xs"><a title="Tìm kiếm" class="wd-search"><i class="fa fa-search" aria-hidden="true"></i></a></button>
    				</div>
    				<!-- <div class="col-md-1 button-search"><i class="fa fa-search" aria-hidden="true"></i></div> -->
                    <div class="col-md-3 col-sm-3 hidden-xs box-search hide">
                           <form action="<?=$root?>" method="GET">
                              <input type="hidden" name="module" value="search_result">
                              <input type="text" name="search_key" value="" placeholder="Tìm kiếm" class="ipt-key">
                              <input type="submit" name="submit" value="" placeholder="" class="ipt-submit">
                           </form>
                        </div>
    			</div>
    		</div>    		
    	</div><!--/end block-header-->
        <!-- <div class="col-xs-12 visible-xs box-search-home">
           <form action="<?=$root?>" method="GET">
              <input type="hidden" name="module" value="search_result">
              <input type="text" name="search_key" value="" placeholder="Tìm kiếm" class="ipt-key">
              <input type="submit" name="submit" value="" placeholder="" class="ipt-submit">
           </form>
        </div> -->
        <div class="clearfix"></div>
        <!-- <div class="input-group visible-xs">
       <input type="text" class="form-control" placeholder="Tìm Kiếm ...">
       <span class="input-group-btn">
        <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
       </span>
      </div> -->
      <div class="nav_respon"> <!-- mmenu -->
          <div class="booking-toggle" style="display: none;">
            <a href=""><img src="<?=$root?>images/menu-list.png"></a>
          </div>
          <div style="display: none;" class="forcus_nav_menu" id="bookingbox">
            <ul>
              <li <?if($module==''|$module=='home') echo 'class="active"';?>><a href="<?=$root?>">Trang chủ</a></li>
              <li <?if($module=='gioi_thieu') echo 'class="active"';?>><a href="<?=$root?>gioi-thieu/">Giới thiệu</a></li>
              <li style="position: relative;" <?if($module=='product_cat'|$module=='product'|$module=='product_categories') echo 'class="active"';?>><span class="expand"></span><a href="<?=$root?>du-an-bat-dong-san/">Dự án</a>
                  <ul class="child-menu childx">
                  <?
                      $rs=$conn->query("select * from $tbl_product_cat where visibility=1 and display=1");
                      while ($row=$rs->fetch_assoc()) {
                  ?>
                      <li <?if($row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->product_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
                  <?}?>
                  </ul>
              </li>
              <li style="position: relative;" <?if($module=='tin_tuc'|$module=='tin_tuc_xem') echo 'class="active"';?>><span class="expand"></span><a href="<?=$root?>tin-tuc/">Tin tức</a>
                  <ul class="child-menu-news childx">
                  <?
                      $rs=$conn->query("select * from $tbl_post_cat where cat=1 and visibility=1 and display=1");
                      while ($row=$rs->fetch_assoc()) {
                  ?>
                      <li <?if($row['id']==active_menu($module,$id)) echo 'class="active"';?>><a href="<?=$url->post_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
                  <?}?>
                  </ul>
              </li>
              <li <?if($module=='thu_vien') echo 'class="active"';?>><a href="<?=$root?>thu-vien.html">Thư viện</a></li>
              <li <?if($module=='tuyen_dung'|$module=='tuyen_dung_xem') echo 'class="active"';?>><a href="<?=$root?>tuyen-dung/">Tuyển dụng</a></li>
              <li <?if($module=='lien_he') echo 'class="active"';?>><a href="<?=$root?>lien-he.html">Liên hệ</a></li>
            </ul>
        </div>
        </div> <!-- end mmenu -->
    	<?
        include "modules/".$module.".php";
        ?>

		<div class="block-partner hidden-xs">
	        <div class="container">
	        	<div class="row">
                    <div class="col-md-3 partner-title"><h3>Đối tác & Khách hàng</h3></div>
	        		<div class="col-md-9 partner-slide">
                        <ul class="scroller_partner-slide">
                 <?
                    $rs=$conn->query("select * from $tbl_gallery where cat=2 and visibility=1 and display=1 order by rand()");
                    if($rs->num_rows>0){
                    while($r=$rs->fetch_assoc()){
                  ?>
                  <li>
                    <div class="item">
                      <a href="<?=$r['info']?>" title="<?=$r['name']?>" target="_blank"><figure><img class="replace-2x img-responsive" src="<?=$root?>uploads/gal/doitac_<?=$r['thumbnail']?>" alt="<?=$r['name']?>"></figure></a>
                    </div>
                  </li>
                 <?} }?>   
                </ul>
                    </div>
	        	</div>
	        </div>
		</div><!-- /end partner-->
        <div class="block-footer">
          <div class="container block-child-footer">
            <div class="col-md-6 col-sm-6 col-xs-12 footer-left">
                <?=htmlspecialchars_decode($get->page('lien_he_chan_trang'))?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 footer-right">
                <div class="text-right support">
                    <p><a href="<?=$root?>support.html" title="Hỗ trợ khách hàng">Hỗ trợ khách hàng</a></p>
                    <p><a href="<?=$root?>sitemap.html" title="Sơ đồ website">Sơ đồ website</a></p>
                    <p><a href="<?=$root?>lien-he.html" title="Liên hệ">Liên hệ</a></p>
                </div>
                <div class="text-right copyright">
                    <?=htmlspecialchars_decode($get->page('ban_quyen'))?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix visible-xs"></div>
          </div>
            <div class="clearfix visible-xs"></div>
          <span id="top-link-block" class="hidden">
            <a href="#top" class="well well-sm"  onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
                <i class="fa fa-chevron-up" aria-hidden="true"></i>
            </a>
        </span><!-- /top-link-block -->
        </div>
    <div class="rig_slide_box_fb"><!--HOTLINE RIGHT-->
        <div class="fbplbadge">
        </div>
        <div class="box_content_fb">
            <a href=""><p><i class="fa fa-phone" aria-hidden="true"></i> :<span> <?=$get->page('hot_line1','info')?></span></p></a>
            <a href=""><p><i class="fa fa-phone" aria-hidden="true"></i> :<span> <?=$get->page('hot_line2','info')?></span></p></a>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
    <script type="text/javascript" src="<?=$root?>js/style.js"></script>
    <script type="text/javascript">
        $('.scroller_partner-slide').slick({
  dots: false,
  appendArrows: $(''),
  infinite: true, 
  speed: 1000,  
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  responsive: [
    {
      breakpoint: 1024, 
      settings: {
        slidesToShow: 3,
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
    </script>
    <script type="text/javascript" language="javascript">
        $().ready(function(){
            $('.button-search').click(function(){
                if($('.box-search').hasClass('hide'))
                {
                     $('.box-search').addClass('show');
                     $('.box-search').removeClass('hide');
                }
                else
                {
                    $('.box-search').removeClass('show');
                     $('.box-search').addClass('hide');
                }
            })
     })

    </script>
    <script type="text/javascript">
    if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
        });
    }
</script>
<script>
    $('.booking-toggle').click(function(){
        $('#bookingbox').slideToggle(500);
        return false;
    });
</script>
<script type="text/javascript">
  $("span.expand").click(function(){
      $pr = $(this).parent("li");
      if ($pr.hasClass("act")) {  
        $pr.removeClass("act");
        $pr.find("ul.childx").stop().slideUp("medium");
        $(this).css({"background":"url(images/icon-1.png) center center no-repeat"});
      } else {
        $pr.find("ul.childx").stop().slideDown("medium");
        $pr.addClass("act");
        $(this).css({"background":"url(images/icon-2.png) center center no-repeat"});
      }
    });
</script>
<script>
    $(window).scroll(function(){
        if ($(this).scrollTop() > 26) {
            $('#task_flyout').addClass('fixed');
        } else {
            $('#task_flyout').removeClass('fixed');
        }
    });

</script>
	</body>

<?php
echo '	</html>';

$conn->close();

?>