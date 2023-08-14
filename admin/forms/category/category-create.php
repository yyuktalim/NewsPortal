<?php 
include "../../../config/connection.php";
include "../../../config/url.php";
include ("../../inc/header.php");



// var_dump($_SESSION);

?>
 
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- <div class="alert alert-primary">
                        // Fields <a href="<?php echo $base_url;?>forms/category/category-create.php" class="alert-link">are required.</a>
                    </div>

                   --> 
 
                   <!-- count(),empty(), unset(), isset()-->

                   <?php 

                    if(isset($_SESSION['msg'])){

                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                    }   
                   ?>

                    <div class="card mb-4 py-3 border-bottom-primary border-left-primary">
                    
                        <div class="card-body"></div>
                        <!-- Page Heading -->  
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h6 class="h3 mb-0 text-gray-800">Create Category
                            </h6>

                            <a href="../../category.php" class="float-right btn btn-primary">Back</a>
                        </div>

                            
                        <div class="row">
                        	<div class="container">
                                <form action="<?php echo $base_url;?>actions/category/insert-category.php" method="post">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" placeholder="" name="category_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="desc">Description</label>
                                        <textarea  class="form-control" id="desc" placeholder="" name="description" cols="65" rows="8"></textarea> 
                                    </div>

                                    <button type="submit" class="btn btn-default">Create</button>
                                </form>
                            </div>
                            
                            <div class="card-body"></div>
                        </div>
                    </div>
            <!-- End of Main Content -->


<?php 
include ("../../inc/footer.php");
?>