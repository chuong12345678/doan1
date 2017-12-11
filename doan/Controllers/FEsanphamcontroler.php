 <?php
include(ROOT."/Models/sanpham.php");
	class sanphamc
	{
		public function hienthispc()
		{//model
		$sx= isset($_GET['gia'])?$_GET['gia']:"";
		$page = isset($_GET["page"])?$_GET["page"]:1;
			$mod_sanpham=new sanpham();
			$sp=array();
			if($sx=="")
			{
				$sp=$mod_sanpham->sanphamht($page);
			}
			
				
	 			if ($sx=="tangdan") 
				$sp=$mod_sanpham->sapxeptang($page);
				if ($sx=="giamdan") 
				$sp=$mod_sanpham->sapxepgiam($page);
				
		
			
			//view
			include(ROOT."/Views/FE/index.php");
		}
		public function chitietsp()
		{	
			//model	
			$mod_chitiet=new sanpham();
			$ctsp=$mod_chitiet->sanphamtheoma($_GET["ProductCode"]);
			//view ROOT
			include(ROOT."/Views/FE/product_details.php");
		}
		public function spds()
		{
			//model
			$page = isset($_GET["page"])?$_GET["page"]:1;
			$C_ds=new sanpham();
			$dssp=$C_ds->sptheods($_GET['ds'],$page);
			//view
			include(ROOT."/Views/FE/products.php");
			
		}
		public function sanphamcart()
		{
			$id=$_GET['id'];
			session_start();
			$a=array();
			$c_dsc=new sanpham();
			$data=$c_dsc->sanphamcart();
				foreach($data as $v)
				{
					$a[$v['ProductCode']]=$v;
				}
				
			if(!isset($_SESSION['giohang']))
			{
				$a[$id]['soluong']=1;//neu chua co  thi xuat  sl bang 1
				$_SESSION['giohang'][$id]=$a[$id];//luu cai hanh dong nhan mua ngay (luu gio hang lai bang=mảng có id dược chọ
			}
			else
			{
				if(array_key_exists($id,$_SESSION['giohang']))//kiem tra xem $id co ton tai trong gio ko
				{
					$_SESSION['giohang'][$id]['soluong']+=1;
				}
			else
				{
					$a[$id]['soluong']=1;//neu chua co  thi xuat  sl bang 1
					$_SESSION['giohang'][$id]=$a[$id];
				}
			}	
			//view
			include(ROOT."/Views/FE/product_summary.php");
		}
		public function htDanhMucSanPham()
		{
			$arr_sp = array();
			//model
			$mod_dem=new sanpham();
			$arr_sp=$mod_dem->layDSSanPham();
			return $arr_sp;
		}
		
		public function demtrang()
		{
			$a=new sanpham();
			$atongsosp=$a->dem();
			$tongsosp = $atongsosp[0]["dem"];
			//print_r($tongsosp);
			$tongsotrang =ceil($tongsosp/6);
			return $tongsotrang;
		}
		public function goimenu()
		{
			$mang=array();
			$a=new sanpham();
			$mang=$a->menu();
			return $mang;
		}
		public function tim()
		{
			$a=new sanpham();
			$mang=array();
			$tukhoa=$_POST["tk"];
			$mang=$a->timkiem($tukhoa);
			//view
			include(ROOT."/Views/FE/Search.php");
		}
		public function demsp()
		{
			$a =new sanpham();
			$atongsosp=array();
			$atongsosp=$a->dem();
			return $atongsosp;
		}
		public function hienthikhung()
		{
			$a= new sanpham();
			$CT_spkhung=$a->sanphamkhung();
			return $CT_spkhung;
		}
		
	}
	
	
?>