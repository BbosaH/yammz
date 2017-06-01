<?php
 session_start();
  ?>
<div class="dialog-contents" >
    
    <!-- <input type="button" value="OK" ng-click="checkInput() && closeThisDialog('Some value')"/> -->
    <!-- <input type="hidden" ng-model="user_id" ng-init="user_id='<?php  echo $_SESSION['SESS_MEMBER_ID']; ?>'" /> -->
     <!-- <input type="hidden" ng-model="ngDialogData.picker_type"  /> --> {{ngDialogData.picker_type}} {{ngDialogData.user_id}} {{ngDialogData.item_type}} {{ngDialogData.item_id}} 
     <!-- <input type="hidden" ng-model="picker_type" ng-init="picker_type='home'" /> -->
     <h4 class="redbright">Share item with </h4>

     <hr style="height:2px; width:400px; background:#d2d2d2; margin-left: 3px;  "></hr>	

     		<span> 
				<?php
				
				$title=urlencode("title of newsfeed");
				$url=urlencode('http://yammzit.com/');
				$summary=urlencode("details of the news feed");
				$image=urlencode('http://yammzit.com/');
				?>
						
				<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" class = "btn btn-default " style="width:110px; background-color:#ffffff; border:0px;" role = "button">
					<img src="images/icons/facebook.png"  width="60px" height="20px"/>
				</a>
			</span>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <span>
				
				
				<a class = "btn btn-default " style="width:110px; background-color:#95E4E8; border:0px;" href='https://plus.google.com/share?url=https://yammzit.com.com' role = "button">
					<img src="images/icons/twitter_image.jpg" width="60px" height="20px" alt="Twitter"/>
				</a>
				
				
			 </span>
			 &nbsp
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 <a class = "btn btn-default  redbright" href = "" ng-click="shareAll(ngDialogData.user_id,ngDialogData.item_id,ngDialogData.item_type)" role = "button" style="border:0px;">
				<span style="color:#BD2532;"><B>Yammz it</B> &nbsp 
					<img src="images/icons/yammz_logo.png" width="20px" height="20px"/>
				</span>
			</a>
</div>