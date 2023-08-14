<?php

include "../../../config/connection.php";
// var_dump($_POST);die;
$email = $_POST['email'];
$password = $_POST['password'];


// validation
if(empty($email) || $password==''){   
	$_SESSION['msg'] = '<div class="alert alert-danger">
                          <strong>Both!</strong> fields are required.
                        </div>';
                        // var_dump($_SESSION['msg']);die;
                        // var_dump($_POST);die;
    header('Location: ../../index.php');
    exit; 
} 



// check whether user exist or not
$sql = " select * from users where email='$email' and password='$password'";
// echo $sql;die;
$userdata = $conn->query($sql);
// $userdata = $userdata->fetch_all(MYSQLI_ASSOC);
// var_dump($userdata);die;
if(!$userdata){
	$_SESSION['msg'] = '<div class="alert alert-danger">
                          <strong>DB error!</strong>Contact your admin.
                        </div>';
                        // var_dump($_SESSION['msg']);die;
                        // var_dump($_POST);die;
    header('Location: ../../index.php');
    exit; 
}

$userdata = $userdata->fetch_all(MYSQLI_ASSOC);
$user_count = count($userdata);
// var_dump($user_count);die;


if($user_count>0){
	$_SESSION['current_user'] = $userdata[0];
    // var_dump($_SESSION['current_user']);die;

	header('Location: ../../dashboard.php');
	exit;
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger">
                          <strong>Invalid!</strong> credentials.
                        </div>';
    header('Location: ../../index.php');
    exit;
}


?>  