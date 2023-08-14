<?php
include "../../../config/connection.php";


$id = $_GET['id'];


$conn->query('delete from categories where id='.$id);

$_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Deleted.</a>
                    </div>';
header('Location: ../../category.php');
exit;    