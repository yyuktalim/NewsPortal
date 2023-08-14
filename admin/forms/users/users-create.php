 <?php

include('../../../config/connection.php');
include ("../../../config/url.php");
include ("../../inc/header.php");

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}

 ?>
 
<div class="container-fluid">

    <div class="card mb-4 py-3 border-bottom-primary border-left-primary">
                    
        <div class="card-body"></div>
            <!-- Page Heading -->  
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="h3 mb-0 text-gray-800">Create Users
            </h6>

            <a href="../../notice.php" class="float-right btn btn-primary">Back</a>
        </div>

                             
        <div class="row">
            <div class="container">
                <form action="<?php echo $base_url;?>actions/users/insert-users.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="" placeholder="" name="name">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="text" class="form-control" id="" placeholder="" name="dob">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others" >Other</option>
                        </select>
                        <!-- <input type="text" " id="" placeholder="" name="gender"> -->
                    </div>

                    <div class="form-group">
                        <label for="avatar">Image</label>
                        <input type="file" class="form-control" id="" placeholder="" name="avatar">
                    </div> 

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="" placeholder="" name="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="" placeholder="" name="password">
                    </div>


                    <button type="submit" class="btn btn-default">Create</button>
                </form>
            </div>
                            
            <div class="card-body"></div>
        </div>
    </div>
</div>
            <!-- End of Main Content -->


<?include ("../../inc/footer.php") ?> 