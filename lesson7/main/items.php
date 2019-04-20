<?php

function index(){
    $item = (int)$_GET['item'];
    if (!empty($item)) addItemToCart($item);

    $sql = "SELECT id, name, price, about, `img-min`
        FROM items
        ORDER BY id DESC";
    $res = mysqli_query(connect(), $sql);
    $content = "<div class='item-list'>";

    while($row = mysqli_fetch_assoc($res)) {
        $content .= <<<php
    <div class="item" data-id="{$row['id']}" data-img="{$row['img-max']}">
    <a href="?page=item&open={$row['id']}">
    <img src="{$row['img-min']}" alt="">
    </a>
    <h5>{$row['name']}</h5>
    <div class="item__about">{$row['about']}</div>
    <p><span>{$row['price']}$</span><a href="?page=items&item={$row['id']}">buy</a></p>
    </div>
php;
    }
    $content .= "</div>";
    return $content;
}

function addItemToCart($id){
    $sql = "SELECT id, name, price FROM items WHERE id = $id";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);
    if (empty($_SESSION['cart'][$id])){
        $item = ['id' => "{$row['id']}",
            'name' => "{$row['name']}",
            'price' => "{$row['price']}",
            'quantity' => 1];
        $_SESSION['cart'][$id] = $item;
    }else{
        $item = $_SESSION['cart'][$id];
        $item['quantity']++;
        $_SESSION['cart'][$id] = $item;
    }
    header("Location: ?page=items");
}





