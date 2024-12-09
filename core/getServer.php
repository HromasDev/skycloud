<?php
include 'connect.php';
if (!isset($_SESSION['userdata'])) {    
    header('location: ../login.php');
} else if (isset($_GET["server"])) {
    $server = $_GET["server"];

    $hash = md5(uniqid());

    $currentDate = date('Y-m-d');
    $expires = date('Y-m-d', strtotime('+'.date('t').' days'));

    $sql = "INSERT INTO `user_servers` SET `userid` = '{$_SESSION["userdata"]["userid"]}', `server`='{$server}', `date` = '{$currentDate}', `expires` = '{$expires}', `state` = 'disabled', `hash`='{$hash}'";
    $result = $link -> query($sql);
    
    header('location: '.$_SERVER['HTTP_REFERER']);
}
?>