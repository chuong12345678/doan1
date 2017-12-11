<meta charset="utf-8" />
<?php
session_start();
$id=$_GET['id'];
if($_SESSION['giohang'])
{
	unset($_SESSION['giohang'][$id]);
	echo"Đã xóa thành công 1 sản phẫm bạn đã chọn:";
}
?>