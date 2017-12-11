<meta charset="utf-8">
<script>
	function kiemtra()
	{
		if	(window.confirm("ban co muon xoa ko"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	 function ktud()
	{
		if	(window.confirm("ban co muon update ko"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	</script>
   
<?php
isset($_SESSION)?$_SESSION:"";
session_start();
?>
<p align="center" style="text-shadow:#BEC8F4" >Trang sản phẩm của bạn</p>
<form  action='update.php' method='post'>
<center>
<table class="table table-bordered" align="center" border="1" width="850px"  >
              <thead>
                <tr bgcolor="#6299EF">
                  <td>Ảnh</td>
                  <td>Tên</td>
                  <td>Số lượng</td>
				  <td>Giá</td>
                  <td>Tổng thành tiền</td>
                  <td>xóa</td>
				</tr>
              </thead>
              <tbody>
              <?php
			
			  foreach($_SESSION['giohang']as $v) 
			  {  
			  ?>
                <tr>
              
			 <td> <img width="60" src="<?php echo $v['image'] ?>" alt=""/></td>
                  <td><?php echo $v['ProductName']  ?></td>
                  <td><input type="number" name="<?php echo $v['ProductCode'] ?>" value="<?php echo $v['soluong']?>"></input></td>
                  <td><?php echo $v['price']?></td>
                   <td><?php echo  $v['soluong']*$v['price'] ?></td>
                  
                 <td><a  href="xoa.php?id=<?php echo $v['ProductCode'] ?>"onclick="return kiemtra()" style="text-decoration:none" >xóa</td>
				
                </tr>
				<tr>
                  <?php
				 
				   
				 
				
				   
			  }
			  
			  
				  ?>
                  
				</tbody>
             
            </table>
            <td><input type="submit" name="ud" value="Update" onclick="return ktud()"></td>
           </center>
            <center> <form>
             <tr>
             <td><a href="Thanhtoan.php" style="text-decoration:none">Thanh toán</a></td></tr>
             </form></center>
           </form>