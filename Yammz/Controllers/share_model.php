 <?php function share($title1,$url1,$summary1,$image1) { ?>
 <div class="modal fade" id="mdl_example">
	<div class="modal-dialog" role="modal">
	  <div class="modal-content">
		<div class="modal-header">
		 <!-- <button type="button" class="close" data-dismiss="modal"
				  aria-hidden="true">×</button> -->
		  <h4 class="modal-title">Yammz it sharing options</h4>
		</div>
		<div class="modal-body">
			<span> 
				<?php
				
				$title=urlencode($title1);
				$url=urlencode('http://yammzit.com/'.$url1);
				$summary=urlencode($summary1);
				$image=urlencode('http://yammzit.com/'.$image1);
				?>
						
				<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)" class = "btn btn-default img-responsive" role = "button">
					<img src="images/icons/facebook.png"  width="60px" height="20px"/>
				</a>
			</span>
			 &nbsp
			 <span>
				
				
				<a class = "btn btn-default img-responsive" href='https://plus.google.com/share?url=https://yammzit.com.com' role = "button">
					<img src="images/icons/google.png" width="60px" height="20px" alt="Google"/>
				</a>
				
				
			 </span>
			 &nbsp
			 <a class = "btn btn-default  redbright" href = "" role = "button">
				<span style="color:#BD2532;"><B>Yammz it</B> &nbsp 
					<img src="images/icons/yammz_logo.png" width="20px" height="20px"/>
				</span>
			</a>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-danger" data-dismiss="modal">
			Close
		  </button>
		  
		</div>
	  </div>
	</div>
  </div>
 <?php } ?>