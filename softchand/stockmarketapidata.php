<?php
include 'partials/header.php';
include 'partials/sidebar.php';
$key= "demo";
$url= "https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY&symbol=IBM&interval=5min&apikey=demo".$key;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result, true);
$array = $result['Monthly Time Series'];
?>
<html>
<header>
<style>
    .pusher{
      margin : 100px 0px 0px 250px; 
    }
    @media only screen and (max-width: 768px){
      .pusher{
      margin : 20px 0px 0px 0px;
    }
}
</style>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css"> -->
</header>
<body>
<div class="ui pusher">
<div class="ui container ">
<div id="demo-output" style="margin-bottom: 1em;" class="chart-display"></div>
<h2> Realtime IBM Stock Market Record Month Wise</h2>
    <table class="ui table table-striped" id="recordsTable"><thead>
        <tr>
            <th>Month</th> 
            <th>open</th>
            <th>high</th>
            <th>low</th>
            <th>close</th>
            <th>Volume</th>

    </tr>
    </thead>
    <?php
    foreach($result['Monthly Time Series'] as $key=>$value){
    echo "<tbody class='ui' id='tbody'><tr>
    <td>".$key." </td>
        <td>".$value['1. open']." </td>
        <td>".$value['2. high']."</td>
        <td>".$value['3. low']."</td>
        <td>".$value['4. close']."</td>
        <td>".$value['5. volume']."</td>
    
    </tr></tbody>";
    }
    ?>
</table>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!-- <script>
    debugger;
    $(document).ready( function () {
        const table = $('#recordsTable').DataTable();
} );

    $datarecords =  <?php echo json_encode($records); ?>;
    console.log($datarecords);
    $.each($datarecords, function($key, $value){
    // foreach($datarecords as $key => $value){
        debugger;
        console.log($value)
     
    $('#recordsTable').DataTable({
        "data" : $datarecords,
        "columns": [
            {"data": $value['1. open']},
            {"data": $value['2. high']},
            {"data": $value['3. low']},
            {"data": $value['4. close']},
            {"data": $value['5. volume']}
        ]
        
    })
});

</script> -->

<!-- </body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script> -->

<div class="ui hidden divider"></div><div class="ui hidden divider"></div>
 <?php include 'partials/footer.php' ?>
</html>