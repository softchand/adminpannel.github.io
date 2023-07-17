<?php
 include 'partials/header.php';
 include 'partials/footer.php';
 include 'partials/sidebar.php';
 include 'partials/connection.php';
//  include 'chart.php';
 $sql = "SELECT * FROM `category`";
 $result = mysqli_query($con, $sql);
 ?>
 
<div class="ui pusher">
      <div class="ui main-content">
      <!-- <div id="chartContainer" ></div> -->
        <div class="ui grid stackable padded container">
          <div class="ui column">
          
            <table class="ui celled red table">
              <thead>
                <tr class="ui celled red">
                  <th colspan="5" class="ui celled red center aligned">
                  Toal No Of Project Framework Categories We Hendles In Our Company SOFTCHAND
                  </th>
                </tr>
                <tr>
                <th>Categories ID</th>   
                <th>Categories Name</th>
                
                </tr>
              </thead>
              <tbody>
              <?php while ($value = mysqli_fetch_array($result)){
                echo "<tbody class='ui'><tr>
                <td>".$value['id']." </td>
                <td>".$value['name']."</td>
            
            </tr></tbody>";
            }
            ?>
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
    </div>
    
 