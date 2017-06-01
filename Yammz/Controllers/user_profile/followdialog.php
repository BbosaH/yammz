 <?php function follow($name) { ?>
 <div class="modal fade" id="follow_example">
	<div class="modal-dialog" role="modal">
	  <div class="modal-content">
		<div class="modal-header">
		 <!-- <button type="button" class="close" data-dismiss="modal"
				  aria-hidden="true">×</button> -->
		  <h4 class="modal-title"></h4>
		</div>
		<div class="modal-body">

                  <h4 class="redbright">You followed <?php echo $name; ?></h4>

				
			
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