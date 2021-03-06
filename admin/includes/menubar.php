<!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>



          <?php 

          if($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 1){
            ?>

            <li class="nav-item nav-category">Posts Management</li>

              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="ui-basic">
                  <i class="menu-icon mdi mdi-floor-plan"></i>
                  <span class="menu-title">Posts</span>
                  <i class="menu-arrow"></i> 
                </a>
                <div class="collapse" id="posts">
                  <ul class="nav flex-column sub-menu" style="background-color: transparent;">
                    <li class="nav-item"> <a class="nav-link" href="posts.php?do=Add">Add New</a></li>
                    <li class="nav-item"> <a class="nav-link" href="posts.php?do=Manage">View All</a></li>
                    <li class="nav-item"> <a class="nav-link" href="category.php">Category</a></li>
                    
                  </ul>
                </div>
              </li>

            <?php
          }
          if($_SESSION['user_role'] == 2){

            ?>

            <li class="nav-item nav-category">Users Management</li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu" style="background-color: transparent;">
                <li class="nav-item"> <a class="nav-link" href="users.php?do=Add">Add New</a></li>
                <li class="nav-item"> <a class="nav-link" href="users.php?do=Manage">View All</a></li>
              </ul>
            </div>
            
          </li>

          <li class="nav-item nav-category">Comments Section</li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Comments</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="comment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="comments.php">View All</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Settings</li>

          <li class="nav-item">
            <a href=""></a>
          </li>

            <?php
          }

          ?>
        </ul>
      </nav>