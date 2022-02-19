<?php 
  include "header.php";
?>
   <!-- masonry
   ================================================== -->
   <section id="bricks">

    <?php 

      if(isset($_GET['cat_id'])){
        $category_id=$_GET['cat_id'];
        ?>
          <div class="row masonry">

      <!-- brick-wrapper -->
         <div class="bricks-wrapper">

          <div class="grid-sizer"></div>

          
          <?php 


          $post_query2 = "SELECT * FROM posts WHERE p_cat='$category_id' ORDER BY p_id DESC";
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
                          <a href="#">
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
          <span class="page-numbers prev inactive">Prev</span>
        <span class="page-numbers current">1</span>
        <a href="#" class="page-numbers">2</a>
          <a href="#" class="page-numbers">3</a>
          <a href="#" class="page-numbers">4</a>
          <a href="#" class="page-numbers">5</a>
          <a href="#" class="page-numbers">6</a>
          <a href="#" class="page-numbers">7</a>
          <a href="#" class="page-numbers">8</a>
          <a href="#" class="page-numbers">9</a>
        <a href="#" class="page-numbers next">Next</a>
        </nav>

    </div>
        <?php
      }else{
        ?>
        <div class="row">
          <div class="alert">
            <span>No Post Found!</span>
            <a href="index.php">Go to HomePage!</a>
          </div>
        </div>
        <?php
      }

    ?>

   </section> <!-- end bricks -->

   
<?php 
  include "footer.php";
?>