<!DOCTYPE html>
<html lang="en">
<head>
<title>About Us - About Us | Music - Free Website Template from Templates.com</title>
<meta charset="utf-8">
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
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
      <h1><a href="index.html">Music Beats</a></h1>
      <nav>
         <ul>
               
            <li class="m1"><a href="index.php" class="active"><span>mZik</span></a></li>
            <li class="m2"><a href="profile.php"><span>Profile</span></a></li>
			<li class="m3"><a href="register.html"><span>Register</span></a></li>
			<li class="m3"><a href="logout.php">		
			<span>Logout</span></a></li>
		
<br><br><center>
	
            
         
         </ul>
      </nav>
   </div>
</header>

<center>

<div class="container">


<br><br>
<form method="get" action="/search" id="search">
  <input name="q" type="text" size="40" placeholder="Search for Music" />
</form>	
<br><br>

<br><br>



<?php
$allowedExts = array("mp3", "wav", "ogg", "wma");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/ogg")
|| ($_FILES["file"]["type"] == "audio/wav"))
&& ($_FILES["file"]["size"] < 10000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1048576) . " Mb<br />";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
	
	
	
	if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  if(($_FILES["file"]["size"] > 10000000)
  echo "Invalid File larger than 10 MB";
else
echo "Invalid file type";
  }
?>
<br><br>

<br><br>



</body>
</html>
