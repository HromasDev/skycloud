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
          <h3>Настройки учетной записи</h3>
          
          <div class="col-sm">
            <div class="p-3 profile-block category-button">
              <a href="servers.html"><img src="imgs/servers.svg" width="25px"><b>Способы оплаты</b></a>
            </div>
            <div class="p-3 profile-block category-button">
              <a href="servers.html"><img src="imgs/transactions.svg" width="25px"><b>История транзакций</a>
            </div>
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
    new WOW().init();
  </script>
  <script src='main.js'></script>
</body>

</html>