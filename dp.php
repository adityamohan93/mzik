	
	
	<?php

/* Profile Pic */



 	

$allowedExts = array("jpg", "jpeg", "png", "bmp", "gif");


$arr = explode(".", $_FILES["file"]["name"]);


$extension = end($arr);

if ((($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/gif")
)
&& ($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],"photos/" . $_FILES["file"]["name"]);
	
	
	/* mysql_query("INSERT INTO ".$gh."(`songs`) VALUES('\\" . $_FILES['file']['name'] . "\\')") ; 
	
	  */
	  
	 
	  $filee = $_FILES['file']['name'] ;
	  
	  
	   echo $filee;
	mysql_query("INSERT INTO mzik(`photos`) VALUES(\"$filee\")") ; 
	  
	  echo "</br></br>";
	 
      }
    }
  
else
  {
  echo "Invalid file";
  }
  
  
/* DP ends*/

?>