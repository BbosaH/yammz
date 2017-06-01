var EventViewModel = function()
{
	var self = this;

	self.id = '';
	self.picture = '';
	self.title = '';
	self.start_date = '';
	self.end_date = '';
	self.interested_count = 0;

};


var ReviewModel =function()
{
	var self = this;
	self.id ='';
	self.person_id='';
	self.un_enc_person_id='';
	self.person_avatar='';
	self.business_picture='';
	self.person_name='';
	self.business_name='';
	self.business_id = '';
	self.likeToggleValue=0;
	self.content='';
	self.session_id ='';
	self.ratings =[];
	self.pricings =[];
	self.noratings =[];
	self.nopricings =[];
	self.photo="";
	self.rate=0;
	self.price=0;
	self.countt =1;
	self.business_owner_id='';
	self.date_created ='';
	self.myfeedComments =[];
	self.isLikedByUser=0;
	self.likeNo=0;
	self.comment_count=0;


};

var CommentViewModel = function()
{
	var self = this;
	self.id ='';
	self.parent_feed_id ='';
	self.person_name='';
	self.person_avatar='';
	self.content ='';
	self.isLikedByUser=0;
	self.date_created='';
	self.like_number=0;


};

/*ReviewModel.prototype= {
	// body...

};*/
var CategoryViewModel =function()
{
	var self = this;
	self.category_id='';
	self.categoryname = '';
  	self.category_icon='';
	self.businesses = null;
	self.sub_categories =null;

};

var GossipViewModel = function()
{
	var self =this;
	self.picture = '';
	self.title ='';
	self.details = '';
	self.date_of_post = '';
	self.interested_count= 0;

};

var CountryViewModel = function()
{
	var self =this;
	self.id ='';
	self.country_code ='';
	self.name ='';
	self.cities = [];


};

var CityViewModel = function()
{
	var self =this;
	self.id ='';
	self.name ='';


}
var SignUpModel = function()
{

	var self = this;
	self.fname ='';
	self.lname = '';
	self.city_id='';
	self.email = '';
	self.otheremail='';
	self.phonenumber = '';
	self.password = '';


}
var BusinessViewModel = function()
{
	var self = this;
	self.id='';
	self.un_enc_id='';
	self.name='';
	self.logo='';
	self.address= '';
	self.rating=0;
	self.pricing=0;
	self.isfollowed='';
	self.ratings =[];
	self.pricings =[];
	self.noratings =[];
	self.nopricings =[];
}

var SideAddViewModel = function()
{
	var self = this;
	self.id ='';
	self.enc_business_id = '';
	self.business_id = '';
	self.business_name ='';
	self.business_logo ='';
	self.details ='';
	self.image ='';
	self.title ='';

}

var MiddleAddViewModel=function()
{
	var self = this;
	self.id ='';
	self.business_name ='';
	self.business_logo ='';
	self.details ='';
	self.business_image ='';

}

var newsfeedViewModel = function()
{
	var self = this;
	self.id ='';
	self.user_avatar ="";
	self.user_id='';
	self.un_enc_user_id='';
	self.un_enc_business_id='';
	self.user_name="";
	self.business_id="";
	self.business_name="";
	self.business_photo="";
	self.business_address="";
	self.business_owner_id;
	self.date_created="";
	self.rate=0;
	self.price=0;
	self.details="";
	self.picker_type="";
	self.kind="";
	self.photo="";
	self.comments=[];
	self.ratings =[];
	self.pricings =[];
	self.noratings =[];
	self.nopricings =[];
	self.likeToggleValue=0;
	self.likeNo =0;
	self.inner_feed;
	self.inner_ratings =[];
	self.inner_pricings =[];
	self.inner_noratings =[];
	self.inner_nopricings =[];
	self.business_followed_by_me =0;
	self.business_favourite_by_me =0;
	self.inner_business_followed_by_me =0;
	self.inner_business_favourite_by_me =0;
	self.friend=null;
	self.comment_count=0;
}
