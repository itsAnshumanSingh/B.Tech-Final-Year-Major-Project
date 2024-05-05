<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var dataPoints = [];
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	zoomEnabled: true,
	title: {
		text: "Bitcoin Price - 2017"
	}, 
    axisX:{
        title: "time",
        gridThickness: 2,
        interval:2, 
        intervalType: "hour",        
        valueFormatString: "hh TT K", 
        labelAngle: -20
      },
	axisY: {
		title: "Price in USD",
		titleFontSize: 24,
		prefix: "$"
	},
	data: [{
		type: "line",
		yValueFormatString: "$#,##0.00",
		dataPoints: dataPoints
	}]
});
 
function addData(data) {
    console.log(data);
    jQuery.type(data );
    console.log(data.length );
	var dps = data.price_usd;
	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			y: new Date(data[i]['unix_timestamp(time)']),
			x: data[i][i]
		});
        
       console.log(data[i]['unix_timestamp(time)']);
	}
	chart.render();
}
 
$.getJSON("webapi", addData);
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>   