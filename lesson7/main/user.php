<?php
function index(){
    return 'User';
}
function back(){
    $id = (int)$_GET['id'];
    $_SESSION['bac'][] = $id;
}