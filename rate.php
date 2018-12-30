<?php
	 session_start();
     require 'dbconfig/config.php';
	 	 

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




<title>Welcome</title>
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
  <li style="float:right"><a href="new.php">Log Out</a></li>
</ul>

<h2>Enter Further Details</h2>

  <div class ="form-container">
       <form action="rate.php" method="post">
	   
	          <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>What do you want to shift?</label>
			 </div>
			     
				 <div class="form-group">
			     <input name="bhk" type="radio" class="form-holder" required=""  value="500"> Very few items : (Rs. 5,00)
				 </div>
				 
				 <div class="form-group">
				 <input name="bhk" type="radio" class="form-holder" required="" value="1000">1RK : (Rs. 1,000)
				 
			 </div>
			 
			 	 <div class="form-group">
				 <input name="bhk" type="radio" class="form-holder" required="" value="1500">1BHK : (Rs. 1,500)
				 
			 </div> 
			 
			 	 <div class="form-group">
				 <input name="bhk" type="radio" class="form-holder" required="" value="2000">2BHK : (Rs. 2,000)
				 
			 </div>
			 
			 	 <div class="form-group">
				 <input name="bhk" type="radio" class="form-holder" required="" value="2500">3BHK : (Rs. 2,500)
				 
			 </div>
			 
			 	 <div class="form-group">
				 <input name="bhk" type="radio" class="form-holder" required="" value="3000">4BHK : (Rs. 3,000)
				 
			 </div>
			 
			 <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>Floor of your residence:        </label>
			     <input name="date" type="text" placeholder="" class="form-holder"  required="">
			 </div>
			 
			 
			  <input type="submit" name="login" class="btn btn-success btn-block" value="Proceed" >
			  
			  
			 
			 <?php
			 
            if(isset($_POST['login'])){
				 $email= $_SESSION['email'];
				 $warm=$_SESSION['warm'];
				 $_SESSION['email']=$email;
				  echo $warm=$_SESSION['warm'];
				 
				 $bhk=$_POST['bhk'];
				 if($warm=="0")
				 {
					 $price="1"*$bhk;
				 }
				 else
				 {
					 $price=($bhk*$warm)/"10";
				 }
				  $query="UPDATE user SET capacity='$bhk' , price='$price'  WHERE email='$email'";
			 $query_run=mysqli_query($con,$query);
				
             header('location:invoice.php');
			
			
		
			}
        ?>

     
			 
	   </form>
  </div> 
    <div class="container-fluid">
           <div id="googleMap">
           </div>
           
           <div id="output">
               
           </div>
       </div>

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKHMVCsGXT3wzJxO0hCsh_enpT8ZDQZ8c&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="javascript.js" type="text/javascript"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>

