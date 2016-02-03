<?php
require "PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
if(isset($_POST['company'])){
    $company = $_POST['company'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['content'])){
    $content = $_POST['content'];
}

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.163.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'tofujoy@163.com';                 // SMTP username
$mail->Password = '10040622';                           // SMTP password // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('tofujoy@163.com', $company);
$mail->addReplyTo($email, $email);
$mail->addAddress('61424330@qq.com', 'kcswag');     // Add a recipient

$mail->Subject = "有公司给我留言！({$email})";
$mail->Body = $content;


/*if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}*/
if($mail->send()) {
    echo "<script>alert('感谢您的留言，我会尽快回复！');window.location.href='index.html';</script>";
}