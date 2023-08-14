<?php 
include "../../../config/connection.php";

$category_id = $_POST['category_id'];
$notice_title = $_POST['title'];
$description = $_POST['description'];
$img = '';
// echo "<pre>";
// var_dump($_POST);die; 
// var_dump($_FILES); die;

if(empty($category_id) || $notice_title=='' || $description==''){

	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';
    header('Location: ../../forms/news/news-create.php');
    exit;
} 
if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
	// $sql = "SELECT avatar FROM news WHERE id=".$id;
	// $old_image = $conn->query($sql);
	// $old_image = $old_image->fetch_all(MYSQLI_ASSOC); 
	// $old_image_name = $old_image[0]['avatar'];

	// $delete_dir = 'uploads/'.$old_image_name;
	// unlink($delete_dir);

	$image_name = date('Tmdhis');
	$image_ext = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
	$img = $image_name.'.'.$image_ext;

	$upload_dir = 'uploads/'.$img;
	$file_data = $_FILES['avatar']['tmp_name'];
	// storing image in local storage
	$upload = move_uploaded_file($file_data, $upload_dir);

	
}
 
$insert_sql = "insert into news(category_id, title, description, avatar) values('".$category_id."','".$notice_title."','".$description."','".$img."')";
// var_dump($insert_sql);
// die;
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully inserted.</a>
                    </div>';

header('Location: ../../news.php');
exit;

?>