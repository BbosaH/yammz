<?php
require_once('Controllers/auth/auth.php');

?>

 <html lang="en">
	<?php require_once('imports.php'); ?>
	
	<script>
		/* AJAX request to checker */
		function check(){
			$.ajax({
				type: 'POST',
				url: 'Testing News Pool/checker.php',
				dataType: 'json',
				data: {
					counter:$('#message-list').data('counter')
				}
			}).done(function( response ) {
				/* update counter */
				$('#message-list').data('counter',response.current);
				/* check if with response we got a new update */
				if(response.update==true){
					$('#message-list').html(response.news);
				}
			});
		}
		//Every 20 sec check if there is new update
		setInterval(check,10000);
		$(document).ready(function() {

		$.post( "getbusinesses.php", { pic: ""}, function( data ) {
		  $("#picture").html( data );
		});
		
		$("#picture").on("click",".get_pic", function(e){
			var picture_id = $(this).attr('data-id');
			$("#picture").html("<div style=\"margin:50px auto;width:50px;\"><img src=\"loader.gif\" /></div>");
			$.post( "getbusinesses.php", { pic: picture_id}, function( data ) {
				$("#picture").html( data );
			});
			return false;
		});
		
	});
		
		
	</script>
	
	<script type="text/javascript">
	
	$(function() {
		$(".like").click(function() {
		var item_id = $(this).attr("id");
		var dataString = 'item_id='+item_id;  
		$('a#'+item_id).removeClass('like');
		$('a#'+item_id).html('<img src="images/icons/loader.gif" class="loading" />'); 
		$.ajax({
			type: "POST",
			url: "Controllers/like/ajax.php",
			data: dataString,
			cache: false,
			success: function(data){
			if (data == 0) {
			alert('you have liked this before');
			} else {
			$('a#'+item_id).addClass('liked');
			$('a#'+item_id).html(data);
			}
			}  
		});
		return false;
		});
	});
	
		
</script>
<script type="text/javascript">
	$( document ).on( 'click', '.loadmore', function () {
	     $(this).text('Loading...');
	     var ele = $(this).parent('li');
	      $.ajax({
	        url: 'loadmore.php',
	        type: 'POST',
	        data: {
	          page:$(this).data('page'),
	        },
	        success: function(response){
	          if(response){
	            ele.hide();
	            $(".news_list").append(response);
	          }
	        }
	      });
	});
</script>

	<body style="background-color:#E9EAEE">
		
		<div class="navbar navbar-inverse navbar-fixed-top" style="background-color:#BD2532" >
		  <div class="container">
				<div class="navbar-header" style="padding-top:3px;">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
				  <h1 style="color:white">
					&nbsp; Yammz it <img src="images/icons/yammz_logo.png" width="35" height="35" />
				  </h1>
			    </div>
			   
			  </div>
		</div>
		<div class="container">
			
			<div class="row">
				<div class="container">
				<div class="row" style="padding-top:5px">
				
				</div>
				<br/>
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" >
					
							<div class="row">
								<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 sidebar-offcanvas" id="sidebar" role="navigation">
									<span class="pull-left">
										<?php require_once("Controllers/business_category.php");
										$page="index_page";
											getCategories($page);?>
									</span>
									<span style="width:5px;"></span>
									<span class="pull-left" style="width:800px;">
										<div class="panel panel-default noborderStyle">
										<div class="panel-body">										
											<div class="tab-content">
											
												<?php 
												
												require_once("Controllers/Home/pills_content.php"); ?>
												
											</div>
										</div>
									
									</div>
									</span>
								</div>
								
							</div>
							
					</div>
					
					
					
				</div>
			</div>
			<?php require_once("footer.php"); ?>
		</div>
		<script src="dist/js/bootstrap.min.js"></script>
		<script src="assets/js/docs.min.js"></script>
		<script src="offcanvas.js"></script>
	</body>

</html>