	
<meta charset="utf-8">
<?php
session_start();
$ten=isset($_POST['ten'])?$_POST['ten']:"";
$em=isset($_POST['em'])?$_POST['em']:"";
$dc=isset($_POST['dc'])?$_POST['dc']:"";
$tinh=isset($_POST['chonloai'])?$_POST['chonloai']:"";
$ck=isset($_POST['tt'])?$_POST['tt']:"";
$sdt=isset($_POST['sdt'])?$_POST['sdt']:"";
$ps=isset($_POST['ps'])?$_POST['ps']:"";
isset($_SESSION)?$_SESSION:"";
  $tongtien=0;
				   foreach($_SESSION['giohang'] as $key=>$v)  
				   {
						 $_SESSION['giohang'][$key]['tong']= $_SESSION['giohang'][$key]['soluong']*$_SESSION['giohang'][$key]['price'];
						 $tongtien+=$_SESSION['giohang'][$key]['tong'];
				   }
				  
				  ?>
                 <div style=" margin-left:10px; margin-right:10px"> <form >
                  <table class="table table-bordered" align="left" border="1" width="100px"  >
              <thead>
                <tr bgcolor="#6299EF">
                  <td>Ảnh</td>
                  <td>Tên</td>
                  <td>Số lượng</td>
				  <td>Giá</td>
				</tr>
              </thead>
              <tbody>
              <?php
			  foreach($_SESSION['giohang']as $v) 
			  {  
			  ?>
                <tr>
			 <td> <img width="100px" src="<?php echo $v['image'] ?>" alt=""/></td>       
             <td><?php echo  $v['ProductName']; ?></td>   
                     
                  <td><?php echo  $v['soluong']?></td>
                  <td><?php echo $v['price']?></td>
                </tr>
				<tr>
                  <?php	
				  
			  }
				  ?>
				</tbody>
            </table>
                  </form>
                  <div style="margin-left:10px">
                  <table border="3px">
                  <tr>
                  <td>Tổng thanh toán là:</td>
                  <td><?php echo $tongtien;  ?></td>
                  <tr>
                  
                  <td>Tổng thanh toán là+phí ship nếu có:</td>
                  <td><?php echo $tongtien+$ps;  ?></td>
                  </tr>
                  
                  </tr>
                  </table>
                  </div>
           </div>
           <center><p>Điền thông tin của bạn</p></center>
<legend >
<form  action="Thanhtoan.php" method="post" style="margin:0 auto">
<table border="1" align="center"  >
<tr><td>Tên</td><td><input type="text" name="ten" ></td></tr>
<tr><td>Email</td><td><input type="email" name="em" ></td></tr>
<tr><td>Địa chỉ</td><td><input type="text" name="dc" ></td></tr>
<tr><td>Tỉnh,thành phố:</td><td><select name="chonloai">
<option value="Sài Gòn">Sài Gòn</option>
<option value="Cần Thơ">Cần Thơ</option>
<option value="Long An">Long An</option>
<option value="Tiềng Giang">Tiềng Giang</option>
<option value="Hậu Giang">Hậu Giang</option>
<option value="An Giang">An Giang</option></select>
</td></tr>
<tr><td>Thanh toán</td><td><select name='tt'>
<option value="Chuyển khoảng" selected>Chuyển khoảng</option>
<option value="trực tiếp">trực tiếp</option>
</select>
</td></tr>
<tr><td>Phí ship:</td><td><select name='ps'>
<option value="0000" selected>nhỏ hơn 10km</option>
<option value="20000">nội thành</option>
<option value="30000">lân cận</option>
<option value="50000">tỉnh</option>
</select>
<tr><td>SDT:</td><td><input type="tel" name="sdt" ></td></tr>
<tr><td><center><input type="submit" name="sm" value="Gửi"></center></td></tr>
</table>
</form>
</legend>
<?php

$ketnoi=mysqli_connect("localhost","root","","dochoi")or die("ko the ket noi");
$sql="select Email from ac where Email='$em'";
$kq=mysqli_query($ketnoi,$sql);

 

if(($ten)=="")
{
	echo"Xin mời nhập tên!<br>";
}
else if(($dc)=="")
{
	echo"Bạn chưa nhập Mât khẩu!<br>";
}
else if(($sdt)=="")
{
	echo"Bạn chưa nhập so dien thoai!<br>";
}
else if(!(preg_match("/^(0[1-9]{1,2})?([0-9]{9,10})*$/",$sdt)))
{
	echo "số điện thoại bị sai";
}
else if(mysqli_fetch_assoc($kq))
{
	echo "Tài khoản Email đả có!";	
}
else
{
	header("location:thanhtoanht.php");
	$_SESSION["ten"]=$ten;
	$_SESSION["em"]=$em;
	$_SESSION["dc"]=$dc;
	$_SESSION["tinh"]=$tinh;
	$_SESSION["ck"]=$ck;
	$_SESSION["sdt"]=$sdt;
	$_SESSION["ps"]=$ps;
	$_SESSION['tien']=$tongtien;
}



?>

          
				   
				   
				   