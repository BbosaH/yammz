<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>

<body>
	<form>
	<input type="text" id="enddate" value="1465547119" />
	</form>
	<script type="text/javascript">
		// var currentTime = new Date()
		// var datess = document.getElementById("enddate").value;

		// var hours = currentTime.getHours()
		// var minutes = currentTime.getMinutes()
		// var relDate = ('0' + currentTime.getDate()).slice(-2) + '/' + ('0' + (currentTime.getMonth() + 1)).slice(-2) + '/' + currentTime.getFullYear() + ' ' + ('0' + currentTime.getHours()).slice(-2) + ':' + ('0' + currentTime.getMinutes()).slice(-2);

		// if (minutes < 10){
		//   minutes = "0" + minutes;
		// }
		// var suffix = "AM";
		// if (hours >= 12) {
		// suffix = "PM";
		// hours = hours - 12;
		// }
		// if (hours == 0) {
		// hours = 12;
		// }
		// // $datumUhrzeit = substr($currentTime, 0, strpos($currentTime, '('));
		// // $resultDate = date('Y-m-d h:i:s', strtotime($currentTime));
		// //echo $datumUhrzeit;
		// var timestamp =Math.round(currentTime.getTime()/1000);

		// document.write("current Time: "+relDate+"<br>" + hours + ":" + minutes + " " + suffix + "</b><br/>");


		// function getDateDiff(time1, time2) {
		// 	var diff=time1-time2;
		// 	var df2=new Date(diff)
		// 	return df2;
		// }
		// alert(getDateDiff(datess,timestamp));



		var today = new Date();
		var end_daate = new Date("06-10-2016 18:30");
		var diffMs = (end_daate - today); // milliseconds between now & Christmas
		var diffDays = Math.round(diffMs / 86400000); // days
		// var diffHrs = Math.round((diffMs % 86400000) / 3600000); // hours
		var diffHrs = Math.round((diffMs % 86400000) / 3600000)-1; // hours
		var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes
		// alert("Today is:"+today);
		alert("Today is:"+today+diffDays + " days, " + diffHrs + " hours, " + diffMins + " minutes until");

	</script>
</body>
</html>
