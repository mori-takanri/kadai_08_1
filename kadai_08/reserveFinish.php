<?php
session_start();
if (isset($_SESSION['reserveNo']) == false) {
    header("location: ./index.php");
    exit;
}
$reserveNo = $_SESSION['reserveNo'];
unset($_SESSION['reserveNo']);
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
      <p></p>
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
          <h2>予約完了</h2>
          <p>予約が完了しました。以下の予約番号を控えておいてください。</p>
          <h3>予約情報</h3>
          <table class="input">
            <tr><th>予約番号</th><td><?php echo $reserveNo; ?></td></tr>
          </table>
          <br>
          <p>当日はお気をつけてお出かけください。心よりお待ちいたしております。</p>
          <a class="submit_a" href="./index.php">トップページへ</a>
        </section>
      </article>
    </main>
    
</body>
</html>
