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
//var_dump($_SESSION);

$template = file_get_contents($dir . 'tmpl/' . template() );

	$newDate = [
        '{CONTENT}' => $content,
        '{___MSG_}' => getMsg(),
        '{__COUNT}' => !empty($_SESSION['goods']) ? count($_SESSION['goods']): "O.o",
        '{__ADMIN_GOODS}' => $_SESSION['isAdmin']=="YES"?"<li><a href=\"?page=addGoods\">Товары(Admin)</a></li>":"",
        '{__ORDER}' => $_SESSION['isAdmin']=="YES" ? "Обработка заказов":"Заказы",
        '{__LOGOUT}' => loggedIn()? "<li><a href=\"?page=auth&func=logout\">Выйти</a></li>":"",
    ];
    echo strtr($template, $newDate);




