<?php
include "components/head.php";

if ($_SESSION['userdata']['status'] !== "1") {
    header("Location: index.php");
}


$server = $_GET['server'];

$sql = "SELECT * FROM `servers` WHERE `id` = '$server'";
$rows = $link->query($sql);
$row = $rows->fetch_assoc();



if (isset($_POST['update'])) {
    $sql = "UPDATE `servers` SET `name`='{$_POST['name']}',`cpu`='{$_POST['cpu']}',`ram`='{$_POST['ram']}',`hdd`='{$_POST['hdd']}',`ddos`='{$_POST['ddos']}',`ftp`='{$_POST['ftp']}',`mysql`='{$_POST['mysql']}',`domain`='{$_POST['domain']}',`ssh`='{$_POST['ssh']}',`price`='{$_POST['price']}' WHERE `id` = '{$_POST['id']}'";
    $link->query($sql);

    $sql = "SELECT * FROM `servers` WHERE `id` = '{$_POST['id']}'";
    $rows = $link->query($sql);
    $row = $rows->fetch_assoc();

    $_SESSION['notifications']['update'] = 'Данные успешно обновлены!';
}
?>
</head>

<body>
    <?php
    include "components/header.php"
        ?>
    <div class="container content col-sm-7 editForm">

        <h4 class="text-center">Управление
            <?= $row['name'] ?>
        </h4>
        <hr>
        <form action="" method="post">
            <div class="d-flex justify-content-between">
                <span class="fieldname">id</span>
                <input type="text" name="id" autocomplete="off" value="<?= $row['id'] ?>" readonly>
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Имя сервера</span>
                <input type="text" name="name" autocomplete="off" value="<?= $row['name'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">CPU</span>
                <input type="text" name="cpu" autocomplete="off" value="<?= $row['cpu'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">RAM</span>
                <input type="text" name="ram" autocomplete="off" value="<?= $row['ram'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">HDD</span>
                <input type="text" name="hdd" autocomplete="off" value="<?= $row['hdd'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">DDoS Защита</span>
                <input type="text" name="ddos" autocomplete="off" value="<?= $row['ddos'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">S / FTP доступ</span>
                <input type="text" name="ftp" autocomplete="off" value="<?= $row['ftp'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Базы MySQL</span>
                <input type="text" name="mysql" autocomplete="off" value="<?= $row['mysql'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Буквенный IP</span>
                <input type="text" name="domain" autocomplete="off" value="<?= $row['domain'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">SSH Root доступ</span>
                <input type="text" name="ssh" autocomplete="off" value="<?= $row['ssh'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Цена</span>
                <input type="text" name="price" autocomplete="off" value="<?= $row['price'] ?>">
            </div>

            <button class="btn btn-primary" name="update">Обновить</button>
            <div class="notification">

            </div>
        </form>
    </div>
    <?php
    include "components/footer.php";
    ?>

    <script src="wow-animation/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src='main.js'></script>
</body>

</html>