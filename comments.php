<?php 
	ob_start();
?>
<div class="comments-wrap">
				<div id="comments" class="row">
					<div class="col-full">

		           <?php 

				   		$cmnt_query2 = "SELECT * FROM cmnts WHERE post_id='$post_id2'";
		                $res2 = mysqli_query($db, $cmnt_query2);

		                $total_comments = mysqli_num_rows($res2);

		                echo '<h3>'.$total_comments.' Comments</h3>';
		                echo '<ol class="commentlist">';

		                while($row = mysqli_fetch_assoc($res2)){
		                    $cmnt_id        = $row['cmnt_id'];
		                    $cmnt_author    = $row['cmnt_author'];
		                    $post_id        = $row['post_id'];
		                    $cmnt_date      = $row['cmnt_date'];
		                    $cmnts_details  = $row['cmnts_details'];
		                    ?>

		            	<li class="depth-1">

		                 <div class="avatar">
		                 	<?php 
	                            $img_name = find_img('u_image','users', 'u_id', $cmnt_author);
	                            if(empty($img_name)){
                                ?>
                                <img src="admin/assets/images/users/default.png" class="square-img" style="border-right: 6px">
                                <?php
	                            }else{
	                                ?>
	                                <img src="admin/assets/images/users/<?php echo $img_name;?>" class="square-img" style="border-right: 6px">
	                                <?php
	                            }
	                        ?>
		                 </div>

		                 <div class="comment-content">

		                     <div class="comment-info">
		                        <cite><?php find_name('u_name','users','u_id',$cmnt_author);?></cite>

		                        <div class="comment-meta">
		                           <time class="comment-time" datetime="2014-07-12T23:05">
		                           	<?php echo $cmnt_date;?>
		                           </time>
		                           <span class="sep">/</span><a class="reply" href="#">Reply</a>
		                        </div>
		                     </div>

		                     <div class="comment-text">
		                        <p><?php echo $cmnts_details;?></p>
		                     </div>

		                  </div>
		                </li>

		                    <?php
		                }

				   	?>

		           
		              
		           </ol> 				

		           <!-- respond -->
		           <div class="respond">

		           		<?php 

		           			$current_user = $_SESSION['u_id'];

		           			if(empty($current_user)){
		           				echo '<h3 style="display:inline-block">Please login to put a comments.</h3>

		           					<a href="admin/index.php">Login</a>';
		           			}else{
		           				?>

		           				<h3>Leave a Comment</h3>
						            <form name="contactForm" id="contactForm" method="POST">
										<fieldset>
						                 <div class="message form-field">
						                    <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message" ></textarea>
						                 </div>

						                 <button type="submit" name="sub_cmnt" class="submit button-primary">Submit</button>
										</fieldset>
								    </form> 
		           				<?php

		           				if(isset($_POST['sub_cmnt']) && !empty($_POST['cMessage'])){
		           					$cMessage = mysqli_real_escape_string($db,$_POST['cMessage']);

		           					$cmnts_query = "INSERT INTO cmnts (cmnt_author, post_id, cmnt_date, cmnts_details) VALUES ('$current_user', '$post_id2', now(), '$cMessage')";
		           					$result = mysqli_query($db, $cmnts_query);
		           					if($result){
		           						echo '<script>window.location = "single.php?post_id='.$post_id2.'"</script>';
		           					}else{
		           						die('Comments insert error!'.mysqli_error($db));
		           					}
		           				}
		           			}

		           		?>

		           		
					    
		           </div> <!-- Respond End -->

		     	</div> <!-- end col-full -->
		     </div> <!-- end row comments -->
			</div>
<?php 
	ob_end_flush();
?>