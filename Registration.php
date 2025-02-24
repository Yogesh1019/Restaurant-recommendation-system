<?php

include("db.php");


$a= $_GET["FullNam"];
$b= $_GET["Emailid"];
$c= $_GET["MobNo"];
$d= $_GET["pass"];
$g= $_GET["Usernm"];

$mess="";
//$mess.=nullvalid($b,"Plz Enter Email");
$mess.=EmailValid($b,"Plz Enter Email");
$mess.=DatbaseValid($b,"Email All Ready Register");
$mess.=Passvalid($d,"Plz Enter Password",6);
$mess.=DatbaseValid1($g,"User Name All Ready Register");




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
	$select_table = "select * from reguser where username='".$valuechk."'";
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
mysql_query("INSERT INTO reguser(UName,UEmail,UMob,UPass,username) VALUES ('$a','$b','$c','$d','$g')");
echo "Saved";
}
else
{
echo $mess;
}

?>
