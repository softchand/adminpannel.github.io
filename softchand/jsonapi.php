<?php 
include 'partials/header.php';
include 'partials/sidebar.php';
?>
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
<body onload="getData()">
<div class="ui pusher">
<div class="ui container">
    <table class="ui table table-striped" id="userTable">
        <thead>
            <th>FName</th>
            <th>LName</th>
            <th>Age</th>
            <th>Email</th>
            <th>Gender</th>
        </thead>
<tbody class="ui" id="tbody">
<td></td>
</tbody>
    </table>
</div>
<script src="js/datatable.js"></script>
</div>

<div class="ui hidden divider"></div><div class="ui hidden divider"></div>
<?php include 'partials/footer.php' ?>
</body>
</html>