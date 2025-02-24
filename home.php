		<div class="row" style="background: #fff;">
		    <div class="col-md-12" style="background: #fff;">
			    <div class="breadcrumbs">
				    <ul class="breadcrumb" style="background: #fff;">
                        <li><a href="index.php">Home</a> <span class="divider"></span></li>
                        <li class="active">Restaurants Search</li>
                    </ul>
					
				</div>
			</div><hr>
		</div>

<div class="row"	>
<br>
</div>
		<div class="row">
		    <div class="col-md-3 left-menu">
				<div class="">
					<h2>Cuisine Type</h2>
					<input type="hidden" value="<?php if(isset($_GET["Type"])){ echo $_GET["Type"]; } ?>" id="Type">
					<ul>
<li><a href="index.php">All</a></li>
<?php

$select_table1 ="Select Cuisinetype from restaurant group by Cuisinetype order by Cuisinetype";
$fetch1= mysql_query($select_table1);
while($row1 = mysql_fetch_array($fetch1))
{
	echo '<li><a href="index.php?Type='.$row1['Cuisinetype'].'">'.$row1['Cuisinetype'].'</a></li>';
}
?>
					</ul>




<input type="hidden" value="<?php echo $ipcall; ?>" id="Ipcall">

<script type="text/javascript">
function autosearch(str)
{
var textcontent1 = $("#Brand").val();
var textcontent2 = $("#Type").val();
var textcontent5 = $("#key").val();
var textcontent6 = $("#Ipcall").val();
var info='http://'+textcontent6+'/restaurants/index.php?'+'Brand='+textcontent1+'&Type='+textcontent2+'&key='+textcontent5;

location.href=info;

}
</script>

				</div>


<?php
$select_table = "select * from restaurant order by RAND() limit 0,5";
$fetch= mysql_query($select_table);
$count = mysql_num_rows($fetch);
while($row = mysql_fetch_array($fetch))
{
if($row!=Null)
{
?>

		    <div>
			    <div class="product" id="myproduct" >
				    <a href="index.php?page=2&Rid=<?php echo $row['Rid']; ?>"><img alt="dress5" src="<?php if($row['Restaurantpic']!=""){ echo "Admin/upload/".$row['Restaurantpic']; }else { echo "logo.png"; } ?>" style="height:150px;"></a>

				</div>
			</div>

<?php
}
}
?>


			</div>
		
		<div class="col-md-9">
		
				<div class="row">
		    <div class="col-md-12">
			    <div class="breadcrumbs">
	
						<div class="row registerbox"><div class="form-group col-md-12">
						<form action="index.php" method="get">
							<label class="control-label col-md-1" for="inputEmail">Search:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="key" placeholder="What Are You Looking For?" value="<?php if(isset($_GET['key'])){ echo $_GET['key']; } ?>" id="key">
							</div>						<div class="col-md-2">
								<input class="form-control" type="Submit" style="color:#fff;background-color: #D72D7B;   font-size:18px;" value="Search">
							</div>
						<br><br><hr>
		
							</form>
						</div></div>


				</div>
			</div></div>
			
		


<?php
if(!isset($_GET["Type"]) and !isset($_GET["key"]))
{
?>
						<div class="row">
		    <div class="col-md-12 slideshow">
			    <div>
			      
			    <div style="overflow: hidden; position: relative;" class="flex-viewport">
				<ul style="width: 1000%; transition-duration: 0.1s; transform: translate3d(-1880px, 0px, 0px);" class="slides"><li style="width: 940px; float: left; display: block;" class="clone">
					<a href="">
					<img src="images/sub.jpg" alt="Banner">
					</a>
				</li>
				<li style="width: 940px; float: left; display: block;" class="">
					<a href="">
						<img src="images/sub1.jpg" alt="Banner 1">
					</a>
				</li>
				<li class="flex-active-slide" style="width: 940px; float: left; display: block;">
					<a href="">
					<img src="images/sub2.jpg" alt="Banner2">
					</a>
				</li>
				<li style="width: 940px; float: left; display: block;">
					<a href="">
					<img src="images/sub1.jpg" alt="Banner">
					</a>
				</li>
			       <li style="width: 940px; float: left; display: block;" class="clone">
					<a href="">
						<img src="images/sub.jpg" alt="Banner 1">
					</a>
				</li></ul></div>

				</div>
			</div>
		</div>
<?php
}
?>


		<div class="row">

<?php
$key="";
if(isset($_GET["key"]))
{
$key=$_GET["key"];
}

$select_table="";

if(isset($_GET["Type"]) and $_GET["Type"]!="")
{
$select_table.=" and Cuisinetype='".$_GET['Type']."'";
}

$select_table = "select * from restaurant where concat(Cuisinetype,' ',Restaurantname) like '%$key%'".$select_table;

$per_page = 20; 
$variable = mysql_query($select_table);
$count = mysql_num_rows($variable);
$pages = ceil($count/$per_page);
$page=1;
if(isset($_GET['p']))
{
$page=$_GET['p'];
}
$start = ($page-1)*$per_page;


$select_table = $select_table." order by Rid desc limit $start,$per_page";


$fetch= mysql_query($select_table);

$count = mysql_num_rows($fetch);
if($count<=0)
{ 
	echo "Not Found Any Restaurant result As Per Search Query";
}

while($row = mysql_fetch_array($fetch))
{
if($row!=Null)
{
?>

		    <div class="col-md-3">
			    <div class="product" id="myproduct" style="height:350px;">
				    <a href="index.php?page=2&Rid=<?php echo $row['Rid']; ?>"><img alt="dress5" src="<?php if($row['Restaurantpic']!=""){ echo "Admin/upload/".$row['Restaurantpic']; }else { echo "logo.png"; } ?>" style="height:150px;"></a>
					<hr>
					<div class="name">
				    <a href="index.php?page=2&Rid=<?php echo $row['Rid']; ?>"><?php echo $row['Restaurantname']; ?>(<?php echo $row['Cuisinetype']; ?>)</a>
				    </div>
				    <div class="price">
				    <p>City - <?php echo $row['City']; ?>&nbsp;&nbsp;</p>
					 
				    </div>
				</div>
			</div>

<?php
}
}

?>
		
		</div>
	

		


<hr>


<div class="clear1"></div>

		<div class="row">
			<div class="col-md-12">
				<ul class="pagination pull-right">
			<?php
			$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$URI="index.php?".$url_array[1];

				echo "<li><a href='$URI&p=1'> <u>[&nbsp;<span>First</span>&nbsp;<small>&gt;&gt;</small>&nbsp;]</u></a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='$URI&p=".$i."' value=".$i." name='submit' class='pages' id=".$i."> ".$i."</a></li>";
				}	

				echo "<li><a href='$URI&p=".--$i."'> <u>[&nbsp;<span>Last</span>&nbsp;<small>&gt;&gt;</small>&nbsp;]</u></a></li>";
				?>

				</ul>
				<?php 
echo "Displaying ".($start+1)." To ".($start+20)." of ".$count; 
echo " | Current Page- $page";
echo " | Total Pages- $pages";
?>
			</div>
		</div>




	   </div>
	 </div>	</div>	
