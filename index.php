<?php
include "components/head.php";
?>

</head>

<body>
  <?php
  include "components/header.php";
  ?>

  <div class="video-container">
    <video class="video" autoplay muted loop>
      <source
        src="games.mp4"
        type="video/mp4">
    </video>
  </div>

  <div class="container content">
    <div class="block-start wow fadeInUp" data-wow-duration="1.5s">
      <h1>ПОПУЛЯРНЫЕ ИГРЫ</h1>
      <h1>ВСЕГДА РЯДОМ</h1>
      <p>Играй в самые популярные новинки на слабом ПК прямо в браузере. <br>Тебе не обязательно покупать игру для её
        запуска, достаточно оплатить игровое время <br>на платформе туманного гейминга SkyCloud!</p>
    </div>
    <div class="block">
      <h1 class="h1-center wow fadeInUp" data-wow-duration="2s">НАШИ ПРЕДЛОЖЕНИЯ</h1>
      <div class="d-flex columns">
        <?php
        $sql = "SELECT * FROM `subscriptions`";
        $rows = $link->query($sql);

        $wowduration = 1;
        ;
        for ($i = 0; $i < $rows->num_rows; $i++) {
          $row = $rows->fetch_assoc();
          $wowduration += 0.25;
          echo

            '

          <div class="col wow fadeInUp" data-wow-duration="' . $wowduration . 's">
          <div class="borderblock">
            <h1>' . $row['name'] . '</h1>
            <div class="description">
              <span>
                <char>+ </char>Качество: ' . $row['quality'] . '.
              </span>
              <span>
                <char>+ </char>Настройки игры: ' . $row['settings'] . '.
              </span>
              <span>
                <char>+ </char>Лимит в день: ' . $row['limit'] . '.
              </span>
              <span>
                <char>' . ($row['no-ad'] == 1 ? '+' : '-') . ' </char>Отсутствие рекламы: ' . ($row['no-ad'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['priority'] == 1 ? '+' : '-') . ' </char>Приоритетный доступ: ' . ($row['priority'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['library'] == 1 ? '+' : '-') . ' </char>Встроенная библиотека: ' . ($row['library'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['server'] !== 'нет' ? '+' : '-') . ' </char>Игровой сервер: ' . $row['server'] . '.
              </span>
            </div>
            <h5 class="cost">' . $row['price'] . ' руб. / месяц.</h5>
            <form action="core/getSubscribe.php" method="get">
              <input class="subscribe-button" type="submit" value="ПОДПИСАТЬСЯ"></input>
              <input type="text" name="subscribe" value="' . $row['name'] . '" hidden>
            </form>
          </div>
        </div>

          ';
        }
        ?>
      </div>
    </div>
    <div class="block-right">
      <img src="imgs/server.svg"><br>
      <h1>ИГРАЙТЕ ВМЕСТЕ</h1>
      <h1>СО СВОИМИ ДРУЗЬЯМИ</h1>
      <p>Вам не обязательно создавать сервер самому - мы сделаем это за вас, достаточно оплатить сервер на
        платформе игровых серверов SkyCloud!</p>
    </div>
    <div class="block wow fadeInUp" data-wow-duration="2s">
      <h1 class="h1-center">ИГРОВЫЕ СЕРВЕРА</h1>
      <div class="d-flex columns">
        <?php
        $sql = "SELECT * FROM `servers`";
        $rows = $link->query($sql);

        $wowduration = 1;

        for ($i = 0; $i < $rows->num_rows; $i++) {
          $row = $rows->fetch_assoc();

          $wowduration += 0.25;
          echo

            '

          <div class="col wow fadeInUp" data-wow-duration="' . $wowduration . 's">
          <div class="borderblock">
            <h1>' . $row['name'] . '</h1>
            <div class="description">
              <span>
                <char>+ </char>CPU: ' . $row['cpu'] . '
              </span>
              <span>
                <char>+ </char>RAM: ' . $row['ram'] . '
              </span>
              <span>
                <char>+ </char>HDD: ' . $row['hdd'] . '
              </span>
              <span>
                <char>' . ($row['ddos'] == 1 ? '+' : '-') . ' </char>DDoS Защита: ' . ($row['ddos'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['ftp'] == 1 ? '+' : '-') . ' </char>S / FTP доступ: ' . ($row['ftp'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['mysql'] == 1 ? '+' : '-') . ' </char>Базы MySQL: ' . ($row['mysql'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['domain'] == 1 ? '+' : '-') . ' </char>Буквенный IP: ' . ($row['domain'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
              <span>
                <char>' . ($row['ssh'] == 1 ? '+' : '-') . ' </char>SSH Root доступ: ' . ($row['ssh'] == 1 ? 'Есть' : 'Нет') . '.
              </span>
            </div>
            <h5 class="cost">' . $row['price'] . ' руб. / месяц.</h5>
            <form action="core/getServer.php" method="get">
              <input class="subscribe-button" type="submit" value="ПОДПИСАТЬСЯ"></input>
              <input type="text" name="server" value="' . $row['name'] . '" hidden>
            </form>
          </div>
        </div>

          ';
        }
        ?>
      </div>
    </div>
    <div class="block text-center">
      <h1>Что-то пошло не так?</h1>
      <p>Если вы нашли баг, какую-либо проблему или просто хотите задать вопрос, вы всегда можете обраться <a
          href="contacts.html">к нам</a>. В
        наших интересах помочь каждому клиента в любой ситуации.</p>
    </div>
  </div>

  <script src="wow-animation/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>
  <script src='main.js'></script>
  <?php
  include "components/footer.php";
  ?>
  <style>
  footer {
    position: relative;
  }
</style>
</body>

</html>