<?php 
include "../../../config/connection.php";

$id=$_GET['id'];
// var_dump($id);die;
$title = $_POST['title'];


if(empty($title)){


	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

	header('Location: ../../forms/notice/notice-edit.php?id='.$id);
	exit;
}


$insert_sql = " update notice set title = '$title'  where id=$id";
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Updated.</a>
                    </div>';

header('Location: ../../notice.php'); 
exit;

?>