<?php include "includes/header.php"; ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <!-- body content start from here -->
                        
                        <?php 

                            // if(isset($_GET['do'])){
                            //     $do = $_GET['do'];
                            // }else{
                            //     $do = 'Manage';
                            // }

                        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

                            if($do == 'Manage'){
                                // view / read all users from database
                                echo 'Manage';

                            }
                            elseif($do == 'Add'){
                                // add a new user
                                echo 'add';

                            }
                            elseif($do == 'Edit'){
                                // edit a new user

                            }
                            elseif($do == 'Update'){
                                // Update a new user

                            }
                            elseif($do == 'Delete'){
                                // Delete a new user

                            }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<?php include "includes/footer.php"; ?>
