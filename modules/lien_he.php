<div class="block-map-lienhe">
              <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi&key=AIzaSyDIcgayYKPPDnRhRPUdgsCi63XC3-VB12k"></script>
              <script type="text/javascript">
              var map;
              function initialize() {
                    var myLatlng = new google.maps.LatLng(<?=$get->config("location")?>);
                    var myOptions = {
                  zoom: 16,
                  center: myLatlng,
                   draggable: true,
                    crollwheel: false,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              map = new google.maps.Map(document.getElementById("div_id"), myOptions); 
                // Biến text chứa nội dung sẽ được hiển thị <-- key cũ &key=AIzaSyDIcgayYKPPDnRhRPUdgsCi63XC3-VB12k-->
              var text;
              text= "<h5><b>Công ty cổ phần đầu tư địa ốc Hoàng Bảo Khánh</b></h5> <b>Địa chỉ:</b> Lô 06 Lý Thánh Tông, An Hải Bắc, Sơn Trà, Đà Nẵng <br><b>Hotline: </b> 0937 550 345 - (05113) 550 345 <br><b>Email: </b> <?=$get->config("email")?>";
                 var infowindow = new google.maps.InfoWindow(
                  { content: text,
                      size: new google.maps.Size(100,50),
                      position: myLatlng
                  });
                     infowindow.open(map);    
                  var marker = new google.maps.Marker({
                    position: myLatlng, 
                    map: map,
                    title:""
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
              <div  id="div_id" style="height:400px; width:100%;color: #333;"></div>
              </body>
</div>
<div class="container block-main">
<div class="row">
<?
  if(isset($_POST['txtCheck']) && $_POST['txtCheck']=='ok'){
$txtName = htmlspecialchars($_POST['txtName']);
$txtPhone = htmlspecialchars($_POST['txtPhone']);
$txtEmail = htmlspecialchars($_POST['txtEmail']);
$txtAddress = htmlspecialchars($_POST['txtAddress']);
$txtContent = htmlspecialchars($_POST['txtContent']);
  if(empty($txtName))
  {
    $announce1 = "Vui lòng nhập họ tên";
  }
  elseif(empty($txtPhone))
  {
    $announce2 = "Vui lòng nhập số điện thoại";
  }
  elseif(empty($txtContent))
  {
    $announce3 = "Vui lòng nhập nội dung";
  }
  else
  {
    $ok = $conn->query("insert into $tbl_contact (name,phone,email,address,content,created,display) values ('".$txtName."','".$txtPhone."','".$txtEmail."','".$txtAddress."','".$txtContent."','".time()."',1)");

    if($ok){
            $content_email="<br /> <b>THÔNG TIN  KHÁCH HÀNG:</b><br />".
            (($txtName)?"Họ tên : ".$txtName."<br />":"").
            (($txtPhone)?"Số điện thoại : ".$txtPhone."<br />":"").
            (($$txtAddress)?"Số điện thoại : ".$$txtAddress."<br />":"").
            (($txtEmail)?"Email : ".$txtEmail."<br />":"").
            (($txtContent)?"Nội dung : ".$txtContent."<br /><br /><br />":"");
        //gửi mail
            include_once "./mail/class.phpmailer.php";
            include_once "./mail/class.smtp.php";
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
                $mail->AltBody = "Mail nay duoc gui bang PHP Mailer - tinhve.vn"; //Text Body
                //$mail->SMTPDebug = 2;
                
                if($mail->Send())
                { 
                    redirect($root);
                }
                else
                {
                    $announce="Có lỗi xảy ra từ máy chủ chúng tôi không thể gửi email đến bạn.";
                }
      
    }
    else{$announce = "Có lỗi xảy ra từ máy chủ. Vui lòng thử lại.";}
    
  }
}
else {
    $txtName = '';
    $txtPhone = '';
    $txtEmail = '';
    $txtContent = '';
    $txtAddress = '';
}
?>


<div class="box_lienhe">
        <div class="col-md-6 col-sm-6 col-xs-12 left_content">
            <h2 class="heading-lienhe">Văn Phòng</h2>
            <?
              if(!$get->page('lien_he')){
                echo '<div class="content-project"> Thông tin đang được cập nhật...</div>';
            }
            else{
            ?>
            <p><?=htmlspecialchars_decode($get->page('lien_he'))?></p>
            <?}?>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 right_content ">
          <h2 class="heading-lienhe">Thông Tin Liên Hệ</h2>
            <div class="row blockleft_detail">
                    <div style="color: #ff0000;text-align: center;"><?if(isset($announce)) echo $announce;?></div>
                    <form class="form_contact" method="post" action="">
                        <input class="input_form" type="hidden" name="txtCheck" value="ok" />
                        <div class="col-xs-12">
                            <div><label for="">Họ tên <span>(*)</span></label></div>
                            <small><?if(isset($announce1)) echo $announce1;?></small>
                            <input type="text" name="txtName" value="<?=$txtName?>" placeholder="Họ và tên">
                        </div>
                        <div class="col-xs-12">
                            <div><label for="">Số điện thoại <span>(*)</span></label></div>
                            <small><?if(isset($announce2)) echo $announce2;?></small>
                            <input type="text" name="txtPhone" value="<?=$txtPhone?>" placeholder="Số điện thoại">
                        </div>
                        <div class="col-xs-12">
                            <div><label for="">Email</label></div>
                            <input type="email" name="txtEmail" value="<?=$txtEmail?>" placeholder="Email">
                        </div>
                        <div class="col-xs-12">
                            <div><label for="">Địa chỉ</label></div>
                            <input type="text" name="txtAddress" value="<?=$txtAddress?>" placeholder="Địa chỉ">
                        </div>
                        <div class="col-xs-12">
                            <div><label for="">Nội dung <span>(*)</span></label></div>
                            <small><?if(isset($announce3)) echo $announce3;?></small>
                            <textarea type="" name="txtContent" value="<?=$txtContent?>" placeholder="Nội dung"></textarea>
                        </div>
                        <div><label><span><em>(*) là những trường bắt buộc nhập</em></span></label></div>
                        <button type="submit" name="send" value="submit()">Gửi</button>
                    </form>
                </div>
        </div>
</div>
</div>
</div>

  