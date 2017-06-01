/**
* home Module
*
* Descriptio
*/

angular.module('home', ['ngAnimate', 'ui.bootstrap','ngDialog'])
.controller('IconCtrl', ['$scope','config', function ($scope,config) {
	$scope.BaseImageURL = config.BaseImageURL;
	$scope.BaseURL = config.BaseURL;
}])
.controller('IndexCtrl', ['$scope','$http','config','GetData', function ($scope,$http,config,GetData) {

	    $scope.BaseImageURL = config.BaseImageURL;
	    $scope.BaseUrl = config.BaseURL;

	    $.get("http://ipinfo.io" , function(response) {

		    //console.log("the ip object",response);

	    },"jsonp");
	   


		angular.element(document).ready(function(){
			GetData.getData(config.BaseURL+"classes/util.php?latest_discoveries=all",function(data)
			 {
			 	//console.log("tHE ACTUAL discoveries   is",data);
			 	$scope.discoveries = data;
			 	

			 });
	    });

	    $scope.goToBusiness=function(business_id)
	    {
	    	//window.location.href=config.BaseURL+"business_page_3.php?";
	    	window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+business_id;
	    }

	    $scope.storeWord= function(word)
	    {
	    	window.localStorage.setItem("freeSearchWord",word);
	    }

	    $scope.storeLoggedWord= function(word)
	    {
	    	window.localStorage.setItem("searchWord",word);
	    }



	
}])
.controller('AuthController', ['$scope','$http','GetData','EventViewModel','config', function($scope,$http,GetData,EventViewModel,config){
	
	$scope.loginModel =
	{
		username :"",
		password :""
	}	

	$scope.toSignup2 = function(firstname,lastname)
	{
		window.localStorage.setItem("procedure","correct");
		window.localStorage.setItem("cre2_firstname",firstname);
		window.localStorage.setItem("cre2_lastname",lastname);
		if(firstname.length > 0 && lastname.length>0)
		{
			window.location.href=config.BaseURL+"signup2.html";
		}else
		{
			window.location.href=config.BaseURL+"signup.html";
		}
		
	

	}

	$scope.toSignup3 = function(email,phone)
	{
		from_page = window.localStorage.getItem("procedure");
		////alert(from_page);
		window.localStorage.setItem("cre3_email",email);
		window.localStorage.setItem("cre3_phone",phone);

		if(from_page=='correct' && email.length > 0 && phone.length>0){

			window.location.href=config.BaseURL+"signup3.html";
			
		}else{

			window.location.href=config.BaseURL+"signup.html";
		}
		
	}

	$scope.toSignup5 = function(password)
	{
		    from_page = window.localStorage.getItem("procedure");
		    ////alert(from_page);
			window.localStorage.setItem("cre5_password",password);
			//window.location.href=config.BaseURL+"signup5.html";
			

			if(from_page=='correct' && password.length > 0){

			    window.location.href=config.BaseURL+"signup5.html";
			    window.localStorage.removeItem("procedure");
			
			}else{

				window.location.href=config.BaseURL+"signup.html";
			}

			//window.localStorage.setItem("cre5_confirm_password",);
	}
	
    $scope.showDialog = 0;
	$scope.logging_in = 0;
		$scope.login = function()
		{
			$scope.logging_in = 1;
			var form_data = new FormData();
			form_data.append("login_form","login_form");
			form_data.append("username",$scope.loginModel.username);
			form_data.append("password",$scope.loginModel.password);

			$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////alert(response);
						//var mybusiness_id =response;
						////console.log("the login status is",response);
						var status = JSON.parse(response);
						////console.log("the login status is tigidi",status['login_status']);
						if(status['login_status']==1)
						{
							////console.log("hhh");
							window.location.href=config.BaseURL+"home2.php";
						}else
						{
							console.log("tigidi");
							$scope.showDialog = 1;
						}
						
						$scope.logging_in = 1;

					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
		});

		}


}])

.controller('EventCtrl', ['$scope','$http','GetData','EventViewModel','config',function($scope,$http,GetData,EventViewModel,config){

	$scope.events = [];
	//config.BaseURL+'classes/util.php?events=latest'
	GetData.getData(config.BaseURL+'classes/util.php?events=latest',function(data)
	{
		$scope.latestEvents =data;
		//////////////console.log( "these are picked events ",$scope.latestEvents[0]);
		for(var i= 0; i < $scope.latestEvents.length; i++) {
			$scope.currentEvent =$scope.latestEvents[i];
			$scope.eventViewModel = new EventViewModel();
			if($scope.currentEvent.picture == '' || $scope.currentEvent.picture==null){
				$scope.eventViewModel.picture=config.BaseImageURL+"uploads/defbanner.png";
			}else
			{
				$scope.eventViewModel.picture=$scope.currentEvent.picture;
				//////////////console.log( "these are picked pic ",currentEvent.picture);
			}

			$scope.eventViewModel.title=$scope.currentEvent.title;
			//////////////console.log( "these are picked title ",currentEvent.title);
			$scope.eventViewModel.start_date=$scope.currentEvent.start_date;
			//////////////console.log( "these are picked startsdate ",$scope.eventViewModel.start_date);
			$scope.eventViewModel.end_date=$scope.currentEvent.end_date;
			//////////////console.log( "these are picked enddate ",$scope.eventViewModel.end_date);
			$scope.eventViewModel.interested_count=$scope.currentEvent.interested_count;
			//////////////console.log( "these are picked count ",currentEvent.interested_count);
    		$scope.events.push($scope.eventViewModel);

		}


	});

}])
.controller('ReviewCtrl', ['$scope','GetData','ReviewModel','config',function ($scope,GetData,ReviewModel,config) {
	//$scope.obj = pickreview;
	//////////////console.log( "these are trypes ",typeof($scope.obj));
   $scope.ratings=[];
   $scope.pricings=[];
   $scope.noratings =[];
   $scope.nopricings=[];
	angular.element(document).ready(function(){

		//config.BaseURL+'classes/util.php?review=latest&page='+$scope.page
		GetData.getData(config.BaseURL+'classes/util.php?review=latest&page='+$scope.page,function(data)
		{
			$scope.latestreview  = data;
			$scope.mymodel = new ReviewModel();
			if($scope.latestreview.business.logo == null || $scope.latestreview.business.logo=='' )
			{
				$scope.latestreview.business.logo=config.BaseImageURL+"uploads/deflogo.png";

			}else{
				$scope.latestreview.business.logo=config.BaseImageURL+$scope.latestreview.business.logo;
			}
			$scope.mymodel.business_id=$scope.latestreview.business.id;
			$scope.mymodel.business_picture =$scope.latestreview.business.logo;
			$scope.mymodel.person_id=$scope.latestreview.user.id;
			$scope.mymodel.person_name=$scope.latestreview.user.first_name+" "+$scope.latestreview.user.last_name;
			$scope.mymodel.business_name = $scope.latestreview.business.name;
			$scope.mymodel.session_id = $scope.latestreview.session_id;
			$scope.mymodel.content =$scope.latestreview.details;
			$scope.mymodel.price =$scope.latestreview.cost;
			$scope.mymodel.rate =$scope.latestreview.good;

			for(var i=0; i<$scope.latestreview.good; i++)
			{
				$scope.mymodel.ratings[i]=i;
			}
			for(var j=0; j<$scope.latestreview.cost; j++)
			{
				$scope.mymodel.pricings[j]=j;
			}

			for(var k=0; k<(5-$scope.latestreview.good); k++)
			{
				$scope.mymodel.noratings[k]=k;
			}

			for(var l=0; l<(5-$scope.latestreview.cost); l++)
			{
				$scope.mymodel.nopricings[l]=l;
			}
			//////////////console.log('the latest review is =>',$scope.latestreview);
			// $scope.isOwner =false;
			if($scope.mymodel.person_id == $scope.mymodel.session_id)
			{
				$scope.isOwner=true;

			}else
			{
				$scope.isOwner =false;
			}
			//////console.log("The person_id is ==>",$scope.mymodel.person_id);
			//////console.log("The session_id is ==>",$scope.mymodel.session_id);
			//////console.log("The iss owner is ==>",$scope.isOwner);

		});
	});

}]).directive('pwCheck', [function () {
    return {
      require: 'ngModel',
      link: function (scope, elem, attrs, ctrl) {
        var firstPassword = '#' + attrs.pwCheck;
        elem.add(firstPassword).on('keyup', function () {
          scope.$apply(function () {
            var v = elem.val()===$(firstPassword).val();
            ctrl.$setValidity('pwmatch', v);
          });
        });
      }
    }
  }])
.value('ReviewModel', ReviewModel)
.value('EventViewModel', EventViewModel)
.controller('GossipCtrl', ['$scope','GetData','config', function ($scope,GetData,config) {

	$scope.GossipModels=[];
	GetData.getData(config.BaseURL+'classes/util.php?gossips=latest',function(data)
	{
		$scope.pickedGossips = data;
		angular.forEach($scope.pickedGossips, function(value,key)
		{
			$scope.currentGossip = value;
			$scope.currentmodel = new GossipViewModel();
			if($scope.currentGossip.picture == '' || $scope.currentGossip.picture ==null )
			{
				$scope.currentGossip.picture =config.BaseImageURL+"uploads/defbanner.png"

			}else
			{
				$scope.currentGossip.picture = $scope.currentGossip.picture
			}
			$scope.currentmodel.picture = $scope.currentGossip.picture;
			$scope.currentmodel.title =$scope.currentGossip.gossip_title;
			$scope.currentmodel.details =$scope.currentGossip.details;
			$scope.currentmodel.date_of_post =$scope.currentGossip.date_of_post;
			$scope.currentmodel.interested_count =$scope.currentGossip.following_count;
			this.push($scope.currentmodel);

		},$scope.GossipModels);



	});

}])
.factory('sharedProperties', function () {
        var property = '';

        return {
            getProperty: function () {
                return property;
            },
            setProperty: function(value) {
                property = value;
            }
        };
 }).directive('managesubcategorybusinesses',function($rootScope)
 {
 	return function(scope,element,attrs)
 	{
 		element.bind("click",function()
 		{
 			scope.getBusinesses(attrs.subcategoryid,function(data)
 			{
 				
 				$rootScope.$broadcast("CallSubcategoryBusinesses", data);
 				//////console.log("tadaa");
 				//window.location.href=BaseURL+"search.php";
 			})


 		});
 		
 	};
 })

.controller('CategoryCtrl', ['$scope','$rootScope','$http','GetData','CategoryViewModel','config','sharedProperties', function ($scope,$rootScope,$http,GetData,CategoryViewModel,config,sharedProperties) {

	$scope.currentobjectPosition =0;
	$scope.toggle = 7;
	$scope.BaseURL =config.BaseURL;

	

	$scope.makeFillData  = function(position)
	{
		$scope.currentobjectPosition=position;

	}
	$scope.redirect = function(count)
	{
		window.location.href=config.BaseURL+"home_tab.php"+count;
	}

	$scope.togglify=function(id)
	{
		 $scope.toggle = id;
		 ////////////////////alert($scope.toggle);
		 //$scope.$digest();

	} //CallSubcategoryBusinesses
	$scope.getBusinesses=function(sub_category_id,user_id)
	{
		//config.BaseURL+"classes/util.php?sub_category_id="+sub_category_id+"&user_id="+user_id+"&transaction=get_businesses"
		 GetData.getData(config.BaseURL+"classes/util.php?sub_category_id="+sub_category_id+"&user_id="+user_id+"&transaction=get_businesses",function(data)
		 {
		 	//////console.log("tHE ACTUAL DATA   is",data);
		 	$rootScope.$broadcast("CallSubcategoryBusinesses", data);
		 	sharedProperties.setProperty(data);
		 	window.localStorage.setItem("biz",JSON.stringify(data));
		 	window.location.href=config.BaseURL+"search.php";
		 	//return data;

		 });


	}

	$scope.getBusinesses=function(sub_category_id,user_id)
	{
		//config.BaseURL+"classes/util.php?sub_category_id="+sub_category_id+"&user_id="+user_id+"&transaction=get_businesses"
		 GetData.getData(config.BaseURL+"classes/util.php?sub_category_id="+sub_category_id+"&user_id="+user_id+"&transaction=get_businesses",function(data)
		 {
		 	//////console.log("tHE ACTUAL DATA   is",data);
		 	$rootScope.$broadcast("CallSubcategoryBusinesses", data);
		 	sharedProperties.setProperty(data);
		 	window.localStorage.setItem("biz",JSON.stringify(data));
		 	window.location.href=config.BaseURL+"search.php";
		 	//return data;

		 });


	}

	/*
	*
	*
	Function getFreeBusinesses**
	@param sub_category_id
	@return void  picks businesses regardless of session
	**/
	$scope.getFreeBusinesses=function(sub_category_id)
	{
		var user_id = 0;
		//config.BaseURL+"classes/util.php?sub_category_id="+sub_category_id+"&user_id="+user_id+"&transaction=get_businesses"
		 GetData.getData(config.BaseURL+"classes/util.php?sub_category_id="+sub_category_id+"&user_id="+user_id+"&transaction=get_businesses",function(data)
		 {
		 	console.log("tHE ACTUAL DATA   is",data);
		 	$rootScope.$broadcast("CallSubcategoryBusinesses", data);
		 	sharedProperties.setProperty(data);
		 	window.localStorage.setItem("biz",JSON.stringify(data));
		 	window.location.href=config.BaseURL+"freesearch.php";
		 	//return data;

		 });


	}
	
	GetData.getData(config.BaseURL+'classes/util.php?categories=categories',function(data)

	{
		$scope.categorymodels = [];

		$scope.categories =data;


	angular.forEach($scope.categories, function(value,key){
		$scope.currentCategory = value;
				//businesses
				angular.forEach($scope.currentCategory.businesses, function(value,key)
				{
					        $scope.currentbusiness =value;
							$scope.currentbusiness['ratings']=[];
							$scope.currentbusiness['pricings']=[];
							$scope.currentbusiness['no_pricings']=[];
							$scope.currentbusiness['no_ratings']=[];

							for(var i=0;i<$scope.currentbusiness.cost;i++)
				 			{	
				 				$scope.currentbusiness['pricings'][i]=i;
				 				////////console.log("addes to price");
				 			}
				 			for(var j=0;j<5-$scope.currentbusiness.cost;j++)
				 			{	
				 				$scope.currentbusiness['no_pricings'].push(j);
				 				////////console.log("addes to nonprice");
				 			}

				 			for(var k=0;k<$scope.currentbusiness.good;k++)
				 			{	
				 				$scope.currentbusiness['ratings'].push(k);
				 				////////console.log("added to rate");
				 			}
				 			for(var l=0;l<5-$scope.currentbusiness.good;l++)
				 			{	
				 				$scope.currentbusiness['no_ratings'].push(l);
				 				////////console.log("added to norate");
				 			}

					if($scope.currentbusiness.logo == null || $scope.currentbusiness.logo == ''){
						//////////////console.log('Men am in the right if statement');
						$scope.currentbusiness.logo=config.BaseImageURL+"uploads/deflogo.png";
					}else{
						$scope.currentbusiness.logo=config.BaseImageURL+$scope.currentbusiness.logo;
					}


				});

		//subcategories
		$scope.categorymodel  = new CategoryViewModel();
		$scope.categorymodel.category_id=$scope.currentCategory.category_id;
		$scope.categorymodel.categoryname=$scope.currentCategory.categoryname;
		$scope.categorymodel.category_icon=$scope.currentCategory.category_icon;

		//////////////console.log('Men am in the right if statement');
		$scope.categorymodel.businesses=$scope.currentCategory.businesses;
		$scope.categorymodel.sub_categories = $scope.currentCategory.category_subcategories;
		////////////console.log("the  subcategories are =====>",$scope.categorymodel.sub_categories)





		this.push($scope.categorymodel);

	},$scope.categorymodels);




	});

	$scope.dropcategories= [];

	GetData.getData(config.BaseURL+'classes/util.php?dropcategories=categories',function(data)

	{
		$scope.dropdowncategories =data;

		angular.forEach($scope.dropdowncategories, function(value,key){
			$scope.currentDropCategory = value;
					this.push($scope.currentDropCategory);

		},$scope.dropcategories);







		});

}])

.value('CategoryViewModel', CategoryViewModel)
.value('GossipViewModel',GossipViewModel)


.controller('CountryCtrl', ['$scope','CountryViewModel','$http','CityViewModel','GetData','config',function ($scope,CountryViewModel,$http,CityViewModel,GetData,config) {
	$scope.countryModels =[];
	//////////////console.log("my countries men of id are manaamm",$scope.cityModels);
	GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
	{	$scope.countries =data;
		angular.forEach($scope.countries, function(value,key)
		{
			$scope.currentCountry =value;
			$scope.countryModel = new CountryViewModel();
			$scope.countryModel.id = $scope.currentCountry['id'];
			$scope.countryModel.name = $scope.currentCountry['name'];
			$scope.countryModel.country_code= $scope.currentCountry['code'];


			this.push($scope.countryModel);
		},$scope.countryModels);


	});


	//$scope.country_id=3

	//////////////console.log("my cities of id are manaamm",$scope.cityModels);

	document.getElementById("countrry").onchange = function(){

		var country_id = document.getElementById("countrry").value;
		////////////////////alert(country_id);
		//////////////console.log("my cities of id are",$scope.cityModels);
		$scope.country_id=country_id;
		//config.BaseURL+"classes/util.php?signupCountry_id="+country_id
		GetData.getData( config.BaseURL+"classes/util.php?signupCountry_id="+$scope.country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			//////////////console.log("my cities of id cmon henry are",$scope.cityModels);

			   $scope.sel = document.getElementById('city');
			   $scope.sel.innerHTML="";


				angular.forEach($scope.cityModels, function(value,key)
				{	$scope.citycModel =value;
					//////////////console.log("my cities of id cmon henry are in if in if",$scope.citycModel['name']);
				    $scope.opt = document.createElement('option');
				    $scope.opt.innerHTML = $scope.citycModel['name'];
				    $scope.opt.value = $scope.citycModel['id'];
				    $scope.sel.appendChild($scope.opt);

				});
			//document.getElementById("city").innerHTML = $scope.cityModels[0]['name'];

		});



		//////////////console.log("my cities of id cmon henry are",$scope.cityModels);

	};

}])
.value('CountryViewModel',CountryViewModel)
.controller('SignupCtrl', ['$scope', 'SignUpModel','$http','config','GetData','CountryViewModel','CityViewModel',function ($scope,SignUpModel,$http,config,GetData,CountryViewModel,CityViewModel) {

		$scope.countryModels =[];

		$scope.toSignup4 = function(country_id,city_id,dob,gender)
		{
			from_page = window.localStorage.getItem("procedure");
			////alert(from_page);
			window.localStorage.setItem("cre4_country_id",country_id);
			window.localStorage.setItem("cre4_city_id",city_id);
			window.localStorage.setItem("cre4_gender",gender);
			$scope.signobject.dob=document.getElementById('example2').value;
			window.localStorage.setItem("cre4_dob",$scope.signobject.dob);
			
			if(from_page=='correct'){

			   window.location.href=config.BaseURL+"signup4.html";
			
			}else{

				window.location.href=config.BaseURL+"signup.html";
			}
			
		}
		

		//////////////console.log("my countries men of id are manaamm",$scope.cityModels);
		GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
		{	$scope.countries =data;
			angular.forEach($scope.countries, function(value,key)
			{
				$scope.currentCountry =value;
				$scope.countryModel = new CountryViewModel();
				$scope.countryModel.id = $scope.currentCountry['id'];
				$scope.countryModel.name = $scope.currentCountry['name'];
				$scope.countryModel.country_code= $scope.currentCountry['code'];


				this.push($scope.countryModel);
			},$scope.countryModels);


		});

		$scope.changer=function()
		{
			////alert("tigidi");
			//var country_id =$scope.country_id;
			
			$scope.cityModels=[];
			
			//$scope.country_id=country_id;

			GetData.getData( config.BaseURL+"classes/util.php?signupCountry_id="+$scope.country_id,function(data)
			{	$scope.cities =data;

				angular.forEach($scope.cities, function(value,key)
				{
					$scope.currentCity =value;
					$scope.cityModel = new CityViewModel();
					$scope.cityModel.id = $scope.currentCity['id'];
					$scope.cityModel.name = $scope.currentCity['name'];
					this.push($scope.cityModel);

				},$scope.cityModels);


			});
		}

		



	$scope.signobject = {
		first_name :'',
		last_name :'',
		country_id : '',
		city_id : '',
		email : '',
		other_email : '',
		phone_number : '',
		password : '',
		dob : '',
		gender : '',
		social :'yammzit'

	};
	$scope.signing_in = 0;

	$scope.disBut=function()
	{
		$scope.signing_in=1;	
	}

	$scope.postData = function()
	{
		$scope.signing_in=1;
		////alert("tigidification");


		$scope.signobject.first_name=window.localStorage.getItem("cre2_firstname");
		$scope.signobject.last_name =window.localStorage.getItem("cre2_lastname");
		$scope.signobject.email = window.localStorage.getItem("cre3_email");
		$scope.signobject.phone_number=window.localStorage.getItem("cre3_phone");
		$scope.signobject.country_id =window.localStorage.getItem("cre4_country_id");
		$scope.signobject.city_id = window.localStorage.getItem("cre4_city_id");
		$scope.signobject.dob =window.localStorage.getItem("cre4_dob");
		$scope.signobject.gender =window.localStorage.getItem("cre4_gender");
		$scope.signobject.password =window.localStorage.getItem("cre5_password");

		//window.localStorage.removeItem("procedure");
		
		//console.log("this is my gender",$scope.signobject.gender);
		//console.log("this is my dob",$scope.signobject.dob);
		//console.log("this is my fname",$scope.signobject.first_name);
		//console.log("this is my lname",$scope.signobject.last_name);
		//console.log("this is my country",$scope.signobject.country_id);
		//console.log("this is my city",$scope.signobject.city_id);
		//console.log("this is my email",$scope.signobject.email);
		//console.log("this is my number",$scope.signobject.phone_number);
		//console.log("this is my password",$scope.signobject.password);

		var form_data = new FormData();

		form_data.append("sign_user","sign_user");
		form_data.append("first_name",$scope.signobject.first_name);
		form_data.append("last_name",$scope.signobject.last_name);
		form_data.append("country_id",$scope.signobject.country_id);
		form_data.append("city_id",$scope.signobject.city_id);
		form_data.append("email",$scope.signobject.email);
		form_data.append("password",$scope.signobject.password);
		form_data.append("phone",$scope.signobject.phone_number);
		form_data.append("dob",$scope.signobject.dob);
		form_data.append("gender",$scope.signobject.gender);

		$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////alert(response);
						//var mybusiness_id =response;
						window.location.href=config.BaseURL+"home2.php";
						$scope.signing_in=0;

					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
		});
					
		// $http.get(config.BaseURL+'classes/util.php?fname='+
		// 	$scope.signobject.fname+'&lname='+$scope.signobject.lname+'&city_id='+
		// 	$scope.signobject.city_id+'&email='+$scope.signobject.email+'&phonenumber='+$scope.signobject.phonenumber+'&password='
		// 	+$scope.signobject.password+'&gender='+$scope.signobject.gender+'&dob='+$scope.signobject.dob+'&social='+$scope.signobject.social).
		//   then(function(response) {

		//    //////////////alert("The rsponse after submit is"+response);
		//    //////console.log("success submit==",response);
		//     //window.location.href=config.BaseURL+"home2.php";
		//      window.location.href=config.BaseURL+"info.php";
		//     //window.location.replace(config.BaseURL+"home2.php");
		//    ////////console.log(response);

		//   }, function(error) {
		//   	////////////alert("the erroe is"+error);
		//     // called asynchronously if an error occurs
		//     // or server returns response with an error status.
		//     ////////////console.log("Error failure  ==",error);

		//   });

		  // $scope.signobject.first_name=null;
		  // $scope.signobject.last_name=null;
		  // $scope.signobject.city_id=null;
		  // $scope.signobject.email=null;
		  // $scope.signobject.otheremail=null;
		  // $scope.signobject.phone_number=null;
		  // $scope.signobject.password=null;
		  // $scope.signobject.gender=null;
		  // $scope.signobject.dob=null;

	}

}])

.controller('SlideAdvertCtrl', ['$scope','GetData','config', function ($scope,GetData,config) {
	$scope.BaseURL=config.BaseURL;
	$scope.BaseImageURL=config.BaseImageURL;
	GetData.getData(config.BaseURL+'classes/util.php?slides=all',function(data)
	{

		$scope.slideAdverts=data;


	});

}])

.value('CityViewModel',CityViewModel).value('SignUpModel',SignUpModel)

.controller('AddBusinessCtrl', ['$scope','GetData','fileUpload','CountryViewModel','CityViewModel','config', function ($scope,GetData,fileUpload,CountryViewModel,CityViewModel,config) {
//picking and rendering vcountries

	$scope.categoryModels = [];
	//config.BaseURL+'classes/util.php?categories=categories'
	GetData.getData(config.BaseURL+'classes/util.php?categories=categories',function(data)
	{
		$scope.RawCategories = data;
		//console.log("the raw category models are==>",$scope.RawCategories);

		angular.forEach($scope.RawCategories,function(value,key)
		{	$scope.RawCategory =value;
			$scope.categorymodel = new CategoryViewModel();
			$scope.categorymodel.category_id = $scope.RawCategory.category_id;
			$scope.categorymodel.categoryname = $scope.RawCategory.categoryname;
			$scope.categorymodel.sub_categories = $scope.RawCategory.category_subcategories;

			this.push($scope.categorymodel);

		},$scope.categoryModels);


	});
	$scope.countryModels =[];

	//////////////console.log("my countries men of id are manaamm",$scope.cityModels);
	GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
	{	$scope.countries =data;
		angular.forEach($scope.countries, function(value,key)
		{
			$scope.currentCountry =value;
			$scope.countryModel = new CountryViewModel();
			$scope.countryModel.id = $scope.currentCountry['id'];
			$scope.countryModel.name = $scope.currentCountry['name'];
			$scope.countryModel.country_code= $scope.currentCountry['code'];


			this.push($scope.countryModel);
		},$scope.countryModels);


	});


	

	$scope.updateCities = function(country_id)
	{

		GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			

		});

	}

	$scope.updateCategorySubcategories=function(id,select_number)
	{
		angular.forEach($scope.categoryModels,function(value,key)
	 	{
			 $scope.thiscategory = value;
			if($scope.thiscategory.category_id == id)
			 {
			 	if(select_number==1){
			 		$scope.subcategory1Models=$scope.thiscategory.sub_categories;
			    }else if(select_number==2)
			    {
			    	$scope.subcategory2Models=$scope.thiscategory.sub_categories;
			    }else if(select_number==3)
			    {
			    	$scope.subcategory3Models=$scope.thiscategory.sub_categories;
			    }

			 }

		});

	}



// picking and rendering countries

$scope.dropcategories= [];

GetData.getData(config.BaseURL+'classes/util.php?dropcategories=categories',function(data)

{
	$scope.dropdowncategories =data;
	//console.log('data in picks ' ,$scope.dropdowncategories);


	angular.forEach($scope.dropdowncategories, function(value,key){
		$scope.currentDropCategory = value;

		this.push($scope.currentDropCategory);

	},$scope.dropcategories);







});





$scope.defpic =config.BaseImageURL+"uploads/capture.png";

$scope.uploadFile = function(){
               var file = $scope.myFile;

              // ////////////console.log('file is ' ,file);
               ////////////console.log(file);

               var uploadUrl = config.BaseURL+'classes/util.php?';
               fileUpload.uploadFileToUrl(file, uploadUrl);
 };

	$scope.businessobject = {
		
		name :'',
		picture : config.BaseImageURL+'uploads/capture.png',
		country_id:'',
		city_id : '',
		address : '',
		category_1_id:'',
		category_2_id:'',
		category_3_id:'',
		sub_category_1_id : '',
		sub_category_2_id : '',
		sub_category_3_id : ''

	};

	document.getElementById('inputfile').onchange=function(e)
	{

		//////////////console.log('my event is ',e);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// ////////////console.log('my event mikemdd is ',e);
            	 		
           						$scope.businessobject.picture=e.target.result;
           						$scope.$digest();
       				 


                   // ////////////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}


	$scope.adding=0;
	$scope.addbusiness = function()
	{
			
		$scope.adding=1;
		//////console.log('The file is: ==>',$scope.myFile);
		//$scope.uploadFile();
		var form_data = new FormData();
		form_data.append('addbusiness_form','addbusiness_form')
		form_data.append('user_id', $scope.user_id);
	    form_data.append('name', $scope.businessobject.name);
	    form_data.append('business_logo', $scope.myFile);
	    form_data.append('country_id', $scope.businessobject.country_id);
	    form_data.append('city_id', $scope.businessobject.city_id);
	    form_data.append('address', $scope.businessobject.address);
	    form_data.append('subcategoryid_1', $scope.businessobject.sub_category_1_id);
	    form_data.append('subcategoryid_2', $scope.businessobject.sub_category_2_id);
	    form_data.append('subcategoryid_3', $scope.businessobject.sub_category_3_id);

	    
	    $.ajax({
	                url: config.BaseURL+'classes/util.php?', // point to server-side PHP script
	                dataType: 'text',  // what to expect back from the PHP script, if anything
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,
	                type: 'POST',
	                success: function(php_script_response){
	                	
	                	var res = JSON.parse(php_script_response);
	                	var business_id=res['business_id'];
	                	var enc_business_id=res['enc_business_id'];
	                	$scope.postReview(business_id,$scope.user_id,0,0,$scope.date_created,"discovered business");
	                	window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+enc_business_id;

	                }
	     });





	}

	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details)
	{
		//var image = $scope.myFile;
		//////////////////alert(business_id);
		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if (details != "") 
			{

					var form_data = new FormData();
					form_data.append("random_add_biz","random_add_biz");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","add_business");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					////////////////////alert("the buz -===>  "+business_id);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert("The response is==> "+response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}
		
	    $scope.details="";
	}


 }])
.directive('fileModel', ['$parse', function ($parse) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                  var model = $parse(attrs.fileModel);
                  var modelSetter = model.assign;

                  element.bind('change', function(){
                     scope.$apply(function(){
                        modelSetter(scope, element[0].files[0]);
                     });
                  });
               }
            };
}])
.service('fileUpload', ['$http', function ($http) {
            this.uploadFileToUrl = function(file, uploadUrl){
               var fd = new FormData();
               fd.append('file', file);

               $.post(uploadUrl, fd, function(data){
               	////////////////////alert(data);
               });

               
		 }

 }]).directive("postbutton", function(){
	return {
		restrict: "E",
		bindToController: true,
		template: "<button type='button' class='post_review' post-random-feed style='background-color:#CB525B; height:15px;border:0px;'>Post review</button>"
	}
}).directive("postRandomFeed",['$compile','$templateRequest','config',function($compile,$templateRequest,config){
	
	return function(scope, element, attrs){

		element.bind("keydown keypress", function(event) {
                if(event.which === 13) {
                	////////////alert("tigidi")
                        scope.$apply(function(){
                                scope.$eval(attrs.ngEnter);
                        });
                        
                        event.preventDefault();
                }
         });

		

		element.bind("click", function(){
			//scope.postReview(scope.random_business.id,user_id,scope.rate,scope.price,scope.date_created,scope.details)
			//"<div><button class='btn btn-default'>Show //////////////////alert #"+scope.countt+"</button></div>"
			scope.BaseImageURL = config.BaseImageURL;
			 //////console.log("the element is",element);
			 if(element.context.className=='post_review' || element.context.classList.contains('post_review') )
			 {
			 	 //console.log("tigidify");

			 	scope.$apply(function(){
			 		// alert("business_id=>"+attrs.businessid);
			 		// alert("user_id=>"+attrs.userid);
			 		// alert("rate=>"+attrs.randrate);
			 		// alert("price=>"+attrs.randprice);
			 		// alert("date=>"+attrs.randdate);
			 		 //alert("detaails=>"+attrs.page);

			 	scope.postReview(attrs.businessid,attrs.userid,attrs.randrate,attrs.randprice,attrs.randdate,attrs.randdetails,function(data)
			 	{
			 		scope.RandomFeed=JSON.parse(data);

			 		//console.log(scope.RandomFeed);
			 		var countt=scope.countt;
			 		//var i=0;

			 		//var con =
			 		 
			 		//////////////////alert(scope.$eval(scope.countt+"mufrid"));
			 		scope['myfeed'+countt] = new ReviewModel();

			 		scope['myfeed'+countt].id =scope.RandomFeed.id;
			 		scope['myfeed'+countt].price = scope.RandomFeed.cost;
			 		scope['myfeed'+countt].rate = scope.RandomFeed.good;
			 		
			 		scope['myfeed'+countt].person_id=scope.RandomFeed.user.id;
			 		scope['myfeed'+countt].un_enc_person_id=scope.RandomFeed.un_enc_user_id;
			 		scope['myfeed'+countt].person_avatar=scope.RandomFeed.user.avatar;
			 		scope['myfeed'+countt].business_name = scope.RandomFeed.business.name;
			 		scope['myfeed'+countt].person_name =scope.RandomFeed.user.first_name+" "+scope.RandomFeed.user.last_name;
			 		scope['myfeed'+countt].business_id =scope.RandomFeed.un_enc_business_id; 
			 		scope['myfeed'+countt].business_owner_id =scope.RandomFeed.business.owner_id;
			 		scope['myfeed'+countt].date_created = scope.RandomFeed.date_created;
			 		scope['myfeed'+countt].comment_count = 0;
			 		if(scope.RandomFeed.isLikedByUser==0)
			 		{
			 			scope['myfeed'+countt].likeToggleValue=0;

			 		}else if(scope.RandomFeed.isLikedByUser==1)
			 		{
			 			scope['myfeed'+countt].likeToggleValue=1;
			 		}
			 		//to be contnuied .....
			 		

			 				for(var i=0; i<scope['myfeed'+countt].rate; i++)
							{
								scope['myfeed'+countt].ratings[i]=i;
							}
							for(var j=0; j<scope['myfeed'+countt].price; j++)
							{
								scope['myfeed'+countt].pricings[j]=j;
							}

							for(var k=0; k<(5-scope['myfeed'+countt].rate); k++)
							{
								scope['myfeed'+countt].noratings[k]=k;
							}

							for(var l=0; l<(5-scope['myfeed'+countt].price); l++)
							{
								scope['myfeed'+countt].nopricings[l]=l;
							}
					// scope['myfeed'+countt].ratings =scope.ratings;
					// scope['myfeed'+countt].pricings =scope.pricings;
					// scope['myfeed'+countt].noratings =scope.noratings;
					// scope['myfeed'+countt].nopricings =scope.nopricings;
					scope['myfeed'+countt].content =scope.RandomFeed.details;

			 		//console.log("the feed is",scope.RandomFeed);

			 		var myelement = angular.element(document.getElementById(attrs.page+'posters'));
			 		//console.log("my element is",myelement);

			 		    scope.myFeedComments =[];

						angular.forEach(scope.myFeedComments,function(value,key)
						{
							scope.thiscomment=value;
							if(scope.thiscomment.isLikedByUser==0)
							{

							}else if(scope.thiscomment.isLikedByUser==1)
							{

							}
							this.push(scope.thiscomment);

						},scope.myFeedComments);
					scope['myfeed'+countt].myfeedComments=scope.myFeedComments;

					scope.returned_feeds.push(scope['myfeed'+countt]);

			 		if(scope.RandomFeed.kind == "review")
			 		{
			 			////////alert("kamenyo");
			 			if(attrs.page == 'business_page_owners_view_'){


			 			}else{
				 			myelement.prepend
				      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/review_feed.html").then(function(html){
						      //html = html.replace("myfeed","myfeed"+countt);
						      html =html.replace(/myfeed/g , "myfeed"+countt);
						      //////////////////alert(html);
						      var template = angular.element(html);
						      myelement.prepend(template);
						      $compile(template)(scope);
						      //scope.countt = scope.countt+1;
				  			 })
			      		 	);
				      		scope.defaults==0;
			      	   }


			 		}else if(scope.RandomFeed.kind == "review_photo")
			 		{
			 			scope.photo_toggle==0;
			 			scope['myfeed'+countt].photo = scope.RandomFeed.photo;

			 			myelement.prepend
			      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/review_photo_feed.html").then(function(html){
					      html =html.replace(/myfeed/g , "myfeed"+countt);

					      var template = angular.element(html);

					      myelement.prepend(template);
					      $compile(template)(scope);
			  			 })
		      		 	);
			      		scope.defaults==0;

			 		}

			 		scope.countt = scope.countt + 1;

			 		 //window.location.reload(true);
			 	});
			
	      	 });

			 	

			 }else if(element.context.classList.contains('post_comment'))
			 {
			 	//userid="{{user_id}}" myfeedid="{{myfeed.id}}" commentdetails="{{myfeed.comment_details}}" datecreated="myfeed.date_created" feedtype="rr" 
			 	//////console.log("commentate",attrs.userid);
			 	//////console.log("commentate",attrs.ourfeedid);
			 	//////console.log("commentate",attrs.commentdetails);
			 	//////console.log("commentate",attrs.datecreated);
			 	//////console.log("commentate",attrs.feedtype);

			 	
				 
				 	scope.postComment(attrs.userid,attrs.ourfeedid,attrs.commentdetails,attrs.datecreated,attrs.feedtype,function(data)
				 	{
				 		var comment_and_count =JSON.parse(data)
				 		scope.setCommentCount(attrs.ourfeedid,comment_and_count['comment_count']);
				 		scope.RandomComment=comment_and_count["comment"];
				 		var comcountt=scope.comcountt;
				 		attrs.commentdetails='';

				 	

				 		scope['comment'+comcountt]= new CommentViewModel();
				 		scope['comment'+comcountt].id =scope.RandomComment.id;
			 			scope['comment'+comcountt].person_avatar = scope.RandomComment.user.avatar;
			 			scope['comment'+comcountt].person_name = scope.RandomComment.user.first_name+" "+scope.RandomComment.user.last_name;
			 			scope['comment'+comcountt].isLikedByUser = 0;
			 			scope['comment'+comcountt].date_created = "just now";
			 			scope['comment'+comcountt].content = scope.RandomComment.details;
			 			scope['comment'+comcountt].parent_feed_id = attrs.ourfeedid;
			 			scope['comment'+comcountt].like_number = scope.RandomComment.like_number;

			 			//////console.log("the random feeds are," ,scope.returned_feeds);

			 			angular.forEach(scope.returned_feeds,function(value,key)
			 			{
			 				var comment_feed = value;
			 				if(comment_feed.id==attrs.ourfeedid)
			 				{
			 					comment_feed.myfeedComments.push(scope['comment'+comcountt]);
			 				}

			 			});

			 			
			 			//id="rrcommentors{{myfeed.id}}"
			 			scope.RandomComments.push(scope['comment'+comcountt]);
			 		

			 		

				 		if(attrs.feedtype=='rr'){
				 			var mycommentelement = angular.element(document.getElementById('rrcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rrtemplate = angular.element(html);
							      mycommentelement.append(rrtemplate);
							      $compile(rrtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("rrcontent"+attrs.ourfeedid).value="";
					  	
					  	}else if(attrs.feedtype=='rrp')
					  	{
					  		var mycommentelement = angular.element(document.getElementById('rrpcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rrptemplate = angular.element(html);
							      mycommentelement.append(rrptemplate);
							      $compile(rrptemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					  		document.getElementById("rrpcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='r')
					  	{
					  		var mycommentelement = angular.element(document.getElementById('commentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      	document.getElementById("content"+attrs.ourfeedid).value="";


					  	}else if(attrs.feedtype=='rp')
					  	{
					  		var mycommentelement = angular.element(document.getElementById('rpcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      	document.getElementById("rpcontent"+attrs.ourfeedid).value="";

					  	}else if(attrs.feedtype=='ra')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('racommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      	 document.getElementById("racontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='nf')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('nfcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );
					      		 document.getElementById("nfcontent"+attrs.ourfeedid).value="";

					  	}else if(attrs.feedtype=='ab')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('abcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );
					      		 document.getElementById("abcontent"+attrs.ourfeedid).value="";

					  	}else if(attrs.feedtype=='ap')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('apcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("apcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='atf')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('atfcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("atfcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='fb')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('fbcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("fbcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='bp')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('bpcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("bpcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sad')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('sadcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("sadcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sfav')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('sfavcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("sfavcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sfol')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('sfolcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("sfolcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sr')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('srcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("srcontent"+attrs.ourfeedid).value="";
					  	}
					  	else if(attrs.feedtype=='uinfo')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('uinfocommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("uinfocontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='rra')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('rracommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("rracontent"+attrs.ourfeedid).value="";
					  	}
					  	else if(attrs.feedtype=='apf')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('apfcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("apfcontent"+attrs.ourfeedid).value="";
					  	}

					  	scope.comcountt = scope.comcountt + 1;
				 	});
				 
			 }
		
		});
	};
}]).directive("ngEnter",['$compile','$templateRequest','config',function($compile,$templateRequest,config){
	
	return function(scope, element, attrs){

		element.bind("keydown keypress", function(event) {
                if(event.which === 13) {
                	//////////////alert("tigidi")
                        scope.$apply(function(){
                                scope.$eval(attrs.ngEnter);
                                scope.BaseImageURL = config.BaseImageURL;
			 //////console.log("the element is",element);
			 if(element.context.className=='post_review' || element.context.classList.contains('post_review') )
			 {
			 	 //////console.log("tigidify");

			 	scope.$apply(function(){
			 	scope.postReview(attrs.businessid,attrs.userid,attrs.randrate,attrs.randprice,attrs.randdate,attrs.randdetails,function(data)
			 	{
			 		scope.RandomFeed=JSON.parse(data);


			 		var countt=scope.countt;
			 		//var i=0;

			 		//var con =
			 		 
			 		//////////////////alert(scope.$eval(scope.countt+"mufrid"));
			 		scope['myfeed'+countt] = new ReviewModel();

			 		scope['myfeed'+countt].id =scope.RandomFeed.id;
			 		scope['myfeed'+countt].price = scope.RandomFeed.cost;
			 		scope['myfeed'+countt].rate = scope.RandomFeed.good;
			 		

			 		scope['myfeed'+countt].person_avatar=scope.RandomFeed.user.avatar;
			 		scope['myfeed'+countt].business_name = scope.RandomFeed.business.name;
			 		scope['myfeed'+countt].person_name =scope.RandomFeed.user.first_name+" "+scope.RandomFeed.user.last_name;
			 		scope['myfeed'+countt].business_id =scope.RandomFeed.business.id; 
			 		scope['myfeed'+countt].business_owner_id =scope.RandomFeed.business.owner_id;
			 		scope['myfeed'+countt].date_created = scope.RandomFeed.date_created;
			 		scope['myfeed'+countt].comment_count = 0;
			 		
			 		if(scope.RandomFeed.isLikedByUser==0)
			 		{
			 			scope['myfeed'+countt].likeToggleValue=0;

			 		}else if(scope.RandomFeed.isLikedByUser==1)
			 		{
			 			scope['myfeed'+countt].likeToggleValue=1;
			 		}
			 		//to be contnuied .....
			 		

			 				for(var i=0; i<scope['myfeed'+countt].rate; i++)
							{
								scope['myfeed'+countt].ratings[i]=i;
							}
							for(var j=0; j<scope['myfeed'+countt].price; j++)
							{
								scope['myfeed'+countt].pricings[j]=j;
							}

							for(var k=0; k<(5-scope['myfeed'+countt].rate); k++)
							{
								scope['myfeed'+countt].noratings[k]=k;
							}

							for(var l=0; l<(5-scope['myfeed'+countt].price); l++)
							{
								scope['myfeed'+countt].nopricings[l]=l;
							}
					// scope['myfeed'+countt].ratings =scope.ratings;
					// scope['myfeed'+countt].pricings =scope.pricings;
					// scope['myfeed'+countt].noratings =scope.noratings;
					// scope['myfeed'+countt].nopricings =scope.nopricings;
					scope['myfeed'+countt].content =scope.RandomFeed.details;

			 		//////console.log("the feed is",scope.RandomFeed);

			 		var myelement = angular.element(document.getElementById(attrs.page+'posters'));
			 		//////console.log("my element is",myelement);

			 		    scope.myFeedComments =[];

						angular.forEach(scope.myFeedComments,function(value,key)
						{
							scope.thiscomment=value;
							if(scope.thiscomment.isLikedByUser==0)
							{

							}else if(scope.thiscomment.isLikedByUser==1)
							{

							}
							this.push(scope.thiscomment);

						},scope.myFeedComments);
					scope['myfeed'+countt].myfeedComments=scope.myFeedComments;

					scope.returned_feeds.push(scope['myfeed'+countt]);

			 		if(scope.RandomFeed.kind == "review")
			 		{
			 			////////////alert("kamenyo");
			 			myelement.prepend
			      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/review_feed.html").then(function(html){
					      //html = html.replace("myfeed","myfeed"+countt);
					      html =html.replace(/myfeed/g , "myfeed"+countt);
					      //////////////////alert(html);
					      var template = angular.element(html);
					      myelement.prepend(template);
					      $compile(template)(scope);
					      //scope.countt = scope.countt+1;
			  			 })
		      		 	);

			 		}else if(scope.RandomFeed.kind == "review_photo")
			 		{
			 			scope.photo_toggle==0;
			 			scope['myfeed'+countt].photo = scope.RandomFeed.photo;

			 			myelement.prepend
			      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/review_photo_feed.html").then(function(html){
					      html =html.replace(/myfeed/g , "myfeed"+countt);

					      var template = angular.element(html);

					      myelement.prepend(template);
					      $compile(template)(scope);
			  			 })
		      		 	);

			 		}

			 		scope.countt = scope.countt + 1;

			 		 //window.location.reload(true);
			 	});
			
	      	 });

			 	

			 }else if(element.context.classList.contains('post_comment'))
			 {
			 	//userid="{{user_id}}" myfeedid="{{myfeed.id}}" commentdetails="{{myfeed.comment_details}}" datecreated="myfeed.date_created" feedtype="rr" 
			 	//////console.log("commentate",attrs.userid);
			 	//////console.log("commentate",attrs.ourfeedid);
			 	//////console.log("commentate",attrs.commentdetails.length);
			 	//////console.log("commentate",attrs.datecreated);
			 	//////console.log("commentate",attrs.feedtype);

			 	if(attrs.commentdetails.length){

			 	
				 
				 	scope.postComment(attrs.userid,attrs.ourfeedid,attrs.commentdetails,attrs.datecreated,attrs.feedtype,function(data)
				 	{
				 		var comment_and_count =JSON.parse(data)
				 		scope.setCommentCount(attrs.ourfeedid,comment_and_count['comment_count']);
				 		scope.RandomComment=comment_and_count["comment"];
				 		var comcountt=scope.comcountt;
				 		attrs.commentdetails='';
				 		//scope.RandomComments=[];

				 	

				 		scope['comment'+comcountt]= new CommentViewModel();
				 		scope['comment'+comcountt].id =scope.RandomComment.id;
			 			scope['comment'+comcountt].person_avatar = scope.RandomComment.user.avatar;
			 			scope['comment'+comcountt].person_name = scope.RandomComment.user.first_name+" "+scope.RandomComment.user.last_name;
			 			scope['comment'+comcountt].isLikedByUser = 0;
			 			scope['comment'+comcountt].date_created = 'just now';
			 			scope['comment'+comcountt].content = scope.RandomComment.details;
			 			scope['comment'+comcountt].parent_feed_id = attrs.ourfeedid;
			 			scope['comment'+comcountt].like_number = scope.RandomComment.like_number;

			 			//////console.log("the random feeds are," ,scope.returned_feeds);


			 			angular.forEach(scope.returned_feeds,function(value,key)
			 			{
			 				var comment_feed = value;
			 				if(comment_feed.id==attrs.ourfeedid)
			 				{
			 					comment_feed.myfeedComments.push(scope['comment'+comcountt]);
			 				}

			 			});

			 			//////console.log(scope.RandomComments);
			 			scope.RandomComments.push(scope['comment'+comcountt]);
			 		
			 			
			 		

				 		if(attrs.feedtype=='rr'){
				 			var mycommentelement = angular.element(document.getElementById('rrcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rrtemplate = angular.element(html);
							      mycommentelement.append(rrtemplate);
							      $compile(rrtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("rrcontent"+attrs.ourfeedid).value="";
					  	
					  	}else if(attrs.feedtype=='rrp')
					  	{
					  		var mycommentelement = angular.element(document.getElementById('rrpcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rrptemplate = angular.element(html);
							      mycommentelement.append(rrptemplate);
							      $compile(rrptemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					  		document.getElementById("rrpcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='r')
					  	{
					  		var mycommentelement = angular.element(document.getElementById('commentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      	document.getElementById("content"+attrs.ourfeedid).value="";


					  	}else if(attrs.feedtype=='rp')
					  	{
					  		var mycommentelement = angular.element(document.getElementById('rpcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      	document.getElementById("rpcontent"+attrs.ourfeedid).value="";

					  	}else if(attrs.feedtype=='ra')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('racommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      	 document.getElementById("racontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='nf')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('nfcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );
					      		 document.getElementById("nfcontent"+attrs.ourfeedid).value="";

					  	}else if(attrs.feedtype=='ab')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('abcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );
					      		 document.getElementById("abcontent"+attrs.ourfeedid).value="";

					  	}else if(attrs.feedtype=='ap')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('apcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("apcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='atf')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('atfcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("atfcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='fb')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('fbcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("fbcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='bp')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('bpcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("bpcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sad')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('sadcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("sadcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sfav')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('sfavcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("sfavcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sfol')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('sfolcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("sfolcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='sr')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('srcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("srcontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='uinfo')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('uinfocommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("uinfocontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='rra')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('rracommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("rracontent"+attrs.ourfeedid).value="";
					  	}else if(attrs.feedtype=='apf')
					  	{ 
					  		var mycommentelement = angular.element(document.getElementById('apfcommentors'+attrs.ourfeedid));
				 			mycommentelement.append
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/comment.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/comment/g , 'comment'+comcountt);
							      //////////////////alert(html);
							      var rtemplate = angular.element(html);
							      mycommentelement.append(rtemplate);
							      $compile(rtemplate)(scope);
							      //scope.countt = scope.countt+1;
					  			 })
			  				 );

					      		 document.getElementById("apfcontent"+attrs.ourfeedid).value="";
					  	}

					  	scope.comcountt = scope.comcountt + 1;
				 	});
					//////console.log("kabaata");
					
					//////console.log("new length",attrs.commentdetails.length);
				}
				 
			 }
		


                        });
                        
                        event.preventDefault();
                }
         });

		

		element.bind("click", function(){
			//scope.postReview(scope.random_business.id,user_id,scope.rate,scope.price,scope.date_created,scope.details)
			//"<div><button class='btn btn-default'>Show //////////////////alert #"+scope.countt+"</button></div>"
			
		});
	};
}])
.directive('likeComment',['',function()
{
	return function(scope,element,attrs)
	{
		element.bind('click',function()
		{
			scope.$apply(function()
			{
						currentcomment.isLikedByUser=1;
 						$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					//////////////////alert(data);
        					comment.like_number=parseInt(data);
        					$scope.$digest();
    					});
			});


		});

	};
}])
.controller('RandomBusinessCtrl', ['$scope','GetData','BusinessViewModel','config','ngDialog','CommentViewModel',function ($scope,GetData,BusinessViewModel,config,ngDialog,CommentViewModel) {
	$scope.countt=1;
	$scope.comcountt=1;
 	$scope.businessModels = [];
	$scope.BaseURL=config.BaseURL;
	$scope.BaseImageURL=config.BaseImageURL;
	$scope.rating=0;
	$scope.rating=0;
	$scope.photo_toggle=0;
	$scope.returned_feeds=[];
	$scope.rate = 0;
  	$scope.price =0;
  	$scope.RandomComments=[];
	//pickRandomBiz();
 	//$scope.user_id='';

 angular.element(document).ready(
 function(){
 	//////////console.log($scope.city_id);
 	//////////console.log($scope.user_id);


 	//in future link will contain city_id
 	
 	GetData.getData(config.BaseURL+'classes/util.php?businesses_to_follow=random&user_id='+$scope.user_id,function(data)
 	{
 		////////console.log("This is random");
 		$scope.randomBusinesses = data;
 		angular.forEach($scope.randomBusinesses,function(value,key)
 		{
 			$scope.currentRandomBusiness = value;
 			if($scope.currentRandomBusiness.logo ==null || $scope.currentRandomBusiness.logo =='')
 			{
 				$scope.currentRandomBusiness.logo=config.BaseImageURL+"uploads/defbanner.png";
 			}else
 			{
 				$scope.currentRandomBusiness.logo=config.BaseImageURL+$scope.currentRandomBusiness.logo;
 			}
 			$scope.viewModel = new BusinessViewModel();
 			$scope.viewModel.id = $scope.currentRandomBusiness.id;
 			$scope.viewModel.un_enc_id = $scope.currentRandomBusiness.un_enc_id;
 			$scope.viewModel.logo =$scope.currentRandomBusiness.logo;
 			$scope.viewModel.name = $scope.currentRandomBusiness.name;
 			$scope.viewModel.address=$scope.currentRandomBusiness.address;
 			$scope.viewModel.rating = $scope.currentRandomBusiness.good;
 			$scope.viewModel.pricing=$scope.currentRandomBusiness.cost;
 			$scope.viewModel.isfollowed=$scope.currentRandomBusiness.isFollowed;

 			

 			//$scope.rating_array =[];
 			//$scope.non_rating_array =[];
 			//$scope.pricing_array =[];
 			//$scope.non_pricing_array =[];

 			for(var i=0;i<$scope.currentRandomBusiness.cost;i++)
 			{	
 				$scope.viewModel.pricings.push(i);
 				////////console.log("addes to price");
 			}
 			for(var i=0;i<5-$scope.currentRandomBusiness.cost;i++)
 			{	
 				$scope.viewModel.nopricings.push(i);
 				////////console.log("addes to nonprice");
 			}

 			for(var i=0;i<$scope.currentRandomBusiness.good;i++)
 			{	
 				$scope.viewModel.ratings.push(i);
 				////////console.log("added to rate");
 			}
 			for(var i=0;i<5-$scope.currentRandomBusiness.good;i++)
 			{	
 				$scope.viewModel.noratings.push(i);
 				////////console.log("added to norate");
 			}

 			if($scope.viewModel.isfollowed=='false'){
 				this.push($scope.viewModel);
 			}
 			
 			



 		},$scope.businessModels);

 	});

 });


 	//$scope.followtoggle = 0;
	$scope.random_business=null;
	$scope.pickRandomBiz= function()
	{
		////////////////////alert("big man");

		 $.get(config.BaseURL+"classes/util.php?one_business=random",function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////////////////////alert("results are"+results);
						$scope.pre_random_business =JSON.parse(results);

						if($scope.pre_random_business.logo ==null || $scope.pre_random_business.logo =='')
			 			{
			 				$scope.pre_random_business.logo=config.BaseImageURL+"uploads/defbanner.png";
			 			}else
			 			{
			 				$scope.pre_random_business.logo=config.BaseImageURL+$scope.pre_random_business.logo;
			 			}
						$scope.random_business=$scope.pre_random_business;
						$scope.rate = 0;
  						$scope.price =0;
						////////////console.log("The random business -s =====>",$scope.random_business);
						// <pre><code>
						
						// </code>
						// </pre>
				  //	$("#randoms").append(results);
				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});

	}

	$scope.setCommentCount=function(feed_id,comment_count)
	{
		angular.forEach($scope.returned_feeds,function(value,key)
		{
			$scope.cfeed=value;
			if($scope.cfeed.id==feed_id)
			{
				$scope.cfeed.comment_count=comment_count;
			}

		});



	}




	

	$scope.toBusiness=function(user_id,business_id)
	{
		$.get(config.BaseURL+"classes/util.php?business_id="+business_id+"&business_claimer_id="+user_id,function(data){

	        var mybusiness = JSON.parse(data);
	      //  //////////////////alert(mybusiness);
	        ////////////////////alert(mybusiness.owned);

	        if(mybusiness.owned=="yes")
	        {
	        	////////////////////alert(data.owned);
	        //	//////////////////alert('nkiraba')
	        	$.get(config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness.id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  //	//////////////////alert("results");
				  	window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness.id;
				});


	        	//window.location ="http://localhost:89//yammzit/Yammz/business_page_owners_view.php";
	        }else if(mybusiness.owned=="no")
	        {   ////////////////////alert(data.owned);
	        	//window.location ="http://localhost:89//yammzit/Yammz/business_page_3.php";
	        	$.get(config.BaseURL+"business_page_3.php?current_business_id="+mybusiness.id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////////////////////alert("results");
				  	window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+mybusiness.id;
				});


	        	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php";
	        }
	    });

	}

	$scope.likeToggleValue=0;
	$scope.likeNo=0;

	$scope.likeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		////////////alert("i laike");

 		//$scope.like =1;
 		
    	angular.forEach($scope.returned_feeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////alert("am liking this feed");
 				//currentfeed.likeToggleValue=1;
 				angular.forEach(currentfeed.myfeedComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						////////////alert("am liking this comment feed");
 						currentcomment.isLikedByUser=1;
 						$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 			}

 		});

 	}
 	$scope.unlikeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		//$scope.like =0;
 		

    	angular.forEach($scope.returned_feeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////////////alert("am liking this feed");
 				//currentfeed.likeToggleValue=1;
 				angular.forEach(currentfeed.myfeedComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=0;
 						$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					//////////////////alert(data);
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 			}

 		});

 	}
	

		$scope.likeNFItem=function(user_id,newsfeed_id)
 		{
 		//////////////alert("tigidify");

 		//////console.log($scope.returned_feeds);

 		angular.forEach($scope.returned_feeds,function(value,key)
 		{
 			$scope.thissfeed = value;
 			if($scope.thissfeed.id==newsfeed_id)
 			{
 				$scope.thissfeed.likeToggleValue=1;
 				$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        			////////////////////alert(data);
        			var datafig = data;
        			$scope.thissfeed.likeNo=parseInt(datafig);
        			//$scope.$digest();
        			////////////////////alert(currentfeed.likeNo);
    			});
 				//////////////alert("tigidi");
 			}

 		});
 				
 				

 		}
 	$scope.unlikeNFItem=function(user_id,newsfeed_id)
 	{

 		angular.forEach($scope.returned_feeds,function(value,key)
 		{
 			$scope.thissfeed = value;
 			if($scope.thissfeed.id==newsfeed_id)
 			{
 				$scope.thissfeed.likeToggleValue=0;
 				

 				$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        				////////////////////alert(data);
        			
        			var datafig = data;
        			$scope.thissfeed.likeNo=parseInt(datafig);
        			$scope.$digest();
        			////////////////////alert(currentfeed.likeNo);
    			});
 		
 			}

 		});


    	
 	}

 	$scope.shareItem = function (item_type,item_id) {
		$scope.dataObj =
		{
			'item_type':item_type,
			'item_id':item_id,
			'user_id':$scope.user_id,
			'picker_type': $scope.picker_type

		}
        ngDialog.open({ 

        	template: config.BaseURL+'dialogs/share_dialog.php',
        	controller: 'RandomBusinessCtrl',
         	className: 'ngdialog-theme-default' ,
         	data: $scope.dataObj
         });
    };
    $scope.shareAll=function(user_id,item_id,item_type)
    {
    	
    	$.get(BaseURL+"classes/util.php?friendsnfollowers=all&buddy_id="+user_id+"&item_id="+item_id+"&item_type="+item_type,function(data){
        	//////////////////alert(data);
   		});

    }

    $scope.postComment=function(user_id,feed_id,details,date_created,type,callback)
	{
		////////////////////alert("gone");
		//var details = document.getElementById("content"+feed_id).value;
		var kind ="normal";
		var commentTo = 0;

		if (details != "") {
	        ////////////////////alert(val);
	        $.get(BaseURL+"classes/util.php?comment_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&feed_id="+feed_id+"&commentTo="+commentTo+"&details="+details,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////////////////////alert("results are"+results);
				  	callback(results);
			});
	    }
	   // document.getElementById(type+"content"+feed_id).value=""
	}

	$scope.last_new_feed=null;
	$scope.upload_fille= function ()
	{
		$scope.photo_toggle=1; 
		document.getElementById("random_biz_file_attach").click();
		
		
	}

	$scope.$watch('myFile',function()
	{
		//////////////alert("tigidi");
		// if($scope.photo_toggle==1)
		// {
		// 	$scope.photo_toggle=0;
		// }else
		// {	
		// 	//$scope.photo_toggle=1;

		// }
		

	});

	$scope.ratings =[];
	$scope.pricings =[];
	$scope.noratings =[];
	$scope.nopricings =[];


	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details,callback)
	{
		var image = $scope.myFile;
		//////alert(business_id);
		//////alert(user_id);
		//////alert(rating);
		//////alert(pricing);
		//////alert(date_created);
		//////alert(details);
		////////alert(template);
		//////console.log("image is",image);

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if(image !=null){
			
					////////////////////alert(val);
					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("picture",image);
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","review_photo");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//$("#posters").prepend(response);
						//////////////////alert("buddy am in the thing");
						//$scope.RandomFeed =JSON.parse(response);
						
						callback(response);	
						$scope.myFile=null;
						
						
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log("The error is",errorMessage); 
					}
					});
					
					// $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&good="+rating+"&cost="+pricing+"&details="+details+"&business_id="+business_id,function(results){
						
					// 			$("#posters").prepend(results);

					// });
			
		}else if(image==null || image==undefined)
		{
			////////////alert("buddy man");

			if (details != "") 
			{

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","review");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////////////////////alert("buddy am in the thing");
						$scope.RandomFeed =JSON.parse(response);
						
							for(var i=0; i<$scope.RandomFeed.good; i++)
							{
								$scope.ratings[i]=i;
							}
							for(var j=0; j<$scope.RandomFeed.cost; j++)
							{
								$scope.pricings[j]=j;
							}

							for(var k=0; k<(5-$scope.RandomFeed.good); k++)
							{
								$scope.noratings[k]=k;
							}

							for(var l=0; l<(5-$scope.RandomFeed.cost); l++)
							{
								$scope.nopricings[l]=l;
							}
						//////console.log("myddy ratings",$scope.ratings);
						//////console.log("myddy noratings",$scope.noratings);
						//////console.log("myddy pricings",$scope.pricings);
						//////console.log("myddy nopricings",$scope.nopricings);
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}

		}
		$scope.photo_toggle=0;
	    $scope.details="";
	}


 	$scope.followItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.

 		////////////console.log('the user_id is',$scope.user_id,user_id)
 				$scope.postFavfollowReview(item_id,user_id,0,0,"business_follow",$scope.date_created,"add_to_followed");

 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=1;
				
				$("#buz"+item_id).hide();
		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.

 		////////////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=0;

		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.postFavfollowReview=function(business_id,user_id,rating,pricing,kind,date_created,details)
	{
		

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		
			
		
			if (details != "") 
			{

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind",kind);
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert(response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}

		
	    //$scope.details="";
	}

	//business_rating

  
  $scope.max = 5;
  $scope.isReadonly = false;

  $scope.hoveringOver = function(value) {
 	 $scope.overStar = value;
 	 $scope.percent = 100 * (value / $scope.max);
  };
  $scope.hoveringOverPrice = function(value) {
 	 $scope.overPrice = value;
 	 $scope.percent = 100 * (value / $scope.max);
  };

  $scope.ratingStates = [
 	 {stateOn: 'ion-social-usd', stateOff: 'ion-social-usd-outline'},
 	 {stateOn: 'glyphicon-star', stateOff: 'glyphicon-star-empty'},
 	 {stateOn: 'glyphicon-heart', stateOff: 'glyphicon-ban-circle'},
 	 {stateOn: 'glyphicon-heart'},
 	 {stateOff: 'glyphicon-off'}
  ];

 }])
.value('BusinessViewModel',BusinessViewModel)
.value('CommentViewModel',CommentViewModel)
.controller('SideAddCtrl', ['$scope','GetData','config', function ($scope,GetData,config) {

 	$scope.side_addModels = [];
 	//$scope.randomSide_adds = [];
 	
 	GetData.getData(config.BaseURL+'classes/util.php?side_adds=random',function(data)
 	{
 		//console.log("the sideadddshh are",data);
 		// var dataarry = data;
 		// for(var i=0;i<dataarry.length;i++)
 		// {
 		// 	var item = dataarry[Math.floor(Math.random()*dataarry.length)];
 		// 	if($scope.containsObject(item, $scope.randomSide_adds))
 		// 	{
 		// 		$scope.randomSide_adds.push(item);
 		// 	}else
 		// 	{
 		// 		$scope.randomSide_adds.push(item);
 		// 	}
 		// }
 		$scope.randomSide_adds = data;
 		angular.forEach($scope.randomSide_adds,function(value,key)
 		{
 			$scope.currentRandomSide_add = value;
 			//console.log("The side as is",$scope.currentRandomSide_add);
 			// //alert("The side as is"+$scope.currentRandomSide_add);
 			if($scope.currentRandomSide_add.business_logo ==null || $scope.currentRandomSide_add.business_logo=='')
 			{
 				$scope.currentRandomSide_add.business_logo=config.BaseImageURL+"uploads/deflogo.png";
 			}else
 			{
 				$scope.currentRandomSide_add.business_logo=config.BaseImageURL+$scope.currentRandomSide_add.business_logo;
 			}

 			if($scope.currentRandomSide_add.image==null || $scope.currentRandomSide_add.image=='')
 			{
 				if(key==0){
 					$scope.currentRandomSide_add.image= config.BaseImageURL+"uploads/web_side_ad_1.png";
 				}else if(key ==1)
 				{
 					$scope.currentRandomSide_add.image= config.BaseImageURL+$scope.currentRandomSide_add.image;
 				}
 			}else
 			{
 				$scope.currentRandomSide_add.image=config.BaseImageURL+$scope.currentRandomSide_add.image;
 			}
 			$scope.viewModel = new SideAddViewModel();
 			$scope.viewModel.id = $scope.currentRandomSide_add.id;
 			$scope.viewModel.enc_business_id=$scope.currentRandomSide_add.enc_business_id;
 			$scope.viewModel.business_id=$scope.currentRandomSide_add.business_id;
 			$scope.viewModel.business_name =$scope.currentRandomSide_add.business_name;
 			$scope.viewModel.business_logo = $scope.currentRandomSide_add.business_logo;
 			$scope.viewModel.details=$scope.currentRandomSide_add.details;
 			$scope.viewModel.image=$scope.currentRandomSide_add.image;
 			$scope.viewModel.title=$scope.currentRandomSide_add.title;
 			this.push($scope.viewModel);



 		},$scope.side_addModels);

 	});

 	$scope.containsObject=function (obj, list) {
	    var i;
	    for (i = 0; i < list.length; i++) {
	        if (list[i] === obj) {
	            return true;
	        }
	    }

	    return false;
   }

 	$scope.followItem = function(item_type,user_id,item_id)
 	{
 				$.get("http://localhost:89//yammzit/Yammz/classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});



 	}

 }])

.value('SideAddViewModel', SideAddViewModel)
.controller('MiddleAddCtrl', ['$scope','GetData','config' ,function ($scope,GetData,config) {

 	$scope.middle_addModels = [];
 	GetData.getData(config.BaseURL+'classes/util.php?middle_adds=all',function(data)
 	{
 		$scope.middle_adds = data;
 		angular.forEach($scope.middle_adds,function(value,key)
 		{
 			$scope.currentMiddle_add = value;
 			if($scope.currentMiddle_add.business.logo ==null || $scope.currentMiddle_add.business.logo=='')
 			{
 				$scope.currentMiddle_add.business.logo=config.BaseImageURL+"uploads/deflogo.png";
 			}else
 			{
 				$scope.currentMiddle_add.business.logo=config.BaseImageURL+$scope.currentMiddle_add.business.logo;
 			}

 			if($scope.currentMiddle_add.business.banner ==null || $scope.currentMiddle_add.business.banner=='')
 			{
 				$scope.currentMiddle_add.business.banner=config.BaseImageURL+"uploads/defbanner.png";
 			}else
 			{
 				$scope.currentMiddle_add.business.banner=config.BaseImageURL+$scope.currentMiddle_add.business.banner;
 			}


 			$scope.viewModel = new MiddleAddViewModel();
 			$scope.viewModel.id = $scope.currentMiddle_add.id;
 			$scope.viewModel.business_name =$scope.currentMiddle_add.business.name;
 			$scope.viewModel.business_logo = $scope.currentMiddle_add.business.logo;
 			$scope.viewModel.details=$scope.currentMiddle_add.details;
 			$scope.viewModel.business_image=$scope.currentMiddle_add.business.banner;
 			this.push($scope.viewModel);



 		},$scope.middle_addModels);

 	});


 }])

 .value('MiddleAddViewModel', MiddleAddViewModel)

.controller('favouriteBusinessCtrl', ['$scope','GetData','BusinessViewModel','config',function ($scope,GetData,BusinessViewModel,config) {


 $scope.businessModels = [];
 $scope.count=0;
 	GetData.getData(config.BaseURL+'classes/util.php?favourite_business_picker='+$scope.user_id,function(data)
 	{
 		$scope.FavouriteBusinesses = data;
 		angular.forEach($scope.FavouriteBusinesses,function(value,key)
 		{
 			$scope.currentFavouriteBusiness = value;
 			if($scope.currentFavouriteBusiness.logo ==null || $scope.currentFavouriteBusiness =='')
 			{
 				$scope.currentFavouriteBusiness.logo=config.BaseImageURL+"uploads/defbanner.png";
 			}else
 			{
 				$scope.currentFavouriteBusiness.logo=config.BaseImageURL+$scope.currentFavouriteBusiness.logo;
 			}
 			$scope.viewModel = new BusinessViewModel();
 			$scope.viewModel.id = $scope.currentFavouriteBusiness.id;
 			$scope.viewModel.logo =$scope.currentFavouriteBusiness.logo;
 			$scope.viewModel.name = $scope.currentFavouriteBusiness.name;
 			$scope.viewModel.address=$scope.currentFavouriteBusiness.address;
 			this.push($scope.viewModel);
 			$scope.count++;



 		},$scope.businessModels);

 	});

 	$scope.followItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.

 		////////////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=1;
		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.

 		////////////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=0;

		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}



 }])
 
.controller('MyBusinessCtrl', ['$scope','GetData','BusinessViewModel','config', function ($scope,GetData,BusinessViewModel,config) {


  $scope.businessModels = [];
  $scope.count=0;

 	GetData.getData(config.BaseURL+'classes/util.php?My_businesses_picker='+$scope.user_id,function(data)
 	{
 		$scope.FavouriteBusinesses = data;
 		angular.forEach($scope.FavouriteBusinesses,function(value,key)
 		{
 			$scope.currentFavouriteBusiness = value;
 			if($scope.currentFavouriteBusiness.logo ==null || $scope.currentFavouriteBusiness =='')
 			{
 				$scope.currentFavouriteBusiness.logo=config.BaseImageURL+"uploads/defbanner.png";
 			}else
 			{
 				$scope.currentFavouriteBusiness.logo=config.BaseImageURL+$scope.currentFavouriteBusiness.logo;
 			}
 			$scope.viewModel = new BusinessViewModel();
 			$scope.viewModel.id = $scope.currentFavouriteBusiness.id;
 			$scope.viewModel.logo =$scope.currentFavouriteBusiness.logo;
 			$scope.viewModel.name = $scope.currentFavouriteBusiness.name;
 			$scope.viewModel.address=$scope.currentFavouriteBusiness.address;
 			this.push($scope.viewModel);
 			$scope.count++;


 		},$scope.businessModels);

 	});



 }])
 
.controller('AddedBusinessCtrl', ['$scope','GetData','BusinessViewModel','config', function ($scope,GetData,BusinessViewModel,config) {


 $scope.businessModels = [];
 $scope.count =0;

 	GetData.getData(config.BaseURL+'classes/util.php?Added_businesses_picker='+$scope.user_id,function(data)
 	{
 		$scope.FavouriteBusinesses = data;

 		angular.forEach($scope.FavouriteBusinesses,function(value,key)
 		{
 			$scope.currentFavouriteBusiness = value;
 			if($scope.currentFavouriteBusiness.logo ==null || $scope.currentFavouriteBusiness =='')
 			{
 				$scope.currentFavouriteBusiness.logo=config.BaseImageURL+"uploads/defbanner.png";
 			}else
 			{
 				$scope.currentFavouriteBusiness.logo=config.BaseImageURL+$scope.currentFavouriteBusiness.logo;
 			}
 			$scope.viewModel = new BusinessViewModel();
 			$scope.viewModel.id = $scope.currentFavouriteBusiness.id;
 			$scope.viewModel.logo =$scope.currentFavouriteBusiness.logo;
 			$scope.viewModel.name = $scope.currentFavouriteBusiness.name;
 			$scope.viewModel.address=$scope.currentFavouriteBusiness.address;
 			this.push($scope.viewModel);

 			$scope.count++;

 		},$scope.businessModels);

 	});



 }])

 .controller('FullUserCtrl', ['$scope','GetData','BusinessViewModel','config','CountryViewModel','CityViewModel',function ($scope,GetData,BusinessViewModel,config,CountryViewModel,CityViewModel) {

 	$scope.rowcount=0;
 	$scope.businessModels=[];
 	$scope.countryModels=[];
	$scope.showdefault=0;
 	//$scope.defaults=0;

	$scope.sexify =function ()
	{
		$scope.sex = document.getElementById("hidden_sex").value;

		if($scope.sex=="male")
		{
			document.getElementById("male_radio").checked = true;
			document.getElementById("female_radio").checked = false;
		}else if($scope.sex=="female")
		{
			document.getElementById("male_radio").checked = false;
			document.getElementById("female_radio").checked = true;
		}

	}

		$scope.picture_change = function(e,keyword)
 		{

			//////alert("tigidi");
			
			//////console.log("the e is",e)

			////////console.log("files is ->",e.target.files);

			if (e.target.files && e.target.files[0]) {

	            var reader = new FileReader();
	            ////////console.log('my reader is ',reader);


	            reader.onload = function (e) {
	            	////////console.log('my event is ',reader.result);
	            	// ////////////console.log('my event mikemdd is ',e);
	            	//$scope.client.avatar=e.target.result;
	           		////////console.log("scope picutre is ->",$scope.client.avatar);
	            			
	            	 if(/^avatar$/.test(keyword))
	            	 {
	            	 	$scope.fullUser.user.avatar=e.target.result;
	            	 	////////console.log("banner is ->",$scope.FullBusiness.business.banner);
	            	 }	
	           		
	           		
	           		$scope.$digest();
	       					


	                   
	            };

	            reader.readAsDataURL(e.target.files[0]);
	        }

	
	

	}


	$scope.updateCities = function(country_id)
	{
		//$scope.FullBusiness.business.city =null;
		////console.log("The country id is ",country_id);
		////console.log("updating cities");
		$scope.showdefault=1;
		GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			
			$scope.fullUser.user.city =$scope.cityModels[0];
		});

	}




	if ($scope.who=='me') 
	{
		$scope.idVal=$scope.user_id;

	}else if($scope.who=='him')
	{
		$scope.idVal=$scope.reciever_id;
	}

$scope.postUserEdit = function()
{
					//////alert(document.getElementById("example3").value);
					$scope.dob=document.getElementById("example3").value;
					
					//console.log(" The dob is",$scope.dob);
					var form_data = new FormData();
					form_data.append("edit_user","edit_user");
					form_data.append("user_id",$scope.fullUser.user.un_enc_id);
					form_data.append("first_name",$scope.fullUser.user.first_name);
					form_data.append("last_name",$scope.fullUser.user.last_name);
					form_data.append("country_id",$scope.fullUser.user.country.id);
					form_data.append("city_id",$scope.fullUser.user.city.id);
					form_data.append("email",$scope.fullUser.user.email);
					form_data.append("alt_email",$scope.fullUser.user.alternative_email);
					form_data.append("phone",$scope.fullUser.user.phone_number);
					form_data.append("dob",$scope.dob);
					form_data.append("gender",$scope.fullUser.user.sex);
					form_data.append("profile_pic",$scope.my_avatar);

					form_data.append("facebook_link",$scope.fullUser.user.facebook_link);
					form_data.append("twitter_link",$scope.fullUser.user.twitter_link);
					form_data.append("youtube_link",$scope.fullUser.user.youtube_link);
					form_data.append("instagram_link",$scope.fullUser.user.instagram_link);

					 form_data.append("old_pass",document.getElementById("first_pass").value);
					 form_data.append("new_pass",$scope.newpass);
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////alert(response);
						var mybusiness_id =response;
						window.location.href=config.BaseURL+"user_profile.php?id="+mybusiness_id;

					},
					error: function(jqXHR, textStatus, errorMessage) {
						//console.log("The edit error",errorMessage); // Optional
					}
					});

}

	

angular.element(document).ready(function(){
	
           ////////////////////alert("buddido");




			////////////////////alert("buddy man");
			$('#reviews_profile_tab').show();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').show();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();

	 //getting all countries

	GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
	{	$scope.countries =data;
		angular.forEach($scope.countries, function(value,key)
		{
			$scope.currentCountry =value;
			$scope.countryModel = new CountryViewModel();
			$scope.countryModel.id = $scope.currentCountry['id'];
			$scope.countryModel.name = $scope.currentCountry['name'];
			$scope.countryModel.country_code= $scope.currentCountry['code'];


			this.push($scope.countryModel);
		},$scope.countryModels);


	});

	        //config.BaseURL+'classes/util.php?my_profile_data_picker_id='+$scope.idVal
 	GetData.getData(config.BaseURL+'classes/util.php?my_profile_data_picker_id='+$scope.idVal,function(data)
 	{
			//$scope.sexify();
			////////////////////alert("bussy");
		//////console.log("The id val is",$scope.idVal);
 		$scope.fullUser= data;
 		$scope.rowCollection =[];
 		$scope.rrowCollection =[];
 		$scope.rrrowCollection =[];

		$scope.photo_count =$scope.fullUser.photo_count;
 		$scope.review_number =$scope.fullUser.review_count;
 		$scope.follower_number=$scope.fullUser.follower_count;

 		////////////console.log("The number of reviews is -=====>", $scope.review_number);
		 if($scope.fullUser.user.avatar =="" || $scope.fullUser.user.avatar==null)
		 {
			 $scope.fullUser.user.avatar=config.BaseImageURL+'uploads/defavatar.png';
		 }else if($scope.fullUser.user.avatar.startsWith("http"))
		 {
			 $scope.fullUser.user.avatar=$scope.fullUser.user.avatar;
		 }else
		 {
			 $scope.fullUser.user.avatar=config.BaseImageURL+$scope.fullUser.user.avatar;
		 }

		 $scope.cityModels =$scope.fullUser.user.country.towns;

 		angular.forEach($scope.fullUser.friends,function(value,key)
 		{
 			$scope.friend =value;
 			if ($scope.who=='me') 
			{
				//$scope.idVal=$scope.user_id;
				if($scope.friend.id == $scope.reciever_id)
 				{
 					$scope.friendtoggle=2;
 				}

			}else if($scope.who=='him')
			{
				if($scope.friend.id == $scope.user_id)
 				{
 					$scope.friendtoggle=2;
 				}
			}
 			
 			if($scope.friend.avatar == null || $scope.friend.avatar =='')
 			{
 				$scope.friend.avatar=config.BaseImageURL+'uploads/defavatar.png';
 			}else if($scope.friend.avatar.startsWith("http"))
 			{
 				$scope.friend.avatar=$scope.friend.avatar;
 			}else
 			{
 				$scope.friend.avatar=config.BaseImageURL+$scope.friend.avatar;
 			}



 		});
 		$scope.friendsCount =$scope.fullUser.friends.length;
 		if(($scope.friendsCount)%2==0)
 		{
 			$scope.rowcount=($scope.friendsCount)/2;

 		}else if(($scope.friendsCount)%2==1)
 		{
 			$scope.rowcount=(($scope.friendsCount-1)/2)+1;
 		}
 		//splitted into two
 		$scope.twotwoFriends=[];
 		var size = 2;


 		////////////console.log("friends are"+$scope.fullUser.friends);

		var a = $scope.fullUser.friends;
			while(a.length) {
			    $scope.twotwoFriends.push(a.splice(0,2));
			}


		 //////////////console.log("friends are"+$scope.fullUser.friends);
		 ////////////console.log("arrays are"+$scope.twotwoFriends);
		 //splitted into two
 		////////////console.log("the buddy count ="+$scope.friendsCount);
 		////////////console.log("the row count ="+$scope.rowcount);
 		$scope.currenttwotwofriend =[];

 		for(var i=0;i<$scope.rowcount; i++)
 		{
 			$scope.rowCollection[i]="row"+i;
 		}
 		////////////console.log("the rows are ="+$scope.rowCollection);

 		$scope.friend_requests=[];
 		angular.forEach($scope.fullUser.friend_requests,function(value,key)
 		{
 			$scope.friend_request = value;

 			if($scope.friend_request.id == $scope.reciever_id)
 			{
 				$scope.friendtoggle=1;
 			}
 			if($scope.friend_request.avatar == null || $scope.friend_request.avatar =='')
 			{
 				$scope.friend_request.avatar=config.BaseImageURL+'uploads/defavatar.png';
 			}else if($scope.friend_request.avatar.startsWith("http"))
 			{
 				$scope.friend_request.avatar=$scope.friend_request.avatar;
 			}else
 			{
 				$scope.friend_request.avatar=config.BaseImageURL+$scope.friend_request.avatar;
 			}

 			this.push($scope.friend_request);

 		},$scope.friend_requests);


 		angular.forEach($scope.fullUser.followers,function(value,key)
 		{
 			$scope.follower =value;
 			if($scope.follower.avatar == null || $scope.follower.avatar =='')
 			{
 				$scope.follower.avatar=config.BaseImageURL+'uploads/defavatar.png';
 			}else if($scope.follower.avatar.startsWith("http"))
 			{
 				$scope.follower.avatar=$scope.follower.avatar;
 			}else
 			{
 				$scope.follower.avatar=config.BaseImageURL+$scope.follower.avatar;
 			}



 		});

 		$scope.rrowcount=0;
 		$scope.followersCount =$scope.fullUser.followers.length;
 		if(($scope.followersCount)%2==0)
 		{
 			$scope.rrowcount=($scope.followersCount)/2;

 		}else if(($scope.followersCount)%2==1)
 		{
 			$scope.rrowcount=(($scope.followersCount-1)/2)+1;
 		}
 		//splitted into two
 		$scope.twotwofollowers=[];
 		size = 2;
 		var b = $scope.fullUser.followers;
			while(b.length) {
			    $scope.twotwofollowers.push(b.splice(0,2));
			}
		$scope.currenttwotwofollower =[];

 		for(var i=0;i<$scope.rrowcount; i++)
 		{
 			$scope.rrowCollection[i]="row"+i;
 		}
 		//////////////console.log("the rows are ="+$scope.rowCollection);

 		$scope.people_i_follow_count=$scope.fullUser.people_i_follow_count;
 		angular.forEach($scope.fullUser.people_i_follow,function(value,key)
 		{
 			$scope.person_i_follow =value;
 			if($scope.person_i_follow.avatar == null || $scope.person_i_follow.avatar =='')
 			{
 				$scope.person_i_follow.avatar=config.BaseImageURL+'uploads/defavatar.png';
 			}else if($scope.person_i_follow.avatar.startsWith("http"))
 			{
 				$scope.person_i_follow.avatar=$scope.person_i_follow.avatar;
 			}else
 			{
 				$scope.person_i_follow.avatar=config.BaseImageURL+$scope.person_i_follow.avatar;
 			}



 		});

 		$scope.rrrowcount=0;
 		$scope.people_i_followCount =$scope.fullUser.people_i_follow.length;
 		if(($scope.people_i_followCount)%2==0)
 		{
 			$scope.rrrowcount=($scope.people_i_followCount)/2;

 		}else if(($scope.people_i_followCount)%2==1)
 		{
 			$scope.rrrowcount=(($scope.people_i_followCount-1)/2)+1;
 		}
 		//splitted into two
 		$scope.twotwopeople_i_follow=[];
 		size = 2;
 		var c = $scope.fullUser.people_i_follow;
			while(c.length) {
			    $scope.twotwopeople_i_follow.push(c.splice(0,2));
			}
		$scope.currenttwotwopeople_i_follow =[];

 		for(var i=0;i<$scope.rrrowcount; i++)
 		{
 			$scope.rrrowCollection[i]="row"+i;
 		}


 		angular.forEach($scope.fullUser.photos,function(value,key)
 		{
 			$scope.photorow =value;
 			if($scope.photorow.photo == null || $scope.photorow.photo =='')
 			{
 				$scope.photorow.photo=config.BaseImageURL+'uploads/capture.png';
 			}else if($scope.photorow.photo.startsWith("http"))
 			{
 				$scope.photorow.photo=$scope.photorow.photo;
 			}else
 			{
 				$scope.photorow.photo=config.BaseImageURL+$scope.photorow.photo;
 			}



 		});


 		$scope.IfollowBusinessModels=[];
 		$scope.businessesIFollowCount = $scope.fullUser.businesses_i_follow_count;
 		angular.forEach($scope.fullUser.businesses_i_follow,function(value,key)
 		{
 			$scope.currentBusinessIFollow = value;
 			if($scope.currentBusinessIFollow.logo ==null || $scope.currentBusinessIFollow.logo =='')
 			{
 				$scope.currentBusinessIFollow.logo=config.BaseImageURL+"uploads/defbanner.png";
 			}else
 			{
 				$scope.currentBusinessIFollow.logo=config.BaseImageURL+$scope.currentBusinessIFollow.logo;
 			}
 			$scope.viewModel = new BusinessViewModel();
 			$scope.viewModel.id = $scope.currentBusinessIFollow.id;
 			$scope.viewModel.logo =$scope.currentBusinessIFollow.logo;
 			$scope.viewModel.name = $scope.currentBusinessIFollow.name;
 			$scope.viewModel.address=$scope.currentBusinessIFollow.address;
 			this.push($scope.viewModel);



 		 },$scope.IfollowBusinessModels);

 	 

 	});

 });



$scope.updateCities = function(country_id)
{
		//$scope.FullBusiness.business.city =null;
		////console.log("The country id is ",country_id);
		////console.log("updating cities");
		$scope.showdefault=1;
		GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			
			//$scope.FullBusiness.business.city =$scope.cityModels[0];
		});

	}

	$scope.send_friend_request = function(sender_id,reciever_id)
 	{

 				$.get(config.BaseURL+"classes/util.php?sender_id="+sender_id+"&reciever_id="+reciever_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					   //////////////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.friendtoggle=1;



 	}

 
 	$scope.unfriend_person = function(chucker_id,chucked_id)
 	{
 				$.get(config.BaseURL+"classes/util.php?chucker_id="+chucker_id+"&chucked_id="+chucked_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.friendtoggle=0;



 	}


 	$scope.accept_request = function(user_id,friend_id,date_created)
	{
		//id=iid;
		////////////////////alert(id);
		$scope.postReview(friend_id,user_id,0,0,date_created,"friends");
		$.get(config.BaseURL+"classes/util.php?acceptor_id="+user_id+"&requestor_id="+friend_id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////////alert("results magigiasn are"+results);
				  	$("#friend_"+friend_id).hide();
				  	$scope.friendtoggle=2;


				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});

	}
	$scope.deny_request = function(user_id,friend_id,date_created)
	{
		//id=iid;
		////////////////////alert(id);
		$scope.postReview(friend_id,user_id,0,0,date_created,"friends");
		$.get(config.BaseURL+"classes/util.php?denier_id="+user_id+"&requestor_id="+friend_id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	//////alert("results magigiasn are"+results);
				  	$("#friend_"+friend_id).hide();
				  	//$scope.friendtoggle=2;


				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});

	}
	$scope.BaseImageURL =config.BaseImageURL;
	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details)
	{
		//var image = $scope.myFile;

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if (details != "") 
			{

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","new_friend");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}
		
	    $scope.details="";
	}




 $scope.toggle_profile_page=function(id)
 {
 	////////////////////alert(id);

 	switch(id) {
	    case 'wall_tab':
	        ////////////////////alert('kekyo wall');
	        $('#reviews_profile_tab').show();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').show();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        break;
	    case 'friends_tab':
	    	$('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').show();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        ////////////////////alert('kekyo friends');
	        break;
	    case 'reviews_tab':
	       // //////////////////alert('kekyo reviews');
	        $('#reviews_profile_tab').show();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').show();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        break;
	    case 'favourites_tab':
	        ////////////////////alert('kekyo favourites');
	        $('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').show();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        break;

	    case 'ad_manager_tab':
	        ////////////////////alert('kekyo ad_manager');
	        $('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').show();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        break;
	    case 'my_business_tab':
	        ////////////////////alert('kekyo mybusiness');
	        $('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').show();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        break;
	    case 'business__profile_photos_tab':
	        ////////////////////alert('kekyo photos');
	        $('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').show();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	         $('#following_profile_tab').hide();
	         $('#people_i_follow_profile_tab').hide();
	         $('#mylikes_profile_tab').hide();
	        break;
	    case 'added_business_tab':
	        ////////////////////alert('kekyo business');
	        $('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').show();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	         $('#following_profile_tab').hide();
	         $('#people_i_follow_profile_tab').hide();
	         $('#mylikes_profile_tab').hide();
	        break;
	    case  'friend_request_tab':

	    	$('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').show();
	         $('#following_profile_tab').hide();
	         $('#people_i_follow_profile_tab').hide();
	         $('#mylikes_profile_tab').hide();
	        break;

	    case  'following_tab':

	    	$('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').show();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').hide();
	        break;
	    case  'people_i_follow_tab':

	    	$('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').show();
	        $('#mylikes_profile_tab').hide();
	        break;
	    case  'mylikes_tab':

	    	$('#reviews_profile_tab').hide();
	        $('#friends_profile_tab').hide();
	        $('#reviews_profile_tab').hide();
	        $('#favourites_profile_tab').hide();
	        $('#owned_business_profile_tab').hide();
	        $('#photos_profile_tab').hide();
	        $('#added_business_profile_tab').hide();
	        $('#add_manager_profile_tab').hide();
	        $('#friend_requests_profile_tab').hide();
	        $('#following_profile_tab').hide();
	        $('#people_i_follow_profile_tab').hide();
	        $('#mylikes_profile_tab').show();
	        break;

	    default:
	        ////////////////////alert('kekyo  volimba kyenyinio');
	}



 }


 










 }])
 .controller('PostCtrl', ['$scope', function ($scope) {

 	$scope.defpic ="http://localhost:89//yammzit/admin/Theme/uploads/capture.png";

	$scope.uploadFile = function(){
	               var file = $scope.myFile;

	              // ////////////console.log('file is ' ,file);
	               //console.dir(file);

	               var uploadUrl = 'http://localhost:89//yammzit/Yammz/classes/util.php?';
	               fileUpload.uploadFileToUrl(file, uploadUrl);

	};


 	document.getElementById('inputfile').onchange=function(e)
	{

		//////////////console.log('my event is ',e);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// ////////////console.log('my event mikemdd is ',e);
            	 		$scope.$digest(function () {
           						$scope.businessobject.picture=e.target.result;
       				 });


                   // ////////////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}



 }])
 .controller('EditUserProfileCtrl', ['$scope','fileUpload', function ($scope,fileUpload) {
 	//object to handle data
 	$scope.edit_profile_object = {
		first_name :'',
		last_name :'',
		city_id : '',
		email : '',
		alternative_email : '',
		phone_number : '',
		dob : '',
		gender : '',
		picture : config.BaseImageURL+'uploads/capture.png',
		country_id:'',

		address : '',
		subcategoryid_1 : '',
		subcategoryid_2 : '',
		subcategoryid_3 : ''

	};
 	//object to handle data
 	//handling file upload
 	document.getElementById('inputfile').onchange=function(e)
	{

		//////////////console.log('my event is ',e);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// ////////////console.log('my event mikemdd is ',e);
            	 		$scope.$digest(function () {
           						$scope.businessobject.picture=e.target.result;
       				 });


                   // ////////////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}

 	//handling file upload

 	$scope.submitData=function()
 	{

 	}

 }])

.directive("passwordVerify", function() {
   return {
      require: "^ngModel",
      scope: {
        passwordVerify: '='
      },
      link: function(scope, element, attrs, ctrl) {
        scope.$watch(function() {
            var combined;

            if (scope.passwordVerify || ctrl.$viewValue) {
               combined = scope.passwordVerify + '_' + ctrl.$viewValue;
            }
            return combined;
        }, function(value) {
            if (value) {
                ctrl.$parsers.unshift(function(viewValue) {
                    var origin = scope.passwordVerify;
                    if (origin !== viewValue) {
                        ctrl.$setValidity("passwordVerify", false);
                        return undefined;
                    } else {
                        ctrl.$setValidity("passwordVerify", true);
                        return viewValue;
                    }
                });
            }
        });
     }
   };
}).directive('backImg', function(){
    return function(scope, element, attrs){
        window.urlx = attrs;
        ////////console.log(attrs);
        ////////console.log(attrs.backImg);
        element.css({
						'background':'transparent url('+attrs.backImg+') no-repeat top center fixed',
						'-webkit-background-size':'cover',
						'-moz-background-size':'cover',
						'-o-background-size':'cover',
						'-o-background-size':'cover',
						'background-size':'100%'

						});
       // scope.$apply();
      };
})
.controller('ClaimFullBusinessCtrl', ['$scope','config','CountryViewModel','CityViewModel','getTimes','GetData', function($scope,config,CountryViewModel,CityViewModel,getTimes,GetData){
	$scope.logo_toggle=0;

	$scope.default_banner=config.BaseImageURL+"uploads/defbanner.png";
	$scope.default_logo=config.BaseImageURL+"uploads/deflogo.png";

	$scope.businessobject =
	{


		business_name : '',
		position_of_editor:'',
		business_email : '',
		business_website : '',
		country_id : '',
		city_id : '',
		phone_1 : '',
		phone_2 : '',

		category_1_id : '', 
		category_2_id : '', 
		category_3_id : '', 
		sub_category_1_id : '', 
		sub_category_2_id : '', 
		sub_category_3_id : '', 
		address :'',
		business_description : '',
		facebook_link : '',
		twitter_link : '',
		youtube_link : '',
		instagram_link : '',

		//pics
		cover_photo :'',
		logo : '',

		//pics

		//working hours
		mon_start_time: '',
		mon_end_time: '',
		tue_start_time: '',
		tue_end_time: '',
		wed_start_time: '',
		wed_end_time: '',
		thur_start_time: '',
		thur_end_time: '',
		fri_start_time: '',
		fri_end_time: '',
		sat_start_time: '',
		sat_end_time: '',
		sun_start_time: '',
		sun_end_time: '',

		//services

		 has_wifi : document.getElementById('has_wifi').value,
		 accepts_credit_card : document.getElementById('accepts_credit_card').value,
		 take_reservation : document.getElementById('take_reservation').value,
		 good_for_children : document.getElementById('good_for_children').value,
		 good_for_dancing : document.getElementById('good_for_dancing').value,
		 good_for_groups : document.getElementById('good_for_groups').value,
		 take_away : document.getElementById('take_away').value,
		 delivery : document.getElementById('delivery').value,
		 music : document.getElementById('music').value,
		 outdoor_seating : document.getElementById('outdoor_seating').value,
		 has_pool_table : document.getElementById('has_pool_table').value,
		 waiter_service : document.getElementById('waiter_service').value,
		 happy_hour : document.getElementById('happy_hour').value,
		 best_night : document.getElementById('best_night').value,
		 alcohol : document.getElementById('alcohol').value,
		 has_tv : document.getElementById('has_tv').value



		//services
		

	}

	document.getElementById('inputbanner').onchange=function(e)
	{

		//////////////console.log('my event is ',e);
		$scope.logo_toggle=1;
		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// ////////////console.log('my event mikemdd is ',e);
            	 		$scope.$digest(function () {
           						$scope.businessobject.cover_photo=e.target.result;
       				 });


                   // ////////////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}
	document.getElementById('inputlogo').onchange=function(e)
	{
		$scope.logo_toggle=1;
		////////console.log('my event is ',e.target.files);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// ////////////console.log('my event mikemdd is ',e);
            	 		$scope.$digest(function () {
           						$scope.businessobject.logo=e.target.result;
           						////////console.log("target ->",e.target.result);
       				 });


                  // //////console.log("scope logo is ->",$scope.businessobject.logo);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}

	$scope.postClaim = function()
	{

		$scope.businessobject.has_wifi=document.getElementById('has_wifi').value;
		$scope.businessobject.accepts_credit_card=document.getElementById('accepts_credit_card').value;
		$scope.businessobject.take_reservation=document.getElementById('take_reservation').value;
		$scope.businessobject.good_for_children=document.getElementById('good_for_children').value;
		$scope.businessobject.good_for_dancing= document.getElementById('good_for_dancing').value;
		$scope.businessobject.good_for_groups=document.getElementById('good_for_groups').value;
		$scope.businessobject.take_away=document.getElementById('take_away').value;
		$scope.businessobject.delivery=document.getElementById('delivery').value;
		$scope.businessobject.music=document.getElementById('music').value;
		$scope.businessobject.outdoor_seating=document.getElementById('outdoor_seating').value;
		$scope.businessobject.has_pool_table=document.getElementById('has_pool_table').value;
		$scope.businessobject.waiter_service=document.getElementById('waiter_service').value;
		$scope.businessobject.happy_hour=document.getElementById('happy_hour').value;
		$scope.businessobject.best_night=document.getElementById('best_night').value;
		$scope.businessobject.alcohol=document.getElementById('alcohol').value;
		$scope.businessobject.has_tv=document.getElementById('has_tv').value;
		$scope.businessobject.business_description=document.getElementById('claim_business_description').value;
		$scope.businessobject.business_name =document.getElementById('biz_search_value').value;


					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","super_claim");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_name",$scope.current_business_id);
					form_data.append("business_id",$scope.current_business_id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.businessobject.business_name);
					form_data.append("position_of_editor",$scope.businessobject.position_of_editor);
					form_data.append("business_email",$scope.businessobject.business_email);
					form_data.append("business_website",$scope.businessobject.business_website);

					form_data.append("country_id",$scope.businessobject.country_id);
					form_data.append("city_id",$scope.businessobject.city_id);
					form_data.append("phone_1",$scope.businessobject.phone_1);
					form_data.append("phone_2",$scope.businessobject.phone_2);
					form_data.append("category_1_id",$scope.businessobject.category_1_id);
					form_data.append("category_2_id",$scope.businessobject.category_2_id);
					form_data.append("category_3_id",$scope.businessobject.category_3_id);
					form_data.append("sub_category_1_id",$scope.businessobject.sub_category_1_id);
					form_data.append("sub_category_2_id",$scope.businessobject.sub_category_2_id);
					form_data.append("sub_category_3_id",$scope.businessobject.sub_category_3_id);

					form_data.append("address",$scope.businessobject.address);
					form_data.append("business_description",$scope.businessobject.business_description);

					form_data.append("facebook_link",$scope.businessobject.facebook_link);
					form_data.append("twitter_link",$scope.businessobject.twitter_link);
					form_data.append("youtube_link",$scope.businessobject.youtube_link);
					form_data.append("instagram_link",$scope.businessobject.instagram_link);

					form_data.append("mon_start_time",$scope.businessobject.mon_start_time);
					form_data.append("mon_end_time",$scope.businessobject.mon_end_time);
					form_data.append("tue_start_time",$scope.businessobject.tue_start_time);
					form_data.append("tue_end_time",$scope.businessobject.tue_end_time);
					form_data.append("wed_start_time",$scope.businessobject.wed_start_time);
					form_data.append("wed_end_time",$scope.businessobject.wed_end_time);
					form_data.append("thur_start_time",$scope.businessobject.thur_start_time);
					form_data.append("thur_end_time",$scope.businessobject.thur_end_time);
					form_data.append("fri_start_time",$scope.businessobject.fri_start_time);
					form_data.append("fri_end_time",$scope.businessobject.fri_end_time);
					form_data.append("sat_start_time",$scope.businessobject.sat_start_time);
					form_data.append("sat_end_time",$scope.businessobject.sat_end_time);
					form_data.append("sun_start_time",$scope.businessobject.sun_start_time);
					form_data.append("sun_end_time",$scope.businessobject.sun_end_time);




					
					form_data.append("accepts_credit_card",$scope.businessobject.accepts_credit_card);
					form_data.append("take_reservation",$scope.businessobject.take_reservation);
					form_data.append("good_for_children",$scope.businessobject.good_for_children);
					form_data.append("good_for_dancing",$scope.businessobject.good_for_dancing);
					form_data.append("good_for_groups",$scope.businessobject.good_for_groups);
					form_data.append("take_away",$scope.businessobject.take_away);
					form_data.append("delivery",$scope.businessobject.delivery);
					form_data.append("music",$scope.businessobject.music);
					form_data.append("outdoor_seating",$scope.businessobject.outdoor_seating);
					form_data.append("has_pool_table",$scope.businessobject.has_pool_table);
					form_data.append("waiter_service",$scope.businessobject.waiter_service);
					form_data.append("happy_hour",$scope.businessobject.happy_hour);
					form_data.append("best_night",$scope.businessobject.best_night);
					form_data.append("alcohol",$scope.businessobject.alcohol);
					form_data.append("has_tv",$scope.businessobject.has_tv);
					form_data.append("has_wifi",$scope.businessobject.has_wifi);

					form_data.append("cover_photo",$scope.mybanner);
					form_data.append("logo",$scope.mylogo);




					
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert(response);
						var mybusiness_id =response;
						window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness_id;

					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

	}

angular.element(document).ready(function()

{
	if($scope.isset_by_biz==1)
	{
		document.getElementById('biz_search_value').value=$scope.business_name;
		//$scope.current_business_id=business_id;
	}


});

	

	
	////////console.log($scope.bizSearchValue);

	$scope.search_resultsFunction = function(user_id)
	{
		//
		//$scope.isset_by_biz=0;
		$scope.bizSearchValue=document.getElementById('biz_search_value').value;
		//console.log("buddy==>",$scope.bizSearchValue);
		$scope.businesses =[];
			var default_country_id=0;
			//config.BaseURL+"classes/util.php?search="+$scope.bizSearchValue+"&searcher_id="+user_id+"&filter="+filter
			return GetData.getData(config.BaseURL+"classes/util.php?search="+$scope.bizSearchValue+"&searcher_id="+user_id+"&filter="+""+"country_id="+default_country_id,function(data)
			{		////////////console.log("the results is==>",data);
					$scope.search_results=data;
				//	document.getElementById("all_radio").checked = true;
					angular.forEach($scope.search_results.businesses,function(value,key)
						{
							$scope.business = value;

							if($scope.business.logo == '' || $scope.business.logo==null)
							{
								$scope.business.logo=config.BaseImageURL+"uploads/defbanner.png"
							}else
							{
								$scope.business.logo=config.BaseImageURL+$scope.business.logo;
							}
							this.push($scope.business);

						},$scope.businesses);
					//////console.log("The searched businesses are:=>",$scope.businesses);

					angular.forEach($scope.businesses,function(value,key)
					{
						$scope.businesss =value;
						$("#resultshere").append("<label  style='margin-top:10px; ' onclick='update("+$scope.businesss.id+",\""+$scope.businesss.name+"\")'><a class='redbright' style='text-decoration:none' >&nbsp;&nbsp;"+$scope.businesss.name+"&nbsp;&nbsp;&nbsp;&nbsp;"+$scope.businesss.address+"</a></label><hr style='height:1px; margin-top:-5px; background-color:#E9EAEE;'></hr>");

					});
					

				return $scope.businesses;
			});
	};

	window.update=function(id,name)
	{	//////////////////alert(id);

		//////console.log("istilee have",$scope.businesses);
		angular.forEach($scope.businesses,function(value,key)
		{
			$scope.mybiz = value;
			if($scope.mybiz.id == id)
			{
				$scope.current_business_id = id;
				////////////////////alert(id);
			}

		});
		
		document.getElementById('biz_search_value').value=name;
		//$("#resultshere").innerHTML="";
		document.getElementById('resultshere').innerHTML="";
		//////////////////alert($scope.current_business_id);
         
		GetData.getData(config.BaseURL+'classes/util.php?business_profile_picker_id='+$scope.current_business_id+"&user_id="+$scope.user_id,function(data)
		{



		 		$scope.FullBusiness = data;
		 		////////console.log("lalalal the business is",$scope.FullBusiness);
		 		if($scope.FullBusiness.business.banner=="" || $scope.FullBusiness.business.banner==null)
		 		{
		 			$scope.FullBusiness.business.banner = config.BaseImageURL+"uploads/defbanner.png";
		 			$scope.businessobject.cover_photo=$scope.FullBusiness.business.banner;

		 		}else
		 		{
		 			$scope.FullBusiness.business.banner = config.BaseImageURL+$scope.FullBusiness.business.banner;
		 			$scope.businessobject.cover_photo=$scope.FullBusiness.business.banner;
		 		}

		 		if($scope.FullBusiness.business.logo=="" || $scope.FullBusiness.business.logo==null)
		 		{
		 			$scope.FullBusiness.business.logo = config.BaseImageURL+"uploads/deflogo.png";
		 			$scope.businessobject.logo=$scope.FullBusiness.business.logo;

		 		}else
		 		{
		 			$scope.FullBusiness.business.logo = config.BaseImageURL+$scope.FullBusiness.business.logo;
		 			$scope.businessobject.logo=$scope.FullBusiness.business.logo;
		 		}

		 		$scope.logo_toggle=1;
		 		//photoscount
		 		//$scope.photo_count =$scope.FullBusiness.photo_count;
		 		//photos
		 		
		 		
		 		
		 		////////console.log("the rows are ="+$scope.rowCollection);


		 	});

	}


	angular.element(document).ready(function(){

		$scope.countryModels=[];
 		GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
 		{

 			$scope.RawCountries = data;
 			//////console.log("The countries are",$scope.RawCountries);
 			angular.forEach($scope.RawCountries,function(value,key)
 			{
 				$scope.RawCountry = value;
 				$scope.countryModel = new CountryViewModel();
				$scope.countryModel.id = $scope.RawCountry['id'];
				$scope.countryModel.name = $scope.RawCountry['name'];
				$scope.countryModel.country_code= $scope.RawCountry['code'];

				GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+$scope.countryModel.id,function(data){
					$scope.RawCities = data;
					$scope.countryModel.cities = data
				});


				this.push($scope.countryModel);



 				
 			},$scope.countryModels);

 			////////console.log("The countries are",$scope.countryModels);

 	});
 		//working hours

 			//only use it to get services
 			//////console.log("The business_id is=>",$scope.business_id);
 			//////console.log("The user_id is=>",$scope.user_id);
 			getTimes.getFullBusinessClaim($scope.business_id,$scope.user_id,function(data)
 			{
 				$scope.fullClaim = data;
 				//////console.log("The fullClaim  is=>",$scope.fullClaim);


 				//////console.log("The credit card accept  is=>",$scope.fullClaim.other_accepts_credit_card);

 				$scope.businessServices =[
 					{'name':'accepts_credit_card','value':0},
 					{'name':'take_reservation','value':0},
 					{'name':'good_for_children','value':0},
 					{'name':'good_for_dancing','value':0},
 					{'name':'good_for_groups','value':0},
 					{'name':'take_away','value':0},
 					{'name':'delivery','value':0},
 					{'name':'music','value':0},
 					{'name':'outdoor_seating','value':0},
 					{'name':'has_pool_table','value':0},
 					{'name':'waiter_service','value':0},
 					{'name':'happy_hour','value':0},
 					{'name':'best_nights','value':0},
 					{'name':'alcohol','value':0},
 					{'name':'has_tv','value': 0},
 					{'name':'has_wifi','value':0}
 				];

 				//////console.log($scope.businessServices);
 				// $scope.workinghours = [


 				//  {'value':0,'name':'12:00 AM'},
				 // {'value':1,'name':'12:30 AM'},
				 // {'value':2,'name':'1:00 AM'}];


 			}); // will try it next time

 			//for now working hours.
 			$scope.workinghours = getTimes.getWorkingTimes();
 			//////console.log("The working hours are",$scope.workinghours);

 });

$scope.updateCities = function(country_id)
{		
		GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			

		});

}

	//countries and cities


	//categories and subcategories 
	$scope.categoryModels = [];
	//config.BaseURL+'classes/util.php?categories=categories'
	GetData.getData(config.BaseURL+'classes/util.php?categories=categories',function(data)
	{
		$scope.RawCategories = data;
		//////console.log("the raw category models are==>",$scope.RawCategories);

		angular.forEach($scope.RawCategories,function(value,key)
		{	$scope.RawCategory =value;
			$scope.categorymodel = new CategoryViewModel();
			$scope.categorymodel.category_id = $scope.RawCategory.category_id;
			$scope.categorymodel.categoryname = $scope.RawCategory.categoryname;
			$scope.categorymodel.sub_categories = $scope.RawCategory.category_subcategories;

			this.push($scope.categorymodel);

		},$scope.categoryModels);


	});

	$scope.updateCategorySubcategories=function(id,select_number)
	{
		angular.forEach($scope.categoryModels,function(value,key)
	 	{
			 $scope.thiscategory = value;
			if($scope.thiscategory.category_id == id)
			 {
			 	if(select_number==1){
			 		$scope.subcategory1Models=$scope.thiscategory.sub_categories;
			    }else if(select_number==2)
			    {
			    	$scope.subcategory2Models=$scope.thiscategory.sub_categories;
			    }else if(select_number==3)
			    {
			    	$scope.subcategory3Models=$scope.thiscategory.sub_categories;
			    }

			 }

		});

	}




}]).controller('EditFullBusinessCtrl', ['$scope','config','CountryViewModel','CityViewModel','getTimes','GetData', function($scope,config,CountryViewModel,CityViewModel,getTimes,GetData){

	////////////////////alert("tigidi");

	$scope.businessobject =
	{
		// name : '',
		// position_of_editor:'',
		// business_email : '',
		// business_website : '',
		// country_id : '',
		// city_id : '',
		// phone_1 : '',
		// phone_2 : '',

		category_1_id : '', 
		category_2_id : '', 
		category_3_id : '', 
		sub_category_1_id : '', 
		sub_category_2_id : '', 
		sub_category_3_id : '', 

		// address : '',
		business_description : '',
		facebook_link : '',
		twitter_link : '',
		youtube_link : '',
		instagram_link : '',

		//working hours
		mon_start_time: '',
		mon_end_time: '',
		tue_start_time: '',
		tue_end_time: '',
		wed_start_time: '',
		wed_end_time: '',
		thur_start_time: '',
		thur_end_time: '',
		fri_start_time: '',
		fri_end_time: '',
		sat_start_time: '',
		sat_end_time: '',
		sun_start_time: '',
		sun_end_time: '',

		//services

		 has_wifi : '',
		 accepts_credit_card:'',
		 take_reservation:'',
		 good_for_children:'',
		 good_for_dancing: '',
		 good_for_groups:'',
		 take_away:'',
		 delivery:'',
		 music :'',
		 outdoor_seating:'',
		 has_pool_table:'',
		 waiter_service:'',
		 happy_hour:'',
		 best_night:'',
		 alcohol:'',
		 has_tv:'',





		//services
		

	}


		document.getElementById('input_bannerr').onchange=function(e)
		{

			//////////////console.log('my event is ',e);
			$scope.logo_toggle=1;
			if (e.target.files && e.target.files[0]) {
	            var reader = new FileReader();


	            reader.onload = function (e) {
	            	// ////////////console.log('my event mikemdd is ',e);
	            	 		$scope.$digest(function () {
	           						$scope.businessobject.my_cover_photo=e.target.result;
	           						//////console.log("The business cover photo",$scope.businessobject.my_cover_photo);
	       				 });


	                   // ////////////console.log("scope picutre is ->",$scope.businessobject.picture);
	            };

	            reader.readAsDataURL(e.target.files[0]);
	        }

		}
	document.getElementById('input_logoo').onchange=function(e)
	{
		$scope.logo_toggle=1;
		////////console.log('my event is ',e.target.files);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// ////////////console.log('my event mikemdd is ',e);
            	 		$scope.$digest(function () {
           						$scope.businessobject.my_logo=e.target.result;
           						//////console.log("The business logo",$scope.businessobject.my_cover_photo);
           						////////console.log("target ->",e.target.result);
       				 });


                  // //////console.log("scope logo is ->",$scope.businessobject.logo);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}


	

	$scope.postEditBusiness=function()
	{


		$scope.businessobject.has_wifi=document.getElementById('edit_has_wifi').value;
		$scope.businessobject.accepts_credit_card=document.getElementById('edit_accepts_credit_card').value;
		$scope.businessobject.take_reservation=document.getElementById('edit_take_reservation').value;
		$scope.businessobject.good_for_children=document.getElementById('edit_good_for_children').value;
		$scope.businessobject.good_for_dancing= document.getElementById('edit_good_for_dancing').value;
		$scope.businessobject.good_for_groups=document.getElementById('edit_good_for_groups').value;
		$scope.businessobject.take_away=document.getElementById('edit_take_away').value;
		$scope.businessobject.delivery=document.getElementById('edit_delivery').value;
		$scope.businessobject.music=document.getElementById('edit_music').value;
		$scope.businessobject.outdoor_seating=document.getElementById('edit_outdoor_seating').value;
		$scope.businessobject.has_pool_table=document.getElementById('edit_has_pool_table').value;
		$scope.businessobject.waiter_service=document.getElementById('edit_waiter_service').value;
		$scope.businessobject.happy_hour=document.getElementById('edit_happy_hour').value;
		$scope.businessobject.best_night=document.getElementById('edit_best_night').value;
		$scope.businessobject.alcohol=document.getElementById('edit_alcohol').value;
		$scope.businessobject.has_tv=document.getElementById('edit_has_tv').value;
		$scope.businessobject.business_description=document.getElementById('edit_business_description').value;
		


					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","super_edit");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_id",$scope.business_id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.businessobject.name);
					form_data.append("position_of_editor",$scope.businessobject.position_of_editor);
					form_data.append("business_email",$scope.businessobject.business_email);
					form_data.append("business_website",$scope.businessobject.business_website);

					form_data.append("country_id",$scope.businessobject.country_id);
					form_data.append("city_id",$scope.businessobject.city_id);

					
					form_data.append("phone_1",$scope.businessobject.phone_1);
					form_data.append("phone_2",$scope.businessobject.phone_2);

					form_data.append("category_1_id",$scope.businessobject.category_1_id);
					form_data.append("category_2_id",$scope.businessobject.category_2_id);
					form_data.append("category_3_id",$scope.businessobject.category_3_id);
					form_data.append("sub_category_1_id",$scope.businessobject.sub_category_1_id);
					form_data.append("sub_category_2_id",$scope.businessobject.sub_category_2_id);
					form_data.append("sub_category_3_id",$scope.businessobject.sub_category_3_id);

					form_data.append("address",$scope.businessobject.address);
					form_data.append("business_description",$scope.businessobject.business_description);

					form_data.append("facebook_link",$scope.businessobject.facebook_link);
					form_data.append("twitter_link",$scope.businessobject.twitter_link);
					form_data.append("youtube_link",$scope.businessobject.youtube_link);
					form_data.append("instagram_link",$scope.businessobject.instagram_link);

					form_data.append("mon_start_time",$scope.businessobject.mon_start_time);
					form_data.append("mon_end_time",$scope.businessobject.mon_end_time);
					form_data.append("tue_start_time",$scope.businessobject.tue_start_time);
					form_data.append("tue_end_time",$scope.businessobject.tue_end_time);
					form_data.append("wed_start_time",$scope.businessobject.wed_start_time);
					form_data.append("wed_end_time",$scope.businessobject.wed_end_time);
					form_data.append("thur_start_time",$scope.businessobject.thur_start_time);
					form_data.append("thur_end_time",$scope.businessobject.thur_end_time);
					form_data.append("fri_start_time",$scope.businessobject.fri_start_time);
					form_data.append("fri_end_time",$scope.businessobject.fri_end_time);
					form_data.append("sat_start_time",$scope.businessobject.sat_start_time);
					form_data.append("sat_end_time",$scope.businessobject.sat_end_time);
					form_data.append("sun_start_time",$scope.businessobject.sun_start_time);
					form_data.append("sun_end_time",$scope.businessobject.sun_end_time);




					
					form_data.append("accepts_credit_card",$scope.businessobject.accepts_credit_card);
					form_data.append("take_reservation",$scope.businessobject.take_reservation);
					form_data.append("good_for_children",$scope.businessobject.good_for_children);
					form_data.append("good_for_dancing",$scope.businessobject.good_for_dancing);
					form_data.append("good_for_groups",$scope.businessobject.good_for_groups);
					form_data.append("take_away",$scope.businessobject.take_away);
					form_data.append("delivery",$scope.businessobject.delivery);
					form_data.append("music",$scope.businessobject.music);
					form_data.append("outdoor_seating",$scope.businessobject.outdoor_seating);
					form_data.append("has_pool_table",$scope.businessobject.has_pool_table);
					form_data.append("waiter_service",$scope.businessobject.waiter_service);
					form_data.append("happy_hour",$scope.businessobject.happy_hour);
					form_data.append("best_night",$scope.businessobject.best_night);
					form_data.append("alcohol",$scope.businessobject.alcohol);
					form_data.append("has_tv",$scope.businessobject.has_tv);
					form_data.append("has_wifi",$scope.businessobject.has_wifi);

					form_data.append("cover_photo",$scope.my_cover_photo);
					form_data.append("logo",$scope.my_logo);




					
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert(response);
						var mybusiness_id =response;
						$scope.postReview($scope.business_id,$scope.user_id,0,0,$scope.date_created,"edited_my_info");
						window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness_id;
	
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});


	


	}

	$scope.postClaimBusiness =function()
	{


		$scope.businessobject.has_wifi=document.getElementById('edit_has_wifi').value;
		$scope.businessobject.accepts_credit_card=document.getElementById('edit_accepts_credit_card').value;
		$scope.businessobject.take_reservation=document.getElementById('edit_take_reservation').value;
		$scope.businessobject.good_for_children=document.getElementById('edit_good_for_children').value;
		$scope.businessobject.good_for_dancing= document.getElementById('edit_good_for_dancing').value;
		$scope.businessobject.good_for_groups=document.getElementById('edit_good_for_groups').value;
		$scope.businessobject.take_away=document.getElementById('edit_take_away').value;
		$scope.businessobject.delivery=document.getElementById('edit_delivery').value;
		$scope.businessobject.music=document.getElementById('edit_music').value;
		$scope.businessobject.outdoor_seating=document.getElementById('edit_outdoor_seating').value;
		$scope.businessobject.has_pool_table=document.getElementById('edit_has_pool_table').value;
		$scope.businessobject.waiter_service=document.getElementById('edit_waiter_service').value;
		$scope.businessobject.happy_hour=document.getElementById('edit_happy_hour').value;
		$scope.businessobject.best_night=document.getElementById('edit_best_night').value;
		$scope.businessobject.alcohol=document.getElementById('edit_alcohol').value;
		$scope.businessobject.has_tv=document.getElementById('edit_has_tv').value;
		$scope.businessobject.business_description=document.getElementById('edit_business_description').value;
		


					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","super_claim");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_id",$scope.business_id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.businessobject.name);
					form_data.append("position_of_editor",$scope.businessobject.position_of_editor);
					form_data.append("business_email",$scope.businessobject.business_email);
					form_data.append("business_website",$scope.businessobject.business_website);

					form_data.append("country_id",$scope.businessobject.country_id);
					form_data.append("city_id",$scope.businessobject.city_id);

					
					form_data.append("phone_1",$scope.businessobject.phone_1);
					form_data.append("phone_2",$scope.businessobject.phone_2);

					form_data.append("category_1_id",$scope.businessobject.category_1_id);
					form_data.append("category_2_id",$scope.businessobject.category_2_id);
					form_data.append("category_3_id",$scope.businessobject.category_3_id);
					form_data.append("sub_category_1_id",$scope.businessobject.sub_category_1_id);
					form_data.append("sub_category_2_id",$scope.businessobject.sub_category_2_id);
					form_data.append("sub_category_3_id",$scope.businessobject.sub_category_3_id);

					form_data.append("address",$scope.businessobject.address);
					form_data.append("business_description",$scope.businessobject.business_description);

					form_data.append("facebook_link",$scope.businessobject.facebook_link);
					form_data.append("twitter_link",$scope.businessobject.twitter_link);
					form_data.append("youtube_link",$scope.businessobject.youtube_link);
					form_data.append("instagram_link",$scope.businessobject.instagram_link);

					form_data.append("mon_start_time",$scope.businessobject.mon_start_time);
					form_data.append("mon_end_time",$scope.businessobject.mon_end_time);
					form_data.append("tue_start_time",$scope.businessobject.tue_start_time);
					form_data.append("tue_end_time",$scope.businessobject.tue_end_time);
					form_data.append("wed_start_time",$scope.businessobject.wed_start_time);
					form_data.append("wed_end_time",$scope.businessobject.wed_end_time);
					form_data.append("thur_start_time",$scope.businessobject.thur_start_time);
					form_data.append("thur_end_time",$scope.businessobject.thur_end_time);
					form_data.append("fri_start_time",$scope.businessobject.fri_start_time);
					form_data.append("fri_end_time",$scope.businessobject.fri_end_time);
					form_data.append("sat_start_time",$scope.businessobject.sat_start_time);
					form_data.append("sat_end_time",$scope.businessobject.sat_end_time);
					form_data.append("sun_start_time",$scope.businessobject.sun_start_time);
					form_data.append("sun_end_time",$scope.businessobject.sun_end_time);




					
					form_data.append("accepts_credit_card",$scope.businessobject.accepts_credit_card);
					form_data.append("take_reservation",$scope.businessobject.take_reservation);
					form_data.append("good_for_children",$scope.businessobject.good_for_children);
					form_data.append("good_for_dancing",$scope.businessobject.good_for_dancing);
					form_data.append("good_for_groups",$scope.businessobject.good_for_groups);
					form_data.append("take_away",$scope.businessobject.take_away);
					form_data.append("delivery",$scope.businessobject.delivery);
					form_data.append("music",$scope.businessobject.music);
					form_data.append("outdoor_seating",$scope.businessobject.outdoor_seating);
					form_data.append("has_pool_table",$scope.businessobject.has_pool_table);
					form_data.append("waiter_service",$scope.businessobject.waiter_service);
					form_data.append("happy_hour",$scope.businessobject.happy_hour);
					form_data.append("best_night",$scope.businessobject.best_night);
					form_data.append("alcohol",$scope.businessobject.alcohol);
					form_data.append("has_tv",$scope.businessobject.has_tv);
					form_data.append("has_wifi",$scope.businessobject.has_wifi);

					form_data.append("cover_photo",$scope.my_cover_photo);
					form_data.append("logo",$scope.my_logo);




					
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert(response);
						var mybusiness_id =response;
						$scope.postReview($scope.business_id,$scope.user_id,0,0,$scope.date_created,"edited_my_info");
						window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness_id;
	
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});


	}


	$scope.postPublicEditBusiness=function()
	{


		
		$scope.businessobject.business_description=document.getElementById('edit_business_description').value;


					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","public_edit");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_id",$scope.business_id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.businessobject.name);
					form_data.append("position_of_editor",$scope.businessobject.position_of_editor);
					form_data.append("business_email",$scope.businessobject.business_email);
					form_data.append("business_website",$scope.businessobject.business_website);

					form_data.append("country_id",$scope.businessobject.country_id);
					form_data.append("city_id",$scope.businessobject.city_id);
					form_data.append("phone_1",$scope.businessobject.phone_1);
					form_data.append("phone_2",$scope.businessobject.phone_2);

					form_data.append("category_1_id",$scope.businessobject.category_1_id);
					form_data.append("category_2_id",$scope.businessobject.category_2_id);
					form_data.append("category_3_id",$scope.businessobject.category_3_id);
					form_data.append("sub_category_1_id",$scope.businessobject.sub_category_1_id);
					form_data.append("sub_category_2_id",$scope.businessobject.sub_category_2_id);
					form_data.append("sub_category_3_id",$scope.businessobject.sub_category_3_id);

					form_data.append("address",$scope.businessobject.address);
					form_data.append("business_description",$scope.businessobject.business_description);

					form_data.append("facebook_link",$scope.businessobject.facebook_link);
					form_data.append("twitter_link",$scope.businessobject.twitter_link);
					form_data.append("youtube_link",$scope.businessobject.youtube_link);
					form_data.append("instagram_link",$scope.businessobject.instagram_link);

					form_data.append("mon_start_time",$scope.businessobject.mon_start_time);
					form_data.append("mon_end_time",$scope.businessobject.mon_end_time);
					form_data.append("tue_start_time",$scope.businessobject.tue_start_time);
					form_data.append("tue_end_time",$scope.businessobject.tue_end_time);
					form_data.append("wed_start_time",$scope.businessobject.wed_start_time);
					form_data.append("wed_end_time",$scope.businessobject.wed_end_time);
					form_data.append("thur_start_time",$scope.businessobject.thur_start_time);
					form_data.append("thur_end_time",$scope.businessobject.thur_end_time);
					form_data.append("fri_start_time",$scope.businessobject.fri_start_time);
					form_data.append("fri_end_time",$scope.businessobject.fri_end_time);
					form_data.append("sat_start_time",$scope.businessobject.sat_start_time);
					form_data.append("sat_end_time",$scope.businessobject.sat_end_time);
					form_data.append("sun_start_time",$scope.businessobject.sun_start_time);
					form_data.append("sun_end_time",$scope.businessobject.sun_end_time);




					
					form_data.append("accepts_credit_card",$scope.businessobject.accepts_credit_card);
					form_data.append("take_reservation",$scope.businessobject.take_reservation);
					form_data.append("good_for_children",$scope.businessobject.good_for_children);
					form_data.append("good_for_dancing",$scope.businessobject.good_for_dancing);
					form_data.append("good_for_groups",$scope.businessobject.good_for_groups);
					form_data.append("take_away",$scope.businessobject.take_away);
					form_data.append("delivery",$scope.businessobject.delivery);
					form_data.append("music",$scope.businessobject.music);
					form_data.append("outdoor_seating",$scope.businessobject.outdoor_seating);
					form_data.append("has_pool_table",$scope.businessobject.has_pool_table);
					form_data.append("waiter_service",$scope.businessobject.waiter_service);
					form_data.append("happy_hour",$scope.businessobject.happy_hour);
					form_data.append("best_night",$scope.businessobject.best_night);
					form_data.append("alcohol",$scope.businessobject.alcohol);
					form_data.append("has_tv",$scope.businessobject.has_tv);
					form_data.append("has_wifi",$scope.businessobject.has_wifi);

					form_data.append("cover_photo",$scope.my_cover_photo);
					form_data.append("logo",$scope.my_logo);




					
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////////////////////alert(response);
						var mybusiness_id =response;
						$scope.postReview($scope.business_id,$scope.user_id,0,0,$scope.date_created,"edited_business_info");
						window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+mybusiness_id;
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

	


	}

	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details)
	{
		
		//////////////alert(business_id);
		//////////////alert(user_id);
		////////////////////alert(rating);
		////////////////////alert(pricing);
		////////////////////alert(date_created);
		////////////////////alert(details);
		////////////////////alert(template);
		var kind ='';


		if(details=="edited_business_info")
		{
			kind="business_edit_info";
		}else if(details=="edited_my_info")
		{
			kind="business_edit_info";

		}

		
		//var kind = "review";
					if(rating==0 && pricing==0)
					{
						rating=-1;
						pricing=-1;
					}
		
			        ////////////alert("buddy man");

			

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","business_edit_info");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////////////////////alert("buddy am in the thing");
						
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			

		
		
	}



		//coutnries and cities


angular.element(document).ready(function(){

		
		GetData.getData(config.BaseURL+'classes/util.php?business_profile_picker_id='+$scope.business_id+"&user_id="+$scope.user_id,function(data)
		 {

		 		$scope.FullBusiness = data;
		 		//////console.log("lalalal the business is",$scope.FullBusiness);
		 		if($scope.FullBusiness.business.banner=="" || $scope.FullBusiness.business.banner==null)
		 		{
		 			$scope.FullBusiness.business.banner = config.BaseImageURL+"uploads/defbanner.png";
		 			$scope.businessobject.mybanner = $scope.FullBusiness.business.banner;

		 		}else
		 		{
		 			$scope.FullBusiness.business.banner = config.BaseImageURL+$scope.FullBusiness.business.banner;
		 			$scope.businessobject.mybanner = $scope.FullBusiness.business.banner;
		 		}

		 		if($scope.FullBusiness.business.logo=="" || $scope.FullBusiness.business.logo==null)
		 		{
		 			$scope.FullBusiness.business.logo = config.BaseImageURL+"uploads/deflogo.png";
		 			$scope.businessobject.mylogo = $scope.FullBusiness.business.logo;

		 		}else
		 		{
		 			$scope.FullBusiness.business.logo = config.BaseImageURL+$scope.FullBusiness.business.logo;
		 			$scope.businessobject.mylogo = $scope.FullBusiness.business.logo;
		 		}
		 		//photoscount
		 		

		 	

		 	});


		 		



		



		$scope.countryModels=[];

 		GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
 		{

 			$scope.RawCountries = data;
 			////////console.log("The countries are",$scope.RawCountries);
 			angular.forEach($scope.RawCountries,function(value,key)
 			{
 				$scope.RawCountry = value;
 				$scope.countryModel = new CountryViewModel();
				$scope.countryModel.id = $scope.RawCountry['id'];
				$scope.countryModel.name = $scope.RawCountry['name'];
				$scope.countryModel.country_code= $scope.RawCountry['code'];

				GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+$scope.countryModel.id,function(data){
					$scope.RawCities = data;
					$scope.countryModel.cities = data
				});


				this.push($scope.countryModel);



 				
 			},$scope.countryModels);

 			////////console.log("The countries are",$scope.countryModels);

 		});
 		//working hours

 			//only use it to get services
 			//////console.log("The business_id is=>",$scope.business_id);
 			//////console.log("The user_id is=>",$scope.user_id);
 			getTimes.getFullBusinessClaim($scope.business_id,$scope.user_id,function(data)
 			{
 				$scope.fullClaim = data;
 				//////console.log("The fullClaim  is=>",$scope.fullClaim);


 				//////console.log("The credit card accept  is=>",$scope.fullClaim.other_accepts_credit_card);

 				$scope.businessServices =[
 					{'name':'accepts_credit_card','value': $scope.fullClaim.other_accepts_credit_card},
 					{'name':'take_reservation','value': $scope.fullClaim.other_take_reservation},
 					{'name':'good_for_children','value': $scope.fullClaim.other_good_for_children},
 					{'name':'good_for_dancing','value': $scope.fullClaim.other_good_for_dancing},
 					{'name':'good_for_groups','value': $scope.fullClaim.other_good_for_groups},
 					{'name':'take_away','value': $scope.fullClaim.other_take_away},
 					{'name':'delivery','value': $scope.fullClaim.other_delivery},
 					{'name':'music','value': $scope.fullClaim.other_music},
 					{'name':'outdoor_seating','value': $scope.fullClaim.other_outdoor_seating},
 					{'name':'has_pool_table','value': $scope.fullClaim.other_has_pool_table},
 					{'name':'waiter_service','value': $scope.fullClaim.other_waiter_service},
 					{'name':'happy_hour','value': $scope.fullClaim.other_happy_hour},
 					{'name':'best_nights','value': $scope.fullClaim.other_best_night},
 					{'name':'alcohol','value': $scope.fullClaim.other_alcohol},
 					{'name':'has_tv','value': $scope.fullClaim.other_has_tv},
 					{'name':'has_wifi','value': $scope.fullClaim.other_has_wi_fi}
 				];

 				//////console.log($scope.businessServices);
 				// $scope.workinghours = [


 				//  {'value':0,'name':'12:00 AM'},
				 // {'value':1,'name':'12:30 AM'},
				 // {'value':2,'name':'1:00 AM'}];


 			}); // will try it next time

 			//for now working hours.
 			$scope.workinghours = getTimes.getWorkingTimes();
 			//////console.log("The working hours are",$scope.workinghours);

 });
 			// $scope.workinghours = [{'value':0,'name':'12:00 AM'},
				// {'value':1,'name':'12:30 AM'},
				// {'value':2,'name':'1:00 AM'}];


 		//working hours

 		
 	

 	

	$scope.updateCities = function(country_id)
	{

		GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			

		});

	}

	//countries and cities


	//categories and subcategories 
	$scope.categoryModels = [];
	//config.BaseURL+'classes/util.php?categories=categories'
	GetData.getData(config.BaseURL+'classes/util.php?categories=categories',function(data)
	{
		$scope.RawCategories = data;
		//////console.log("the raw category models are==>",$scope.RawCategories);

		angular.forEach($scope.RawCategories,function(value,key)
		{	$scope.RawCategory =value;
			$scope.categorymodel = new CategoryViewModel();
			$scope.categorymodel.category_id = $scope.RawCategory.category_id;
			$scope.categorymodel.categoryname = $scope.RawCategory.categoryname;
			$scope.categorymodel.sub_categories = $scope.RawCategory.category_subcategories;

			this.push($scope.categorymodel);

		},$scope.categoryModels);


	});

	$scope.updateCategorySubcategories=function(id,select_number)
	{
		angular.forEach($scope.categoryModels,function(value,key)
	 	{
			 $scope.thiscategory = value;
			if($scope.thiscategory.category_id == id)
			 {
			 	if(select_number==1){
			 		$scope.subcategory1Models=$scope.thiscategory.sub_categories;
			    }else if(select_number==2)
			    {
			    	$scope.subcategory2Models=$scope.thiscategory.sub_categories;
			    }else if(select_number==3)
			    {
			    	$scope.subcategory3Models=$scope.thiscategory.sub_categories;
			    }

			 }

		});

	}


}]).directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return val ? parseInt(val, 10) : null;
      });
      ngModel.$formatters.push(function(val) {
        return val ? '' + val : null;
      });
    }
  };
 })
.factory('getTimes', ['$http','$q','config', function($http,$q,config){

	var promissse =function(business_id,user_id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+"classes/util.php?time_owner_business_id="+business_id+"&owner_id="+user_id).
		  then(function(response) {
		    
		    deffered.resolve(response)
		  }, function(response) {
		    
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};

	return {

		getWorkingTimes:function()
		{
			var times = 
			[ 	{'value':'12:00 AM','name':'12:00 AM'},
				{'value':'12:30 AM','name':'12:30 AM'},
				{'value':'1:00 AM','name':'1:00 AM'},
				{'value':'1:30 AM','name':'1:30 AM'},
				{'value':'2:00 AM','name':'2:00 AM'},
				{'value':'2:30 AM','name':'2:30 AM'},
				{'value':'3:00 AM','name':'3:00 AM'},
				{'value':'3:30 AM','name':'3:30 AM'},
				{'value':'4:00 AM','name':'4:00 AM'},
				{'value':'4:30 AM','name':'4:30 AM'},
				{'value':'5:00 AM','name':'5:00 AM'},
				{'value':'5:30 AM','name':'5:30 AM'},
				{'value':'6:00 AM','name':'6:00 AM'},
				{'value':'6:30 AM','name':'6:30 AM'},
				{'value':'7:00 AM','name':'7:00 AM'},
				{'value':'7:30 AM','name':'7:30 AM'},
				{'value':'8:00 AM','name':'8:00 AM'},
				{'value':'8:30 AM','name':'8:30 AM'},
				{'value':'9:00 AM','name':'9:00 AM'},
				{'value':'9:30 AM','name':'9:30 AM'},
				{'value':'10:00 AM','name':'10:00 AM'},
				{'value':'10:30 AM','name':'10:30 AM'},
				{'value':'11:00 AM','name':'11:00 AM'},
				{'value':'11:30 AM','name':'11:30 AM'},
				{'value':'12:00 PM','name':'12:00 PM'},
				{'value':'12:30 PM','name':'12:30 PM'},
				{'value':'1:00 PM','name':'1:00 PM'},
				{'value':'1:30 PM','name':'1:30 PM'},
				{'value':'2:00 PM','name':'2:00 PM'},
				{'value':'2:30 PM','name':'2:30 PM'},
				{'value':'3:00 PM','name':'3:00 PM'},
				{'value':'3:30 PM','name':'3:30 PM'},
				{'value':'4:00 PM','name':'4:00 PM'},
				{'value':'4:30 PM','name':'4:30 PM'},
				{'value':'5:00 PM','name':'5:00 PM'},
				{'value':'5:30 PM','name':'5:30 PM'},
				{'value':'6:00 PM','name':'6:00 PM'},
				{'value':'6:30 PM','name':'6:30 PM'},
				{'value':'7:00 PM','name':'7:00 PM'},
				{'value':'7:30 PM','name':'7:30 PM'},
				{'value':'8:00 PM','name':'8:00 PM'},
				{'value':'8:30 PM','name':'8:30 PM'},
				{'value':'9:00 PM','name':'9:00 PM'},
				{'value':'9:30 PM','name':'9:30 PM'},
				{'value':'10:00 PM','name':'10:00 PM'},
				{'value':'10:30 PM','name':'10:30 PM'},
				{'value':'11:00 PM','name':'11:00 PM'},
				{'value':'11:30 PM','name':'11:30 PM'}


			]

			return times;

		},

		getFullBusinessClaim:function(business_id,user_id,callback)
		{
			promissse(business_id,user_id).then(function(data){
			//data =JSON.parse(data);
					//////////////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					////////////console.log("Error : ->",error);
			});


		}

		
	};
}]).controller('FullBusinessCtrl',['$scope','config','GetData','CountryViewModel','CityViewModel','$timeout','$compile','$templateRequest','ReviewModel','getTimes',function ($scope,config,GetData,CountryViewModel,CityViewModel,$timeout,$compile,$templateRequest,ReviewModel,getTimes) {

$scope.photo_toggle=0;
$scope.RandomComments=[];
$scope.BaseImageURL = config.BaseImageURL;
$scope.businessobject =
{
		 


		//services

		 has_wifi : '',
		 accepts_credit_card:'',
		 take_reservation:'',
		 good_for_children:'',
		 good_for_dancing: '',
		 good_for_groups:'',
		 take_away:'',
		 delivery:'',
		 music :'',
		 outdoor_seating:'',
		 has_pool_table:'',
		 waiter_service:'',
		 happy_hour:'',
		 best_night:'',
		 alcohol:'',
		 has_tv:'',


}

$scope.showModal = function()
{
	$("#myModal").modal('show');
}



$scope.firstoptions=
[
	{
		name : "YES",
		value :1
	}
	,
	{
		name : "NO",
		value :1
	}
];
////console.log("The first options are",$scope.firstoptions);
$scope.lastoptions = $scope.firstoptions.reverse();

$scope.my_cover_photo=null;
$scope.my_logo=null;

$scope.isPublicEditing =0;

$scope.postPublicEditBusiness=function()
{
		$scope.isPublicEditing =1;
		
					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","public_edit");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_id",$scope.FullBusiness.business.id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.FullBusiness.business.name);
					form_data.append("business_email",$scope.FullBusiness.business.email);
					form_data.append("business_website",$scope.FullBusiness.business.website);

					form_data.append("country_id",$scope.FullBusiness.business.country.id);
					form_data.append("city_id",$scope.FullBusiness.business.city.id);
					form_data.append("phone_1",$scope.FullBusiness.business.phone_1);
					form_data.append("phone_2",$scope.FullBusiness.business.phone_2);

					if($scope.FullBusiness.business.category_1 && $scope.FullBusiness.business.subcategory_1)
					{
					 	form_data.append("category_1_id",$scope.FullBusiness.business.category_1.id);
					 	form_data.append("sub_category_1_id",$scope.FullBusiness.business.subcategory_1.id);
					 	
					}
					if($scope.FullBusiness.business.category_2 && $scope.FullBusiness.business.subcategory_2)
					{
					 	form_data.append("category_2_id",$scope.FullBusiness.business.category_2.id);
					 	form_data.append("sub_category_2_id",$scope.FullBusiness.business.subcategory_2.id);
					 	
					}

					if($scope.FullBusiness.business.category_3 && $scope.FullBusiness.business.subcategory_3)
					{
					 	form_data.append("category_3_id",$scope.FullBusiness.business.category_3.id);
					 	form_data.append("sub_category_3_id",$scope.FullBusiness.business.subcategory_3.id);
					 	
					}

					
					// form_data.append("category_2_id",$scope.FullBusiness.business.category_2.id);
					// form_data.append("category_3_id",$scope.FullBusiness.business.category_3.id);
					
					// form_data.append("sub_category_2_id",$scope.FullBusiness.business.subcategory_2.id);
					// form_data.append("sub_category_3_id",$scope.FullBusiness.business.subcategory_3.id);

					form_data.append("address",$scope.FullBusiness.business.address);
					form_data.append("business_description",$scope.FullBusiness.business.description);

					
					form_data.append("cover_photo",$scope.my_cover_photo);
					form_data.append("logo",$scope.my_logo);

					 
						
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////alert(response);
						var mybusiness_id =response;
						window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+mybusiness_id;
						$scope.postEditReview($scope.business_id,$scope.user_id,0,0,$scope.date_created,"edited_business_info");
						
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

	


}

$scope.isEditing =0;

$scope.postEditBusiness=function()
{

	   $scope.isEditing=1;
		$scope.businessobject.has_wifi=document.getElementById('edit_has_wifi').value;
		$scope.businessobject.accepts_credit_card=document.getElementById('edit_accepts_credit_card').value;
		$scope.businessobject.take_reservation=document.getElementById('edit_take_reservation').value;
		$scope.businessobject.good_for_children=document.getElementById('edit_good_for_children').value;
		$scope.businessobject.good_for_dancing= document.getElementById('edit_good_for_dancing').value;
		$scope.businessobject.good_for_groups=document.getElementById('edit_good_for_groups').value;
		$scope.businessobject.take_away=document.getElementById('edit_take_away').value;
		$scope.businessobject.delivery=document.getElementById('edit_delivery').value;
		$scope.businessobject.music=document.getElementById('edit_music').value;
		$scope.businessobject.outdoor_seating=document.getElementById('edit_outdoor_seating').value;
		$scope.businessobject.has_pool_table=document.getElementById('edit_has_pool_table').value;
		$scope.businessobject.waiter_service=document.getElementById('edit_waiter_service').value;
		$scope.businessobject.happy_hour=document.getElementById('edit_happy_hour').value;
		$scope.businessobject.best_night=document.getElementById('edit_best_night').value;
		$scope.businessobject.alcohol=document.getElementById('edit_alcohol').value;
		$scope.businessobject.has_tv=document.getElementById('edit_has_tv').value;
		$scope.businessobject.business_description=document.getElementById('edit_business_description').value;
		


					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","super_edit");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_id",$scope.FullBusiness.business.id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.FullBusiness.business.name);
					form_data.append("position_of_editor",$scope.FullBusiness.business_claim.position);
					form_data.append("business_email",$scope.FullBusiness.business_claim.email);
					form_data.append("business_website",$scope.FullBusiness.business.website);

					form_data.append("country_id",$scope.FullBusiness.business.country.id);
					form_data.append("city_id",$scope.FullBusiness.business.city.id);

					
					form_data.append("phone_1",$scope.FullBusiness.business_claim.phone_1);
					form_data.append("phone_2",$scope.FullBusiness.business_claim.phone_2);


					if($scope.FullBusiness.business.category_1 && $scope.FullBusiness.business.subcategory_1)
					{
					 	form_data.append("category_1_id",$scope.FullBusiness.business.category_1.id);
					 	form_data.append("sub_category_1_id",$scope.FullBusiness.business.subcategory_1.id);
					 	
					}
					if($scope.FullBusiness.business.category_2 && $scope.FullBusiness.business.subcategory_2)
					{
					 	form_data.append("category_2_id",$scope.FullBusiness.business.category_2.id);
					 	form_data.append("sub_category_2_id",$scope.FullBusiness.business.subcategory_2.id);
					 	
					}

					if($scope.FullBusiness.business.category_3 && $scope.FullBusiness.business.subcategory_3)
					{
					 	form_data.append("category_3_id",$scope.FullBusiness.business.category_3.id);
					 	form_data.append("sub_category_3_id",$scope.FullBusiness.business.subcategory_3.id);
					 	
					}

					
					form_data.append("address",$scope.FullBusiness.business_claim.address);
					form_data.append("business_description",$scope.FullBusiness.business_claim.description);

					form_data.append("facebook_link",$scope.FullBusiness.business_claim.facebook_link);
					form_data.append("twitter_link",$scope.FullBusiness.business_claim.twitter_link);
					form_data.append("youtube_link",$scope.FullBusiness.business_claim.youtube_link);
					form_data.append("instagram_link",$scope.FullBusiness.business_claim.instagram_link);

					form_data.append("mon_start_time",$scope.FullBusiness.business_claim.monday_open);
					form_data.append("mon_end_time",$scope.FullBusiness.business_claim.monday_close);
					form_data.append("tue_start_time",$scope.FullBusiness.business_claim.tuesday_open);
					form_data.append("tue_end_time",$scope.FullBusiness.business_claim.tuesday_close);
					form_data.append("wed_start_time",$scope.FullBusiness.business_claim.wednesday_open);
					form_data.append("wed_end_time",$scope.FullBusiness.business_claim.wednesday_close);
					form_data.append("thur_start_time",$scope.FullBusiness.business_claim.thursday_open);
					form_data.append("thur_end_time",$scope.FullBusiness.business_claim.thursday_close);
					form_data.append("fri_start_time",$scope.FullBusiness.business_claim.friday_open);
					form_data.append("fri_end_time",$scope.FullBusiness.business_claim.friday_close);
					form_data.append("sat_start_time",$scope.FullBusiness.business_claim.saturday_open);
					form_data.append("sat_end_time",$scope.FullBusiness.business_claim.saturday_close);
					form_data.append("sun_start_time",$scope.FullBusiness.business_claim.sunday_open);
					form_data.append("sun_end_time",$scope.FullBusiness.business_claim.sunday_close);




					
					form_data.append("accepts_credit_card",$scope.businessobject.accepts_credit_card);
					form_data.append("take_reservation",$scope.businessobject.take_reservation);
					form_data.append("good_for_children",$scope.businessobject.good_for_children);
					form_data.append("good_for_dancing",$scope.businessobject.good_for_dancing);
					form_data.append("good_for_groups",$scope.businessobject.good_for_groups);
					form_data.append("take_away",$scope.businessobject.take_away);
					form_data.append("delivery",$scope.businessobject.delivery);
					form_data.append("music",$scope.businessobject.music);
					form_data.append("outdoor_seating",$scope.businessobject.outdoor_seating);
					form_data.append("has_pool_table",$scope.businessobject.has_pool_table);
					form_data.append("waiter_service",$scope.businessobject.waiter_service);
					form_data.append("happy_hour",$scope.businessobject.happy_hour);
					form_data.append("best_night",$scope.businessobject.best_night);
					form_data.append("alcohol",$scope.businessobject.alcohol);
					form_data.append("has_tv",$scope.businessobject.has_tv);
					form_data.append("has_wifi",$scope.businessobject.has_wifi);

					form_data.append("cover_photo",$scope.my_cover_photo);
					form_data.append("logo",$scope.my_logo);


					////console.log("",$scope.user_id);




					
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////alert(response);
						var mybusiness_id =response;
						$scope.isEditing=0;
						$scope.postEditReview($scope.business_id,$scope.user_id,0,0,$scope.date_created,"edited_my_info");
						window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness_id;
	
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});


	


	}

$scope.isClaiming=0;
$scope.postClaimBusiness=function()
	{

		$scope.isClaiming =1;
		$scope.businessobject.has_wifi=document.getElementById('edit_has_wifi').value;
		$scope.businessobject.accepts_credit_card=document.getElementById('edit_accepts_credit_card').value;
		$scope.businessobject.take_reservation=document.getElementById('edit_take_reservation').value;
		$scope.businessobject.good_for_children=document.getElementById('edit_good_for_children').value;
		$scope.businessobject.good_for_dancing= document.getElementById('edit_good_for_dancing').value;
		$scope.businessobject.good_for_groups=document.getElementById('edit_good_for_groups').value;
		$scope.businessobject.take_away=document.getElementById('edit_take_away').value;
		$scope.businessobject.delivery=document.getElementById('edit_delivery').value;
		$scope.businessobject.music=document.getElementById('edit_music').value;
		$scope.businessobject.outdoor_seating=document.getElementById('edit_outdoor_seating').value;
		$scope.businessobject.has_pool_table=document.getElementById('edit_has_pool_table').value;
		$scope.businessobject.waiter_service=document.getElementById('edit_waiter_service').value;
		$scope.businessobject.happy_hour=document.getElementById('edit_happy_hour').value;
		$scope.businessobject.best_night=document.getElementById('edit_best_night').value;
		$scope.businessobject.alcohol=document.getElementById('edit_alcohol').value;
		$scope.businessobject.has_tv=document.getElementById('edit_has_tv').value;
		$scope.businessobject.business_description=document.getElementById('edit_business_description').value;
		


					var form_data = new FormData();

					form_data.append("claim_post","claim_post");
					form_data.append("transaction","super_claim");
					form_data.append("user_id",$scope.user_id);
					form_data.append("business_id",$scope.business_id);
					form_data.append("date_created",$scope.date_created);
					form_data.append("business_name",$scope.FullBusiness.business.name);
					form_data.append("position_of_editor",$scope.FullBusiness.business_claim.position);
					form_data.append("business_email",$scope.FullBusiness.business.email);
					form_data.append("business_website",$scope.FullBusiness.business.website);

					form_data.append("country_id",$scope.FullBusiness.business.country.id);
					form_data.append("city_id",$scope.FullBusiness.business.city.id);

					
					form_data.append("phone_1",$scope.FullBusiness.business.phone_1);
					form_data.append("phone_2",$scope.FullBusiness.business.phone_2);


					if($scope.FullBusiness.business.category_1 && $scope.FullBusiness.business.subcategory_1)
					{
					 	form_data.append("category_1_id",$scope.FullBusiness.business.category_1.id);
					 	form_data.append("sub_category_1_id",$scope.FullBusiness.business.subcategory_1.id);
					 	
					}
					if($scope.FullBusiness.business.category_2 && $scope.FullBusiness.business.subcategory_2)
					{
					 	form_data.append("category_2_id",$scope.FullBusiness.business.category_2.id);
					 	form_data.append("sub_category_2_id",$scope.FullBusiness.business.subcategory_2.id);
					 	
					}

					if($scope.FullBusiness.business.category_3 && $scope.FullBusiness.business.subcategory_3)
					{
					 	form_data.append("category_3_id",$scope.FullBusiness.business.category_3.id);
					 	form_data.append("sub_category_3_id",$scope.FullBusiness.business.subcategory_3.id);
					 	
					}

					
					form_data.append("address",$scope.FullBusiness.business_claim.address);
					form_data.append("business_description",$scope.FullBusiness.business_claim.description);

					form_data.append("facebook_link",$scope.FullBusiness.business_claim.facebook_link);
					form_data.append("twitter_link",$scope.FullBusiness.business_claim.twitter_link);
					form_data.append("youtube_link",$scope.FullBusiness.business_claim.youtube_link);
					form_data.append("instagram_link",$scope.FullBusiness.business_claim.instagram_link);

					form_data.append("mon_start_time",$scope.FullBusiness.business_claim.monday_open);
					form_data.append("mon_end_time",$scope.FullBusiness.business_claim.monday_close);
					form_data.append("tue_start_time",$scope.FullBusiness.business_claim.tuesday_open);
					form_data.append("tue_end_time",$scope.FullBusiness.business_claim.tuesday_close);
					form_data.append("wed_start_time",$scope.FullBusiness.business_claim.wednesday_open);
					form_data.append("wed_end_time",$scope.FullBusiness.business_claim.wednesday_close);
					form_data.append("thur_start_time",$scope.FullBusiness.business_claim.thursday_open);
					form_data.append("thur_end_time",$scope.FullBusiness.business_claim.thursday_close);
					form_data.append("fri_start_time",$scope.FullBusiness.business_claim.friday_open);
					form_data.append("fri_end_time",$scope.FullBusiness.business_claim.friday_close);
					form_data.append("sat_start_time",$scope.FullBusiness.business_claim.saturday_open);
					form_data.append("sat_end_time",$scope.FullBusiness.business_claim.saturday_close);
					form_data.append("sun_start_time",$scope.FullBusiness.business_claim.sunday_open);
					form_data.append("sun_end_time",$scope.FullBusiness.business_claim.sunday_close);




					
					form_data.append("accepts_credit_card",$scope.businessobject.accepts_credit_card);
					form_data.append("take_reservation",$scope.businessobject.take_reservation);
					form_data.append("good_for_children",$scope.businessobject.good_for_children);
					form_data.append("good_for_dancing",$scope.businessobject.good_for_dancing);
					form_data.append("good_for_groups",$scope.businessobject.good_for_groups);
					form_data.append("take_away",$scope.businessobject.take_away);
					form_data.append("delivery",$scope.businessobject.delivery);
					form_data.append("music",$scope.businessobject.music);
					form_data.append("outdoor_seating",$scope.businessobject.outdoor_seating);
					form_data.append("has_pool_table",$scope.businessobject.has_pool_table);
					form_data.append("waiter_service",$scope.businessobject.waiter_service);
					form_data.append("happy_hour",$scope.businessobject.happy_hour);
					form_data.append("best_night",$scope.businessobject.best_night);
					form_data.append("alcohol",$scope.businessobject.alcohol);
					form_data.append("has_tv",$scope.businessobject.has_tv);
					form_data.append("has_wifi",$scope.businessobject.has_wifi);

					form_data.append("cover_photo",$scope.my_cover_photo);
					form_data.append("logo",$scope.my_logo);


					////console.log("",$scope.user_id);




					
					
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////alert(response);
						//console.log("the respo is==>",response);
						var my_business_response = JSON.parse(response);
						$scope.my_business_status = my_business_response['status'];
						//next step is heading to business page to change word of claim to pending..
						var my_business_id = my_business_response['id'];
						//$scope.FullBusiness.business_status = $scope.my_business_status;
						$scope.isClaiming =0;
						//$scope.postEditReview($scope.business_id,$scope.user_id,0,0,$scope.date_created,"edited_my_info");
						window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+my_business_id;
	
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

	


	}

$scope.postEditReview=function(business_id,user_id,rating,pricing,date_created,details)
{
		
		
		var kind ='';


		if(details=="edited_business_info")
		{
			kind="business_edit_info";
		}else if(details=="edited_my_info")
		{
			kind="business_edit_info";

		}

		
		//var kind = "review";
					if(rating==0 && pricing==0)
					{
						rating=-1;
						pricing=-1;
					}
		
			        ////////////alert("buddy man");

			

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","business_edit_info");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////////////////////alert("buddy am in the thing");
						
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			

		
		
	}


		$scope.countryModels=[];
		$scope.showdefault=0;

$scope.updateCities = function(country_id)
{
		//$scope.FullBusiness.business.city =null;
		////console.log("The country id is ",country_id);
		////console.log("updating cities");
		$scope.showdefault=1;
		GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+country_id,function(data)
		{	$scope.cities =data;
			$scope.cityModels=[];
			angular.forEach($scope.cities, function(value,key)
			{
				
				$scope.currentCity =value;
				$scope.cityModel = new CityViewModel();
				$scope.cityModel.id = $scope.currentCity['id'];
				$scope.cityModel.name = $scope.currentCity['name'];
				this.push($scope.cityModel);

			},$scope.cityModels);
			
			$scope.FullBusiness.business.city =$scope.cityModels[0];
		});

	}

 		

$scope.pictureChanges= function(e,keyword){

			//////alert("tigidi");
			
			//////console.log("the e is",e)

			////////console.log("files is ->",e.target.files);

			if (e.target.files && e.target.files[0]) {

	            var reader = new FileReader();
	            ////////console.log('my reader is ',reader);


	            reader.onload = function (e) {
	            	////////console.log('my event is ',reader.result);
	            	// ////////////console.log('my event mikemdd is ',e);
	            	//$scope.client.avatar=e.target.result;
	           		////////console.log("scope picutre is ->",$scope.client.avatar);
	            			
	            	 if(keyword=='banner')
	            	 {
	            	 	$scope.FullBusiness.business.banner=e.target.result;
	            	 	////////console.log("banner is ->",$scope.FullBusiness.business.banner);
	            	 }else if(keyword=='logo')
	            	 {
	            	 	$scope.FullBusiness.business.logo=e.target.result;
	            	 	////////console.log("logo is ->",$scope.FullBusiness.business.logo);
	            	 }		
	           		
	           		
	           		$scope.$digest();
	       					


	                   
	            };

	            reader.readAsDataURL(e.target.files[0]);
	        }

	
	

}
$scope.subcategory1Models=[];
$scope.subcategory2Models=[];
$scope.subcategory3Models=[];

$scope.updateCategorySubcategories=function(id,select_number)
	{
		angular.forEach($scope.categoryModels,function(value,key)
	 	{
			 $scope.thiscategory = value;
			if($scope.thiscategory.category_id == id)
			 {
			 	if(select_number==1){
			 		$scope.subcategory1Models=$scope.thiscategory.sub_categories;
			 		$scope.FullBusiness.business.subcategory_1 =$scope.subcategory1Models[0];
			    }else if(select_number==2)
			    {
			    	$scope.subcategory2Models=$scope.thiscategory.sub_categories;
			    	$scope.FullBusiness.business.subcategory_2 =$scope.subcategory2Models[0];
			    }else if(select_number==3)
			    {
			    	$scope.subcategory3Models=$scope.thiscategory.sub_categories;
			    	$scope.FullBusiness.business.subcategory_3 =$scope.subcategory3Models[0];
			    }

			 }

		});

	}

$scope.submiting =0;
$scope.submitCode = function()
{
	$scope.submiting =1;
	var form_data = new FormData();
	form_data.append("code",$scope.business_code);

	$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//console.log(response);
						var res =JSON.parse(response);
						//console.log(res);

						//$("#posters").prepend(response);
						if(res['code_status']!==0)
						{
							//console.log("tigidi");
							window.location.href=config.BaseURL+"business_approve4.php?current_business_id="+res['business_id'];
						}else if(res['code_status']==0)
						{
							//console.log("togodo");
							$scope.submiting = -1;
						}
						
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
   });

}

$scope.sendtoPage=function(business_id)
{
	window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+business_id;
}
    //$scope.rate = 0;
    //$scope.price =0;
    //$scope.business_id=30;
    
angular.element(document).ready(function(){
	////console.log("the js business_id" ,$scope.business_id);
	//config.BaseURL+'classes/util.php?business_profile_picker_id='+$scope.business_id+"&user_id="+$scope.user_id
	GetData.getData(config.BaseURL+'classes/util.php?business_profile_picker_id='+$scope.business_id+"&user_id="+$scope.user_id,function(data)
 	{  
 		
 		$scope.FullBusiness = data;
 		//console.log('The full_business is ==>',$scope.FullBusiness);
 		$scope.my_business_status=$scope.FullBusiness.business_status;
 		//console.log("the business_status is -->" ,$scope.my_business_status);
 		$scope.businessobject.city_id=$scope.FullBusiness.business.city.id;

 		//////console.log($scope.FullBusiness.latest_user_rate +"tigidi rattes"+$scope.FullBusiness.latest_user_price);
  		if($scope.FullBusiness.latest_user_rate > -1 || $scope.FullBusiness.latest_user_price > -1 )
  		{
  			$scope.rate = $scope.FullBusiness.latest_user_rate;
  		    $scope.price =$scope.FullBusiness.latest_user_price;
  		}else
  		{
  			$scope.rate = 0;
  		    $scope.price = 0;

  		}
 		////////console.log("lalalal the business is",$scope.FullBusiness);
 		if($scope.FullBusiness.business.banner=="" || $scope.FullBusiness.business.banner==null)
 		{
 			$scope.FullBusiness.business.banner = config.BaseImageURL+"uploads/defbanner.png";

 		}else
 		{
 			$scope.FullBusiness.business.banner = config.BaseImageURL+$scope.FullBusiness.business.banner;
 		}
 		if($scope.FullBusiness.business.logo=="" || $scope.FullBusiness.business.logo==null)
 		{
 			$scope.FullBusiness.business.logo = config.BaseImageURL+"uploads/deflogo.png";

 		}else
 		{
 			$scope.FullBusiness.business.logo = config.BaseImageURL+$scope.FullBusiness.business.logo;
 		}
 		//photoscount
 		$scope.photo_count =$scope.FullBusiness.photo_count;
 		//photos
 		$scope.photo_names = [];
 		angular.forEach($scope.FullBusiness.photos,function(value,key)
 		{
 			$scope.currentphoto = value;
 			//////console.log("current photo =>",$scope.currentphoto);

			if($scope.currentphoto != null || $scope.currentphoto !='')
			{
				$scope.currentphoto=config.BaseImageURL+$scope.currentphoto;
			}else
			{
				$scope.currentphoto=config.BaseImageURL+"uploads/capture.png";
			}

			this.push($scope.currentphoto);
 			$scope.count++;


 		},$scope.photo_names);

 		//reviewcount 
 		$scope.review_count =$scope.FullBusiness.review_count;


 		//followers
 		$scope.follower_number=$scope.FullBusiness.follower_count;

 		$scope.rrowCollection =[];

 		angular.forEach($scope.FullBusiness.followers,function(value,key)
 		{
 			$scope.follower =value;
 			if($scope.follower.avatar == null || $scope.follower.avatar =='')
 			{
 				$scope.follower.avatar=config.BaseImageURL+'uploads/defavatar.png';
 			}else if($scope.follower.avatar.startsWith("http"))
 			{
 				$scope.follower.avatar=$scope.follower.avatar;
 			}else
 			{
 				$scope.follower.avatar=config.BaseImageURL+$scope.follower.avatar;
 			}



 		});

 		$scope.rrowcount=0;
 		$scope.followersCount =$scope.FullBusiness.followers.length;
 		if(($scope.followersCount)%2==0)
 		{
 			$scope.rrowcount=($scope.followersCount)/2;

 		}else if(($scope.followersCount)%2==1)
 		{
 			$scope.rrowcount=(($scope.followersCount-1)/2)+1;
 		}
 		//splitted into two
 		$scope.twotwofollowers=[];
 		var size = 2;
 		var b = $scope.FullBusiness.followers;
			while(b.length) {
			    $scope.twotwofollowers.push(b.splice(0,2));
			}
		$scope.currenttwotwofollower =[];

 		for(var i=0;i<$scope.rrowcount; i++)
 		{
 			$scope.rrowCollection[i]="row"+i;
 		}
 		////////console.log("the rows are ="+$scope.rowCollection);

 		$scope.cityModels = [];
 		angular.forEach($scope.FullBusiness.business.country.towns,function(value,key)
 		{
 			$scope.thistown = value;
 			if($scope.thistown.id==$scope.FullBusiness.business.city.id)
 			{

 			}else{
 				$scope.cityModels.push($scope.thistown);
 			}

 		})

 		$scope.workinghours = getTimes.getWorkingTimes();
 		//////console.log("the service is ",$scope.FullBusiness.business_claim.other_accepts_credit_card);
 		//////console.log("the service is ",$scope.FullBusiness.business_claim.other_outdoor_seating);
 		$scope.businessServices =[
 		
 					{'name':'accepts_credit_card','value': $scope.FullBusiness.business_claim.other_accepts_credit_card},
 					{'name':'take_reservation','value': $scope.FullBusiness.business_claim.other_take_reservation},
 					{'name':'good_for_children','value': $scope.FullBusiness.business_claim.other_good_for_children},
 					{'name':'good_for_dancing','value': $scope.FullBusiness.business_claim.other_good_for_dancing},
 					{'name':'good_for_groups','value': $scope.FullBusiness.business_claim.other_good_for_groups},
 					{'name':'take_away','value': $scope.FullBusiness.business_claim.other_take_away},
 					{'name':'delivery','value': $scope.FullBusiness.business_claim.other_delivery},
 					{'name':'music','value': $scope.FullBusiness.business_claim.other_music},
 					{'name':'outdoor_seating','value': $scope.FullBusiness.business_claim.other_outdoor_seating},
 					{'name':'has_pool_table','value': $scope.FullBusiness.business_claim.other_has_pool_table},
 					{'name':'waiter_service','value': $scope.FullBusiness.business_claim.other_waiter_service},
 					{'name':'happy_hour','value': $scope.FullBusiness.business_claim.other_happy_hour},
 					{'name':'best_nights','value': $scope.FullBusiness.business_claim.other_best_night},
 					{'name':'alcohol','value': $scope.FullBusiness.business_claim.other_alcohol},
 					{'name':'has_tv','value': $scope.FullBusiness.business_claim.other_has_tv},
 					{'name':'has_wifi','value': $scope.FullBusiness.business_claim.other_has_wi_fi}
 		];

 		//countries

 		GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
 		{

 			$scope.RawCountries = data;
 			////////console.log("The countries are",$scope.RawCountries);
 			angular.forEach($scope.RawCountries,function(value,key)
 			{
 				$scope.RawCountry = value;
 				$scope.countryModel = new CountryViewModel();
				$scope.countryModel.id = $scope.RawCountry['id'];
				$scope.countryModel.name = $scope.RawCountry['name'];
				$scope.countryModel.country_code= $scope.RawCountry['code'];

				GetData.getData(config.BaseURL+"classes/util.php?signupCountry_id="+$scope.countryModel.id,function(data){
					$scope.RawCities = data;
					$scope.countryModel.cities = data
				});


				//if($scope.countryModel.id!=$scope.FullBusiness.business.country.id){
					this.push($scope.countryModel);
				//}
	
 			},$scope.countryModels);
			////////console.log("The countries are",$scope.countryModels);

 		});

 		//categories

 		$scope.categoryModels = [];
	//config.BaseURL+'classes/util.php?categories=categories'
		GetData.getData(config.BaseURL+'classes/util.php?categories=categories',function(data)
		{
			$scope.RawCategories = data;
			//////console.log("the raw category models are==>",$scope.RawCategories);

			angular.forEach($scope.RawCategories,function(value,key)
			{	$scope.RawCategory =value;
				$scope.categorymodel = new CategoryViewModel();
				$scope.categorymodel.category_id = $scope.RawCategory.category_id;
				$scope.categorymodel.categoryname = $scope.RawCategory.categoryname;
				$scope.categorymodel.sub_categories = $scope.RawCategory.category_subcategories;

				this.push($scope.categorymodel);

			},$scope.categoryModels);


		});


 	});


 		



}); //



$scope.likeNewComment=function(user_id,comment_id,newsfeed_id)
 	{	
 				//////////alert("am liking this comment");
 				//////console.log("The random comments are",$scope.RandomComments);
 				angular.forEach($scope.RandomComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=1;
 						$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 			

 	}
 	$scope.unlikeNewComment=function(user_id,comment_id,newsfeed_id)
 	{
 		
 				angular.forEach($scope.RandomComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=0;
 						$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					//////////////////alert(data);
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 	
 	}




   // $scope.business_id=0;
	$scope.addtoFavourites = function(item_type,user_id,business_id)
	{
        
		$.get(config.BaseURL+"classes/util.php?add_to_favourites="+item_type+"&user_id="+user_id+"&business_id="+business_id,function(results){
					////////////////////alert(results);
					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});
		$scope.favouritetoggle=1;
		$scope.postFavfollowReview(business_id,user_id,0,0,"business_favourite",$scope.date_created,"add_to_favourites");
		

	}
	$scope.followItem = function(item_type,user_id,item_id)
 	{
 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					 	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=1;
				$scope.postFavfollowReview(item_id,user_id,0,0,"business_follow",$scope.date_created,"add_to_followed");

 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id)
 	{


 		////////////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=0;

 	}

 	 $scope.postComment=function(user_id,feed_id,details,date_created,type,callback)
	 {
		////////////////////alert("gone");
		//var details = document.getElementById("content"+feed_id).value;
		var kind ="normal";
		var commentTo = 0;

		if (details != "") {
	        ////////////////////alert(val);
	        $.get(BaseURL+"classes/util.php?comment_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&feed_id="+feed_id+"&commentTo="+commentTo+"&details="+details,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////////////////////alert("results are"+results);
				  	callback(results);
				  	
			});
	    }
	}


 	$scope.postFavfollowReview=function(business_id,user_id,rating,pricing,kind,date_created,details)
	{
		

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		
			
		
			if (details != "") 
			{

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind",kind);
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert(response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}

		
	    $scope.details="";
	}


	$scope.returned_feeds=[];
	$scope.setCommentCount=function(feed_id,comment_count)
	{
		angular.forEach($scope.returned_feeds,function(value,key)
		{
			$scope.cfeed=value;
			if($scope.cfeed.id==feed_id)
			{
				$scope.cfeed.comment_count=comment_count;
			}

		});



	}
 	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details,callback)
	{
		var image = $scope.myFile;

		////////////alert("am in the right post"+image);
		//var kind = "review";
		console.log("The business_id is  "+business_id);
		console.log("The user_id is  "+user_id);
		console.log("The pricing is  "+pricing);
		console.log("The rating is  "+rating);
		console.log("The date_created is  "+date_created);
		console.log("The details is  "+details);

		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if(image !=null){
			
					////////////////////alert(val);
					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("picture",image);
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","review_photo");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//$("#posters").prepend(response);
						$scope.myFile=null;
						
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});
					
					// $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&good="+rating+"&cost="+pricing+"&details="+details+"&business_id="+business_id,function(results){
						
					// 			$("#posters").prepend(results);

					// });
			
		}else if(image==null  || image==undefined )
		{
			if (details != "" && details !='rate') 
			{

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","review");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}else if(details=='rate')
			{
				var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind","rate");
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});


			}

		}
		$scope.photo_toggle=0;

	    $scope.details="";
	}

	$scope.likeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		////////////alert("i laike");

 		//$scope.like =1;
 		
    	angular.forEach($scope.returned_feeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////alert("am liking this feed");
 				//currentfeed.likeToggleValue=1;
 				angular.forEach(currentfeed.myfeedComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						////////////alert("am liking this comment feed");
 						currentcomment.isLikedByUser=1;
 						$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 			}

 		});

 	}
 	$scope.unlikeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		//$scope.like =0;
 		

    	angular.forEach($scope.returned_feeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////////////alert("am liking this feed");
 				//currentfeed.likeToggleValue=1;
 				angular.forEach(currentfeed.myfeedComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=0;
 						$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					//////////////////alert(data);
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 			}

 		});

 	}
	


	$scope.likeNFItem=function(user_id,newsfeed_id)
 	{
 		//////////////alert("tigidify");

 		//////console.log($scope.returned_feeds);

 		angular.forEach($scope.returned_feeds,function(value,key)
 		{
 			$scope.thissfeed = value;
 			if($scope.thissfeed.id==newsfeed_id)
 			{
 				$scope.thissfeed.likeToggleValue=1;
 				$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        			////////////////////alert(data);
        			var datafig = data;
        			$scope.thissfeed.likeNo=parseInt(datafig);
        			//$scope.$digest();
        			////////////////////alert(currentfeed.likeNo);
    			});
 				//////////////alert("tigidi");
 			}

 		});
 				
 				

 	}
 	$scope.unlikeNFItem=function(user_id,newsfeed_id)
 	{

 		angular.forEach($scope.returned_feeds,function(value,key)
 		{
 			$scope.thissfeed = value;
 			if($scope.thissfeed.id==newsfeed_id)
 			{
 				$scope.thissfeed.likeToggleValue=0;
 				

 				$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        				////////////////////alert(data);
        			
        			var datafig = data;
        			$scope.thissfeed.likeNo=parseInt(datafig);
        			$scope.$digest();
        			////////////////////alert(currentfeed.likeNo);
    			});
 		
 			}

 		});


    	
 	}

	$scope.postAddPhotoReview=function(business_id,user_id,rating,pricing,date_created,details,image,callback)
	{
		//////////////////alert('tigidi');
		//var image = $scope.myFile;
		//////////////////alert(image);


		if($scope.user_id = $scope.FullBusiness.owner_id)
		{
			var kind ="business_photo";
			//////////////////alert('tigidi the kind is==>'+ kind);
		}else
		{
			var kind ="add_photo";
			//////////////////alert('tigidi the kind are hahah==>'+ kind);
		}


		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if(image !=null){
			
					////////////////////alert(val);
					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("picture",image);
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind",kind);
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						////////alert("The response is==>" + response);
						//$("#posters").prepend(response);
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////////console.log(); // Optional
						//////////////////alert("The error is==>"+errorMessage);
					}
					});
					
					// $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&good="+rating+"&cost="+pricing+"&details="+details+"&business_id="+business_id,function(results){
						
					// 			$("#posters").prepend(results);

					// });
			
		}
	    $scope.details="";
	}

	

	$scope.upload_fille= function ()
	{

		document.getElementById("post_biz_file_attach").click();
		$scope.photo_toggle=1;
		
		
		//angular.element('#file_attach').triggerHandler('click');
		


	}
	$scope.resetToggle=function()
	{
		$timeout(function()
		{
			 $scope.photo_toggle=0;

		});
	}



 
 	$scope.uploadBusinessFile=function (uploader_id,business_id,input,page,price,rate){
 		//$scope.photos=[];
 		////////////console.log('input is ----->',input.files[0]);
 		$scope.photo_names = [];
 		var myelement=null;

 		if(page=='not_owner')
 		{
 			kind ='add_photo';
 			myelement = angular.element(document.getElementById('business_page_3_posters'));
 		}else if(page=='owner')
 		{
 			kind ='business_photo';
 			myelement = angular.element(document.getElementById('business_page_owners_view_posters'));
 		}

		if (input.files && input.files[0]) {

		    var blobFile =input.files[0];
		    var fd = new FormData();
		    fd.append("fileToUpload", blobFile);
		    fd.append("uploader_id",uploader_id);
		    fd.append("business_id",business_id);
		    fd.append("kind",kind);
		    fd.append("price",price);
		    fd.append("rate",rate);

		    $.ajax({
		       url: "classes/util.php",
		       type: "POST",
		       data: fd,
		       processData: false,
		       contentType: false,
		       success: function(response) {
		       		$scope.photocount=0;
		       		
		       		//////alert(response);
		       		//////console.log("the rsponse is=>",response);
		       		var countt=$scope.countt;
		       		$scope.data= JSON.parse(response);
		       		//the newsfeed
		       		$scope.RandomFeed = $scope.data['newsfeed'];

		       		
			  		//$scope.RandomFeed=JSON.parse(data);

			  		$scope['myfeed'+countt] = new ReviewModel();

					 		$scope['myfeed'+countt].id =$scope.RandomFeed.id;
					 		$scope['myfeed'+countt].price = $scope.RandomFeed.cost;
					 		$scope['myfeed'+countt].rate = $scope.RandomFeed.good;
					 		$scope['myfeed'+countt].content=$scope.RandomFeed.details;
					 		

					 		$scope['myfeed'+countt].person_avatar=$scope.RandomFeed.user.avatar;
					 		$scope['myfeed'+countt].business_name = $scope.RandomFeed.business.name;
					 		$scope['myfeed'+countt].person_name =$scope.RandomFeed.user.first_name+" "+$scope.RandomFeed.user.last_name;
					 		$scope['myfeed'+countt].business_id =$scope.RandomFeed.business.id;
					 		$scope['myfeed'+countt].isLikedByUser =$scope.RandomFeed.isLikedByUser; 
					 		//$scope.RandomFeed.isLikedByUser=0; 
					 		$scope['myfeed'+countt].business_owner_id =$scope.RandomFeed.business.owner_id;
					 		$scope['myfeed'+countt].date_created = $scope.RandomFeed.date_created;

					 		if($scope.RandomFeed.isLikedByUser==0)
					 		{
					 			$scope['myfeed'+countt].likeToggleValue=0;

					 		}else if($scope.RandomFeed.isLikedByUser==1)
					 		{
					 			$scope['myfeed'+countt].likeToggleValue=1;
					 		}

					 		        for(var i=0; i<$scope['myfeed'+countt].rate; i++)
									{
										$scope['myfeed'+countt].ratings[i]=i;
									}
									for(var j=0; j<$scope['myfeed'+countt].price; j++)
									{
										$scope['myfeed'+countt].pricings[j]=j;
									}

									for(var k=0; k<(5-$scope['myfeed'+countt].rate); k++)
									{
										$scope['myfeed'+countt].noratings[k]=k;
									}

									for(var l=0; l<(5-$scope['myfeed'+countt].price); l++)
									{
										$scope['myfeed'+countt].nopricings[l]=l;
									}

									$scope['myfeed'+countt].content =$scope.RandomFeed.details;

					 		//////console.log("the feed iisisi is",$scope.RandomFeed);

					 		
					 		//////console.log("my element is",myelement);

					 		    $scope.myFeedComments =[];

								angular.forEach($scope.myFeedComments,function(value,key)
								{
									$scope.thiscomment=value;
									if($scope.thiscomment.isLikedByUser==0)
									{

									}else if($scope.thiscomment.isLikedByUser==1)
									{

									}
									this.push($scope.thiscomment);

								},$scope.myFeedComments);
							$scope['myfeed'+countt].myfeedComments=$scope.myFeedComments;

							$scope.returned_feeds.push($scope['myfeed'+countt]);
							////////alert("kabiriiti");
					 			myelement.prepend
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/photo_feed.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/myfeed/g , "myfeed"+countt);
							      //////////////////alert(html);
							      var template = angular.element(html);
							      myelement.prepend(template);
							      $compile(template)($scope);
							      //scope.countt = scope.countt+1;
					  			 })
				      		 	);

					       $scope.countt = $scope.countt + 1;


		       		//photos
		       		$scope.photos=$scope.data['photos'];

		       		angular.forEach($scope.photos,function(value,key)
				 		{
				 			$scope.photo = value;
				 			$scope.photoname =$scope.photo['photo'];

				 			if($scope.photoname != null || $scope.photoname !='')
				 			{
				 				$scope.photoname=config.BaseImageURL+$scope.photoname;
				 			}else
				 			{
				 				$scope.photoname=config.BaseImageURL+"uploads/capture.png";
				 			}

				 			//var hh=[];
				 			////////console.log(hh.contains("henry"));

				 			 if($scope.photo_names.includes($scope.photoname))
				 			 {
				 			 	
				 			 }else
				 			 {
				 			 	this.push($scope.photoname);
				 			 }
				 				
				 			
				 		},$scope.photo_names);
		       		window.foo = $scope.photo_names;
		       		//////console.log($scope.photo_names);
		       		
		       		for(var h=0;h<$scope.photo_names.length;h++)
		       		{
		       			switch(h)
		       			{
		       				case 0:
		       					$scope.myphoto1=$scope.photo_names[h];
		       					//////console.log("myphoto1",$scope.myphoto1);
		       					break;
		       				case 1:
		       					$scope.myphoto2=$scope.photo_names[h];
		       					//////console.log("myphoto2",$scope.myphoto2);

		       					break;
		       				case 2:
		       					$scope.myphoto3=$scope.photo_names[h];
		       					//////console.log("myphoto3",$scope.myphoto3);

		       					break;
		       				case 3:
		       					$scope.myphoto4=$scope.photo_names[h];
		       					//////console.log("myphoto4",$scope.myphoto4);

		       					break;
		       				case 4:
		       					$scope.myphoto5=$scope.photo_names[h];
		       					//////console.log("myphoto5",$scope.myphoto5);

		       					break;
		       				case 5:
		       					$scope.myphoto6=$scope.photo_names[h];
		       					//////console.log("myphoto6",$scope.myphoto6);

		       					break;
		       				case 6:
		       					$scope.myphoto7=$scope.photo_names[h];
		       					//////console.log("myphoto7",$scope.myphoto7);

		       					break;
		       				case 7:
		       					$scope.myphoto8=$scope.photo_names[h];
		       					//////console.log("myphoto8",$scope.myphoto8);

		       					break;
		       				default:
		       				
		       				  break;

		       			}
		       		}
		       		$scope.$digest();
		           // .. do something
		       },
		       error: function(jqXHR, textStatus, errorMessage) {
		           //////console.log(errorMessage); 
		           //////alert("Error=>",errorMessage);
		           // Optional
		       }
		    });
		   // $scope.postAddPhotoReview(business_id,uploader_id,0,0,$scope.date_created,"photo_posting");


		}

		
		// $scope.postAddPhotoReview(business_id,uploader_id,0,0,$scope.date_created,"photo_posting",blobFile,function(data)
		// {
		// 	//////alert(data);
		   	 //        var countt=$scope.countt;
			  		// $scope.RandomFeed=JSON.parse(data);

			  		// $scope['myfeed'+countt] = new ReviewModel();

					 	// 	$scope['myfeed'+countt].id =$scope.RandomFeed.id;
					 	// 	$scope['myfeed'+countt].price = $scope.RandomFeed.cost;
					 	// 	$scope['myfeed'+countt].rate = $scope.RandomFeed.good;
					 	// 	$scope['myfeed'+countt].content=$scope.RandomFeed.details;
					 		

					 	// 	$scope['myfeed'+countt].person_avatar=$scope.RandomFeed.user.avatar;
					 	// 	$scope['myfeed'+countt].business_name = $scope.RandomFeed.business.name;
					 	// 	$scope['myfeed'+countt].person_name =$scope.RandomFeed.user.first_name+" "+$scope.RandomFeed.user.last_name;
					 	// 	$scope['myfeed'+countt].business_id =$scope.RandomFeed.business.id;
					 	// 	$scope['myfeed'+countt].isLikedByUser =$scope.RandomFeed.isLikedByUser; 
					 	// 	//$scope.RandomFeed.isLikedByUser=0; 
					 	// 	$scope['myfeed'+countt].business_owner_id =$scope.RandomFeed.business.owner_id;
					 	// 	$scope['myfeed'+countt].date_created = $scope.RandomFeed.date_created;

					 	// 	if($scope.RandomFeed.isLikedByUser==0)
					 	// 	{
					 	// 		$scope['myfeed'+countt].likeToggleValue=0;

					 	// 	}else if($scope.RandomFeed.isLikedByUser==1)
					 	// 	{
					 	// 		$scope['myfeed'+countt].likeToggleValue=1;
					 	// 	}

					 	// 	        for(var i=0; i<$scope['myfeed'+countt].rate; i++)
							// 		{
							// 			$scope['myfeed'+countt].ratings[i]=i;
							// 		}
							// 		for(var j=0; j<$scope['myfeed'+countt].price; j++)
							// 		{
							// 			$scope['myfeed'+countt].pricings[j]=j;
							// 		}

							// 		for(var k=0; k<(5-$scope['myfeed'+countt].rate); k++)
							// 		{
							// 			$scope['myfeed'+countt].noratings[k]=k;
							// 		}

							// 		for(var l=0; l<(5-$scope['myfeed'+countt].price); l++)
							// 		{
							// 			$scope['myfeed'+countt].nopricings[l]=l;
							// 		}

							// 		$scope['myfeed'+countt].content =$scope.RandomFeed.details;

					 	// 	//////console.log("the feed is",$scope.RandomFeed);

					 	// 	var myelement = angular.element(document.getElementById('business_page_3_posters'));
					 	// 	//////console.log("my element is",myelement);

					 	// 	    $scope.myFeedComments =[];

							// 	angular.forEach($scope.myFeedComments,function(value,key)
							// 	{
							// 		$scope.thiscomment=value;
							// 		if($scope.thiscomment.isLikedByUser==0)
							// 		{

							// 		}else if($scope.thiscomment.isLikedByUser==1)
							// 		{

							// 		}
							// 		this.push($scope.thiscomment);

							// 	},$scope.myFeedComments);
							// $scope['myfeed'+countt].myfeedComments=$scope.myFeedComments;

							// $scope.returned_feeds.push($scope['myfeed'+countt]);
							// ////////alert("kabiriiti");
					 	// 		myelement.prepend
					  //     		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/photo_feed.html").then(function(html){
							//       //html = html.replace("myfeed","myfeed"+countt);
							//       html =html.replace(/myfeed/g , "myfeed"+countt);
							//       //////////////////alert(html);
							//       var template = angular.element(html);
							//       myelement.prepend(template);
							//       $compile(template)($scope);
							//       //scope.countt = scope.countt+1;
					  // 			 })
				   //    		 	);

					  //      $scope.countt = $scope.countt + 1;
			  		 	
					

		// });

		// $.get(config.BaseURL+"classes/util.php?uploader_id="+uploader_id+"&business_id="+business_id,function(results){

		// 			//////////////////alert(results);	  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		// });

	}

  
  $scope.max = 5;
  $scope.isReadonly = false;

  $scope.clicked = function(value) {

 	 //////////////////alert($scope.overStar);
  };
  $scope.hoveringOver = function(value) {
 	 $scope.overStar = value;
 	 $scope.percent = 100 * (value / $scope.max);
  };
  $scope.hoveringOverPrice = function(value) {
 	 $scope.overPrice = value;
 	 $scope.percent = 100 * (value / $scope.max);
  };

  $scope.ratingStates = [
 	 {stateOn: 'ion-social-usd', stateOff: 'ion-social-usd-outline'},
 	 {stateOn: 'glyphicon-star', stateOff: 'glyphicon-star-empty'},
 	 {stateOn: 'glyphicon-heart', stateOff: 'glyphicon-ban-circle'},
 	 {stateOn: 'glyphicon-heart'},
 	 {stateOff: 'glyphicon-off'}
  ];

  


$scope.rateBusiness=function(businessid,user_id,callback)
{

	 setTimeout(function() {

	 	pricing=$scope.price;
	 	rating =$scope.rate;
        var business_id =businessid;
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=0;
			pricing=0;
		}
	////////alert("buddy am rating");
		////////////////////alert("bu "+businessid);
		////////////////////alert("user  "+user_id);
		////////////////////alert("rate "+rating);
		////////////////////alert("pri "+pricing);
	  
	        ////////////////////alert(val);
	    $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&good="+rating+"&cost="+pricing+"&business_id="+business_id+"&transaction=business_rating",function(results){
				 
						//$("#business_page_3_posters").prepend(results);
						////////alert(results);
						callback(results);
						// $scope.postReview(business_id,user_id,rating,pricing,$scope.date_created,"rate",function(results)
						// {

							
						// });

				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});
	 

    },3000);

		
	   
}
$scope.RateBusinessIsCalled = false;
$scope.countt=1;
$scope.setRate = function(rate,businessid,user_id)
{
	$scope.rate =rate;
	if($scope.RateBusinessIsCalled==false){
	  $scope.RateBusinessIsCalled = true;
	  
			 	
			  $scope.rateBusiness(businessid,user_id,function(data)
			  {

			  		var countt=$scope.countt;
			  		$scope.RandomFeed=JSON.parse(data);

			  		$scope['myfeed'+countt] = new ReviewModel();

					 		$scope['myfeed'+countt].id =$scope.RandomFeed.id;
					 		$scope['myfeed'+countt].price = $scope.RandomFeed.cost;
					 		$scope['myfeed'+countt].rate = $scope.RandomFeed.good;
					 		

					 		$scope['myfeed'+countt].person_avatar=$scope.RandomFeed.user.avatar;
					 		$scope['myfeed'+countt].business_name = $scope.RandomFeed.business.name;
					 		$scope['myfeed'+countt].person_name =$scope.RandomFeed.user.first_name+" "+$scope.RandomFeed.user.last_name;
					 		$scope['myfeed'+countt].business_id =$scope.RandomFeed.business.id;
					 		$scope['myfeed'+countt].isLikedByUser =$scope.RandomFeed.isLikedByUser; 
					 		//$scope.RandomFeed.isLikedByUser=0; 
					 		$scope['myfeed'+countt].business_owner_id =$scope.RandomFeed.business.owner_id;
					 		$scope['myfeed'+countt].date_created = $scope.RandomFeed.date_created;

					 		if($scope.RandomFeed.isLikedByUser==0)
					 		{
					 			$scope['myfeed'+countt].likeToggleValue=0;

					 		}else if($scope.RandomFeed.isLikedByUser==1)
					 		{
					 			$scope['myfeed'+countt].likeToggleValue=1;
					 		}

					 		        for(var i=0; i<$scope['myfeed'+countt].rate; i++)
									{
										$scope['myfeed'+countt].ratings[i]=i;
									}
									for(var j=0; j<$scope['myfeed'+countt].price; j++)
									{
										$scope['myfeed'+countt].pricings[j]=j;
									}

									for(var k=0; k<(5-$scope['myfeed'+countt].rate); k++)
									{
										$scope['myfeed'+countt].noratings[k]=k;
									}

									for(var l=0; l<(5-$scope['myfeed'+countt].price); l++)
									{
										$scope['myfeed'+countt].nopricings[l]=l;
									}

									$scope['myfeed'+countt].content =$scope.RandomFeed.details;

					 		//////console.log("the feed is",$scope.RandomFeed);

					 		var myelement = angular.element(document.getElementById('business_page_3_posters'));
					 		//////console.log("my element is",myelement);

					 		    $scope.myFeedComments =[];

								angular.forEach($scope.myFeedComments,function(value,key)
								{
									$scope.thiscomment=value;
									if($scope.thiscomment.isLikedByUser==0)
									{

									}else if($scope.thiscomment.isLikedByUser==1)
									{

									}
									this.push($scope.thiscomment);

								},$scope.myFeedComments);
							$scope['myfeed'+countt].myfeedComments=$scope.myFeedComments;

							$scope.returned_feeds.push($scope['myfeed'+countt]);
							////////alert("kabiriiti");
					 			myelement.prepend
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/rate_feed.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/myfeed/g , "myfeed"+countt);
							      //////////////////alert(html);
							      var template = angular.element(html);
							      myelement.prepend(template);
							      $compile(template)($scope);
							      //scope.countt = scope.countt+1;
					  			 })
				      		 	);

					       $scope.countt = $scope.countt + 1;
			  		 	
					
			});



	  
	  
    }

}
$scope.setPrice=function(price,businessid,user_id)
{
	$scope.price = price;
	//////////////////alert("this is the price"+$scope.price);
	//$scope.rateBusiness(businessid,user_id);
	if($scope.RateBusinessIsCalled==false){
	  $scope.RateBusinessIsCalled = true;
	  $scope.rateBusiness(businessid,user_id,function(data)
	  {	

	  		var countt=$scope.countt;
			  		$scope.RandomFeed=JSON.parse(data);

			  		$scope['myfeed'+countt] = new ReviewModel();

					 		$scope['myfeed'+countt].id =$scope.RandomFeed.id;
					 		$scope['myfeed'+countt].price = $scope.RandomFeed.cost;
					 		$scope['myfeed'+countt].rate = $scope.RandomFeed.good;
					 		

					 		$scope['myfeed'+countt].person_avatar=$scope.RandomFeed.user.avatar;
					 		$scope['myfeed'+countt].business_name = $scope.RandomFeed.business.name;
					 		$scope['myfeed'+countt].person_name =$scope.RandomFeed.user.first_name+" "+$scope.RandomFeed.user.last_name;
					 		$scope['myfeed'+countt].business_id =$scope.RandomFeed.business.id;
					 		$scope['myfeed'+countt].isLikedByUser =$scope.RandomFeed.isLikedByUser; 
					 		//$scope.RandomFeed.isLikedByUser=0; 
					 		$scope['myfeed'+countt].business_owner_id =$scope.RandomFeed.business.owner_id;
					 		$scope['myfeed'+countt].date_created = $scope.RandomFeed.date_created;

					 		if($scope.RandomFeed.isLikedByUser==0)
					 		{
					 			$scope['myfeed'+countt].likeToggleValue=0;

					 		}else if($scope.RandomFeed.isLikedByUser==1)
					 		{
					 			$scope['myfeed'+countt].likeToggleValue=1;
					 		}

					 		        for(var i=0; i<$scope['myfeed'+countt].rate; i++)
									{
										$scope['myfeed'+countt].ratings[i]=i;
									}
									for(var j=0; j<$scope['myfeed'+countt].price; j++)
									{
										$scope['myfeed'+countt].pricings[j]=j;
									}

									for(var k=0; k<(5-$scope['myfeed'+countt].rate); k++)
									{
										$scope['myfeed'+countt].noratings[k]=k;
									}

									for(var l=0; l<(5-$scope['myfeed'+countt].price); l++)
									{
										$scope['myfeed'+countt].nopricings[l]=l;
									}

									$scope['myfeed'+countt].content =$scope.RandomFeed.details;

					 		//////console.log("the feed is",$scope.RandomFeed);

					 		var myelement = angular.element(document.getElementById('business_page_3_posters'));
					 		//////console.log("my element is",myelement);

					 		    $scope.myFeedComments =[];

								angular.forEach($scope.myFeedComments,function(value,key)
								{
									$scope.thiscomment=value;
									if($scope.thiscomment.isLikedByUser==0)
									{

									}else if($scope.thiscomment.isLikedByUser==1)
									{

									}
									this.push($scope.thiscomment);

								},$scope.myFeedComments);
							$scope['myfeed'+countt].myfeedComments=$scope.myFeedComments;

							$scope.returned_feeds.push($scope['myfeed'+countt]);
							////////alert("kabiriiti");
					 			myelement.prepend
					      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/rate_feed.html").then(function(html){
							      //html = html.replace("myfeed","myfeed"+countt);
							      html =html.replace(/myfeed/g , "myfeed"+countt);
							      //////////////////alert(html);
							      var template = angular.element(html);
							      myelement.prepend(template);
							      $compile(template)($scope);
							      //scope.countt = scope.countt+1;
					  			 })
				      		 	);

					       $scope.countt = $scope.countt + 1;
			  		 	
					




	  });
	  
    }
	
}




}])
.controller('FreeSearchCtrl', ['$scope','$rootScope','GetData','config','sharedProperties','CountryViewModel', function($scope,$rootScope,GetData,config,sharedProperties,CountryViewModel){
	 var searchvalue = window.localStorage.getItem("freeSearchWord");
	 
	 var user_id = 0;
	 $scope.BaseURL=config.BaseURL;
	 $scope.BaseImageURL = config.BaseImageURL;

	 //console.log("searchvalue",searchvalue);
	 //document.getElementById("all_radio").checked = true;
	 //$scope.resToggle=0;
	 
	 
	 ////////console.log("This is search Controller ");
			
	 ////////////console.log("hmm",document.getElementById("searchinput").value);

	   $scope.user_id=user_id;
	////////////console.log("useerrrrrsinesseseeeeeeeeeeeeeee are cmon =>",user_id);
		$scope.businesses=[];
		$scope.people =[];
		$scope.all=true;
		$scope.persons=false;
		$scope.buzinesses=false;
		$scope.my_country_id=0;

		GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
				
		{

					$.get("http://ipinfo.io" , function(response) {

				        //console.log("the ip object",response);
				        $scope.picked_country_code = response.country

				        $scope.countryModels =[];
			
					    ////alert("the contries are back");
						$scope.countries =data;
						//console.log("the contriesjj are back",$scope.countries);
						angular.forEach($scope.countries, function(value,key)
						{
							$scope.currentCountry =value;
							$scope.countryModel = new CountryViewModel();
							$scope.countryModel.id = $scope.currentCountry['id'];
							$scope.countryModel.name = $scope.currentCountry['name'];
							$scope.countryModel.country_code= $scope.currentCountry['code'];
							if($scope.picked_country_code== $scope.countryModel.country_code)
							{
								$scope.country_id = $scope.countryModel.id;
							}

							this.push($scope.countryModel);
						},$scope.countryModels);


			        },"jsonp");
			
					

		});

		$scope.loginPrompt = function () {
		$scope.dataObj =
		{
			'item_type':item_type,
			

		}
	        ngDialog.open({ 

	        	template: config.BaseURL+'dialogs/logindialog.php',
	        	controller: 'FreeSearchCtrl',
	         	className: 'ngdialog-theme-default' ,
	         	
	         });
        };


		
		//$scope.businesses=sharedProperties.getProperty();
		
		$scope.setAllFilters=function()
		{
			if($scope.businesses.length|| $scope.people.length )
			{
				$scope.all =true;
				$scope.defaults=0;
			}else
			{
				$scope.all =false;
				$scope.defaults=1;
			}
			
		}
		$scope.setPeopleFilters=function()
		{
			if($scope.people.length)
			{
				$scope.all =false;
				$scope.persons=true;
				$scope.buzinesses=false;
				$scope.defaults=0;

			}else
			{
				$scope.all =false;
				$scope.buzinesses=false;
				$scope.defaults=1;
			}
			

		}
		$scope.setBusinessFilters=function()
		{
			if($scope.businesses.length)
			{
				$scope.all =false;
				$scope.buzinesses=true;
				$scope.persons=false;
				$scope.defaults=0;

			}else
			{	$scope.all =false;
				$scope.persons=false;
				$scope.defaults=1;
			}
			
		}
		$scope.loaderToggle=1;
		
		$scope.myfilter="tigidi";
		$scope.search_resultsFunction = function(filter,country_id=0)
		{
			
			   ////alert("tigidi tigidi "+country_id);
			//getting countries
			   $scope.myfilter = filter;
			   country_id = $scope.country_id;
			
			
			//$scope.busi_es = 
			////////console.log("sharedProperty hahahaah is",sharedProperties.getProperty());
			$scope.defaults=0;
			
			 GetData.getData(config.BaseURL+"classes/util.php?search="+searchvalue+"&searcher_id="+user_id+"&filter="+filter+"&country_id="+country_id,function(data)
			 {	
			 	window.localStorage.removeItem('freeSearchWord');
					$scope.businesses=[];
					//console.log("the search results is==>",data);
					$scope.search_results=data;

				//	document.getElementById("all_radio").checked = true;
					angular.forEach($scope.search_results.businesses,function(value,key)
						{
							$scope.business = value;
							$scope.business['id']=$scope.business['id'];
							$scope.business['ratings']=[];
							$scope.business['pricings']=[];
							$scope.business['no_pricings']=[];
							$scope.business['no_ratings']=[];

							for(var i=0;i<$scope.business.cost;i++)
				 			{	
				 				$scope.business['pricings'][i]=i;
				 				////////console.log("addes to price");
				 			}
				 			for(var j=0;j<5-$scope.business.cost;j++)
				 			{	
				 				$scope.business['no_pricings'].push(j);
				 				////////console.log("addes to nonprice");
				 			}

				 			for(var k=0;k<$scope.business.good;k++)
				 			{	
				 				$scope.business['ratings'].push(k);
				 				////////console.log("added to rate");
				 			}
				 			for(var l=0;l<5-$scope.business.good;l++)
				 			{	
				 				$scope.business['no_ratings'].push(l);
				 				////////console.log("added to norate");
				 			}

							if($scope.business.logo == '' || $scope.business.logo==null)
							{
								$scope.business.logo=config.BaseImageURL+"uploads/defbanner.png"
								$scope.business['mybuddy']="mike";
							}else
							{
								$scope.business.logo=config.BaseImageURL+$scope.business.logo;
								$scope.business['mybuddy']="mike";
							}
									this.push($scope.business);

						},$scope.businesses);

					

					if($scope.businesses.length == 0)
					{
						$scope.defaults=1;
						
						$scope.loaderToggle=0;
					}else
					{
						$scope.loaderToggle=0;
					}
					
					

					//return data;
			});

			


			
		};
		$scope.search_subCategory_businesses= function()
		{
			//////////////////alert("tigidi tigidi subcategory");
			//$scope.busi_es = sharedProperties.getProperty();
			$scope.busi_es=JSON.parse(window.localStorage.getItem("biz"));
			//window.localStorage.removeItem("biz");
			console.log("sharedProperty hahahaah is",$scope.busi_es);

			angular.forEach($scope.busi_es,function(value,key)
			{
							

							$scope.business = value;
							$scope.business['ratings']=[];
							$scope.business['pricings']=[];
							$scope.business['no_pricings']=[];
							$scope.business['no_ratings']=[];

							for(var i=0;i<$scope.business.cost;i++)
				 			{	
				 				$scope.business['pricings'][i]=i;
				 				////////console.log("addes to price");
				 			}
				 			for(var j=0;j<5-$scope.business.cost;j++)
				 			{	
				 				$scope.business['no_pricings'].push(j);
				 				////////console.log("addes to nonprice");
				 			}

				 			for(var k=0;k<$scope.business.good;k++)
				 			{	
				 				$scope.business['ratings'].push(k);
				 				////////console.log("added to rate");
				 			}
				 			for(var l=0;l<5-$scope.business.good;l++)
				 			{	
				 				$scope.business['no_ratings'].push(l);
				 				////////console.log("added to norate");
				 			}


							if($scope.business.logo == '' || $scope.business.logo==null)
							{
								$scope.business.logo=config.BaseImageURL+"uploads/defbanner.png"
							}else
							{
								$scope.business.logo=config.BaseImageURL+$scope.business.logo;
							}
							this.push($scope.business);

			},$scope.businesses);
			//return $scope.businesses;
			////////console.log("when we consol the bus ==>",$scope.businesses);

		};

		console.log("The search value is =>" + searchvalue);
		
		if(!searchvalue)
		{
			$scope.search_subCategory_businesses();
			////////console.log("The local storage has the following data==>"+window.localStorage.getItem("biz"));

		}else
		{
			//window.localStorage.removeItem("biz");
			////////console.log("The local storage has the following data==>"+window.localStorage.getItem("biz"));
			$scope.search_resultsFunction("all");

		}
		

		
	    

	

	$scope.followItem = function(item_type,user_id,item_id,isfollowed)
 	{
 		if(item_type=='person'){
 				angular.forEach($scope.people,function(value,key)
 				{
 					var currentperson = value;
 					if(currentperson.id == item_id )
 					{
 						currentperson.isfollowed='true';

 						$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});
 		}else if(item_type=='business')
 		{

 			angular.forEach($scope.businesses,function(value,key)
 				{
 					var currentbusiness = value;
 					if(currentbusiness.id == item_id )
 					{
 						currentbusiness.isfollowed='true';
 						////////////////alert(currentbusiness.mybuddy);
 						$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});

 		}		



 	}

	$scope.unfollowItem = function(item_type,user_id,item_id,isfollowed)
	{
		

			if(item_type=='person'){
 				angular.forEach($scope.people,function(value,key)
 				{
 					var currentperson = value;
 					if(currentperson.id == item_id )
 					{
 						currentperson.isfollowed='false';
 						$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});
 		}else if(item_type=='business')
 		{

 			angular.forEach($scope.businesses,function(value,key)
 				{
 					var currentbusiness = value;
 					if(currentbusiness.id == item_id )
 					{
 						currentbusiness.isfollowed='false';
 						$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});

 		}		




	}


}])
.controller('SearchCtrl', ['$scope','$rootScope','GetData','config','sharedProperties','CountryViewModel', function($scope,$rootScope,GetData,config,sharedProperties,CountryViewModel){
	 var searchvalue = window.localStorage.getItem("searchWord");
	 
	 var user_id =document.getElementById("idinput").value;
	 $scope.BaseURL=config.BaseURL;
	 $scope.BaseImageURL = config.BaseImageURL;
	 //document.getElementById("all_radio").checked = true;
	 //$scope.resToggle=0;
	 
	 ////////console.log("This is search Controller ");
			
	 ////////////console.log("hmm",document.getElementById("searchinput").value);

	   $scope.user_id=user_id;
	////////////console.log("useerrrrrsinesseseeeeeeeeeeeeeee are cmon =>",user_id);
		$scope.businesses=[];
		$scope.people =[];
		$scope.all=true;
		$scope.persons=false;
		$scope.buzinesses=false;
		$scope.my_country_id=0;

		GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
				
		{
					$scope.countryModels =[];
			
					////alert("the contries are back");
					$scope.countries =data;
					//console.log("the contriesjj are back",$scope.countries);
					angular.forEach($scope.countries, function(value,key)
					{
						$scope.currentCountry =value;
						$scope.countryModel = new CountryViewModel();
						$scope.countryModel.id = $scope.currentCountry['id'];
						$scope.countryModel.name = $scope.currentCountry['name'];
						$scope.countryModel.country_code= $scope.currentCountry['code'];


						this.push($scope.countryModel);
					},$scope.countryModels);


		});


		
		//$scope.businesses=sharedProperties.getProperty();
		
		$scope.setAllFilters=function()
		{
			if($scope.businesses.length|| $scope.people.length )
			{
				$scope.all =true;
				$scope.defaults=0;
			}else
			{
				$scope.all =false;
				$scope.defaults=1;
			}
			
		}
		$scope.setPeopleFilters=function()
		{
			if($scope.people.length)
			{
				$scope.all =false;
				$scope.persons=true;
				$scope.buzinesses=false;
				$scope.defaults=0;

			}else
			{
				$scope.all =false;
				$scope.buzinesses=false;
				$scope.defaults=1;
			}
			

		}
		$scope.setBusinessFilters=function()
		{
			if($scope.businesses.length)
			{
				$scope.all =false;
				$scope.buzinesses=true;
				$scope.persons=false;
				$scope.defaults=0;

			}else
			{	$scope.all =false;
				$scope.persons=false;
				$scope.defaults=1;
			}
			
		}
		$scope.loaderToggle=1;
		
		$scope.myfilter="tigidi";
		$scope.search_resultsFunction = function(filter,country_id=0)
		{
			
			   ////alert("tigidi tigidi "+country_id);
			//getting countries
			   $scope.myfilter = filter;
			
				//////////////console.log("my countries men of id are manaamm",$scope.cityModels);
				GetData.getData(config.BaseURL+'classes/util.php?countries=all',function(data)
				
				{
					$scope.countryModels =[];
			
					////alert("the contries are back");
					$scope.countries =data;
					//console.log("the contriesjj are back",$scope.countries);
					angular.forEach($scope.countries, function(value,key)
					{
						$scope.currentCountry =value;
						$scope.countryModel = new CountryViewModel();
						$scope.countryModel.id = $scope.currentCountry['id'];
						$scope.countryModel.name = $scope.currentCountry['name'];
						$scope.countryModel.country_code= $scope.currentCountry['code'];


						this.push($scope.countryModel);
					},$scope.countryModels);


				});
			//$scope.busi_es = 
			////////console.log("sharedProperty hahahaah is",sharedProperties.getProperty());
			$scope.defaults=0;
			
			 GetData.getData(config.BaseURL+"classes/util.php?search="+searchvalue+"&searcher_id="+user_id+"&filter="+filter+"&country_id="+country_id,function(data)
			 {	
			 	window.localStorage.removeItem('searchWord');
			 	//window.localStorage.removeItem("searchWord");
					$scope.businesses=[];
					//console.log("the search results is==>",data);
					$scope.search_results=data;

				//	document.getElementById("all_radio").checked = true;
					angular.forEach($scope.search_results.businesses,function(value,key)
						{
							$scope.business = value;
							$scope.business['id']=$scope.business['id'];
							$scope.business['ratings']=[];
							$scope.business['pricings']=[];
							$scope.business['no_pricings']=[];
							$scope.business['no_ratings']=[];

							for(var i=0;i<$scope.business.cost;i++)
				 			{	
				 				$scope.business['pricings'][i]=i;
				 				////////console.log("addes to price");
				 			}
				 			for(var j=0;j<5-$scope.business.cost;j++)
				 			{	
				 				$scope.business['no_pricings'].push(j);
				 				////////console.log("addes to nonprice");
				 			}

				 			for(var k=0;k<$scope.business.good;k++)
				 			{	
				 				$scope.business['ratings'].push(k);
				 				////////console.log("added to rate");
				 			}
				 			for(var l=0;l<5-$scope.business.good;l++)
				 			{	
				 				$scope.business['no_ratings'].push(l);
				 				////////console.log("added to norate");
				 			}

							if($scope.business.logo == '' || $scope.business.logo==null)
							{
								$scope.business.logo=config.BaseImageURL+"uploads/defbanner.png"
								$scope.business['mybuddy']="mike";
							}else
							{
								$scope.business.logo=config.BaseImageURL+$scope.business.logo;
								$scope.business['mybuddy']="mike";
							}
									this.push($scope.business);

						},$scope.businesses);

					angular.forEach($scope.search_results.people,function(value,key)
						{
							$scope.person = value;

							if($scope.person.avatar == '' || $scope.person.avatar==null)
							{
								$scope.person.avatar=config.BaseImageURL+"uploads/defavatar.png"
							}else if($scope.person.avatar.startsWith('http'))
							{
								$scope.person.avatar=$scope.person.avatar;
							}else
							{
								$scope.person.avatar=config.BaseImageURL+$scope.person.avatar;
							}
							this.push($scope.person);

						},$scope.people);

					if($scope.businesses.length==0 && $scope.people.length==0)
					{
						$scope.defaults=1;
						////////////////alert("kabadi");
						$scope.loaderToggle=0;
					}else
					{
						$scope.loaderToggle=0;
					}
					
					

					//return data;
			});

			


			
		};
		$scope.search_subCategory_businesses= function()
		{
			//////////////////alert("tigidi tigidi subcategory");
			//$scope.busi_es = sharedProperties.getProperty();
			$scope.busi_es=JSON.parse(window.localStorage.getItem("biz"));
			//window.localStorage.removeItem("biz");
			////////console.log("sharedProperty hahahaah is",$scope.busi_es);

			angular.forEach($scope.busi_es,function(value,key)
			{
							

							$scope.business = value;
							$scope.business['ratings']=[];
							$scope.business['pricings']=[];
							$scope.business['no_pricings']=[];
							$scope.business['no_ratings']=[];

							for(var i=0;i<$scope.business.cost;i++)
				 			{	
				 				$scope.business['pricings'][i]=i;
				 				////////console.log("addes to price");
				 			}
				 			for(var j=0;j<5-$scope.business.cost;j++)
				 			{	
				 				$scope.business['no_pricings'].push(j);
				 				////////console.log("addes to nonprice");
				 			}

				 			for(var k=0;k<$scope.business.good;k++)
				 			{	
				 				$scope.business['ratings'].push(k);
				 				////////console.log("added to rate");
				 			}
				 			for(var l=0;l<5-$scope.business.good;l++)
				 			{	
				 				$scope.business['no_ratings'].push(l);
				 				////////console.log("added to norate");
				 			}


							if($scope.business.logo == '' || $scope.business.logo==null)
							{
								$scope.business.logo=config.BaseImageURL+"uploads/defbanner.png"
							}else
							{
								$scope.business.logo=config.BaseImageURL+$scope.business.logo;
							}
							this.push($scope.business);

			},$scope.businesses);
			//return $scope.businesses;
			////////console.log("when we consol the bus ==>",$scope.businesses);

		};
		
		if(!searchvalue)
		{
			$scope.search_subCategory_businesses();
			////////console.log("The local storage has the following data==>"+window.localStorage.getItem("biz"));

		}else
		{
			//window.localStorage.removeItem("biz");
			////////console.log("The local storage has the following data==>"+window.localStorage.getItem("biz"));
			$scope.search_resultsFunction("all");

		}
		

		
	    

	

	$scope.followItem = function(item_type,user_id,item_id,isfollowed)
 	{
 		if(item_type=='person'){
 				angular.forEach($scope.people,function(value,key)
 				{
 					var currentperson = value;
 					if(currentperson.id == item_id )
 					{
 						currentperson.isfollowed='true';

 						$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});
 		}else if(item_type=='business')
 		{

 			angular.forEach($scope.businesses,function(value,key)
 				{
 					var currentbusiness = value;
 					if(currentbusiness.id == item_id )
 					{
 						currentbusiness.isfollowed='true';
 						////////////////alert(currentbusiness.mybuddy);
 						$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});

 		}		



 	}

	$scope.unfollowItem = function(item_type,user_id,item_id,isfollowed)
	{
		

			if(item_type=='person'){
 				angular.forEach($scope.people,function(value,key)
 				{
 					var currentperson = value;
 					if(currentperson.id == item_id )
 					{
 						currentperson.isfollowed='false';
 						$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});
 		}else if(item_type=='business')
 		{

 			angular.forEach($scope.businesses,function(value,key)
 				{
 					var currentbusiness = value;
 					if(currentbusiness.id == item_id )
 					{
 						currentbusiness.isfollowed='false';
 						$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

							//////////////////alert(results);
						});
 					}

 				});

 		}		




	}
	






}])
.controller('RatingDemoCtrl', function ($scope) {
   $scope.rate = 0;
   $scope.price =0;
   $scope.max = 5;
   $scope.isReadonly = false;

   $scope.hoveringOver = function(value) {
     $scope.overStar = value;
     $scope.percent = 100 * (value / $scope.max);
   };
	 $scope.hoveringOverPrice = function(value) {
     $scope.overPrice = value;
     $scope.percent = 100 * (value / $scope.max);
   };

   $scope.ratingStates = [
     {stateOn: 'ion-social-usd', stateOff: 'ion-social-usd-outline'},
     {stateOn: 'glyphicon-star', stateOff: 'glyphicon-star-empty'},
     {stateOn: 'glyphicon-heart', stateOff: 'glyphicon-ban-circle'},
     {stateOn: 'glyphicon-heart'},
     {stateOff: 'glyphicon-off'}
   ];
 })
 .controller('LikeCtrl',function($scope)
 {
 	$scope.like =0;

 	$scope.likeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		$scope.like =1;
 		$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        		//////////////////alert(data);
    	});

 	}
 	$scope.unlikeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		$scope.like =0;
 		$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        		//////////////////alert(data);
    	});

 	}

 	

 })
 .controller('UserWallFeedsCtrl',['$scope','$window','GetData','newsfeedViewModel','config','ngDialog','CommentViewModel','$timeout',function ($scope,$window,GetData,newsfeedViewModel,config,ngDialog,CommentViewModel,$timeout) {
   
   $scope.UserMyWallFeeds=[];
   $scope.comcountt=1;
    $scope.toggleLoad = 0;
   //about rates andpricsa
   $scope.ratings=[];
   $scope.pricings=[];
   $scope.noratings =[];
   $scope.nopricings=[];
   $scope.inner_ratings=[];
   $scope.inner_pricings=[];
   $scope.inner_noratings =[];
   $scope.inner_nopricings=[];
   $scope.BaseImageURL = config.BaseImageURL;
   $scope.BaseURL = config.BaseURL;
   $scope.loadedFeeds=[];
   $scope.RandomComments=[];

    //about rates andpricsa

    angular.element($window).bind("scroll", function() {
		    var windowHeight = "innerHeight" in window ? window.innerHeight : document.documentElement.offsetHeight;
		    var body = document.body, html = document.documentElement;
		    var docHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight,  html.scrollHeight, html.offsetHeight);
		    windowBottom = windowHeight + window.pageYOffset;
		    if (windowBottom >= docHeight) {
		        ////////////////alert('bottom reached');
		        $scope.toggleLoad = 1;
		    }else
		    {

		    	$scope.toggleLoad = 0;
		    }
	});


  //angular.element(document).ready(function(){


 $scope.setTimee=function()
 {
		setInterval(function () {

				$scope.resetToggle();
		}, 1000);
 }

$scope.last_picked_review_id=0;
$scope.defaults=0;

angular.element(document).ready(function(){


// });
// $scope.$watch('[user_id,picker_type,picker_business_id]',function(){


	//////////console.log("The picker type beforwe is :===>",$scope.picker_type);
    ////////console.log("The user_id  beforde is :===>",$scope.user_id);
    //////////console.log("The picker_business_id  beforde is :===>",$scope.picker_business_id);
    ////////////////alert("The user_id  beforde is :===>"+ $scope.user_id);

if($scope.picker_type=='user_profile'){

	 if($scope.who=='me'){
	 	$scope.idValue =$scope.user_id;
	 }else if($scope.who=='him')
	 {
	 	$scope.idValue=$scope.reciever_id;
	 }

}else
{
	$scope.idValue =$scope.user_id;
}

   setInterval(function () {

   		//config.BaseURL+"classes/util.php?user_wall_feeds_picker_id="+$scope.idValue+"&picker_type="+$scope.picker_type+"&picker_business_id="+$scope.picker_business_id+"&last_picked_review_id="+$scope.last_picked_review_id
	  	GetData.getData(config.BaseURL+"classes/util.php?user_wall_feeds_picker_id="+$scope.idValue+"&picker_type="+$scope.picker_type+"&picker_business_id="+$scope.picker_business_id+"&last_picked_review_id="+$scope.last_picked_review_id,function(data)
	   	{
	   		//////////console.log("The picker type is :===>",$scope.picker_type);
	   		////console.log("The feeds daat is :===>",data);
	   		//////alert(data);
	   		$scope.UserWallFeeds= data;


	   		
	   			angular.forEach($scope.UserWallFeeds, function(value,key)
		   		{
		   			
		   			$scope.UserWallFeed = value;
		   			$scope.last_picked_review_id=$scope.UserWallFeed.id;
		   			//////////console.log("the feed kind -s ==>",$scope.UserWallFeed.kind);
		   			//about avatar
		   			if($scope.UserWallFeed.user.avatar == '' || $scope.UserWallFeed.user.avatar ==null)
					{
							$scope.UserWallFeed.user.avatar=config.BaseImageURL+"uploads/deflogo.png"
					}else if ($scope.UserWallFeed.user.avatar.startsWith('http'))
					{
						$scope.UserWallFeed.user.avatar=$scope.UserWallFeed.user.avatar;
						
					}else
					{
							
						$scope.UserWallFeed.user.avatar=config.BaseImageURL+$scope.UserWallFeed.user.avatar;
					}
			
					$scope.myFeedComments =[];

					angular.forEach($scope.UserWallFeed.comments,function(value,key)
					{
						$scope.thiscomment=value;

						if($scope.thiscomment.isLikedByUser==0)
						{

						}else if($scope.thiscomment.isLikedByUser==1)
						{

						}
						this.push($scope.thiscomment);

					},$scope.myFeedComments);


					//like number of newsfeed
					//$scope.nflikeNo=$scope.UserWallFeed.likes.length;
					$scope.finalFeedViewModel =new newsfeedViewModel();

					$scope.finalFeedViewModel.id=$scope.UserWallFeed.id;
					$scope.finalFeedViewModel.user_avatar=$scope.UserWallFeed.user.avatar;
					$scope.finalFeedViewModel.user_id =$scope.UserWallFeed.user.id;
					$scope.finalFeedViewModel.un_enc_user_id =$scope.UserWallFeed.user_id;
					$scope.finalFeedViewModel.un_enc_business_id =$scope.UserWallFeed.un_enc_business_id;
					////console.log("The user_id",$scope.UserWallFeed.user.id)
					$scope.finalFeedViewModel.user_name=$scope.UserWallFeed.user.first_name+" "+$scope.UserWallFeed.user.last_name;
					$scope.finalFeedViewModel.business_id=$scope.UserWallFeed.business.id;
					$scope.finalFeedViewModel.business_name=$scope.UserWallFeed.business.name;
					$scope.finalFeedViewModel.date_created=$scope.UserWallFeed.date_created;
					$scope.finalFeedViewModel.kind=$scope.UserWallFeed.kind;
					$scope.finalFeedViewModel.business_owner_id=$scope.UserWallFeed.business.owner_id;
					$scope.finalFeedViewModel.picker_type=$scope.UserWallFeed.picker_type;
					$scope.finalFeedViewModel.comment_count=$scope.UserWallFeed.comments.length;

					if($scope.UserWallFeed.kind=="new_friend")
					{
						$scope.finalFeedViewModel.friend=$scope.UserWallFeed.friend;
					}


					$scope.businessIsFolFav($scope.finalFeedViewModel.business_id,$scope.user_id,'is_followed',function(data)
					{
						$scope.finalFeedViewModel.business_followed_by_me=data;
					});

					$scope.businessIsFolFav($scope.finalFeedViewModel.business_id,$scope.user_id,'is_favourite',function(data)
					{
						$scope.finalFeedViewModel.business_followed_by_me=data;
					});

					$scope.finalFeedViewModel.business_address=$scope.UserWallFeed.business.address;
					if($scope.UserWallFeed.photo != null || $scope.UserWallFeed.photo !=undefined || $scope.UserWallFeed.photo !='')
					{
						$scope.finalFeedViewModel.photo=config.BaseImageURL+$scope.UserWallFeed.photo;	
						////////////console.log("The  actual photo is ",$scope.UserWallFeed.photo);
					}
					if($scope.UserWallFeed.business.banner != null || $scope.UserWallFeed.business.banner != undefined)
					{
						$scope.finalFeedViewModel.business_photo=config.BaseImageURL+$scope.UserWallFeed.business.banner;	
						////////////console.log("The  actual photo is ",$scope.UserWallFeed.photo);
					}else if ($scope.UserWallFeed.business.banner == null || $scope.UserWallFeed.business.banner == undefined || $scope.UserWallFeed.photo =='')
					{
						$scope.finalFeedViewModel.business_photo=config.BaseImageURL+'uploads/defbanner.png';
					}
					$scope.finalFeedViewModel.rate=$scope.UserWallFeed.good;
					$scope.finalFeedViewModel.price=$scope.UserWallFeed.cost;
					$scope.finalFeedViewModel.details=$scope.UserWallFeed.details;

					$scope.mycoms=$scope.myFeedComments.reverse();
					//var myarray = $scope.myFeedComments.reverse();
					////////console.log("unreversed comments",$scope.myFeedComments);
					////////console.log("reversed comments",$scope.mycoms);
					////////console.log("reversed comments times2",myarray);
					angular.forEach($scope.mycoms,function(value,key)
					{
						//////////console.log("my comment is==>",value);
						$scope.mycom =value;
						if($scope.mycom.user.avatar=="" || $scope.mycom.user.avatar==null)
						{
							$scope.mycom.user.avatar=BaseImageURL+"uploads/defavatar.png";

						}else if($scope.mycom.user.avatar.startsWith('http'))
						{
							$scope.mycom.user.avatar=$scope.mycom.user.avatar;

						}else
						{
							$scope.mycom.user.avatar=BaseImageURL+$scope.mycom.user.avatar;
						}
						this.push($scope.mycom);
					},$scope.finalFeedViewModel.comments);
					//$scope.finalFeedViewModel.comments=

					for(var i=0; i<$scope.UserWallFeed.good; i++)
					{
						$scope.finalFeedViewModel.ratings[i]=i;
					}
					for(var j=0; j<$scope.UserWallFeed.cost; j++)
					{
						$scope.finalFeedViewModel.pricings[j]=j;
					}

					for(var k=0; k<(5-$scope.UserWallFeed.good); k++)
					{
						$scope.finalFeedViewModel.noratings[k]=k;
					}

					for(var l=0; l<(5-$scope.UserWallFeed.cost); l++)
					{
						$scope.finalFeedViewModel.nopricings[l]=l;
					}

					
					
					$scope.finalFeedViewModel.likeNo=$scope.UserWallFeed.likes.length;
					$scope.finalFeedViewModel.business_followed_by_me=$scope.UserWallFeed.business.followedByUser;


					if($scope.UserWallFeed.likedByUser==0){


						$scope.finalFeedViewModel.likeToggleValue=0;


					}else
					{
						$scope.finalFeedViewModel.likeToggleValue=1;
					}
					if($scope.UserWallFeed.kind.startsWith('shared_'))
					{
						for(var p=0; p<$scope.UserWallFeed.inner_feed.good; p++)
						{
							$scope.finalFeedViewModel.inner_ratings[p]=p;
						}
						for(var q=0; q<$scope.UserWallFeed.inner_feed.cost; q++)
						{
							$scope.finalFeedViewModel.inner_pricings[q]=q;
						}

						for(var r=0; r<(5-$scope.UserWallFeed.inner_feed.good); r++)
						{
							$scope.finalFeedViewModel.inner_noratings[r]=r;
						}

						for(var s=0; s<(5-$scope.UserWallFeed.inner_feed.cost); s++)
						{
							$scope.finalFeedViewModel.inner_nopricings[s]=s;
						}

						
						$scope.finalFeedViewModel.inner_feed = $scope.UserWallFeed.inner_feed;
					}

					var fnd = false;
					for(var k=0;k<$scope.UserMyWallFeeds.length; k++){
						if(parseInt($scope.UserMyWallFeeds[k].id) == parseInt($scope.finalFeedViewModel.id) ){
							fnd = true;
							break;
						}
					}
					if(fnd == false){
						this.push($scope.finalFeedViewModel);	
					}
		   			



		   		},$scope.UserMyWallFeeds);

				


	   		

	   		if($scope.UserMyWallFeeds.length==0)
			{
			 		$scope.defaults = 1;
			}
	   		////////console.log("The udata is :===>",data);
	   		

			
	   		


	    });
	 	


	}, 3000);



});

$scope.setCommentCount=function(feed_id,comment_count)
{
	angular.forEach($scope.UserMyWallFeeds,function(value,key)
	{
		$scope.cfeed=value;
		if($scope.cfeed.id==feed_id)
		{
			$scope.cfeed.comment_count=comment_count;
		}

	});



}
$scope.businessIsFolFav=function(business_id,follower_id,transaction,callback)
{
	$.get(BaseURL+"classes/util.php?business_id="+business_id+"&follower_id="+follower_id+"&transaction="+transaction,function(data){
        	////////////////////alert(data);
        	callback(data);
   	});

}

	

	$scope.shareItem = function (item_type,item_id) {
		$scope.dataObj =
		{
			'item_type':item_type,
			'item_id':item_id,
			'user_id':$scope.user_id,
			'picker_type': $scope.picker_type

		}
        ngDialog.open({ 

        	template: config.BaseURL+'dialogs/share_dialog.php',
        	controller: 'UserWallFeedsCtrl',
         	className: 'ngdialog-theme-default' ,
         	data: $scope.dataObj
         });
    };
    $scope.shareAll=function(user_id,item_id,item_type)
    {
    	
    	$.get(BaseURL+"classes/util.php?friendsnfollowers=all&buddy_id="+user_id+"&item_id="+item_id+"&item_type="+item_type,function(data){
        	//////////////////alert(data);
   		});

    }

   $scope.postComment=function(user_id,feed_id,details,date_created,type,callback)
	{
		////////////////////alert("gone");
		//var details = document.getElementById("content"+feed_id).value;
		var kind ="normal";
		var commentTo = 0;

		if (details != "") {
	        ////////////////////alert(val);
	        $.get(BaseURL+"classes/util.php?comment_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&feed_id="+feed_id+"&commentTo="+commentTo+"&details="+details,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  callback(results);
		    });
	    }
	    

	}



 	$scope.likeItem=function(user_id,comment_id,newsfeed_id)
 	{

 		//$scope.like =1;
 		
    	angular.forEach($scope.UserMyWallFeeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////////////alert("am liking this feed");
 				//currentfeed.likeToggleValue=1;
 				angular.forEach(currentfeed.comments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=1;
 						$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 			}

 		});

 	}

 	$scope.likeNewComment=function(user_id,comment_id,newsfeed_id)
 	{	
 				//////////alert("am liking this comment");
 				//////console.log("The random comments are",$scope.RandomComments);
 				angular.forEach($scope.RandomComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=1;
 						$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 			

 	}
 	$scope.unlikeNewComment=function(user_id,comment_id,newsfeed_id)
 	{
 		
 				angular.forEach($scope.RandomComments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=0;
 						$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					//////////////////alert(data);
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 	
 	}

 	$scope.unlikeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		//$scope.like =0;
 		

    	angular.forEach($scope.UserMyWallFeeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////////////alert("am liking this feed");
 				//currentfeed.likeToggleValue=1;
 				angular.forEach(currentfeed.comments,function(value,key)
 				{
 					var currentcomment = value;
 					if(currentcomment.id==comment_id)
 					{
 						currentcomment.isLikedByUser=0;
 						$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        					//////////////////alert(data);
        					currentcomment.like_number=parseInt(data);
        					$scope.$digest();
    					});


 					}
 				});
 				
 			}

 		});

 	}

 	$scope.likeNFItem=function(user_id,newsfeed_id)
 	{
 		angular.forEach($scope.UserMyWallFeeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////////////alert("am liking this feed");
 				currentfeed.likeToggleValue=1;
 				$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        			////////////////////alert(data);
        			var datafig = data;
        			currentfeed.likeNo=parseInt(datafig);
        			$scope.$digest();
        			////////////////////alert(currentfeed.likeNo);
    			});
 			}

 		});
 		

 	}
 	$scope.unlikeNFItem=function(user_id,newsfeed_id)
 	{
 		

    	angular.forEach($scope.UserMyWallFeeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////////////////////alert("this is the feed");
 				currentfeed.likeToggleValue=0;
 				$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        				////////////////////alert(data);
        			
        			currentfeed.likeNo=parseInt(data);
        			$scope.$digest();
        			////////////////////alert(currentfeed.likeNo);
    			});
 			}

 		});

 	}

 	$scope.followItem = function(item_type,user_id,item_id,newsfeed_id)
 	{
 		//first check if you already followed item.
 		//////////////////alert('loloofo');
 		////////////console.log('the user_id is',$scope.user_id,user_id)
 		if(item_type=='business'){

	 				angular.forEach($scope.UserMyWallFeeds,function(value,key)
			 		{

			 			var currentfeed =value;
			 			if(currentfeed.id==newsfeed_id)
			 			{
			 				////////////////////alert("this is the feed");
			 				currentfeed.business_followed_by_me=1;
			 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					 
							});
			 				
			 			}

			 		});
 				//$scope.postFFReview(item_id,user_id,0,0,'business_follow',$scope.date_created,"following business");
 				
				//$scope.toggle=1;
				//////////////////alert($scope.toggle);
				$scope.postFavfollowReview(item_id,user_id,0,0,"business_follow",$scope.date_created,"add_to_followed");

		}else
		{
			$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				//$scope.toggle=1;

		}

		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id,newsfeed_id)
 	{




 				angular.forEach($scope.UserMyWallFeeds,function(value,key)
			 		{

			 			var currentfeed =value;
			 			if(currentfeed.id==newsfeed_id)
			 			{
			 				////////////////////alert("this is the feed");
			 				currentfeed.business_followed_by_me=0;
			 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					
							});
			 				
			 			}

			 		});
 		
 				
				//$scope.toggle=0;
				//$scope.$digest();
				//////////////////alert($scope.toggle);

 	}

 	$scope.followInnerItem = function(item_type,user_id,item_id,newsfeed_id)
 	{
 		//first check if you already followed item.
 		//////////////////alert('loloofo');
 		////////////console.log('the user_id is',$scope.user_id,user_id)
 		if(item_type=='business'){

	 				angular.forEach($scope.UserMyWallFeeds,function(value,key)
			 		{

			 			var currentfeed =value;
			 			if(currentfeed.id==newsfeed_id)
			 			{
			 				////////////////////alert("this is the feed");
			 				var innerfeed =currentfeed.inner_feed;
			 				currentfeed.inner_feed.business.followedByUser=1;
			 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					 
							});
			 				
			 			}

			 		});
 				//$scope.postFFReview(item_id,user_id,0,0,'business_follow',$scope.date_created,"following business");
 				
				//$scope.toggle=1;
				//////////////////alert($scope.toggle);
				$scope.postFavfollowReview(item_id,user_id,0,0,"business_follow",$scope.date_created,"add_to_followed");

		}else
		{
			$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////////////////////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				//$scope.toggle=1;

		}

		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.unfollowInnerItem = function(item_type,user_id,item_id,newsfeed_id)
 	{




 				angular.forEach($scope.UserMyWallFeeds,function(value,key)
			 		{

			 			var currentfeed =value;
			 			if(currentfeed.id==newsfeed_id)
			 			{
			 				////////////////////alert("this is the feed");
			 				var innerfeed =currentfeed.inner_feed;
			 				currentfeed.inner_feed.business.followedByUser=1;
			 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					
							});
			 				
			 			}

			 		});
 		
 				
				//$scope.toggle=0;
				$scope.$digest();
				//////////////////alert($scope.toggle);

 	}

 	$scope.postFavfollowReview=function(business_id,user_id,rating,pricing,kind,date_created,details)
	{
		

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		
			
		
			if (details != "") 
			{

					var form_data = new FormData();
					form_data.append("random_review","random_review");
					form_data.append("current_user_id",user_id);
					form_data.append("date_created",date_created);
					form_data.append("kind",kind);
					form_data.append("good",rating);
					form_data.append("cost",pricing);
					form_data.append("details",details);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//////////////////alert(response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////////////console.log(errorMessage); // Optional
					}
					});

			}

		
	    $scope.details="";
	}



 }]).value('newsfeedViewModel', newsfeedViewModel)
 
.controller('RandomPeopleCtrl', ['$scope','GetData','config', function($scope,GetData,config){

 	$scope.people_to_follow=[];
 	$scope.BaseImageURL=config.BaseImageURL;

 	GetData.getData(config.BaseURL+"classes/util.php?random_people=random",function(data)
 	{
 		if(data.length){
	 		$scope.people = data;
	 		angular.forEach($scope.people,function(value,key)
	 		{
	 			$scope.person =value;
	 			if($scope.person.avatar=="" || $scope.person.avatar==null )
	 			{
	 				$scope.person.avatar=config.BaseImageURL+'uploads/defavatar.png';
	 			}else if($scope.person.avatar.startsWith('http'))
	 			{
	 				$scope.person.avatar=$scope.person.avatar;
	 			}else
	 			{
	 				$scope.person.avatar =config.BaseImageURL+$scope.person.avatar;
	 			}

	 			this.push($scope.person);

	 		},$scope.people_to_follow);
 		}
 		

 	});
 	
 }]).controller('MessageCtrl', ['$scope','SendData','GetData', function($scope,SendData,GetData){
 	
 }]).factory('SendData', ['$http','$q','config', function($http,$q,config){
	var mydata = [];

	var SendDataPromise =function(link,data_model){

		var deffered = $q.defer();

		$http.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
		$http.defaults.headers.post['dataType'] = 'json';
		$http.defaults.headers.post['Content-Type'] = 'application/json'
		$http.post(link,data_model).
		  then(function(response) {
		   
		    deffered.resolve(response)
		  }, function(response) {
		    
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};


	return {

			sendData : function(link,data_model,callback){

					SendDataPromise(link,data_model).then(function(data){
						
						mydata=data.data;
						//////console.log("my data is",mydata);
						callback(data.data);

					},function(error){
						//////console.log("Error : ->",error);
					});

			}

  };

}]).factory("GetData",['$http','$q','config',function($http,$q,config)
{
	var getDataPromise = function(link)
	{
			var deffered = $q.defer();

		  $http.get(link).
		  then(function(response) {
		   
		    deffered.resolve(response)
		  }, function(response) {
		    
		    deffered.reject(response)
		  });
		  return deffered.promise;

	};

	return{
		getData: function(link,callback)
		{
			   getDataPromise(link).then(function(data){
						
						mydata=data.data;
						////console.log("my data is",mydata);
						callback(data.data);

					},function(error){
						//////console.log("Error : ->",error);

					});

		}
	};


}])

.constant('config', {
         //BaseURL: 'http://yammzit.com/',
        // BaseImageURL :'http://yammzit.com/admin/Theme/'

        BaseURL: 'http://localhost//yammzit/Yammz/',
        BaseImageURL :'http://localhost/yammzit/admin/Theme/'

        //BaseURL: 'http://yammzco-001-site1.btempurl.com/',
        //BaseImageURL :'http://yammzco-001-site1.btempurl.com/admin/Theme/'

 })



