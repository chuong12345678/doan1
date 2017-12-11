<?php
include_once('db.php');
/**
* 
*/
class sanpham extends database 
{
	
	public function sanphamht($page=1)
	{
		$from = ($page-1)*6;
		$sql="SELECT * FROM sanpham limit $from, 6";
		$this->SetQuery($sql);
		return $this->LoadAllRow();
	}
	public function sanphamcart()
	{
		$sql="SELECT * FROM sanpham ";
		$this->SetQuery($sql);
		return $this->LoadAllRow();
	}
	public function sanphamtheoma($ma)
	{
		$sql="SELECT * FROM productdetail where ProductCode='$ma'";
		$this->setQuery($sql);
		return $this->loadrow();
	}
	
	
	public function sptheods($ds,$page=1)
	{
		$from = ($page-1)*2;
		$sql="SELECT * FROM sanpham   where ProductList='$ds' limit $from, 2";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	public function layDSSanPham()
	{
		$sql="SELECT ProductList as tenSP, COUNT( ProductName ) as soluong FROM sanpham GROUP BY ProductList";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	public function menu()
	{
		$sql="SELECT * FROM menu";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	public function timkiem($tukhoa)
	{
		$sql="SELECT * FROM sanpham  where ProductName like'%$tukhoa%' ";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	public function dem()
	{
		$sql="SELECT Count( * ) as dem FROM sanpham";
		$this->setQuery($sql);
		return $this->LoadAllRow();
		
	}
	public function sapxeptang()
	{
		$sql="SELECT * FROM sanpham ORDER by price ASC";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	public function sapxepgiam()
	{
		$sql="SELECT * FROM sanpham ORDER by price DESC";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	public function sanphamkhung()
	{
		$sql="SELECT * FROM sanpham ";
		$this->setQuery($sql);
		return $this->LoadAllRow();
	}
	

	

}


?>