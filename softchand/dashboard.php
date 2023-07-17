<?php
 include 'partials/header.php';
 include 'partials/footer.php';
 include 'partials/sidebar.php';
 include 'partials/connection.php';
 include 'chart.php';
 $sql = "SELECT * FROM `adminusers`";
 $result = mysqli_query($con, $sql);
 ?>
 
<div class="ui pusher">
      <div class="ui main-content">
      <div id="chartContainer" ></div>
        <div class="ui grid stackable padded">
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
                    ?> Projects In Our Company SOFTCHAND.  
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <a href="developers.php" class="ui teal button">More Info</a>
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
                  <i class="icon user"></i>
                </div>
                <div class="header">
                  <div class="ui header green">
                  
                  <?php if($admin_total = mysqli_num_rows($result)){
                    echo $admin_total;
                  }
                  else{
                    echo "0";
                  }                  
                  ?>
                  </div>
                </div>
                <div class="meta">
                Administrators
                </div>
                <div class="description">
                Total Number Of Administrators Completing Projects In Our Company SOFTCHAND.
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <a href="administrators.php" class="ui green button">More Info</a>
                </div>
              </div>
            </div>
          </div>
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
                  $query = mysqli_query($con, "SELECT * FROM `developers`");
                    if($dev_total = mysqli_num_rows($query)){
                      echo $dev_total;

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
                 Total Number Of Good Developers Completing Projects In Our Company SOFTCHAND. 
                </div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                <a href="developers.php"  class="ui red button">More Info</a>
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
                Toal No Of Project Framework Categories We Hendles In Our Company SOFTCHAND.</div>
              </div>
              <div class="extra content">
                <div class="ui two buttons">
                  <a href="category.php" class="ui purple button">More Info</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
 