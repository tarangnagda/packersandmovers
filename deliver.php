<?php
 
     require 'dbconfig/config.php';
	 session_start();
	    $sql="update user set price='0' where email='$_GET[id]' ";
		  $query=mysqli_query($con,$sql);
		  if(mysqli_query($con,$sql))
		  {
			  header("refresh:1;url=table.php");
		  }
		  
?>
