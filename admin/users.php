 <?php
include("../config/connection.php");
include("../config/check-login.php");
include("../config/url.php");
include("inc/header.php");

$users_sql = 'select * from users order by id desc';
$users = $conn->query($users_sql);
$users_array = $users->fetch_all(MYSQLI_ASSOC);
$users_count = count($users_array);
// var_dump($_SESSION);
// echo "<pre>";
// var_dump($users_array);die;


if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?> 

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Users List
        <a href="<?php echo $base_url;?>forms/users/users-create.php" class="float-right btn btn-primary">Add Users</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>           
                    <tr>
                        <th>S.N</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Date of birth</th>
                        <th>Gender</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tbody>
                	<?php if($users_count>0):?>
                		<?php foreach($users_array as $k=>$users):?>
	                	<tr>
	                		<th><?php echo $k+1;?></th>
                            <th><img width="100px" src="actions/users/uploads/<?php echo $users['avatar']?>"></th>
	                		<th><?php echo $users['name'];?></th> 
		                	
	                		<!-- var_dump($news);die;?></pre> -->
	                		<th><?php echo $users['dob'];?></th>
	                		<th><?php echo $users['gender'];?></th>
                            <th><?php echo $users['role'];?></th>
	                		<th> 
	                			<a href="<?php echo $base_url;?>forms/users/users-edit.php?id=<?php echo $users['id'];?>" class="edit">Edit 
			                        <!-- <a href="#" class="btn btn-success btn-circle btn-sm"> -->
			                        <i class="fas fa-check"></i>
			                        <!-- </a> --> 
			                    </a>

			                    <a href="<?php echo $base_url;?>actions/users/delete-users.php?id=<?php echo $users['id'];?>" class="delete"> Delete
			                        <!-- <a href="#" class="btn btn-danger btn-circle btn-sm"> -->
			                        <i class="fas fa-trash"></i>
			                        <!-- </a> -->
			                    </a> 
	                		</th>
	                	</tr>
	                <?php endforeach;?>
	                <?php else:?>
	                <tr>
		                <th colspan="6">No data found</th>
		            </tr>
		        <?php endif;?>
                </tbody>
               </table> 
        </div>
    </div>
</div>




<?php 
    include ("inc/footer.php"); 
?>