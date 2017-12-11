<meta charset="utf-8">
<?php
session_start();

if(isset($_POST['ud']))
{
	unset($_POST['ud']);
	
	foreach($_POST as $key => $v)
	{
		
		
			$_SESSION['giohang'][$key]['soluong']=$v;
		//ta se thay doi cai so luong cua gio hang = voi so ma qua lay duoc tu post cho ra $v so luong 	
	}
}
header("location:Product_command.php");
?>