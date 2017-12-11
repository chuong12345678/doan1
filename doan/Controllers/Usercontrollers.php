<?php
include(ROOT."/Models/usermodel.php");
class dangky
{
	function dangkyf()
	{
		include(ROOT."/Views/FE/DANGKY.php");
	}
	function chuyentrang()
	{
		include(ROOT."/Views/FE/chuyen.php");
	}
	function dangnhap()
	{
			
		
			session_start();
		if(isset($_SESSION['email']))
		{
			header("location:index.php");
			
		}
		else
		{		
		if(isset($_POST['nsm']))
		{
			$c_dn=new usermodel();
			if($c_dn->user($_POST["em"],md5($_POST["pass"])))
			{
				header("location:index.php");
				$_SESSION["email"]=$_POST["em"];
			}
			else
			{
				echo "Sai mật khẩu hoặc email xin vui lòng nhập lại:";
			}
		}
		include(ROOT."/Views/FE/dangnhap.php");
	}
	
	}
}
?>