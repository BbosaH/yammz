<p><B><label>SOCIAL MEDIA</label></B></p>

<div ng-if="fullUser.user.facebook_link.length">							
<label >facebook</label>
<br/>
<a  href="{{fullUser.user.facebook_link }}" class="redbright" style="text-decoration:none;">{{fullUser.user.facebook_link }}</a>
<br/>
<br/>
</div>

<div ng-if="fullUser.user.twitter_link.length">
	<label>twitter</label>
	<br/>
	<a href="{{fullUser.user.twitter_link }}" class="redbright" style="text-decoration:none;">{{fullUser.user.twitter_link }}</a>
	<br/>
	<br/>
</div>

<div ng-if="fullUser.user.instagram_link.length">
	<label>instagram</label>
	<br/>
	<a href="{{fullUser.user.instagram_link }}" class="redbright" style="text-decoration:none;">{{fullUser.user.instagram_link }}</a>
	<br/>
	<br/>
</div>
<div ng-if="fullUser.user.youtube_link.length">
	<label>youtube</label>
	<br/>
	<a href="{{fullUser.user.youtube_link }}" class="redbright" style="text-decoration:none;">{{fullUser.user.youtube_link }}</a>
</div>