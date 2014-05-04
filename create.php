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
			<a href="logIn.php"> <h5 style="text-align:right">
            <?php if (!empty($_SESSION['MM_Username'])) {
             echo "Welcome ",$_SESSION['MM_Username'];  }
			 else{
				 echo "<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#0645AD'><a href=\"logIn.php\">Sign-in/Register</a></div>"; 
			 }
			 
			 
			 ?>
            
            </a>
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


			<div class="quote">
            <form name = "test" method = "POST">
			  <p>&nbsp;</p>
			  <p>
    <form name="test" method="POST" > 
      <p>
        <label>Category: </label>
        <select name = "Category" id="Category">
          <option value="Diet">Diet</option>
          <option value="Running">Running</option>
          <option value="Weights">Weights</option>
          <option value="Marathon">Marathon</option>
          <option value="Weight Loss">Weight Loss</option>
          <option value="Other">Other</option>
        </select>
      </p>
			    <p>
			      <textarea name="myTextBox" cols="60" rows="7" action = "POST">What do you want to say?</textarea>
      </p>
			    <p>
      </p>
			      <input type="submit" name="submit" value="Submit">
			      </button>
			      </p>
			      <input type="hidden" name="MM_insert" value="test">
      </p>
	</div> </form>
		</center>
		<p><br>
		  <br><br><br><br><br></blockquote></div>
  <?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
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
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "test")) {

  
  $insertSQL = sprintf("INSERT INTO mydb.forumpost (PostID, PostText, Topic) VALUES (%s, %s, %s)",
					   'NULL',
                       GetSQLValueString($_POST['myTextBox'], "text"),
                       GetSQLValueString($_POST['Category'], "text"));
  mysql_select_db('forumpost');
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());


}
?>
		  
		  <br><br><br><br>
    </p>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
		
</body>

</html>
