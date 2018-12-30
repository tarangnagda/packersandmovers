<?php

     require 'dbconfig/config.php';
	 session_start();
?>
<html>
<head>

<style>
@import url('https://fonts.googleapis.com/css?family=Kanit');

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
    padding: 0px;
    text-align: center;
    background: white;
}

.phone{
  position:relative;
  width:100%;
  background-color:#fec8d8;
  height:500px;

  display:flex;
  justify-content:center;
  flex-direction:row-reverse;

  
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
  <li><a class="new.php" href="new.php">Home Page </a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="signup.php">Register</a></li>
   <li><a href="admin.php">Admin Login</a></li>
  <li style="float:right"><a href="contact.php">About Us</a></li>
</ul>

      <h2>Enter Your Credentials</h2>

	  <div class="phone">
 <div class="container-fluid">    
    <div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
	      <div class="col-md-4 col-sm-4 col-xs-12"> 
		           <form   style="background-color: cyan; border: 1px solid; margin-top: 10vh; -webkit-box-shadow: 0px 2px 78px 16px rgba(20,13,20,1); padding: 35px 45px;" class="form-container" action="login.php" method="post">
       <div class="form-group">
    <label for="exampleInputEmail1" size=6>Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
   
  <input type="submit" name="login" class="btn btn-success btn-block" value="login" > <br>
  <a href="signup.php"><input type="button" class="btn btn-success btn-block" value="Not Registered?" ></a >
  
                       </form>
		      <?php
			       if(isset($_POST['login']))
				   {
					   $email=$_POST['email'];
					   $password=$_POST['password'];
					   $query="select * from user WHERE email='$email' AND password='$password'";
					   $query_run=mysqli_query($con,$query);
					   
					   if(mysqli_num_rows($query_run)>0)
					   {
                        $_SESSION['email']=$email;
						$_SESSION['password']=$password;
						$sql="select * from user where email='$email'";
		  $query=mysqli_query($con,$sql);
		    while ($row=mysqli_fetch_array($query))
			{
                        						
						 if($row['price']!=0)
						 {
							
							 header('location:invoice.php'); 
						
						 }
						 if($row['price']==0)
						 {
							header('location:image.php'); 
						 }
			}
						  echo '<script type="text/javascript"> alert("registered successfully"); window.location.href="image.php"; </script>';
					   } 
					   else
					   {
						   echo '<script> var text; var r=confirm("Not registered! Want to registered?"); if(r==true){window.location.href="signup.php";}</script>';
						 
					   }
					   
				   }
			  ?>
		  
		  
		  </div>
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>