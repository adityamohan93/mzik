<?php
$con=mysql_connect("localhost","root","");

	if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("wdc",$con);
	session_start();
	$result = mysql_query("SELECT * FROM mzik");
	
?>	<!DOCTYPE html>
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
      <h1><a href="index.html">mZik</a></h1>
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
 
				if ($ch== 0) echo $row['firstname'] . " " . $row['surname'];		?>
				
				
				
				</span></a></li>
			<li class="m3"><a href="logout.php">		
			<span>Logout</span></a></li>
		
<br><br>
	
            
         
         </ul>
      </nav>
   </div></center>
</header>

<center>




<div class="container">


<br><br>
<form action="search.php" method="post" id="search">
  <input name="q" type="text" size="400" placeholder="Search for Music" />
</form>	
<br><br>

<br>


<!--

<form action="layout.php" method="post"
enctype="multipart/form-data">
<label for="file"></label>
<input type="file" id="signin_submit" name="file" id="file" /> 
<br /><br />
<input type="submit" id="signin_submit" name="Submit" value="Upload" />
</form>
-->

<?php

/*
$str = htmlentities(trim($_POST["q"])) ;
echo $str;
$keywords = explode(" ", $str);

$k = count($keywords);

$i=0;
$j=0;
$query="select songs from songs_db";
$result=mysql_query($query);
$row=mysql_num_rows($result);//for number of rows
while($i <$k){
	
	while($row=mysql_fetch_array($result))
	{
		
		if(isset($keywords[$i]))
		{
		$keys = explode(" ", $row['songs']);
		$k2 = count($keys);
		$j = 0;
		while($j < $k2)
		if($keywords[$i] == $keys[$j] )
		{
			echo $row['songs'];
			echo "<br>";
			
		}
		$j++;
		}
	}

$i++; }


*/


$str = htmlentities(trim($_POST["q"])) ;
if($str == "")
{
echo "No search query found";
}
else{

$table="songs_db";

$arraySearch = explode(" ", $str);
  $arrayFields = array(0 => "songs" );
  $countSearch = count($arraySearch);
  $a = 0;
  $b = 0;
  $query = "SELECT * FROM ".$table." WHERE (";
  $countFields = count($arrayFields);
  while ($a < $countFields)
  {
    while ($b < $countSearch)
    {
      $query = $query."$arrayFields[$a] LIKE '%$arraySearch[$b]%'";
      $b++;
      if ($b < $countSearch)
      {
        $query = $query." AND ";
      }
    }
    $b = 0;
    $a++;
    if ($a < $countFields)
    {
      $query = $query.") OR (";
    }
  }
  $query = $query.")";
  $query_result = mysql_query($query);
  
  if(mysql_num_rows($query_result) < 1)
  {
    echo "<p id=sw>No matches found for ".$str."</p>";
  }
  
  
  else
  {
  
	echo "<table id=t2 cellspacing=25>";
    echo "<p id=sw>Search Results for ".$str."</p>";
	
	echo "<br>";
    while($row = mysql_fetch_assoc($query_result))
    {
	if($row["songs"])
	{	
      echo "<tr>";
	  echo "<td><b>".$row["songs"]."</b></td>"; 
		echo "<td>";
 ?>
	 <object type="application/x-shockwave-flash" data="player.swf" width="200" height="20">
     <param name="movie" value="player.swf" />
     <param name="FlashVars" value="mp3=<?php echo "upload/" . $row["songs"] ; ?>&bgcolor=000000&showvolume=1" />
</object>
<?php
	echo "</td><td>";
	echo "<a onclick=adds() class=addsong>Add to Collection</a>";
	?>
	<script>
	function adds()
	{
	
	var chk=1;
	
	<?php
	$gh = $_SESSION['username'] ; 
		 $filee = $row["songs"] ;
	mysql_query("INSERT INTO `".$gh."`(`songs`) VALUES(\"$filee\")") ; 
	  
	  
	
	
	
	?>	
	alert("<?php echo $row["songs"]?>");
	}
	
	</script>
	
	
	<?php
	
	
	echo "</td></tr>";
	
	   }
	  }
	  echo "</table>";
	  }
	  }

 ?>

</center>
   
</div></div>


</body>
</html>
