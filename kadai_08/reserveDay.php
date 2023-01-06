<?php
session_start();
if (isset($_SESSION['reserve'])) {
    unset($_SESSION['reserve']);
}
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
    
  </header>
 
  <nav id="menu">
    <ul>
      <li><a href="./index.php">ホーム</a></li>
      <li><a href="./roomList.php">不動産の紹介</a></li>
      <li><a href="./reserveDay.php">内覧予約</a></li>
    </ul>
  </nav>
  
  <div id="contents">
    <!-- メイン：開始 -->
    <main id="main">
      <article>
  <!-- 各ページスクリプト挿入場所 -->
        <section>
          <h2>内覧日検索</h2>
         
          <form method="post" action="reserveRoomList.php" >
            <table>
              <tr>
                <th>内覧予定日</th>
                <td><input type="date" name="reserveDay" 
                           value="<?php echo date('Y-m-d'); ?>" 
                           min="<?php echo date('Y-m-d'); ?>" required></td>
              </tr>
            </table>
          <input class="submit_a" type="submit" value="検索">
          </form>
        </section>
      </article>
    </main>
   
</body>
</html>