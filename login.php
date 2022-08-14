<?php
session_start();
?>
<?php 

$host="localhost";
$user="root";
$password="";
$db="abc";

$con = mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);



if(isset($_POST['username'])){
    
    $uname=$_POST["username"];
    $password=$_POST["password"];
    
    $sql="select * from login where user='".$uname."'AND pass='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1){
        $_SESSION['user_name']= $uname;
        header("Location: project.php");
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
}
if(isset($_POST['submit2'])){
    
    $uname=$_POST["username2"];
    $password=$_POST["password2"];
    
    $sql="insert into login (user, pass) values('$uname', '$password')";
    
    $result=mysqli_query($con,$sql);
    
    if(($result)){
        header("Location: project.php");
        exit();
    }
    else{
        echo " NOT ENTERED";
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Form</title>
	<link rel="stylesheet" a href="style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<style>
.container {
  width: 400px;
  height: 380px;
  text-align: center;
  margin: 0 auto;
  /* background-color: rgba(44, 62, 80, 0.7); */
  background-color:gray;
  margin-top: 120px;
  margin-bottom:30px;
  border-radius:16px;
  z-index:1;
  
}
.forms {
  display: flex;
  flex-direction: row;
  background-size: cover;
  background-image:url("background_img.jpeg");
  height:900px;
}
body {
  /* margin: 0 auto; */
  background-color: rgb(255, 255, 204);
  background-repeat: no-repeat;
  /* background-size: 100% 720px; */
}
.btn-login{
    border-radius:16px;
   
}
.heading1{
    font-size:32px;
   
}
.heading2{
    font-size:32px; 
}
.shift{
    margin-left:-10px;
}
</style>
<body>
<img src="logo2.png">
<hr>
<div class="forms">
	<div class="container">
    <h3 class="heading1">Login</h3>
		<form method="POST" action="#">
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" name="submit" value="LOGIN" class="btn-login"/>
            <!-- <input type="submit" type="submit" name="submit2" value="SIGNUP" class="btn-login"/> -->
		</form>
    </div>
    
    <div class="container shift">
    <h3 class="heading2">Sign Up</h3>
        <form method="POST" action="#">
			<div class="form-input">
				<input type="text" name="username2" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password2" placeholder="password"/>
			</div>
			<!-- <input type="submit" type="submit" name="submit" value="LOGIN" class="btn-login"/> -->
            <input type="submit" type="submit" name="submit2" value="SIGNUP" class="btn-login"/>
		</form>
	</div>
</div>
</body>
</html>