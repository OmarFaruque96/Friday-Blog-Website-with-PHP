<?php include "includes/header.php"; ?>

<!-- partial -->
<div class="main-panel">
    <div>
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
                                    ?>

                                    <div class="row">
                                        <div class="col-lg-12 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">All User Information</h4>
                                                        <p class="card-description">User Info info <code>.table-hover</code></p>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Photo</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Phone</th>
                                                                        <th>Address</th>
                                                                        <th>Gender</th>
                                                                        <th>User Role</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                            <?php 

                                $user_query = "SELECT * FROM users";
                                $result = mysqli_query($db,$user_query);
                                $count = 0;
                                while($row = mysqli_fetch_assoc($result)){
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
                                    $count++;
                                    ?>

                                    <tr>
                                        <td><?php echo $count;?></td>
                                        <td>
                                            <?php 

                                            if(empty($u_image)){
                                                ?>
                                                <img src="assets/images/users/default.png" width="80px">
                                                <?php
                                            }else{
                                                ?>
                                                <img src="assets/images/users/<?php echo $u_image;?>" width="80px">
                                                <?php
                                            }

                                            ?>
                                            
                                        </td>
                                        <td><?php echo $u_name;?></td>
                                        <td><?php echo $u_mail;?></td>
                                        <td><?php echo $u_phone;?></td>
                                        <td><?php echo $u_address;?></td>
                                        <td><?php echo $u_gender;?></td>
                                        <td>
                                            <?php 
                                                if($user_role == 2){
                                                    echo '<span class="badge bg-danger">Admin</span>';
                                                }elseif($user_role == 1){
                                                    echo '<span class="badge bg-info">Editor</span>';
                                                }else{
                                                    echo '<span class="badge bg-success">Subscriber</span>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($u_status == 1){
                                                    echo '<span class="badge bg-danger">InActive</span>';
                                                }else{
                                                    echo '<span class="badge bg-success">Active</span>';
                                                }
                                            ?>  
                                        </td>
                                        <td>
                                            <a href="users.php?do=Edit&edit_id=<?php echo $u_id;?>"><i class="mdi mdi-grease-pencil"></i></a>
                                            <a href="" class="ms-2"><i class="mdi mdi-account-check"></i></a>
                                            <a class="ms-2" type="button" data-bs-toggle="modal" data-bs-target="#delete_id<?php echo $u_id;?>"><i class="mdi mdi-delete text-danger"></i></a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="delete_id<?php echo $u_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  
                                                  <div class="modal-body text-center">
                                                    <h2 class="mb-4">Are You sure ?</h2>
                                                    <a href="users.php?do=Delete&delete_id=<?php echo $u_id;?>" type="button" class="btn btn-md btn-danger">Yes</a>
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

                                    

                                    <?php

                                }
                                elseif($do == 'Add'){
                                    // add a new user
                                    ?>

<div class="row">
    <div class="col-lg-10 col-md-12 d-flex flex-column">
        <div class="row flex-grow">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add a new member</h4>
                  <p class="card-description">
                    Horizontal form layout
                  </p>


                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">UserName</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="useremail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="useremail" placeholder="User Email" name="usermail">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <small>Password should contains at least 8 letters.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone">
                      </div>
                    </div>
                   
                   <div class="form-group row">
                      <label for="address" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <textarea rows="4" name="address" placeholder="Address" class="custom-area"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender">
                            <option>Please select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="Biodata" class="col-sm-3 col-form-label">Biodata</label>
                      <div class="col-sm-9">
                        <textarea rows="8" name="biodata" placeholder="Biodata" class="custom-area"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">User Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="user_role">
                            <option>Please select user role</option>
                            <option value="0">Subscriber</option>
                            <option value="1">Editor</option>
                            <option value="2">Admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label">User Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Please insert a png/jpg/jpeg format photo only.</small>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2 text-light" name="add_user">Submit</button>

                    <button class="btn btn-light">Cancel</button>
                  </form>



                  <!-- user add code -->
                  <?php 

                    if(isset($_POST['add_user'])){
                        $username       = $_POST['username'];
                        $usermail       = $_POST['usermail'];
                        $password       = $_POST['password'];
                        $phone          = $_POST['phone'];
                        $address        = $_POST['address'];
                        $gender         = $_POST['gender'];
                        $biodata        = mysqli_real_escape_string($db,$_POST['biodata']);
                        $user_role      = $_POST['user_role'];
                        $file_name      = $_FILES['image']['name'];
                        //$file_size      = $_FILES['image']['size'];
                        $tmp_name       = $_FILES['image']['tmp_name'];

                        $split_name = explode('.', $_FILES['image']['name']);
                        $extn = end($split_name);
                        $extn = strtolower($extn);

                        $extensions = array('png','jpg','jpeg');

                        // if($file_size < 2097152){

                        // }

                        if(in_array($extn, $extensions) === true){
                            // random num
                            $random         = rand();
                            $updated_name   = $random.'_'.$file_name;

                            move_uploaded_file($tmp_name, 'assets/images/users/'.$updated_name);

                            $hass_password = sha1($password);

                            // save the value into the database

                            $add_query = "INSERT INTO users (u_name,u_mail,u_pass,u_address,u_phone,u_biodata,u_gender,user_role,u_status,u_image) VALUES ('$username', '$usermail', '$hass_password', '$address', '$phone', '$biodata', '$gender', '$user_role', 0, '$updated_name')";
                            $result = mysqli_query($db, $add_query);
                            if($result){
                                header('Location: users.php');
                            }else{
                                die('User information add error.'.mysqli_error($db));
                            }


                        }else{
                            // not an image
                            echo '<span class="alert alert-danger">Please upload an image (png,jpg,jpeg).</span><br><br>';
                        }



                        // check if user filled all the info
                        // if(!empty($username) && !empty($usermail) && !empty($password) && !empty($phone) && !empty($address) && !empty($gender) && !empty($biodata) && !empty($user_role)){



                        // }else{
                        //     echo '<span class="alert alert-danger">Please fill all the information.</span><br><br>';
                        // }

                    }

                  ?>

                </div>
            </div>
        </div>
    </div>
</div>

                                    <?php

                                }
                                elseif($do == 'Edit'){
                                    // edit a new user


                            if(isset($_GET['edit_id'])){
                                $edit_id = $_GET['edit_id'];

                                // read all the info first
                                $user_query = "SELECT * FROM users WHERE u_id='$edit_id'";
                                $result = mysqli_query($db,$user_query);
                                
                                while($row = mysqli_fetch_assoc($result)){
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

                                // display all the info now
                                ?>

<div class="row">
    <div class="col-lg-10 col-md-12 d-flex flex-column">
        <div class="row flex-grow">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit user information</h4>
                  <p class="card-description">
                    Horizontal form layout
                  </p>


                  <form class="forms-sample" method="POST" action="users.php?do=Update" enctype="multipart/form-data">

                    <div class="form-group row">
                      <label for="username" class="col-sm-3 col-form-label">UserName</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?php echo $u_name;?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="useremail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="useremail" placeholder="User Email" name="usermail" value="<?php echo $u_mail;?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        <small>Password should contains at least 8 letters.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" value="<?php echo $u_phone;?>">
                      </div>
                    </div>
                   
                   <div class="form-group row">
                      <label for="address" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <textarea rows="4" name="address" placeholder="Address" class="custom-area" value="<?php echo $u_address;?>"><?php echo $u_address;?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender">
                            <option>Please select your gender</option>
                            <option value="Male" <?php if($u_gender == 'Male') echo 'selected'?>>Male</option>
                            <option value="Female" <?php if($u_gender == 'Female') echo 'selected'?>>Female</option>
                            <option value="Others" <?php if($u_gender == 'Others') echo 'selected'?>>Others</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="Biodata" class="col-sm-3 col-form-label">Biodata</label>
                      <div class="col-sm-9">
                        <textarea rows="8" name="biodata" placeholder="Biodata" class="custom-area" value="<?php echo $u_biodata;?>">
                            <?php echo $u_biodata;?>
                        </textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">User Type</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="user_role">
                            <option>Please select user role</option>
                            <option value="0"<?php if($user_role == 0) echo 'selected'?>>Subscriber</option>
                            <option value="1"<?php if($user_role == 1) echo 'selected'?>>Editor</option>
                            <option value="2"<?php if($user_role == 2) echo 'selected'?>>Admin</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="gender" class="col-sm-3 col-form-label">User Status</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="u_status">
                            <option>Please select user role</option>
                            <option value="0"<?php if($u_status == 0) echo 'selected'?>>Active</option>
                            <option value="1"<?php if($u_status == 1) echo 'selected'?>>InActive</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="image" class="col-sm-3 col-form-label">User Photo</label>
                      <div class="col-sm-9">
                        <input type="file" class="form-control" id="image" name="image">
                        <small>Please insert a png/jpg/jpeg format photo only.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-2">
                        <img src="assets/images/users/<?php echo $u_image?>" class="img-fluid" style="border-radius: 10px">
                      </div>
                    </div>

                    <input type="hidden" name="user_id" value="<?php echo $u_id;?>">

                    <button type="submit" class="btn btn-primary me-2 text-light" name="update_user">Update</button>

                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


                                <?php

                            }



                                }
                                elseif($do == 'Update'){
                                    // Update a new user

                                    if($_SERVER['REQUEST_METHOD'] == 'POST'){

                                        $user_id        = $_POST['user_id'];
                                        $username       = $_POST['username'];
                                        $usermail       = $_POST['usermail'];
                                        $password       = $_POST['password'];
                                        $u_address      = mysqli_real_escape_string($db,$_POST['address']);
                                        $phone          = $_POST['phone'];
                                        $gender         = $_POST['gender'];
                                        $biodata        = mysqli_real_escape_string($db,$_POST['biodata']);
                                        $user_role      = $_POST['user_role'];
                                        $u_status       = $_POST['u_status'];
                                        $file_name      = $_FILES['image']['name'];
                                        $tmp_name       = $_FILES['image']['tmp_name'];
                  
                                        // update both pass and img
                                        if(!empty($password) && !empty($file_name)){

                                            $split_name = explode('.', $_FILES['image']['name']);
                                            $extn = end($split_name);
                                            $extn = strtolower($extn);

                                            $extensions = array('png','jpg','jpeg');

                                            if(in_array($extn, $extensions) === true){

                                                // delete previous img first
                                                delete_files('users','u_id',$user_id,'u_image','users');
                                                // random num
                                                $random         = rand();
                                                $updated_name   = $random.'_'.$file_name;

                                                move_uploaded_file($tmp_name, 'assets/images/users/'.$updated_name);

                                                $hass_password = sha1($password);

                                                // update query
                                                $update_query = "UPDATE users SET u_name='$username', u_mail='$usermail', u_pass='$hass_password', u_address='$u_address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status', u_image='$updated_name' WHERE u_id='$user_id'";
                                                $result = mysqli_query($db, $update_query);
                                                if($result){
                                                    header('Location: users.php');
                                                }else{
                                                    die('User Update error.'.mysqli_error($db));
                                                }

                                            }else{
                                                echo '<span>Please select an image for user. (png,jpg,jpeg)</span>';
                                            }

                                        }
                                        // change only password but no img
                                        elseif(!empty($password) && empty($file_name)){

                                            $hass_password = sha1($password);

                                            // update query
                                            $update_query = "UPDATE users SET u_name='$username', u_mail='$usermail', u_pass='$hass_password', u_address='$u_address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status' WHERE u_id='$user_id'";
                                            $result = mysqli_query($db, $update_query);
                                            if($result){
                                                header('Location: users.php');
                                            }else{
                                                die('User Update error.'.mysqli_error($db));
                                            }

                                        }
                                        // change only img but no pass
                                        elseif(empty($password) && !empty($file_name)){
                                            $split_name = explode('.', $_FILES['image']['name']);
                                            $extn = end($split_name);
                                            $extn = strtolower($extn);

                                            $extensions = array('png','jpg','jpeg');

                                            if(in_array($extn, $extensions) === true){

                                                // delete previous img first
                                                delete_files('users','u_id',$user_id,'u_image','users');
                                                // random num
                                                $random         = rand();
                                                $updated_name   = $random.'_'.$file_name;

                                                move_uploaded_file($tmp_name, 'assets/images/users/'.$updated_name);

                                                // update query
                                                $update_query = "UPDATE users SET u_name='$username', u_mail='$usermail', u_address='$u_address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status', u_image='$updated_name' WHERE u_id='$user_id'";
                                                $result = mysqli_query($db, $update_query);
                                                if($result){
                                                    header('Location: users.php');
                                                }else{
                                                    die('User Update error.'.mysqli_error($db));
                                                }

                                            }else{
                                                echo '<span>Please select an image for user. (png,jpg,jpeg)</span>';
                                            }
                                        }
                                        // no changed
                                        else{
                                            // update query
                                            $update_query = "UPDATE users SET u_name='$username', u_mail='$usermail', u_address='$u_address', u_phone='$phone', u_biodata='$biodata', u_gender='$gender', user_role='$user_role', u_status='$u_status' WHERE u_id='$user_id'";
                                            $result = mysqli_query($db, $update_query);
                                            if($result){
                                                header('Location: users.php');
                                            }else{
                                                die('User Update error.'.mysqli_error($db));
                                            }
                                        }

                                    }

                                }
                                elseif($do == 'Delete'){
                                    // Delete a new user

                                    if(isset($_GET['delete_id'])){
                                        $del_id = $_GET['delete_id'];
                                        $table = 'users';
                                        $key   = 'u_id';
                                        $redirect = 'users.php';
                                        $files = 'u_image';
                                        $folder_name = 'users';

                                        // delete user image first
                                        delete_files($table,$key,$del_id,$files,$folder_name);
                                        // delete user info from database
                                        delete($table,$key,$del_id,$redirect);

                                    }

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
