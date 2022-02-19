<aside>
     <!-- recent post -->
     <div class="recent-post"> 
     	<div class="card">
     		<h2 class="c-title">Recent Post</h2>

     	<?php 

               $post_query = "SELECT * FROM posts ORDER BY p_id DESC LIMIT 4";
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

                    <div class="d-flex c-item">
                         <div class="f-basis-30 cp-img">
                              <img src="admin/assets/images/posts/<?php echo $p_thumbnail;?>" class="square-img" style="border-right: 6px">
                         </div>
                         <div class="f-basis-70 cp-detail">
                              <a href="single.php?post_id=<?php echo $p_id;?>" class="d-block"><?php echo $p_title;?></a>
                              <a href="" style="font-size: 12px;"><i class="fa fa-book"></i>
                                   <?php 
                                    find_name('c_name','category','cat_id',$p_cat);
                                   ?> 
                              </a>
                              <a style="font-size: 12px;"><i class="fa fa-user"></i>

                                <?php 

                                    $cmnt_query2 = "SELECT * FROM cmnts WHERE post_id='$p_id'";
                                    $res2 = mysqli_query($db, $cmnt_query2);

                                    $total_comments = mysqli_num_rows($res2);

                                    if($total_comments != 0){
                                        echo $total_comments;
                                    }else{
                                        echo 'No Comnts!';
                                    }

                                ?>

                              </a>
                         </div>
                    </div>

                    <?php
               }


          ?>
          

       </div>
     </div>
     <!-- recent post -->
     <div class="recent-post">
     	<div class="card">
     		<h2 class="c-title">Recent Comments</h2>

                <?php 

                    $cmnt_query = "SELECT * FROM cmnts ORDER BY cmnt_id DESC LIMIT 4";
                    $res = mysqli_query($db, $cmnt_query);
                    while($row = mysqli_fetch_assoc($res)){
                        $cmnt_id        = $row['cmnt_id'];
                        $cmnt_author    = $row['cmnt_author'];
                        $post_id        = $row['post_id'];
                        $cmnt_date      = $row['cmnt_date'];
                        $cmnts_details  = $row['cmnts_details'];
                        ?>

                <div class="d-flex c-item">
                    <div class="f-basis-30 cp-img">

                        <?php 
                            $img_name = find_img('p_thumbnail','posts', 'p_id', $post_id);
                        ?>

                        <img src="admin/assets/images/posts/<?php echo $img_name;?>" class="square-img" style="border-right: 6px">
                    </div>
                    <div class="f-basis-70 cp-detail">
                        <a href="single.php?post_id=<?php echo $post_id;?>"><?php 

                            if(strlen($cmnts_details) > 40){
                                echo substr($cmnts_details, 0,40).'..';
                            }else{
                                echo $cmnts_details;
                            }

                        ?></a>
                        <br>
                            <a><i class="fa fa-clock"></i><?php echo $cmnt_date;?></a>
                    </div>
                </div>

                        <?php
                    }

                ?>

             	

       </div>
     </div>
     <!-- categories -->
     <div class="recent-post">
          <div class="card">
               <h2 class="c-title">Categories</h2>

               <?php 

                    $read_query = "SELECT * FROM category";
                    $result8 = mysqli_query($db,$read_query);
                    // $count_post = 0;
                    while($row = mysqli_fetch_assoc($result8)){
                        $cat_id         = $row['cat_id'];
                        $c_name         = $row['c_name'];
                        $c_desc         = $row['c_desc'];
                        $c_status       = $row['c_status'];
                        $is_parent      = $row['is_parent'];
                        $parent_id      = $row['parent_id'];


                        // read no of posts for a specific category
                        $no_of_posts = "SELECT * FROM posts WHERE p_cat='$cat_id'";
                        $result = mysqli_query($db,$no_of_posts);
                        $count_post = mysqli_num_rows($result);

                        ?>

                        <!-- item start -->
                         <div class="d-flex justify-between">
                              <a class="m-0" href="archive.php?cat_id=<?php echo $cat_id;?>"><?php echo $c_name;?></a>
                              <span>(<?php echo $count_post;?>)</span>
                         </div>
                         <!-- item end -->

                        <?php
                    }

               ?>
               
          </div>
     </div>
     </aside>