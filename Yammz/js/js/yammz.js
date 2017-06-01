var BaseURL='http://localhost/yammzit/Yammz/';
var BaseImageURL='http://localhost/yammzit/admin/Theme/';
//var  BaseURL='http://yammzit.com/';
//  BaseImageURL='http://yammzit.com/admin/Theme/';

//var  BaseURL='http://yammzco-001-site1.btempurl.com/';
//var  BaseImageURL='http://yammzco-001-site1.btempurl.com/admin/Theme/';


$(document).ready(function(){


	//pickRandomBiz();

	// profile edits


			$('.category_div').hide();
			

	       	$('#business_events_tab').hide();
	       	$('#business_reviews_tab').show();
	       	$('#business_photos_tab').hide();
	       	$('#business_followers_tab').hide();


	 // profile edits
	//pickFavouriteBusinesses();
	var ids = $('.card').map(function(index) {
    // this callback function will be called once for each matching element
     return this.id;
	});
	////console.log("these are ids -> :",ids)
	for(i=0;i<ids.length;i++){

			if(parseInt(ids[i])>9)
			{
				$("#"+ids[i]).hide();
			}

	}
    //$(".card").hide();
    $(".more").show();

    var count =0;
    $(".more").click(function(){
    	if(count==0){
	    	for(i=0;i<ids.length;i++){

				if(parseInt(ids[i])<=9)
				{
					$("#"+ids[i]).slideUp();
					//$(".more")
				}else
				{
					$("#"+ids[i]).show();
				}

			}
			count =1;
		}else{

			for(i=0;i<ids.length;i++){

				if(parseInt(ids[i])>9)
				{
					$("#"+ids[i]).hide();
				}else
				{
					$("#"+ids[i]).slideDown();
				}


			}
			count =0;

		}
    });


//sexify();


});

function sexify()
{
	var sex = document.getElementById("hidden_sex").value;

	if(sex=="male")
	{
		document.getElementById("male_radio").checked = true;
		document.getElementById("female_radio").checked = false;
		
	}else if(sex=="female")
	{
		document.getElementById("male_radio").checked = false;
		document.getElementById("female_radio").checked = true;
	}
}



function like_unlike_Comment(user_id,comment_id)
{


	$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id,function(data){
        //alert(data.data);
    });

}
function unlikeComment(user_id,comment_id)
{
	$('#likecard'+comment_id).css({
		'visibility' : 'visible'
	});

	$('#unlikecard'+comment_id).css({
		'visibility' : 'hidden'
	});

}

function doComment(user_id,review_id,commentdetails)
{
	$.get(BaseURL+"classes/util.php?review_id="+review_id+"&user_id="+user_id+"&commentdetails="+commentdetails,function(data){
        //alert(data);
    });

}

function likeNewFeed(user_id,newsfeed_id)
{
				currentfeed.likeToggleValue=1;
 				$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        			//alert(data);
        			//var datafig = data;
        			//currentfeed.likeNo=parseInt(datafig);
        			//$scope.$apply();
        			//alert(currentfeed.likeNo);
    			});

}

function unlikeNewsFeed(user_id,newsfeed_id)
{
				currentfeed.likeToggleValue=0;
 				$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        				//alert(data);
        			
        			//currentfeed.likeNo=parseInt(data);
        			//$scope.$apply();
        			//alert(currentfeed.likeNo);
    			});

}


function postComment(user_id,feed_id,date_created)
{

	var details = document.getElementById("content"+feed_id).value;
	var kind ="normal";
	var commentTo = 0;

	if (details != "") {
        //alert(val);
        $.get(BaseURL+"classes/util.php?comment_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&feed_id="+feed_id+"&commentTo="+commentTo+"&details="+details,function(results){
			  // the output of the response is now handled via a variable call 'results'
			  	//alert("results are"+results);
			  	$("#commentors"+feed_id).append(results);
			  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});
    }
    document.getElementById("content"+feed_id).value="";

}




function pickCre(id)
{
	newpassword =document.getElementById("newpass").value;
	newconfirmpassword =document.getElementById("confirmnewpass").value;
	//alert(newpassword);
	//alert(newconfirmpassword);
	// $.get("http://localhost:89//yammzit/Yammz/set_password.php?username="+username,function(results){

	// 		alert("The results  are"+results);


	// });

	if(newpassword === newconfirmpassword){
	//	alert("newpassword");
		$.get(BaseURL+"classes/util.php?id="+id+"&newpassword="+newpassword,function(results){

			 //alert(results);
			 window.location.href=BaseURL+"home2.php";

		});
		newpassword='';
		newconfirmpassword='';


	}else
	{

	}

}

function checkAccount()
{
	email =document.getElementById("checkmail").value;
	$.get(BaseURL+"classes/util.php?checkmail="+email,function(results){

			// alert(results);
			 fooc=results;
			 if(fooc.length>2)
			 {
			 	//window.location.href="http://localhost:89//yammzit/Yammz/password_link.php";
			 	//window.location.href="http://localhost:89//yammzit/Yammz/forgot_password1.php?username="+email;
			 }else
			 {
			 	//alert("empty");
			 }

	});

}

function isInteger(x) {
        return x % 1 === 0;
}

 

 function toggleBusinessPage(id)
 {
 	switch(id)
 	{
 		case 'reviews_tab':
 		  // $('#business_default_tab').hide();
	       $('#business_reviews_tab').show();
	       $('#business_photos_tab').hide();
	       $('#business_followers_tab').hide();
	       $('#business_events_tab').hide();
 		break;
 		case 'photos_tab':
 		  // $('#business_default_tab').hide();
	       $('#business_reviews_tab').hide();
	       $('#business_photos_tab').show();
	       $('#business_followers_tab').hide();
	        $('#business_events_tab').hide();
 		break;
 		case 'followers_tab':
 		  // $('#business_default_tab').hide();
	       $('#business_reviews_tab').hide();
	       $('#business_photos_tab').hide();
	       $('#business_followers_tab').show();
	       $('#business_events_tab').hide();

 		break;
 		case 'events_tab':
 		   $('#business_events_tab').show();
	       $('#business_reviews_tab').hide();
	       $('#business_photos_tab').hide();
	       $('#business_followers_tab').hide();
 		break;
 		default:
 		    //$('#business_default_tab').show();
	        $('#business_reviews_tab').show();
	        $('#business_photos_tab').hide();
	        $('#business_followers_tab').hide();
 		break
 	}

 }

function pickFavouriteBusinesses()
{
	id = document.getElementById("profile_id_keeper").value;
	//alert(id);
	$.get(BaseURL+"classes/util.php?favourite_business_picker="+id,function(results){
			  // the output of the response is now handled via a variable call 'results'
			  	//alert("results magigiasn are"+results);

			  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
	});


}

function followItem(item_type,user_id,item_id)
{

		$.get(BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
			  // the output of the response is now handled via a variable call 'results'
			  	//alert("results magigiasn are"+results);

			  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});



}

function checkOwnership(id)
{
	sessionid = document.getElementById("sessionholder").value;
	if(id==sessionid)
	{
		return true;
	}
	return false;
}

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile_photo')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
}



function makecities()
{
    country_id = document.getElementById("country").value;
    $.get(BaseImageURL+"classes/util.php?country_id="+country_id,function(data){
        document.getElementById('city').innerHTML=data;
    });

}
function makeSubcategories(id,populated_id)
{
    category_id = document.getElementById(id).value;
    $.get(BaseImageURL+"classes/util.php?category_id="+category_id,function(data){
        document.getElementById(populated_id).innerHTML=data;
    });
}

function searchResults(filtervalue="none")
{

	searchvalue = document.getElementById("search").value;
	//alert($("input[name='events_choice_name']").val())
	var filter = 'none';
	if($("input[name=events_choice_name]").val()!=undefined)
	{
		filter = $("input[name=events_choice_name]").val();
		//alert($("input[name=events_choice_name]").val())



	}
	//alert("The filter is "+filter);
	$.get(BaseURL+"classes/util.php?search="+searchvalue+"&filter="+filter,function(data){

        	//alert(data);

    });


}
