<?php
include 'connect.php';

if (isset($_POST["update-password"])) {
    if ($_POST["new_password"] !== $_POST["new_password_repeat"]) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
        $_SESSION['passwordError'] = "Пароли не совпадают!";
    } else {
        $userId = $_SESSION["userdata"]["userid"];

        $get_password = "SELECT `password` FROM `users` WHERE `id` = '$userId'";
        $result = $link->query($get_password);

        $current_password = $result->fetch_assoc()['password'];


        if ($current_password !== md5($_POST["password"])) {

            $_SESSION['passwordError'] = "Неверный пароль!";
        } else {
            $new_password = md5($_POST["new_password"]);
            $update = "UPDATE `users` SET `password` = '$new_password' WHERE `id` = '$userId'";
            $result = $link->query($update);
        }
    }
    header('location: ' . $_SERVER['HTTP_REFERER']);
}
