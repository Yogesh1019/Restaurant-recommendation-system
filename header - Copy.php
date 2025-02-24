	<div class="header" style="margin-bottom: 0px;">
			<nav class="navbar container">
			<div class="row">
		    <div class="col-md-12">
			<div style="float:right;padding-right:20px;">
						 			<?php 
				 if(isset($_SESSION['userid']) and isset($_SESSION['username']))
					{
echo "Welcome <br>".$_SESSION['username'];
					}
						?>
			</div>

		
		

  <a href="#" class="navbar-brand">
					<img src="logo.png" alt="Sapphire" style="height:100px;">Restaurant Recommendation System</a>

		</div>
			</div>
			</nav>
			</div>



			  <div class="navbar-header pull-left">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				
			  </div>


			  	<div class="row" style="background: #004B8C;">
		    <div class="col-md-10">
                 <div class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
                      <li><a href="index.php?page=1" id="myliks">Home</a></li>
<li><a href="index.php?page=8" id="myliks">About Us</a></li>
<li><a href="index.php?page=7" id="myliks">Contact </a></li>
<li><a href="index.php?page=6" id="myliks">AI Bot </a></li>


					<?php if(isset($_SESSION['userid']) and isset($_SESSION['username']))
					{
					?>
	
                      
					  <?php
					}
					else
					{
						echo '<li><a href="index.php?page=5" id="myliks">Sign In/Sign Up</a></li>';
					}
					?>
					 

 
                    </ul>

					 
                  </div><!-- /.navbar-collapse -->

				  </div>
			</div>

	