<?php
  session_start();
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました：" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
  $roomNo = $_SESSION['reserve']['roomno'];
  $sql = "SELECT room_name  FROM room  WHERE  room_no = {$roomNo}";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $roomName = $row['room_name'];	// 部屋名称
  $reserveDay = $_SESSION['reserve']['day'];// 予約日

  $dname   = $_SESSION['reserve']['dname'];
  $dtelno  = $_SESSION['reserve']['dtelno'];
  $dmail   = $_SESSION['reserve']['dmail'];
  $reserveNumber = $_SESSION['reserve']['reserveNumber'];
  $checkin = $_SESSION['reserve']['checkin'];
  $message = $_SESSION['reserve']['message'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/style.css" type="text/css">
  <title>森不動産</title>
</head>
<body>
  <!-- ヘッダー：開始-->
  <header id="header">
    <div id="pr">
      <p>ニセコでホテルを販売している妄想です</p>
    </div>
   
  
  <nav id="menu">
    <ul>
      <li><a href="./index.php">ホーム</a></li>
      <li><a href="./roomList.php">不動産の紹介</a></li>
      <li><a href="./reserveDay.php">内覧予約</a></li>
    </ul>
  </nav>
  
<!-- 各ページスクリプト挿入場所 -->
      <section>
        <form action="./reserveInsert.php" method="post">
        <h2>ご予約（最終確認）</h2>
        <p>予約内容をご確認後、よろしければ予約確定ボタンを押してください。</p>
        <h3>予約情報</h3>
        <table class="input">
          <tr><th>希望物件の名称</th><td><?php echo $roomName; ?></td></tr>
          <tr><th>内覧日</th><td><?php echo $reserveDay; ?></td></tr>
        </table>
        <br>
        <h3>代表者情報</h3>
        <table class="input">
          <tr><th>代表者氏名</th><td><?php echo $dname; ?></td></tr>
          <tr><th>連絡先電話番号</th><td><?php echo $dtelno; ?></td></tr>
          <tr><th>メールアドレス</th><td><?php echo $dmail; ?></td></tr>
        </table>
        <br>
        <h3>予約詳細情報</h3>
        <table class="input">
          <tr><th>家族人数</th><td><?php echo $reserveNumber; ?>人</td></tr>
          <tr><th>内覧予定時間</th><td><?php echo $checkin; ?></td></tr>
          <tr><th>連絡事項</th><td><?php echo $message; ?></td></tr>
        </table>
        <br>
        <input class="submit_a" type="submit" value="予約確定">
        <input class="submit_a" type="button" value="前の画面に戻る" onclick="history.back();">
        </form>
      </section>
      </article>
    </main>
    
<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>
</body>
</html>
