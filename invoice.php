

<?php

     require 'dbconfig/config.php';
	 session_start();
?>
<html>
<head>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}



li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}

.header {
    padding: 30px;
    text-align: center;
    background: white;
}
</style>


<title>Login-Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header"><a href="new.php">
<img  width="100" height="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ98OGAGQVBBmLKtjh82W-w3nJwBCkoBtoF7weBAaHZIvqueKFI">
  <h1><font color="black">PackIt</font></h1></a>

</div>

     <ul>
  <li><a class="active" href="new.php">Home Page </a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="signup.php">Register</a></li>
   <li><a href="admin.php">Admin Login</a></li>
  <li style="float:right"><a href="contact.php">Feedback</a></li>
  <li style="float:right"><a href="new.php">Log Out</a></li>
</ul>

<h2>Your Invoice is</h2>

 <div class="container-fluid">    
    <div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
	      <div class="col-md-4 col-sm-4 col-xs-12"> 
		           <form class="form-container" action="invoice.php" method="post">
				   <?php
	   $email=$_SESSION['email'];
	      $sql="select * from user where email='$email'";
		  $query=mysqli_query($con,$sql);
		  
		  
		  while ($row=mysqli_fetch_array($query))
		  {
			  if($row['price']!=0)
			  {
			  echo "Your email address: ".$row['email'];
			  echo "<br>";
			  echo "<br>";
              echo "Your username is: ".$row['username'];
			  echo "<br>";
			  echo "<br>";
               echo "Your pick up address: ".$row['pick'];
			  echo "<br>";
			  echo "<br>";
              echo "Your drop down address: ".$row['dropdown'];
              echo "<br>";
			  echo "<br>";
              echo "Your date of shifting: ".$row['date'];
              echo "<br>";
			  echo "<br>";
              echo "Your time of shifting: ".$row['time'];
              echo "<br>";
			  echo "<br>";
              echo "Total price you have to pay Rupees: ".$row['price'];
              echo "<br>";
              echo "<br>";			  
			  }
			  else
			  {
				  header('location:done.php');
			  }
		  }
		  
		  
	   ?>
      
   
  
  <a href="login.php"><input type="button" class="btn btn-success btn-block" value="LOGOUT" ></a >
  <br>
  <input type="submit" name="login" class="btn btn-success btn-block" value="Cancel Product" >
  
                       </form>
					   <?php
		       if(isset($_POST['login']))
			   {
				       $sql="update user set price='0' where email='$email' ";
		  $query=mysqli_query($con,$sql);
		  header('location:image.php');
		  
			   }
		  ?>
		  
		  </div>
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>