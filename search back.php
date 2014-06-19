<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form name="form" action="search.php" method="get">
&nbsp;&nbsp;
<select name="col" size="1">
<option>Search In</option>
<option value="1"<?php if(trim(@$_POST['col'])=="1"){echo " selected";}?>>1</option>
<option value="2"<?php if(trim(@$_POST['col'])=="2"){echo " selected";}?>>2</option>
<option value="3"<?php if(trim(@$_POST['col'])=="3"){echo " selected";}?>>3</option>
<option value="4"<?php if(trim(@$_POST['col'])=="4"){echo " selected";}?>>4</option>
<option value="5"<?php if(trim(@$_POST['col'])=="5"){echo " selected";}?>>5</option>
<option value="6"<?php if(trim(@$_POST['col'])=="6"){echo " selected";}?>>6</option>
<option value="7"<?php if(trim(@$_POST['col'])=="7"){echo " selected";}?>>7</option>
<option value="8"<?php if(trim(@$_POST['col'])=="8"){echo " selected";}?>>8</option>
<option value="9"<?php if(trim(@$_POST['col'])=="9"){echo " selected";}?>>9</option>

</select>
<select name="sort" size="1">
<option>Sort By</option>
<option value="1"<?php if(trim(@$_POST['sort'])=="1"){echo " selected";}?>>1</option>
<option value="2"<?php if(trim(@$_POST['sort'])=="2"){echo " selected";}?>>2</option>
<option value="3"<?php if(trim(@$_POST['sort'])=="3"){echo " selected";}?>>3</option>
<option value="4"<?php if(trim(@$_POST['sort'])=="4"){echo " selected";}?>>4</option>
<option value="5"<?php if(trim(@$_POST['sort'])=="5"){echo " selected";}?>>5</option>
<option value="6"<?php if(trim(@$_POST['sort'])=="6"){echo " selected";}?>>6</option>
<option value="7"<?php if(trim(@$_POST['sort'])=="7"){echo " selected";}?>>7</option>
<option value="8"<?php if(trim(@$_POST['sort'])=="8"){echo " selected";}?>>8</option>
<option value="9"<?php if(trim(@$_POST['sort'])=="9"){echo " selected";}?>>9</option>

</select>
<input name="q" type="text" value="<?php echo trim(@$_POST['q']) ?>" />
<input name="Submit" type="submit" value="Update" /></form><br>
<?php
//MySQL options
$user = "root"; //your MySql username
$pass = ""; //
$host = "localhost"; //your host

//Database options
$database = "wdc"; // the database to search
$table = "songs_db"; // the table to search
$col = "name"; //column to search. leave blank if you want your users to defint it themselves.
$col_two = "genre";//second column to display, it displays the cell in this colunm on the same row
$sorted= "";//what to sort by. leave blank for user selection.
$limit=10; // how many at max to display on one page

/*
ALSO!!!
there is one more spot you need to update down further, you need to match it to your MySQL table
*/
?>
<?php


if($col == ""){
$col = trim(@$_POST['col']); //trim whitespace from the stored
}else{}

if($sorted == ""){
$sorted = trim(@$_POST['sort']); //trim whitespace from the stored
}else{}

// Get the search variable from URL
$var = @$_POST['q'];
$trimmed = trim($var); //trim whitespace from the stored variable

$s = trim(@$_POST['s']);
// rows to return


// check for an empty string and display a message.
if ($trimmed == "")
{
echo "<p>Please enter a search...</p>";
exit;
}

// check for a search parameter
if (!isset($var))
{
echo "<p>We dont seem to have a search parameter!</p>";
exit;
}
mysql_connect($host,$user,$pass);
mysql_select_db($database) or die("Unable to select database"); //select which database we're using


$query = "select * from $table where $col like \"%$trimmed%\" order by $sorted";



$numresults=mysql_query($query) or die($myQuery."<br/><br/>".mysql_error());
$numrows=mysql_num_rows($numresults);

// If we have no results, offer a google search as an alternative
echo "<title>search results for \"".$trimmed."\" in ".$col."</title>";
if ($numrows == 0)
{

echo "<h4>Results</h4>";
echo "<p>Sorry, your search: \"" . $trimmed . "\" returned no results</p>";
}

// next determine if s has been passed to script, if not use 0
if (empty($s)) {
$s=0;
}

// get results
$query .= " limit $s,$limit";
$result = mysql_query($query) or die("Couldn't execute query");

// display what the person searched for
echo "<p>You searched for: \"" . $var . "\"</p>";

// begin to show results set
echo "Results:<br>";
$count = 1 + $s ;
/* This its the header, be sure you update this to match your columns in your MySQL table */
echo "<table border=\"1\">";
echo "<tr>
<td>no.</td>
<td>1</td>
<td>2</td>
<td>3</td>
<td>4</td>
<td>5</td>
<td>6</td>
<td>7</td>
<td>8</td>
<td>9</td>
</tr>\n" ;
/* Be sure you update this to match your columns in your MySQL table */
while ($row= mysql_fetch_array($result)) {
$col_1 = $row['1'];
$col_2 = $row['2'];
$col_3 = $row['3'];
$col_4 = $row['4'];
$col_5 = $row['5'];
$col_6 = $row['6'];
$col_7 = $row['7'];
$col_8 = $row['8'];
$col_9 = $row['9'];


echo "<tr>";
echo "<td> $count.</td>";
echo "<td> $col_1 </td>";
echo "<td> $col_2 </td>";
echo "<td> $col_3 </td>";
echo "<td> $col_4 </td>";
echo "<td> $col_5 </td>";
echo "<td> $col_6 </td>";
echo "<td> $col_7 </td>";
echo "<td> $col_8 </td>";
echo "<td> $col_9 </td>";
/* End edit */
echo "</tr>\n";
$count++ ;
}
echo "</table>";
$currPage = (($s/$limit) + 1);

//break before paging
echo "<br>";

// next we need to do the links to other results
if ($s>=1) { // bypass PREV link if s is 0
$prevs=($s-$limit);
print " <a href=\"".$_SERVER["PHP_SELF"]."?s=".$prevs. "&q=" .$var. "&col=" .$col."&sort=" .$sorted."\">&lt;&lt; Prev ".$limit."</a> ";
}

// calculate number of pages needing links
$pages=intval($numrows/$limit);

// $pages now contains int of pages needed unless there is a remainder from division

if ($numrows%$limit) {
// has remainder so add one page
$pages++;
}

// check to see if last page
if (! ((($s+$limit)/$limit)==$pages) && $pages!=1) {

// not last page so give NEXT link
$news=$s+$limit;
echo "<a href='" .$_SERVER["PHP_SELF"]. "?s=" .$news. "&q=" .$var. "&col=" .$col."&sort=" .$sorted."'>Next ".$limit." &gt;&gt;</a>";

}

$a = $s + ($limit) ;
if ($a > $numrows) { $a = $numrows ; }
$b = $s + 1 ;
echo "<p>Showing results $b to $a of $numrows</p>";

?>

</body>
</html>