<?php 
  include "header.php";
?>
   

   <!-- content
   ================================================== -->
<section id="content-wrap" class="blog-single">

   	<?php 
   		if(isset($_GET['post_id'])){

   				$post_id = $_GET['post_id'];
   				$post_id2 = $_GET['post_id'];
   				$post_query3 = "SELECT * FROM posts WHERE p_id='$post_id'";
		        $result2 = mysqli_query($db,$post_query3);
		        $count = 0;
		        while($row = mysqli_fetch_assoc($result2)){
		            $p_title            = $row ['p_title'];
		            $p_desc             = $row ['p_desc'];
		            $p_thumbnail        = $row ['p_thumbnail'];
		            $p_author           = $row ['p_author'];
		            $p_cat              = $row ['p_cat'];
		            $p_date             = $row ['p_date'];
		            $p_tags             = $row ['p_tags'];
		            $p_status           = $row ['p_status'];
		        }

   			?>

   			<div class="row d-flex-for-web">
		   		<div class="col-twelve f-basis-70">
		   			<article class="format-standard">  

		   				<div class="content-media">
								<div class="post-thumb">
									<img src="admin/assets/images/posts/<?php echo $p_thumbnail;?>"> 
								</div>  
							</div>

							<div class="primary-content">

								<h1 class="page-title"><?php echo $p_title;?></h1>	

								<ul class="entry-meta">
									<li class="date"><?php echo $p_date;?></li>						
									<li class="cat"><a href="archive.php?cat_id=<?php echo $cat_id;?>">
										
									<?php 
			                            find_name('c_name','category','cat_id',$p_cat);
			                        ?>
									</a></li>				
								</ul>						

								<p class="lead">
									<?php echo $p_desc;?>
								</p> 

								


								<p class="tags">
				  			     	<span>Tagged in :</span>
				  				  	
				  				  	<?php 
			  			   				$tags = explode(',', $p_tags);
                                        foreach($tags as $tag){
                                            echo '<a href="#">'.$tag.'</a>';
                                        }
			  			   			?>
				  			   </p>

				  			   <div class="author-profile">

				  			   		<?php 

				  			   		$user_query = "SELECT * FROM users WHERE u_id='$p_author'";
	                                $result9 = mysqli_query($db,$user_query);
	                                while($row = mysqli_fetch_assoc($result9)){
	                                    $u_id       = $row ['u_id'];
	                                    $u_name     = $row ['u_name'];
	                                    $u_mail     = $row ['u_mail'];
	                                    $u_pass     = $row ['u_pass'];
	                                    $u_address  = $row ['u_address'];
	                                    $u_phone    = $row ['u_phone'];
	                                    $u_biodata  = $row ['u_biodata'];
	                                    $u_gender   = $row ['u_gender'];
	                                    $user_role  = $row ['user_role'];
	                                    $u_status   = $row ['u_status'];
	                                    $u_image    = $row ['u_image'];
	                                }
				  			   		?>

				  			   		<img src="admin/assets/images/users/<?php echo $u_image;?>" alt="">

					  			   	<div class="about">
					  			   		<h4><a href="#"><?php echo $u_name;?></a></h4>
					  			   	
					  			   		<p><?php echo $u_biodata;?></p>

					  			   		<ul class="author-social">
					  			   			<li><a href="#">View Profile</a></li>	
					  			   		</ul>
					  			   	</div>
				  			   </div> <!-- end author-profile -->						

							</div> <!-- end entry-primary -->	
						</article>
				</div> <!-- end col-twelve -->
				<div class="sidebar-wrap f-basis-30">
					<?php 
					include "sidebar.php";
					?>
				</div>
		   	</div> <!-- end row -->

		   
			<?php 

			include "comments.php"; 

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

</section> 


<?php 
  include "footer.php";
?>