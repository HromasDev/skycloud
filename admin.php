<?php
include "components/head.php";

if ($_SESSION['userdata']['status'] !== "1") {
    header("Location: index.php");
}

?>
</head>

<body>
    <?php
    include "components/header.php"
    ?>
    <div class="container content">
        <h4 class="text-center text-warning">Админ-панель</h4>
        <hr>
        <div class="panel">
            <div class="row">
                <div class="borderblock col">
                    <span class="text-center">Управление подписками</span>
                    <div class="buttons py-2">
                        <?php
                        $sql = "SELECT * FROM `subscriptions`";
                        $rows = $link->query($sql);
                        if ($rows->num_rows < 1) {
                            echo '<p class="opacity-50 text-center" style="font-size: 16px;">Нет подписок.</p>';
                        }
                        for ($i = 0; $i < $rows->num_rows; $i++) {
                            $row = $rows->fetch_assoc();;

                            echo
                            '
                                <form action="editSubscription.php" method="get">
                                    <button class="btn btn-primary" name="subscription" value=' . $row['id'] . '>Редактировать ' . $row['name'] . '</button>
                                </form>
                            ';
                        }
                        ?>
                    </div>
                </div>
                <div class="borderblock col">
                    <span class="text-center">Управление серверами</span>
                    <div class="buttons py-2">
                        <?php
                        $sql = "SELECT * FROM `servers`";
                        $rows = $link->query($sql);
                        if ($rows->num_rows < 1) {
                            echo '<p class="opacity-50 text-center" style="font-size: 16px;">Нет серверов.</p>';
                        }
                        for ($i = 0; $i < $rows->num_rows; $i++) {
                            $row = $rows->fetch_assoc();;

                            echo
                            '
                                <form action="editServer.php" method="get">
                                    <button class="btn btn-primary" name="server" value=' . $row['id'] . '>Редактировать ' . $row['name'] . '</button>
                                </form>
                            ';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="borderblock col">
                    <span class="text-center">Управление пользователями</span>

                    <div class="pb-3">
                    <form action="core/usersEdit.php" method="post">
                        <?php
                        $sql = "SELECT * FROM `users`";
                        $rows = $link->query($sql);
                        if ($rows->num_rows < 1) {
                            echo '<p class="opacity-50 text-center" style="font-size: 16px;">Нет зарегистрированных пользователей.</p>';
                        }
                        for ($i = 0; $i < $rows->num_rows; $i++) {
                            $row = $rows->fetch_assoc();;

                            echo
                            '
                            <div class="userInfo">
                                <div class="data">
                                    <div>
                                        <label>
                                            id
                                        </label>  
                                        <input type="text" name="id '.$i.'" id="id" value=' . $row['id'] . ' readonly>
                                    </div>
                                    <div>
                                        <label>
                                        email
                                        </label> 
                                        <input type="text" name="email '.$i.'" id="email" value=' . $row['email'] . ' readonly>
                                    </div>
                                </div>


                                <div class="form-check">
                                    <input type="checkbox" name="status '.$i.'" id="flexCheckDefault" ' . ($row['status'] == 1 ? "checked" : "") . '>
                                    <label>
                                        Админ
                                    </label>
                                </div>
                            </div>
                            

                            ';
                        }
                        ?>

                            <input type="hidden" id="usersCount" name="usersCount">
                            <button class="btn btn-primary" name="saveUsers">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "components/footer.php"
    ?>

    <script>

    $('#usersCount').val($('.userInfo').length);

    </script>

    <script src="wow-animation/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src=' main.js'></script>
</body>

</html>