<div class="panel panel-default noborderStyle">					
	<div class="panel-body"style="padding-left:40px;">
		&nbsp;
		
		<a type="button" ng-if="my_business_status=='Deactivated'" ng-href="claim_business.php?current_business_id={{FullBusiness.business.id}}" class="btn btn-default btn-block btn-primary"  style="background-color:#BE2633; padding-top:15px; border-radius:10px; border-color:#BE2633; height:70px; width:280px">
			<span ><img src="images/icon_files_white/claim business icon.png" width="40px"/></span>&nbsp;&nbsp;
			<span style="font-size:14px; color:#E5DDDD; padding-top:20px;"><B>Claim your business</B> </span>
		</a>

		<a type="button" ng-if="my_business_status == 'Pending'" ng-href="business_approve3.php?current_business_id={{FullBusiness.business.id}}" class="btn btn-default btn-block btn-primary"  style="background-color:#BE2633; padding-top:15px; border-radius:10px; border-color:#BE2633; height:70px; width:280px">
			<span ><img src="images/icon_files_white/claim business icon.png" width="40px"/></span>&nbsp;&nbsp; 
			<span style="font-size:14px; color:#E5DDDD; padding-top:20px;"><B>Pending Admin Approval</B> </span>
		</a>

		<h6></h6>
		
		<p style="margin-left:50px;">Do you work here?</p>
	</div>
</div>