<?php 
  include "header.php";
?>


<?php 
  
  $posts_pp       = 3; // no of posts per page
  $current_page   = 1; // current page no
  $starting       = 0; // starting point of posts for a specific page

  if(isset($_GET['pageno'])){
    // current page no
    $current_page = $_GET['pageno'];

    if($current_page == 1){
      $starting = 0;
    }
    else{
      // if page no is more than 1
      $starting = ($current_page-1) * $posts_pp;
    }
    
  }

?>



<section id="bricks">
    <div class="row masonry">

      <!-- brick-wrapper -->
         <div class="bricks-wrapper">

          <div class="grid-sizer"></div>


          <?php 

            if($current_page == 1){
              ?>
              <div class="brick entry featured-grid animate-this">
                <div class="entry-content">
                  <div id="featured-post-slider" class="flexslider">
                  <ul class="slides">

                    <?php 

                    
                    $post_query = "SELECT * FROM posts WHERE is_featured = '1' AND p_status = '0' ORDER BY p_id DESC LIMIT 3";
                    $result = mysqli_query($db,$post_query);
                    $count = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $p_id               = $row ['p_id'];
                        $p_title            = $row ['p_title'];
                        $p_desc             = $row ['p_desc'];
                        $p_thumbnail        = $row ['p_thumbnail'];
                        $p_author           = $row ['p_author'];
                        $p_cat              = $row ['p_cat'];
                        $p_date             = $row ['p_date'];
                        $p_tags             = $row ['p_tags'];
                        $p_status           = $row ['p_status'];
                        ?>

                        <li>
                          <div class="featured-post-slide">

                            <div class="post-background" style="background-image:url('admin/assets/images/posts/<?php echo $p_thumbnail;?>');"></div>

                            <div class="overlay"></div>           

                            <div class="post-content">
                              <ul class="entry-meta">
                                <li><?php echo $p_date;?></li> 
                                <li><a href="#" >by 
                                  <?php
                                  find_name('u_name','users','u_id',$p_author);
                                  ?>
                                    
                                  </a></li>        
                              </ul> 

                              <h1 class="slide-title"><a href="single.php?post_id=<?php echo $p_id;?>" title=""><?php echo $p_title;?></a></h1> 
                            </div>                      
                        
                          </div>
                        </li>

                        <?php
                      }
                    ?>
                  </ul> <!-- end slides -->
                </div> <!-- end featured-post-slider -->              
                </div> <!-- end entry content -->             
              </div>

              <?php
            }

          ?>


          <?php 


          $post_query2 = "SELECT * FROM posts WHERE is_featured = '0' AND p_status = '0' ORDER BY p_id DESC LIMIT $starting, $posts_pp";
          $result2 = mysqli_query($db,$post_query2);
          $count = 0;
          while($row = mysqli_fetch_assoc($result2)){
              $p_id               = $row ['p_id'];
              $p_title            = $row ['p_title'];
              $p_desc             = $row ['p_desc'];
              $p_thumbnail        = $row ['p_thumbnail'];
              $p_author           = $row ['p_author'];
              $p_cat              = $row ['p_cat'];
              $p_date             = $row ['p_date'];
              $p_tags             = $row ['p_tags'];
              $p_status           = $row ['p_status'];

              ?>

              <article class="brick entry format-standard animate-this">

                 <div class="entry-thumb">
                    <a href="single.php?post_id=<?php echo $p_id;?>" class="thumb-link">
                      <img src="admin/assets/images/posts/<?php echo $p_thumbnail;?>" alt="building">             
                    </a>
                 </div>

                 <div class="entry-text">
                    <div class="entry-header">

                      <div class="entry-meta">
                        <span class="cat-links">
                          <a href="archive.php?cat_id=<?php echo $cat_id;?>">
                            <?php 
                              find_name('c_name','category','cat_id',$p_cat);
                            ?> 
                          </a>                       
                        </span>     
                      </div>

                      <h1 class="entry-title"><a href="single.php?post_id=<?php echo $p_id;?>"><?php echo $p_title;?></a></h1>
                    </div>
                    <div class="entry-excerpt">
                      <?php echo substr($p_desc, 0, 220).'.....';?>
                      <a href="single.php?post_id=<?php echo $p_id;?>">Read More</a>
                    </div>
                 </div>
              </article> 


              <?php

              }

          ?>

         </div> <!-- end brick-wrapper --> 
    </div> <!-- end row -->
    <div class="row">
        <nav class="pagination">

          <?php 

            if($current_page == 1){
              ?>
                <a href="" class="page-numbers prev inactive">Prev</a>
              <?php
            }else{
              ?>
                <a href="index.php?pageno=<?php echo $current_page-1;?>" class="page-numbers prev">Prev</a>
              <?php
            }

          ?>

          
          <?php 

            $post_read_query = "SELECT * FROM posts WHERE is_featured = '0'";
            $query_res = mysqli_query($db, $post_read_query);
            $total_posts = mysqli_num_rows($query_res);

            $no_of_page = ceil($total_posts/$posts_pp);
            
            for($i=1; $i<=$no_of_page; $i++){
              ?>
                <a href="index.php?pageno=<?php echo $i;?>" class="page-numbers <?php if($current_page == $i) echo 'current';?>"><?php echo $i;?></a>
              <?php
            }

          ?>

            <!-- <a href="" class="page-numbers current">1</a> -->
            <?php 

                if($current_page == $no_of_page){
                ?>
                  <a href="" class="page-numbers next inactive">Next</a>
                  <?php
                }else{
                  ?>
                    <a href="index.php?pageno=<?php echo $current_page+1;?>" class="page-numbers next">Next</a>
                  <?php
                }

            ?>
        </nav>
    </div>
</section> <!-- end bricks -->

   
<?php 
  include "footer.php";
?>