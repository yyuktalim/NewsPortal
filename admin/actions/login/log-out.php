<?php 
session_start();
// var_dump($_SESSION['current_user']);die;
session_destroy();

header('Location: ../../index.php');
exit;

?>   