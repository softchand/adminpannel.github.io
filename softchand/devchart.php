<?php
 include 'partials/header.php';
 include 'partials/sidebar.php';
 include 'partials/footer.php';
 include 'partials/connection.php';
 
 $sql = "SELECT * FROM developers";
 $result = mysqli_query($con, $sql);
 while($row=mysqli_fetch_array($result)){
     $dataPoints1[] = array("label"=>$row['username'], "y"=>$row['pro']);
     $dataPoints2[] = array("label"=>$row['username'], "y"=>$row['procust']);
 
// $dataPoints1[] =
//     	array("label"=> "2010", "y"=> 36.12),
//     	array("label"=> "2011", "y"=> 34.87),
//     	array("label"=> "2012", "y"=> 40.30),
//     	array("label"=> "2013", "y"=> 35.30),
//     	array("label"=> "2014", "y"=> 39.50),
//     	array("label"=> "2015", "y"=> 50.82),
//     	array("label"=> "2016", "y"=> 74.70);
//     $dataPoints2[] = 
//     	array("label"=> "2010", "y"=> 64.61),
//     	array("label"=> "2011", "y"=> 70.55),
//     	array("label"=> "2012", "y"=> 72.50),
//     	array("label"=> "2013", "y"=> 81.30),
//     	array("label"=> "2014", "y"=> 63.60),
//     	array("label"=> "2015", "y"=> 69.38),
//     	array("label"=> "2016", "y"=> 98.70);
 }
 ?>
	
<!DOCTYPE HTML>
<html>
<head>  
    <style>
        /* canvas.canvasjs-chart-canvas {
    width: 70%;
    height: 350px;
} */
    </style>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "No Of Projects Completed by Developers, With Per Project Cost"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Project Completed",
		indexLabel: "{y}",
		yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Per Project Cust",
		indexLabel: "{y}",
		yValueFormatString: "",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer1" ></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>            