<?
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "smtp.gmail.com"; // specify main and backup server
$mail->Port = 465; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = "sale.veitravel@gmail.com"; // your SMTP username or your gmail username
$mail->Password = "veitravel@123456z1"; // your SMTP password or your gmail password
?>