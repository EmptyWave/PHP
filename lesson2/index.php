<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html,
        body {
            height: 100%;
        }
        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 80px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php

    $a = 7;
    $b = 4;
    //Задание 3
    function sum($a,$b){
        return $a + $b;
    }
    function sub($a,$b){
        return $a - $b;
    }
    function mult($a,$b){
        return $a * $b;
    }
    function div($a,$b){
        return $a / $b;
    }
    //Задание 1
    if ($a >= 0 and $b >= 0) {
        echo "Разность:".sub($a,$b)."<br>";
    } elseif ($a < 0 and $b < 0){
        echo "Произведение:".mult($a,$b)."<br>";
    } else {
        echo "Сумма:".sum($a,$b)."<br>";
    }
    //Задание 2
    $c = 9;
    echo "Вывод знасчений начиная с {$c}: <br>";
    switch ($c) {
        case 0: echo $c++."<br>";
        case 1: echo $c++."<br>";
        case 2: echo $c++."<br>";
        case 3: echo $c++."<br>";
        case 4: echo $c++."<br>";
        case 5: echo $c++."<br>";
        case 6: echo $c++."<br>";
        case 7: echo $c++."<br>";
        case 8: echo $c++."<br>";
        case 9: echo $c++."<br>";
        case 10: echo $c++."<br>";
        case 11: echo $c++."<br>";
        case 12: echo $c++."<br>";
        case 13: echo $c++."<br>";
        case 14: echo $c++."<br>";
        case 15: echo $c++."<br>";
    }
    //Задание 4
    function mathOperation($arg1, $arg2, $operation){
        switch ($operation){
            case '+': echo sum($arg1,$arg2);break;
            case '-': echo sub($arg1,$arg2);break;
            case '*': echo mult($arg1,$arg2);break;
            case '/': echo div($arg1,$arg2);break;
        }
    }

    $arg1 = 7;
    $arg2 = 6;
    $operation = '/';
    echo "$arg1 $operation $arg2 = ";
    echo mathOperation($arg1, $arg2, $operation)."<br>";

    //Задание 5
    $year = date ( "Y" );
    $footer = "<footer>Текущий год: {$year}</footer>";
    echo $footer;

    //Задание 6
    function power($val, $pow){
        if ($pow > 1){
            $val *= power($val,$pow-1);
        }
        return $val;
    }

    $x = 4;
    $z = 7;

    echo "{$x} в степени {$z} - равно ".power(4,7);

    //Задание 7

?>
</body>
</html>