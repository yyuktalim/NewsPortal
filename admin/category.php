<?php 
include "../config/connection.php";
include("../config/check-login.php");
include "../config/url.php";
include ("inc/header.php");
// var_dump($_SESSION);

//1. sql
 
$cat_sql = 'select * from categories order by id desc';
// 2. db query
$categories = $conn->query($cat_sql);
// var_dump($categories); die;
// 3. data in array
$categories_array = $categories->fetch_all(MYSQLI_ASSOC);
// var_dump($categories_array); die;

// count
$categories_count = count($categories_array);

?>

<!-- <pre>
<?php //var_dump($categories_count); ?>
<?php //var_dump($categories_array); ?>
</pre> -->

<?php 

if(isset($_SESSION['msg'])){

        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
}   
                   ?>
<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories List
            <a href="<?php echo $base_url;?>forms/category/category-create.php" class="float-right btn btn-primary">Add Category</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php if($categories_count>0):?>
		                    	<?php foreach($categories_array as $k=>$category):?>
		                    	  <tr>
		                            <th><?php echo $k+1;?></th>
		                            <th><?php echo $category['category_name'];?></th>
		                            <th>
		                            	<a href="<?php echo $base_url;?>forms/category/category-edit.php?id=<?php echo $category['id'];?>" class="edit">Edit 
		                            		<!-- <a href="#" class="btn btn-success btn-circle btn-sm"> -->
		                                        <i class="fas fa-check"></i>
		                                    <!-- </a> -->
		                                </a>

		                            	<a href="<?php echo $base_url;?>actions/category/delete-category.php?id=<?php echo $category['id'];?>" class="delete"> Delete
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
                    