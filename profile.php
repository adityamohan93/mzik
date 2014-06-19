<?php
$con=mysql_connect("localhost","root","");

	if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("wdc",$con);
	session_start();
	$result = mysql_query("SELECT * FROM mzik");
	
  

?>	
<!DOCTYPE html>
<html lang="en">
<head><title>mZik</title>
<meta charset="utf-8">
<meta name="mZik" content="Your sound station" />
<meta name="keywords" content="music, network, sound, social, upload, browse" />
<meta name="author" content="PrAdAt" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style4.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/ITC_Busorama_500.font.js"></script>
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, header nav ul li, header nav ul li a, h1 a');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<body id="page2">
<div class="wrap"><!-- header -->
<header><center>
   <div class="container">

      <nav>
         <ul>
               
            <li class="m1"><a href="index.php"><span>mZik</span></a></li>
            <li class="m2"><a href="profile.php" class="active"><span>Profile</span></a></li>
			<li class="m4"><a><span>
		<?php 	$row = mysql_fetch_array($result);
				$ch=0;
				if($row['email-id']==$_SESSION['username'])
				{
				echo "welcome ".$row['firstname'] . " " . $row['surname'];
				$ch=1;
				}
				else
				while($row = mysql_fetch_array($result))
					{
					if($row['email-id']==$_SESSION['username'])
						break;
						}
 
				if ($ch== 0) echo "welcome ".$row['firstname'] . " " . $row['surname'];	
				?>
				
				
				
				</span></a></li>
			<li class="m3"><a href="logout.php">		
			<span>Logout</span></a></li>
		

	
            
         
         </ul>
      </nav>
   </div></center>
</header>

<br><br><center>






<style type="text/css">
.classname {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-moz-border-radius:31px;
	-webkit-border-radius:31px;
	border-radius:31px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:arial;
	font-size:16px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
	margin-left:600px;
}.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.classname:active {
	
	top:1px;
}

</style>
<p align="right">
</p>

<center>


<center>
<a href="#" class="classname">Connect</a></center>

<br>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<div class="container">


<form action="search.php" method="post" id="search">
  <input name="q" type="text" size="40" placeholder="Search for Music" />
</form>	
 

<br><br><br>


<!--

<form action="layout.php" method="post"
enctype="multipart/form-data">
<label for="file"></label>
<input type="file" id="signin_submit" name="file" id="file" /> 
<br /><br />
<input type="submit" id="signin_submit" name="Submit" value="Upload" />
</form>
-->



<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" id="signin_submit" name="file" id="file" /> 
<br /></br>
<input type="submit" id="signin_submit" name="submit" value="Upload" />
</form>

<br><br>







   <!-- aside -->
   <aside>
      <div class="inside">
         <h2>Connections</h2>
		 
		 
		 
<form method="post" action="friends.php" id="search">
  <input name="frnd" type="text" size="40" placeholder="Search for People by email-id" />
</form>	
<br><br>


		 
		 
         <ul class="news">
            
            <li><a href="#">June 14, 2010</a><strong>Neque porro quisquam est</strong>Consequuntur magni dolores eos qughi ratione voluptatem sequi.</li>
            <li><a href="#">May 29, 2010</a><strong>Minima veniam, quis nostrum</strong>Ut enim ad minima veniam, quis nosrum exercitatnem ullam corporis.</li>
         </ul>
      </div>
   </aside>
   <!-- content   -->
         
   <section id="content">

        </section>
 
</div></div>


</body>
</html>
