<?php
include("../../../config/connection.php");
include("../../../config/url.php");
include("../../inc/header.php");

$id=$_GET['id'];

$notice = $conn->query('select * from notice where id='.$id);
$notice = $notice->fetch_all(MYSQLI_ASSOC);
$notice = $notice[0];

?>

 
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card mb-4 py-3 border-bottom-primary border-left-primary">
                    
            <div class="card-body"></div>
            <!-- Page Heading -->  
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="h3 mb-0 text-gray-800">Update Notice</h6>

                <a href="../../notice.php" class="float-right btn btn-primary">Back</a>
            </div>

                            
            <div class="row">
                <div class="container">
                    <form action="<?php echo $base_url;?>actions/notice/update-notice.php?id=<?php echo $id;?>" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="" placeholder="" name="title" value="<?php echo $notice['title'];?>">
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