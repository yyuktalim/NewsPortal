 <?php 
include "../../../config/connection.php";
include "../../../config/url.php";
include ("../../inc/header.php");

$id=$_GET['id']; 

$categories = $conn->query('select * from categories');
$categories = $categories->fetch_all(MYSQLI_ASSOC);


$news = $conn->query('select * from news where id='.$id);
$news = $news->fetch_all(MYSQLI_ASSOC);
// var_dump($news);die;
$news = $news[0];
  

?>

<div class="container-fluid">

    <div class="card mb-4 py-3 border-bottom-primary border-left-primary">
                    
        <div class="card-body"></div>
        <!-- Page Heading -->  
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="h3 mb-0 text-gray-800">Update News</h6>

        <a href="../../news.php" class="float-right btn btn-primary">Back</a>
        </div>

                            
        <div class="row">
            <div class="container">
                <form action="<?php echo $base_url;?>actions/news/update-news.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Category 
                            <?php echo $news['category_id'];?>    
                        </label>
                        <select class="form-control" name="category_id">
                            <?php foreach($categories as $k=>$value):?>
                               <option 
                                value="<?php echo $value['id'];?>"  
                                 <?php echo $value['id']==$news['category_id']?'selected':'';?>>
                                        <?php echo $value['category_name'];?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="" name="title" value="<?php echo $news['title'];?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea  class="form-control" id="desc" placeholder="" name="description" cols="65" rows="8"><?php echo $news['description'];?></textarea> 
                    </div>

                    <div class="form-group">
                        <label for="avatar">Image</label>
                        <input type="file" class="form-control" id="avatar" placeholder="" name="avatar" value="<?php echo $news['avatar'];?>">
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