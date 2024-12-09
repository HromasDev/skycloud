<?php
include "components/head.php";

if (!isset($_SESSION['userdata']['email'])) {
  header("Location: index.php");
}
?>
</head>

<body>
  <?php
  include "components/header.php"
  ?>
  <div class="container content">
    <p class="text-center opacity-50">Ваши сервера</p>
    <hr>
    <div class="serverslist">
      <?php
      $userid = $_SESSION['userdata']['userid'];
      $sql = "SELECT * FROM `user_servers` WHERE `userid` = $userid";
      $rows = $link->query($sql);
      if ($rows->num_rows < 1) {
        echo '<p class="opacity-50 text-center noservers" style="font-size: 16px;">У вас нет активных серверов.</p>';
      }
      for ($i = 0; $i < $rows->num_rows; $i++) {
        $row = $rows->fetch_assoc();
        if ($row["state"] == "disabled") $state = "Вкл";
        else $state = "Выкл";

        $currentDate = date('Y-m-d');

        if (dateDiff($row["date"], $currentDate) > date('t')) {
          $hash = $row['hash'];
          $delete = "DELETE FROM `user_servers` WHERE `hash` = '$hash'";
          $link->query($delete);
        } else {
          echo
          '
            <div class="server borderblock">
              <div class="d-flex">
                <div class="col"><span class="name">' . $row['server'] . '</span></div>
                <div class="col large">
  
                <form id="' . $i . '">
                  <input type="text" name="server" value=' . $row['hash'] . ' hidden>
                  <button type="button" name="changeState" class="switch ' . $row['state'] . '" onclick="sendData(' . $i . ')">' . $state . '</button>
                </form>
  
                </div>
                <div class="col expires">
                  Cписание: ' . $row['expires'] . '
                </div>
              </div>
            </div>
              ';
        }
      }
      ?>
    </div>
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