/**
* home Module
*
* Description
*/

angular.module('home', ['ngAnimate', 'ui.bootstrap','ngDialog'])

.controller('EventCtrl', ['$scope','$http','pickEvents','EventViewModel','config',function($scope,$http,pickEvents,EventViewModel,config){

	$scope.events = [];
	pickEvents.getMyData(function(data)

	{
		$scope.latestEvents =data;
		////////console.log( "these are picked events ",$scope.latestEvents[0]);
		for(var i= 0; i < $scope.latestEvents.length; i++) {
			$scope.currentEvent =$scope.latestEvents[i];
			$scope.eventViewModel = new EventViewModel();
			if($scope.currentEvent.picture == '' || $scope.currentEvent.picture==null){
				$scope.eventViewModel.picture=config.BaseImageURL+"uploads/defbanner.png";
			}else
			{
				$scope.eventViewModel.picture=$scope.currentEvent.picture;
				////////console.log( "these are picked pic ",currentEvent.picture);
			}

			$scope.eventViewModel.title=$scope.currentEvent.title;
			////////console.log( "these are picked title ",currentEvent.title);
			$scope.eventViewModel.start_date=$scope.currentEvent.start_date;
			////////console.log( "these are picked startsdate ",$scope.eventViewModel.start_date);
			$scope.eventViewModel.end_date=$scope.currentEvent.end_date;
			////////console.log( "these are picked enddate ",$scope.eventViewModel.end_date);
			$scope.eventViewModel.interested_count=$scope.currentEvent.interested_count;
			////////console.log( "these are picked count ",currentEvent.interested_count);
    		$scope.events.push($scope.eventViewModel);

		}


	});

}])
.factory('pickEvents', ['$http','$q','config', function($http,$q,config){
	////////console.log("mananaanana");
	var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?events=latest').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};

	return {

		getMyData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
					//////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

    };

}])
.controller('ReviewCtrl', ['$scope','pickreview','ReviewModel','config',function ($scope,pickreview,ReviewModel,config) {
	//$scope.obj = pickreview;
	////////console.log( "these are trypes ",typeof($scope.obj));
   $scope.ratings=[];
   $scope.pricings=[];
   $scope.noratings =[];
   $scope.nopricings=[];
	angular.element(document).ready(function(){
		pickreview.getColumns($scope.page,function(data)
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
			////////console.log('the latest review is =>',$scope.latestreview);
			// $scope.isOwner =false;
			if($scope.mymodel.person_id == $scope.mymodel.session_id)
			{
				$scope.isOwner=true;

			}else
			{
				$scope.isOwner =false;
			}
			console.log("The person_id is ==>",$scope.mymodel.person_id);
			console.log("The session_id is ==>",$scope.mymodel.session_id);
			console.log("The iss owner is ==>",$scope.isOwner);

		});
	});

}])
.factory('pickreview', ['$http','$q','config' ,function($http,$q,config){

	 var mydata =
	 {

	 };
	 var promisse =function(page){
		var deffered = $q.defer();
		$http.get(config.BaseURL+'classes/util.php?review=latest&page='+page).
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		    deffered.resolve(response);
		    ////////console.log(response);
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    deffered.reject(response);
		  });
		  return deffered.promise;
	};

	/*var getData = function(datas){
			$http.get('http://localhost:89//yammzit/Yammz/classes/util.php?review=latest').then(function(response)
			{
				mydata=response.data;
				//////console.log('ourdata =',this.mydata);
				datas(mydata);
			},function(error)
			{

			})
	}*/

	return {
		getColumns : function(page,callback)
		{
			promisse(page).then(function(data){
		//data =JSON.parse(data);
				//////console.log('ourdata =',data.data);
				mydata=data.data;
				callback(data.data);

			},function(error){
				//////console.log("Error : ->",error);
			});

		}
	};
}])
.value('ReviewModel', ReviewModel)
.value('EventViewModel', EventViewModel)
.controller('GossipCtrl', ['$scope','pickGossips','config', function ($scope,pickGossips,config) {

	$scope.GossipModels=[];
	pickGossips.getMyData(function(data)
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
.factory('pickGossips', ['$http','$q','config',function ($http,$q,config) {
	var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?gossips=latest').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("go dady");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwango mymmyo");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {

		getMyData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
					////////console.log('my gossips =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}


	};


}])
.controller('CategoryCtrl', ['$scope','pickCategories','CategoryViewModel','config', function ($scope,pickCategories,CategoryViewModel,config) {

	$scope.currentobjectPosition =0;
	$scope.toggle = 7;

	$scope.makeFillData  = function(position)
	{
		$scope.currentobjectPosition=position;

	}
	$scope.redirect = function(count)
	{
		window.location.href=config.BaseURL+"home_tab.php#"+count;
	}

	$scope.togglify=function(id)
	{
		 $scope.toggle = id;
		 ////alert($scope.toggle);
		 $scope.apply();

	}
	pickCategories.getMyData(function(data)

	{
		$scope.categorymodels = [];

		$scope.categories =data;


	angular.forEach($scope.categories, function(value,key){
		$scope.currentCategory = value;
				//businesses
				angular.forEach($scope.currentCategory.businesses, function(value,key)
				{
					$scope.currentbusiness =value;
					if($scope.currentbusiness.logo == null || $scope.currentbusiness.logo == ''){
						////////console.log('Men am in the right if statement');
						$scope.currentbusiness.logo=config.BaseImageURL+"uploads/deflogo.png";
					}else{
						$scope.currentbusiness.logo=$scope.currentbusiness.logo;
					}


				});

		//subcategories
		$scope.categorymodel  = new CategoryViewModel();
		$scope.categorymodel.category_id=$scope.currentCategory.category_id;
		$scope.categorymodel.categoryname=$scope.currentCategory.categoryname;
		$scope.categorymodel.category_icon=$scope.currentCategory.category_icon;

		////////console.log('Men am in the right if statement');
		$scope.categorymodel.businesses=$scope.currentCategory.businesses;
		$scope.categorymodel.sub_categories = $scope.currentCategory.category_subcategories;
		//////console.log("the mike nyola subcategories are =====>",$scope.categorymodel.sub_categories)





		this.push($scope.categorymodel);

	},$scope.categorymodels);




	});

	$scope.dropcategories= [];

	pickCategories.getMyDropData(function(data)

	{
		$scope.dropdowncategories =data;

		angular.forEach($scope.dropdowncategories, function(value,key){
			$scope.currentDropCategory = value;
					this.push($scope.currentDropCategory);

		},$scope.dropcategories);







		});

}])
.factory('pickCategories', ['$http','$q','config',function ($http,$q,config) {
	var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?categories=categories').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    ////////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};

	var businessCategorypromisse = function()
	{
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?dropcategories=categories').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;

	}

	var subcategories =function(category_id)
	{
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?dropcategories=categories').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;

	}



	return {
		getMyData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
					////////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					////////console.log("Error : ->",error);
				});

		},

		getMyDropData : function(callback){
				businessCategorypromisse().then(function(data){
			//data =JSON.parse(data);
					////////console.log('myowncategory data =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
.value('CategoryViewModel', CategoryViewModel)
.value('GossipViewModel',GossipViewModel)


.controller('CountryCtrl', ['$scope','pickCountries','pickCities','CountryViewModel','$http','CityViewModel',function ($scope,pickCountries,pickCities,CountryViewModel,$http,CityViewModel) {
	$scope.countryModels =[];
	////////console.log("my countries men of id are manaamm",$scope.cityModels);
	pickCountries.getMyData(function(data)
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

	////////console.log("my cities of id are manaamm",$scope.cityModels);

	document.getElementById("countrry").onchange = function(){

		var country_id = document.getElementById("countrry").value;
		////alert(country_id);
		////////console.log("my cities of id are",$scope.cityModels);
		$scope.country_id=country_id;
		pickCities.getMyData( $scope.country_id,function(data)
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
			////////console.log("my cities of id cmon henry are",$scope.cityModels);

			   $scope.sel = document.getElementById('city');
			   $scope.sel.innerHTML="";


				angular.forEach($scope.cityModels, function(value,key)
				{	$scope.citycModel =value;
					////////console.log("my cities of id cmon henry are in if in if",$scope.citycModel['name']);
				    $scope.opt = document.createElement('option');
				    $scope.opt.innerHTML = $scope.citycModel['name'];
				    $scope.opt.value = $scope.citycModel['id'];
				    $scope.sel.appendChild($scope.opt);

				});
			//document.getElementById("city").innerHTML = $scope.cityModels[0]['name'];

		});



		////////console.log("my cities of id cmon henry are",$scope.cityModels);

	};

}])
.factory('pickCountries', ['$http','$q','config',function ($http,$q,config) {

	var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?countries=all').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
					//console.log('mycountries are =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
.factory('pickCities', ['$http','$q','config',function ($http,$q,config) {


	var mydata = [];

	var promissse =function(country_id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+"classes/util.php?signupCountry_id="+country_id).
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyData : function(country_id,callback){
				promissse(country_id).then(function(data){
			//data =JSON.parse(data);
					////////console.log('myowncitydata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
.value('CountryViewModel',CountryViewModel)
.controller('SignupCtrl', ['$scope', 'SignUpModel','$http','config','pickCountries','pickCities','CountryViewModel','CityViewModel',function ($scope,SignUpModel,$http,config,pickCountries,pickCities,CountryViewModel,CityViewModel) {

		$scope.countryModels =[];

		////////console.log("my countries men of id are manaamm",$scope.cityModels);
		pickCountries.getMyData(function(data)
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

		document.getElementById("countrry").onchange = function(){

			var country_id = document.getElementById("countrry").value;
			$scope.cityModels=[];
			////alert(country_id);
			////////console.log("my cities of id are",$scope.cityModels);
			$scope.country_id=country_id;

			pickCities.getMyData( $scope.country_id,function(data)
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


		};



	$scope.signobject = {
		fname :'',
		lname :'',
		country_id : '',
		city_id : '',
		email : '',
		phonenumber : '',
		password : '',
		confirmpass:'',
		dob : '',
		gender : '',
		social :'yammzit'

	};



	$scope.postData = function()
	{
		$scope.signobject.dob=document.getElementById('example2').value;
		//////console.log("this is my gender",$scope.signobject.gender);
		//////console.log("this is my dob",$scope.signobject.dob);
		$http.get(config.BaseURL+'classes/util.php?fname='+
			$scope.signobject.fname+'&lname='+$scope.signobject.lname+'&city_id='+
			$scope.signobject.city_id+'&email='+$scope.signobject.email+'&phonenumber='+$scope.signobject.phonenumber+'&password='
			+$scope.signobject.password+'&gender='+$scope.signobject.gender+'&dob='+$scope.signobject.dob+'&social='+$scope.signobject.social).
		  then(function(response) {

		   //alert(response);
		   //////console.log("success submit==",response);
		   //////console.log(response);

		  }, function(error) {
		  	//alert("the erroe is"+error);
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    //////console.log("Error failure  ==",error);

		  });

		  $scope.signobject.fname=null;
		  $scope.signobject.lname=null;
		  $scope.signobject.city_id=null;
		  $scope.signobject.email=null;
		  $scope.signobject.otheremail=null;
		  $scope.signobject.phonenumber=null;
		  $scope.signobject.password=null;
		  $scope.signobject.gender=null;
		  $scope.signobject.dob=null;

	}

}])
.factory('sendSignUpData', [function () {


	return {

	};
}])
.controller('SlideAdvertCtrl', ['$scope','pickSlides','config', function ($scope,pickSlides,config) {
	$scope.BaseURL=config.BaseURL;
	$scope.BaseImageURL=config.BaseImageURL;
	pickSlides.getMyData(function(data)
	{

		$scope.slideAdverts=data;


	});

}])
.factory('pickSlides', ['$http','$q','config',function ($http,$q,config) {

 var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?slides=all').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		  //  //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		  //  //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
				//	//////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
.value('CityViewModel',CityViewModel).value('SignUpModel',SignUpModel)


.controller('AddBusinessCtrl', ['$scope','pickCategories','fileUpload','pickCountries','pickCities','CountryViewModel','CityViewModel','config', function ($scope,pickCategories,fileUpload,pickCountries,pickCities,CountryViewModel,CityViewModel,config) {
//picking and rendering vcountries

	$scope.categoryModels = [];
	pickCategories.getMyData(function(data)
	{
		$scope.RawCategories = data;
		console.log("the raw category models are==>",$scope.RawCategories);

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

	////////console.log("my countries men of id are manaamm",$scope.cityModels);
	pickCountries.getMyData(function(data)
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
		pickCities.getMyData(country_id,function(data)
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

pickCategories.getMyDropData(function(data)

{
	$scope.dropdowncategories =data;
	////////console.log('data in picks ' ,$scope.dropdowncategories);


	angular.forEach($scope.dropdowncategories, function(value,key){
		$scope.currentDropCategory = value;

		this.push($scope.currentDropCategory);

	},$scope.dropcategories);







});





$scope.defpic =config.BaseImageURL+"uploads/capture.png";

$scope.uploadFile = function(){
               var file = $scope.myFile;

              // //////console.log('file is ' ,file);
               //////console.log(file);

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

		////////console.log('my event is ',e);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.picture=e.target.result;
       				 });


                   // //////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}


	$scope.addbusiness= function()
	{
		

		console.log('The file is: ==>',$scope.myFile);
		//$scope.uploadFile();
		var form_data = new FormData();
		form_data.append('addbusiness_form','addbusiness_form')
		form_data.append('user_id', $scope.user_id);
	    form_data.append('name', $scope.businessobject.name);
	    form_data.append('business_logo', $scope.myFile);
	    form_data.append('country_id', $scope.businessobject.country_id);
	    form_data.append('city_id', $scope.businessobject.city_id);
	    form_data.append('address', $scope.businessobject.address);
	    form_data.append('subcategoryid_1', $scope.businessobject.subcategoryid_1);
	    form_data.append('subcategoryid_2', $scope.businessobject.subcategoryid_2);
	    form_data.append('subcategoryid_3', $scope.businessobject.subcategoryid_3);

	  //  //////console.log('the form data is',form_data);


	    ////alert(form_data);
	    //////console.log('this is formdata',form_data);
	    $.ajax({
	                url: config.BaseURL+'classes/util.php?', // point to server-side PHP script
	                dataType: 'text',  // what to expect back from the PHP script, if anything
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,
	                type: 'POST',
	                success: function(php_script_response){
	                	//alert(php_script_response);
	                	var business_id=php_script_response;
	                	$scope.postReview(business_id,$scope.user_id,0,0,$scope.date_created,"discovered business");
	                	window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+php_script_response;
	                }
	     });





	}

	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details)
	{
		//var image = $scope.myFile;
		//alert(business_id);
		
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
					////alert("the buz -===>  "+business_id);
					form_data.append("business_id",business_id);
		
					$.ajax({
					url: "classes/util.php",
					type: "POST",
					data: form_data,
					processData: false,
					contentType: false,
					success: function(response) {
						//alert("The response is==> "+response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
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
               	////alert(data);
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

		

		element.bind("click", function(){
			//scope.postReview(scope.random_business.id,user_id,scope.rate,scope.price,scope.date_created,scope.details)
			//"<div><button class='btn btn-default'>Show //alert #"+scope.countt+"</button></div>"
			 console.log("the element is",element);
			 if(element.context.className=='post_review')
			 {
			 	 console.log("tigidify");

			 scope.$apply(function(){
			 	scope.postReview(scope.random_business.id,scope.user_id,scope.rate,scope.price,scope.date_created,scope.details,function(data)
			 	{
			 		scope.RandomFeed=JSON.parse(data);
			 		//var i=0;

			 		//var con =
			 		 
			 		//alert(scope.$eval(scope.countt+"mufrid"));
			 		scope.myfeed= new ReviewModel();
			 		scope.myfeed.price = scope.RandomFeed.cost;
			 		scope.myfeed.rate = scope.RandomFeed.good;
			 		scope.myfeed.id =scope.RandomFeed.id;
			 		scope.myfeed.person_avatar=scope.RandomFeed.user.avatar;
			 		scope.myfeed.business_name = scope.RandomFeed.business.name;
			 		scope.myfeed.person_name =scope.RandomFeed.user.first_name+" "+scope.RandomFeed.user.last_name;
			 		scope.myfeed.business_id =scope.RandomFeed.business.id; 
			 		scope.myfeed.business_owner_id =scope.RandomFeed.business.owner_id;
			 		scope.myfeed.date_created = scope.RandomFeed.date_created;
			 		//to be contnuied .....

			 				for(var i=0; i<scope.myfeed.rate; i++)
							{
								scope.myfeed.ratings[i]=i;
							}
							for(var j=0; j<scope.myfeed.price; j++)
							{
								scope.myfeed.pricings[j]=j;
							}

							for(var k=0; k<(5-scope.myfeed.rate); k++)
							{
								scope.myfeed.noratings[k]=k;
							}

							for(var l=0; l<(5-scope.myfeed.price); l++)
							{
								scope.myfeed.nopricings[l]=l;
							}
					// scope.myfeed.ratings =scope.ratings;
					// scope.myfeed.pricings =scope.pricings;
					// scope.myfeed.noratings =scope.noratings;
					// scope.myfeed.nopricings =scope.nopricings;
					scope.myfeed.content =scope.RandomFeed.details;

			 		console.log("the feed is",scope.RandomFeed);

			 		var myelement = angular.element(document.getElementById('homeposters'));

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
					scope.myfeed.myfeedComments=scope.myFeedComments;

			 		if(scope.RandomFeed.kind == "review")
			 		{

			 			myelement.prepend
			      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/review_feed.html").then(function(html){
					      var template = angular.element(html);
					      myelement.prepend(template);
					      $compile(template)(scope);
			  			 })
		      		 	);

			 		}else if(scope.RandomFeed.kind == "review_photo")
			 		{

			 			myelement.prepend
			      		 ($templateRequest(config.BaseURL+"Controllers/News_feed/feed_posts/review_photo_feed.html").then(function(html){
					      var template = angular.element(html);
					      myelement.prepend(template);
					      $compile(template)(scope);
			  			 })
		      		 	);

			 		}

			 		scope.countt = scope.countt+1;

			 		 //window.location.reload(true);
			 	});
			
	      	 });

			 }else if(element.context.classList.contains('post_comment'))
			 {
			 	console.log("commentate");
			 }
		
		});
	};
}])
.controller('RandomBusinessCtrl', ['$scope','pickRandomBusinesses','BusinessViewModel','config','ngDialog',function ($scope,pickRandomBusinesses,BusinessViewModel,config,ngDialog) {
	$scope.countt=1;
 	$scope.businessModels = [];
	$scope.BaseURL=config.BaseURL;
	$scope.BaseImageURL=config.BaseImageURL;
	$scope.rating=0;
	$scope.rating=0;
	//pickRandomBiz();
 	//$scope.user_id='';
 $scope.$watch(['city_id,user_id'],function(){
 	////console.log($scope.city_id);
 	////console.log($scope.user_id);

 	pickRandomBusinesses.getMyRandomData($scope.city_id,$scope.user_id,function(data)
 	{
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
 			$scope.viewModel.logo =$scope.currentRandomBusiness.logo;
 			$scope.viewModel.name = $scope.currentRandomBusiness.name;
 			$scope.viewModel.address=$scope.currentRandomBusiness.address;
 			$scope.viewModel.rating = $scope.currentRandomBusiness.good;

 			$scope.pricing_array =[];
 			$scope.non_pricing_array =[];

 			$scope.rating_array =[];
 			$scope.non_rating_array =[];
 			for(var i=0;i<$scope.currentRandomBusiness.cost;i++)
 			{	
 				$scope.pricing_array.push(i);
 			}
 			for(var i=0;i<5-$scope.currentRandomBusiness.cost;i++)
 			{	
 				$scope.non_pricing_array.push(i);
 			}

 			for(var i=0;i<$scope.currentRandomBusiness.good;i++)
 			{	
 				$scope.rating_array.push(i);
 			}
 			for(var i=0;i<5-$scope.currentRandomBusiness.good;i++)
 			{	
 				$scope.non_rating_array.push(i);
 			}
 			$scope.viewModel.pricing=$scope.currentRandomBusiness.cost;
 			this.push($scope.viewModel);



 		},$scope.businessModels);

 	});

 });


 	//$scope.followtoggle = 0;
	$scope.random_business=null;
	$scope.pickRandomBiz= function()
	{
		////alert("big man");

		 $.get(config.BaseURL+"classes/util.php?one_business=random",function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////alert("results are"+results);
						$scope.pre_random_business =JSON.parse(results);

						if($scope.pre_random_business.logo ==null || $scope.pre_random_business.logo =='')
			 			{
			 				$scope.pre_random_business.logo=config.BaseImageURL+"uploads/defbanner.png";
			 			}else
			 			{
			 				$scope.pre_random_business.logo=config.BaseImageURL+$scope.pre_random_business.logo;
			 			}
						$scope.random_business=$scope.pre_random_business;
						//////console.log("The random business -s =====>",$scope.random_business);
						// <pre><code>
						
						// </code>
						// </pre>
				  //	$("#randoms").append(results);
				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});

	}

	

	$scope.toBusiness=function(user_id,business_id)
	{
		$.get(config.BaseURL+"classes/util.php?business_id="+business_id+"&business_claimer_id="+user_id,function(data){

	        var mybusiness = JSON.parse(data);
	      //  //alert(mybusiness);
	        ////alert(mybusiness.owned);

	        if(mybusiness.owned=="yes")
	        {
	        	////alert(data.owned);
	        //	//alert('nkiraba')
	        	$.get(config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness.id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  //	//alert("results");
				  	window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness.id;
				});


	        	//window.location ="http://localhost:89//yammzit/Yammz/business_page_owners_view.php";
	        }else if(mybusiness.owned=="no")
	        {   ////alert(data.owned);
	        	//window.location ="http://localhost:89//yammzit/Yammz/business_page_3.php";
	        	$.get(config.BaseURL+"business_page_3.php?current_business_id="+mybusiness.id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////alert("results");
				  	window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+mybusiness.id;
				});


	        	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php";
	        }
	    });

	}

	$scope.likeToggleValue=0;
	$scope.likeNo=0;
	$scope.likeNFItem=function(user_id,newsfeed_id)
 	{
 				$scope.likeToggleValue=1;
 				$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        			////alert(data);
        			var datafig = data;
        			$scope.likeNo=parseInt(datafig);
        			$scope.$apply();
        			////alert(currentfeed.likeNo);
    			});

 	}
 	$scope.unlikeNFItem=function(user_id,newsfeed_id)
 	{


 				$scope.likeToggleValue=0;
 				$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        				////alert(data);
        			
        			$scope.likeNo=parseInt(data);
        			$scope.$apply();
        			////alert(currentfeed.likeNo);
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
        	//alert(data);
   		});

    }

    $scope.postComment=function(user_id,feed_id,details,date_created,type)
	{
		////alert("gone");
		//var details = document.getElementById("content"+feed_id).value;
		var kind ="normal";
		var commentTo = 0;

		if (details != "") {
	        ////alert(val);
	        $.get(BaseURL+"classes/util.php?comment_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&feed_id="+feed_id+"&commentTo="+commentTo+"&details="+details,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////alert("results are"+results);
				  	if(type=='rr'){
				  	$("#rrcommentors"+feed_id).append(results);
				  		$scope.details="";
				  		document.getElementById("rrcontent"+feed_id).value="";
				  	}else if(type=='rrp')
				  	{
				  		$("#rrpcommentors"+feed_id).append(results);
				  		//$scope.details="";
				  		document.getElementById("rrpcontent"+feed_id).value="";
				  	}
				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
			});
	    }
	}

	$scope.last_new_feed=null;
	$scope.upload_fille= function ()
	{

		document.getElementById("random_biz_file_attach").click();
		$scope.photo_toggle=1;
		//setTimeout(function(){ $scope.photo_toggle=0; }, 3000);
		//angular.element('#file_attach').triggerHandler('click');
		


	}

	$scope.ratings =[];
	$scope.pricings =[];
	$scope.noratings =[];
	$scope.nopricings =[];


	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details,callback)
	{
		var image = $scope.myFile;
		////alert(business_id);
		////alert(user_id);
		////alert(rating);
		////alert(pricing);
		////alert(date_created);
		////alert(details);
		////alert(template);

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if(image !=null){
			
					////alert(val);
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
						//alert("buddy am in the thing");
						//$scope.RandomFeed =JSON.parse(response);
						
							
						
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						console.log("The error is",errorMessage); 
					}
					});
					
					// $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&good="+rating+"&cost="+pricing+"&details="+details+"&business_id="+business_id,function(results){
						
					// 			$("#posters").prepend(results);

					// });
			
		}else if(image==null)
		{
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
						////alert("buddy am in the thing");
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
						console.log("myddy ratings",$scope.ratings);
						console.log("myddy noratings",$scope.noratings);
						console.log("myddy pricings",$scope.pricings);
						console.log("myddy nopricings",$scope.nopricings);
						callback(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});

			}

		}
	    $scope.details="";
	}


 	$scope.followItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.

 		//////console.log('the user_id is',$scope.user_id,user_id)
 				$scope.postFavfollowReview(item_id,user_id,0,0,"follow_business",$scope.date_created,"add_to_followed");

 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


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

 		//////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


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
						//alert(response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});

			}

		
	    //$scope.details="";
	}

	//business_rating

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

 }]).directive('contentItem', function ($compile,TemplateService) {
 	//var mytemplate = "<div id='postt'><div class='panel panel-default' style='border:none; border-radius:0px'><div class='panel-body'><div class='row'><div class='col-lg-12 col-sm-12 col-md-12 col-xs-12'><table><tr><td style='vertical-align:top;' width='10px;'><img ng-src='{{last_new_feed.user.avatar}}' class='img-circle' style='width:50px;height:50px'  alt='Generic placeholder thumbnail'></td><td><span><h6><B><a style='text-decoration:none;' href='#' class='black' ng-click='toBusiness(<?php  ?>)'>&nbsp;{{last_new_feed.user.first_name}} {{last_new_feed.user.last_name}}</a></B>Made a review on <B><a id='biz'  style='text-decoration:none;' class='black' ng-click='toBusiness(user_id,last_new_feed.business.id)'>{{last_new_feed.business.name}}</a></B><span class='help-block ' style='color:#CFCFCF;'>&nbsp;&nbsp; 03/02/2016 &nbsp; 23 days ago</span></h6>&nbsp;<br/></span></td></tr><tr><td></td><td colspan='' style='padding-left:8px;'><h6 ><p style='width:350px;'>{{last_new_feed.user.details}}</p><hr style='margin-bottom:4px; '></hr><hr style='margin-bottom:4px; '></hr><table><tr><td style='width:110px;'><a href='javascript:void();'  style='font-size:9px; background-color:white;text-decoration:none;' id=''><span class='icon icon-like85 redbright ' style='font-size:16px;'> &nbsp;<span class='simplegrey' style='font-size:12;'>10 </span>&nbsp;<span style='font-size:12;' class='simplegrey'>Likes</span></a></td><td style='width:140px;'><a class=' btn simplegrey 'style='text-decoration:none;'  data-toggle='collapse' data-target='#comment'><span style='font-size:16px;' class='glyphicon glyphicon-comment pull-left'></span>&nbsp;&nbsp;Comment</a></td><td><a class='simplegrey btn ' style='text-decoration:none;' data-toggle='modal' data-target='#mdl_example'><span class='icon icon-sharing6'></span>&nbsp;&nbsp; Share </a></td></tr></table><h6></h6><div class='space'></div><div id='flash' align='left'  ></div><div id='show' align='left'></div><form class=' noborderStyle' role='form' action='Controllers/post_comment.php' method='post' ><div class='form-group'><table><tr><td><input type='text' class='form-control form-control-no-border' rows='1' name='content' id='content' style='background-color:#E9EAEE;text-align:left; width:300px;height:30px; border:none; border-radius: 0px;' placeholder='Write a comment...'></textarea></td><td style='vertical-align:top;'><div style='width:65px;'></div><input type='submit' id='submit'  style='background-color:#E9EAEE;height:30px;text-align: center;line-height: 15px; width:60px;font-weight:bold;background-color:#BD2532; color:white;border-radius:10;' class=' form-control submit pull-right' value='Send' /></td></tr></table></div></form></h6></td></tr></table></div></div></div></div></div>";
   

    var getTemplate = function (templates) {
        var template = '';

       
                template = templates.randomTemplate;
               
        

        return template;
    };

    var linker = function (scope, element, attrs) {
       
        // element.html(getTemplate(scope.content)).show();
        // $compile(element.contents())(scope);

          TemplateService.getTemplates().then(function (response) {
            var templates = response.data;

            element.html(getTemplate(templates)).show();

            $compile(element.contents())(scope);
        });

    };

    return {
        restrict: 'E',
        replace: true,
        link: linker,
        scope: {
            content: '='
        }
    };
}).factory('TemplateService','config', function ($http, URL,config) {
    var getTemplates = function () {
        return $http.get(config.BaseURL+'Controllers/home_page/new_post_pill.json');
    };

    return {
        getTemplates: getTemplates
    };
})

.factory('pickRandomBusinesses', ['$http','$q','config',function ($http,$q,config) {


 	var mydata = [];

	var promissse =function(city_id,user_id){
		var deffered = $q.defer()
		//$http.get(config.BaseURL+'classes/util.php?businesses_to_follow=random&city_id='+city_id+'&user_id='+user_id).
		$http.get(config.BaseURL+'classes/util.php?businesses_to_follow=random').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(city_id,user_id,callback){
					////console.log('The  jkkzkkz  apap city_id  =',city_id);
					////console.log('The zllsaoooao user_id  =',user_id);
				promissse(city_id,user_id).then(function(data){
			//data =JSON.parse(data);
					////console.log('The kabada city_id  =',city_id);
					////console.log('The kabadi user_id  =',user_id);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])
.value('BusinessViewModel',BusinessViewModel)
.controller('SideAddCtrl', ['$scope','pickSideAdds','config', function ($scope,pickSideAdds,config) {

 	$scope.side_addModels = [];
 	pickSideAdds.getMyRandomData(function(data)
 	{
 		$scope.randomSide_adds = data;
 		angular.forEach($scope.randomSide_adds,function(value,key)
 		{
 			$scope.currentRandomSide_add = value;
 			if($scope.currentRandomSide_add.business.logo ==null || $scope.currentRandomSide_add.business.logo=='')
 			{
 				$scope.currentRandomSide_add.business.logo=config.BaseImageURL+"uploads/deflogo.png";
 			}else
 			{
 				$scope.currentRandomSide_add.business.logo=config.BaseImageURL+$scope.currentRandomSide_add.business.logo;
 			}

 			if($scope.currentRandomSide_add.image==null || $scope.currentRandomSide_add.image=='')
 			{
 				if(key==0){
 					$scope.currentRandomSide_add.image= config.BaseImageURL+"uploads/web_side_ad_1.png";
 				}else if(key ==1)
 				{
 					$scope.currentRandomSide_add.image= config.BaseImageURL+"uploads/web_side_ad_3.png";
 				}
 			}else
 			{
 				$scope.currentRandomSide_add.image=config.BaseImageURL+$scope.currentRandomSide_add.image;
 			}
 			$scope.viewModel = new SideAddViewModel();
 			$scope.viewModel.id = $scope.currentRandomSide_add.id;
 			$scope.viewModel.business_id=$scope.currentRandomSide_add.business.id;
 			$scope.viewModel.business_name =$scope.currentRandomSide_add.business.name;
 			$scope.viewModel.business_logo = $scope.currentRandomSide_add.business.logo;
 			$scope.viewModel.details=$scope.currentRandomSide_add.details;
 			$scope.viewModel.image=$scope.currentRandomSide_add.image;
 			this.push($scope.viewModel);



 		},$scope.side_addModels);

 	});

 	$scope.followItem = function(item_type,user_id,item_id)
 	{
 				$.get("http://localhost:89//yammzit/Yammz/classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});



 	}

 }])
.factory('pickSideAdds', ['$http','$q','config',function ($http,$q,config) {
 	var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?side_adds=random').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		    //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
					//////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])
.value('SideAddViewModel', SideAddViewModel)
.controller('MiddleAddCtrl', ['$scope','pickMiddleAdds','config' ,function ($scope,pickMiddleAdds,config) {

 	$scope.middle_addModels = [];
 	pickMiddleAdds.getMyRandomData(function(data)
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
.factory('pickMiddleAdds', ['$http','$q','config',function ($http,$q,config) {

 var mydata = [];

	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?middle_adds=all').
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		    //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(callback){
				promissse().then(function(data){
			//data =JSON.parse(data);
					//////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])
 .value('MiddleAddViewModel', MiddleAddViewModel)

.controller('favouriteBusinessCtrl', ['$scope','pickFavouriteBUsinesses','BusinessViewModel','config',function ($scope,pickFavouriteBUsinesses,BusinessViewModel,config) {


 $scope.businessModels = [];
 $scope.count=0;
 	pickFavouriteBUsinesses.getMyRandomData($scope.user_id,function(data)
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

 		//////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=1;
		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.

 		//////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=0;

		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}



 }])
 .factory('pickFavouriteBUsinesses', ['$http','$q','config',function ($http,$q,config) {

 	//var id = document.getElementById("profile_id_keeper").value;
 	var mydata = [];

	var promissse =function(id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?favourite_business_picker='+id).
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(id,callback){
				promissse(id).then(function(data){
			//data =JSON.parse(data);
					////////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])

.controller('MyBusinessCtrl', ['$scope','pickMyBUsinesses','BusinessViewModel','config', function ($scope,pickMyBUsinesses,BusinessViewModel,config) {


  $scope.businessModels = [];
  $scope.count=0;
 	pickMyBUsinesses.getMyRandomData($scope.user_id,function(data)
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
 .factory('pickMyBUsinesses', ['$http','$q','config',function ($http,$q,config) {

 	//var id = document.getElementById("profile_id_keeper").value;
 	var mydata = [];

	var promissse =function(id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?My_businesses_picker='+id).
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		    //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		    //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(id,callback){
				promissse(id).then(function(data){
			//data =JSON.parse(data);
					//////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])
.controller('AddedBusinessCtrl', ['$scope','pickAddedBUsinesses','BusinessViewModel','config', function ($scope,pickAddedBUsinesses,BusinessViewModel,config) {


 $scope.businessModels = [];
 $scope.count =0;
 	pickAddedBUsinesses.getMyRandomData($scope.user_id,function(data)
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
.factory('pickAddedBUsinesses', ['$http','$q','config',function ($http,$q,config) {

 	//var id = document.getElementById("profile_id_keeper").value;
 	var mydata = [];

	var promissse =function(id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?Added_businesses_picker='+id).
		  then(function(response) {

		    deffered.resolve(response)
		  }, function(response) {

		    deffered.reject(response)
		  });
		  return deffered.promise;
	};
	return {
			getMyRandomData : function(id,callback){
					promissse(id).then(function(response){
						mydata=response.data;
						callback(response.data);

					},function(error){
						//////console.log("Error : ->",error);
					});

			}

	};
 }])
 .controller('FullUserCtrl', ['$scope','pickFullUSer','BusinessViewModel','config', function ($scope,pickFullUSer,BusinessViewModel,config) {

 	$scope.rowcount=0;
 	$scope.businessModels=[];

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

	

angular.element(document).ready(function(){
	
           ////alert("buddido");




			////alert("buddy man");
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


 	pickFullUSer.getMyRandomData($scope.user_id,function(data)
 	{
			//$scope.sexify();
			////alert("bussy");
 		$scope.fullUser= data;
 		$scope.rowCollection =[];
 		$scope.rrowCollection =[];
 		$scope.rrrowCollection =[];

		$scope.photo_count =$scope.fullUser.photo_count;
 		$scope.review_number =$scope.fullUser.review_count;
 		$scope.follower_number=$scope.fullUser.follower_count;

 		//////console.log("The number of reviews is -=====>", $scope.review_number);
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

 		angular.forEach($scope.fullUser.friends,function(value,key)
 		{
 			$scope.friend =value;
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


 		//////console.log("friends are"+$scope.fullUser.friends);

		var a = $scope.fullUser.friends;
			while(a.length) {
			    $scope.twotwoFriends.push(a.splice(0,2));
			}


		 ////////console.log("friends are"+$scope.fullUser.friends);
		 //////console.log("arrays are"+$scope.twotwoFriends);
		 //splitted into two
 		//////console.log("the buddy count ="+$scope.friendsCount);
 		//////console.log("the row count ="+$scope.rowcount);
 		$scope.currenttwotwofriend =[];

 		for(var i=0;i<$scope.rowcount; i++)
 		{
 			$scope.rowCollection[i]="row"+i;
 		}
 		//////console.log("the rows are ="+$scope.rowCollection);

 		$scope.friend_requests=[];
 		angular.forEach($scope.fullUser.friend_requests,function(value,key)
 		{
 			$scope.friend_request = value;
 			if($scope.friend_request == null || $scope.friend_request =='')
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
 		////////console.log("the rows are ="+$scope.rowCollection);

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

	$scope.send_friend_request = function(sender_id,reciever_id)
 	{

 				$.get(config.BaseURL+"classes/util.php?sender_id="+sender_id+"&reciever_id="+reciever_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.friendtoggle=1;



 	}

 	$scope.unfriend_person = function(chucker_id,chucked_id)
 	{
 				$.get(config.BaseURL+"classes/util.php?chucker_id="+chucker_id+"&chucked_id="+chucked_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.friendtoggle=0;



 	}


 	$scope.accept_request = function(user_id,friend_id,date_created)
	{
		//id=iid;
		////alert(id);
		$scope.postReview(friend_id,user_id,0,0,date_created,"friends");
		$.get(config.BaseURL+"classes/util.php?acceptor_id="+user_id+"&requestor_id="+friend_id,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////alert("results magigiasn are"+results);
				  	$("#friend_"+friend_id).hide();


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
						//////console.log(errorMessage); // Optional
					}
					});

			}
		
	    $scope.details="";
	}


 $scope.toggle_profile_page=function(id)
 {
 	////alert(id);

 	switch(id) {
	    case 'wall_tab':
	        ////alert('kekyo wall');
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
	        ////alert('kekyo friends');
	        break;
	    case 'reviews_tab':
	       // //alert('kekyo reviews');
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
	        ////alert('kekyo favourites');
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
	        ////alert('kekyo ad_manager');
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
	        ////alert('kekyo mybusiness');
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
	        ////alert('kekyo photos');
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
	        ////alert('kekyo business');
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
	        ////alert('kekyo  volimba kyenyinio');
	}



 }


 










 }])
 .factory('pickFullUSer', ['$http','$q','config',function ($http,$q,config) {
 	//var id = document.getElementById("profile_id_keeper").value;
 	var mydata = [];

	var promissse =function(id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?my_profile_data_picker_id='+id).
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		    ////alert(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(id,callback){
				promissse(id).then(function(data){
			//data =JSON.parse(data);
					////////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])
 .controller('PostCtrl', ['$scope', function ($scope) {

 	$scope.defpic ="http://localhost:89//yammzit/admin/Theme/uploads/capture.png";

	$scope.uploadFile = function(){
	               var file = $scope.myFile;

	              // //////console.log('file is ' ,file);
	               //console.dir(file);

	               var uploadUrl = 'http://localhost:89//yammzit/Yammz/classes/util.php?';
	               fileUpload.uploadFileToUrl(file, uploadUrl);

	};


 	document.getElementById('inputfile').onchange=function(e)
	{

		////////console.log('my event is ',e);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.picture=e.target.result;
       				 });


                   // //////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}



 }])
 .factory('follow', ['config',function (config) {


 	return {
 		followItem: function(item_type,user_id,item_id)
		{

				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});



		}

 	};
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

		////////console.log('my event is ',e);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.picture=e.target.result;
       				 });


                   // //////console.log("scope picutre is ->",$scope.businessobject.picture);
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
        //console.log(attrs);
        //console.log(attrs.backImg);
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
.factory('searchBusiness', ['$http','$q', function($http,$q){


	var promissse =function(searchvalue,user_id,business_id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?search_id='+id).
		  then(function(response) {
		    
		    deffered.resolve(response)
		  }, function(response) {
		    
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(business_id,callback){
				promissse(business_id).then(function(data){
			//data =JSON.parse(data);
					////////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
.controller('ClaimFullBusinessCtrl', ['$scope','config','pickCountries','pickCities','CountryViewModel','CityViewModel','pickCategories','getTimes','pickFullBusiness','pickSearchResults', function($scope,config,pickCountries,pickCities,CountryViewModel,CityViewModel,pickCategories,getTimes,pickFullBusiness,pickSearchResults){
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
		 accepts_credit_card:document.getElementById('accepts_credit_card').value,
		 take_reservation:document.getElementById('take_reservation').value,
		 good_for_children:document.getElementById('good_for_children').value,
		 good_for_dancing: document.getElementById('good_for_dancing').value,
		 good_for_groups: document.getElementById('good_for_groups').value,
		 take_away:document.getElementById('take_away').value,
		 delivery:document.getElementById('delivery').value,
		 music :document.getElementById('music').value,
		 outdoor_seating:document.getElementById('outdoor_seating').value,
		 has_pool_table:document.getElementById('has_pool_table').value,
		 waiter_service:document.getElementById('waiter_service').value,
		 happy_hour:document.getElementById('happy_hour').value,
		 best_night:document.getElementById('best_night').value,
		 alcohol:document.getElementById('alcohol').value,
		 has_tv:document.getElementById('has_tv').value



		//services
		

	}

	document.getElementById('inputbanner').onchange=function(e)
	{

		////////console.log('my event is ',e);
		$scope.logo_toggle=1;
		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.cover_photo=e.target.result;
       				 });


                   // //////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}
	document.getElementById('inputlogo').onchange=function(e)
	{
		$scope.logo_toggle=1;
		//console.log('my event is ',e.target.files);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.logo=e.target.result;
           						//console.log("target ->",e.target.result);
       				 });


                  // console.log("scope logo is ->",$scope.businessobject.logo);
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
						//alert(response);
						var mybusiness_id =response;
						window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness_id;

					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
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

	

	
	//console.log($scope.bizSearchValue);

	$scope.search_resultsFunction = function(user_id)
	{
		//
		//$scope.isset_by_biz=0;
		$scope.bizSearchValue=document.getElementById('biz_search_value').value;
		//console.log("buddy==>",$scope.bizSearchValue);
		$scope.businesses =[];
			return pickSearchResults($scope.bizSearchValue,user_id,function(data)
			{		//////console.log("the results is==>",data);
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
					console.log("The searched businesses are:=>",$scope.businesses);

					angular.forEach($scope.businesses,function(value,key)
					{
						$scope.businesss =value;
						$("#resultshere").append("<label  style='margin-top:10px; ' onclick='update("+$scope.businesss.id+",\""+$scope.businesss.name+"\")'><a class='redbright' style='text-decoration:none' >&nbsp;&nbsp;"+$scope.businesss.name+"&nbsp;&nbsp;&nbsp;&nbsp;"+$scope.businesss.address+"</a></label><hr style='height:1px; margin-top:-5px; background-color:#E9EAEE;'></hr>");

					});
					

				return $scope.businesses;
			});
	};

	window.update=function(id,name)
	{	//alert(id);

		console.log("istilee have",$scope.businesses);
		angular.forEach($scope.businesses,function(value,key)
		{
			$scope.mybiz = value;
			if($scope.mybiz.id == id)
			{
				$scope.current_business_id = id;
				////alert(id);
			}

		});
		
		document.getElementById('biz_search_value').value=name;
		//$("#resultshere").innerHTML="";
		document.getElementById('resultshere').innerHTML="";
		//alert($scope.current_business_id);

		pickFullBusiness.getMyRandomData($scope.current_business_id,function(data)
		{



		 		$scope.FullBusiness = data;
		 		//console.log("lalalal the business is",$scope.FullBusiness);
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
		 		
		 		
		 		
		 		//console.log("the rows are ="+$scope.rowCollection);


		 	});

	}


	angular.element(document).ready(function(){

		$scope.countryModels=[];
 		pickCountries.getMyData(function(data)
 		{

 			$scope.RawCountries = data;
 			console.log("The countries are",$scope.RawCountries);
 			angular.forEach($scope.RawCountries,function(value,key)
 			{
 				$scope.RawCountry = value;
 				$scope.countryModel = new CountryViewModel();
				$scope.countryModel.id = $scope.RawCountry['id'];
				$scope.countryModel.name = $scope.RawCountry['name'];
				$scope.countryModel.country_code= $scope.RawCountry['code'];

				pickCities.getMyData($scope.countryModel.id,function(data){
					$scope.RawCities = data;
					$scope.countryModel.cities = data
				});


				this.push($scope.countryModel);



 				
 			},$scope.countryModels);

 			//console.log("The countries are",$scope.countryModels);

 	});
 		//working hours

 			//only use it to get services
 			console.log("The business_id is=>",$scope.business_id);
 			console.log("The user_id is=>",$scope.user_id);
 			getTimes.getFullBusinessClaim($scope.business_id,$scope.user_id,function(data)
 			{
 				$scope.fullClaim = data;
 				console.log("The fullClaim  is=>",$scope.fullClaim);


 				console.log("The credit card accept  is=>",$scope.fullClaim.other_accepts_credit_card);

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

 				console.log($scope.businessServices);
 				// $scope.workinghours = [


 				//  {'value':0,'name':'12:00 AM'},
				 // {'value':1,'name':'12:30 AM'},
				 // {'value':2,'name':'1:00 AM'}];


 			}); // will try it next time

 			//for now working hours.
 			$scope.workinghours = getTimes.getWorkingTimes();
 			console.log("The working hours are",$scope.workinghours);

 });

$scope.updateCities = function(country_id)
{
		pickCities.getMyData(country_id,function(data)
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
	pickCategories.getMyData(function(data)
	{
		$scope.RawCategories = data;
		console.log("the raw category models are==>",$scope.RawCategories);

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




}]).controller('EditFullBusinessCtrl', ['$scope','config','pickCountries','pickCities','CountryViewModel','CityViewModel','pickCategories','getTimes','pickFullBusiness', function($scope,config,pickCountries,pickCities,CountryViewModel,CityViewModel,pickCategories,getTimes,pickFullBusiness){

	////alert("tigidi");

	$scope.businessobject =
	{
		name : '',
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

		address : '',
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


		document.getElementById('input_banner').onchange=function(e)
	{

		////////console.log('my event is ',e);
		$scope.logo_toggle=1;
		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.my_cover_photo=e.target.result;
       				 });


                   // //////console.log("scope picutre is ->",$scope.businessobject.picture);
            };

            reader.readAsDataURL(e.target.files[0]);
        }

	}
	document.getElementById('input_logo').onchange=function(e)
	{
		$scope.logo_toggle=1;
		//console.log('my event is ',e.target.files);

		if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();


            reader.onload = function (e) {
            	// //////console.log('my event mikemdd is ',e);
            	 		$scope.$apply(function () {
           						$scope.businessobject.my_logo=e.target.result;
           						//console.log("target ->",e.target.result);
       				 });


                  // console.log("scope logo is ->",$scope.businessobject.logo);
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
						//alert(response);
						var mybusiness_id =response;
						window.location.href=config.BaseURL+"business_page_owners_view.php?current_business_id="+mybusiness_id;
	
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
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
						////alert(response);
						var mybusiness_id =response;
						window.location.href=config.BaseURL+"business_page_3.php?current_business_id="+mybusiness_id;
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});

	


	}

		//coutnries and cities


angular.element(document).ready(function(){


		pickFullBusiness.getMyRandomData($scope.business_id,function(data)
		 {

		 		$scope.FullBusiness = data;
		 		console.log("lalalal the business is",$scope.FullBusiness);
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
 		pickCountries.getMyData(function(data)
 		{

 			$scope.RawCountries = data;
 			//console.log("The countries are",$scope.RawCountries);
 			angular.forEach($scope.RawCountries,function(value,key)
 			{
 				$scope.RawCountry = value;
 				$scope.countryModel = new CountryViewModel();
				$scope.countryModel.id = $scope.RawCountry['id'];
				$scope.countryModel.name = $scope.RawCountry['name'];
				$scope.countryModel.country_code= $scope.RawCountry['code'];

				pickCities.getMyData($scope.countryModel.id,function(data){
					$scope.RawCities = data;
					$scope.countryModel.cities = data
				});


				this.push($scope.countryModel);



 				
 			},$scope.countryModels);

 			//console.log("The countries are",$scope.countryModels);

 		});
 		//working hours

 			//only use it to get services
 			console.log("The business_id is=>",$scope.business_id);
 			console.log("The user_id is=>",$scope.user_id);
 			getTimes.getFullBusinessClaim($scope.business_id,$scope.user_id,function(data)
 			{
 				$scope.fullClaim = data;
 				console.log("The fullClaim  is=>",$scope.fullClaim);


 				console.log("The credit card accept  is=>",$scope.fullClaim.other_accepts_credit_card);

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

 				console.log($scope.businessServices);
 				// $scope.workinghours = [


 				//  {'value':0,'name':'12:00 AM'},
				 // {'value':1,'name':'12:30 AM'},
				 // {'value':2,'name':'1:00 AM'}];


 			}); // will try it next time

 			//for now working hours.
 			$scope.workinghours = getTimes.getWorkingTimes();
 			console.log("The working hours are",$scope.workinghours);

 });
 			// $scope.workinghours = [{'value':0,'name':'12:00 AM'},
				// {'value':1,'name':'12:30 AM'},
				// {'value':2,'name':'1:00 AM'}];


 		//working hours

 		
 	

 	

	$scope.updateCities = function(country_id)
	{
		pickCities.getMyData(country_id,function(data)
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
	pickCategories.getMyData(function(data)
	{
		$scope.RawCategories = data;
		console.log("the raw category models are==>",$scope.RawCategories);

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
					////////console.log('myowndata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
			});


		}

		
	};
}]).controller('FullBusinessCtrl',['$scope','config','pickFullBusiness','pickCountries','pickCities','CountryViewModel','CityViewModel', function ($scope,config,pickFullBusiness,pickCountries,pickCities,CountryViewModel,CityViewModel) {

angular.element(document).ready(function(){
	pickFullBusiness.getMyRandomData($scope.business_id,function(data)
 	{

 		$scope.FullBusiness = data;
 		//console.log("lalalal the business is",$scope.FullBusiness);
 		if($scope.FullBusiness.business.banner=="" || $scope.FullBusiness.business.banner==null)
 		{
 			$scope.FullBusiness.business.banner = config.BaseImageURL+"uploads/defbanner.png";

 		}else
 		{
 			$scope.FullBusiness.business.banner = config.BaseImageURL+$scope.FullBusiness.business.banner;
 		}
 		//photoscount
 		$scope.photo_count =$scope.FullBusiness.photo_count;
 		//photos
 		$scope.photo_names = [];
 		angular.forEach($scope.FullBusiness.photos,function(value,key)
 		{
 			$scope.currentphoto = value;

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
 		//console.log("the rows are ="+$scope.rowCollection);


 	});


 		



});//




   // $scope.business_id=0;
	$scope.addtoFavourites = function(item_type,user_id,business_id)
	{
        
		$.get(config.BaseURL+"classes/util.php?add_to_favourites="+item_type+"&user_id="+user_id+"&business_id="+business_id,function(results){
					////alert(results);
					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});
		$scope.favouritetoggle=1;
		$scope.postFavfollowReview(business_id,user_id,0,0,"add_to_favourite",$scope.date_created,"add_to_favourites");
		

	}
	$scope.followItem = function(item_type,user_id,item_id)
 	{
 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					 	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=1;
				$scope.postFavfollowReview(item_id,user_id,0,0,"follow_business",$scope.date_created,"add_to_followed");

 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id)
 	{


 		//////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=0;

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
						//alert(response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});

			}

		
	    $scope.details="";
	}

 	$scope.postReview=function(business_id,user_id,rating,pricing,date_created,details)
	{
		var image = $scope.myFile;

		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if(image !=null){
			
					////alert(val);
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
						$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});
					
					// $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&good="+rating+"&cost="+pricing+"&details="+details+"&business_id="+business_id,function(results){
						
					// 			$("#posters").prepend(results);

					// });
			
		}else if(image==null)
		{
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
						$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});

			}

		}
	    $scope.details="";
	}

	$scope.postAddPhotoReview=function(business_id,user_id,rating,pricing,date_created,details,image)
	{
		//alert('tigidi');
		//var image = $scope.myFile;
		//alert(image);


		if($scope.user_id = $scope.FullBusiness.owner_id)
		{
			var kind ="business_photo";
			//alert('tigidi the kind is==>'+ kind);
		}else
		{
			var kind ="add_photo";
			//alert('tigidi the kind are hahah==>'+ kind);
		}


		
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		if(image !=null){
			
					////alert(val);
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
						//alert("The response is==>" + response);
						$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						////console.log(); // Optional
						//alert("The error is==>"+errorMessage);
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
		//angular.element('#file_attach').triggerHandler('click');
		


	}



 
 	$scope.uploadBusinessFile=function (uploader_id,business_id,input) {
 		//$scope.photos=[];
 		//////console.log('input is ----->',input.files[0]);
 		$scope.photo_names = [];

		if (input.files && input.files[0]) {

		    var blobFile =input.files[0];
		    var fd = new FormData();
		    fd.append("fileToUpload", blobFile);
		    fd.append("uploader_id",uploader_id);
		    fd.append("business_id",business_id);

		    $.ajax({
		       url: "classes/util.php",
		       type: "POST",
		       data: fd,
		       processData: false,
		       contentType: false,
		       success: function(response) {
		       		////alert(response);
		       		$scope.photonames= JSON.parse(response);

		       		angular.forEach($scope.photonames,function(value,key)
				 		{
				 			$scope.photoname = value;
				 			if($scope.photoname != null || $scope.photoname !='')
				 			{
				 				$scope.photoname=config.BaseImageURL+$scope.photoname;
				 			}else
				 			{
				 				$scope.photoname=config.BaseImageURL+"uploads/capture.png";
				 			}

				 			this.push($scope.photoname);

				 		},$scope.photo_names);
		       		window.foo = $scope.photo_names;
		       		//////console.log($scope.photo_names);
		       		$scope.$apply();
		           // .. do something
		       },
		       error: function(jqXHR, textStatus, errorMessage) {
		           //////console.log(errorMessage); // Optional
		       }
		    });
		   // $scope.postAddPhotoReview(business_id,uploader_id,0,0,$scope.date_created,"photo_posting");


		}
		$scope.postAddPhotoReview(business_id,uploader_id,0,0,$scope.date_created,"photo_posting",blobFile);

		// $.get(config.BaseURL+"classes/util.php?uploader_id="+uploader_id+"&business_id="+business_id,function(results){

		// 			//alert(results);	  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		// });

	}

  $scope.rate = 0;
  $scope.price =0;
  $scope.max = 5;
  $scope.isReadonly = false;

  $scope.clicked = function(value) {

 	 //alert($scope.overStar);
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

  


$scope.rateBusiness=function(businessid,user_id)
{

	 setTimeout(function() {

	 	pricing=$scope.price;
	 	rating =$scope.rate;
        var business_id =businessid;
		//var kind = "review";
		if(rating==0 && pricing==0)
		{
			rating=-1;
			pricing=-1;
		}
		////alert("buddy am rating");
		////alert("bu "+businessid);
		////alert("user  "+user_id);
		////alert("rate "+rating);
		////alert("pri "+pricing);
	  
	        ////alert(val);
	    $.get(config.BaseURL+"classes/util.php?current_user_id="+user_id+"&good="+rating+"&cost="+pricing+"&business_id="+business_id+"&transaction=business_rating",function(results){
				 
						$("#posters").prepend(results);

				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
		});
	 

    },4000);

		
	   
}
$scope.setRate = function(rate,businessid,user_id)
{
	$scope.rate =rate;
	$scope.rateBusiness(businessid,user_id);

}
$scope.setPrice=function(price,businessid,user_id)
{
	$scope.price = price;
	//alert("this is the price"+$scope.price);
	$scope.rateBusiness(businessid,user_id);
	
}




}])
.factory('pickFullBusiness', ['$http','$q','config', function($http,$q,config){
	//var id = document.getElementById("business_id_keeper").value;
 	var mydata = [];

	var promissse =function(id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+'classes/util.php?business_profile_picker_id='+id).
		  then(function(response) {
		    // this callback will be called asynchronously
		    // when the response is available
		   // //////console.log("mukwano");
		   // //////console.log(response);
		    deffered.resolve(response)
		  }, function(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		   // //////console.log("mukwano");
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(id,callback){
			//console.log('my hahahaha business_id =',id);
				promissse(id).then(function(data){
			//data =JSON.parse(data);
					//console.log('myBusinessdata =',data.data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
.controller('SearchCtrl', ['$scope','pickSearchResults','config', function($scope,pickSearchResults,config){
	 var searchvalue =document.getElementById("searchinput").value;
	 var user_id =document.getElementById("idinput").value;

	 //////console.log("hmm",document.getElementById("searchinput").value);

	$scope.user_id=user_id;
	//////console.log("useerrrrrsinesseseeeeeeeeeeeeeee are cmon =>",user_id);
		$scope.businesses=[];
		$scope.search_resultsFunction = function()
		{
			return pickSearchResults(searchvalue,user_id,function(data)
			{		//////console.log("the results is==>",data);
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

					return data;
			});
		};

		$scope.search_resultsFunction();




	$scope.followItem = function(item_type,user_id,item_id,isfollowed)
 	{
 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){

					//	//alert(results);
				});



 	}

	$scope.unfollowItem = function(item_type,user_id,item_id,isfollowed)
	{
		//first check if you already followed item.

		//////console.log('the user_id is',$scope.user_id,user_id)
				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					// the output of the response is now handled via a variable call 'results'
						////alert("results butty are"+results);
			});
			isfollowed="false";



	}
	






}])

.factory('pickSearchResults', ['$http','$q','config', function($http,$q,config){

	//
	// var id =document.getElementById("user_id_keeper").value;
	 ////////console.log("the searchvalue is ===>"+searchvalue);


	 var filter = 'business';


	 var promissse = function(searchvalue,id){
		 var deffered = $q.defer()
		 $http.get(config.BaseURL+"classes/util.php?search="+searchvalue+"&searcher_id="+id).
			 then(function(response) {

				 //////console.log("SearchResults are=>",response);
				 deffered.resolve(response)
			 }, function(response) {

				 deffered.reject(response)
			 });
			 return deffered.promise;
	 };
	 return function(searchvalue,id,callback) {
		 //getMyRandomData : function(callback){
				 promissse(searchvalue,id).then(function(data){

					// mydata=data.data;
					 callback(data.data);
	 		 		},function(error){
					 //////console.log("Error : ->",error);
				 });

		 //}

	 };

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
        		//alert(data);
    	});

 	}
 	$scope.unlikeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		$scope.like =0;
 		$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        		//alert(data);
    	});

 	}

 	// $scope.likeNFItem=function(user_id,newsfeed_id)
 	// {
 	// 	$scope.like =1;
 	// 	$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
  //       		////alert(data);
  //       		$scope.nflikeNo =data;
  //       		//alert($scope.nflikeNo);
  //   	});

 	// }
 	// $scope.unlikeNFItem=function(user_id,newsfeed_id)
 	// {
 	// 	$scope.like =0;
 	// 	$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
  //       		////alert(data);
  //       		$scope.nflikeNo =data;
  //       		//alert($scope.nflikeNo);
  //   	});

 	// }


 })
 .controller('UserWallFeedsCtrl',['$scope','pickUserWallFeeds','newsfeedViewModel','config','ngDialog',function ($scope,pickUserWallFeeds,newsfeedViewModel,config,ngDialog) {
   
   $scope.UserMyWallFeeds=[];

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

    //about rates andpricsa


  //angular.element(document).ready(function(){


$scope.$watch('[user_id,picker_type,picker_business_id]',function(){

	////console.log("The picker type beforwe is :===>",$scope.picker_type);
    ////console.log("The user_id  beforde is :===>",$scope.user_id);
    ////console.log("The picker_business_id  beforde is :===>",$scope.picker_business_id);


  	pickUserWallFeeds.getMyRandomData($scope.user_id,$scope.picker_type,$scope.picker_business_id,function(data)
   	{
   		////console.log("The picker type is :===>",$scope.picker_type);
   		////console.log("The user_id is :===>",$scope.user_id);
   		$scope.UserWallFeeds =data;
   		//console.log("The udata is :===>",data);
   		angular.forEach($scope.UserWallFeeds,function(value,key)
   		{
   			$scope.UserWallFeed = value;
   			////console.log("the feed kind -s ==>",$scope.UserWallFeed.kind);
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
			$scope.finalFeedViewModel.user_name=$scope.UserWallFeed.user.first_name+" "+$scope.UserWallFeed.user.last_name;
			$scope.finalFeedViewModel.business_id=$scope.UserWallFeed.business.id;
			$scope.finalFeedViewModel.business_name=$scope.UserWallFeed.business.name;
			$scope.finalFeedViewModel.date_created=$scope.UserWallFeed.date_created;
			$scope.finalFeedViewModel.kind=$scope.UserWallFeed.kind;
			$scope.finalFeedViewModel.business_owner_id=$scope.UserWallFeed.business.owner_id;
			$scope.businessIsFolFav($scope.finalFeedViewModel.business_id,$scope.user_id,'is_followed',function(data)
			{
				$scope.finalFeedViewModel.business_followed_by_me=data;
			});

			$scope.businessIsFolFav($scope.finalFeedViewModel.business_id,$scope.user_id,'is_favourite',function(data)
			{
				$scope.finalFeedViewModel.business_followed_by_me=data;
			});

			$scope.finalFeedViewModel.business_address=$scope.UserWallFeed.business.address;
			if($scope.UserWallFeed.photo !== null || $scope.UserWallFeed.photo !== undefined || $scope.UserWallFeed.photo !=='')
			{
				$scope.finalFeedViewModel.photo=config.BaseImageURL+$scope.UserWallFeed.photo;	
				//////console.log("The  actual photo is ",$scope.UserWallFeed.photo);
			}
			if($scope.UserWallFeed.business.banner != null || $scope.UserWallFeed.business.banner != undefined)
			{
				$scope.finalFeedViewModel.business_photo=config.BaseImageURL+$scope.UserWallFeed.business.banner;	
				//////console.log("The  actual photo is ",$scope.UserWallFeed.photo);
			}
			$scope.finalFeedViewModel.rate=$scope.UserWallFeed.good;
			$scope.finalFeedViewModel.price=$scope.UserWallFeed.cost;
			$scope.finalFeedViewModel.details=$scope.UserWallFeed.details;
			$scope.mycoms=$scope.myFeedComments.reverse();
			angular.forEach($scope.mycoms,function(value,key)
			{
				////console.log("my comment is==>",value);
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

				// $scope.businessIsFolFav($scope.finalFeedViewModel.business_id,$scope.user_id,'is_followed',function(data)
				// {
				// 	$scope.finalFeedViewModel.inner_business_followed_by_me=data;
				// });

				// $scope.businessIsFolFav($scope.finalFeedViewModel.business_id,$scope.user_id,'is_favourite',function(data)
				// {
				// 	$scope.finalFeedViewModel.inner_business_followed_by_me=data;
				// });

				$scope.finalFeedViewModel.inner_feed = $scope.UserWallFeed.inner_feed;
			}


   			this.push($scope.finalFeedViewModel);



   		},$scope.UserMyWallFeeds);
   		


   });
  	}
  );
$scope.businessIsFolFav=function(business_id,follower_id,transaction,callback)
{
	$.get(BaseURL+"classes/util.php?business_id="+business_id+"&follower_id="+follower_id+"&transaction="+transaction,function(data){
        	////alert(data);
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
        	//alert(data);
   		});

    }

   $scope.postComment=function(user_id,feed_id,details,date_created,type)
	{
		////alert("gone");
		//var details = document.getElementById("content"+feed_id).value;
		var kind ="normal";
		var commentTo = 0;

		if (details != "") {
	        ////alert(val);
	        $.get(BaseURL+"classes/util.php?comment_user_id="+user_id+"&date_created="+date_created+"&kind="+kind+"&feed_id="+feed_id+"&commentTo="+commentTo+"&details="+details,function(results){
				  // the output of the response is now handled via a variable call 'results'
				  	////alert("results are"+results);
				  	if(type=='r'){
				  	$("#commentors"+feed_id).append(results);
				  		$scope.details="";
				  		document.getElementById("content"+feed_id).value="";
				  	}else if(type=='rp')
				  	{
				  		$("#pcommentors"+feed_id).append(results);
				  		//$scope.details="";
				  		document.getElementById("rpcontent"+feed_id).value="";
				  	}else if(type=='nf')
				  	{
				  		$("#nfcommentors"+feed_id).append(results);
				  		document.getElementById("nfcontent"+feed_id).value="";
				  	}
				  	else if(type=='ab')
				  	{
				  		$("#abcommentors"+feed_id).append(results);
				  		document.getElementById("abcontent"+feed_id).value="";
				  	}
				  	else if(type=='ra')
				  	{
				  		$("#racommentors"+feed_id).append(results);
				  		document.getElementById("racontent"+feed_id).value="";
				  	}
				  	else if(type=='ap')
				  	{
				  		$("#apcommentors"+feed_id).append(results);
				  		document.getElementById("apcontent"+feed_id).value="";
				  	}
				  	else if(type=='sr')
				  	{
				  		$("#srcommentors"+feed_id).append(results);
				  		document.getElementById("srcontent"+feed_id).value="";
				  	}
				  	else if(type=='sad')
				  	{
				  		$("#sadcommentors"+feed_id).append(results);
				  		document.getElementById("sadcontent"+feed_id).value="";
				  	}
				  	else if(type=='sfol')
				  	{
				  		$("#sfolcommentors"+feed_id).append(results);
				  		document.getElementById("sfolcontent"+feed_id).value="";
				  	}
				  	else if(type=='sfav')
				  	{
				  		$("#sfavcommentors"+feed_id).append(results);
				  		document.getElementById("sfavcontent"+feed_id).value="";
				  	}
				  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
			});
	    }
	    

	}



 	$scope.likeItem=function(user_id,comment_id,newsfeed_id)
 	{

 		$scope.like =1;
 		$.get(BaseURL+"classes/util.php?liked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        		//alert(data);
    	});

 	}
 	$scope.unlikeItem=function(user_id,comment_id,newsfeed_id)
 	{
 		$scope.like =0;
 		$.get(BaseURL+"classes/util.php?unliked_comment_id="+comment_id+"&user_id="+user_id+"&newsfeed_id="+newsfeed_id,function(data){
        		//alert(data);
    	});

 	}

 	$scope.likeNFItem=function(user_id,newsfeed_id)
 	{
 		angular.forEach($scope.UserMyWallFeeds,function(value,key)
 		{

 			var currentfeed =value;
 			if(currentfeed.id==newsfeed_id)
 			{
 				////alert("am liking this feed");
 				currentfeed.likeToggleValue=1;
 				$.get(BaseURL+"classes/util.php?liked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        			////alert(data);
        			var datafig = data;
        			currentfeed.likeNo=parseInt(datafig);
        			$scope.$apply();
        			////alert(currentfeed.likeNo);
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
 				////alert("this is the feed");
 				currentfeed.likeToggleValue=0;
 				$.get(BaseURL+"classes/util.php?unliked_newsfeed_id="+newsfeed_id+"&user_id="+user_id,function(data){
        				////alert(data);
        			
        			currentfeed.likeNo=parseInt(data);
        			$scope.$apply();
        			////alert(currentfeed.likeNo);
    			});
 			}

 		});

 	}

 	$scope.followItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.
 		//alert('loloofo');
 		//////console.log('the user_id is',$scope.user_id,user_id)
 		if(item_type=='business'){
 				//$scope.postFFReview(item_id,user_id,0,0,'business_follow',$scope.date_created,"following business");
 				$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=1;
				//alert($scope.toggle);
				$scope.postFavfollowReview(item_id,user_id,0,0,"follow_business",$scope.date_created,"add_to_followed");

		}else
		{
			$.get(config.BaseURL+"classes/util.php?follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				//$scope.toggle=1;

		}

		//$scope.tocken=1;
		//document.getElementById("followUnfollow").innerHTML="Unfollow"



 	}

 	$scope.unfollowItem = function(item_type,user_id,item_id)
 	{
 		//first check if you already followed item.
 			/*//alert('unfo');
 			//alert(item_type);
 			//alert(user_id);
 			//alert(item_id);*/
 		//////console.log('the user_id is',$scope.user_id,user_id)
 				$.get(config.BaseURL+"classes/util.php?un_follow_item="+item_type+"&user_id="+user_id+"&item_id="+item_id,function(results){
					  // the output of the response is now handled via a variable call 'results'
					  	////alert("results butty are"+results);


					  	//window.location.href="http://localhost:89//yammzit/Yammz/business_page_3.php?current_business_id="+mybusiness.id;
				});
				$scope.toggle=0;
				$scope.$apply();
				//alert($scope.toggle);

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
						//alert(response);
						//$("#posters").prepend(response);
					},
					error: function(jqXHR, textStatus, errorMessage) {
						//////console.log(errorMessage); // Optional
					}
					});

			}

		
	    $scope.details="";
	}



 }]).value('newsfeedViewModel', newsfeedViewModel)
 .factory('pickUserWallFeeds', ['$http','$q','config',function($http,$q,config){
	//var id = document.getElementById("business_id_keeper").value;
 	var mydata = [];

	var promissse =function(user_id,picker_type,business_id){
		var deffered = $q.defer()
		$http.get(config.BaseURL+"classes/util.php?user_wall_feeds_picker_id="+user_id+"&picker_type="+picker_type+"&picker_business_id="+business_id).
		  then(function(response) {
		   
		    deffered.resolve(response)
		  }, function(response) {
		   
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(user_id,picker_type,business_id,callback){
                                             //////console.log(user_id+"kale"+picker_type+"kalepicker"+business_id+"kalebusiness");
				promissse(user_id,picker_type,business_id).then(function(data){
			//data =JSON.parse(data);
					//////console.log("mydata is actually ==>",data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
}])
 .controller('RandomPeopleCtrl', ['$scope','pickRandomPeople','config', function($scope,pickRandomPeople,config){

 	$scope.people_to_follow=[];
 	$scope.BaseImageURL=config.BaseImageURL;
 	pickRandomPeople.getMyRandomData(function(data)
 	{
 		$scope.people = data;
 		angular.forEach($scope.people,function(value,key)
 		{
 			$scope.person =value;
 			if($scope.person.user.avatar=="" || $scope.person.user.avatar==null )
 			{
 				$scope.person.user.avatar=config.BaseImageURL+'uploads/defavatar.png';
 			}else if($scope.person.user.avatar.startsWith('http'))
 			{
 				$scope.person.user.avatar=$scope.person.user.avatar;
 			}else
 			{
 				$scope.person.user.avatar =config.BaseImageURL+$scope.person.user.avatar;
 			}

 			this.push($scope.person);

 		},$scope.people_to_follow);
 		

 	});
 	
 }]).factory('pickRandomPeople', ['$http','$q','config', function($http,$q,config){


 	var promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+"classes/util.php?random_people=random").
		  then(function(response) {
		   
		    deffered.resolve(response)
		  }, function(response) {
		   
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};



	return {
		getMyRandomData : function(callback){
                 //////console.log(user_id+"kale"+picker_type+"kalepicker"+business_id+"kalebusiness");
				promissse().then(function(data){
			//data =JSON.parse(data);
					//////console.log("mydata is actually ==>",data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }]).factory('CountryService', ['$http','$q', function($http,$q){


 	var country_promissse =function(){
		var deffered = $q.defer()
		$http.get(config.BaseURL+"classes/util.php?random_people=random").
		  then(function(response) {
		   
		    deffered.resolve(response)
		  }, function(response) {
		   
		    deffered.reject(response)
		  });
		  return deffered.promise;
	};

	var city_promise = function(){


	};



	return {
		getMyRandomData : function(callback){
                 //////console.log(user_id+"kale"+picker_type+"kalepicker"+business_id+"kalebusiness");
				promissse().then(function(data){
			//data =JSON.parse(data);
					//////console.log("mydata is actually ==>",data);
					mydata=data.data;
					callback(data.data);

				},function(error){
					//////console.log("Error : ->",error);
				});

		}

	};
 }])

.constant('config', {
        // BaseURL: 'http://yammzit.com/',
         //BaseImageURL :'http://yammzit.com/admin/Theme/'

        BaseURL: 'http://localhost:89//yammzit/Yammz/',
        BaseImageURL :'http://localhost:89//yammzit/admin/Theme/'

 })



