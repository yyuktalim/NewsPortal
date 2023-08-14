<?php 
include("../config/connection.php");
include("../config/check-login.php");
include("../config/url.php");
include("inc/header.php");

$links_sql = 'select * from links order by id desc';
$links = $conn->query($links_sql);
$links_array = $links->fetch_all(MYSQLI_ASSOC);
$links_count = count($links_array);

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
 
?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Useful Links List
        <a href="<?php echo $base_url;?>forms/links/links-create.php" class="float-right btn btn-primary">Add links</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Url</th>
                        <th>Actions</th> 
                    </tr>
                </thead> 
                <tbody>
                	<?php if($links_count>0):?>
                		<?php foreach($links_array as $k=>$links):?>
	                	<tr>
	                		<th><?php echo $k+1;?></th>
	                		<th><?php echo $links['name'];?></th>
	                		<th><?php echo $links['url']?></th>
	                		<th>
	                			<a href="<?php echo $base_url;?>forms/links/links-edit.php?id=<?php echo $links['id'];?>" class="edit">Edit 
			                        <!-- <a href="#" class="btn btn-success btn-circle btn-sm"> -->
			                        <i class="fas fa-check"></i>
			                        <!-- </a> --> 
			                    </a>

			                    <a href="<?php echo $base_url;?>actions/links/delete-links.php?id=<?php echo $links['id'];?>" class="delete"> Delete
			                        <!-- <a href="#" class="btn btn-danger btn-circle btn-sm"> -->
			                        <i class="fas fa-trash"></i>
			                        <!-- </a> -->
			                    </a> 
	                		</th>
	                	</tr>
	                	<?php endforeach;?>   
	                	<?php else:?> 
	                	<tr>
	                		<th colspan="4">No data found</th>
	                	</tr>
	                	<?php endif;?>              
                </tbody>
               </table>
        </div>
    </div>
</div>


<?php
include("inc/footer.php");
?>