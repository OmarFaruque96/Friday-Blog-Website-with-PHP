<?php include "includes/header.php"; ?>

<?php 
    
    // **********************
    // Create Operation
    // **********************
    // read data from html form and submit into database
    if(isset($_POST['add_cat'])){

        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_desc'];

        $create_query = "INSERT INTO category (c_name,c_desc,c_status) VALUES ('$cat_name', '$cat_desc', 0)";
        $result = mysqli_query($db, $create_query);

        if($result){
            header('Location: category.php');
        }else{
            die("Category insert error.".mysqli_error($db));
        }
    }

    // **********************
    // Delete Operation
    // **********************
    if(isset($_GET['delete_id'])){

        $del_id = $_GET['delete_id'];

        $delete_query = "DELETE FROM category WHERE cat_id = '$del_id'";
        $result = mysqli_query($db, $delete_query);

        if($result){
            header('Location: category.php');
        }else{
            die("Category delete error.".mysqli_error($db));
        }
    }

    


?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Add New Category</h4>
                                                <p class="card-description">
                                                    Name should be 20 charecters long
                                                </p>


                                                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label for="cat_name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="cat_name" placeholder="Name" required="required" name="cat_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea rows="8" name="cat_desc" class="custom-area" required="required">Description</textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-md btn-success me-2 text-light " name="add_cat">Add New</button>
                                                    <button class="btn  btn-md btn-lightt">Cancel</button>
                                                </form>


                                            </div>
                                        </div>

                                        <!-- for edit any info -->
                                        <?php 

                                            if(isset($_GET['edit_id'])){

                                                $edit_id = $_GET['edit_id'];

                                                $read_query = "SELECT * FROM category WHERE cat_id='$edit_id'";
                                                $result = mysqli_query($db,$read_query);

                                                while($row = mysqli_fetch_assoc($result)){

                                                    $cat_id     = $row['cat_id'];
                                                    $c_name     = $row['c_name'];
                                                    $c_desc     = $row['c_desc'];
                                                    $c_status   = $row['c_status'];
                                                }


                                                ?>
                                        <div class="card mt-5">
                                            <div class="card-body">
                                                <h4 class="card-title">Edit Category</h4>
                                                <p class="card-description">
                                                    Name should be 20 charecters long
                                                </p>


                                                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label for="cat_name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="cat_name" placeholder="Name" required="required" name="cat_name" value="<?php echo $c_name;?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea rows="8" name="cat_desc" class="custom-area" required="required"><?php echo $c_desc;?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="cat_status">
                                                                <option value="0" <?php if($c_status == 0) echo 'selected'?>>Active</option>
                                                                <option value="1" <?php if($c_status == 1) echo 'selected'?>>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-md btn-success me-2 text-light " name="update_cat">Update Category</button>
                                                    <button class="btn  btn-md btn-lightt">Cancel</button>
                                                </form>


                                            </div>
                                        </div>
                                                <?php

    // **********************
    // Update Operation
    // **********************

    if(isset($_POST['update_cat'])){

        $cat_name       = $_POST['cat_name'];
        $cat_desc       = $_POST['cat_desc'];
        $cat_status     = $_POST['cat_status'];

        $update_query = "UPDATE category SET c_name='$cat_name', c_desc='$cat_desc', c_status='$cat_status' WHERE cat_id='$edit_id'";
        $result = mysqli_query($db, $update_query);

        if($result){
            header('Location: category.php');
        }else{
            die("Category update error.".mysqli_error($db));
        }

    }

                                            }

                                        ?>
                                        

                                    </div>
                                </div>
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">All Categories</h4>
                                            <p class="card-description">Category info <code>.table-hover</code></p>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Category Name</th>
                                                            <th>Description</th>
                                                            <th>Category Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <!-- read data from database -->
                                                        <!-- 3 steps -->
                                                        <!-- step01: query -->
                                                        <!-- step02: query->database -->
                                                        <!-- step03: database feedback -->

                                                        <?php 

                                                            $read_query = "SELECT * FROM category";
                                                            $result = mysqli_query($db,$read_query);

                                                            while($row = mysqli_fetch_assoc($result)){

                                                                $cat_id         = $row['cat_id'];
                                                                $c_name         = $row['c_name'];
                                                                $c_desc         = $row['c_desc'];
                                                                $c_status       = $row['c_status'];
                                                                $is_parent      = $row['is_parent'];
                                                                $parent_id      = $row['parent_id'];

                                                                ?>

                                                        <tr>
                                                            <td>
                                                                <?php 
                                                                // 0 for main category and 1 for sub category
                                                                if($is_parent == 0){
                                                                    echo $c_name;
                                                                }else{
                                                                    echo '-'.$c_name;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php echo $c_desc;?></td>
                                                            <td>
                                                                <?php 

                                                                    if($c_status == 0){
                                                                        echo '<label class="badge badge-success">Active</label>';
                                                                    }else{
                                                                        echo '<label class="badge badge-danger">Inactive</label>';
                                                                    }

                                                                ?>
                                                                
                                                            </td>
                                                            <td>
                                                                <a href="category.php?edit_id=<?php echo $cat_id;?>"><i class="mdi mdi-grease-pencil"></i></a>
                                                                <a class="ms-2" type="button" data-bs-toggle="modal" data-bs-target="#delete_id<?php echo $cat_id;?>"><i class="mdi mdi-delete text-danger"></i></a>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="delete_id<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      
                                                                      <div class="modal-body text-center">
                                                                        <h2 class="mb-4">Are You sure ?</h2>
                                                                        <a href="category.php?delete_id=<?php echo $cat_id;?>" type="button" class="btn btn-md btn-danger">Yes</a>
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
    <!-- content-wrapper ends -->

    <?php include "includes/footer.php"; ?>
</div>
