<meta charset="utf-8">
<?php
require ROOT.'/smtpmail/PHPMailerAutoload.php';

session_start();
echo"<pre>";

$ketnoi=mysqli_connect("localhost","root","","dochoi")or die("ko the ket noi");
echo "ban da dang ky thanh cong:"."<br>";?>
<a href="index.php" style="text-decoration:none">Quay lại trang chủ</a>
<?php
$em=mysqli_real_escape_string($ketnoi,$_SESSION['em']);
$ps=mysqli_real_escape_string($ketnoi,$_SESSION['ps']);
$ps=md5($ps);
$re=mysqli_real_escape_string($ketnoi,$_SESSION['rp']);
$re=md5($re);
$dc=mysqli_real_escape_string($ketnoi,$_SESSION['dc']);
$sdt=mysqli_real_escape_string($ketnoi,$_SESSION['sdt']);
$sqll="insert into dangky (	Email,pass,Repass,Diachi,SDT)values ('$em','$ps','$re','$dc','$sdt')";
mysqli_query($ketnoi,$sqll);
$em1=$_SESSION['em'];
$ps1=$_SESSION['ps'];
$re1=$_SESSION['rp'];
$dc1=$_SESSION['dc'];
$sdt1=$_SESSION['sdt'];
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');



//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port =  465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "anhwadinh911@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "anhwadinh115";

//Set who the message is to be sent from
$mail->setFrom('anhwadinh911@gmail.com', 'chuong');

//Set an alternative reply-to address
$mail->addReplyTo('anhwadinh911@gmail.com', 'chuong');

//Set who the message is to be sent to
$mail->addAddress($em1);

//Set the subject line
$mail->Subject = $em1.$ps1.$re1.$dc1.$sdt1;



//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($em1.$ps1.$re1.$dc1.$sdt1);

//Replace the plain text body with one created manually
$mail->AltBody ='$em1.$ps1.$re1.$dc1.$sdt1' ;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>