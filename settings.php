<?php
session_start();

if (!isset($_SESSION['userdata']['email'])) {
  header("Location: index.php");
}

function maskEmail($email)
{
  list($username, $domain) = explode('@', $email);
  $maskedUsername = $username[0] . str_repeat('*', max(strlen($username) - 2, 0)) . substr($username, -1);
  return $maskedUsername . '@' . $domain;
}

$maskedEmail = maskEmail($_SESSION['userdata']['email']);
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

  <div class="overlay" hidden>
    <div class="popup">
      <input type="button" value="x" id="exit" class="btn">
      <div class="contain">
        <div class="row pt-4">
          <h2 class="pb-2">Добавьте свой новый адрес электронной почты</h2>
          <div class="pb-4">
            Для обеспечения безопасности рекомендется выбрать адрес электронной почты, который ранее не использовался в
            других учетных записях.

          </div>
          <div class="d-flex flex-column pb-4">
            <form action="core/saveProfile.php" method="post">
              <label class="mb-2" for="email">Новый адрес электронной почты</label>
              <div class="profile-block input mb-4">
                <input type="email" id="email" name="email" placeholder="Email" autocomplete="off">
              </div>
              <button class="btn btn-primary" name="update">Сохранить</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <section class="overflow-hidden">

    <div class="container">

      <div class="content">

        <div class="row pt-4">

          <h2 class="pb-3">Настройки учетной записи</h2>
          <div class="notification"></div>
          <div class="col-sm">
            <div class="d-flex pb-4">

              <div class="d-flex w-100 pe-3 usernameForm">
                <div class="profile-block input me-2">
                  <div class="top-label-form">
                    <label class="pb-1" for="username">Имя пользователя</label>
                    <input type="text" id="username" name="username" value="<?= $_SESSION['userdata']['username'] ?>" autocomplete="off" readonly>
                  </div>
                </div>
                <button class="btn btn-primary changeUsername" name="update"><img style="width: 50px; height: 20px" src="imgs/edit.svg"></button>
              </div>

              <div class="d-flex w-100 ps-3">
                <div class="profile-block input me-2">
                  <div class="top-label-form">
                    <label class="pb-1" for="email">Адрес электронной почты</label>
                    <input type="text" id="email" name="email" value="<?= $maskedEmail ?>" autocomplete="off" readonly>
                  </div>
                </div>

                <button class="btn btn-primary popup-open" name="update"><img style="width: 50px; height: 20px" src="imgs/edit.svg"></button>
              </div>
            </div>

            <div class="p-3 profile-block category-button">
              <a href="password.php"><img src="imgs/lock.svg" width="25px"><b>Пароль и безопасность</b></a>
            </div>
            <div class="p-3 profile-block category-button">
              <a href="payments.php"><img src="imgs/payments.svg" width="25px"><b>Способы оплаты</b></a>
            </div>
            <div class="p-3 profile-block category-button">
              <a href="transactions.php"><img src="imgs/transactions.svg" width="25px"><b>История транзакций</a>
            </div>
            </b>
          </div>
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
    $('.popup #exit').on('click', () => {
      $('.overlay').css('opacity', '0')
      setTimeout(() => {
        $('.overlay').attr('hidden', true)
      }, 250)
    })

    $('.popup-open').on('click', () => {
      $('.overlay').attr('hidden', false)
      $('.overlay').css('opacity', '1')
    })

    $('.changeUsername').on('click', () => {
      $('.usernameForm').html(`<form action="core/saveProfile.php" method="post" class="w-100" style="display: flex">${$('.usernameForm').html()}</form>`)
      $('.changeUsername').toggleClass('btn-success');
      if ($('#username').attr('readonly')) {
        $('.changeUsername img').attr('src', 'imgs/confirm.svg')


        $('#username').attr('readonly', false);
        $('#username').css('color', 'white')
      } else {
        $('.changeUsername img').attr('src', 'imgs/edit.svg')

        $('#username').css('color', 'grey')
        $('#username').attr('readonly', true);
      }
    })

    new WOW().init();
  </script>
  <script src='main.js'></script>
</body>

</html>