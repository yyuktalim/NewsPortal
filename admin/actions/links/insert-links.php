<?php
include("../../../config/connection.php");

$name = $_POST['name'];
$url = $_POST['url'];
$status = $_POST['status'];

if(empty($name) || $url=='' || $status==''){

	$_SESSION['msg'] = '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.
                       </div>';
	header('Location: ../../forms/links/links-create.php');
	exit;
}

$insert_sql = " insert into links(name, url, status) values('".$name."','".$url."','".$status."')";
$conn->query($insert_sql);
// var_dump($insert_sql);die;
$_SESSION['msg'] = '<div class="alert alert-success">
                   <strong>Success!</strong> Successfully inserted.
                   </div>';

header('Location: ../../links.php');
exit;
?>    