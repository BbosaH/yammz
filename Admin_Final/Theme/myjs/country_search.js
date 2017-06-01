 $(document).ready(function(){
    $("#location_search").keyup(function(){
      $.ajax({
      type: "POST",
      url: "country_search.php",
      data:'keyword='+$(this).val(),
      beforeSend: function(){
        $("#location_search").css("background","#FFF url(uploads/LoaderIcon.gif) no-repeat 165px");
               
      },
      success: function(data){
        $("#hidden_line").html('<hr class="advert_location_line64">');
        $("#suggesstion-box").show();
        $("#suggesstion-box").html(data);
        $("#location_search").css("background","#FFF");

      }
      });
    });
  });

 function selectCountry(val,item,id) {
 
    // $("#search-box").val(val);
    $("#location_search").val('');
    $("#suggesstion-box").hide();
    $("#country_list").append("<div class='"+item+"'>"+val+"</div>"); //Creating the item class

    if(item=="city_item") {
      $("#city_list_ids").append("<div class='city_list_ids'>"+id+"</div>")
    }else if(item=="country_item"){
      $("#country_list_ids").append("<div class='country_list_ids'>"+id+"</div>")
    }

    // var city_list = new Array();
    // var country_list = new Array();

    // $('.city_item').each(function(){
    //    city_list.push($(this).text());
      
    // });

    // $('.country_item').each(function(){
    //    country_list.push($(this).text());
      
    // });
    // alert("City List: "+city_list+"  Coutry_list"+country_list);
    // $("#city_list_input").html('<INPUT TYPE="text" NAME="input_name" VALUE="<?php echo base64_encode(serialize('+city_list+')); ?>">');   
  

  }