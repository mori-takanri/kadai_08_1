<?php
  session_start();
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました：" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
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
          <h2>内覧したい物件を選択して下さい</h2>
                
<?php
  $reserveDt = $_POST['reserveDay'];	// 予約したい日付
  $_SESSION['reserve']['day'] = $reserveDt;
  $sql = "SELECT room_name,type_name,dayfee,main_image,room_no
    FROM room, room_type 
    WHERE room.type_id = room_type.type_id
    AND room.room_no NOT IN (SELECT room_no FROM reserve
    WHERE date(reserve_date) = '{$reserveDt}')";

  $result = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>{$row['room_name']}</td>";
    echo "<td>{$row['type_name']}</td>";
    $dayfee = number_format($row['dayfee']);
    echo "<td class='number'>&yen; {$dayfee}</td>";
    echo "<td><img class='small' src='./images/{$row['main_image']}'></td>";
    echo "<td><a href='./reserveDetail.php?rno={$row['room_no']}'>選択</a></td>";
    echo "</tr>";
  }
?>
       
<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>

</body>
</html>