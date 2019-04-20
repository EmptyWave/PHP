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
    function getOperation($inputStr, $operations){
        foreach ($operations as $operator){
            $arguments = explode($operator ,$inputStr);
            if (count($arguments) > 1) {
                return $operator;
            }
            return "Не верная операция!";
        }
    }
    $operations = ['+','-','*','/'];
    $operation = getOperation($_GET['express'],$operations);
    if (strlen($operation) == 1){
        $arguments = explode($operation ,$_GET['express']);
        $result = mathOperation($arguments[0], $arguments[1], $operation);
        echo "<b>Результат : </b>".$arguments[0].$operation.$arguments[1]."=".$result."<br>";
    }else
        echo $operation;
?>