<?php
//Database connection file for admin portal, will include this file in all php program, so that we can use this $cn variable to call any query
$cn = new mysqli("localhost", "vinod", "qwerty", "db_quiz", "3306") or die("Could not Connect My Sql");
mysqli_select_db($cn, "db_quiz")  or die("Could not connect to Database");
