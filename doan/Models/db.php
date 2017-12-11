<?php 
    class database 
    {    
        var $ketnoi="";
		var $sql="";
		var $loai=array();
		 var $ketqua=null;   
         
        function database() 
        {
            $this->ketnoi= mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME) or die ('Không thể kết nối tới database'); 
        }         
         
         function setQuery($sql) //gan sql ben san pham roi lay sql do de thuc thi
				{ 
					return $this->sql = $sql; 
				} 
        function laytoanbodulieu()    //ham thuc thi cau lenh sql
        { 
		mysqli_query($this->ketnoi,"set names utf8");
			$this->ketqua = mysqli_query($this->ketnoi,$this->sql); 
            return $this->ketqua; 
        } 
         
        function LoadAllRow()//ham do du lieu vao mang
		     {
			$kq=$this->laytoanbodulieu();
            if(!$kq)
            { 
                return null; 
            } 
            $array=array(); 
			while ($data=mysqli_fetch_assoc($kq))
             {
                 $array[]=$data;
             } 
             return $array;
        } 
		function loadrow()
		{
			$kq=$this->laytoanbodulieu();
            if(!$kq)
            { 
                return null; 
            } 
			$data=mysqli_fetch_array($kq);
			return $data;
		}
        
        function disconnect() 
        { 
            mysqli_close($this->connection); 
        } 
	
    } 
?>