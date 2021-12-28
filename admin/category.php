<?php include "includes/header.php"; ?>

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
                                                <form class="forms-sample">
                                                    <div class="form-group row">
                                                        <label for="cat_name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="cat_name" placeholder="Name" / required="required" name="cat_name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea rows="8" name="cat_desc" class="custom-area">Description</textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-md btn-success me-2 text-light ">Add New</button>
                                                    <button class="btn  btn-md btn-lightt">Cancel</button>
                                                </form>
                                            </div>
                                        </div>
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
                                                        <tr>
                                                            <td>Jacob</td>
                                                            <td>Photoshop</td>
                                                            <td><label class="badge badge-danger">Pending</label></td>
                                                            <td>
                                                                <a href=""><i class="mdi mdi-grease-pencil"></i></a>
                                                                <a href="" class="ms-2"><i class="mdi mdi-delete text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jacob</td>
                                                            <td>Photoshop</td>
                                                            <td><label class="badge badge-danger">Pending</label></td>
                                                            <td>
                                                                <a href=""><i class="mdi mdi-grease-pencil"></i></a>
                                                                <a href="" class="ms-2"><i class="mdi mdi-delete text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jacob</td>
                                                            <td>Photoshop</td>
                                                            <td><label class="badge badge-danger">Pending</label></td>
                                                            <td>
                                                                <a href=""><i class="mdi mdi-grease-pencil"></i></a>
                                                                <a href="" class="ms-2"><i class="mdi mdi-delete text-danger"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jacob</td>
                                                            <td>Photoshop</td>
                                                            <td><label class="badge badge-danger">Pending</label></td>
                                                            <td>
                                                                <a href=""><i class="mdi mdi-grease-pencil"></i></a>
                                                                <a class="ms-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="mdi mdi-delete text-danger"></i></a>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                  <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                      
                                                                      <div class="modal-body text-center">
                                                                        <h2 class="mb-4">Are You sure ?</h2>
                                                                        <button type="button" class="btn btn-md btn-danger">Yes</button>
                                                                        <button type="button" class="btn btn-md btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        
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
