<?php
include("../config/connection.php");
include("../config/check-login.php");
include("../config/url.php");
include("inc/header.php");


$news_sql = 'select * from news order by id desc';
$news = $conn->query($news_sql);
$news_array = $news->fetch_all(MYSQLI_ASSOC);
$news_count = count($news_array);


if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
} 
?>
   
 
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">News List
        <a href="<?php echo $base_url;?>forms/news/news-create.php" class="float-right btn btn-primary">Add News</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Category id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Actions</th> 
                    </tr>
                </thead>  
                <tbody>
                	<?php if($news_count>0):?>
                	  <?php foreach($news_array as $k=>$news):?>
	                	<tr>
	                		<th><?php echo $k+1;?></th>
	                		<th><?php echo $news['category_id'];?></th>
		                	
	                		<!-- var_dump($news);die;?></pre> -->
	                		<th><?php echo $news['title'];?></th>
	                		<th><img width="100px" src="actions/news/uploads/<?php echo $news['avatar']?>"></th>
	                		<th>
	                			<a href="<?php echo $base_url;?>forms/news/news-edit.php?id=<?php echo $news['id'];?>" class="edit">Edit 
			                        <!-- <a href="#" class="btn btn-success btn-circle btn-sm"> -->
			                        <i class="fas fa-check"></i>
			                        <!-- </a> --> 
			                    </a>

			                    <a href="<?php echo $base_url;?>actions/news/delete-news.php?id=<?php echo $news['id'];?>" class="delete"> Delete
			                        <!-- <a href="#" class="btn btn-danger btn-circle btn-sm"> -->
			                        <i class="fas fa-trash"></i>
			                        <!-- </a> -->
			                    </a> 
	                		</th>
	                	</tr>
                  	  <?php endforeach;?>
                	<?php else:?>
                	<tr>
		                <th colspan="5">No data found</th>
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