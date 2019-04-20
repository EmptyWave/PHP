<?php
function index(){
    $del = (int)$_GET['del'];
    if (!empty($del)) {
        $item = $_SESSION['cart'][$del];
        if ($item['quantity'] === 1)
            unset($_SESSION['cart'][$del]);
        else{
            $item['quantity']--;
            $_SESSION['cart'][$del] = $item;
        }
        header("Location: ?page=cart");
    };
    $cart = $_SESSION['cart'];
    $content = "<div class='item-list'>";
    $cartTotalPrice = 0;

    foreach ($cart as $item){
        $itemTotalPrice = $item['quantity']*$item['price'];
        $cartTotalPrice += $itemTotalPrice;
        $content .= <<<php
        <div class="item" data-id="{$item['id']}">
        <h5>{$item['name']}</h5>
        <p class="item__about">Количество - {$item['quantity']}</p>
        <p class="item__about">Цена - {$item['price']}$</p>
        <p class="item__about">Общая стоимость - {$itemTotalPrice}$</p>
        <p><a href="?page=cart&del={$item['id']}">Удалить</a></p>
        </div>
php;
    }
    $content .= "</div>";
    $content .= <<<php
    <div class='item-list'>
    <p>Общая стоимость корзины = {$cartTotalPrice}$</p>
    </div>
php;

    return $content;
}