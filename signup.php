 <?php
     require 'dbconfig/config.php';
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



<title>Sign-Up Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/  bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
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
  
</ul>

<h2>Register Yourself</h2>

 <div class="container-fluid">
    <div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12"></div>
	      <div class="col-md-4 col-sm-4 col-xs-12"> 
		           <form class="form-container" action="signup.php" method="POST" >
				          <div class="form-group" >
    <label  for="exampleInputEmail1" size=6>Username</label>
    <input name="username" type="text" class="form-control"  placeholder="Enter Username" required="">
    
  </div>
       <div class="form-group">
    <label   for="exampleInputEmail1" size=6>Email</label>
    <input name="email" type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" required="" >
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control"  placeholder="Password" required="" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"> Confirm Password</label>
    <input name="cpassword" type="password" class="form-control"  placeholder="Password" required="" >
  </div>
  <div class="form-group form-check">bn
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <button name="submit_btn" type="submit" class="btn btn-success btn-block" id="signup_btn">Sign-Up</button>
                       </form>
		      <?php
			  if(isset($_POST['submit_btn']))
			  { 
				  //echo '<script type="text/javascript"> alert("Submit button clicked") </script>';
				  $username=$_POST['username'];
				  $password=$_POST['password'];
				  $cpassword=$_POST['cpassword'];
				 $email=$_POST['email'];
				  if($password==$cpassword)
				  {
					  $query= 'select * from user WHERE email= "$email"';
					  $query_run=mysqli_query($con,$query);
					   if(mysqli_num_rows($query_run)>0)
					   {
						 echo '<script type="text/javascript"> alert("email is already exist") </script>';   
					   }
					   else
					   { 
						 $query= "insert into user values ('$username','$email','$password','0','0','0','0','0','0','0','0')";
                         $query_run=mysqli_query($con,$query);
						 if($query_run)
						 {
							 echo '<script type="text/javascript"> alert("registered successfully"); window.location.href="login.php"; </script>';
							 
						 }
						 else
						 {
							 echo '<script type="text/javascript"> alert("error") </script>';
						 }
					   }
				  }
				  else
				  {
					  							 echo '<script type="text/javascript"> alert("passwoed did not matched") </script>';
				  }
				  
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