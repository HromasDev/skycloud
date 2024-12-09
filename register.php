<?php
  session_start();

  if(isset($_SESSION['userdata']['email'])) {
    header("Location: index.php");
  }
?>


<?php 
  include "components/head.php";
?>
</head>

<body>
<?php
    include "components/header.php"
?>
  <section class="overflow-hidden">
    <style>
      #BC {
        background-size: 100%;
      }

      .login .form-control {
        background-color: rgba(0, 0, 0, 0.416);
        color: rgb(255, 255, 255);
        border: 1px solid rgba(255, 255, 255, 0.226);
      }
    </style>

    <div class="container block">
      <div class="row align-items-center">
        <div class="col wow fadeInRight" data-wow-duration="1s">
          <div class="login">
            <div class="px-5 py-5">
              <form action="core/register.php" method="post">
                <div class="mb-4">
                  <label class="form-label">Почта</label>
                  <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="mb-4">
                  <label class="form-label">Пароль</label>
                  <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="mb-4">
                  <label class="form-label">Повторите пароль</label>
                  <input type="password" name="password_r" class="form-control" required/>
                </div>
                <div class="d-flex justify-content-center mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Подписаться на рассылку
                  </label>
                </div>
                <input id="login-button" name="submitReg" type="submit" value="РЕГИСТРАЦИЯ">
                <p><?= $_SESSION['regError'] ?></p>
              </form>
            </div>
          </div>
        </div>

        <div class="col mb-5 wow fadeInLeft" data-wow-duration="1s">
          <h1>
            Начни играть<br>
            <span>прямо сейчас!</span>
          </h1>
          <p>
            Наш сервис мгновенно превращает практически любое устройство в игровой ПК — запускайте любимые ПК-игры даже
            на слабом компьютере или смартфоне!
          </p>
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


  <script>
    function getRandomInt(max) {
      return Math.floor(Math.random() * Math.floor(max));
    }
    var body = new Document();
    document.body.style.backgroundRepeat = "no-repeat"
    document.body.style.backgroundImage = "url('imgs/backgrounds/" + getRandomInt(15) + ".jpg')";
  </script>
</body>

</html>