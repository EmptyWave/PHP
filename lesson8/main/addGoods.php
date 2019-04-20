<?php
function index(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = clearStr($_POST['name']);
        $info = clearStr($_POST['info']);
        $price = clearStr($_POST['price']);
        $sql = "INSERT INTO goods(name, info, price) 
        VALUES ('$name', '$info', '$price')";
        mysqli_query(connect(), $sql);
        header('Location: ?page=addGoods');
        exit;
    }

    $content = <<<php
    <form enctype="multipart/form-data" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="info" placeholder="info">
        <input type="text" name="price" placeholder="price">
        <button type="submit">Добавить</button>
    </form>
php;
    return $content;
}