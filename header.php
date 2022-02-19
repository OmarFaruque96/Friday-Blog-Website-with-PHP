<?php 
  
  include "admin/includes/connection.php";
  include "admin/includes/functions.php";

  session_start();

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

   <!--- basic page needs
   ================================================== -->
  <meta charset="utf-8">
  <title>Abstract</title>
  <meta name="description" content="">  
  <meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
   <link rel="stylesheet" href="css/main.css">
   
        

   <!-- script
   ================================================== -->
  <script src="js/modernizr.js"></script>
  <script src="js/pace.min.js"></script>

   <!-- favicons
  ================================================== -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

  <!-- header 
   ================================================== -->
   <header class="short-header">   

    <div class="gradient-block"></div>  

    <div class="row header-content">

      <div class="logo">
           <a href="index.php">Author</a>
        </div>

      <nav id="main-nav-wrap" style="margin-right: 32px">
        <ul class="main-navigation sf-menu">
          <li><a href="index.php" title="">All</a></li>

          <?php 

            $read_query = "SELECT * FROM category WHERE c_status = '0' ORDER BY c_name ASC";
            $result = mysqli_query($db,$read_query);

            while($row = mysqli_fetch_assoc($result)){
                $cat_id     = $row['cat_id'];
                $c_name     = $row['c_name'];
                $c_desc     = $row['c_desc'];
                $c_status   = $row['c_status'];
                ?>
                <li><a href="archive.php?cat_id=<?php echo $cat_id;?>" title=""><?php echo $c_name;?></a></li>
                <?php
            }

          ?>
          <!-- <li class="has-children current">
            <a href="category.html" title="">Categories</a>
            <ul class="sub-menu">
                  <li><a href="category.html">Wordpress</a></li>
                  <li><a href="category.html">HTML</a></li>
                  <li><a href="category.html">Photography</a></li>
                  <li><a href="category.html">UI</a></li>
                  <li><a href="category.html">Mockups</a></li>
                  <li><a href="category.html">Branding</a></li>
               </ul>
          </li>
          <li class="has-children">
            <a href="single-standard.html" title="">Blog</a>
            <ul class="sub-menu">
                  <li><a href="single-video.html">Video Post</a></li>
                  <li><a href="single-audio.html">Audio Post</a></li>
                  <li><a href="single-gallery.html">Gallery Post</a></li>
                  <li><a href="single-standard.html">Standard Post</a></li>
               </ul>
          </li> -->                  
        </ul>
      </nav> <!-- end main-nav-wrap -->

      <div class="search-wrap">
        
        <form role="search" method="GET" class="search-form" action="search.php">
          <label>
            <span class="hide-content">Search for:</span>
            <input type="search" class="search-field" placeholder="Type Your Keywords" value="" name="q" title="Search for:" autocomplete="off">
          </label>
          <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#" id="close-search" class="close-btn">Close</a>

      </div>

      <div class="triggers" style="margin-left: 32px;">
        <a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
        <a class="menu-toggle" href="#"><span>Menu</span></a>
      </div>

      <div class="login-logout">
        <?php 
          if(empty($_SESSION['u_id'])){

            ?>
            <a class="" href="admin/index.php" style="padding-bottom: 9px;color: #000;border: none;font-weight: 500;margin-left: 8px">
              Login
            </a>
            <?php
          }else{
            $user_id = $_SESSION['u_id'];
            $img_name = find_img('u_image','users','u_id',$user_id)
            ?>
            <nav id="" style="display: inline-block;">
              <ul class="main-navigation sf-menu">
                <li class="has-children current">
                  <a class="">
                    <img src="admin/assets/images/users/<?php echo $img_name;?>" class="make-circle">
                  </a>
                  <ul class="sub-menu">
                        <li><a href="admin/includes/logout.php">Logout</a></li>
                     </ul>
                </li>
              </ul>
            </nav>
            
            <?php
          }
        ?> 
      </div>

      

      
    </div>        
    
   </header> <!-- end header -->

