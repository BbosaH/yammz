 $(document).ready(function(){
    $("#search-box").keyup(function(){
      $.ajax({
      type: "POST",
      url: "search.php",
      data:'keyword='+$(this).val(),
      beforeSend: function(){
        $("#search-box").css("background","#FFF url(uploads/loader2.gif) no-repeat 165px");
        var $tick= $("#tick")//.text(val);
        $("i",$tick).removeClass("ion-checkmark-circled")
       
      },
      success: function(data){
        $("#suggesstion-box").show();
        $("#suggesstion-box").html(data);
        $("#search-box").css("background","#FFF");


      }
      });
    });
  });

 function selectCountry(val,business_id) {
  
  // alert(business_id);
  $("#search-box").val(val);
  $("#suggesstion-box").hide();
   var $tick= $("#tick")//.text(val);
   $("i",$tick).addClass("ion ion-checkmark-circled")
   // var business_id="90";
    $("#bis_id").html("<input type='hidden' id='business_id' value='"+business_id+"' name='business_id'> ");
    $("#available_folders").html('<div class="row top10" >'+
                          '<div class="col-md-3 ">'+                           
                            '<label class="pull-right">Select Folder Name</label>'+
                              '<div id="bis_id"></div>'+
                          '</div>'+
                          '<div class="col-md-4 ">'+
                            '<select class="form-control noborder_radius" name="folder_option" id="folder_option" onChange="new_folder(this.value);" required>'+
                            '<option value="">Select Folder</option>'+
                            '<option value="new_folder">New Folder</option>'+
                            // '<option value="1">Mobile app Folder</option>'+
                            // '<option value="3">Website folder</option>'+                            
                            '</select>'+                            
                          '</div>'+
                          '<div class="col-md-1 ">'+
                           
                          '</div>'+
                          '<div class="col-md-1 ">'+
                             
                          '</div>'+
                          '<div class="col-md-1 "></div>'+
                        '</div>');
  }