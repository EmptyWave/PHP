<?php
const SOL = "b07152d234b79075b9640";

function connect() {
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '', 'gbphp');
    }
    return $link;
}

function clearStr($str) {
    return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
}

function isAdmin(){
    return $_SESSION['isAdmin'] == 'YES';
}
function isUser(){
    return $_SESSION['isUser'] == 'YES';
}

function loggedIn(){
    return isAdmin()||isUser();
}

function orderState($state){
    switch ($state){
        case 1: return "В обработке";
        case 2: return "Подтвержден";
        case 3: return "Подготовка к отправке";
        case 4: return "Отправлен";
        case 5: return "Доставлен";
        case 6: return "Исполнен";
    }
}

function getMsg(){
    $msg = '';
    if (! empty($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
    return  $msg;
}

function template($param = '') {
    static $tmpl;
    if (empty($tmpl)){
        $tmpl = 'public.html';
    }
    if (! empty($param)) {
        $tmpl = $param;
    }
    return $tmpl;
}