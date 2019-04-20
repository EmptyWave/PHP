<?php
function index()
{
    if (empty($_SESSION['goods'])) {
        return 'Пуста';
    }

    $content = '';
    foreach ($_SESSION['goods'] as $id => $good) {
        $content .= <<<php
<h2>{$good['name']}</h2>
<p>{$good['price']}р.</p>
<p>
    <a href="?page=backet&func=del&id={$id}">-</a>    
        {$good['count']}
    <a href="?page=backet&func=add&id={$id}">+</a>
</p>
php;
    }

    $content .= <<<php
    <h2>Заказать</h2>
<form method="post" action="?page=backet&func=zakaz">
    <input name="fio" placeholder="fio">
    <input name="tel" placeholder="tel">
    <input name="adress" placeholder="adress">
    <input type="submit">
</form>  
php;
    return $content;
}

function add()
{
    $id = (int)$_GET['id'];
    $msg = 'Что-то пошло не так...';
    if (!empty($id)) {
        $sql = "SELECT id, name, info, price FROM goods WHERE id = $id";
        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        if (!empty($row)) {
            $item = [
                'price' => $row['price'],
                'name' => $row['name'],
            ];
            if (empty($_SESSION['goods'][$id])) {
                $item['count'] = 1;
                $_SESSION['goods'][$id] = $item;
            } else {
                $_SESSION['goods'][$id]['count'] += 1;
            }
            $msg = 'Товар добавлен';
        }
    }
    if ($_SERVER['HTTP_REFERER'] == 'http://public/?page=backet') {
        $msg = '';
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo count ($_SESSION['goods']);
        exit;
    }

    $_SESSION['msg'] = $msg;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function del()
{
    $id = (int)$_GET['id'];
    $msg = 'Что-то пошло не так...';
    if (!empty($id)) {
        if (!empty($_SESSION['goods'][$id])) {
            if ($_SESSION['goods'][$id]['count'] != 1) {
                $_SESSION['goods'][$id]['count'] -= 1;
            } else {
                unset($_SESSION['goods'][$id]);
            }
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function addajax(){
    add();
}

function zakaz() {
    $msg = 'Что-то пошло не так...';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fio = clearStr($_POST['fio']);
        $userId = loggedIn()? ['UserId']: NULL;
        $tel = clearStr($_POST['tel']);
        $adress = clearStr($_POST['adress']);
        $info = json_encode(array_values($_SESSION['goods']), JSON_UNESCAPED_UNICODE );
        $sql = "INSERT INTO zakaz(fio, userid, tel, adress, info, state) 
                  VALUES ('$fio', '$userId', '$tel', '$adress', '$info', '1')";
        mysqli_query(connect(), $sql);
        unset($_SESSION['goods']);
        $msg = 'Ваш заказ принят';
        $sql = "SELECT id FROM zakaz WHERE fio = $fio";
        $res = mysqli_query(connect(), $sql);
        $row = mysqli_fetch_assoc($res);
        header("Location: ?page=order&order={$row['id']}");
    }else header('Location: ?page=order');

    $_SESSION['msg'] = $msg;

    exit;
}