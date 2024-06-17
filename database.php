<?php
//Database connection file foe student portal
$cn = new mysqli("localhost", "vinod", "qwerty", "db_quiz", "3306") or die("Could not Connect My Sql");
mysqli_select_db($cn, "db_quiz")  or die("Could not connect to Database");
