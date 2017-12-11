<meta charset="utf-8">
<?php
$ketnoi=mysqli_connect("localhost","root","","dochoi")or die("ko the ket noi");
session_start();
isset($_SESSION)?$_SESSION:"";
echo"<pre>";
$a=array();
 foreach($_SESSION['giohang']as $v) 
			  {
				
				 $a[]=  $v['ProductName'];
			  }
			  print_r ($a);

echo "ban da thanh toan xong:"."<br>";?>
<a href="index.php" style="text-decoration:none">Quay lại trang chủ</a>
<?php

$t1=mysqli_real_escape_string($ketnoi,$_SESSION["ten"]);
$em1=mysqli_real_escape_string($ketnoi,$_SESSION["em"]);
$dc1=mysqli_real_escape_string($ketnoi,$_SESSION["dc"]);
$tinh1=mysqli_real_escape_string($ketnoi,$_SESSION["tinh"]);
$ck1=mysqli_real_escape_string($ketnoi,$_SESSION["ck"]);
$sdt1=mysqli_real_escape_string($ketnoi,$_SESSION["sdt"]);
$ps1=mysqli_real_escape_string($ketnoi,$_SESSION["ps"]);
$tien= mysqli_real_escape_string($ketnoi,$_SESSION["tien"]);

$sqll="insert into ac (Name,Email,Diachi,Tinh,Thanhtoan,Phiship,sdt,tongtien)values ('$t1','$em1','$dc1','$tinh1','$ck1','$ps1','$sdt1','$tien')";
mysqli_query($ketnoi,$sqll);