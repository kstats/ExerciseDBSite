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
		<title>Contact Us</title>
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
    	background:#F2F2F2
 
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

		
		<blockquote><font face="CENTURY GOTHIC" size="6" color="#9999FF">Your go to for becoming a better you</font></blockquote><br><br><br><br><br><br>
		
		 

		
	
					


			<div class="quote">
				<blockquote> <font face="BRITANNIC BOLD" size="6" color="#9999FF">
			 	<br>
			<center><label>Thank you for using A Better You!</label>
		    <br><label>In order to make sure that you are 100 percent satisfied with our <br>
				   website we want you to contact us if for some reaon you are unhappy <br>
				   please fill in the information below.</label>

			<form name="test" method="" > 
			 	<br>
			
			<center><input type="text" name="name" placeholder="First name">
			<form name="test" method="" > 
			<input type="text" name="name" placeholder="Last name"><br>	<br>	
			<input type="text" name="name" placeholder="Email Address"><br>	<br>	
			<center>
			<form action="http://www.html.am/html-codes/textboxes/submitted.cfm"><!--http://www.html.am/html-codes/textboxes/html-textbox.cfm-->
			<textarea name="myTextBox" cols="60" rows="7">How can we help you?</textarea>
			<br>
			<input type="submit" name="submit" value="Post"></center>
			</form><br><br><br><br><br><br>
		</center>
			
				 
			</font></blockquote>

			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

			


	


		<!--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

		<blockquote>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</blockquote>-->

	
		<br>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
		



</body>


	

</html>
