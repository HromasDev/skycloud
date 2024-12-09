<?php
include 'connect.php';

if (isset($_POST["username"])) {
    $userId = $_SESSION['userdata']['userid'];

    $name = $_POST['username'];
    $img = $_FILES['userimage'];

    $update = "UPDATE `users` SET `name` = '$name' WHERE `id` = '$userId'";
    $result = $link->query($update);

    if ("image" == substr($img['type'], 0, 5)) {
        $imgName = uniqid() . "." . substr($img['type'], 6);
        $update = "UPDATE `users` SET `image` = '$imgName' WHERE `id` = '$userId'";

        move_uploaded_file($img['tmp_name'], '../imgs/users/' . $imgName);

        $result = $link->query($update);

        $_SESSION["userdata"]["image"] = $imgName;
    }

    $_SESSION["userdata"]["username"] = $name;

    
    header('location: '. $_SERVER['HTTP_REFERER']);
}


if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $userId = $userId = $_SESSION['userdata']['userid'];
    $update = "UPDATE `users` SET `email` = '$email' WHERE `id` = '$userId'";
    $result = $link->query($update);
    $_SESSION["userdata"]["email"] = $email;

    header('location: '. $_SERVER['HTTP_REFERER']);

}