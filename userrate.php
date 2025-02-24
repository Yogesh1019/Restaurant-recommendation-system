<?php
session_start();
include("db.php");

if(isset($_POST["Rating"]))
{
$id=$_SESSION['userid'];
$a= $_POST["Rating"];
$c= $_POST["val"];

mysql_query("insert into urating(pid,uid,val) VALUES('$a','$id','$c')");
echo "Thanks For Rating.!";
}

if(isset($_POST["Feedback"]))
{
$id=$_SESSION['userid'];
$a=$_POST["Feedback"];
$c=mysql_real_escape_string($_POST["Feedbackinfo"]);

mysql_query("insert into ufeedback(pid,uid,feedback,feedbackdatetime) VALUES('$a','$id','$c',now())");
echo "Thanks For Feedback.!";
}

?>
