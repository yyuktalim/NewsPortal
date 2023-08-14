<?php 
include "../../../config/connection.php";

$users_name = $_POST['name'];
$date_of_birth = $_POST['dob'];
$gender = $_POST['gender'];
$avatar = '';
$role = $_POST['role'];
$email = $_POST['email'];
$password = $_POST['password'];
// var_dump($_FILES);die;

if(empty($users_name) || $date_of_birth=='' || $gender=='' || $role=='' || $email=='' || $password==''){

	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

	header('Location: ../../forms/users/users-create.php');
	exit;
}

if(isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])){
	$image_name = date('Tmdhis');
	$image_ext = strtolower(pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION));
	$avatar = $image_name.'.'.$image_ext;

	$upload_dir = 'uploads/'.$avatar;
	$file_data = $_FILES['avatar']['tmp_name'];

	$upload = move_uploaded_file($file_data, $upload_dir); 
}


$insert_sql = "insert into users(name, dob, gender, avatar, role, email, password) values('".$users_name."', '".$date_of_birth."', '".$gender."', '".$avatar."', '".$role."', '".$email."', '".$password."')";
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully inserted.</a>
                    </div>';

header('Location: ../../users.php');

?> 