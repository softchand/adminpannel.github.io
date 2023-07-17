<?php 
include('partials/connection.php');
include('partials/header.php');
include('partials/footer.php');
include ('partials/sidebar.php');
$sql ="SELECT developers.id, developers.username, developers.email, developers.mobile, developers.pro, developers.procust, category.name as cat FROM developers JOIN category on developers.cat = category.id";

$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)) ;
}
print_r($row);                     
?>
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
    .pusher{
      margin : 20px 0px 0px 250px;
    }
    @media only screen and (max-width: 768px){
      .pusher{
      margin : 20px 0px 0px 0px;
    }
    
  }
  </style>
 <div class="ui pusher">
      <div class="ui container main-content ">
        <a  class="ui blue button right btn-sm" href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="user icon"></i> Add Developer Details</a>
        
        <div class="ui hidden divider"></div>
            <table id="example" class="ui table">
              <thead>
                <th>Id</th>
                <th>Developers Name </th>
                <th>Developers Email</th>
                <th>Mobile</th>
                <th>Project Completed</th>
                <th>Per Project Cost</th>
                <th>Category</th>
                <th>Options</th>
              </thead>
              <tbody>
              </tbody>
            </table>
          
    </div>
  </div>
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [5]
          },

        ]
      });
    });
    $(document).on('submit', '#addUser', function(e) {
        debugger;
      e.preventDefault();
      var cat = $('#addCatField').val();
      var pro = $('#addProField').val();
      var procust = $('#addProCustField').val();
      var username = $('#addUserField').val();
      var mobile = $('#addMobileField').val();
      var email = $('#addEmailField').val();
      if (cat != '' && pro != '' && procust != '' && username != '' && mobile != '' && email != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            cat: cat,
            pro: pro,
            procust: procust,
            username: username,
            mobile: mobile,
            email: email
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $(document).on('submit', '#updateUser', function(e) {
        debugger;
      e.preventDefault();
      //var tr = $(this).closest('tr');
      var cat = $('#catField').val();
      var pro = $('#proField').val();
      var procust = $('#procustField').val();
      var username = $('#nameField').val();
      var mobile = $('#mobileField').val();
      var email = $('#emailField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (cat != '' && pro != '' && procust != '' && username != '' && mobile != '' && email != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            cat: cat,
            pro: pro,
            procust: procust,
            username: username,
            mobile: mobile,
            email: email,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
            //   table.cell(parseInt(trid) - 1,0).data(id);
            //   table.cell(parseInt(trid) - 1,1).data(username);
            //   table.cell(parseInt(trid) - 1,2).data(email);
            //   table.cell(parseInt(trid) - 1,3).data(mobile);
            //   table.cell(parseInt(trid) - 1,4).data(pro);
            //   table.cell(parseInt(trid) - 1,5).data(procust);
            //   table.cell(parseInt(trid) - 1,6).data(cat);
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
            //   row.row("[id='" + trid + "']").data([id, username, email, mobile, pro, procust, cat, button]);
              row.row("[id='" + trid + "']").data([id, username, email, mobile, pro, procust, cat, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#nameField').val(json.username);
          $('#emailField').val(json.email);
          $('#mobileField').val(json.mobile);
          $('#proField').val(json.pro);
          $('#procustField').val(json.procust);
          $('#catField').val(json.cat);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });

    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateUser">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nameField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="emailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="mobileField" class="col-md-3 form-label">Mobile</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="mobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="proField" class="col-md-3 form-label">Project Completed</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="proField" name="pro">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="procustField" class="col-md-3 form-label">Per Project Cost </label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="procustField" name="procust">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="catField" class="col-md-3 form-label">Category</label>
              <div class="col-md-9">
              <?php
                    $sql_cat = mysqli_query($con, "SELECT * FROM category");
                    $rowcount = mysqli_num_rows($sql_cat);
                    ?>
                <select name="cat" id="catField" type="text" class="form-control">
                    <?php
                    for($i=1; $i<=$rowcount; $i++){
                        $row = mysqli_fetch_array($sql_cat);

                    
                    ?>
                <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
                <?php 
                    }
                ?>
                </select>
                <!-- <input type="text" class="form-control" id="catField" name="cat"> -->
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addUserField" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addEmailField" class="col-md-3 form-label">Email</label>
              <div class="col-md-9">
                <input type="email" class="form-control" id="addEmailField" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addMobileField" class="col-md-3 form-label">Mobile</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addMobileField" name="mobile">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addProField" class="col-md-3 form-label">Project Completed</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addProField" name="pro">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addProCustField" class="col-md-3 form-label">Per Project Cost</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="addProCustField" name="procust">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addCatField" class="col-md-3 form-label">Category</label>
              <div class="col-md-9">
              <?php
                    $sql_cat = mysqli_query($con, "SELECT * FROM category");
                    $rowcount = mysqli_num_rows($sql_cat);
                    ?>
                <select name="addCatField" id="addCatField" type="text" class="form-control">
                    <option value="">Select Category</option>
                    <?php
                    for($i=1; $i<=$rowcount; $i++){
                        $row = mysqli_fetch_array($sql_cat);
                    ?>
                <option value="<?php echo $row['id'] ?>" > <?php echo $row['name'] ?> </option>
                <?php 
                    }
                ?>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="ui hidden divider"></div><div class="ui hidden divider"></div>
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>