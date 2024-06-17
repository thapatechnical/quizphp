<?php
//This program is used to add the subject
//sesion started
session_start();
//database connection
require("../database.php");
//Header file included
include("header.php");
error_reporting(1);
?>
<!--custom css included-->
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

echo "<BR>";
//check if user is login or not, if not login then we are showing warnig to user
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Subject Add </h3>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
//when user hit submit button then below code will be executed
if($submit=='submit' || strlen($subname)>0 )
{
//    Below query is to check if subject is already in database or not, if found then in if statement we are showing warning
$rs=mysqli_query($cn,"select * from mst_subject where sub_name='$subname'");
//
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Subject is Already Exists</div>";
	exit;
}
//if subject s not in database then following insert query will be executed and subject name is added to database
mysqli_query($cn,"insert into mst_subject(sub_name) values ('$subname')") or die(mysqli_error());
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
//    Following functon is used to validate the form if user not entered subject name then we are showing warning
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<title>Add Subject</title>
<form name="form1" method="post" onSubmit="return check();">
  <table width="41%"  border="0" align="center">
    <tr>
      <td width="45%" height="32"><div align="center"><strong>Enter Subject Name </strong></div></td>
      <td width="2%" height="5">  
      <td width="53%" height="32">
<!--            Input field fo subject name-->
        <input name="subname" placeholder="enter language name" type="text" id="subname">
    <tr>
        <td height="26"> </td>
        <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
    <?php
    echo "<h2 class=head1> Existing Subject </h2>";
//    Below code is to show existing subject
    $rs=mysqli_query($cn,"select * from mst_subject");
    echo "<table align=center>";
        while($row=mysqli_fetch_row($rs))
        {
        echo "<tr><td align=center ><a href=showtest.php?subid=$row[0]><font size=4>$row[1]</font></a>";
                }
                echo "</table>";
    ?>

</form>
<p>&nbsp; </p>
</div>
