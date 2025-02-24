
		    <ul class="breadcrumb prod">
			    <li><a href="index.php">Home</a> <span class="divider"></span></li>
				<li class="active">Restaurant</li>
		    </ul>
<?php

$select_table="";
if(isset($_GET["Rid"]))
{
$select_table = "select * from restaurant where Rid=".$_GET["Rid"];
}


$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
if($row!=Null)
{
?>
		<div class="row product-info">
		    <div class="col-md-6">
					
				<div class="image"><div id="wrap" style="top:0px;z-index:0;position:relative;">
				<img style="display: block;" src="<?php if($row['Restaurantpic']!=""){ echo "Admin/upload/".$row['Restaurantpic']; }else { echo "logo.png"; } ?>" title="Nano" alt="Nano" id="image" ></div></div>

  			</div>
		    <div class="col-md-6">
				<h1><?php echo $row['Restaurantname']; ?></h1>
				    <div class="line"></div>
						<ul>

							<li><span>Restaurant Name : </span><?php echo $row['Restaurantname']; ?></li>
							<li><span>Cuisine Type : </span><?php echo $row['Cuisinetype']; ?></li>
						</ul>
					<div class="price">
						City : &nbsp;<strong><?php echo $row['City']; ?></strong>
					</div>
					<div class="price">
						Address : &nbsp;<strong><?php echo $row['Address']; ?></strong>
					</div>


					<div class="line"></div>

					<div class="tabs">
					<ul class="nav nav-tabs" id="myTab">
						<li class=""><a href="#home">Speciality</a></li>
						<li class=""><a href="#profile">Other info</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane" id="home"><?php echo $row['Restaurantspeciality']; ?></div>
						<div class="tab-pane" id="profile"><?php echo $row['otherinfo']; ?>	</div>
					</div>
					</div>

					<?php if(isset($_SESSION['userid']) and isset($_SESSION['username']))
					{
					?> 


<script type="text/javascript" src="data/jquery.min.js" ></script>
<script type="text/javascript" src="data/jquery.form.js"></script>
			
	<div class="content-box nomb">		
			<form action="userrate.php" method="post" id="Rating_Form">
			<input type="hidden" name="Rating" value="<?php echo $_GET["Rid"]; ?>">
				<dl>
					<dt>Rating:</dt>
					<br>
					<b>User Rating</b>
					<dd><Select name="val" class="input-text" >
					<Option value="1">1</Option>
					<Option value="2">2</Option>
					<Option value="3">3</Option>
					<Option value="4">4</Option>
					<Option value="5">5</Option>
					<Select>
					</dd>
				</dl>		
				<fieldset id="preview"></fieldset>

				<p class="nomb t-center"><input type="Button" value="POST Rating" id="submit_button" class="input-submit" /></p>
			</form>
					</div> <!-- /content-box -->		


				
				<script type="text/javascript" >
				$(function() {
				$("#submit_button").click(function() {
				$("#Rating_Form").ajaxForm({
						target: '#preview'
					}).submit();
				});
				}); 
				</script>
<br><br>



	<div class="content-box nomb">		
			<form action="userrate.php" method="post" id="Feedback_Form">
			<input type="hidden" name="Feedback" value="<?php echo $_GET["Rid"]; ?>">
				<dl>
					<dt>Feedback:</dt>
					<br>
					<b>Post Your Feedback</b>
					<dd>
					<textarea name="Feedbackinfo" class="input-text" ></textarea>
					</dd>
				</dl>		
				<fieldset id="Feedbackpreview"></fieldset>

				<p class="nomb t-center"><input type="Button" value="POST Feedback" id="Feedbacksubmit_button" class="input-submit" /></p>
			</form>
					</div> <!-- /content-box -->		
			
				<script type="text/javascript" >
				$(function() {
				$("#Feedbacksubmit_button").click(function() {
				$("#Feedback_Form").ajaxForm({
					
								success: function(responseText){
								
								$.ajax({
								type: "POST",
								url: "http://127.0.0.1:5555/success",
								data: '',
								cache: true,
								success: function(html){
									//alert(html);
									$("#Feedbackpreview").html(responseText);
								}  
								});
								
							}
							
 
					}).submit();
				});
				}); 
				</script>
				

				
<br><br>

								

					 <?php
					}
					else
					{
					?>
					<a href="index.php?page=5" class="btn btn-primary" type="submit" style="color:#fff;background-color: #000;">Sign In To Post Your Rating and Feedback</a>
					<?php
					}
					?>

					





					</div>
		</div>
<?php
						
}
}
?>