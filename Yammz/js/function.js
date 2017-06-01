
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


$(document).ready(function() {

	$.post( "Controllers/businesses_select.php", { pic: "1"}, function( data ) {
	  $("#picture").html( data );
	});
	
	$("#picture").on("click",".get_pic", function(e){
		var picture_id = $(this).attr('data-id');
		$("#picture").html("<div style=\"margin:50px auto;width:50px;\"><img src=\"loader.gif\" /></div>");
		$.post( "businesses_select.php", { pic: picture_id}, function( data ) {
			$("#picture").html( data );
		});
		return false;
	});
	
});
setInterval("my_function();",5000); 

function my_function(){
  $('#refresh').load(location.href + '#time');
}

	$(function() {
		$(".adduser").click(function() {
		var item_id = $(this).attr("id");
		var dataString = 'item_id='+item_id;  
		$('a#'+item_id).removeClass('adduser');
		$('a#'+item_id).html('<img src="loader.gif" class="loading" />'); 
		$.ajax({
			type: "POST",
			url: "Controllers/Friends/ajax.php",
			data: dataString,
			cache: false,
			success: function(data){
			if (data == 0) {
			alert('you are already freinds');
			
			} else {
			$('a#'+item_id).addClass('liked');
			$('a#'+item_id).html(data);
			}
			}  
		});
		return false;
		});
	});
	
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