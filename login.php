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

        <div class="col mb-5 wow fadeInRight" data-wow-duration="1s">
          <h1>
            Начни играть<br>
            <span>прямо сейчас!</span>
          </h1>
          <p>
            Наш сервис мгновенно превращает практически любое устройство в игровой ПК — запускайте любимые ПК-игры даже
            на слабом компьютере или смартфоне!
          </p>
        </div>

        <div class="col wow fadeInLeft" data-wow-duration="1s">
          <div class="login">
            <div class="px-5 py-5">
              <form action="core/login.php" method="post">
                <div class="mb-4">
                  <label class="form-label">Почта</label>
                  <input type="email" name="email" class="form-control" required/>
                </div>
                <div class="mb-4">
                  <label class="form-label">Пароль</label>
                  <input type="password" name="password" class="form-control" required/>
                </div>
                <div class="mb-4"><a href="register.php">Еще не зарегистрированны?</a></div>
                <div class="mb-4"><?php if(isset($_SESSION['loginError'])) echo $_SESSION['loginError'] ?></div>
                <input id="login-button" name="submitLogin" type="submit" value="ВОЙТИ">
                <div class="text-center socials">
                  <p>или авторизуйтесь через:</p>
                  <a href="https://vk.com"><img src="imgs/vk.svg"></a>
                  <a href="https://google.com"><img src="imgs/google.svg"></a>
                  <a href="https://facebook.com"><img src="imgs/facebook.svg"></a>
                </div>
              </form>
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