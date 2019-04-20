<?php

function index(){
    $a = 'ada';
    $content = <<<php
    <img src="img/img-66df5.jpg" width="200">
    <form method="post" action="?page=auth&func=auth">
        <input type="text" name="login" placeholder="login">
        <input type="text" name="password" placeholder="password">
        <input type="submit">
    </form>
    <script> var a = '$a'</script>
    <script src="script.js"></script>
php;
    if (isAdmin()){
        $content = <<<php
    <a href="?page=auth&func=logout">Exit</a>
php;
    }
    return $content;
}
function auth(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (empty($_POST['login']) || empty($_POST['password'])){
            $_SESSION['msg'] = 'Не все параметры переданы';
            header('Location: ?page=auth');
        }
        $login = clearStr($_POST['login']);

        $sql = "SELECT id, name, login, password, role, dob 
                FROM users 
                WHERE login = '$login'";
        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        $password = md5(md5($_POST['password'] . SOL));
//        $passwordSql = '21db9c15a75962a0865d5a39fe7fb9ff';
        $passwordSql = $row['password'];
        if ($password == $passwordSql){
            $_SESSION['isAdmin'] = 'YES';
        }
    }
    $_SESSION['msg'] = 'Что-то пошло не так';
    header('Location: ?page=auth');
    exit;

}

function logout(){
    session_destroy();
    header('Location: ?page=auth');
    exit;
}