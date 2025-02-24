		<div class="row">
		    <div class="col-md-12">
			    <div class="breadcrumbs">
				    <ul class="breadcrumb">
                        <li><a href="#">Home</a> <span class="divider"></span></li>
                        <li class="active">AI - Bot</li>
                    </ul>
				</div>
			</div>
		</div>
		
		<div class="row">
		    <div class="col-md-12">
				<h2>AI - Bot</h2>
			</div>
		</div>


		<div class="row registerbox">
		    <div class="col-md-12">
					<p class="text_about"><div class="col-md-12">
					<div class="location">

	

<div id="previewnew" style="height:600px;border:1px solid #ccc;overflow: scroll ;">
<br></div>


 <script type="text/javascript" src="data/jquery.form.js"></script>


				<script type="text/javascript" >
				$(function() {
				$("#submit_button").click(function() {
					  
				$("#create_account").ajaxForm({
						//target: '#previewnew'
						success: function(responseText){
							
						$("#previewnew").append('<div class="col-md-12"><div  class="col-md-8" style="float:right;border:1px solid #11FF11;border-radius:10px;margin:10px;padding:10px;"><p><strong>You:</strong></p>'+$("#messval").val()+'</div><br></div>');
	
						$("#previewnew").append('<div class="col-md-12"><div  class="col-md-8" style="float:left;border:1px solid #FF1111;border-radius:10px;margin:10px;padding:10px;"><p><strong>AI:</strong></p>'+responseText+'</div><br></div>');
							
						//$("#previewnew").append(responseText);
						
						$("#messval").val("");
						}
					}).submit();
					
				});
				}); 
				</script>

			<form id="create_account" action="http://192.168.43.27:5555/ABC" method="post" name="contact" enctype="multipart/form-data">
			<hr>
			
			<textarea cols="80" rows="3" class="form-control" name="Que" id="messval"></textarea>
			
			<p class="nomb" >
			<input style="float:right" type="button" value="Send" id="submit_button" class="form-control" />
			
 			</p><br>
			</form>



					</div>
				</div>	</p>
			</div>
		</div>
		

	

	