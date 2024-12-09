<?php
include 'connect.php';

function getStatus($link)
{
    $userid = $_SESSION['userdata']['userid'];
    $select = "SELECT `status` FROM `users` WHERE `id` = $userid";
    $result = $link->query($select);

    $status = $result->fetch_assoc()['status'];
    $_SESSION['userdata']['status'] = $status;
}


if(isset($_SESSION['userdata'])) {
    getStatus($link);
}
?>