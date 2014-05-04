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
		<title>User Info settings</title>
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

		h2{
		border: 5px solid black;
		background-color: red;
		color: white;	
		font-size = 400px;

	}



	a{
		color:rgb #ef11a; 
		font-size: 20px; 
		font-family: sans-serif;
		text-decoration: none;
	}

	b{
		color: black;
		font-size: 40px;
		font-family: ARIAL BLACK;
		text-decoration: underline;
	}

	c{
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

		ul.chain{
			list-style: none;
		}
		ul.chain li{
			display: inline;
		}

		ul.chain li:after{
			content: '->';
			padding-left: 5px;
		}

		ul.chain li:last-child:after{
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

		<ul class="chain" style="text-align:left"> 
			<li><a href = forum.php style="color: black">Categories</a></li>
			<li><a href = "#" style="color: black">Other</a></li>
		</ul>

		<div class ="testing">
		<blockquote><font face="ARIAL BLACK" size="7" color="#9999FF">Tips and Tricks</font></blockquote></div>
		 <div class ="C_Header" style="text-align:left">
    <h2><font face="ARIAL" size = "50px">Categories: Other</h2>	
    
    <?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	
	$sql = "SELECT * FROM mydb.forumpost WHERE `Topic` = 'Other'";
	mysql_select_db('FORUMPOST');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo "Post: {$row['PostText']} <br> ".
			 "--------------------------------<br>";
	} 
	
	
	
	mysql_close($conn);
 
 ?>	
	<p>&nbsp;</p>
			<p><a href =create.php style="color: black">Create topic</a>
			  
			  
			  
			  
			  
			  
			  
			  <br><br><br><br><br><br><br>
    </p>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
		
</body>

</html>
