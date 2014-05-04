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

		<title>Find Trainers</title>
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


		

		
		
						
			<blockquote><font face="CENTURY GOTHIC" size="7" color="#9999FF">Find Personal Trainers </font></blockquote>
			
		
			
		
		
		</blockquote><br><br><br>

			<form name="test" method = "POST"> 
        	<center><body><right><input name="first_name"  placeholder="First Name" type="text">
        	<input name="last_name"  placeholder="Last Name" type="text">
        	<p></p>
        	<input name="city"  placeholder="city" type="text">
        	<input name="zip" type="text"  placeholder="Zip Code" maxlength="5">
			  <label>&nbsp    State:  </label>	
			<select name="state">
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

				&nbsp &nbsp &nbsp
			</select>

		<br><br>
		<blockquote><input name="submit" type="submit" formmethod="POST"  value="Find a trainer!"></button></blockquote></div>
             
 			</form>

 		<?php if (isset($_POST['submit'])) 
{ 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	if(!empty($_POST['first_name']) && !empty($_POST['last_name'])){
	$sql = "SELECT * FROM mydb.trainer WHERE `Last Name` LIKE '$_POST[last_name]' AND `First Name` LIKE '$_POST[first_name]'";
	mysql_select_db('TRAINER');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo "First Name :{$row['First Name']}  <br> ".
			 "Last Name: {$row['Last Name']} <br> ".
			 "City: {$row['City']} <br> ".
			 "State: {$row['State']} <br> ".
			 "Zip Code: {$row['Zip']} <br> ".
			 "Email: {$row['Email']} <br> ".
			 "Phone Number: {$row['Phone Number']} <br> ".
			 "Avg Price: {$row['AvgPrice']} <br> ".
			 "--------------------------------<br>";
	} 
	}

	if(!empty($_POST['zip'])){
	$sql = "SELECT * FROM mydb.trainer WHERE `Zip` LIKE '$_POST[zip]'";
	mysql_select_db('TRAINER');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo "First Name :{$row['First Name']}  <br> ".
			 "Last Name: {$row['Last Name']} <br> ".
			 "City: {$row['City']} <br> ".
			 "State: {$row['State']} <br> ".
			 "Zip Code: {$row['Zip']} <br> ".
			 "Email: {$row['Email']} <br> ".
			 "Phone Number: {$row['Phone Number']} <br> ".
			 "Avg Price: {$row['AvgPrice']} <br> ".
			 "--------------------------------<br>";
	} 
	}
	
	
	
	if(empty($_POST['zip']) && !empty($_POST['state']) && !empty($_POST['city'])){
	$sql = "SELECT * FROM mydb.trainer WHERE `State` LIKE '$_POST[state]' AND `City` LIKE '$_POST[city]'";
	mysql_select_db('TRAINER');
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		echo "First Name :{$row['First Name']}  <br> ".
			 "Last Name: {$row['Last Name']} <br> ".
			 "City: {$row['City']} <br> ".
			 "State: {$row['State']} <br> ".
			 "Zip Code: {$row['Zip']} <br> ".
			 "Email: {$row['Email']} <br> ".
			 "Phone Number: {$row['Phone Number']} <br> ".
			 "Avg Price: {$row['AvgPrice']} <br> ".
			 "--------------------------------<br>";
	} 
	}
	
	
	mysql_close($conn);
} 
 ?>	
 		 
	<center><img src="images/personalTrainer.jpg" width="700" height="500" name="slide" ></center>
	
	
		

		  <!--<form name="test" method="" align="right"> 

			<label>Search Forum:</label>	

			<input type="text" name="name">

			<input type="submit" name="submit" value="GO"></button>
			align = "center"

		</form> -->



		


		<!--<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>



		<blockquote>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</blockquote>-->



	

		<br><br><br><br><br>

		<hr COLOR="black" SIZE="2"></hr>

		<center><a href=contactUs.php  style="color: black">Contact Us </a></center>
		<center><a href=aboutUs.php style="color: black">About Us</a></center>
		<center><a href=termsConditions.php  style="color: black">Terms & Conditions</a></center>
		<center><a href=suggestions.php  style="color: black">Suggestions</a></center></p>
		<p><center><font face="TECHNIC" size="4">&#169 2014 A Better You<br>All Rights Reserved</center></p>

		







</body>





	



</html>

