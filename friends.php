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
<header>
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
				echo $row['firstname'] . " " . $row['surname'];
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
		
<br><br>
	
            
         
         </ul>
      </nav>
   </div>
</header>

<center>







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


$str = htmlentities(trim($_POST["frnd"])) ;
$table="mzik";

$arraySearch = explode(" ", $str);
  $arrayFields = array(0 => "firstname");
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
  
  if (!$query_result) {
    die('Invalid query: ' . mysql_error());
}
  
  if(mysql_num_rows($query_result) < 1)
  {
    echo "<p>No matches found for ".$str."</p>";
  }
  
  
  else
  {
  
	echo "<table>";
    echo "<font face=Impact>Search Results for ".$str.":</font><br><br>";
	echo "<br>";
	
    while($row = mysql_fetch_assoc($query_result))
    {
	if($row["email-id"])
	{	
		echo "<tr>";
		
	  echo "<td>".$row["email-id"]."</td>"; 
	  echo "<td>";		
	 echo "</td>";
	 echo "</tr>";
	   }
	  }
	  echo "</table>";
	  }

 ?>

</center>

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
 
</div>


</body>
</html>
