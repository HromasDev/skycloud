<?php
include 'connect.php';
if (isset($_POST["saveUsers"])) {
    for ($i=0; $i < $_POST["usersCount"]; $i++) { 
        $userId = $_POST["id_".$i]; 
       
        isset($_POST["status_".$i]) ? $status = 1 : $status = 0;
        $update = "UPDATE `users` SET `status`='$status' WHERE `id` = '$userId'";
        $result = $link->query($update);
    }
    header('location: '. $_SERVER['HTTP_REFERER']);
}

?>