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
<?php require_once('Connections/connTest.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
} ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "test")) {
	if($_POST['password1'] == $_POST['password2'] ){
  $insertSQL = sprintf("INSERT INTO gym (ID, Address, City, `State`, `Zip Code`, Email, `Phone Number`, Name, PriceRange, Username, Password) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       'NULL',
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['City'], "text"),
                       GetSQLValueString($_POST['State'], "text"),
                       GetSQLValueString($_POST['Zip'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['AvgCost'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password1'], "text"));

  mysql_select_db($database_connTest, $connTest);
  $Result1 = mysql_query($insertSQL, $connTest) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));}
  else
  	echo "Passwords don't match";
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "gymRegister.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connTest, $connTest);
  
  $LoginRS__query=sprintf("SELECT Username, Password FROM gym WHERE Username=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connTest) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = 3;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!doctype html>
<html>
<head>
		<title>Register/Sign In</title>
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
	text-decoration: none;
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

		a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
        </style>

    <meta charset="utf-8">
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
			<li><a href = register.php style="color: black">User</a></li>
			<li><a href = trainerRegister.php style="color: black">Trainer</a></li>
			<li><a href = gymRegister.php style="color: red">Gym<a></li>
		</ul>
	<blockquote><font color="#9999FF" size="7" face="CENTURY GOTHIC">Register new gym here:</font><br>
	</blockquote>
	<h2>&nbsp &nbsp &nbsp &nbsp Please enter the following information below:<br>
	  <br>
      <br>
    </h2>
	<form action="<?php echo $loginFormAction; ?>" name="test" method="POST" >
      <p>
        <label>&nbsp &nbsp &nbsp &nbsp Name:</label>
      <input name="FirstName" type="text" id="FirstName" placeholder="Name" title="FirstName">
      <p>
        <label for="username">&nbsp &nbsp &nbsp &nbspUsername:</label>
        <input name="username" type="text" id="username" placeholder="Username">
      <p>
        <label>&nbsp &nbsp &nbsp &nbsp Email Address:</label>
        <input name="Email" type="text" id="Email" placeholder="someemail@host.com" title="email">
      <p>
        <label>&nbsp &nbsp &nbsp &nbsp Phone:</label>
        <input name="Phone" type="text" id="Phone" placeholder="XXX-XXX-XXXX" title="email">
<br>
      <p>
        <label>&nbsp        &nbsp &nbsp &nbsp Avg Monthly Cost:</label>
      <input name="AvgCost" type="text" id="AvgCost" placeholder="Height in inches" title="height">
      <br>
          <br>
          <label>&nbsp &nbsp &nbsp &nbsp Address:</label>
          <input name="Address" type="text" id="Address" placeholder="Address">
          <label><br>
            <br>
            &nbsp &nbsp &nbsp &nbsp City:</label>
          <input name="City" type="text" id="City" placeholder="City">
          <label>&nbsp &nbsp &nbsp &nbsp   State: </label>
          <select name="State" id="State">
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
        <label>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ZIP Code:</label>
          <input name="Zip" type="text" id="Zip" placeholder="ZIP" >
          <br>
          <br>
        <label for="password5">Password</label>
          <input type="password" class="form-control" id="password5" name="password1" placeholder="Password">
        <label for="password6">Repeat Password</label>
          <input type="password" class="form-control" id="password6" name="password2" placeholder="Password">
      </p>
      <p>
        <input type="submit" name="submit" value="Submit">
        </button>
      </p>
      <input type="hidden" name="MM_insert" value="test">
	</form>
      <p><a href="gymLogIn.php">Already registered? Sign in here</a></p>
      <p><br>
        </blockquote></div>
        
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
