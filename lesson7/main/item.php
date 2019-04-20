<?php
function index(){
    $open = (int)$_GET['open'];
    if (empty($open)) {
        header('Location: ?page=items');
    }
    $item = (int)$_GET['item'];
    if (!empty($item)) addItemToCart($item);

    $sql = "SELECT id, name, price, about, `img-max` FROM items WHERE id = $open";
    $res = mysqli_query(connect(), $sql);
    $row = mysqli_fetch_assoc($res);

    $title = 'Товар';
    $content = <<<php
<div class="big_item">
    <div class="big_item__img">
        <img src="{$row['img-max']}">
    </div>
    <div class="big_item__about">
        <h3>{$row['name']}</h3>
        <p>{$row['about']}</p>
        <h5>{$row['price']} $</h5>
        <a href="?page=item&item={$row['id']}"> BUY </a>
    </div>
</div>
php;
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
    header("Location: ?page=item&open={$id}");
}