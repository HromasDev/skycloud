<?php
include 'connect.php';
if (isset($_POST["server"])) {
    $server = $_POST['server'];
    
    $select = "SELECT state FROM user_servers WHERE hash = '$server'";
    
    $find = $link->query($select);
    if ($find) {
        $row = $find->fetch_assoc();
        if($row['state'] == 'disabled') $state = 'enabled';
        else $state = 'disabled';
    
        $update = "UPDATE `user_servers` SET `state` = '$state' WHERE `hash` = '$server'";
        $result = $link->query($update);
    }   
}

?>