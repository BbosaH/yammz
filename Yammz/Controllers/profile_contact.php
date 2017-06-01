<span style="font-size:23;color:#DDDDDD;margin-top:0px;" class="icon icon-three-dots-more-indicator pull-right"></span>
<div style="height:13px;"></div>
<div ng-if="fullUser.user.phone_number.length">
<p><B>PHONE NUMBER<B></p>
							
<h6>{{fullUser.user.phone_number}}</h6>
<hr></hr>
</div>

<div ng-if="fullUser.user.address.length">
<p>LOCATION</p>
<h6>
	{{fullUser.user.address}}
</h6>
<hr></hr>
</div>
<div ng-if="fullUser.user.email.length">
<p>Email</p>
<h6>{{fullUser.user.email}}</h6>
<hr></hr>
</div>

<!-- <p>WEB LINK</p>
<h6><a style="color:black;text-decoration:none;" href="http://yammzit.com">yammzit.com</a></h6> -->
	