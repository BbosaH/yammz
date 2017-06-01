function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logo')
                .attr('src', e.target.result)
                .width(700)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function actPageAdmin(id){
  window.location="adminAccountDetails.php?key="+id;
}

function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logo')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURLLogo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#logo2')
                    .attr('src', e.target.result)
                    .width(120)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
}

function readURLLogo8(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logo2')
              .attr('src', e.target.result)
              .width(280)
              .height(140); 

            $('#post_img')
              .attr('src', e.target.result)
              .width("100%")
              .height(200)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURLLogo9(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logo2')
              .attr('src', e.target.result)
              .width(200)
              .height(200); 

            $('#post_img')
              .attr('src', e.target.result)
              .width(200)
              .height(200)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function fillcountryCities(id){
  // alert("selected "+id);
  $.get("getCountryCities.php?id="+id,function(result){
    var response=JSON.parse(result);
    var content='<select name="city" id="city" class="form-control" style="min-width:100%;height:26px;background-color:#F2F2F2;border-color:#F2F2F2;margin-left:-20%;padding-top: 2px;">';
    for (var i = 0; i < response.length; i++) {
     
      content=content+'<option value="'+response[i].id+'">'+response[i].name+'</option>';
    }

    content=content+'</select>';

    $("#citysection").html(content);

  });
}

function getDepartmentInitial(id){

  $.get("getDepartmentInitial.php?id="+id,function(result){

    var result=JSON.parse(result);

    $("#depInitial").val(result.initial);

    var position=$("#position").val();    
    $("#securitylevel").val("Level "+position+result.initial);

    var branch_id=$("#branch_id").val();
    var department=$("#department").val();

    if (position==4) {
      if (branch_id !="" && department !="") {
        populateTeam(branch_id,department);
      }
    }

  });

  
}

function teampop(){

  var branch_id=$("#branch_id").val();
  var department=$("#department").val();
  var position=$("#position").val();

  if (position==4) {
    if (branch_id !="" && department !="") {
      populateTeam(branch_id,department);
    }

  }

  

}

function UpdatepositionLevel(position){
    var initial = $("#depInitial").val();
   
    $("#securitylevel").val("Level "+position+initial);

    var branch_id=$("#branch_id").val();
    var department=$("#department").val();

    if (position==4) {
      if (branch_id !="" && department !="") {
        populateTeam(branch_id,department);
      }
    }else{
      $('#team option').remove();
    }
}

function makecities()
{
    country_id = document.getElementById("country").value;
    $.get("http://yammzit.com/admin/Theme/classes/util.php?country_id="+country_id,function(data){
        document.getElementById('city').innerHTML=data;
    });
    
}
function ApproveClaimed_business(business_id,user_id,business_name,business_phone,business_address,users_name){
 
  $.get("ApproveClaimed_business.php?business_id="+business_id+"&user_id="+user_id,function(data){

    var responseText=JSON.parse(data);
    // alert("Code is: "+responseText.code+" feedback is: "+responseText.response);

    if (responseText.response=="approved") {

      var dataobject={code:responseText.code,business_name:business_name,business_phone:business_phone,business_address:business_address,users_name:users_name};

      localStorage.setItem("claim_letter_data",JSON.stringify(dataobject));
      window.location="claimed_business_letter.php"
    }

  });
 
}

function getApproveClaimed_business_code(business_id,user_id,business_name,business_phone,business_address,users_name){
  // alert("Business Id: "+business_id+" user_id :"+user_id);
  $.get("getApproveClaimed_business_code.php?business_id="+business_id+"&user_id="+user_id,function(data){

    var responseText=JSON.parse(data);
    // console.log(responseText);
    // alert(responseText[0].code);
    var dataobject={code:responseText[0].code,business_name:business_name,business_phone:business_phone,business_address:business_address,users_name:users_name};

    localStorage.setItem("claim_letter_data",JSON.stringify(dataobject));
    window.location="claimed_business_letter.php"
    
  });
 
}

function DeactivateClaimed_business(business_id,user_id){

  $.get("DeactivateClaimed_business.php?business_id="+business_id+"&user_id="+user_id,function(data){

    var responseText=JSON.parse(data);
    if(responseText=="true"){
      window.location="claimed_approved_business.php?k=780";
    }  
    
  });

}

function loadLetter(){
  var data=localStorage.getItem("claim_letter_data");
  // console.log(data);
  // alert(data);
  var real_data=JSON.parse(data);

  $("#users_name").html(real_data.users_name);
  $("#business_name").html(real_data.business_name);
  $("#business_address").html(real_data.business_address);
  $("#business_phone").html(real_data.business_phone);
  $("#code").html(real_data.code);
}
function fillTimeZone(country_name)
{    
    // country_name="Uganda";
  //   var check_page_state=window.localStorage.getItem("search_for_advert_account"); 
    // console.log(country_name);
  //   alert(check_page_state);  
  // if(check_page_state=="forward"){
    $.ajax({
      type: "POST",
      url: "fillTimeZone.php?country_name="+country_name,
      // data: dataString,
      cache: false,
      success: function(html)
      {       
        // alert(html);
        // $(".timezone").html(html);
        var returnedData = JSON.parse(html);

        // alert(returnedData[0].local_time);
        // console.log(returnedData[0]);
        $(".timezone").html("<option>"+returnedData[0].time_zone+"</option>");
        $("#local_time").html(""+returnedData[0].local_time+"");
        $("#gmt").html(""+returnedData[0].gmt+"");

      } 
    });

  // }else if(check_page_state=="back"){

  //   var business_name=window.localStorage.getItem("business_name");
  //   var business_id=window.localStorage.getItem("business_id");
  //   var folder_name=window.localStorage.getItem("folder_name");
  //   var currency=window.localStorage.getItem("currency");
  //   var account_country=window.localStorage.getItem("account_country");
  //   var timezone=window.localStorage.getItem("timezone");

  //   document.getElementById("search-box").value=business_name;
  //   // document.getElementById("business_id").value=business_id;
  //   // document.getElementById("folder_option").value=folder_name;
  //   document.getElementById("currency").value=currency;
  //   document.getElementById("account_country").value=account_country;
  //   document.getElementById("timezone").value=timezone;


  // }

    
}

function search_for_advert_account_load(){

  var check_page_state=window.localStorage.getItem("search_for_advert_account_state");
  // alert(check_page_state);
  // console.log(check_page_state);
  if(check_page_state=="forward"){

    fillTimeZone('115518002958331');
  }else if(check_page_state=="back"){

    var loc_data=localStorage.getItem("search_for_advert_account_data");

     var current_data=JSON.parse(loc_data)
     // console.log(current_data);
    var new_folder_name=current_data.new_folder_name;

    // if(current_data.folder_name=="new_folder"){
    //   folder_name=new_folder_name;
    // }else{
    //   folder_name=current_data.folder_name;
    // }
    document.getElementById("search-box").value=current_data.business_name;
    // document.getElementById("business_id").value=business_id;
    // document.getElementById("folder_option").value=folder_name;
    document.getElementById("currency").value=current_data.currency;
    document.getElementById("account_country").value=current_data.account_country;
    document.getElementById("timezone").value=current_data.timezone;
    fillTimeZone(current_data.account_country);

    document.getElementById("bis_id").innerHTML="<input type='hidden' id='business_id' value='"+current_data.business_id+"' name='business_id'> ";
    document.getElementById("available_folders").innerHTML='<div class="row top10" >'+
                          '<div class="col-md-3 ">'+                           
                            '<label class="pull-right">Select Folder Name</label>'+
                              '<div id="bis_id"></div>'+
                          '</div>'+
                          '<div class="col-md-4 ">'+
                            '<select class="form-control noborder_radius" name="folder_option" id="folder_option" onchange="new_folder(this.value);" required>'+
                            '<option value="'+current_data.folder_name+'">'+current_data.folder_name+'</option>'+
                            '<option value="">Select Folder</option>'+
                            '<option value="new_folder">New Folder</option>'+
                            '<option value="1">Mobile app Folder</option>'+
                            '<option value="3">Website folder</option>'+                            
                            '</select>'+                            
                          '</div>'+
                          '<div class="col-md-1 ">'+
                           
                          '</div>'+
                          '<div class="col-md-1 ">'+
                             
                          '</div>'+
                          '<div class="col-md-1 "></div>'+
                        '</div>';

    if (current_data.folder_name=="new_folder") {
      $("#folder_creation").html('<div class="row top10" >'+
                            '<div class="col-md-3 ">'+                           
                              '<label class="pull-right"></label>'+
                                '<div id="bis_id"></div>'+
                            '</div>'+
                            '<div class="col-md-4 ">'+
                              '<input type="text" name="created_folder" id="new_folder_name" class="form-control noborder_radius" value="'+new_folder_name+'"/>'+
                                                       
                            '</div>'+
                            '<div class="col-md-1 ">'+
                             
                            '</div>'+
                            '<div class="col-md-1 ">'+
                               
                            '</div>'+
                            '<div class="col-md-1 "></div>'+
                          '</div>');
  }
  }
}

function makeSubcategories(id,populated_id)
{
    category_id = document.getElementById(id).value;
    $.get("http://yammzit.com/admin/Theme/classes/util.php?category_id="+category_id,function(data){
        document.getElementById(populated_id).innerHTML=data;
    });


  }

//Wilson Scripts
function advertising_manager_stats_Load(){
  Load1();
  Date_month_week_select_Default();
}

 function Load1(){
    
    var today = new Date();
    var monthDay = today.getDate();
    var year = today.getFullYear();
    var month = today.getMonth()+1;
    
    document.getElementById("year").value=year;
    document.getElementById("year2").value=year;
    document.getElementById("month").value=month;
    document.getElementById("month2").value=month;

    //Getting the current day name
    var real_today = today.getDay();
    var final_today="";
    if(real_today==0){

      final_today="sunday";
    }else if(real_today==1){
      final_today="monday";

    }else if(real_today==2){
      final_today="tuesday";

    }else if(real_today==3){
      final_today="wednesday";

    }else if(real_today==4){
      final_today="thursday";

    }else if(real_today==5){
      final_today="friday";

    }else if(real_today==6){
      final_today="saturday";
    }

    // alert(real_today);
    Date_month_week_select('days',real_today)

    document.getElementById("my_current_date").value=final_today;

     //Getting current week
    if(monthDay <=7){
       document.getElementById("week").value=1;
       document.getElementById("week2").value=1;
     }else if(monthDay >=8 && monthDay <=14){
        document.getElementById("week").value=2;
        document.getElementById("week2").value=2;
     }
     else if(monthDay >=15 && monthDay <=21){
        document.getElementById("week").value=3;
        document.getElementById("week2").value=3;
     }
     else if(monthDay >=22 && monthDay <=28){
        document.getElementById("week").value=4;
        document.getElementById("week2").value=4;
     }
     else if(monthDay >=29 && monthDay <=31){
        document.getElementById("week").value=5;
        document.getElementById("week2").value=5;
     }
   
  }

  function Date_month_week_select(key,value) {
      
     var yr ="";
      var mth ="";
      var wk ="";
      if(key=="year"){
          mth=document.getElementById("month").value;
          wk=document.getElementById("week").value;
          yr=value;
      }else if(key=="month"){
          mth=value;
          wk=document.getElementById("week").value;
          yr=document.getElementById("year").value;       
      }else if(key=="week"){
          mth=document.getElementById("month").value;
          wk=value;
          yr=document.getElementById("year").value;
      }else if(key=="days"){
        document.getElementById("my_current_date").value=value;

        yr=document.getElementById("year").value;
        mth=document.getElementById("month").value;
        wk=document.getElementById("week").value;

        if(value==1){
          document.getElementById("Monday").style.color="#ffffff";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(value==2){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#ffffff";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(value==3){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#ffffff";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(value==4){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#ffffff";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(value==5){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#ffffff";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(value==6){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#ffffff";
          document.getElementById("Sunday").style.color="#828282";
        }else if(value==7){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#ffffff";
        }


      }
    

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        // document.getElementById("selected_choice_details").innerHTML=xmlhttp.responseText;
        var dataobject=eval('(' + xmlhttp.responseText + ')');
        alert(dataobject.ads_left);
        document.getElementById("ads_worked_on").innerHTML=dataobject.ads_worked_on;
        document.getElementById("adverts_left").innerHTML=dataobject.ads_left;
        document.getElementById("goal").innerHTML=dataobject.goal;
        document.getElementById("goal").style.color=dataobject.color;
        document.getElementById("extra_ads").innerHTML=dataobject.extra_ads;

        


      }
    }
    var myday= document.getElementById("my_current_date").value;
    
     xmlhttp.open("GET","ads_details_of_choice.php?month="+mth+"&year="+yr+"&week="+wk+"&myday="+myday,true);
    xmlhttp.send();
   
  }

    function Show_admin_day_set_goal(key,value,admin_id) {
      alert(admin_id);
     var yr ="";
      var mth ="";
      var wk ="";
      if(key=="year"){
          mth=document.getElementById("month"+admin_id).value;
          wk=document.getElementById("week"+admin_id).value;
          yr=value;

      }else if(key=="month"){
          mth=value;
          wk=document.getElementById("week"+admin_id).value;
          yr=document.getElementById("year"+admin_id).value;

      }else if(key=="week"){
          mth=document.getElementById("month"+admin_id).value;
          wk=value;
          yr=document.getElementById("year"+admin_id).value;
      }else if(key=="days"){
        document.getElementById("my_current_date"+admin_id).value=value;
        yr=document.getElementById("year"+admin_id).value;
        mth=document.getElementById("month"+admin_id).value;
        wk=document.getElementById("week"+admin_id).value;


      }
      
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        // document.getElementById("selected_choice_details").innerHTML=xmlhttp.responseText;
        var dataobject=eval('(' + xmlhttp.responseText + ')');       
       
        if(dataobject.goal <1){
          // document.getElementById("ads"+admin_id).innerHTML="";
          if(dataobject.today =="true"){

            document.getElementById("ads_worked_on"+admin_id).innerHTML="";
            document.getElementById("ads"+admin_id).innerHTML='<input type="text" id="input_goal" onkeydown ="saveGoal('+admin_id+');" class="ads_goal_input no_focus" name="goal" value="" class="form-control">';
          }else{
            document.getElementById("ads"+admin_id).innerHTML="";
            document.getElementById("ads_worked_on"+admin_id).innerHTML=dataobject.goal;
          }
        }else{
          document.getElementById("ads"+admin_id).innerHTML="Ads";
          document.getElementById("ads_worked_on"+admin_id).innerHTML=dataobject.goal;
        }

      }
    }

    alert(admin_id);
    var myday= document.getElementById("my_current_date"+admin_id+"").value;

    
     xmlhttp.open("GET","Show_admin_day_set_goal.php?month="+mth+"&year="+yr+"&week="+wk+"&myday="+myday+"&id="+admin_id,true);
    xmlhttp.send();
   
  }

   function Date_month_week_select_User_ads(key,value,user_id) {
     
     var yr ="";
      var mth ="";
      var wk ="";
      if(key=="year"){
          mth=document.getElementById("month").value;
          wk=document.getElementById("week").value;
          yr=value;
      }else if(key=="month"){
          mth=value;
          wk=document.getElementById("week").value;
          yr=document.getElementById("year").value;       
      }else if(key=="week"){
          mth=document.getElementById("month").value;
          wk=value;
          yr=document.getElementById("year").value;
      }else if(key=="days"){

        colorSelectedWeekDay(value);
        document.getElementById("my_current_date").value=value;

        yr=document.getElementById("year").value;
        mth=document.getElementById("month").value;
        wk=document.getElementById("week").value;

      }
    

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        // document.getElementById("selected_choice_details").innerHTML=xmlhttp.responseText;
        var dataobject=eval('(' + xmlhttp.responseText + ')');
        
        document.getElementById("ads_worked_on").innerHTML=dataobject.ads_worked_on;
        document.getElementById("adverts_left").innerHTML=dataobject.ads_left;
        document.getElementById("goal").innerHTML=dataobject.goal;
        document.getElementById("goal").style.color=dataobject.color;
        document.getElementById("extra_ads").innerHTML=dataobject.extra_ads;

        
      }
    }
    var myday= document.getElementById("my_current_date").value;
    
     xmlhttp.open("GET","user_ads_details.php?month="+mth+"&year="+yr+"&week="+wk+"&myday="+myday+"&id="+user_id,true);
    xmlhttp.send();
   
  }

  function colorSelectedWeekDay(real_today){
    if(real_today==0){

      final_today="sunday";
    }else if(real_today==1){
      final_today="monday";

    }else if(real_today==2){
      final_today="tuesday";

    }else if(real_today==3){
      final_today="wednesday";

    }else if(real_today==4){
      final_today="thursday";

    }else if(real_today==5){
      final_today="friday";

    }else if(real_today==6){
      final_today="saturday";
    }

    if(final_today=="monday"){
          document.getElementById("Monday").style.color="#ffffff";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(final_today=="tuesday"){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#ffffff";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(final_today=="wednesday"){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#ffffff";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(final_today=="thursday"){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#ffffff";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(final_today=="friday"){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#ffffff";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#828282";
        }else if(final_today=="saturday"){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#ffffff";
          document.getElementById("Sunday").style.color="#828282";
        }else if(final_today=="sunday"){
          document.getElementById("Monday").style.color="#828282";
          document.getElementById("Tuesday").style.color="#828282";
          document.getElementById("Wednesday").style.color="#828282";
          document.getElementById("Thursday").style.color="#828282";
          document.getElementById("Friday").style.color="#828282";
          document.getElementById("Yesterday").style.color="#828282";
          document.getElementById("Sunday").style.color="#ffffff";
        }

        return final_today;
  }

  function Date_month_week_select_Default() {

    var today = new Date();
    //Getting the current day name
    var monthDay = today.getDate();
    var year = today.getFullYear();
    var month = today.getMonth()+1;

    var real_today = today.getDay();
   
    var final_today=colorSelectedWeekDay(real_today);

    var myday=final_today;

    var mth=month;
    var wk="";
    var yr=year;

    if(monthDay <=7){
       wk=1;       
     }else if(monthDay >=8 && monthDay <=14){
        wk=2;       
     }
     else if(monthDay >=15 && monthDay <=21){
       wk=3;        
     }
     else if(monthDay >=22 && monthDay <=28){
      wk=4;        
     }
     else if(monthDay >=29 && monthDay <=31){
       wk=5;       
     }

     if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        // document.getElementById("selected_choice_details").innerHTML=xmlhttp.responseText;
        var dataobject=eval('(' + xmlhttp.responseText + ')');
        
        document.getElementById("ads_worked_on").innerHTML=dataobject.ads_worked_on;
        document.getElementById("adverts_left").innerHTML=dataobject.ads_left;
        document.getElementById("goal").innerHTML=dataobject.goal;
        document.getElementById("goal").style.color=dataobject.color;
        document.getElementById("extra_ads").innerHTML=dataobject.extra_ads;

      }
    }
      
     xmlhttp.open("GET","ads_details_of_choice.php?month="+mth+"&year="+yr+"&week="+wk+"&myday="+myday,true);
    xmlhttp.send();


  }

   function monthly_ads_records(key,value,id) {
      
     var yr ="";
      var mth ="";
      var wk ="";
      // var id=23;
      if(key=="year"){
          mth=document.getElementById("selected_month").value;          
          yr=value;

      }else if(key=="months"){
          mth=value;         
          yr=document.getElementById("year33").value;
      }

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        // document.getElementById("selected_choice_details").innerHTML=xmlhttp.responseText;
        var dataobject=eval('(' + xmlhttp.responseText + ')');          
        
        document.getElementById("thismonth_ads").innerHTML=dataobject.ads_worked_on;
        document.getElementById("thismonth_goal_achieve").innerHTML=dataobject.goal;
        document.getElementById("thismonth_extra_ads").innerHTML=dataobject.extra_ads;

        document.getElementById("thismonth_ads").style.color=dataobject.color;
        document.getElementById("thismonth_goal_achieve").style.color=dataobject.color;
        document.getElementById("this_month_text1").style.color=dataobject.color;
      }
    }
    
    
     xmlhttp.open("GET","year_month_ads.php?month="+mth+"&year="+yr+"&id="+id,true);
    xmlhttp.send();
   
  }

    function PerformanceDate_month_week_select(key,value,user) {
    
      var yr ="";
      var mth ="";
      var wk ="";
      if(key=="year"){
          mth=document.getElementById("month2").value;
          wk=document.getElementById("week2").value;
          yr=value;
      }else if(key=="month"){
          mth=value;
          wk=document.getElementById("week2").value;
          yr=document.getElementById("year2").value;       
      }else if(key=="week"){
          mth=document.getElementById("month2").value;
          wk=value;
          yr=document.getElementById("year2").value;
      }else if(key=="days"){
        document.getElementById("my_current_date").value=value;

        yr=document.getElementById("year2").value;
        mth=document.getElementById("month2").value;
        wk=document.getElementById("week2").value;

      }
    

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("performance_view").innerHTML=xmlhttp.responseText;
       
      }
    }
    var myday= document.getElementById("my_current_date").value;
  
    if(user=="Manager"){
     xmlhttp.open("GET","Supervisor_performance_view.php?month="+mth+"&year="+yr+"&week="+wk+"&myday="+myday,true);
    }else{
      xmlhttp.open("GET","operators_performances.php?month="+mth+"&year="+yr+"&week="+wk+"&myday="+myday,true);
    }
    xmlhttp.send();
   
  }

  function team_leader_performance(id,year) {
   

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("team_leader_performance").innerHTML=xmlhttp.responseText;
      
      }
    }
    
    xmlhttp.open("GET","team_leader_performances.php?id="+id+"&year="+year,true);
    xmlhttp.send();
   
  }

  function Admin_monthly_performances(id,value) {
    
      var yr=document.getElementById("year_performance").value;

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var dataobject=eval('(' + xmlhttp.responseText + ')');

        for (var i = dataobject.length - 1; i >= 0; i--) {
           
          alert(""+dataobject[i]);
         } 
        
      }
    }
    var myday= document.getElementById("my_current_date").value;
    
     xmlhttp.open("GET","Supervisor_performance_view.php?id="+id+"&year="+yr,true);
    xmlhttp.send();
   
  }
  function Admin_Deactivating(id) {
   
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {

        var content='<div class="col-xs-2 col-md-2">'+
                               
          '<button class="btn form-control supervisor_activate_button">Deactivate</button>'+
          '</div>'+
          '<div class="col-xs-2 col-md-2">'+
          '<button class="btn form-control ymz_red supervisor_deactivate_button" id="activate" onclick="Admin_activating('+xmlhttp.responseText+');">Activate</button>'+
          '</div>';

          if (xmlhttp.responseText=="error") {

          }else{
            document.getElementById("activate_deactivate").innerHTML=content;
          }

                      
      }
    }
    
     xmlhttp.open("GET","Admin_Deactivation.php?id="+id,true);
    xmlhttp.send();
   
  }
  function Admin_activating(id) {
    
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {

        var content='<div class="col-xs-2 col-md-2">'+
          '<button class="btn form-control ymz_red supervisor_deactivate_button" id="deactivate" onclick="Admin_Deactivating('+xmlhttp.responseText+');">Deactivate</button>'+
          '</div>'+
          '<div class="col-xs-2 col-md-2">'+
          '<button class="btn form-control supervisor_activate_button">Activate</button>'+
          '</div>';

           if (xmlhttp.responseText=="error") {

          }else{
            document.getElementById("activate_deactivate").innerHTML=content;  
          }

           
      }
    }
    
     xmlhttp.open("GET","Admin_activation.php?id="+id,true);
    xmlhttp.send();
   
  }

  function AccountManager_user_Activation(id){
    var url="Admin_activation.php?id="+id;

    content='<table class="" style="margin: 50px 0px -30px;">'+
          '<tr>'+
              '<td style="width:100px;"><button type="submit" style="background-color:#E3E3E1;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" disabled >Activate</button>'+
              '</td>'+
              '<td style="width:100px;"><button type="submit" style="background-color:#2B2B2B;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" onclick="AccountManager_user_Deactivation('+id+');">Deactivate</button>'+
              '</td>'+
              '<td><p style="margin: -5px 0px -18px;">Cancel</p></td>'+
          '</tr>'+
        '</table>';

    $.get(url,function(response){
      // alert(response);     

      if (response=="error") {

      }else{
        $("#admin_activation_manager").html(content);
      }        

    });
  }

  function AccountManager_user_Deactivation(id){
    var url="Admin_Deactivation.php?id="+id;

    content='<table class="" style="margin: 50px 0px -30px;">'+
          '<tr>'+
              '<td style="width:100px;"><button type="submit" style="background-color:#2B2B2B;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" onclick="AccountManager_user_Activation('+id+');"  >Activate</button>'+
              '</td>'+
              '<td style="width:100px;"><button type="submit" style="background-color:#E3E3E1;border-radius:6px;border:0px;width:80%;color:#fff;height:23px;margin-right: 20px;padding-top: 0px;font-size: 12px;" disabled>Deactivate</button>'+
              '</td>'+
              '<td><p style="margin: -5px 0px -18px;">Cancel</p></td>'+
          '</tr>'+
        '</table>';

    $.get(url,function(response){
      // alert(response);     

      if (response=="error") {

      }else{
        $("#admin_activation_manager").html(content);
      }        

    });
  }


  function InputActivator(id,identifier,defaultss){
   
    document.getElementById(""+identifier).type="text";
    document.getElementById(""+defaultss).style.visibility="hidden";
    document.getElementById("ads"+id+"").style.visibility="hidden";
  }

  function saveGoal(admin_id){
    // alert("gwe man:"+admin_id);
    var goal=document.getElementById("input_goal").value;
    // if (window.event.keyCode == '13') {

        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var dataobject=eval('(' + xmlhttp.responseText + ')');

            // alert(xmlhttp.responseText);
            $("#message").html(xmlhttp.responseText.content);

            window.location="set_goal.php";
            
          }
        }
        
        // alert("id:"+admin_id+" goal "+goal);
         xmlhttp.open("GET","saveGoal.php?id="+admin_id+"&goal="+goal,true);
        xmlhttp.send();
    // }
  }
  function EditGoal(admin_id,identifier){

    var goal=document.getElementById(identifier).value;
    alert("goal: "+goal);
    // if (window.event.keyCode == '13') {

        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            var dataobject=eval('(' + xmlhttp.responseText + ')');

            alert(xmlhttp.responseText);
            // $("#message").html(xmlhttp.responseText.content);
            window.location="set_goal.php";
            
          }
        }
        
         xmlhttp.open("GET","EditGoal.php?id="+admin_id+"&goal="+goal,true);
        xmlhttp.send();
    // }
  }

  function Advert_register_back_button(url,stored){
    window.localStorage.setItem(stored,"back");
    window.location=url;
    // var test=window.localStorage.getItem("search_for_advert_account");
    // alert(test);

  }
  function Advert_register_continue_button(url){
    window.location=url;

  }

  function adBudgetSelect(id){

    var prev_data=window.localStorage.getItem("search_for_advert_account_data");
    var data=JSON.parse(prev_data);

    var exchange_rate=data.exchange_rate;
    var currency=data.currency;

    var weeks=document.getElementById("weeks").value;
    alert(id);
    $.get("getAdTypes.php?id="+id,function(data){
        var returned=JSON.parse(data);
        // console.log(returned);
      var final_budget=returned[0].cost_per_week*exchange_rate*weeks;
      var output=currencyFormat(final_budget,currency);
      var per_week_output=currencyFormat(returned[0].cost_per_week*exchange_rate,currency);
       $('#budeget_option')
      .find('option')
      .remove()
      .end()
      .append('<option id="per_week_budget" value="'+returned[0].cost_per_week*exchange_rate+'">'+per_week_output+'</option>')
      .val(''+final_budget+'');
      document.getElementById("total_budget").innerHTML=output;
      document.getElementById("total_advert_cost").value=currencyFormatNoSymbol(final_budget);

      $("#bidding_for_ad").html("");

      if(returned[0].billed_places.length >0){
        for (var i = 0;i<returned[0].billed_places.length;i++) {
          var cost=returned[0].billed_places[i].cost_per_week;
          var ky="nd";
          var counter= i+1;

          if(counter==1){
            ky="st";
          }else if(counter==3){
            ky="rd";
          }else if(counter==4){
            ky="th";
          }
          var position = counter+" "+ky;

          $("#bidding_for_ad").append("<h6>"+
                                  "<span class='boldtext'>"+position+" place at </span>"+
                                  "<span style='font-weight:lighter;'>"+cost+"</span>"+
                                   "<span style='color:#AAAAAA;'> per week</span>"+
                                 "</h6>");
        }
     }

    });
  }

  function adBudgetSelectBack(id,cost_per_week,weeks){

    var prev_data=window.localStorage.getItem("search_for_advert_account_data");
    var data=JSON.parse(prev_data);

    var exchange_rate=data.exchange_rate;
    var currency=data.currency;

    // var weeks=document.getElementById("weeks").value;
    // alert(id);
    $.get("getAdTypes.php?id="+id,function(data){
        var returned=JSON.parse(data);
        // console.log(returned);
      var final_budget=cost_per_week*weeks;
      var output=currencyFormat(final_budget,currency);
      var per_week_output=currencyFormat(returned[0].cost_per_week*exchange_rate,currency);
       $('#budeget_option')
      .find('option')
      .remove()
      .end()
      .append('<option id="per_week_budget" value="'+returned[0].cost_per_week*exchange_rate+'">'+per_week_output+'</option>')
      .val(''+final_budget+'');
      document.getElementById("total_budget").innerHTML=output;
      document.getElementById("weeks").value=weeks;
      document.getElementById("total_advert_cost").value=currencyFormatNoSymbol(final_budget);

      $("#bidding_for_ad").html("");

      if(returned[0].billed_places.length >0){
        for (var i = 0;i<returned[0].billed_places.length;i++) {
          var cost=returned[0].billed_places[i].cost_per_week;
          var ky="nd";
          var counter= i+1;

          if(counter==1){
            ky="st";
          }else if(counter==3){
            ky="rd";
          }else if(counter==4){
            ky="th";
          }
          var position = counter+" "+ky;

          $("#bidding_for_ad").append("<h6>"+
                                  "<span class='boldtext'>"+position+" place at </span>"+
                                  "<span style='font-weight:lighter;'>"+cost+"</span>"+
                                   "<span style='color:#AAAAAA;'> per week</span>"+
                                 "</h6>");
        }
     }

    });
  }


  function week_budget_calc(weekls){
    var prev_data=window.localStorage.getItem("search_for_advert_account_data");
    var data=JSON.parse(prev_data);
    
    var currency=data.currency;

    var total_per_week =0;

    var budeget_option=document.getElementById("budeget_option").value;
    var final_budget_set=document.getElementById("final_budget_set").value;
    
    if (final_budget_set =="") {
      total_per_week=budeget_option;
    }else{
      total_per_week=final_budget_set;
    }

    var total=weekls*total_per_week;
    var output=currencyFormat(total,currency);
    document.getElementById("total_budget").innerHTML=output;
    document.getElementById("total_advert_cost").value=currencyFormatNoSymbol(total);   

  }


  function new_folder(command){

    if (command=="new_folder") {

      $("#folder_creation").html('<div class="row top10" >'+
                          '<div class="col-md-3 ">'+                           
                            '<label class="pull-right"></label>'+
                              '<div id="bis_id"></div>'+
                          '</div>'+
                          '<div class="col-md-4 ">'+
                            '<input type="text" name="created_folder" id="new_folder_name" class="form-control noborder_radius" placeholder="Type Folder name here"/>'+
                                                     
                          '</div>'+
                          '<div class="col-md-1 ">'+
                           
                          '</div>'+
                          '<div class="col-md-1 ">'+
                             
                          '</div>'+
                          '<div class="col-md-1 "></div>'+
                        '</div>');

    }else{
       $("#folder_creation").html("");
    }
  }

  function search_for_advert_account_continue(){

    $("#load_status").html("<img src='../../../admin/Theme/uploads/loader2.gif' style='width:30px;height:30px;'/>");
     var exchange_rate=0;
     var new_folder_name="";
     // var check_page_state=window.localStorage.getItem("search_for_advert_account_state");
     // var acc_data=JSON.parse(check_page_state);     
     
    var business_name=document.getElementById("search-box").value;
    var business_id=document.getElementById("business_id").value;
    var folder_name=document.getElementById("folder_option").value;

    var currency=document.getElementById("currency").value;
    var account_country=document.getElementById("account_country").value;
    var timezone=document.getElementById("timezone").value;
    var agent_code=document.getElementById("agent_code").value;
    // window.localStorage.setItem("new_folder_name",new_folder_name);   

    if (business_name=="") {
      alert("Please search any business");
      exit();
    }
    if(folder_name=="new_folder"){
       var state=localStorage.getItem("search_for_advert_account");

        new_folder_name=document.getElementById("new_folder_name").value;        
    }   

    var search_for_advert_account_data={"new_folder_name":new_folder_name,"business_name":business_name,"business_id":business_id,"folder_name":folder_name,"currency":currency,"account_country":account_country,"timezone":timezone,"agent_code":agent_code};
    
    
     storeNextPage_state("budget_schedule_data","budget_schedule_state");

    if(currency=="USD"){
      exchange_rate=1;
      
      search_for_advert_account_data.exchange_rate= exchange_rate;
      localStorage.setItem("search_for_advert_account_data",JSON.stringify(search_for_advert_account_data));

      window.location="budget_schedule.php";

    }else{ //query the server for the exchange rate
 
      $.get("check_exchange_rate.php?currency="+currency,function(data){

        var returned = JSON.parse(data);
        exchange_rate=returned.currency;

        search_for_advert_account_data.exchange_rate= exchange_rate;
        localStorage.setItem("search_for_advert_account_data",JSON.stringify(search_for_advert_account_data));
        
        window.location="budget_schedule.php";
      });
      
    }

  }

  function storeNextPage_state(dataTerm,stateTerm){
    var CheckNextPageData=localStorage.getItem(dataTerm);

    // if(JSON.stringify(CheckNextPageData) === '{}') {
    //   localStorage.setItem(stateTerm,"forward");
    // }else{
    //   localStorage.setItem(stateTerm,"back");
    // }
    localStorage.setItem(stateTerm,"forward");
  }

  function buget_schedule_continue(url){
    // cost_per_week
    // final_budget_set
    $("#load_status").html("<img src='../../../../admin/Theme/uploads/loader2.gif' style='width:30px;height:30px;'/>");
    var city_list = new Array();
    var country_list = new Array();
    var city_list_ids= new Array();
    var country_list_ids= new Array();

    var category_list_ids= new Array();

    var sub_category_list = new Array();

    var sub_category_list_ids= new Array();

    var category_list = new Array();

    var budget_schedule_array= new Array();

    var min_age = $("#min_age").val();
    var max_age = $("#max_age").val();
    var gender= $("#active_gender_item").val();
    var ad_choice = $("#ad_budget_choice").val();
    var weeks= $("#weeks").val();
    // var total_advert_cost= $("#total_advert_cost").val();
    var cost_per_week=document.getElementById("budeget_option").value;

    var final_budget_set=document.getElementById("final_budget_set").value;
    // document.getElementById("total_advert_cost").value
    // alert("Ad choice"+ad_choice);
    // var budget="";
    var own_budget="";

    if(final_budget_set !=""){
      cost_per_week=final_budget_set;
      own_budget="yes";
    }

    var total_advert_cost=cost_per_week*weeks;
    // if (ad_choice==19.99) {
    //   budget="Desktop_Right_Hand_slide";
    // }else if (ad_choice==11.99) {
    //   budget="Mobile_Slide";
    // }if (ad_choice==9.99) {
    //   budget="Desktop_before_Login"
    // }if (ad_choice==14.99) {
    //   budget="Newsfeed";
    // }if (ad_choice==17.99) {
    //   budget="Search_engine";
    // }

    $('.city_item').each(function(){ //getting a list of selected cities
       city_list.push($(this).text());
      
    });

    $('.city_list_ids').each(function(){ //getting a list of selected cities
       city_list_ids.push($(this).text());
      
    });

    $('.country_item').each(function(){ //getting a list of selected countries
       country_list.push($(this).text());
    });

    $('.country_list_ids').each(function(){ //getting a list of selected cities
       country_list_ids.push($(this).text());
      
    });
    
    $('.category_item').each(function(){ //getting a list of selected categories
       category_list.push($(this).text());
      
    });

    $('.category_list_ids').each(function(){ //getting a list of selected cities
       category_list_ids.push($(this).text());
      
    });

    $('.sub_category_item').each(function(){ //Getting a list of selected sub categories
       sub_category_list.push($(this).text());
    });

     $('.sub_category_list_ids').each(function(){ //getting a list of selected cities
       sub_category_list_ids.push($(this).text());
      
    });

      var list = {city_list:city_list_ids,city_list_names:city_list,country_list:country_list_ids,country_list_names:country_list,min_age:min_age,max_age:max_age,gender:gender,category_list:category_list_ids,category_list_names:category_list,sub_category_list:sub_category_list_ids,sub_category_list_names:sub_category_list,ad_placement_budget:ad_choice,weeks:weeks,total_advert_cost:total_advert_cost,cost_per_week:cost_per_week,own_budget:own_budget};
     
      localStorage.setItem("budget_schedule_data",JSON.stringify(list));
      // localStorage.setItem("media_text_state","forward");

      $.get("getAdTypes.php?id="+ad_choice,function(data){

        var real_data=JSON.parse(data);
        // console.log(data);
        // alert(real_data[0].name);
        if (real_data[0].name=="Search engine Ad (Highly Recommended)") {
          localStorage.setItem("search_engine_ad_type","yes");
          window.location="payment_method.php";
        }else{
          storeNextPage_state("media_text_data","media_text_state");
          localStorage.setItem("search_engine_ad_type","");
          window.location="media_text.php";
        }
      });

      // Search engine Ad (Highly Recommended)

      // storeNextPage_state("media_text_data","media_text_state");
      
      // window.location="media_text.php";
      // console.log(list);
      
  }


  function budget_schedule_load(){

    
    var prev_data=window.localStorage.getItem("search_for_advert_account_data");

    var data=JSON.parse(prev_data);
    var exchange_rate=data.exchange_rate;
   
    var currency=data.currency;
    
    var page_state=window.localStorage.getItem("budget_schedule_state");
    alert(page_state);
    if (page_state=="forward") {

      activeGender("All");

      $.get("getAdTypes.php?id=",function(data){
        var returned=JSON.parse(data);
        // console.log(returned);
        $("#desktop_right_hand").html(currencyFormat(exchange_rate*returned[0].cost_per_week,currency));
        $("#mobile_slide").html(currencyFormat(exchange_rate*returned[3].cost_per_week,currency));
        $("#desktop_before_login").html(currencyFormat(exchange_rate*returned[4].cost_per_week,currency));
        $("#newsfeeds_ad").html(currencyFormat(exchange_rate*returned[2].cost_per_week,currency));
        $("#search_engine_ad").html(currencyFormat(exchange_rate*returned[1].cost_per_week,currency));
        $("#total_budget").html(currencyFormat(exchange_rate*returned[0].cost_per_week,currency));
        $("#total_advert_cost").val(currencyFormatNoSymbol(exchange_rate*returned[0].cost_per_week));

        $("#Desktop_Right").val(returned[0].id);
        $("#Mobile_Side").val(returned[3].id);
        $("#Desktop_Advertising_Login").val(returned[4].id);
        $("#News_feed").val(returned[2].id);
        $("#Search_engine").val(returned[1].id);

        // $("#budeget_option").val('<option value="'+returned[0].cost_per_week+'">'+currencyFormat(exchange_rate*returned[0].cost_per_week,currency)+'</option>');

        $('#budeget_option')
        .find('option')
        .remove()
        .end()
        .append('<option id="per_week_budget" value="'+returned[0].cost_per_week*exchange_rate+'">'+currencyFormat(exchange_rate*returned[0].cost_per_week,currency)+'</option>')
        .val(''+currencyFormat(exchange_rate*returned[0].cost_per_week,currency)+'');

        //Storing ads info for later reference
        var adsdata={desktop_right_hand:currencyFormat(exchange_rate*returned[0].cost_per_week,currency),
          mobile_slide:currencyFormat(exchange_rate*returned[3].cost_per_week,currency),desktop_before_login:currencyFormat(exchange_rate*returned[4].cost_per_week,currency),
          newsfeeds_ad:currencyFormat(exchange_rate*returned[2].cost_per_week,currency),search_engine_ad:currencyFormat(exchange_rate*returned[1].cost_per_week,currency),
          Desktop_Right:returned[0].id,Mobile_Side:returned[3].id,Desktop_Advertising_Login:returned[4].id,News_feed:returned[2].id,
          Search_engine:returned[1].id
        };

        var adsFinalStored=JSON.stringify(adsdata);
        localStorage.setItem("ads_info",adsFinalStored);
      });
      
    // }else if (page_state=="back"){
       }else{
        var ads_info=JSON.parse(localStorage.getItem("ads_info"));
        // console.log("Ads info"+ads_info.desktop_right_hand);

        var prev_selected_data=window.localStorage.getItem("budget_schedule_data");     
        var data=JSON.parse(prev_selected_data);
        // console.log(data);
        var min_age=data.min_age;
        var max_age=data.max_age;
        var gender=data.gender;
        var own_budget=data.own_budget;
        // alert(min_age);
        var ad_placement_budget=data.ad_placement_budget;
        var weeks=weeks;
        var total_advert_cost=data.total_advert_cost;

        activeGender(data.gender);

        if (own_budget=="yes") {
          $("#final_budget_set").val(data.cost_per_week);
        }

        // $("#total_budget").html(currencyFormat(total_advert_cost,currency));
        // document.getElementById("total_budget").innerHTML=total_advert_cost;

        $('#budeget_option')
        .find('option')
        .remove()
        .end()
        .append('<option id="per_week_budget" value="'+data.cost_per_week*exchange_rate+'">'+currencyFormat(exchange_rate*data.cost_per_week,currency)+'</option>')
        .val(''+currencyFormat(exchange_rate*data.cost_per_week,currency)+'');

      //Filling previously selected city names list

      for (var i=0; i < data.city_list_names.length; i++){
        $("#country_list").append("<div class='city_item'>"+data.city_list_names[i]+"</div>");
      }

      // Filling previously selected country names list
      for (var i=0; i < data.country_list_names.length; i++){       
        $("#country_list").append("<div class='country_item'>"+data.country_list_names[i]+"</div>");
      }

      //Filling previously selected sub category names list

      for (var i=0; i < data.sub_category_list_names.length; i++){
        $("#category_list").append("<div class='sub_category_item'>"+data.sub_category_list_names[i]+"</div>");
      }

      //Filling previously selected category names list

      for (var i=0; i < data.category_list_names.length; i++){
        $("#category_list").append("<div class='category_item'>"+data.category_list_names[i]+"</div>");
      }

      //Filling previously selected category Ids
      for (var i=0; i < data.category_list.length; i++){
        $("#category_list_ids").append("<div class='category_list_ids'>"+data.category_list[i]+"</div>");
      }

      //Filling previously selected sub category Ids
      for (var i=0; i < data.sub_category_list.length; i++){
        $("#subCategory_list_ids").append("<div class='sub_category_list_ids'>"+data.sub_category_list[i]+"</div>");
      }

      //Filling previously selected city Ids
      for (var i=0; i < data.city_list.length; i++){
        $("#city_list_ids").append("<div class='city_list_ids'>"+data.city_list[i]+"</div>");
      }

       //Filling previously selected Country Ids
      for (var i=0; i < data.country_list.length; i++){
        $("#country_list_ids").append("<div class='country_list_ids'>"+data.country_list[i]+"</div>");
      }

      // alert(data.ad_placement_budget);
      $("#min_age").val(data.min_age);
      $("#max_age").val(data.max_age);


      $("#desktop_right_hand").html(ads_info.desktop_right_hand);
      $("#mobile_slide").html(ads_info.mobile_slide);
      $("#desktop_before_login").html(ads_info.desktop_before_login);
      $("#newsfeeds_ad").html(ads_info.newsfeeds_ad);
      $("#search_engine_ad").html(ads_info.search_engine_ad);
      // $("#total_budget").html(ads_info.total_budget);
      // $("#total_advert_cost").val(currencyFormatNoSymbol(exchange_rate*returned[0].cost_per_week));

      $("#Desktop_Right").val(ads_info.Desktop_Right);
      $("#Mobile_Side").val(ads_info.Mobile_Side);
      $("#Desktop_Advertising_Login").val(ads_info.Desktop_Advertising_Login);
      $("#News_feed").val(ads_info.News_feed);
      $("#Search_engine").val(ads_info.Search_engine);

      // alert("data.ad_placement_budget"+data.ad_placement_budget);
       // $("#ad_budget_choice").prepend("<option>Nomis Wilson</option>");
      // adBudgetSelect(data.ad_placement_budget);
      // $("#total_budget").html(currencyFormat(total_advert_cost,currency));
      adBudgetSelectBack(data.ad_placement_budget,data.cost_per_week,data.weeks)
      
    }
  }

  function currencyFormat(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }

  function currencyFormatNoSymbol(n) {
    return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
  }

  function activeGender(item){
    
    var Active_style = {backgroundColor : "#BE2633",color: "#ffffff"};
    var Other_style = {backgroundColor : "#ffffff",color: "#5A5A5A"};

    if(item=="All"){    
       
        $('#female').css(Other_style);
        $('#male').css(Other_style);
        $('#all').css(Active_style);

    }else if(item=="Male"){
     
       $('#all').css(Other_style);
        $('#female').css(Other_style);
        $('#male').css(Active_style);
    }else if(item=="Female"){
      
       $('#all').css(Other_style);
        $('#female').css(Active_style);
        $('#male').css(Other_style);
    }

    // document.getElementById("active_gender_item").value=item;
    $("#active_gender_item").val(item);
  }

  function advert_type_selected(id){ 
    var prev_data=window.localStorage.getItem("search_for_advert_account_data");

    var data=JSON.parse(prev_data);
    var exchange_rate=data.exchange_rate;
    // alert(id);
    var currency= data.currency;
    // var exchange_rate= window.localStorage.getItem("exchange_rate");
    var weeks=document.getElementById("weeks").value; 
     $.get("getAdTypes.php?id="+id,function(data){
        var returned=JSON.parse(data);
        // console.log(returned);
        // console.log(returned[0].billed_places[0].cost_per_week);
        $("#bidding_for_ad").html("");

        if(returned[0].billed_places.length >0){
          for (var i = 0;i<returned[0].billed_places.length;i++) {
            var cost=returned[0].billed_places[i].cost_per_week;
            var ky="nd";
            var counter= i+1;

            if(counter==1){
              ky="st";
            }else if(counter==3){
              ky="rd";
            }else if(counter==4){
              ky="th";
            }
            var position = counter+" "+ky;

            $("#bidding_for_ad").append("<h6>"+
              "<span class='boldtext'>"+position+" place at </span>"+
              "<span style='font-weight:lighter;'>"+cost+"</span>"+
               "<span style='color:#AAAAAA;'> per week</span>"+
             "</h6>");
          }
       }

        // document.getElementById("ad_budget_choice").value=returned[0].id;
        $("#ad_budget_choice").append("<option value='"+returned[0].id+"'>"+returned[0].name+"</optio>"); 
        $("#ad_budget_choice").val(returned[0].id);   
        document.getElementById("budeget_option").innerHTML="<option value='"+exchange_rate*returned[0].cost_per_week+"'>"+currencyFormat(exchange_rate*returned[0].cost_per_week,currency)+"</option>";
        document.getElementById("total_budget").innerHTML=currencyFormat(exchange_rate*returned[0].cost_per_week*weeks,currency);
        document.getElementById("total_advert_cost").value=currencyFormatNoSymbol(exchange_rate*returned[0].cost_per_week*weeks); 

    });
     
  }


  function test_media_text_data_load(){
      var prev_page_data=window.localStorage.getItem("search_for_advert_account_data");
      // console.log(prev_page_data);
      var data=JSON.parse(prev_page_data);
      // alert(data.city_list[1]);
      $("#business_name_field").html(data.business_name);
      
  }

  function setBill(amount){

    var min_week_amount=$("#budeget_option").val();
    var prev_data=window.localStorage.getItem("search_for_advert_account_data");
    var data=JSON.parse(prev_data);    
    var currency=data.currency;
    var min=$("#budeget_option").html();

    if (amount<min_week_amount) {
      $("#alert_message").html("Sorry, minimum budget amount is: <b>"+currency+" "+min_week_amount+"</b>");
     
      document.getElementById("final_budget_set").value="";
    }else{    
      $("#alert_message").html("");
      var weeks=$("#weeks").val();
      var total_bill=amount*weeks;
      
      $("#total_budget").html(currencyFormat(total_bill,currency));

      var type_id=document.getElementById("ad_budget_choice").value;
      $.get("getAdTypes.php?id="+type_id,function(data){
        var returned=JSON.parse(data);
        // console.log(returned);
        // console.log(returned[0].billed_places[0].cost_per_week);
        $("#bidding_for_ad").html("");

        if(returned[0].billed_places.length >0){
          for (var i = 0;i<returned[0].billed_places.length;i++) {
            var cost=returned[0].billed_places[i].cost_per_week;
            var ky="nd";
            var counter= i+1;

            if(counter==1){
              ky="st";
            }else if(counter==3){
              ky="rd";
            }else if(counter==4){
              ky="th";
            }
            var position = counter+" "+ky;

            if (amount > cost) {

              $("#bidding_for_ad").append("<h6 >"+
              "<span class='boldtext' style='color:#3352254;'> You at </span>"+
              "<span style='font-weight:lighter;color:#3352254;'>"+amount+"</span>"+
               "<span style='color:#AAAAAA;color:#3352254;'> per week</span>"+
             "</h6>");

            }else if(amount == cost){

              $("#bidding_for_ad").append("<h6 >"+
              "<span class='boldtext' style='color:#3352254;'> You at </span>"+
              "<span style='font-weight:lighter;color:#3352254;'>"+amount+"</span>"+
               "<span style='color:#AAAAAA;color:#3352254;'> per week</span>"+
             "</h6>");
              
            }else{

            $("#bidding_for_ad").append("<h6>"+
              "<span class='boldtext'>"+position+" place at </span>"+
              "<span style='font-weight:lighter;'>"+cost+"</span>"+
               "<span style='color:#AAAAAA;'> per week</span>"+
             "</h6>");
            }
          }
        }
      });
    }
  }

  function feedHeadline(text){
    $("#headline_preview").html(text);
  }

  function feedDescription(text){
    $("#description_preview").html(text);
  }

  function CallToAction(text){

      
    
    if (text=="no_action") {
      $("#action_button").html("");
    }else{
      
      $("#call_actions").val("");
      $.get("getCallToaction.php?id="+text,function(response){
        var data=JSON.parse(response);
        for (var i =0; i <data.length; i++) {
        
          $('#action_button').html('<div class="badge badge-default pull-right top10" style="border-radius:4px;height:20px;color:#4F4F4F;background-color:#CFCFCF;">'+data[i].name+'</div>');
        }
      });  

    }
  }

  function Media_text_continue(){
     $("#load_status").html("<img src='../../../admin/Theme/uploads/loader2.gif' style='width:30px;height:30px;'/>"); 

     var state=localStorage.getItem("media_text_state");
     var checkImage=document.getElementById("inputfile").value;

       $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({

          url: "store_advert_image.php",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
              cache: false,
          processData:false,
          success: function(data)
            {
              var link="";
              if(state == "back" && checkImage == ""){
                var thisData=JSON.parse(localStorage.getItem("media_text_data"));
                var link=thisData.advert_photo_link;
              }else{
                var url=JSON.parse(data);
                var link=url.url;
              }              

              // console.log(link.url);
              var headline= document.getElementById("headline").value;
              var description= document.getElementById("description").value;
              var CallToAction= document.getElementById("act_call").value;

              var thisPageDataObject={"headline":headline,"description":description,"CallToAction":CallToAction,"advert_photo_link":link}

              localStorage.setItem("media_text_data",JSON.stringify(thisPageDataObject));
              localStorage.setItem("payment_method_state","forward");
              window.location="payment_method.php";

            },
            error: function() 
            {
            }
                       
         });

      }));
    // }

  }

  function populateTeam(branchId,departmentId){
  
    $.get("populateTeam.php?branchId="+branchId+"&departmentId="+departmentId,function(data){
      var data=JSON.parse(data);

      var options = $("#team");

      $('#team option').remove();

      if(data.length >0){
        $.each(data, function() {
          // last_name
            options.append($("<option />").val(this.admin_id).text(this.first_name));
        });
      }else{
        options.append($("<option />").val("").text("No Team"));
      }
    });
  }

  // function createAdmin(){
    
  //      $("#uploadForm").on('submit',(function(e) {

  //       e.preventDefault();

  //       $("#load_status").html("<img src='../../../admin/Theme/uploads/loader2.gif' style='width:30px;height:30px;'/>"); 

  //       $.ajax({

  //         url: "createAdmin.php",
  //         type: "POST",
  //         data:  new FormData(this),
  //         contentType: false,
  //             cache: false,
  //         processData:false,
  //         success: function(data)
  //           {

  //             $("#load_status").html("");
  //           var dat=JSON.parse(data);
  //           alert("User Company Id is "+dat.response);

  //           console.log(data);

  //           },
  //           error: function() 
  //           {
  //           }
                       
  //        });

  //     }));
    
  // }

  function media_text_load(){
// getCallToaction.php
    var pageState=localStorage.getItem("media_text_state");
    alert(pageState);

    if(pageState=="back"){
      var data=JSON.parse(localStorage.getItem("media_text_data"));
      // console.log(data);
      $('#logo2')
        .attr('src', data.advert_photo_link)
        .width(280)
        .height(140); 

      $('#post_img')
        .attr('src', data.advert_photo_link)
        .width("100%")
        .height(200)

      $("#headline").val(data.headline);
      $("#description").val(data.description);

      $("#description_preview").html(data.description);
      $("#headline_preview").html(data.headline);
      $("#act_call").val(data.CallToAction);
      $("#action_button").html('<div class="badge badge-default top10" style="border-radius:4px;height:20px;color:#4F4F4F;background-color:#CFCFCF;">'+data.CallToAction+'</div>');
    }

  }

  function disable_doubleFormSubmit(formId){
    var form = document.getElementById(formId);
      form.onsubmit = function(){
        form.reset();
      }
  }

  function Objective(obj){

    var state=localStorage.getItem("ad_objective_state");
    // alert(state);
    window.localStorage.setItem("ad_objective_data",obj);
    localStorage.setItem("final_submit","false");
   
    storeNextPage_state("search_for_advert_account_data","search_for_advert_account_state");        
    window.location="search_for_advert_account.php";
  }


  function payment_method_load(){
    var media_text_data=localStorage.getItem("media_text_data");
    // console.log("media_text_data is: "+media_text_data);

    var budget_schedule_data=localStorage.getItem("budget_schedule_data");
    // console.log("budget_schedule_data is: "+budget_schedule_data);

    var search_for_advert_account_data=localStorage.getItem("search_for_advert_account_data");
    // console.log("search_for_advert_account_data is: "+search_for_advert_account_data);

    
    var ad_acc_data=JSON.parse(search_for_advert_account_data);

    var prev_data=localStorage.getItem("budget_schedule_data");
    var data=JSON.parse(prev_data);

    $("#total_cost").html("Total Cost: "+ad_acc_data.currency+" "+currencyFormatNoSymbol(data.total_advert_cost));
    $("#total_value").html("&nbsp;&nbsp;"+ad_acc_data.currency+" "+currencyFormatNoSymbol(data.total_advert_cost));

  }

  function Ad_placement_complete(){  
    
    // var posted=document.getElementById("dcd").value;
    var posted=localStorage.getItem("final_submit");
    if(posted=="false"){
      $("#success_comp_message").html("<img src='../../../admin/Theme/uploads/loader2.gif' style='width:30px;height:30px;'/>");

      var search_for_advert_account_data=localStorage.getItem("search_for_advert_account_data");
      var ad_acc_data=JSON.parse(search_for_advert_account_data);    

      var budget_schedule_data=localStorage.getItem("budget_schedule_data");
      var schedule_data=JSON.parse(budget_schedule_data);
      // 
      var search_engine_ad_type=localStorage.getItem("search_engine_ad_type");

      var add_title="";
      var add_description="";
      var ad_url="";
      var call_to_action_id="";

      if (search_engine_ad_type=="yes") {
        add_title="";
        add_description="";
        ad_url="";
        call_to_action_id="";
      }else{

        media_text_data=localStorage.getItem("media_text_data");
        media_data=JSON.parse(media_text_data);

        add_title=media_data.headline;
        add_description=media_data.description;

        ad_url=media_data.advert_photo_link;
        call_to_action_id=media_data.CallToAction;
      }

      var add_type_id=schedule_data.ad_placement_budget;
      
      var min_age=schedule_data.min_age;

      var max_age=schedule_data.max_age;
      
      var cost_per_week=schedule_data.cost_per_week;
      
      var gender=schedule_data.gender;

      var currency=ad_acc_data.currency;

      var timezone=ad_acc_data.timezone;

      var account_country=ad_acc_data.account_country;

      // var marketing_agent_code=search_for_advert_account_data.marketing_agent_code;

      var folder_name=ad_acc_data.folder_name;

      var new_folder_name=ad_acc_data.new_folder_name;      

      var no_of_weeks=schedule_data.weeks;
      var ex_rate=ad_acc_data.exchange_rate;

      var total_budget_cost=schedule_data.total_advert_cost/ex_rate;

      var business_id=ad_acc_data.business_id;      

      var cities=JSON.stringify(schedule_data.city_list);

      var countries=JSON.stringify(schedule_data.country_list);

      var category=JSON.stringify(schedule_data.category_list);

      var subCategory=JSON.stringify(schedule_data.sub_category_list);


      $.get("AddAdvert.php?add_type_id="+add_type_id+"&add_title="+add_title+"&min_age="+min_age+"&max_age="+max_age+
        "&add_description="+add_description+"&ad_url="+ad_url+"&gender="+gender+"&currency="+currency+
        "&timezone="+timezone+"&account_country="+account_country+"&folder_name="+folder_name+
        "&new_folder_name="+new_folder_name+"&call_to_action_id="+call_to_action_id+"&no_of_weeks="+no_of_weeks+
        "&total_budget_cost="+total_budget_cost+"&business_id="+business_id+"&city_list="+cities+
        "&countries_list="+countries+"&category="+category+"&subCategory="+subCategory+"&agent_code="+ad_acc_data.agent_code+"&cost_per_week="+cost_per_week+"&exchange_rate="+ex_rate,function(data){
          
        localStorage.setItem("final_submit","true");

        localStorage.removeItem("search_for_advert_account_data");
        localStorage.removeItem("media_text_data");
        localStorage.removeItem("budget_schedule_data");
        localStorage.removeItem("ad_objective_data");

        localStorage.removeItem("search_for_advert_account_state");
        localStorage.removeItem("media_text_state");
        localStorage.removeItem("budget_schedule_state");
        localStorage.removeItem("payment_method_state");

        localStorage.removeItem("ad_objective_state");
        localStorage.removeItem("ads_info");

        $("#success_comp_message").html("Advert successfully registered");
      });
    }else{
      $("#success_comp_message").html("The advert is already registered");
    }

  }

  function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=941px,width=595px');
        mywindow.document.write('<html><head><title>Yammzit Business Claim Approval Letter</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('<link href="ionicons-2.0.1/css/ionicons.css" rel="stylesheet">');
        mywindow.document.write('<link href="assets/css/bootstrap.css" rel="stylesheet">');
        // mywindow.document.write('<link href="assets/css/style.css" rel="stylesheet">');

        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

    function TotalWeeklyAfterCommisionBar(country_code,status) {
        var today_info=JSON.parse(localStorage.getItem("today_info"));
        $("#TotalWeeklyAfterCommisionBarDate").html(today_info.month+" "+today_info.year);

        $.get("weekly_finance_graphData.php?data=TotalAfterCommission&status="+status+"&country_code="+country_code,function(data){
          
          var data =JSON.parse(data);
          CanvasJS.addColorSet("greenShades",data.color); //Adding colors to the data graphs
          
          var chart = new CanvasJS.Chart("TotalWeeklyAfterCommision", {

            colorSet: "greenShades",
            backgroundColor: "#2A2A2A",
            animationEnabled: true,
            axisY:{
              title: "Total After commision $",
              gridColor:"#353535",
              lineColor:"#2A2A2A",
             
              tickLength:0,
              interval:data.interval         
            },
            axisX: {          
              lineColor:"#353535",
              labelFontSize:10
            },
            dataPointWidth: 30,
            data: [{
              type: "column",
              indexLabelLineThickness: 2,
              dataPoints:data.data
            }]

          });
          chart.render();

      });

    }

    function TotalWeeklyAdIncomeReceivedBar(country_code,status) {
        
        $.get("weekly_finance_graphData.php?data=totalAmountReceived&status="+status+"&country_code="+country_code,function(data){
          
          var data =JSON.parse(data);
          CanvasJS.addColorSet("greenShades",data.color); //Adding colors to the data graphs

      // CanvasJS.addColorSet("greenShades",
      //           [

      //           "#BD2532",
      //           "#5390E9",
      //           "#BD2532",
      //           "#5390E9",
      //           "#BD2532",
      //           "#5390E9",
      //           "#5390E9"              
      //           ]);
      var chart = new CanvasJS.Chart("TotalWeeklyAdIncomeReceived", {


        // title: {
        //   text: "Weekly total After commision"
        // },

        colorSet: "greenShades",
        backgroundColor: "#2A2A2A",
        animationEnabled: true,
        axisY:{
          title: "Amount Received $",
          gridColor:"#353535",
          lineColor:"#2A2A2A",
          // tickColor:"green"
          tickLength:0,
          interval:data.interval        
        },
        axisX: {          
          lineColor:"#353535",
          labelFontSize:10
        },
        dataPointWidth: 40,
        data: [{
          type: "column",
          indexLabelLineThickness: 2,
          dataPoints: data.data
        }]
      });
      chart.render();
      });
    }

    function TotalWeeklyCommisionPaidOutBar(country_code,status) {

      $.get("weekly_finance_graphData.php?data=TotalCommissionPaidOut&status="+status+"&country_code="+country_code,function(data){
        
        var data =JSON.parse(data);
        CanvasJS.addColorSet("greenShades",data.color); //Adding colors to the data graphs

      // console.log(data);
        var chart = new CanvasJS.Chart("TotalWeeklyCommisionPaidOut", {


          // title: {
          //   text: "Weekly total After commision"
          // },

          colorSet: "greenShades",
          backgroundColor: "#2A2A2A",
          animationEnabled: true,
          axisY:{
            title: "Total Commission paid out $",
            gridColor:"#353535",
            lineColor:"#2A2A2A",
            // tickColor:"green"
            tickLength:0,
            interval:data.interval         
          },
          axisX: {          
            lineColor:"#353535",
            labelFontSize:10
          },
          dataPointWidth: 30,
          data: [{
            type: "column",
            indexLabelLineThickness: 2,
            dataPoints:data.data
          }]
        });
        chart.render();
      });
    }

    function TotalWeeklyCommisionBar() {

      CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#BD2532",
                "#5390E9",
                "#BD2532",
                "#5390E9",
                "#BD2532",
                "#5390E9",
                "#5390E9"              
                ]);
      var chart = new CanvasJS.Chart("TotalWeeklyCommision", {


        // title: {
        //   text: "Weekly total After commision"
        // },

        colorSet: "greenShades",
        backgroundColor: "#2A2A2A",
        animationEnabled: true,
        axisY:{
          title: "Total Commission Amount $",
          gridColor:"#353535",
          lineColor:"#2A2A2A",
          // tickColor:"green"
          tickLength:0,
          interval:50         
        },
        axisX: {          
          lineColor:"#353535"
        },
        dataPointWidth: 30,
        data: [{
          type: "column",
          indexLabelLineThickness: 2,
          dataPoints: [
              { label: "Mon", y: 230},
              { label: "Tue", y: 710},
              { label: "Wed", y: 380 },
              { label: "Thur", y: 567 },
              { label: "Fri", y: 280 },
              { label: "Sat", y: 507 },
              { label: "Sun", y: 680 }
             
          ]
        }]
      });
      chart.render();

    }


    function getMonthNetAdIncome(country_code,status,id_value,title_display){
      $.get("monthlyAdIncome.php?status="+status+"&country_code="+country_code+"&data="+id_value,function(data){
        $("#"+id_value).html('<p class="content_head" style="margin-left:20px;margin-right:20px;padding-top:10px;">'+title_display+'</p>'+
                                 '<div class="left8_per top_35_per">'+
                                   '&nbsp;&nbsp;&nbsp;&nbsp;<div class="ion ion-arrow-up-b arrow_green font90"></div>'+
                                   '<div class="arrow_green top_25" style="font-size:40px;margin-left:-5px;">'+RoundOff(data)+'%</div>'+
                                 '</div>');
      });
    }

    function WeeklyProfit(country_code,status,id_value){
      $.get("monthlyAdIncome.php?status="+status+"&country_code="+country_code+"&data="+id_value,function(data){
        $("#WeeklyProfit").html('<div class="col-md-1 col-lg-1 col-xl-1"><i class="arrow_red" style="font-size:22px;">'+RoundOff(data)+'%</i></div>'+
                                    '<div class="col-md-2 col-lg-2 col-xl-2">'+
                                      '<i class="ion ion-arrow-down-b arrow_red" style="margin-left:20px;font-size:60px;margin-top:-12px;"></i>'+
                                    '</div>');
      });
    }


     function yearlynetIncome(country_code,status,id_value){
      $.get("monthlyAdIncome.php?status="+status+"&country_code="+country_code+"&data="+id_value,function(data){
        $("#yearlynet").html('<div class="col-md-4 col-lg-4 col-xl-4"><i class="arrow_green" style="font-size:42px;">'+RoundOff(data)+'%</i></div>'+
                                      '<div class="col-md-2 col-lg-2 col-xl-2">'+
                                        '<i class="ion ion-arrow-up-b arrow_green" style="margin-left:35px;font-size:80px;margin-top:-12px;"></i>'+
                                      '</div>');
      });
    }


    function TotalMonthlyAfterCommissionLine(country_code,status) {
         var today_info=JSON.parse(localStorage.getItem("today_info"));
        $("#TotalMonthlyAfterCommissionLineDate").html(today_info.month+" "+today_info.year);

        $.get("monthly_finance_graphData.php?data=TotalAfterCommission&status="+status+"&country_code="+country_code,function(data){
          
            var data =JSON.parse(data);          
            CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

            var chart = new CanvasJS.Chart("TotalMonthlyAfterCommission", {
              backgroundColor: "#2A2A2A",
              colorSet: "linegraphshade",
              animationEnabled: true,
              axisX: {
                // interval: 10,
                gridColor:"#353535",
                lineColor:"#353535",
                labelFontSize:11        
              },
              axisY: {
                title: " Total After Commision %",
                // interval: 50,
                includeZero: false,
                gridColor:"#353535",
                lineColor:"#2A2A2A",
                tickLength:0,
                interval:data.scale
              },
              data: [{
                type: "line",                
                dataPoints: data.data
              }]
          });
          chart.render();
    });

    }

    function TotalMonthlyCommissionLine() {
        CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

        var chart = new CanvasJS.Chart("TotalMonthlyCommission", {
        backgroundColor: "#2A2A2A",
        colorSet: "linegraphshade",
        animationEnabled: true,
        axisX: {
          // interval: 10,
          gridColor:"#353535",
          lineColor:"#353535"         
        },
        axisY: {
          title: " Total Commision Amount %",
          interval: 10,
          includeZero: false,
          gridColor:"#353535",
          lineColor:"#2A2A2A",
          tickLength:0
        },
        data: [{
          type: "line",
          dataPoints: [
            { label: "Week 1", y: 45 },
            { label: "Week 2", y: 14 },
            { label: "Week 3", y: 20 },
            { label: "Week 4", y: 60 },
            { label: "Week 5", y: 50 },
            
          ]
        }]
      });
      chart.render();

    }

    function TotalMonthlyCommissionPaidOutLine(country_code,status) {
        
         $.get("monthly_finance_graphData.php?data=TotalCommissionPaidOut&status="+status+"&country_code="+country_code,function(data){
          
            var data =JSON.parse(data);          
            // CanvasJS.addColorSet("linegraphshade",["#71B37C"]);
          CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

          var chart = new CanvasJS.Chart("TotalMonthlyCommissionPaidOut", {
          backgroundColor: "#2A2A2A",
          colorSet: "linegraphshade",
          animationEnabled: true,
          axisX: {
            // interval: 10,
            gridColor:"#353535",
            lineColor:"#353535",
            labelFontSize:11        
          },
          axisY: {
            title: " Total Commision paid out %",
            interval: data.scale,
            includeZero: false,
            gridColor:"#353535",
            lineColor:"#2A2A2A",
            tickLength:0,
            labelFontSize:11
          },
          data: [{
            type: "line",
            dataPoints: data.data
          }]
        });
        chart.render();
      });
    }

    function TotalMonthlyAdsIncomeLine(country_code,status) {
     
      $.get("monthly_finance_graphData.php?data=totalAmountReceived&status="+status+"&country_code="+country_code,function(data){
          
          var data =JSON.parse(data);          

          CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

          var chart = new CanvasJS.Chart("TotalMonthlyAdsIncome", {
          backgroundColor: "#2A2A2A",
          colorSet: "linegraphshade",
          animationEnabled: true,
          axisX: {
            // interval: 10,
            gridColor:"#353535",
            lineColor:"#353535",
            labelFontSize:11         
          },
          axisY: {
            title: "Amount Received %",
            interval: data.scale,
            includeZero: false,
            gridColor:"#353535",
            lineColor:"#2A2A2A",
            tickLength:0
          },
          data: [{
            type: "line",
            dataPoints: data.data
          }]
        });
        chart.render();
      });
    }

    function TotalYearlyCommissionPaidOutLine(country_code,status) {

      $.get("yearly_finance_graphData.php?data=TotalCommissionPaidOut&status="+status+"&country_code="+country_code,function(data){
        
          var data =JSON.parse(data);

          CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

          var chart = new CanvasJS.Chart("TotalYearlyCommissionPaidOut", {
          backgroundColor: "#2A2A2A",
          colorSet: "linegraphshade",
          animationEnabled: true,
          axisX: {
            // interval: 10,
            interval: 1,
            gridColor:"#353535",
            lineColor:"#353535",
            labelFontSize:9         
          },
          axisY: {
            title: "Total Commision Paid Out $",
            interval: data.scale,
            includeZero: false,
            gridColor:"#353535",
            lineColor:"#2A2A2A",
            tickLength:0,
            
          },
          data: [{
            type: "line",
            dataPoints: data.data
          }]
        });
        chart.render();
      });
    }

    function TotalYearlyCommissionLine() {
        CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

      var chart = new CanvasJS.Chart("TotalYearlyCommission", {
        
        theme: "theme2",
        backgroundColor: "#2A2A2A",
        colorSet: "linegraphshade",
        animationEnabled: true,

        axisX: {
          valueFormatString: "MMM",
          interval: 1,
          intervalType: "month",
          gridColor:"#353535",
          lineColor:"#353535"
        },
        axisY: {
          title:"Total Commission Amount $",
          includeZero: false,
          gridColor:"#353535",
          lineColor:"#2A2A2A",
          tickLength:0

        },
        data: [{
          type: "line",
          //lineThickness: 3,
          dataPoints: [
          { x: new Date(2016, 00, 1), y: 10 },
          { x: new Date(2016, 01, 1), y: 90 },
          { x: new Date(2016, 02, 1), y: 50},
          // { x: new Date(2016, 02, 1), y: 520, indexLabel: "highest", markerColor: "#BD2532", markerType: "triangle" },
          { x: new Date(2016, 03, 1), y: 40 },
          { x: new Date(2016, 04, 1), y: 87 },
          { x: new Date(2016, 05, 1), y: 73 },
          { x: new Date(2016, 06, 1), y: 33 },
          { x: new Date(2016, 07, 1), y: 98 },
          { x: new Date(2016, 08, 1), y: 34},
          // { x: new Date(2016, 08, 1), y: 410, indexLabel: "lowest", markerColor: "DarkSlateGrey", markerType: "cross" },
          { x: new Date(2016, 09, 1), y: 99 },
          { x: new Date(2016, 10, 1), y: 82 },
          { x: new Date(2016, 11, 1), y: 77 }
          ]
        }
        ]
      });

      chart.render();
    }

    function TotalYeralyAfterCommissionLine(country_code,status){
      var today_info=JSON.parse(localStorage.getItem("today_info"));
      $("#TotalYeralyAfterCommissionLineDate").html(today_info.year);

      $.get("yearly_finance_graphData.php?data=TotalAfterCommission&status="+status+"&country_code="+country_code,function(data){
        
        var data =JSON.parse(data);
      
        CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

        var chart = new CanvasJS.Chart("TotalYeralyAfterCommission", {
          
          theme: "theme2",
          backgroundColor: "#2A2A2A",
          colorSet: "linegraphshade",
          animationEnabled: true,

          axisX: {
            valueFormatString: "MMM",
            interval: 1,
            intervalType: "month",
            gridColor:"#353535",
            lineColor:"#353535",
            labelFontSize:8
          },
          axisY: {
            title:"Total After Commision $",
            includeZero: false,
            gridColor:"#353535",
            lineColor:"#2A2A2A",
            tickLength:0,
            interval:data.scale

          },
          data: [{
            type: "line",
            //lineThickness: 3,
            dataPoints:data.data
            
          }
          ]
        });

        chart.render();
      });
    }

    function TotalYeralyAdsIncomeLine(country_code,status){

      $.get("yearly_finance_graphData.php?data=TotalAmountReceived&status="+status+"&country_code="+country_code,function(data){
        
        var data =JSON.parse(data);

        CanvasJS.addColorSet("linegraphshade",["#71B37C"]);

        var chart = new CanvasJS.Chart("TotalYeralyAdsIncome", {
          
          theme: "theme2",
          backgroundColor: "#2A2A2A",
          colorSet: "linegraphshade",
          animationEnabled: true,

          axisX: {
            valueFormatString: "MMM",
            interval: 1,
            intervalType: "month",
            gridColor:"#353535",
            lineColor:"#353535",
            labelFontSize:8
          },
          axisY: {
            title:"Amount Received $",
            includeZero: false,
            gridColor:"#353535",
            lineColor:"#2A2A2A",
            tickLength:0,
            interval:data.scale

          },
          data: [{
            type: "line",
            //lineThickness: 3,
            dataPoints: data.data
          }
          ]
        });

        chart.render();

      });
    }    


    function finance2RenderGraphs(status){
      // var status="all";
      StoreUserCurrentCountryCode();
      var country_code=localStorage.getItem("User_country_code");
      // var country_code="UG";

      getDayAccountableAdsDetails("2016-09-25 13:05","",status,"today","","",2,country_code);

      WeekyTotalAmountreceived("totalAmountReceived",status,country_code,"weekly_finances");

      WeekyTotalAmountreceived("TotalCommissionPaidOut",status,country_code,"weekly_finances_commission_paidOut");

      WeekyTotalAmountreceived("TotalAfterCommission",status,country_code,"weekly_finances_TotalAfterCommission");

      TotalWeeklyAdIncomeReceivedBar(country_code,status);
      TotalWeeklyCommisionPaidOutBar(country_code,status);
      TotalWeeklyAfterCommisionBar(country_code,status);
      TotalMonthlyAdsIncomeLine(country_code,status)
      TotalMonthlyAfterCommissionLine(country_code,status);
      TotalMonthlyCommissionPaidOutLine(country_code,status);
      TotalYeralyAdsIncomeLine(country_code,status);
      TotalYearlyCommissionPaidOutLine(country_code,status);
      TotalYeralyAfterCommissionLine(country_code,status);  

      getMonthNetAdIncome(country_code,status,"weeklyNetAdIncome","Weekly net Ad income");
      getMonthNetAdIncome(country_code,status,"mothlyNetAdIncome","Monthly net Ad income"); 
      getMonthNetAdIncome(country_code,status,"yearlyNetAdIncome","Yearly net Ad income"); 

      short_getDayAccountableAdsDetails(status,country_code,5); 
      short_getmonthAccountableAdsDetails(status,country_code);
      short_getYearlyAccountableAdsDetails(status,country_code,5);
    }

    function finance22RenderGraphs(){
      var status="all";
      StoreUserCurrentCountryCode();
      var country_code=localStorage.getItem("User_country_code");

      WeekyTotalAmountreceived("totalAmountReceived",status,country_code,"weekly_finances");

      WeekyTotalAmountreceived("TotalCommissionPaidOut",status,country_code,"weekly_finances_commission_paidOut");

      WeekyTotalAmountreceived("TotalAfterCommission",status,country_code,"weekly_finances_TotalAfterCommission");
    }

    function finance23RenderGraphs(status){
      // var status="all";
      StoreUserCurrentCountryCode();
      var country_code=localStorage.getItem("User_country_code");

      short_getDayAccountableAdsDetails(status,country_code,8); 

      TotalWeeklyAdIncomeReceivedBar(country_code,status);
      TotalWeeklyAfterCommisionBar(country_code,status);
      TotalWeeklyCommisionPaidOutBar(country_code,status);
      WeeklyProfit(country_code,status,"weeklyNetAdIncome");
    }

    function finance21RenderGraphs(){

      StoreUserCurrentCountryCode();
      var country_code=localStorage.getItem("User_country_code");

      var status="all";
      getDayAccountableAdsDetails("2016-09-25 13:05","",status,"today","","","",country_code);
    }

    function finance24RenderGraphs(status){

      StoreUserCurrentCountryCode();
      var country_code=localStorage.getItem("User_country_code");

      // var status="all";


      TotalMonthlyAdsIncomeLine(country_code,status);

      TotalMonthlyAfterCommissionLine(country_code,status);
      // TotalMonthlyCommissionLine()
      TotalMonthlyCommissionPaidOutLine(country_code,status);
      short_getmonthAccountableAdsDetails(status,country_code);
      getMonthNetAdIncome(country_code,status,"mothlyNetAdIncome","Monthly net Ad income");
    }

    function finance25RenderGraphs(status){

      StoreUserCurrentCountryCode();
      var country_code=localStorage.getItem("User_country_code");

      // var status="all";
      short_getYearlyAccountableAdsDetails(status,country_code,13);

      TotalYeralyAdsIncomeLine(country_code,status);
      TotalYearlyCommissionPaidOutLine(country_code,status);
      TotalYeralyAfterCommissionLine(country_code,status);
      yearlynetIncome(country_code,status,"yearlyNetAdIncome");
      
    }

    function getDayAccountableAdsDetails(date1,date2,status,dateKey,dateValue1,dateValue2,limit,country_code){

      // Status can be, all for all ads, Approved,Pending, or Declined for declined ads.
      // dateKey can be; today for the currenyt date ads, or range for a specific date range, or single for another specified date
      $.get("getDayAccountableAdsDetails.php?status="+status+"&dateKey="+dateKey+"&dateValue1="+date1+"&dateValue2="+date2+"&limit="+limit+"&country_code="+country_code,function(data){
        var results=JSON.parse(data);
        //console.log(results); 
        
        for (var i = results.length - 1; i >= 0; i--) {
          var no=i+1;
          var dataRow = '<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+results[i].uploadTime+'</td>'+
                        '<td>'+results[i].business_name.slice(0,14)+' ...</td>'+
                        '<td>'+results[i].payers_name.slice(0,12)+'</td>'+
                        '<td>'+results[i].adType.slice(0,14)+'...</td>'+
                        '<td>$ '+RoundOff(results[i].amountReceived)+'</td>'+
                        '<td>'+RoundOff(results[i].commission)+'%</td>'+
                        '<td>$ '+RoundOff(results[i].commission_paidOut)+'</td>'+
                        '<td>$ '+RoundOff(results[i].after_commission)+'</td>'+
                       '</tr>';
          $("#adsTabledisplayBody").prepend(dataRow);    
        } 

        var totalPosition=(results.length)-1;
        var totalsRow='<tr id="totalAmountReceived">'+
                        '<td class="cellNoBorder"></td>'+
                        '<td class="cellNoBorder"></td>'+
                        '<td class="cellNoBorder"></td>'+
                        '<td class="cellNoBorder"></td>'+
                        '<td class="cellNoBorder"></td>'+
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+ RoundOff(results[totalPosition].TotaAmountReceived)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                        '<td class="cellNoBorder"></td>'+
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].TotaCommissionPaidOut)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].TotaTotalAfterCommission)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                       '</tr>';
        $("#adsTabledisplayBody").append(totalsRow); 
      });
    }

    function short_getDayAccountableAdsDetails(status,country_code,num_row){
     // var num_row=6;
      $.get("short_getDayAccountableAdsDetails.php?status="+status+"&country_code="+country_code,function(data){
        var results=JSON.parse(data);
        // console.log(results);         
        for (var i = results.length - 2; i >= 0; i--) {
          var no=i+1;
          var totalAmountReceived="$ "+RoundOff(results[i].totalAmountReceived);
          var TotalCommissionPaidOut="$ "+RoundOff(results[i].TotalCommissionPaidOut);

          var TotalAfterCommission="$ "+RoundOff(results[i].TotalAfterCommission);

          if (results[i].totalAmountReceived=="") {totalAmountReceived="--";}
          if (results[i].TotalCommissionPaidOut=="") {TotalCommissionPaidOut="--";}
          if (results[i].TotalAfterCommission=="") {TotalAfterCommission="--";}

          var dataRow = '<tr>'+                        
                        '<td>'+results[i].day_name+'</td>'+
                        '<td>'+totalAmountReceived+' </td>'+
                        '<td>'+TotalCommissionPaidOut+'</td>'+
                        '<td>'+TotalAfterCommission+'</td>'+                        
                       '</tr>';
          $("#short_weeklyadsTabledisplayBody").prepend(dataRow);    
        } 


        // alert(5-results.length);
        var dataRow2 = '<tr>'+                        
                        '<td>--</td>'+
                        '<td>--</td>'+
                        '<td>--</td>'+
                        '<td>--</td>'+                        
                       '</tr>';

        if (results.length <num_row) {
         for(var i = 0; i <num_row-results.length; i++){
            $("#short_weeklyadsTabledisplayBody").append(dataRow2);
         }
        }

        var totalPosition=(results.length)-1;
        var totalsRow='<tr id="short_weekly">'+
                        '<td class="cellNoBorder"></td>'+                          
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+ RoundOff(results[totalPosition].amountreceivedFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+                        
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].commissionPaidOutFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].afterCommissionFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                       '</tr>';
        $("#short_weeklyadsTabledisplayBody").append(totalsRow); 
      });
    }

    function short_getmonthAccountableAdsDetails(status,country_code){
      $.get("short_getmonthAccountableAdsdetails.php?status="+status+"&country_code="+country_code,function(data){
        var results=JSON.parse(data);
        // console.log(results); 
        
        for (var i = results.length - 2; i >= 0; i--) {
          var no=i+1;
          var totalAmountReceived="$ "+RoundOff(results[i].TotalAmountReceived);
          var TotalCommissionPaidOut="$ "+RoundOff(results[i].TotalCommissionPaidOut);
          var TotalAfterCommission="$ "+RoundOff(results[i].TotalAfterCommission);

          $week=results[i].week+"<br><div class='fadegrey bold' style='font-size:8px;margin-top-10px;margin-bottom:-10px;'>"+results[i].date+"</div>";

          if (results[i].TotalAmountReceived=="") {totalAmountReceived="--";}
          if (results[i].TotalCommissionPaidOut=="") {TotalCommissionPaidOut="--";}
          if (results[i].TotalAfterCommission=="") {TotalAfterCommission="--";}

          var dataRow = '<tr>'+                        
                        '<td>'+$week+'</td>'+
                        '<td>'+totalAmountReceived+' </td>'+
                        '<td>'+TotalCommissionPaidOut+'</td>'+
                        '<td>'+TotalAfterCommission+'</td>'+                        
                       '</tr>';
          $("#short_monthlyadsTabledisplayBody").prepend(dataRow);    
        } 
        // alert(5-results.length);
        var dataRow2 = '<tr>'+                        
                        '<td>--</td>'+
                        '<td>--</td>'+
                        '<td>--</td>'+
                        '<td>--</td>'+                        
                       '</tr>';

        if (results.length <6) {
         for(var i = 0; i <6-results.length; i++){
            $("#short_monthlyadsTabledisplayBody").append(dataRow2);
         }
        }

        var totalPosition=(results.length)-1;
        var totalsRow='<tr id="short_weekly">'+
                        '<td class="cellNoBorder"></td>'+                          
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+ RoundOff(results[totalPosition].amountreceivedFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+                        
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].commissionPaidOutFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].afterCommissionFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                       '</tr>';
        $("#short_monthlyadsTabledisplayBody").append(totalsRow); 
      });
    }

    function short_getYearlyAccountableAdsDetails(status,country_code,num_row){
      $.get("short_getYearAccountableAdsdetails.php?status="+status+"&country_code="+country_code,function(data){
        var results=JSON.parse(data);
        // console.log(results); 
        
        for (var i = results.length - 2; i >= 0; i--) {
          var no=i+1;
          var totalAmountReceived="$ "+RoundOff(results[i].totalAmountReceived);
          var TotalCommissionPaidOut="$ "+RoundOff(results[i].TotalCommissionPaidOut);
          var TotalAfterCommission="$ "+RoundOff(results[i].TotalAfterCommission);

          $month=results[i].month;

          if (results[i].totalAmountReceived=="") {totalAmountReceived="--";}
          if (results[i].TotalCommissionPaidOut=="") {TotalCommissionPaidOut="--";}
          if (results[i].TotalAfterCommission=="") {TotalAfterCommission="--";}

          var dataRow = '<tr>'+                        
                        '<td>'+$month+'</td>'+
                        '<td>'+totalAmountReceived+' </td>'+
                        '<td>'+TotalCommissionPaidOut+'</td>'+
                        '<td>'+TotalAfterCommission+'</td>'+                        
                       '</tr>';
          $("#short_yearlyadsTabledisplayBody").prepend(dataRow);    
        } 
        // alert(5-results.length);
        var dataRow2 = '<tr>'+                        
                        '<td>--</td>'+
                        '<td>--</td>'+
                        '<td>--</td>'+
                        '<td>--</td>'+                        
                       '</tr>';

        if (results.length <num_row) {
         for(var i = 0; i <num_row-results.length; i++){
            $("#short_yearlyadsTabledisplayBody").append(dataRow2);
         }
        }

        var totalPosition=(results.length)-1;
        var totalsRow='<tr id="short_weekly">'+
                        '<td class="cellNoBorder"></td>'+                          
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+ RoundOff(results[totalPosition].amountreceivedFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+                        
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].commissionPaidOutFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                        '<td>'+
                          '<label class="pull-left top5">TT= $ '+RoundOff(results[totalPosition].afterCommissionFinal)+'</label>'+
                          '<i class="pull-right ion ion-arrow-up-b table_arrow_up arrow_green" ></i>'+
                        '</td>'+
                       '</tr>';
        $("#short_yearlyadsTabledisplayBody").append(totalsRow); 
      });
    }

    function financial_dashboardLoad(){

      var status="all"
      StoreUserCurrentCountryCode();

      var country_code=localStorage.getItem("User_country_code");

      var dateObject=localStorage.getItem("today_info");
      var dateFormatedObj=JSON.parse(dateObject);
      // alert(dateFormatedObj.month);
      // console.log(dateFormatedObj.month);

      getDayAccountableAdsDetails("2016-10-07 13:05","",status,"today","","",2,country_code);

      WeekyTotalAmountreceived("totalAmountReceived",status,country_code,"weekly_finances");

      TotalWeeklyAfterCommisionBar(country_code,status);
      TotalMonthlyAfterCommissionLine(country_code,status);
      TotalYeralyAfterCommissionLine(country_code,status);
      getMonthNetAdIncome(country_code,status,"mothlyNetAdIncome","Monthly net Ad income");
      
    }

    function RoundOff(num){
      return Math.round(num * 100) / 100;
    }

    function StoreUserCurrentCountryCode(){
      $.get("getUserCurrentCountry_info.php",function(data){
          var info=JSON.parse(data);
          var country_code=info.code;
          // country_code="UG";
          window.localStorage.setItem("User_country_code",country_code);

          var date_info={"year":info.year,"day":info.day,"month":info.month}
          var dateFinal=JSON.stringify(date_info);

          window.localStorage.setItem("today_info",dateFinal);
      });
    }

    function WeekyTotalAmountreceived(data,status,country_code,changeable){

      var today_info=JSON.parse(localStorage.getItem("today_info"));
      $("#"+data+"Date").html(today_info.day+" "+today_info.month+" "+today_info.year);
      $.get("weekly_finance.php?data="+data+"&status="+status+"&country_code="+country_code,function(data){
        var returned=JSON.parse(data);
                // console.log(returned);
        for (var i = returned.length - 1; i >= 0; i--) {
          
          var icon ="ion-arrow-down-b";
          var arrow="arrow_red";
          if (returned[i].changeState =="Rise") {
            var arrow="arrow_green";
            icon ="ion-arrow-up-b";
          }

          var arrowholder='<i class="pull-right ion '+icon+' table_arrow_up2 '+arrow+'"></i>';

          var amount=RoundOff(returned[i].TotalAmount);

          if (amount==0) {
            amount="--";
            var arrow="arrow_green";
            arrowholder="<div style='margin-top:10px;'>--</div>";
          }else{
            amount="$"+amount;
          }

          var html='<div class="row top20 font11">'+
                       '<div class="col-md-4 col-lg-4 col-xl-4">'+returned[i].day_name+'</div>'+
                       '<div class="col-md-6 col-lg-6 col-xl-6 '+arrow+'">'+amount+'</div>'+
                       '<div class="col-md-2 col-lg-2 col-xl-2">'+
                        ''+arrowholder+
                       '</div>'+
                     '</div>';
          $("#"+changeable).append(html);
        }
      });
    }

    function GoDetails(url,status){
      window.location=url;

      localStorage.setItem("dataStatus",status);
    }
