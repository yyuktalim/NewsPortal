<?php 
include ("../config/connection.php");
include("../config/check-login.php");
include ("../config/url.php");
include ("inc/header.php");

// 1. create a variable named sql
$notice_sql = 'select * from notice order by id desc';

// 2. db query
$notice = $conn->query($notice_sql);

// 3. data in array
$notice_array = $notice->fetch_all(MYSQLI_ASSOC);
// var_dump($notice_data);die;

// 4. count
$notice_count = count($notice_array);


if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Notice List
        <a href="<?php echo $base_url;?>forms/notice/notice-create.php" class="float-right btn btn-primary">Add Notice</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($notice_count>0):?>
                        <?php foreach($notice_array as $k=>$notice):?>
                        <tr>
                            <th><?php echo $k+1;?></th>
                            <th><?php echo $notice['title'];?></th>
                            <th>
                               <a href="<?php echo $base_url;?>forms/notice/notice-edit.php?id=<?php echo $notice['id'];?>" class="edit">Edit 
                                <!-- <a href="#" class="btn btn-success btn-circle btn-sm"> -->
                                    <i class="fas fa-check"></i>
                                <!-- </a> -->
                                </a>

                               <a href="<?php echo $base_url;?>actions/notice/delete-notice.php?id=<?php echo $notice['id'];?>" class="delete"> Delete
                                <!-- <a href="#" class="btn btn-danger btn-circle btn-sm"> -->
                                    <i class="fas fa-trash"></i>
                                <!-- </a> -->
                                </a>
                            </th>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                            <tr>
                                <th colspan="3">No data found</th>
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