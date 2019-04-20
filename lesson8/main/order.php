<?php

function index()
{
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $order = clearStr($_POST['order']);
    header("Location: ?page=order&order={$order}");
  }else $order = (int)$_GET['order'];


  if (loggedIn()){
    if (isAdmin()){
      $sql = "SELECT id, fio, tel, adress, info, state FROM zakaz";
      $res = mysqli_query(connect(), $sql);
      $content = "<h1>Активные заказы</h1>";
      $content .= "<hr>";
      while ($row = mysqli_fetch_assoc($res)) {
        $amount = 0;
        $goods = json_decode($row['info'], 'assoc');
        //var_dump($goods);
        $state = orderState($row['state']);
        $content .= <<<php
            <div>
			<h1>№ {$row['id']}</h1>
			<h3>Состояние: {$state}</h3>
			<p>{$row['fio']}</p>
			<p>{$row['tel']}</p>
			<p>{$row['adress']}</p>
      <hr>
php;
        $content .= "<h5>Товары</h5>";
        foreach ($goods as $good) {
          $content .= "<p>{$good['name']} Кол-во: {$good['count']}</p>";
          $amount += $good['price'];
        }
        $content .= "Общая стоимость: {$amount}р.";
        $content .= "</div><hr><hr>";
      }
    }else{
      $userId = $_SESSION['UserId'];
      $sql = "SELECT id, fio, tel, adress, info, state FROM zakaz where userid = $userId";
      $res = mysqli_query(connect(), $sql);
      $row = mysqli_fetch_assoc($res);

      $amount = 0;
      $goods = json_decode($row['info'], 'assoc');
      $state = orderState($row['state']);
      $content = <<<php
      <div>
        <h1>№ {$row['id']}</h1>
        <h3>Состояние: {$state}</h3>
        <p>{$row['fio']}</p>
        <p>{$row['tel']}</p>
        <p>{$row['adress']}</p>
        <hr>
php;
      $content .= "<h5>Товары</h5>";
      foreach ($goods as $good) {
        $content .= "<p>{$good['name']} Кол-во: {$good['count']}</p>";
        $amount += $good['price'];
      }
      $content .= "Общая стоимость: {$amount}р.";
      $content .= "</div><hr><hr>";

    }
  }elseif($order !== 0) {
    $sql = "SELECT id, fio, tel, adress, info, state FROM zakaz where id = $order";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);

    $amount = 0;
    $goods = json_decode($row['info'], 'assoc');
    $state = orderState($row['state']);
    $content = <<<php
      <div>
        <h1>№ {$row['id']}</h1>
        <h3>Состояние: {$state}</h3>
        <p>{$row['fio']}</p>
        <p>{$row['tel']}</p>
        <p>{$row['adress']}</p>
        <hr>
php;
    $content .= "<h5>Товары</h5>";
    foreach ($goods as $good) {
      $content .= "<p>{$good['name']} Кол-во: {$good['count']}</p>";
      $amount += $good['price'];
    }
    $content .= "Общая стоимость: {$amount}р.";
    $content .= "</div><hr><hr>";
  }else{
    $content = <<<php
    <form enctype="multipart/form-data" method="post">
        <input type="number" name="order" placeholder="Order number">
        <button type="submit">Поиск</button>
    </form>
php;
  }
  return $content;
}
