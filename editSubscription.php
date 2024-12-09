<?php
include "components/head.php";

if ($_SESSION['userdata']['status'] !== "1") {
    header("Location: index.php");
}


$server = $_GET['subscription'];

$sql = "SELECT * FROM `subscriptions` WHERE `id` = '$server'";
$rows = $link->query($sql);
$row = $rows->fetch_assoc();



if (isset($_POST['update'])) {
    $sql = "UPDATE `subscriptions` SET `name`='{$_POST['name']}',`quality`='{$_POST['quality']}',`settings`='{$_POST['settings']}',`limit`='{$_POST['limit']}',`no-ad`='{$_POST['no-ad']}',`priority`='{$_POST['priority']}',`library`='{$_POST['library']}',`server`='{$_POST['server']}',`price`='{$_POST['price']}' WHERE `id` = '{$_POST['id']}'";
    $link->query($sql);

    $sql = "SELECT * FROM `subscriptions` WHERE `id` = '{$_POST['id']}'";
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

        <h4 class="text-center">Управление <?= $row['name'] ?></h4>
        <hr>
        <form action="" method="post">
            <div class="d-flex justify-content-between">
                <span class="fieldname">id</span>
                <input type="text" name="id" autocomplete="off" value="<?= $row['id'] ?>" readonly>
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Имя подписки</span>
                <input type="text" name="name" autocomplete="off" value="<?= $row['name'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Качество</span>
                <input type="text" name="quality" autocomplete="off" value="<?= $row['quality'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Настройки игры</span>
                <input type="text" name="settings" autocomplete="off" value="<?= $row['settings'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Лимит в день</span>
                <input type="text" name="limit" autocomplete="off" value="<?= $row['limit'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Отсутствие рекламы</span>
                <input type="text" name="no-ad" autocomplete="off" value="<?= $row['no-ad'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Приоритетный доступ</span>
                <input type="text" name="priority" autocomplete="off" value="<?= $row['priority'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Встроенная библиотека</span>
                <input type="text" name="library" autocomplete="off" value="<?= $row['library'] ?>">
            </div>

            <div class="d-flex justify-content-between">
                <span class="fieldname">Игровой сервер</span>
                <input type="text" name="server" autocomplete="off" value="<?= $row['server'] ?>">
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