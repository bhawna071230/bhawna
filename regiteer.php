<?php
if(isset($_POST['frstname'])and isset($_POST['lstname'])and isset($_POST['psw'])and isset($_POST['eml']) and isset($_POST['cont']))
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
// Escape user inputs for security
$fname = $_POST['frstname'];
$lname = $_POST['lstname'];
$pass = $_POST['psw'];
$email = $_POST['eml'];
$contact = $_POST['cont'];

 $sql = "SELECT * FROM signup WHERE FullName='$fname'";
  	$results = mysqli_query($link, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "Username already exists";	
  	  exit();
  	}else{
// Attempt insert query execution
  	
	$query = "INSERT INTO `regiteer`(`FirstName`, `LastName`, `Password`, `Email`, `ContactNo`) VALUES ('$fname','$lname','$pass','$email','$contact')";
  	  $results = mysqli_query($link, $query);
  	  mysqli_close($link);
header("Location:loggin.php");
  	  exit();
  	}
  	
		}

else{
?>
 
<!doc type html>
<head>
<style>
body{
background:url(h3.jpg);
 background-size: cover;
}
.wrap{
    width:320px; 
    height:420px;
	margin: auto;
	background:rgba(0, 0, 0, 0.5);
    color: #fff;
   top:20%;
	 left:40%;
	 position:absolute;
	  text-align:center;
    transform: translate(-5O%,-50%);
    font-family: sans-serif;
    background-size: cover;
	box-sizing:border-box;
	 padding: 0px 17px;
	 font-weight: bold;
     
	
}
form{
padding:10px;
font-family:arial;
}
input{
padding:5px;
margin:5px;
border-radius:1px;
border:none;
}	
input.sub{
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

 
 input.sub:hover {
  color: white;
  background-color:blue;
 }

a{color:red;
font-size:20px;
 width: 200px;
 float:right;
 }
 
 a:hover {
  color: green;
  background-color:pink;
 }
 
 h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 35px;
	color:red;
}

h2{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 35px;
	color:#543715;
}

.btn {
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
</style>
</head>

<body>
<h1><center><u>Vedic Maths Learner</u></center></h1>

<h2><u><center>Registration Form</center></u></h2>


<form onsubmit="myFunction()" method="post" >
<div class="wrap">

First Name<input type="text" id="firstname" name="frstname"  required placeholder="Enter First Name">
		<span class="error"><p id="firstname_error"></p></span>
		
		Last Name<input type="text" id="lastname" name="lstname" required placeholder="Enter Last Name">
        <span class="error"><p id="lastname_error"></p></span>
		
		Password<input type="password" id="password" name="psw" required placeholder="Enter Password">
        <span class="error"><p id="password_error"></p></span>
		
       Email <input type="email" id="email" name="eml" required placeholder="Enter Email">
        <span class="error"><p id="email_error"></p></span>
		
	  Contact No.<input type="tel" id="contact" name="cont" pattern="[0-9]{10}" title="Ten digits code" required placeholder="Enter contact no.">
		<span class="error"><p id="contact_error"></p></span>

<a href="home.php" class="btn">Cancel</a>

<input class="sub" name="sub" type="submit" value="Submit"><br><br>         
</div>
</form>


<script>
function myFunction() {
  alert("You have successfully registered and logged in.");
}
</script>
<?PHP 
}
?>
</body>
