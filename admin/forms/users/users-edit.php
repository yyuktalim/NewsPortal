<?php 
include "../../../config/connection.php";
include "../../../config/url.php";
include ("../../inc/header.php");

$id = $_GET['id'];

$users = $conn->query('select * from users where id='.$id);
$users = $users->fetch_all(MYSQLI_ASSOC);
$users = $users[0];
?>
 

<div class="container-fluid">

    <div class="card mb-4 py-3 border-bottom-primary border-left-primary">
                    
        <div class="card-body"></div>
        <!-- Page Heading -->  
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="h3 mb-0 text-gray-800">Update Users</h6>

        <a href="../../news.php" class="float-right btn btn-primary">Back</a>
        </div>

                            
        <div class="row">
            <div class="container">
                <form action="<?php echo $base_url;?>actions/users/update-users.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo $users['name'];?>">
                    </div>

                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="text" class="form-control" id="dob" placeholder="" name="dob" value="<?php echo $users['dob'];?>">
                    </div>
  
                     <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <?php $g = $users['gender'];?>
                            <option value="male" <?php echo $g=='male'?'selected':'';?>>Male</option>
                            <option value="female" <?php echo $g=='female'?'selected':'';?>>Female</option>
                            <option value="others"  <?php echo $g=='others'?'selected':'';?>>Other</option>
                        </select>
                        <!-- <input type="text" " id="" placeholder="" name="gender"> -->
                    </div> 

                    <div class="form-group">
                        <label for="avatar">Image</label>
                        <input type="file" class="form-control" id="avatar" placeholder="" name="avatar" value="<?php echo $users['avatar'];?>">
                    </div>  

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role">
                            <?php $r = $users['role'];?>
                            <option value="user" <?php echo $r=='user'?'selected':''?>>User</option>
                            <option value="admin" <?php echo $r=='admin'?'selected':''?>>Admin</option> 
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="" name="email" value="<?php echo $users['email'];?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="" name="password" value="<?php echo $users['password'];?>">
                    </div> 



                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
                            
            <div class="card-body"></div>
        </div>
    </div>
    <!-- End of Main Content -->

 
<?php 
include ("../../inc/footer.php");
?> 