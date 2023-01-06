<?php
  $rno = htmlspecialchars($_GET["rno"]);
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
  
<?php include("./topmenu.php"); ?>
 
  <div id="contents">
   
<?php
  $sql = "SELECT room_name, information, main_image, image1, image2,
        image3, type_name, dayfee, amenity FROM room, room_type  
        WHERE room.type_id = room_type.type_id  
        AND room.room_no = {$rno}"; 
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
    <main id="main">
      <article>
        <section>
          <h2>不動産の詳細</h2>
          <h3>『<?php echo $row['room_name']; ?>』</h3>
          <p>
<?php echo $row['information']; ?>
          </p>
          <table>
            <tr>
              <td><img class="middle" src="./images/<?php echo $row['main_image']; ?>"></td>
              <td><img class="middle" src="./images/<?php echo $row['image1']; ?>"></td>
            </tr>
            <tr>
              <td><img class="middle" src="./images/<?php echo $row['image2']; ?>"></td>
              <td><img class="middle" src="./images/<?php echo $row['image3']; ?>"></td>
            </tr>
          </table>
         
            
   

<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>
</body>
</html>>