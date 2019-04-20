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

function getMsg(){
    if (! empty($_SESSION['msg'])){
        echo  $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
}