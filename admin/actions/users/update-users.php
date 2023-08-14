<?php 
include "../../../config/connection.php";


$id = $_GET['id'];
$users_name = $_POST['name'];
$date_of_birth = $_POST['dob'];
$gender = $_POST['gender'];
$avatar = '';
$role = $_POST['role'];
$email = $_POST['email'];
$password = $_POST['password'];
 
if(empty($users_name) || $date_of_birth=='' || $gender=='' || $role=='' || $email=='' || $password==''){
	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

	header('Location: ../../forms/users/users-edit.php?id='.$id);
	exit;
} 
  
if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
	$sql = "SELECT avatar from users where id=".$id;
	//var_dump($sql);die;
	$old_img = $conn->query($sql);
	$old_img = $old_img->fetch_all(MYSQLI_ASSOC);
	$old_img_name = $old_img[0]['avatar'];

	$delete_dir = 'uploads/'.$old_img_name;
	unlink($delete_dir);

	$img_name = date('Tmdhis');
	$img_ext = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
	$avatar = $img_name.'.'.$img_ext;
    
    $upload_dir = 'uploads/'.$avatar;
    $file_data = $_FILES['avatar']['tmp_name'];

    // storing img in local storage
    $upload = move_uploaded_file($file_data, $upload_dir);
}
// var_dump($_FILES);die;


$insert_sql = "update users set name='$users_name' , dob='$date_of_birth', gender='$gender', avatar='$avatar', role='$role', email='$email', password='$password' where id='$id'";
//var_dump($insert_sql);die;
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Updated.</a>
                    </div>';

header('Location: ../../users.php');
exit;

?>