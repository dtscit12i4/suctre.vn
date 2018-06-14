  <?
    if(isset($_POST['txtCheck']) && $_POST['txtCheck']=='ok'){
    $txtName = htmlspecialchars($_POST['txtName']);
    $txtTel = htmlspecialchars($_POST['txtTel']);
    $txtAddress = htmlspecialchars($_POST['txtAddress']);
    $txtEmail = htmlspecialchars($_POST['txtEmail']);
    $txtContent = htmlspecialchars($_POST['txtContent']);
    $baomat=$_POST['6_letters_code'];
    if(empty($txtName))
  {
    $announce1 = "Vui lòng nhập họ tên của bạn";
  }
  elseif(empty($txtEmail))
  {
    $announce2 = "Vui lòng nhập email của bạn";
  }
  elseif(empty($txtTel))
  {
    $announce3 = "Vui lòng nhập điện thoại của bạn";
  }
  elseif(empty($txtAddress))
  {
    $announce5 = "Vui lòng nhập địa chỉ của bạn";
  }
  elseif(empty($txtContent))
  {
    $announce4 = "Vui lòng nhập nội dung liên hệ";
  }
  elseif(empty($_SESSION['letters_code'] ) || strcasecmp($_SESSION['letters_code'], $baomat) != 0)
  {
    $announce = "Mã xác thực không khớp!";
  }
  else
  {
    $ok = $conn->query("insert into $tbl_contact(email,name,phone,address,content,display,created) values ('".$txtEmail."','".$txtName."','".$txtTel."','".$txtAddress."','".$txtContent."','".'1'."','".time()."')");

    if($ok){
            $content_email="<br /> <b>THÔNG TIN  KHÁCH HÀNG:</b><br />".
            (($txtName)?"Họ tên : ".$txtName."<br />":"").
            (($txtTel)?"Số điện thoại : ".$txtTel."<br />":"").
            (($txtAddress)?"Địa chỉ : ".$txtAddress."<br />":"").
            (($txtEmail)?"Email : ".$txtEmail."<br />":"").
            (($txtContent)?"Nội dung : ".$txtContent."<br /><br /><br />":"");
        //gửi mail
            include_once "mail/class.phpmailer.php";
            include_once "mail/class.smtp.php";
             $mail = new PHPMailer();
                $mail->IsSMTP(); // set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // specify main and backup server
                $mail->Port = '465'; // set the port to use
                $mail->SMTPAuth = true; // turn on SMTP authentication
                $mail->SMTPSecure = 'ssl';
                $mail->Username = "noreply.samdihotelcontact@gmail.com"; // your SMTP username or your gmail username
                $mail->Password = "samdi@12345"; // your SMTP password or your gmail password
                
                $emailFrom = "<".$txtEmail.">";
                
                //$from = "tinhve.dev2@gmail.com"; // Reply to this email
                $to=$get->config("email"); // Recipients email ID
                $name=$get->config("page_title"); // Recipient's name
                $mail->From = $txtEmail;
                $mail->FromName = $txtName; // Name to indicate where the email came from when the recepient received
                // $mail->AddCC($get->config('email'));
                $mail->AddAddress($to,htmlspecialchars_decode($name));                  // name is optional
                
                //$mail->AddAddress($to,$name);
                $mail->AddReplyTo($txtEmail,$txtName);
                $mail->WordWrap = 50; // set word wrap
                $mail->IsHTML(true); // send as HTML
                $mail->Subject = "Email liên hệ từ khách";
                $mail->Body = $content_email;
                $mail->AltBody = "Mail nay duoc gui bang PHP Mailer"; //Text Body
                //$mail->SMTPDebug = 2;
                
                if($mail->Send())
                { 
                    redirect($root);
                }
                else
                {
                    $announce="Lỗi từ máy chủ chúng tôi không thể gửi email cho bạn.";
                }
      
    }
    else{$announce = "Lỗi từ máy chủ. Xin vui lòng thử lại lần nữa.";}
    
  }
}
else {
    $txtName = '';
    $txtTel = '';
    $txtAddress = '';
    $txtEmail = '';
    $txtContent = '';
}
?>
  <?
      $q=$conn->query("select * from $tbl_gallery where cat=7 and visibility=1 and display=1");
      $r=$q->fetch_assoc();
  ?>
  <main id="main" class="contact">
    <? include('includes/tab_nav.php') ?>
    <div class="block-contact">
      <div class="container-t">
        <? include('includes/block_list.php') ?>
        <div class="breadcrumb">
          <a href="<?=$root?>" title="Trang chủ" class="a-hover">Trang chủ</a><i class="fa fa-angle-right" aria-hidden="true"></i>
          <a href="javascript:void(0)" title="Liên hệ" class="a-hover active">Liên hệ</a>
        </div>
        <div class="banner">
          <img class="img-responsive" src="<?=$root?>uploads/gal/lienhe_<?=$r['thumbnail']?>" alt="<?=$r['name']?>">
        </div>
        <div class="info-contact">
          <div class="info">
            <div class="title">
              <h3>Địa chỉ</h3>
            </div>
            <?=htmlspecialchars_decode($get->page('dia_chi'))?>
            <br>
            <p style="text-transform: uppercase; color: #ff9900; font-size: 18px;">Hotline</p>
            <p style="font-weight: 700; font-size: 34px; color: #D91213;"><?=$get->page('hot_line', 'info')?></p>
          </div>
          <div class="box-contact">
            <div class="title">
              <h3>Gửi thông tin liên hệ</h3>
            </div>
            <div style="color: #ff0000;text-align: center;"><?if(isset($announce)) echo $announce;?></div>
            <form action="" method="post" class="form-contact">
              <input class="input_form" type="hidden" name="txtCheck" value="ok" />
              <div class="row">
                <span></span>
                <div class="form-group col-sm-6 col-xs-12">
                <small style="color: #ff0000;"><?if(isset($announce1)) echo $announce1;?></small>
                  <input name="txtName" value="<?=$txtName?>" type="text" class="form-control" id="name" placeholder="Họ tên (*)">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                <small style="color: #ff0000;"><?if(isset($announce3)) echo $announce3;?></small>
                  <input name="txtTel" value="<?=$txtTel?>" type="text" class="form-control" id="phone" placeholder="Số điện thoại (*)">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                <small style="color: #ff0000;"><?if(isset($announce2)) echo $announce2;?></small>
                  <input name="txtEmail" value="<?=$txtEmail?>" type="text" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                <small style="color: #ff0000;"><?if(isset($announce5)) echo $announce5;?></small>
                  <input name="txtAddress" value="<?=$txtAddress?>" type="text" class="form-control" id="address" placeholder="Địa chỉ">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                <small style="color: #ff0000;"><?if(isset($announce4)) echo $announce4;?></small>
                  <textarea name="txtContent" class="form-control" rows="2" id="comment" placeholder="Nội dung"><?=$txtContent?></textarea>
                </div>
                <div class="form-group box_captcha col-sm-6 col-xs-12">
                  <img id="captchaimg" src="<?=$root?>captcha_code_file.php?rand=<?php echo rand(); ?>" id="captchaimg">
                  <a href="javascript: refreshCaptcha();"><i class="fas fa-sync-alt" style="color:#82c91e"></i></a>
                  <input id="captcha" type="text" class="input_captcha form-control" name="6_letters_code" maxlength="10" size="32" placeholder="Nhập mã xác nhận (*)">
                </div>
                <div class="form-group box_button col-sm-12 col-xs-12">
                  <button type="submit" class="btn btn-default">Gửi liên hệ</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="maps">
          <div class="box-cont">
           <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi&key=AIzaSyDIcgayYKPPDnRhRPUdgsCi63XC3-VB12k"></script>
        <script type="text/javascript">
          var map;
          function initialize() {
          var myLatlng = new google.maps.LatLng(<?=$get->config('location')?>);
          var myOptions = {
          zoom: 14,
          center: myLatlng,
          draggable: true,
          scrollwheel: false,
          styles: [{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]}]
          };
          map = new google.maps.Map(document.getElementById("div_id"), myOptions);
          var text;
          text='<p class="map-content"><strong>SUCTRE.COM.VN</strong></p><?=htmlspecialchars_decode($get->page("lien_he_chan_trang"))?>';
          text = text.replace(/style="[^"]*"/gi,'');
          var infowindow = new google.maps.InfoWindow(
          { content: text,
          size: new google.maps.Size(100,50),
          position: myLatlng
          });
          infowindow.open(map);
          //var image = '<?=$root?>images/button-prev.png';
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
          };
        </script>
        <body onLoad="initialize()">
          <div  id="div_id" style="height:400px;">
          </div>
        </body>
        </div>
        </div>
      </div>
    </div>
  </main><!-- /main -->
  <script language='JavaScript' type='text/javascript'>
        function refreshCaptcha()
        {
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }
    </script>