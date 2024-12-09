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
          <div class="col-3">
            <div class="p-4 profile-block left-col">
              <div class="profile-edit">
                <div class="image avatar">
                  <input type="file" name="userimage" id="fileInput" style="display: none"
                    onchange="displayFileName()" />
                  <label class="btn" for="fileInput" hidden><span id="fileName">Выберете файл</span></label>
                </div>
                <input type="text" name="username" class="text-center" value="<?= $_SESSION['userdata']['username'] ?>"
                  placeholder="Имя пользователя" readonly></input>

                <button class="btn edit avatar-button" style="color: #0066FF;width: 100%;background: #181818;"
                  onclick="editProfile()">Редактировать
                  профиль</button>
              </div>
              <a class="btn avatar-button" style="background: #0066FF; color: #FFFFFF;" href="settings.php">Управление
                аккаунтом</a>
            </div>
          </div>
          <div class="col-sm">
            <div class="m-0 p-3 profile-block category-button">
              <a><img src="imgs/<?php if (isset($_SESSION['userdata']['subscribe']))
                echo 'checkmark.svg';
              else
                echo 'cross.svg' ?>" width="25px"><b>Подписка:
                  <?php if (isset($_SESSION['userdata']['subscribe']))
                echo $_SESSION['userdata']['subscribe'] . "</b> осталось " . $_SESSION['userdata']['time-remaining'] . " дн.";
              else
                echo '</b>нет.' ?>
                </a>
              </div>
              <div class="p-3 profile-block category-button">
                <a href="servers.php"><img src="imgs/servers.svg" width="25px"><b>Сервера</a>
              </div>
              <div class="p-3 profile-block category-button">
                <a href="settings.php"><img src="imgs/settings.svg" width="27px">Настройки учетной записи</a>
              </div>
              <!-- <div class="p-3 profile-block category-button">
                <a><img src="imgs/settings.svg" width="27px">Настройка темы</a>
              </div> -->
              </b>
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
    function editProfile() {
      input = $(".profile-block input")
      input.toggleClass('on');
      $(".profile-block .btn.edit").toggleClass('save');
      if (input.hasClass('on')) {
        $(".profile-block .btn.edit").text('Сохранить')
        $(".image.avatar .btn").attr('hidden', false);
        input.attr('readonly', false);
        $(".profile-block .profile-edit").html(`<form method="post" action="core/saveProfile.php" enctype="multipart/form-data">${$(".profile-block .profile-edit").html()}</form>`);
      } else {
        $(".profile-block .btn.edit").text('Редактировать профиль')
        $(".image.avatar .btn").attr('hidden', true);
        input.attr('readonly', true);

      }

    }

    new WOW().init();

    $('.image.avatar').css("background-image", "url('imgs/users/<?= $_SESSION['userdata']['image'] ?>')");
  </script>
  <script src='main.js'></script>
</body>

</html>