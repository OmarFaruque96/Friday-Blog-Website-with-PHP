<?php include "includes/header.php"; ?>
<?php 
    
    if(isset($_GET['delete_id'])){
        $del_id = $_GET['delete_id'];
        $table = 'cmnts';
        $key   = 'cmnt_id';
        $redirect = 'comments.php';
        // delete user info from database
        delete($table,$key,$del_id,$redirect);
    }
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <!-- body content start from here -->
                        
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">All Comments Information</h4>
                                            <p class="card-description"></code></p>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Comments</th>
                                                            <th>Post</th>
                                                            <th>Author</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                    <?php 

                                    $cmnts_query = "SELECT * FROM cmnts";
                                    $read_res = mysqli_query($db, $cmnts_query);

                                    while($row = mysqli_fetch_assoc($read_res)){

                                        $cmnt_id        = $row['cmnt_id'];
                                        $cmnt_author    = $row['cmnt_author'];
                                        $post_id        = $row['post_id'];
                                        $cmnt_date      = $row['cmnt_date'];
                                        $cmnts_details  = $row['cmnts_details'];

                                        ?>

                                            <tr>
                                                <td><?php echo substr($cmnts_details, 0, 40);?></td>
                                                <td><?php find_name('p_title','posts','p_id',$post_id);?></td>
                                                <td><?php find_name('u_name','users','u_id',$cmnt_author);?></td>
                                                <td><?php echo $cmnt_date;?></td>
                                                <td>
                                                    <a class="ms-2" type="button" data-bs-toggle="modal" data-bs-target="#delete_id<?php echo $cmnt_id;?>"><i class="mdi mdi-delete text-danger"></i></a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="delete_id<?php echo $cmnt_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          
                                                          <div class="modal-body text-center">
                                                            <h2 class="mb-4">Are You sure ?</h2>
                                                            <a href="comments.php?delete_id=<?php echo $cmnt_id;?>" type="button" class="btn btn-md btn-danger">Yes</a>
                                                            <button type="button" class="btn btn-md btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </td>
                                            </tr> 

                                        <?php

                                    }

                                    ?>

                                                           
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<?php include "includes/footer.php"; ?>
