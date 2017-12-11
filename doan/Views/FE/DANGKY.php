<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
session_start();
$em = isset($_POST['em'])?$_POST['em']:"";
$pass = isset($_POST['pass'])?$_POST['pass']:"";
$repass = isset($_POST['repass'])?$_POST['repass']:"";
$dc = isset($_POST['dc'])?$_POST['dc']:"";
$sdt = isset($_POST['sdt'])?$_POST['sdt']:"";
?>

<body>
<center><p>Đăng ký</p></center>

<form  action="DANGKY.php" method="post" >
<table border="1" align="center" >
<tr><td>Email:</td><td><input type="email" name="em" value="<?php echo $em ?>"></td></tr>
<tr><td>Pass:</td><td><input type="password" name="pass" value="<?php echo $pass ?>"></td></tr>
<tr>
<td>Re Pass:</td><td><input type="password" name="repass"value="<?php echo $repass ?>"></td>
</tr>
<tr><td>Địa chỉ:</td><td><input type="text" name="dc" value="<?php echo $dc ?>"></td></tr>
<tr><td>SDT:</td><td><input type="tel" name="sdt" value="<?php echo $sdt ?>"></td></tr>
<tr><td><input type="submit" name="sm" value="Gửi"></td></tr>
</table>
</form>

</body>
</html>
<?php



$bam=isset($_POST['sm'])?$_POST['sm']:" ";

//unset($_POST["sm"]);


$ketnoi=mysqli_connect("localhost","root","","dochoi")or die("ko the ket noi");
$sql="select Email from dangky where Email='$em'";
$kq=mysqli_query($ketnoi,$sql);

if($em=="")
{
	echo "xin mời nhập email";
}
else if(($pass)!=($repass))
{
	echo "Mật khẩu nhâp lại Không đúng hoăc chưa được nhập!<br>";
}
else if(($pass)=="")
{
	echo"Bạn chưa nhập Mât khẩu!<br>";
}
else if(($dc)=="")
{
	echo"Bạn chưa nhập Mât khẩu!<br>";
}
else if(($sdt)=="")
{
	echo"Bạn chưa nhập so dien thoai!<br>";
}
else if((strlen($pass)<8))
{
	echo "pass phải có ít nhất 8 phần tử!<br>";
}
else if(!(preg_match("/^[a-zA-Z0-9._-]*$/",$pass)))
{
	echo "pass phai co các ký tự và các số!<br>";
}
else if(!(preg_match("/^(0[1-9]{1,2})?([0-9]{9,10})*$/",$sdt)))
{
	echo "số điện thoại bị sai";
}
else if(mysqli_fetch_assoc($kq))
{
	echo "Tài khoản Email đăng ký rồi!";	
}

else
{
	header("location:chuyen.php");
	$_SESSION["em"]=$em;
		$_SESSION["ps"]=$pass;
		$_SESSION["rp"]=$repass;
		$_SESSION["dc"]=$dc;
		$_SESSION["sdt"]=$sdt;
}

?>