<?php
include 'connect.php';
if (!isset($_SESSION['userdata'])) {
    header('location: ../login.php');
} else if (isset($_GET["subscribe"])) {
    $subscribe = $_GET["subscribe"];

    $currentDate = date('Y-m-d');
    $search = "SELECT * FROM `user_subscriptions` WHERE `userid` = '{$_SESSION["userdata"]["userid"]}'";
    $searchResult = $link -> query($search);

    if($searchResult->num_rows == 0) {
        $sql = "INSERT INTO `user_subscriptions` SET `userid` = '{$_SESSION["userdata"]["userid"]}', `subscription`='{$subscribe}', `date` = '{$currentDate}'";
        $result = $link -> query($sql);
    } else {
        $sql = "UPDATE `user_subscriptions` SET `subscription`='{$subscribe}', `date` = '{$currentDate}' WHERE `userid` = '{$_SESSION["userdata"]["userid"]}'";
        $result = $link -> query($sql);
    }


    header('location: '.$_SERVER['HTTP_REFERER']);

    $_SESSION['userdata']['subscribe'] = $subscribe;
}
?>