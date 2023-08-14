<?php
include("../../../config/connection.php");

$id = $_GET['id'];
$name = $_POST['name'];
$url = $_POST['url'];
$status = $_POST['status'];
if(empty($name) || $url=='' || $status==''){
	$_SESSION['msg'] = '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';
    header('Location: ../../forms/links/links-edit.php');
    exit;
}

$insert_sql = "update links set name='$name', url='$url', status='$status' where id=$id";
$conn->query($insert_sql);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Updated.</a>
                    </div>';

header('Location: ../../links.php');
exit;
?>