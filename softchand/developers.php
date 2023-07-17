<?php
 include 'partials/header.php';
 include 'partials/footer.php';
 include 'partials/sidebar.php';
 include 'partials/connection.php';
//  include 'devchart.php';
$sql = "SELECT developers.id, developers.username, developers.email, developers.mobile, developers.pro, developers.procust, category.name as cat FROM developers JOIN category on developers.cat = category.id";
$result = mysqli_query($con, $sql);
$query = "SELECT username, pro*procust AS total_price FROM developers;"
 ?>
 
<div class="ui pusher">
      <div class="ui main-content">
      <!-- <div id="chartContainer" ></div> -->
        <div class="ui grid stackable padded">
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header red">
                  <i class="users icon "></i>
                </div>
                <div class="header">
                  <div class="ui red header">
                  <?php
                  
                    if($admin_total = mysqli_num_rows($result)){
                      echo $admin_total;

                    }
                    else{
                      echo "0";
                    }

                    
                    ?>
                  </div>
                </div>
                <div class="meta">
                Developers
                </div>
                <div class="description">
                 Total Number Of Developers Completing Projects
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                <a href="dashboard.php"  class="ui red button">More Info</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header green">
                  <i class="icon trophy"></i>
                </div>
                <div class="header">
                  <div class="ui header green">
                    <?php 
                    $total_project = mysqli_query($con, "SELECT sum(pro) FROM `developers`") or die(mysqli_error());
                    while($total_project_completed = mysqli_fetch_array($total_project)){
                      echo $total_project_completed['sum(pro)'];
                    }
                    ?>
                  </div>
                </div>
                <div class="meta">
                 Projects
                </div>
                <div class="description">
                All Developers are Completed Total Number Of Projests.
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                <a href="dashboard.php"  class="ui green button">More Info</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header teal">
                  <i class="icon briefcase"></i>
                </div>
                <div class="header">
                  <div class="ui teal header">
                  <?php 
                    $total_project = mysqli_query($con, "SELECT sum(pro*procust) FROM `developers`") or die(mysqli_error());
                    while($total_project_completed = mysqli_fetch_array($total_project)){
                      echo $total_project_completed['sum(pro*procust)'];
                    }
                    ?>
                  </div>
                </div>
                <div class="meta">
                  Total Cost 
                </div>
                <div class="description">
                  Total Cost Invested Till Now Sum Of All Developers for                     <?php 
                    $total_project = mysqli_query($con, "SELECT sum(pro) FROM `developers`") or die(mysqli_error());
                    while($total_project_completed = mysqli_fetch_array($total_project)){
                      echo $total_project_completed['sum(pro)'];
                    }
                    ?> Projects.  
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                <a href="dashboard.php" class="ui teal button">More Info</a>
                </div>
              </div>
            </div>
          </div>
          <div
            class="four wide computer eight wide tablet sixteen wide mobile column"
          >
            <div class="ui fluid card">
              <div class="content">
                <div class="ui right floated header purple">
                  <i class="icon certificate "></i>
                </div>
                <div class="header">
                  <div class="ui purple header">
                  <?php
                    $dash_category_query = "SELECT * FROM `category`";
                    $dash_category_query_run = mysqli_query($con, $dash_category_query);
                    if($category_total = mysqli_num_rows($dash_category_query_run)){
                      echo $category_total;

                    }
                    else{
                      echo "0";
                    }

                    
                    ?>
                  </div>
                </div>
                <div class="meta">
                  Category
                </div>
                <div class="description">
                Developers Aware Total Number Of Project Skill Categories.</div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                <a href="category.php" class="ui purple button">More Info</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="ui grid stackable padded container">
          <div class="ui column">
          
            <table class="ui celled red table">
              <thead>
                <tr class="ui celled red">
                  <th colspan="6" class="ui celled red center aligned">
                  Developers Personal Details Records According to Projects
                  </th>
                </tr>
                <tr>
                <th>Developer Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Projects Complete</th>
                <th>Per Project Cost</th>
                <th>Category</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($value = mysqli_fetch_array($result)){
                echo "<tbody class='ui'><tr>
                <td>".$value['username']." </td>
                <td>".$value['email']."</td>
                <td>".$value['mobile']."</td>
                <td>".$value['pro']."</td>
                <td>".$value['procust']."</td>
                <td>".$value['cat']."</td>
            
            </tr></tbody>";
            }
            ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="ui hidden divider"></div>
      </div>
    </div>
    
 