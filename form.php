<?php



$email=htmlentities(trim($_POST['e-mail']));
$pass1=htmlentities(trim($_POST['pass1']));
$pass2=htmlentities(trim($_POST['pass2']));
$dd=htmlentities(trim($_POST['dd']));
$m=$_POST['mm'];
$gender=$_POST['gen'];
$yy=htmlentities(($_POST['yy']));
$name1=htmlentities(trim($_POST['name1']));
$name2=htmlentities(trim($_POST['name2']));
$contact=htmlentities(trim($_POST['contact']));
$address=htmlentities(trim($_POST['address']));






$b=0;
$arr=array(1,1,1,1,1,1,1,1,1);
if($email==NULL || !(strstr($email, '@')))
$arr[0]=0;
if($pass1==null ||(strlen($pass1)<6))
$arr[2]=0;
if($pass1!=$pass2)
$arr[3]=0;
if( !is_numeric ($dd)|| $dd<1 || $dd>31 )
$arr[4]=0;
if(!is_numeric ($yy) || $yy<1900 || $yy>2012)
$arr[6]=0;
if(!isset($_POST['ch1']))
$arr[7]=0;
if($contact!=null && ((strlen($contact)>12) || (strlen($contact)<8) || !(is_numeric($contact))))
$arr[8]=0;
for($i=0;$i<=8;$i++)
{
if($arr[$i]==0)
$b=1;
}




if($b==1)
{ 
$b=0;
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
<link rel="stylesheet" href="css/style2.css" type="text/css" media="all">
<link rel="stylesheet" href="css/login.css" type="text/css" media="all">
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
  
  
  
  
  
  
<script type='text/javascript'>


function formValidator(){
	var email = document.getElementById('email');
	
	if(emailValidator(email, "Please enter a valid email address")){
							return true;
						}
						
						return false;
	}
	
	function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
</script>




</head>
<body>
<div class="wrap">
   <!-- header -->
   <header>
   <div class="container">
         <h1><a href="index.html><img src="../images/logo.png"/></a></h1>
      <nav>
         <ul>
            <li class="m1"><a href="index.html" ><span>mZik</span></a></li>
            <li class="m2"><a onclick="alert('Please login or Register')"><span>PROFILE</span></a></li>
			<li class="m3"><a href="register.html" class="active"><span>Register</span></a></li>
			<li class="m3"><a onmouseover="c();"><span>Login</span></a>
		
		
		<div id="f" onmouseover="c();" onmouseout="c1();" >
			<form action="logcheck.php" method="post" id="signin">
				<input type="text" id="username" size="10" name="username" placeholder="E-Mail id"/>
				<input type="password" id="password" size="10" name="password" placeholder="Password" />
				<input type="submit" id="signin_submit" name="Submit" value="Login" /></a>
			</form>
</div>
</li>
			
            
         </ul>
      </nav>
   </div>
   </header>
<div id="reg"> 
<form action="form.php" method="post">

<center>
<img src="logo.png"/></br></br></br></br>
   
		
<legend><h4><strong><font face="Copperplate Gothic">MANDATORY INFORMATION</font></strong></h4></legend></br>
			<table border="0" width="42.5%" id="t2">


<tr>
<td>E-mail id<br><br></td>
<td><input type="text" name="e-mail" placeholder="e-mail "></input></td><td>
<?php ?><font color="red"><?php if($arr[0]==0) echo "Invalid email";
$arr[0]=1;
 ?></td>

</tr>
<tr></tr>


<tr>
<td>Choose Password<br><br></td>
<td> <input type="password" name="pass1"   >&nbsp;(Minimum 6 characters)</td>
<td><?php ?><font color="red"><?php if($arr[2]==0) echo "Invalid password";
$arr[2]=1; ?></td> 
</tr>
<tr>
<td>Verify Password<br><br></td>
<td> <input type="password" name="pass2"></td><td>
<?php ?><font color="red"><?php if($arr[3]==0) echo "Wrong"; $arr[3]=0; $arr[3]=1; ?> </td>
</tr>
<tr>
<td>Date of Birth<br><br></td>
<td><input type="text" name="dd" placeholder="DD" size="2">
<?php ?><font color="red"><?php if($arr[4]==0) echo "Invalid day"; 
$arr[4]=1;
?>
&nbsp;<select name="mm">
<option value="jan">January</option>
<option value="feb">February</option>
<option value="mar">March</option>
<option value="apr">April</option>
<option value="may">May</option>
<option value="jun">June</option>
<option value="jul">July</option>
<option value="aug">August</option>
<option value="sep">September</option>
<option value="oct">October</option>
<option value="nov">November</option>
<option value="dec">December</option></select>&nbsp;
<input type="text" name="yy" placeholder="YY" size="4"><font color="red"><?php if($arr[6]==0) echo "Invalid year"; 
$arr[6]=1;
?></td> 
</tr>
</table>

</br>


<legend><h4></b><font face="Copperplate Gothic">ADDITIONAL INFORMATION</font></b></h4></legend></br>
<table border="0" id="t1">


<tr>
<td>Full Name<br><br></td>
<td><input type="text" name="name1" placeholder="First Name"></input>
<input type="text" name="name2" placeholder="Last Name"></input></td>

</tr>
<tr>
<td >Gender<br><br></td>
<td>  <select name="gen"><option value="male">Male</option><option value="female">Female</option></select></td> 
</tr>


			<tr><td>Contact No.<br><br></td><td>
<input type="text" name="contact" size="10"></td><td><?php ?><font color="red"><?php if($arr[8]==0) echo "Invalid Contact No."; $arrr[8]=1; ?> </td></tr>


<tr>
<td> Address <br><br></td>
<td colspan="3"> <textarea name="address" rows=4 cols=50 placeholder="Permanent Residential Address"></textarea></td></tr>
<tr>

</tr>
</table>


<br>


<a href="copyrights.html">Terms and Conditions</a><br>
<input type="checkbox" name="ch1" value="q"/>I accept the terms and conditions of mZik<font color="red"><?php if($arr[7]==0) echo "   Check the box"; $arr[7]=1;?><br><br>

<input type="submit" id="signin_submit" value="Create Account" >

</form> 

 </div>
 <br><br><br>
</body>
</center>
</html>
 <?php
 }
 else
 {
	 $con=mysql_connect("localhost","root","");
	 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
	 mysql_select_db("wdc",$con);
	mysql_query("INSERT INTO mzik(`email-id` , `pass` , date , `month` , year , `firstname` , `surname` , contact , `gender` , `address`) VALUES (\"$email\", \"$pass1\", $dd, \"$m\",$yy, \"$name1\", \"$name2\", $contact, \"$gender\", \"$address\")");
	

	
	mysql_query("CREATE TABLE `".$email."` ( songs VARCHAR(150), PRIMARY KEY(songs),friends VARCHAR(100))",$con);
	
	
  mysql_close($con);
	 header("Location:success.php");
 }
 ?>