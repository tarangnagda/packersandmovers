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

<h2>Enter Detials</h2>

  <div class ="form-container">
       <form action="image.php" method="post">
	   
	         <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>Pick-up</label>
			     <input name="pick"  id= "from" type="text" placeholder="Enter Pick Up Location" class="form-holder"  required=""> 
				 <label   for="exampleInputEmail1" size=6 margin-left= 10px >Pick Up Pin Number</label>
			     <input name="ppick"  id= "ppick" type="text" placeholder=" Enter Pick up Pin Number" class="form-holder"  required="">
			 </div>
			 
			 
			 
			    <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>Drop-Down</label>
			     <input name="dropdown" id="to" type="text" placeholder="Enter drop down Location" class="form-holder" required="">
				 		 <label   for="exampleInputEmail1" size=6 margin-left= 10px >Drop Down Pin Number</label>
			     <input name="pdropdown"  id= "pdropdown" type="text" placeholder=" Enter Drop Down Pin Number" class="form-holder"  required="">
			 </div>
			 
			 <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>Date</label>
			     <input name="date" type="date" placeholder="Enter Date of Shifting" class="form-holder" required="">
			 </div>
			 
			  <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>Time</label>
			     <input name="time" type="Time" placeholder="Enter Time of Shifting" class="form-holder" required="">
			 </div>
			 
			   <div class="form-group">
			 <label   for="exampleInputEmail1" size=6>Type Of Shifting : </label>
			 </div>
			     
				 <div class="form-group">
			     <input name="type" type="radio" class="form-holder" required="" >Office
				 </div>
				 
				 <div class="form-group">
				 <input name="type" type="radio" class="form-holder" required="">Residence
				 
			 </div>
			  <input type="submit" name="login" class="btn btn-success btn-block" value="Proceed" >
			  
			  
			 
			 <?php
			 $email= $_SESSION['email'];
			
			   if(isset($_POST['login']))
			 {
				 
				      $origin = $_POST['ppick']; $destination = $_POST['pdropdown'];
            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyAdx_5p5Y17Xo1rfovONEvvOC6LtpQzNOM&#038");
			
            $data = json_decode($api);
				
			
			

			 $email= $_SESSION['email'];
			 echo $email;
			 echo $_SESSION['password']; 
			 $pick=$_POST['pick'];
			  
			 $dropdown=$_POST['dropdown'];
			 $date=$_POST['date']; 
			 $time=$_POST['time'];
			 $type=$_POST['type'];
			 $warm=((int)$data->rows[0]->elements[0]->distance->value / 1000);
		  $_SESSION['warm']=$warm;
			 $query="UPDATE user SET pick='$pick' , date='$date' , dropdown='$dropdown' , time='$time' , type='$type'   WHERE email='$email'";
			 $query_run=mysqli_query($con,$query);
			 $_SESSION['email']=$email;
			 header('location:rate.php');
						  //  echo '<script type="text/javascript"> alert("registered successfully"); window.location.href="rate.php"; </script>';
			 
			 
			 ?>
			  <?php  	 
		 $email= $_SESSION['email'];
		$warm=((int)$data->rows[0]->elements[0]->distance->value / 1000);
		  $_SESSION['warm']=$warm;
		$query="UPDATE user SET distance='$warm'  WHERE email='$email'";
			 $query_run=mysqli_query($con,$query); ?>    
            

        <?php } ?>
			  

			 
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
