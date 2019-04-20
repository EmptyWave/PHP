<?php
session_start();

include ('config.php');


$page = ! empty($_GET['page']) ? $_GET['page'] : 'index';
$func = ! empty($_GET['func']) ? $_GET['func'] : 'index';

$dir = __DIR__ . '/';

if (! file_exists($dir . $page . '.php')){
    $page = 'index';
}

include ($dir . $page . '.php');

if (! function_exists($func)){
    $func = 'index';
}
$content = $func();
getMsg();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-
beta.3/css/bootstrap.min.css" integrity="sha384-
Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .menu{
            list-style: none;
            display: flex;
            justify-content: flex-start;
        }
        .menu>li{
            padding-right: 5px;
        }
        .review{
            width: 400px;
            border: 1px solid gray;
            border-radius: 5px;
            margin: 5px;
        }
        .review>h5{
            padding: 5px;
        }
        .review>p{
            display: flex;
            padding: 5px;
            justify-content: space-between;
        }
        button{
            margin-top: 5px;
        }
        .item-list{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        .item{
            width: 262px;
            border: 1px solid pink;
            margin-top: 10px;
            border-radius: 7px;
        }
        .item:hover{
            -webkit-box-shadow: 0px 0px 20px 10px rgba(204,198,204,1);
            -moz-box-shadow: 0px 0px 20px 10px rgba(204,198,204,1);
            box-shadow: 0px 0px 20px 10px rgba(204,198,204,1);
        }
        .item>a{
            text-decoration: none;
            color: #636363;
        }
        .item>a>img{
            border-radius: 5px 5px 0 0;
        }
        .item>h5{
            padding: 5px;
        }
        .item>p{
            display: flex;
            padding: 5px;
            justify-content: space-between;
            color: black;
        }
        .item__about{
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 5px;
            white-space: nowrap;
        }
        .big_item{
            width: 920px;
            margin: 0 auto;
        }
        .big_item__img{
            display: flex;
            justify-content: center;
        }
        .big_item__about{
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <ul class="menu">
        <li><a href="?">Главная страница</a></li>
        <li><a href="?page=user">Пользователи</a></li>
        <li><a href="?page=auth">Авторизоваться</a></li>
        <li><a href="?page=reviews">Отзывы</a></li>
        <li><a href="?page=items">Товары</a></li>
        <li><a href="?page=cart">Корзина</a></li>
    </ul>
    <?= $content ?>
</body>
</html>
