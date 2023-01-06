<?php
  $reserveNo = htmlspecialchars($_GET["rno"]);
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました：" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");

  $sql = "SELECT customer_id FROM reserve 
     WHERE reserve_no = {$reserveNo}";

  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $customer_id = $row['customer_id'];

  $sql = "DELETE FROM reserve WHERE reserve_no = {$reserveNo} ";
  mysqli_query($link, $sql);

  $sql = "DELETE FROM customer WHERE customer_id = {$customer_id}";
  mysqli_query($link, $sql);

  mysqli_free_result($result);
  mysqli_close($link);
  header("location: ./ownerReserveList.php");
?>
