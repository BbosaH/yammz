$(function() {

	$(".submit").click(function() {
	var submit_type= $("submit").val();

	var review_id = $("#review_id").val();
	var up = $("#up").val();

	var content = $("#content").val();
	var dataString = '&review_id='+ review_id + '&content=' + content;
		if(review_id=='' || content=='')
		 {
		alert('You can not make an empty comment');
		 }
		else
		{
		$("#flash").show();
		$("#flash").fadeIn(4000).html('<img src="currency16.png" style="width:30px;height:30px;" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
	$.ajax({
			type: "POST",
	  url: "Controllers/commentajax.php",
	   data: dataString,
	  cache: false,
	  success: function(html){
	 
	  $("ol#update").append(html);
	  $("ol#update" +"li:last").fadeIn("slow");
	  document.getElementById(''+up).value='';
	   
		$("#content").focus();
	 
	  $("#flash").hide();
		
	  }
	 });
	}
	return false;
		});
});