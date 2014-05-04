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
		<title>About US</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<script src="js/jquery.js"></script>
    	<script src="js/jquery.validate.js"></script>
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
			<a href="http://localhost/cscs2441/log-in.html"> <h5 style="text-align:right">
            <p>
              <?php if (!empty($_SESSION['MM_Username'])) {
             echo "Welcome ",$_SESSION['MM_Username'];  }
			 else{
				 echo "<div style ='font:11px/21px Arial,tahoma,sans-serif;color:#0645AD'><a href=\"logIn.php\">Sign-in/Register</a></div>"; 
			 }
			 
			 
			 ?>
              
            </a></p>
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
		
		
		
		  <!--<form name="test" method="" align="right"> 
			<label>Search Forum:</label>	
			<input type="text" name="name">
			<input type="submit" name="submit" value="GO"></button>
		</form> -->


		<br><blockquote><font face="LA BAMBA LET" size="7" color="#9999FF">About A Better You</font></blockquote>
			<blockquote><font face="TECHNIC" size="5" color="#3366FF">Your go to for becoming a better you</font></center></blockquote></br><br><br>

			<br><blockquote><font face="LA BAMBA LET" size="7" color="#9999FF"><center>Our story:</center></font></blockquote>
			<blockquote><font face="LA BAMBA LET" size="4" color="#9999FF"><center>As computer science students at The George Washington University we <br>were talking and realized that we needed to be a little more healty and<br> better ourselves In doing so, we also realized that our schedules didn't <br>quite match up to workout together so we thought and tried to find a way <br>to workout with a partner unfortunaely we had problems doing so. So we sat <br>and brainstormed and came up with what you see today.  We hope you enjoy <br> and take advantage of our website in becoming A Better You!</center></font></blockquote><br><br><br><br><br>
			


		<head>
		<font face="BRUSH SCRIPT MT" size="6" color="#3366FF" align="right">Katherine Stasaski</font><br><br><br>
		<img src="images/katie.jpg" width="350" height="325" name="slide" align = "left">
		<font face="GARAMOND" size="6" color="#3366FF" align="right"><center><br><br>"I believe that being healthy starts with what you eat"</center></font>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br>
		<div clss="move1">
		<font face="BRUSH SCRIPT MT" size="6" color="#3366FF" align="right" ><P ALIGN="right">Terrence Lewis &nbsp</P></font><br></div>
		<img src="images/Terrence.jpg" width="350" height="350" name="slide" align = "right">
		<font face="GARAMOND" size="6" color="#3366FF" align="left"><center><br><br><br>"Being healthy is not something that should be a fad, it's a way of life"</font>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br>
		<font face="BRUSH SCRIPT MT" size="6" color="#3366FF" align="right" ><P ALIGN="left">Ehren Wong &nbsp</P></font><br></div>
		<img src="images/ehren.jpg" width="350" height="430" name="slide" align = "left">
		<font face="GARAMOND" size="6" color="#3366FF" align="right"><center><br><br><br><br>"Becoming a vegan was the best choice that I have ever made in my <br> life and I have never felt better about myself"</font>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br><br><br><br>

		<font face="BRUSH SCRIPT MT" size="6" color="#3366FF" align="right" ><P ALIGN="right">Nia Christian &nbsp</P></font><br></div>			
		<img src="images/nia.jpg" width="400" height="360" name="slide" align = "right">
		<font face="GARAMOND" size="6" color="#3366FF" align="left"><center><br><br><br><br>"We all have busy lives, but if you can manage to get up and out for 30 minutes a day it will pay off in the long run"</font>
						<br><br><br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br>
		

			
				
			
		

		<!--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>

		<blockquote>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</blockquote>

		#bottom {
   		background-color: #CCCCCC;
  		position: relative;
  		top: 72%;
  		bottom: 0;
  		left: 0;
  		right: 0;
  		z-index: -1;

		}-->

		
		<br>
		<hr COLOR="black" SIZE="2"></hr>
		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>
		<!--<div id="bottom"></div>-->



</body>


	

</html>
