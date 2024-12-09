<?php
include 'connect.php';

function dateDiff($d1, $d2)
{
    return round(abs(strtotime($d1) - strtotime($d2)) / 86400);
}

function getTimeRemaining($db)
{
    $userid = $_SESSION['userdata']['userid'];
    $select = "SELECT `date` FROM `user_subscriptions` WHERE `userid` = $userid";
    $result = $db->query($select);

    $currentDate = date('Y-m-d');
    $date = $result->fetch_assoc()['date'];

    if(dateDiff($date, $currentDate) > date('t')) {
        $delete = "DELETE FROM `user_subscriptions` WHERE `userid` = $userid";
        $result = $db->query($delete);

        // session cleaning
        unset($_SESSION['userdata']['subscribe']);
    } else {
        // set remaining time
        $_SESSION['userdata']['time-remaining'] = date('t') - dateDiff($date, $currentDate);

    }
}


if(isset($_SESSION['userdata']['subscribe'])) {
    getTimeRemaining($link);
}

?>