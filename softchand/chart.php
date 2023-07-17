<?php
include 'partials/header.php';
include 'partials/sidebar.php';
include 'partials/footer.php';
include 'partials/connection.php';

$sql = "SELECT * FROM adminusers";
$result = mysqli_query($con, $sql);
while($row=mysqli_fetch_array($result)){
    $dataPoints[] = array("label"=>$row['username'], "y"=>$row['pro']);
}
	
?>
<!DOCTYPE HTML>
<html>
<head> 
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Administrators Completed No Of Projects"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc
		// indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>       