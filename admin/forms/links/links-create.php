 <?php 
include('../../../config/connection.php');
include ("../../../config/url.php");
include ("../../inc/header.php");

if(isset($_SESSION['msg'])){
	echo($_SESSION['msg']);
	unset($_SESSION['msg']);
}

?>
 
<div class="container-fluid">

    <div class="card mb-4 py-3 border-bottom-primary border-left-primary">
                    
        <div class="card-body"></div>
            <!-- Page Heading -->  
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="h3 mb-0 text-gray-800">Create Links
            </h6>

            <a href="../../news.php" class="float-right btn btn-primary">Back</a>
        </div>

                              
        <div class="row">
            <div class="container">
                <form action="<?php echo $base_url;?>actions/links/insert-links.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="" placeholder="" name="name">
                    </div>

                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="" placeholder="" name="url">
                    </div> 

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
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