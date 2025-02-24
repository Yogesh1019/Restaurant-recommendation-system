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
 

		<div class="col-md-1">
 
 </div>
		
		<div class="col-md-10">
		
 
				
				<div class="row">
		    <div class="col-md-12">
			    <div class="breadcrumbs">
	
						<div class="row registerbox"><div class="form-group col-md-12">
						<form action="index.php" method="get">
						<input type="hidden" name="page" value="3">
							<label class="control-label col-md-1" for="inputEmail">Search:</label>
							<div class="col-md-8">
								<select class="form-control" name="Type"  id="Type">
								<option value="<?php if(isset($_GET['Type'])){ echo $_GET['Type']; } ?>"><?php if(isset($_GET['Type'])){ echo $_GET['Type']; } ?></option>
								<?php
								$select_table1 ="Select Cuisinetype from restaurant group by Cuisinetype order by Cuisinetype";
								$fetch1= mysql_query($select_table1);
								while($row1 = mysql_fetch_array($fetch1))
								{
									echo '<option value="'.$row1['Cuisinetype'].'">'.$row1['Cuisinetype'].'</option>';
								}
								?>
								
								</select>
							</div>						<div class="col-md-2">
								<input class="form-control" type="Submit" style="color:#fff;background-color: #D72D7B;   font-size:18px;" value="Search">
							</div>
						<br><br><hr>
		
							</form>
						</div></div>


				</div>
			</div>
			
			</div>
			
		

 


		<div class="row">

<?php
 

$select_table="";

if(isset($_GET["Type"]) and $_GET["Type"]!="")
{
$select_table.=" and Cuisinetype='".$_GET['Type']."'";
}

$select_table = "SELECT restaurant.*,Feedbacktype,COUNT( * ) as Feedbacktypecount,uratingval FROM restaurant,ufeedback,(SELECT *,sum(urating.val) as uratingval from urating group by pid) as uratingshow WHERE restaurant.Rid = ufeedback.pid and restaurant.Rid = uratingshow.pid and (Feedbacktype='positive' or Feedbacktype='neutral')".$select_table;

$select_table = $select_table." GROUP BY `Feedbacktype` order by Feedbacktypecount,uratingval desc";


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


	   </div>
	 </div>	