<?php 
include "../../../config/connection.php";
 
// $_POST, $_GET, $_SESSION - global variable , array 

// var_dump($_POST);die;


// data prepare , id, category_name, description

$category_name = $_POST['category_name'];
$description = $_POST['description'];


if(empty($category_name) || $description==''){

	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

	header('Location: ../../forms/category/category-create.php');
	exit;
} 

 

// "insert into category(category_name,description) values('hey','test')"

$insert_sql = "insert into categories(category_name,description) values('".$category_name."','".$description."')";
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully inserted.</a>
                    </div>';

header('Location: ../../category.php');
exit;