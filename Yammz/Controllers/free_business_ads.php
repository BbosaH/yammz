<div ng-controller="SideAddCtrl">

	<input type="hidden" ng-model="user_id"  ng-init="user_id='<?php echo $_SESSION['SESS_MEMBER_ID']; ?>'" />
	<input type="hidden" ng-model="country_id"  ng-init="country_id='<?php echo $_SESSION['SESS_COUNTRY_ID']; ?>'" />
		<div class="panel panel-default" style="border:none; border-radius:0px">
			<div class="panel-body">

						<div class="row">
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 ">
						<img ng-src="{{side_addModels[0].business_logo}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
					</div>
					<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 ">
					<!-- {{side_addModels[0]}} -->
						<a class="badblack" style="text-decoration:none" href="{{BaseURL}}business_page_free.php?current_business_id={{side_addModels[0].enc_business_id}}">{{side_addModels[0].business_name}}</a>
						<p class="grey">Sponsored</p>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 " style="padding-left:5px;" >
						<span class="pull-right" style="padding-top:10px;margin-right:6px;">
						  &nbsp; <span style="font-size:16px; color:#ECCB37" class="icon icon-add182" onclick="showModal()"></span>
						  <span style="font-size:10;color:#7D7D7D;"><br/>Follow</span>
						</span>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">

						<h6 style="padding-left:10px;">
							{{side_addModels[0].details}}
						</h6>
						<img ng-src="{{side_addModels[0].image}}" class="img-responsive" width="325px" height="180px" alt="Responsive image" style="border-radius:10px;" />
						<h3></h3>
					</div>
				</div>

				<span href="" style="color:#ACAEAE;font-weight:bold;font-size:12" class="pull-left" >Click to Find-out </span>
				<span href="" style="color:#EBEAEF;margin-right:6px;" class="badge badge-background pull-right" >View Profile </span>
				<br/>

					<div id="comment" class="collapse out">
						<div class="row">
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 ">
								<img src="images/profiles/right hand side 1.png" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
							</div>
							<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 ">

							</div>
						</div>
						<form class=" noborderStyle" role="form" action="Controllers/like.php" method="post" >

							<input type="text" class="form-control input-sm pull-right noborderStyle" style="height:30px;" id="comment"  name="comment" placeholder="Type your comment here ">
							<hr></hr>
						</form>

					</div>

			</div>

		</div>
		<div class="panel panel-default" style="border:none; border-radius:0px">
			<div class="panel-body">

						<div class="row">
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 ">
						<img ng-src="{{side_addModels[1].business_logo}}" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail">
					</div>
					<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 ">
							<a class="badblack" style="text-decoration:none" href="{{BaseURL}}business_page_free.php?current_business_id={{side_addModels[1].enc_business_id}}">{{side_addModels[1].business_name}}</a>
						<p class="grey">Sponsored</p>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 " style="padding-left:5px;" >
						<span class="pull-right" style="padding-top:10px;margin-right:6px;">
						  &nbsp; <span style="font-size:16px; color:#ECCB37" class="icon icon-add182" onclick="showModal()"></span>
						  <span style="font-size:10;color:#7D7D7D;"><br/>Follow</span>
						</span>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">

						<h6 style="padding-left:10px;">
							{{side_addModels[1].details}}
						</h6>
						<img ng-src="{{side_addModels[1].image}}" class="img-responsive" width="325px" height="180px" alt="Responsive image" style="border-radius:10px;" />
						<h3></h3>
					</div>
				</div>

				<span href="" style="color:#ACAEAE;font-weight:bold;font-size:12" class="pull-left" >Click to Find-out </span>
				<span href="" style="color:#F0F0F0; margin-right:6px;" class="badge badge-background pull-right" >View Profile </span>
				<br/>

					<div id="comment" class="collapse out">
						<div class="row">
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 ">
								<!-- <img src="images/profiles/right hand side 1.png" class="img-circle" style="width:50px;height:50px"  alt="Generic placeholder thumbnail"> -->
							</div>
							<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10 ">

							</div>
						</div>
						<form class=" noborderStyle" role="form" action="Controllers/like.php" method="post" >

							<input type="text" class="form-control input-sm pull-right noborderStyle" style="height:30px;" id="comment"  name="comment" placeholder="Type your comment here ">
							<hr></hr>
						</form>

					</div>

			</div>

		</div>
</div>
