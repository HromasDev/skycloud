<?php
session_start();

if (!isset($_SESSION['userdata']['email'])) {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <?php
    include "components/head.php";
    ?>
</head>

<body>
    <?php
    include "components/header.php";
    ?>
    <section class="overflow-hidden">
        <div class="container">
            <div class="content">
                <div class="row pt-4">
                    <h2 class="pb-2">Смена пароля</h2>
                    <div class="pb-4">
                        В целях безопасности мы рекомендуем выбрать пароль, который ещё не использовался вами в других
                        учётных
                        записях.
                    </div>
                    <form action="core/changePassword.php" method="post">
                        <div class="d-flex flex-column pb-4">
                            <label class="mb-2" for="password">Текущий пароль</label>
                            <div class="profile-block input mb-4">
                                <input type="password" id="password" name="password" placeholder="Текущий пароль" autocomplete="off">
                            </div>

                            <label class="mb-2" for="new_password">Новый пароль</label>
                            <div class="profile-block input mb-3">
                                <input type="password" id="new_password" name="new_password" placeholder="Введите новый пароль" autocomplete="off">
                            </div>

                            <div class="profile-block input mb-3">
                                <input type="password" id="new_password_repeat" name="new_password_repeat" placeholder="Введите еще раз новый пароль" autocomplete="off">
                            </div>
                            <button class="btn btn-primary" type="submit" name="update-password">Сохранить</button>
                        </div>
                    </form>
        <p><?php
        echo $_SESSION['passwordError'];
        $_SESSION['passwordError'] = "";
        ?></p>
                </div>

            </div>
        </div>
        </div>
    </section>
    </div>
    <?php
    include "components/footer.php"
    ?>
    <script src="wow-animation/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src='main.js'></script>
</body>

</html>