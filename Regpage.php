<?php

include("db.php");


$a= $_POST["FullNam"];
$b= $_POST["Emailid"];
$c= $_POST["MobNo"];
$d= $_POST["Pass"];
$e= $_POST["Cpass"];
$f= $_POST["Gender"];
$g= $_POST["Usernm"];

$mess="";
$mess.=Fullnamevalid($a,"Enter Full Name");
//$mess.=nullvalid($b,"Plz Enter Email");
$mess.=EmailValid($b,"Plz Enter Email");
$mess.=DatbaseValid($b,"Email All Ready Register");
$mess.=Passvalid($d,"Plz Enter Password",8);
$mess.=EqualValid($d,$e,"Password Conformation Fail");
$mess.=DatbaseValid1($g,"User Name All Ready Register");

$ee= $_POST['Address'];


	//++++++++Full Name Only+++++++++++++++
	function Fullnamevalid($names,$nametital)
	{
         if(!preg_match('/^[_a-z]+( [_a-z]+)$/i',$names))
         {
         return $nametital.",";
         }
	}

	//++++++++Email Valid+++++++++++++++
	function EmailValid($names,$nametital)
	{
		if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $names))
		{
			 return $nametital.",";
		}
	}

		//++++++++Not Empty+++++++++++++++
	function nullvalid($names,$nametital)
	{
		if($names=="")
		{
         return $nametital.",";
		}	
	}

//++++++++Data Base Valid+++++++++++++++
	function DatbaseValid($valuechk,$nametital)
	{
	$select_table = "select * from  reguser where UEmail='".$valuechk."'";
	$fetch= mysql_query($select_table);
	if(mysql_num_rows($fetch)>=1)
		{
		 return $nametital.",";
		}
	}

//++++++++Data Base Valid+++++++++++++++
	function DatbaseValid1($valuechk,$nametital)
	{
	$select_table = "select * from  reguser where username='".$valuechk."'";
	$fetch= mysql_query($select_table);
	if(mysql_num_rows($fetch)>=1)
		{
		 return $nametital.",";
		}
	}

	function Passvalid($names,$nametital,$length)
	{
		$x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length),";
		}
	}

//++++++++Equal Valid+++++++++++++++
	function EqualValid($names1,$names2,$nametital)
	{
		if($names1!=$names2 || $names1=="")
		{
			 return $nametital.",";
		}
	}

if($mess=="")
{
mysql_query("INSERT INTO reguser(UName,UEmail,UMob,Ugender,UPass,Address) VALUES ('$a','$b','$c','$f','$d','$ee')");

echo "<script> alert('Thank For Registration.!'); location.href=\"index.php?page=5\";</script>";
}
else
{
echo "<font color='#FF0000' >Registration Fail:".$mess."</font>";
}

?>
