<?php
if(isset($_POST['user'])and isset($_POST['pass']))
{
$hostname = "localhost"; // the hostname you created when creating the database
$username = "root";      // the username specified when setting up the database
$password = "";      // the password specified when setting up the database
$database = "vedic";      // the database name chosen when setting up the database 
$link = mysqli_connect("localhost", "root", "", "vedic");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = $_POST['user'];
$pass = $_POST['pass'];
// Attempt insert query execution
$query = "SELECT * FROM registration where FirstName='$username'";
 $retval=mysqli_query($link,$query);
if(! $retval )
{
  die('Could not fetch data: ' . mysqli_error($link));
}
else{
$row=mysqli_fetch_array($retval);

 
if($pass==$row['Password'])
{
  header('Location:home.php');
 
  
}

else
{
  echo "<h1>Invalid UserName or Password Entered!!! Please Relogin</h1>";
 }
}
mysqli_close($link);
}
else{
?>

<html>
<head>
<style>
body{
    margin: 0;
    padding: 0;
    background: url(h3.jpg);
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}
.login-box{
    width: 320px;
    height: 420px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
	font-family: sans-serif;
    animation: animate 16s ease-in-out infinite;
    background-size: cover;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

a{color:white;}

 a:hover {
  color: red;
  background-color: transparent;
 }


h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 35px;
	color:red;
}
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

input.registration{
width: 100px;
padding: 10px;
cursor: pointer;
font-weight: bold;
font-size: 100%;
background: green;
color: red;
border: 1px solid black;
border-radius: 10px;
}

input.registration:hover {
color: white;
background: blue;
border: 1px solid black;
}
	
.login-page{
     width:320px;
	 height:300px;
	 margin: auto;
	 background:transparent;
	 color:white;
	 top:50%;
	 left:50%;
	 position:absolute;
	 transform:translate(-50%,-50%);
	 box-sizing:border-box;
	 padding: 0px 17px;
	 font-weight: bold;
    }

input.login:hover {
color: white;
background: red;
border: 1px solid black;

}


.form{
	position: relative;
	z-index:1;
    max-width: 360px;
	margin:0 auto 100px;
	padding:30px;
	text-align:center;
	} 
	
input[type=submit] {
  background-color: green;
  color: black;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}	


input[type=button] {
  background-color: green;
  color: black;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}	


.form input{
	font-family:"Roboto", sans-serif;
	outline: 1;
	background:pink;
	width: 100%;
	border:0;
    margin: 0 0 15px;
    padding: 10px;
	box-sizing: border-box;
    font-size:14px;
	font-weight: bold;
  }
 
	

</style>
</head>
<body>
<h1><center><u>vedic maths leaner</u> </center></h1>
<h2><center><u>login here</u> </center></h2>

 
    <div class="login-box">
	
    <img src="avatar.png" class="avatar">   

<div class="login-page">
<div class="register-page">

<center><h1>Login </h1></center>
<form  class="form" method="post" action="<?PHP echo $_SERVER['PHP_SELF']; ?>">
User Name<input type="text" name="user" placeholder="enter user name" required>
Password<input type="password"  name="pass" placeholder="enter password" required>

<input class="login"  type="submit" value="Login"> 

<a href="register.php">
<input class="registration" type="button" value="Register"> </a>

<a href="forgetpass.php">Forget Password?</a>          
</form>
</div>	  
</div>		  
        </div>
    
<?PHP 
}
?>

    </body>
</html>



   