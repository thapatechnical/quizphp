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

echo "<table width=100%>";
echo "<tr><td align=center></table>";
//when user hit submit button then below code will be executed
?>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left;padding:20px;">
    <title>Student Master</title>
    <?php
    echo "<h2 class='head1'> Student Master </h2>";

    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $rs = mysqli_query($cn, "SELECT * FROM mst_user");
    if ($rs) {
        echo "<table align='center' border='1' cellpadding='10' cellspacing='0' style='border-collapse:collapse;width:100%;'>";
        echo "<tr style='background-color:#f2f2f2;'>
                <th>Username</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Email</th>
              </tr>";
        while ($row = mysqli_fetch_row($rs)) {
            echo "<tr>";
            echo "<td align='center'><font size='4'>$row[1]</font></td>";
            echo "<td align='center'><font size='4'>$row[3]</font></td>";
            echo "<td align='center'><font size='4'>$row[4]</font></td>";
            echo "<td align='center'><font size='4'>$row[5]</font></td>";
            echo "<td align='center'><font size='4'>$row[7]</font></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($cn);
    }

    mysqli_close($cn);
    ?>
    <p>&nbsp; </p>
</div>
