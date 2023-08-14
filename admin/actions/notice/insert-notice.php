 <?php

 include ("../../../config/connection.php");

// var_dump($_POST);die;
 $notice_name = $_POST['title'];
 // var_dump($_POST);die;

 if(empty($notice_name)){
 	$_SESSION['msg']= '<div class="alert alert-danger">
                        <strong>Validation Error!</strong> Fields are required.</a>
                    </div>';

 	header('Location: ../../forms/notice/notice-create.php');
 	exit;

 }

 $insert_sql = " insert into notice(title) values('".$notice_name."')";
 $res = $conn->query($insert_sql);

// if($res){
// 	$msg = "Successfully Inserted.";
// } else {
// 	$msg = "Something Went Wrong.";
// }
// $_SESSION['msg'] = $msg;

 $_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully inserted.</a>
                    </div>';

header('Location: ../../notice.php');
exit;

?>

