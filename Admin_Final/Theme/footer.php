    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!-- DataTables JavaScript -->
    <script src="assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
  <script src="assets/js/zabuto_calendar.js"></script>  
  
  <script type="text/javascript">
        $(document).ready(function () {
          // var unique_id = $.gritter.add({
          //     // (string | mandatory) the heading of the notification
          //     title: 'Welcome to Dashgum!',
          //     // (string | mandatory) the text inside the notification
          //     text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
          //     // (string | optional) the image to display on the left
          //     image: 'assets/img/ui-sam.jpg',
          //     // (bool | optional) if you want it to fade out on its own or just sit there
          //     sticky: true,
          //     // (int | optional) the time you want it to be alive for before fading out
          //     time: '',
          //     // (string | optional) the class name you want to apply to that specific message
          //     class_name: 'my-sticky-class'
          // });

          return false;
        });
  </script>
  
  <script type="application/javascript">
        $(document).ready(function () {

            $('#dataTables-example').DataTable({
                responsive: true
            });

            $('#dataTables2').DataTable({
              responsive: true
            });

            var iconsDivLi = $(".iconsDiv li");
            iconsDivLi.off("click");
            iconsDivLi.on("click",function (e) {
              e.preventDefault();
              var className = $(this).attr("class");
              $(".iconsDivInput").val(className);
              return true;
            });

            var businessSelectionItem = $(".businessSelectionItem");
            businessSelectionItem.off("click");
            businessSelectionItem.on("click",function (e) {
              e.preventDefault();
              var id = $(this).attr("data-id");
              $("#business_id").val(id);
              var show = $(this).children()[0].innerHTML + " @ " + $(this).children()[1].innerHTML;
              $("#selectedBusiness").val(show);

              return true;
            });

            var searchIcon = $(".searchIcon");
            searchIcon.off("keyup");
            searchIcon.on("keyup",function (e) {
              var query = $(this).val();

              iconsDivLi.each(function(index, item){
                  var thisItem = $(item);
                  thisItem.removeClass("hideItemIcon");

                  var itemClass = thisItem.attr("class");
                  var dataPack = thisItem.attr("data-pack");
                  var tags = thisItem.attr("data-tags");
                  var found = false;

                  if(itemClass != null && itemClass.length > 0 && itemClass.lastIndexOf(query) > -1){
                    //console.log("itemClass", itemClass);
                    found = true;
                  }

                  if(dataPack != null && dataPack.length > 0 && dataPack.lastIndexOf(query) > -1 && found == false){
                    //console.log("dataPack", dataPack);
                    found = true;
                  }

                  if(tags != null && tags.length > 0 && found == false){
                    var tagsArray = tags.split(',');
                    for(var i=0; i<tagsArray.length;i++){
                      var str = tagsArray[i];
                      if(str.lastIndexOf(query) > -1){
                       // console.log("tagsArray", str);
                        found = true;
                      }
                    }
                  }

                  if(found == true){
                    thisItem.removeClass("hideItemIcon");
                  }else{
                    thisItem.addClass("hideItemIcon");
                  }

              });
              return true;
            });

            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
<?php
  ob_flush();
?>