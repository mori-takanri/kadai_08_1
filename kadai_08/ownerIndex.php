<?php
session_start();
$loginerr = "";
if (isset($_SESSION["loginerr"])) {
    $loginerr = "<p style='color: red;'>".$_SESSION["loginerr"]."</p>";
    unset($_SESSION["loginerr"]);
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="./css/style.css" rel="stylesheet" type="text/css">
  <title>森不動産</title>
</head>
<body>
  <!-- ヘッダー：開始-->
  <header id="header">
    <div id="pr">
    <a class="submit_a" href="./topmenu.php">申込画面へ</a>
    
    </div>
    <h1><a href="./index.php"></a></h1>
    <div id="contact">
   </div>
  </header>
  <!-- ヘッダー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id ="contents">
    <h2>管理ログイン画面</h2>
    <p>管理者のIDとパスワードを入力して下さい</p>
    <form method="post"action="./ownerCheck.php">
    <table class="host">
      <tr>
        <th>管理者ID</th>
        <td><input type="text"name="id"></td>
      </tr>
      <tr>
      <th>パスワード</th>
      <td><input type="password"name="pass"></td>
      </tr>
    </table>
  <?php echo $loginerr; ?>
    
    <input class="submit_a" type="submit"value="ログイン">
    </form>
  </div>

</body>
</html>