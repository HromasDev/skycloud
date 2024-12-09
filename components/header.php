<header class="py-4 position-fixed">
    <a href="index.php"><img src="imgs/logo.svg" width="200"></a>
    <div class="links">
      <a href="contacts.php"><img src="imgs/contacts.svg" width="25px">Контакты</a>

      <?php if(isset($_SESSION['userdata'])) { ?>
        <a href="servers.php"><img src="imgs/servers.svg" width="25px">Мои сервера</a>
        <?php if($_SESSION['userdata']['status'] == "1") {?>
        <a href="admin.php"><img src="imgs/admin.svg" width="25px">Админ-панель</a><?php } ?>
        <div class="dropdown">
          <button class="dropbtn">
            <a href="profile.php"><img src="imgs/users/<?= $_SESSION["userdata"]["image"] ?>" width="25px"><?= $_SESSION["userdata"]["username"] ?></a>
          </button>
          <div class="dropdown-content">
            <a>Подписка: <?php
              if(isset($_SESSION['userdata']['subscribe'])) {
                echo $_SESSION['userdata']['subscribe'];
              } else echo 'нет';
            ?>.</a>
            <a href="core/logout.php">Выйти</a>
          </div>
        </div>
      <?php } else { ?>
        <a href="login.php"><img src="imgs/login.svg" width="25px">Войти</a>
      <?php } ?>
      </div>
</header>