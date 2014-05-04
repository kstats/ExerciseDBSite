<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!doctype html>
<html>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
} ?>
	<head>
		<title>Trainer Info settings</title>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<script src="js/jquery.js"></script>
    	<script src="js/jquery.validate.js"></script>
		<style type="text/css">
		
	.quote {
    	text-align:center;
	}

	.quote blockquote {
   		padding:10px 5px;
   		border-left:3px solid #ccc; 
    	display:inline-block;
    	color:#666;
    	background:#F0F0F0 ;
	}


	

		h1{
		border: 10px solid black; 
		background-color:green; 
		color: white; 
		/*padding: 10px;*/ 

	} 

	a{
		color:rgb #ef11a; 
		font-size: 20px; 
		font-family: sans-serif;
		text-decoration: none;
	}

	a:hover{
		text-decoration: underline;
		font-size: italic; 
	}

		ul.menu{
			list-style: none;
		}

		ul.menu li{
			display: inline;

		}

		li:after{
			content: '|'; 
			padding-left:10px; 
		}

		li:last-child:after{
			content: '';
		}

		form[name="test"] ul{
			list-style: none; 
		}

		</style>

	</head>
	<body>
			<a href="http://localhost/cscs2441/log-in.html"> <h5 style="text-align:right">
            <?php if (!empty($_SESSION['MM_Username'])) {
             echo "Welcome ",$_SESSION['MM_Username'];  }
			 else{
				 echo "<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#0645AD'><a href=\"logIn.php\">Sign-in/Register</a></div>"; 
			 }
			 
			 
			 ?>
            
            </a>
		</p>
            <div style ='font:11px/21px Arial,tahoma,sans-serif;color:#0645AD'><a href="<?php echo $logoutAction ?>">Sign out</a></div>
    <h1><center><a href=index.php target = "_blank" style="color: white"><font size="100px" face="IMPACT">A Better You</font></a></center>
			

		<ul class="menu"> 
        <li><a href = index.php style="color: white">Home</a></li>
			<li><a href = forum.php style="color: white">Forum</a></li>
			<li><a href = findTrainers.php style="color: white">Trainers<a></li>
			<li><a href = gym.php style="color: white">Gyms</a></li>
             <?php
			if(! empty($_SESSION['MM_UserGroup'])){
			if($_SESSION['MM_UserGroup'] == 1)
{
			echo '<li><a href = "userInfoAboutMe.php" style="color: white">User Info</a></li>';
}
			else if($_SESSION['MM_UserGroup'] == 2)
{
			echo '<li><a href = "trainerAboutMe.php" style="color: white">User Info</a></li>';
}
			else if($_SESSION['MM_UserGroup'] == 3)
{
			echo '<li><a href = "gymAboutMe.php" style="color: white">User Info</a></li>';
}}
			else
{
			echo '<li><a href = "register.php" style="color: white">User Info</a></li>';
}

			?>
		</ul>
	</h1>

		<ul class="menu" style="text-align:right"> 
			<li><a href = findClients.php style="color: black">Find Clients</a></li>
			<li><a href = trainerAboutMe.php style="color: black">About Me<a></li>
			<li><a href = trainerInfoSettings.php style="color: black">Settings</a></li>
		</ul>

		<div class ="testing">
		<blockquote><font face="CENTURY GOTHIC" size="7" color="#9999FF">Update Trainer Profile</font></blockquote></div><br><br><br><br><br><br>
		 
		 

		
						<img src="images/settings.jpg" width="700" height="400" name="slide" align = "right">
						

			

			<!--<br><font face="LA BAMBA LET" size="7" color="#9999FF"><center>Let's find you a gym</center></font></br>-->
			<br><br><br><br><font face="TECHNIC" size="6" color="#3366FF" align="right"><center>Please enter information in the fields that <br> you wish to edit</font></center></br><br><br><br><br><br><br>
		


			<br><br><br><br><br><br><br><br><br>
			<h2>&nbsp &nbsp &nbsp &nbsp Please enter the following information below:</h2>
            <blockquote><form name="test" method="POST" > 
			 	<br>
            <?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	
	$sql = "SELECT * FROM mydb.trainer WHERE `username` LIKE '$_SESSION[MM_Username]'";
	mysql_select_db('TRAINER');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION >= 5.1) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo'<div class="quote">
			 <form action="<?php echo $loginFormAction; ?>" name="test" method="POST" >
			 <form name="test" method="POST" > 
			<label>&nbsp &nbsp &nbsp &nbsp First Name:</label>	
				<input type="text" name="FirstName" value= '.$row['First Name'] .' >
			<form name="test" method="POST" > 
			<label>&nbsp &nbsp &nbsp &nbsp Last Name:</label> 
			<input type="text" name="LastName" value='.$row['Last Name'] .'><br>	<br>

			<form name="test" method="POST" > 
			<label>&nbsp &nbsp &nbsp &nbsp Email Address:</label> 
			<input type="text" name="Email" value='.$row['Email'] .'><br><br>
				<form name="test" method="POST" > 
			<label>&nbsp &nbsp &nbsp &nbsp Rate:</label> 
			<input type="text" name="Rate" value='.$row['AvgPrice'] .'><br><br>		
				<br><form name="test" method="POST" > 
				<label>&nbsp &nbsp &nbsp &nbsp City:</label>	
				<input type="text" name="City" value='.$row['City'] .'>
<form name="test" method="POST" > 
				<label>&nbsp &nbsp &nbsp &nbsp   State: </label> 	
			<select name = "State">
			<option selected="selected">'.$row['State'] .'</option>
  				<option value="AL">AL</option>
				<option value="AK">AK</option>
				<option value="AZ">AZ</option>
				<option value="AR">AR</option>
				<option value="CA">CA</option>
				<option value="CO">CO</option>
				<option value="CT">CT</option>
				<option value="DE">DE</option>
				<option value="DC">DC</option>
				<option value="FL">FL</option>
				<option value="GA">GA</option>
				<option value="HI">HI</option>
				<option value="ID">ID</option>
				<option value="IL">IL</option>
				<option value="IN">IN</option>
				<option value="IA">IA</option>
				<option value="KS">KS</option>
				<option value="KY">KY</option>
				<option value="LA">LA</option>
				<option value="ME">ME</option>
				<option value="MD">MD</option>
				<option value="MA">MA</option>
				<option value="MI">MI</option>
				<option value="MN">MN</option>
				<option value="MS">MS</option>
				<option value="MO">MO</option>
				<option value="MT">MT</option>
				<option value="NE">NE</option>
				<option value="NV">NV</option>
				<option value="NH">NH</option>
				<option value="NJ">NJ</option>
				<option value="NM">NM</option>
				<option value="NY">NY</option>
				<option value="NC">NC</option>
				<option value="ND">ND</option>
				<option value="OH">OH</option>
				<option value="OK">OK</option>
				<option value="OR">OR</option>
				<option value="PA">PA</option>
				<option value="RI">RI</option>
				<option value="SC">SC</option>
				<option value="SD">SD</option>
				<option value="TN">TN</option>
				<option value="TX">TX</option>
				<option value="UT">UT</option>
				<option value="VT">VT</option>
				<option value="VA">VA</option>
				<option value="WA">WA</option>
				<option value="WV">WV</option>
				<option value="WI">WI</option>
				<option value="WY">WY</option>
			</select>

<form name="test" method="POST" > 
				<label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ZIP Code:</label>	
				<input type="text" name="Zip" value='.$row['Zip'] .' > <br>
				<br>
<form name="test" method="POST" > 
				<label for="Oldpassword">Old Password</label>
            	<input type="password" class="form-control" id="password1" name="Oldpassword" placeholder="Old Password">
            	<br><br>
        <form name="test" method="POST" >  
            	 <label for="password1">New Password</label>
        		 <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
     <form name="test" method="POST" > 
  				<label for="password2">Repeat Password</label>
           		<input type="password" class="form-control" id="password2" name="password2" placeholder="Password"><br>         

		<input type="submit" name="submit" value="Submit">
        </button>
      </p>
      <input type="hidden" name="MM_insert" value="test">
	</div> </form>

		 '; 
		 
		// echo $_POST['Username'];
		 
		 ?>
         
         
         
         
         
         
         <?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION >= 5.1) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
 if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
 if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "test")) 
 {
	 $test = "SELECT * FROM mydb.trainer WHERE `username` LIKE '$_SESSION[MM_Username]'";
	 mysql_select_db('TRAINER');
	 $result = mysql_query($test, $conn);
	 $row = mysql_fetch_array($result, MYSQL_ASSOC);

	 if($_POST['Oldpassword'] == $row['Password']){
		 if($_POST['password1'] == $_POST['password2'] ){
$email = 	GetSQLValueString(isset($_POST['Email']) ? $_POST['Email'] : null, "text");
$pass =					GetSQLValueString(isset($_POST['password1']) ? $_POST['password1'] : null, "text");
  
   $city =                    	GetSQLValueString(isset($_POST['City']) ? $_POST['City'] : null, "text");
   $state =                    	GetSQLValueString(isset($_POST['State']) ? $_POST['State'] : null, "text");
     $zip =                  	GetSQLValueString(isset($_POST['Zip']) ? $_POST['Zip'] : null, "text");
      $first =             GetSQLValueString(isset($_POST['FirstName']) ? $_POST['FirstName'] : null, "text");
     $last =                   GetSQLValueString(isset($_POST['LastName']) ? $_POST['LastName'] : null, "text");
$rate =                   GetSQLValueString(isset($_POST['Rate']) ? $_POST['Rate'] : null, "text");

 $order = "UPDATE mydb.trainer SET email = $email, Password = $pass,
 City = $city,
 State = $state, `Zip` = $zip, `First Name` = $first, `Last Name` = $last, `AvgPrice` = $rate WHERE `username` LIKE '$_SESSION[MM_Username]'";
mysql_select_db('TRAINER');
	$retval = mysql_query( $order, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	} 

if($retval){ 
echo "
            <script type=\"text/javascript\">
           location.reload(true);
            </script>
        ";
} 
		 }

else { 
echo "New Passwords don't match."; 
//echo $name; 
} 

	 }
	 
else{
	echo "Old password is incorrect";
}
	 }
mysql_close($conn);
	}
	
?>      

		<br><br><br><br>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
</body>

</html>
