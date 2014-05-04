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
		<title>About me</title>
    	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<script src="js/jquery.js"></script>
    	<script src="js/jquery.validate.js"></script>
		<style type="text/css">
		
	.quote {
    	text-align:left;
	}

	.quote blockquote {
		
   		padding:20px 5px; 
   		border-left:150px solid #ffffff; 
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
			<li><a href = userInfoAboutMe.php style="color: black">About Me</a></li>
			<li><a href = userInfoSettings.php style="color: black">Settings </a><a href = searchUser.php style="color: black">Search Users</a></li>
		</ul>

		<div class ="testing">
	<blockquote><font face="CENTURY GOTHIC" size="7" color="#9999FF">About Me</font></blockquote></div><br><br><br><br><br><br>
		 
		 
<font face="CENTURY GOTHIC" size="7" color="#9999FF">
		
						<img src="images/aboutMe.png" width="700" height="400" name="slide" align = "left"  >
						

			

			<!--<br><font face="LA BAMBA LET" size="7" color="#9999FF"><center>Let's find you a gym</center></font></br>--
			<br><br><br><br><font face="TECHNIC" size="6" color="#3366FF" align="right"><center>Please enter information in the fields that <br> you wish to edit</font></center></br><br><br><br><br><br><br>-->
		


			<!--<h2>&nbsp &nbsp &nbsp &nbsp Please enter the following information below:</h2>-->

			<div class="quote"><blockquote> 
			 	<br>
                <?php  
{ 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	$sql = "SELECT * FROM mydb.user WHERE `Username` LIKE '$_SESSION[MM_Username]'";
	mysql_select_db('USER');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo "First Name :{$row['First Name']}  <br> ".
			 "Last Name: {$row['Last Name']} <br> ".
			"username: {$row['username']} <br> ".
			"Gender: {$row['Gender']} <br> ".
			"Address: {$row['Address']} <br> ".
			 "City: {$row['City']} <br> ".
			 "State: {$row['State']} <br> ".
			 "Zip Code: {$row['Zip Code']} <br> ".
			 "Height: {$row['Height']} <br> ".
			 "Weight: {$row['Weight']} <br> ".
			 "BMI: {$row['BMI']} <br> ".
			 "--------------------------------<br>";
	} 

	
	
	mysql_close($conn);
} 
 ?>	
				

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
</body>

</html>
