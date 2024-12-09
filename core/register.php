<?php
include 'connect.php';

if (isset($_POST["submitReg"])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $password_r = md5($_POST['password_r']);

    if ($password_r == $password) {
        $findResult = $link -> query("SELECT * FROM `users` WHERE `email` = '$email'");
        if ($findResult->num_rows == 0) {

            // Добавление в бд
            $sql = "INSERT INTO `users`(`email`, `password`, `name`, `image`, `status`) VALUES ('$email', '$password', '$email', 'default.svg', 0)";
            $result = $link -> query($sql);

            // Экспорт добавленных данных в сессию
            $export =  mysqli_fetch_assoc($link->query("SELECT * FROM `users` WHERE `email` = '$email'"));
        
            $_SESSION["userdata"] = [
                "userid" => $export['id'],
                "status" => $export['status'],
                "email" => $export['email'],
                "username" => $export['name'],
                "image" => $export['image'],
            ];
            
            header('location: ../index.php');
        } else {
            $_SESSION['regError'] = 'Этот пользователь уже существует!';
            header('location: ../register.php');
        }
    } else {
        $_SESSION['regError'] = 'Пароли должны совпадать!';
        header('location: ../register.php');
    }
}
?>