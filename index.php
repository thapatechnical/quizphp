<?php
//Session started
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <title>Wel come to Online Exam</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php
  //header included
  include("header.php");
  //Database connection included
  include("database.php");
  extract($_POST);
  //When user enter username and password and click on submit button then below code will be executed
  if (isset($submit)) {
    //    Check of user details are present in database or not
    $rs = mysqli_query($cn, "select * from mst_user where login='$loginid' and pass='$pass'");
    if (mysqli_num_rows($rs) < 1) {
      $found = "N";
    } else {
      //        Set session if user details are valid
      $_SESSION['login'] = $loginid;
    }
    //    If user is already login then we are showing welcome page
  }
  if (isset($_SESSION['login'])) {
    echo "<h1 class='style8' align=center>Wel come to Online Exam</h1>";
    echo '<table width="28%"  border="0" align="center">
  <tr>
    <td width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
    <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4">Subject for Quiz </a></td>
  </tr>
  
</table>';

    exit;
  }


  ?>
  <table width="100%" border="0">
    <tr>
      <td width="70%" height="25">&nbsp;</td>
      <td width="1%" rowspan="2" bgcolor="#CC3300"><span class="style6"></span></td>
      <td width="29%" bgcolor="#CC3333">
        <div align="center" class="style1">User Login </div>
      </td>
    </tr>
    <tr>
      <td height="296" valign="top">
        <div align="center">
          <h1 class="style8">Welcome to Online Quiz</h1>
          <span class="style5"><img src="image/quiz.webp" width="129" height="100"><span class="style7"><img src="image/HLPBUTT2.JPG" width="50" height="50"><img src="image/BOOKPG.JPG" width="43" height="43"></span> </span>
          <param name="movie" value="english theams two brothers.dat">
          <param name="quality" value="high">
          <param name="movie" value="Drag to a file to choose it.">
          <param name="quality" value="high">
          <param name="BGCOLOR" value="#FFFFFF">
          <p align="left" class="style5">&nbsp;</p>
          <blockquote>
            <p align="left" class="style5"><span class="">Welcome to Online
                exam. This Site will provide the quiz for various subject of interest.
                You need to login for the take the online exam.</span></p>
          </blockquote>
        </div>
      </td>
      <!--      Following form for user to enter username and password-->
      <td valign="top">
        <form name="form1" method="post" action="">
          <table width="200" border="0">
            <tr>
              <td><span class="style2">Login ID </span></td>
              <td><input name="loginid" type="text" id="loginid2"></td>
            </tr>
            <tr>
              <td><span class="style2">Password</span></td>
              <td><input name="pass" type="password" id="pass2"></td>
            </tr>
            <tr>
              <td colspan="2"><span class="errors">
                  <?php
                  if (isset($found)) {
                    echo "Invalid Username or Password";
                  }
                  ?>
                </span></td>
            </tr>
            <tr>
              <td colspan=2 align=center class="errors">
                <input name="submit" type="submit" id="submit" value="Login" class="button-1">
              </td>
            </tr>
            <tr>
              <!--            Signup page is called from here-->
              <td colspan="2">
                <div align=" center"><span class="style4">New User? <a href="signup.php">Signup Free</a></span></div>
              </td>
            </tr>
          </table>
          <div align="center">
            <p class="style5"><img src="image/quiz2.jpg" width="80%" height="128"> </p>
          </div>
        </form>
      </td>
    </tr>
  </table>

</body>

</html>