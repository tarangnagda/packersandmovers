 
 <html>
<head>
</head>
<body>
<form action="done.php" method="post">
   <label >Enter amount to be added to base price</label>
   <input type="text" name="update1" value="update">
    <input type="submit" name="login" class="btn btn-success btn-block" value="login" >
	</form>
	<?php
 require 'dbconfig/config.php';
	 session_start();

	echo $_GET['id'];
	$id1=$_GET['id'];
 if(isset($_POST['login']))
 {
    
	  $up=$_POST['update1'];
	 echo $up;
	    $sql="update user set price='$up' where email='$_GET[id]' ";
		  $query=mysqli_query($con,$sql);
		  if(mysqli_query($con,$sql))
		  {
			  //header("refresh:1;url=table.php");
		  }
 }  
?>
</body>
</html>
