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
		<title>A Better You</title>
		<style type="text/css">
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
			<a href="./logIn.php"> <h5 style="text-align:right">
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

		
		<blockquote><font face="CENTURY GOTHIC" size="7" color="#9999FF">Welcome, A Better You</font></blockquote><br><br><br>
		
		  <!--<form name="test" method="" align="right"> 
			<label>Search Forum:</label>	
			<input type="text" name="name">
			<input type="submit" name="submit" value="GO"></button>
		</form> -->

		<head>
			<script type="text/javascript">
						var image1 = new Image()
						image1.src = "images/image1.jpg"
						var image2 = new Image()
						image2.src = "images/image2.jpg"
						</script>
						</head>
						<body><center>
						<p><img src="images/image1.jpg" width="500" height="400" name="slide" /></p></center>
						<script type="text/javascript">
						        var step=1;
						        function slideit()
						        {
						            document.images.slide.src = eval("image"+step+".src");
						            if(step<2)
						                step++;
						            else
						                step=1;
						            setTimeout("slideit()",2500);
						        }
						        slideit();
						</script>
						</body>
						<br></br>

			

			<br><blockquote><font face="LA BAMBA LET" size="7" color="#9999FF"><center>Information</center></font></blockquote></br>
			<br><blockquote><font face="TECHNIC" size="5" color="#3366FF"><center>We know what you're thinking, wow another health website. Umm didn't people tell you to never jump to conclusions?  Unfortunately or fortunately (whatever floats your boat) we are not just another health website. We are a lifestyle transformation machine that just happens to be online. Want to get ready for that marathon, work on spicing up your routine? Click the trainers section, where you can find qualified personal trainers near you. Looking to switch gyms and get the most bang for your buck or even look for a gym to join? Click on the Gym tab. Want to just get in shape but don't have that motivating force or want suggested routines. Click on the forums tab. We could go on and but why don't you see for yourself and enter our machine. We don't want you to just lose weight, we want you to be happy with yourself, love yourself and most of all become a better you!</font></center></blockquote></br><br><br><br><br><br>
		

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
