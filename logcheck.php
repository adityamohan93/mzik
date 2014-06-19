<?php
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$con=mysql_connect("localhost","root","")or die(mysql_error());
	mysql_select_db("wdc",$con);
	$query="select * from mzik";
	$result=mysql_query($query);
	$row=mysql_num_rows($result);//for number of rows
	echo "<br>";
	$f=0;
	while($row=mysql_fetch_array($result))
	{
		if($row['email-id']==$user && $row['pass']==$pass )
		{
			$f=1;
			break;
		}
	}
	if($f==1)
	{
		session_start();
		$user=$_REQUEST['username'];
		$pass=$_REQUEST['password'];
		$_SESSION['username']=$user;
		$_SESSION['password']=$pass;
		$_SESSION['login']=1;
		header('Location:index.php');
	}
	else
	{
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>Login Error</title>
			<meta charset="utf-8"><meta name="mZik" content="Your sound station" />
			<meta name="keywords" content="music, network, sound, social, upload, browse" />
			<meta name="author" content="PrAdAt" />
			<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
			<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
			<link rel="stylesheet" href="css/style3.css" type="text/css" media="all">
			<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
			<script type="text/javascript" src="js/cufon-yui.js"></script>
			<script type="text/javascript" src="js/cufon-replace.js"></script>
			<script type="text/javascript" src="js/script.js"></script>
			<script type="text/javascript" src="js/ITC_Busorama_500.font.js"></script>
		</head>
		<body id="page2">
			<div class="wrap"><!-- header -->
				<header>
					<div class="container">
						<h1><a href="index.html">mZik</a></h1>
							<nav>
								<ul>
               
									<li class="m1"><a href="index.html"><span>mZik</span></a></li>
									<li class="m3"><a href="register.html"><span>REGISTER</span></a></li>
								</ul>
							</nav>
					</div>
				</header><br><br><br><br><br>
				<center><h3>
					<font color="red">Username and password do not match.<br /> Try Again</h3><br><br><br></font><form action="logcheck.php" method="post" >
				Username &nbsp;<input name="username" id="username" type="text"  size="25" maxlength="35" />
				<br /><br />
				&nbsp &nbsp Password &nbsp;<input name="password" id="password" type="password"  size="25" maxlength="35" />
				&nbsp; &nbsp;
				<br /><br />
				
				<input type="submit" id="signin_submit" value="Login" ></center>
	
				</form>

		</div>
	</body>
	</html>
<?php } ?>