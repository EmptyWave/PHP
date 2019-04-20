<?php
    function sum($a,$b){return $a + $b;}
    function sub($a,$b){return $a - $b;}
    function mult($a,$b){return $a * $b;}
    function div($a,$b){return $a / $b;}
    function mathOperation($arg1, $arg2, $operation){
        switch ($operation){
            case '+': return sum($arg1,$arg2);break;
            case '-': return sub($arg1,$arg2);break;
            case '*': return mult($arg1,$arg2);break;
            case '/': return div($arg1,$arg2);break;
        }
    }
    if (empty($_GET['x1']) || empty($_GET['x2'])){
        $result = 'Не переданы аргументы';
        echo $result;
    }else{
        $result = mathOperation($_GET['x1'], $_GET['x2'], $_GET['operation']);
        echo "<b>Результат : </b>".$_GET['x1'].$_GET['operation'].$_GET['x2']."=".$result;
    }
?>