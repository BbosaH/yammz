 $(document).ready(function(){
    $("#search_box_cat").keyup(function(){
      $.ajax({
      type: "POST",
      url: "searrch_category_sub_category.php",
      data:'keyword='+$(this).val(),
      beforeSend: function(){
        $("#search-box_cat").css("background","#FFF url(uploads/LoaderIcon.gif) no-repeat 165px");
               
      },
      success: function(data){
        $("#hidden_line_cat").html('<hr class="advert_location_line64">');
        $("#suggesstion_box_cat").show();
        $("#suggesstion_box_cat").html(data);
        $("#search-box_cat").css("background","#FFF");

      }
      });
    });
  });

 function selectCountry_cat(val,item,id) {
 
  $("#search_box_cat").val('');
  $("#suggesstion_box_cat").hide(); 
  $("#category_list").append("<div class='"+item+"'>"+val+"</div>");

  if(item=="category_item") {
    $("#category_list_ids").append("<div class='category_list_ids'>"+id+"</div>")
  }else if(item=="sub_category_item"){
    $("#sub_category_list_ids").append("<div class='sub_category_list_ids'>"+id+"</div>")
  }

  // var style={color:"#FF2A2A"}; 
  // $("#category_list").css(style);
  }