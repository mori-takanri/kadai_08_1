<?php
  if (empty($_GET["tid"]) == true) {
      $tid = "";
  } else {
      $tid = htmlspecialchars($_GET["tid"]);
  }
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました");
  }
  mysqli_set_charset($link, "utf8");
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
      <p>ニセコでホテルを販売している妄想です</p>
    </div>
   
  </header>
  <!-- ヘッダー：終了 -->
  <!-- メニュー：開始 -->
<?php include("./topmenu.php"); ?>
  <!-- メニュー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <!-- メイン：開始 -->
    <main id="main">
      <article>
        <section>
          <h2>不動産のご紹介</h2>
<?php
  if (empty($tid) == true) {
    $sql = "SELECT room_name, type_name, dayfee, main_image, room_no
      FROM room, room_type 
      WHERE room.type_id = room_type.type_id";
  } else {
    $sql = "SELECT room_name, type_name, dayfee, main_image, room_no
      FROM room, room_type 
      WHERE room.type_id = room_type.type_id
      AND room.type_id = {$tid}"; 
  }
  $result = mysqli_query($link, $sql);
  $cnt = mysqli_num_rows($result);
  if ($cnt == 0) {
    echo "<b>ご指定のお部屋は只今準備ができておりません</b>";  
  } else {
?>
          
<!-- ここにPHPスクリプトを埋め込む -->          
<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<tr>";
      echo "<td>{$row['room_name']}</td>";
      echo "<td>{$row['type_name']}</td>";
      $roomfee = number_format($row['dayfee']);
      echo "<td class='number'>&yen; {$roomfee}</td>";
      echo "<td><img class='small' src='./images/{$row['main_image']}'></td>";
      echo "<td><a href='./roomDetail.php?rno={$row['room_no']}'>詳細</a></td>";
      echo "</tr>";
    }
  }
?>
       
<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>
</body>
</html>