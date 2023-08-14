<?php 
include "../../../config/connection.php"; 

// $_POST, $_GET, $_SESSION - global variable , array 

// var_dump($_POST);die;


// data prepare , id, category_name, description
$id=$_GET['id'];
$category_name = $_POST['category_name'];
$description = $_POST['description'];


if(empty($category_name) || $description==''){

	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

	header('Location: ../../forms/category/category-edit.php?id='.$id);
	exit;
}
 


// "insert into category(category_name,description) values('hey','test')"

$insert_sql = "update  categories set category_name='$category_name',description='$description' where id = $id";
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Updated.</a>
                    </div>';

header('Location: ../../category.php');
exit; 