 <?php
 
 include "../../../config/connection.php";

 $id = $_GET['id'];
 
 // delete uploaded file
 $sql = "SELECT avatar from news where id=".$id;
 $img = $conn->query($sql);
 $img = $img->fetch_all(MYSQLI_ASSOC);
 $img_del = $img[0]['avatar']; 
 $delete_dir = 'uploads/'.$img_del;
 unlink($delete_dir); 
 
 $conn->query('delete from news where id='.$id);
  $_SESSION['msg']= '<div class="alert alert-success">
                        <strong>Success!</strong> Successfully Deleted.</a>
                    </div>';


header('Location: ../../news.php');
exit;                    



 ?>