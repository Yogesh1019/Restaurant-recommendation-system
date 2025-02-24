<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$d= $_GET["email"];
$e= $_GET["pass"];

$result=mysql_query("select * From reguser where UEmail='$d' and UPass ='$e'");

while($row=mysql_fetch_array($result))
	{	
			$_SESSION['userid'] = $row['UID'];
			$_SESSION['username']= $row['UName'];
	}
		

if($_SESSION['userid']!="" and $_SESSION['username']!="")
	{
	    echo "Saved#".$_SESSION['userid'];
	}
	else
	{
	    echo "Fail";
	}

?>
