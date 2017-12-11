<?php
	require_once('db.php');
	class usermodel extends database
	{
		function user($em,$sp)
		{
			$sql="select * from dangky where Email='$em' and pass='$sp' ";
			$this->setQuery($sql);
			return $this->LoadAllRow();
		}
	}
	
	
?>