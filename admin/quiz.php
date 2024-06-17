<?php
//This file is used to show existing quiz test question
//session started
session_start();
error_reporting(1);
//database connection imported
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
//Checkig if subject and test id is set, if not then we are setting the session
if(isset($subid) && isset($testid))
{
$_SESSION['sid']=$subid;
$_SESSION['tid']=$testid;
header("location:quiz.php");
}
if(!isset($_SESSION['sid']) || !isset($_SESSION['tid']))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");

//Dtabase query to get the all question of selected test
$rs=mysqli_query($cn,"select * from mst_question where test_id=$tid") or die(mysqli_error());


echo "<h2 class=head1> Quiz Test Question </h2>";
echo "<table align=center>";
//Iterate the rrre  set and showing it to user
while ($row = mysqli_fetch_row($rs)) {
    echo "<tR><td><span class=style2>Que ".  $n .": $row[2]</style>";
    echo "<tr><td class=style8>1. $row[3]";
    echo "<tr><td class=style8> 2. $row[4]";
    echo "<tr><td class=style8>3. $row[5]";
    echo "<tr><td class=style8>4. $row[6]";
    echo "<tr><td class=tans>Ans: $row[7]";
}
echo "</table>";
?>
</body>
</html>