<div class="row" >
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 " style="padding-right:0px;">
   <input type="hidden" ng-model="user_id" ng-init="user_id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>"/>
   <input type="hidden" ng-model="date_created" ng-init="date_created=<?php echo time()?>"/>
   <input type="hidden" ng-model="photo_toggle" ng-init="photo_toggle=0"/>

      <table >

        <tr style="padding-top:0px;">
          <td style="padding-top:0px;padding-bottom:5px;">

            <img ng-src="{{random_business.logo}}" class="img-circle img-responsive pull-left" style="width:40px;height:40px"  alt="Generic placeholder thumbnail Responsive image">
          </td>
          <td style="padding-left:8px;">

            <div ng-if="random_business.owner_id==user_id" style="font-size:14; font-weight:bold;width:210px; white-space: nowrap; overflow: hidden;  text-overflow:ellipsis;"><a class="badblack" style="text-decoration:none;" ng-href="{{BaseURL}}/business_page_owners_view.php?current_business_id={{random_business.id}}">{{random_business.name}}</a></div>

            <div ng-if="random_business.owner_id!=user_id" style="font-size:14; font-weight:bold;width:210px; white-space: nowrap; overflow: hidden;  text-overflow:ellipsis;"><a class="badblack" style="text-decoration:none;" ng-href="{{BaseURL}}/business_page_3.php?current_business_id={{random_business.id}}">{{random_business.name}}</a></div>
            
            <p class="simplegrey" style="font-size:10; width:210px;">{{random_business.address}}</p>

          </td>
          <td> </td>
          <td style="width:157px;"> </td>
          <td class="pull-right">
              <div>
              <span class="pull-left" style="padding-right:13px;"><img src="images/icons/arrow.png" style="width:6px;height:12px;" border="0" ng-click="pickRandomBiz()" /></span>
              <span class="pull-right" style="padding-right:13px;"><img src="images/icons/arrow 2.png" style="width:6px;height:12px;" border="0" ng-click="pickRandomBiz()" /></span>
              </div>
              <div style="height:35px;"></div>

          </td>


        </tr>
      </table>
      <table >
        <tr>
          <td style="padding-left:45px;" >
              <uib-rating class="redbright"  ng-model="rate" max="max" read-only="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null" titles="['one','two','three']" aria-labelledby="default-rating"></uib-rating>
              <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overStar && !isReadonly">{{overStar}}</span>
              <p><span style="font-size:10px;padding-left:2px;">&nbsp;&nbsp;Rate the business</span></p>
              <!-- <pre style="margin:15px 0;">Rate: <b>{{rate}}</b> - Readonly is: <i>{{isReadonly}}</i> - Hovering over: <b>{{overStar || "none"}}</b></pre> -->
          </td>
          <td style="padding-left:45px;" >
              <!-- <uib-rating class="redbright"  ng-model="price" max="max" read-only="isReadonly" on-hover="hoveringOverPrice(value)" on-leave="overPrice = null" titles="['one','two','three']" aria-labelledby="default-rating"></uib-rating> -->
              &nbsp;<uib-rating style="color:#00cc00;" ng-model="price" max="5" state-on="'ion-social-usd'" state-off="'ion-social-usd-outline'" read-only="isReadonly" on-hover="hoveringOverPrice(value)" on-leave="overPrice = null" titles="['one','two','three']" aria-labelledby="custom-icons-1"></uib-rating>
              <span class="label" ng-class="{'label-warning': percent<30, 'label-info': percent>=30 && percent<70, 'label-success': percent>=70}" ng-show="overPrice && !isReadonly">{{overPrice}}</span>
              <p><span style="font-size:10px;padding-left:2px;">price the business</span></p>
              <!-- <pre style="margin:15px 0;">Rate: <b>{{rate}}</b> - Readonly is: <i>{{isReadonly}}</i> - Hovering over: <b>{{overStar || "none"}}</b></pre> -->
          </td>


        </tr>
      </table>

  </div>

</div>
<div class="row" >

  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
    <form action="" method="post">

      </span>

      <span class="form-group">

        <textarea class="form-control" rows="2" ng-model="details" ng-init="details=''" id="user_post_details" style="margin-left:0px;background-color:#E9EAEE;height:100px;color:black; resize:none; border:none;border-radius: 0px;" placeholder="Write a review..."></textarea>
      </span>
      <div style="height:7px;"></div>

      <div class="row">
        <div class="col-md-1">
          <label id="image_attach" style="font-size:16px;margin-left:6px; cursor:pointer;margin-top:6px;" class="icon icon-camera" ng-click="upload_fille()"></label>
        </div>
        <div class="col-md-5">
          <span ng-show="photo_toggle==0  && details.length==0">
           <label style="font-size:11px;font-weight:bold;margin-left:-8px; margin-top:7px;">Attach a Photo to Post</label>
            <input type="file" id="random_biz_file_attach" style="width:80px;height:0px" name="random_biz_file_attach" class="hidden" file-model="myFile"  />
          </span>  

          <span ng-show="photo_toggle==1">
            <div class="row">
              <div class="col-md-8">
                <label style="font-size:11px;font-weight:bold;margin-left:-8px; margin-top:7px;">Photo Uploaded</label>
                <input type="file" id="random_biz_file_attach" style="width:80px;height:0px" name="random_biz_file_attach" class="hidden" file-model="myFile"  />&nbsp;
              </div>
              <div class="col-md-2">
                <i class="ion ion-checkmark-circled" style="color:#00cc00;margin-left:-45px;font-size:20px;margin-top:4px;"></i>
               </div>
             </div>
          </span> 
        </div>
        <div class="col-md-6">
          <span class="badge pull-right" style="background-color:#CB525B;margin-top:3px;" >
          
              <!-- <postbutton></postbutton> -->
            <button type="button" ng-disabled="details.length==0 && photo_toggle==0" class='post_review' value="post_business" post-random-feed style="background-color:#CB525B; height:15px;border:0px;" businessid="{{random_business.un_enc_id}}" userid="{{user_id}}" randrate="{{rate}}" randprice="{{price}}" randdate="{{date_created}}" randdetails={{details}} page="home_" >Post review</button>
          </span>
        </div>
      </div>
    </form>
  </div>
</div>
