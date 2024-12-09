<?php
include 'connect.php';

if (isset($_POST["submitLogin"])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $findResult = $link->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    if ($findResult->num_rows > 0) {
        // Экспорт добавленных данных в сессию
        $export =  mysqli_fetch_assoc($link->query("SELECT * FROM `users` WHERE `email` = '$email'"));
        
        $_SESSION["userdata"] = [
            "userid" => $export['id'],
            "status" => $export['status'],
            "email" => $export['email'],
            "username" => $export['name'],
            "image" => $export['image'],
        ];
        
        // Получение подписки
        $getSubscribe =  mysqli_fetch_assoc($link->query("SELECT * FROM `subscriptions` WHERE `id` = {$_SESSION["userdata"]["userid"]}"));
        $_SESSION["userdata"]["subscribe"] = $getSubscribe['subscription'];
        
        header('location: ../index.php');
    } else {
        $_SESSION['loginError'] = 'Неверный логин или пвароль!';
        header('location: ../login.php');
    }
}
