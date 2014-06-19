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
</head>
<body id="page2">
<div class="wrap"><!-- header -->
<header>
   <div class="container">
      <h1><a href="index.html">Music Beats</a></h1>
      <nav>
         <ul>
               
            <li class="m1"><a href="index.php"><span>mZik</span></a></li>
            <li class="m2"><a href="profile.php"><span>Profile</span></a></li>
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
 
				if ($ch== 0) echo "welcome ".$row['firstname'] . " " . $row['surname'];		?>
				
				
				
				</span></a></li>
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
<form method="post" action="friends.php" name="s" id="search">
  <input name="frnd" type="text" size="40" placeholder="Search for Music" />
</form>	
<br><br>



<?php

 	

$allowedExts = array("mp3", "wma", "m4a", "mpeg", "wav", "ogg", "aac", "aiff", "amr", "ra");

$arr = explode(".", $_FILES["file"]["name"]);
$extension = end($arr);

if ((($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "audio/m4a")
|| ($_FILES["file"]["type"] == "audio/mpeg")
|| ($_FILES["file"]["type"] == "audio/wav")
|| ($_FILES["file"]["type"] == "audio/ogg")
|| ($_FILES["file"]["type"] == "audio/aac")
|| ($_FILES["file"]["type"] == "audio/aiff")
|| ($_FILES["file"]["type"] == "audio/amr")
|| ($_FILES["file"]["type"] == "audio/ra")
)
&& ($_FILES["file"]["size"] < 50000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    
    

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
    ?> <font size="26" color="red"> <?php
	  echo $_FILES["file"]["name"] . " already exists. ";
      ?> </font>
	  <?php
	  
	  }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
	
	$gh = $_SESSION['username'] ;  
	/* mysql_query("INSERT INTO ".$gh."(`songs`) VALUES('\\" . $_FILES['file']['name'] . "\\')") ; 
	
	  */
	  $filee = $_FILES['file']['name'] ;
	mysql_query("INSERT INTO `".$gh."`(`songs`) VALUES(\"$filee\")") ; 
	  
	  mysql_query("INSERT INTO songs_db(`songs`) VALUES(\"$filee\")") ; 
	  
	  
	  ?>
	  
	  <font face="Copperplate Gothic Bold" size="26" color="red"> Song Uploaded Successfully</br></br></font>
	  

 
	 
<object type="application/x-shockwave-flash" data="player.swf" width="200" height="20">
     <param name="movie" value="player.swf" />
     <param name="FlashVars" value="mp3=<?php echo "upload/" . $_FILES["file"]["name"] ; ?>&bgcolor=000000&showvolume=1" />
</object>

	  
	  



	 <?php 
	  echo "</br></br>";
	  echo "Song: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / (1024*1024)) . " MB<br />";
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
  
?>

<br><br>

<br><br>



<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Upload More:</label>
<input type="file" id="signin_submit" name="file" id="file" /> 
<br /></br>
<input type="submit" id="signin_submit" name="submit" value="Upload" />
</form>

<br><br>



</body>
</html>
