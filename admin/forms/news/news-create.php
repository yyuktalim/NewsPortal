<?php 
include('../../../config/connection.php');
include ("../../../config/url.php");
include ("../../inc/header.php");

$categories = $conn->query('select * from categories');
$categories = $categories->fetch_all(MYSQLI_ASSOC);
// echo "<pre>";
// var_dump($categories);die;

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
            <h6 class="h3 mb-0 text-gray-800">Create News
            </h6>

            <a href="../../news.php" class="float-right btn btn-primary">Back</a>
        </div>

                      
        <div class="row">
            <div class="container">
                <form action="<?php echo $base_url;?>actions/news/insert-news.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id">
                            <?php 
                                foreach ($categories as $key => $value):?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['category_name'];?></option>
                                    <!-- <option value="sport">Sports</option> -->
                                <?php endforeach;?>
                            
                        </select>
                    </div>
  
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="" placeholder="" name="title">
                    </div> 

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  class="form-control" id="desc" placeholder="" name="description" cols="65" rows="8"></textarea> 

                    </div>

                    <div class="form-group">
                        <label for="avatar">Image</label>
                        <input type="file" class="form-control" id="" placeholder="" name="avatar">
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