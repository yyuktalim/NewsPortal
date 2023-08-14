 <?php 
include "../../../config/connection.php"; 

$id = $_GET['id'];
$category_id = $_POST['category_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$image = '';

if(empty($category_id) || $title=='' || $description==''){
	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

    header('Location: ../../forms/news/news-edit.php?id='.$id);
    exit;
}
  

if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
	$sql = "SELECT avatar from news where id=".$id;
	//var_dump($sql);die;
	$old_img = $conn->query($sql);
	$old_img = $old_img->fetch_all(MYSQLI_ASSOC);
	$old_img_name = $old_img[0]['avatar'];

	$delete_dir = 'uploads/'.$old_img_name;
	unlink($delete_dir);

	$img_name = date('Tmdhis');
	$img_ext = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
	$image = $img_name.'.'.$img_ext;
    
    $upload_dir = 'uploads/'.$image;
    $file_data = $_FILES['avatar']['tmp_name'];

    // storing img in local storage
    $upload = move_uploaded_file($file_data, $upload_dir);
}
  
$insert_sql = " update news set category_id='$category_id', title='$title', description='$description', avatar='$image' where id=$id";
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Updated.</a>
                    </div>';
header('Location: ../../news.php');
exit;

?>