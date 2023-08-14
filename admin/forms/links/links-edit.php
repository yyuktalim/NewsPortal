<?php
include("../../../config/connection.php");
include("../../../config/url.php");
include("../../inc/header.php");

$id = $_GET['id'];

$links = $conn->query('select * from links where id='.$id);
$links = $links->fetch_all(MYSQLI_ASSOC);
$links = $links[0];


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
            <h6 class="h3 mb-0 text-gray-800">Update Links</h6>

        <a href="../../links.php" class="float-right btn btn-primary">Back</a>
        </div>

                            
        <div class="row">
            <div class="container">
                <form action="<?php echo $base_url;?>actions/links/update-links.php?id=<?php echo $id;?>" method="post">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo $links['name'];?>">
                    </div>

                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" placeholder="" name="url" value="<?php echo $links['url'];?>">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <?php $s = $links['status'];?>
                            <option value="active" <?php echo $s=='active'?'selected':'';?>>Active</option>
                            <option value="inactive" <?php echo $s=='inactive'?'selected':'';?>>Inactive</option>
                        </select> 
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