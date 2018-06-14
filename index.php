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
    <header id="header" class="">
    <div class="header-menu">
      <div class="container-t mmenu-mobile">
        <div class="logo-header">
          <figure><a href="<?=$root?>"><img src="<?=$root?>images/logo.png" alt="" class="img-responsive"></a></figure>
        </div>
        <!-- mmenu header -->
        <div class="open-menu hidden-lg hidden-md hidden-sm">
          <i class="menu-line"></i>
          <i class="menu-line"></i>
          <i class="menu-line"></i>
        </div>
        <div class="menu-header mmenu">
          <ul class="clearfix">
            <li <?if($module=='gioi_thieu') echo 'class="underline-from-center active"'; else echo 'class="underline-from-center"';?>><a class="a-hover" href="<?=$root?>gioi-thieu.html">Giới thiệu</a></li>
            <li <?if($module=='product_categories') echo 'class="underline-from-center active"'; else echo 'class="underline-from-center"';?>>
              <a class="a-hover" href="<?=$root?>du-an/">Dự án</a>
              <ul class="sub-menu">
              <?
                $rs=$conn->query("select * from $tbl_product_cat where visibility=1 and display=1");
                while ($row=$rs->fetch_assoc()) {
              ?>
                <li <?if($row['id']==active_menu($module,$id)) echo 'class="sub-menu-list active"'; else echo 'class="sub-menu-list"';?>><a class="a-hover" href="<?=$url->product_cat($row['id'])?>" title="<?=$row['name']?>"><?=$row['name']?></a></li>
              <?}?>
              </ul>
            </li>
            <li class="underline-from-center"><a class="a-hover" href="news-list.html">Nội thất</a></li>
            <li class="underline-from-center"><a class="a-hover" href="news-list.html">Thi công</a></li>
            <li class="underline-from-center"><a class="a-hover" href="news-list.html">Xu hướng</a></li>
            <li class="underline-from-center"><a class="a-hover" href="news-list.html">Bảng giá</a></li>
            <li <?if($module=='lien_he') echo 'class="underline-from-center active"'; else echo 'class="underline-from-center"';?>><a class="a-hover" href="contact.html">Liên hệ</a></li>
          </ul>
        </div>
        <div class="clearfix">
          
        </div>
      </div>
    </div>
  </header><!-- /header -->
      <?
        include "modules/".$module.".php";
        ?>
<footer id="footer" class="">
    <div class="container-t">
      <div class="row">
        <div class="col-sm-4 col-xs-6 about-us">
          <div class="block-title">
            <h2>Về chúng tôi</h2>
          </div>
          <ul>
            <li><a href="" title="">Suctre.com.vn là ai ?</a></li>
            <li><a href="" title="">Gói bản vẽ & Giá gói bản vẽ</a></li>
            <li><a href="" title="">Hướng dẫn mua bản vẽ</a></li>
            <li><a href="" title="">Hướng dẫn xem bản vẽ</a></li>
            <li><a href="" title="">Thỏa thuận sử dụng dịch vụ</a></li>
            <li><a href="" title="">Sản phẩm mẫu</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-xs-6 contact-ctv">
          <div class="block-title">
            <h2>Liên hệ</h2>
          </div>
          <div class="address">
            <p>Tầng 8, Tòa nhà HaNoi Creative City<br>
            Số 1 - Phố lương Yên - Phường Bạch Đằng <br>
            Hai Bà Trưng - Hà Nội<br>
            Email: Nhadep30giay@gmail.com</p>
          </div>

          <div class="block-title">
            <h2>Dành cho cộng tác viên</h2>
          </div>
          <ul>
            <li><a href="" title="">Điều kiện đăng ký thành viên</a></li>
            <li><a href="" title="">Cơ hội cộng tác viên</a></li>
          </ul>
        </div>
        <div class="col-sm-4 col-xs-6 faacebook">
          <div class="block-title">
            <h2>Facebook</h2>
          </div>
          <!-- <div>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-page" data-href="https://www.facebook.com/Nhadep30giay/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Nhadep30giay/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Nhadep30giay/">Nhadep30giay.com</a></blockquote></div>
          </div> -->
        </div>
      </div>
    </div>
  </footer><!-- /footer -->
    <script type="text/javascript">
    $('.slick-dt').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      autoplay: true,
      autoplaySpeed: 1500,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: false,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
      });
  </script>
  </body>

<?php
echo '  </html>';

$conn->close();

?>