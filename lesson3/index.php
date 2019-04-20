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
        ul{
            list-style: none;
            display: flex;
        }
        li{
            margin-left: 15px;
        }
    </style>
</head>
<body>
<?php

//Task 1
echo " <---- Task 1 ----> <br>";

$str = "";
$i = 0;
while ($i <= 100){
    if ($i%3 !== 0) $str = $str."{$i} ";
    if ($i%20 === 0 && $i !== 0) $str = $str."<br>";
    $i++;
}
echo $str;

//Task 2
echo " <---- Task 2 ----> <br>";

$i = 0;
do{
    if ($i === 0){
        echo $i." - это ноль.<br>";
    }elseif ($i % 2 === 0){
        echo $i." - четное число.<br>";
    }else{
        echo $i." - нечетное число.<br>";
    }
    $i++;
}while($i <= 10);

//Task 3
echo " <---- Task 3 ----> <br>";

$country = [
    "Московская область" => ["Москва","Подольск","Реутов"],
    "Ленинградская область" => ["Санкт-Петербург","Всеволожск","Кронштадт"],
    "Хакасия Республика" => ["Абаза","Абакан","Черногорск"],
    "Мурманская Область" => ["Мурманск","Апатиты","Заполярный"],
    "Краснодарский Край	" => ["Краснодар","Сочи","Новороссийск"],
];

$str = "";
foreach ($country as $district => $cities){
    $str = "{$district}: <br>";
    foreach ($cities as $city){
        if ($city === end($cities)){
            $str = $str."{$city}<br>";
        }else{
            $str = $str."{$city}, ";
        }
    }
    echo $str;
}

//Task 4
echo " <---- Task 4 ----> <br>";

$trans = [
    "А"=>"A", "Б"=>"B", "В"=>"V", "Г"=>"G", "Д"=>"D", "Е"=>"E", "Ё"=>"E", "Ж"=>"J", "З"=>"Z", "И"=>"I", "Й"=>"Y",
    "К"=>"K", "Л"=>"L", "М"=>"M", "Н"=>"N", "О"=>"O", "П"=>"P", "Р"=>"R", "С"=>"S", "Т"=>"T", "У"=>"U", "Ф"=>"F",
    "Х"=>"H", "Ц"=>"C", "Ч"=>"CH", "Ш"=>"SH", "Щ"=>"SH", "Ы"=>"I", "Э"=>"E", "Ю"=>"YU", "Я"=>"YA",
    "а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e", "ё"=>"e", "ж"=>"j", "з"=>"z", "и"=>"i", "й"=>"y",
    "к"=>"k", "л"=>"l", "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u", "ф"=>"f",
    "х"=>"h", "ц"=>"c", "ч"=>"ch", "ш"=>"sh", "щ"=>"sh", "ъ"=>"", "ы"=>"i", "ь"=>"'", "э"=>"e", "ю"=>"yu", "я"=>"ya"
];

$textRu = "Мой дед родился в Кронштадте, моя жена – ленинградка, так что в Петербурге я чувствую себя не совсем чужим. 
Впрочем, в России трудно найти человека,в чьей жизни этот город ничего бы не значил. 
Все мы так или иначе связаны с ним, а через него друг с другом.

В Петербурге мало зелени, зато много воды и неба. 
Город раскинулся на равнине, и небо над ним необъятно. 
Можно подолгу наслаждаться спектаклями, которые на этой сцене разыгрывают облака и закаты. 
Актерами управляет лучший на свете режиссер – ветер. 
Декорации из крыш, куполов и шпилей остаются неизменными, но никогда не надоедают.";
/*foreach ($trans as $key => $liter) {
    //$textRu = str_ireplace ($key,$liter, $textRu);

}*/
function transliteration($text,$mappingArr){
    $textArr = str_split($text);
    $newText = "";
    $symbol = "";
    $i = 0;
    foreach ($textArr as $char){
        $symbol = $symbol.$char;//почему-то только комбинация двух символов считается полноценным символом
        $i++;
        if ($symbol === " " || $symbol === "," || $symbol === "." ||
            $symbol === "–" || $symbol === "\r\n"){
            $newText = $newText.$symbol;
            $symbol = "";
            $i = 0;
            continue;
        }
        if ($i === 2){
            $i = 0;
            foreach ($mappingArr as $key => $liter){
                if ($symbol == $key) {
                    $newText = $newText.$liter;
                    $symbol = "";
                    break;
                }
            }
        }
    }
    return $newText;
}
//$textRu = strtr ($textRu, $trans);
$textRu = transliteration($textRu, $trans);
echo $textRu."<br>";

//Task 5
echo " <---- Task 5 ----> <br>";

$textEn = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
Aliquid aspernatur autem eius eligendi est incidunt ipsa obcaecati pariatur, 
quibusdam voluptatibus.";
function underline($text){
    $textArr = str_split($text);
    $newText = "";
    foreach ($textArr as $char){
        if ($char === " "){
            $newText = $newText."_";
        }else{
            $newText = $newText.$char;
        }
    }
    return $newText;
}

//$newTextEn = str_replace(" ","_", $textEn)."<br>";
$newTextEn = underline($textEn);
echo $newTextEn."<br>";

//Task 6
echo " <---- Task 6 ----> <br>";

//Task 7
echo " <---- Task 7 ----> <br>";

for ($j = 0; $j < 10; print $j."<br>", $j++);

//Task 8
echo " <---- Task 8 ----> <br>";

foreach ($country as $district => $cities){
    $str = "";
    foreach ($cities as $city){
        if (substr($city, 0,2) === "К") $str = $str."{$city}<br>";
    }
    echo $str;
}

//Task 9
echo " <---- Task 9 ----> <br>";
$textRu = "Мой дед родился в Кронштадте, моя жена – ленинградка, так что в Петербурге я чувствую себя не совсем чужим. 
Впрочем, в России трудно найти человека,в чьей жизни этот город ничего бы не значил. 
Все мы так или иначе связаны с ним, а через него друг с другом.";
function translitUnderLine($text,$mappingArr){
    $textArr = str_split($text);
    $newText = "";
    $symbol = "";
    $i = 0;
    foreach ($textArr as $char){
        $symbol = $symbol.$char;//почему-то только комбинация двух символов считается полноценным символом
        $i++;
        if ($symbol === " "){
            $newText = $newText."_";
            $symbol = "";
            $i = 0;
            continue;
        }elseif ($symbol === "," || $symbol === "." ||
            $symbol === "–" || $symbol === "\r\n"){
            $newText = $newText.$symbol;
            $symbol = "";
            $i = 0;
            continue;
        }
        if ($i === 2){
            foreach ($mappingArr as $key => $liter){
                if ($symbol == $key) {
                    $newText = $newText.$liter;
                    $symbol = "";
                    $i = 0;
                    break;
                }
            }
        }
    }
    return $newText;
}
$newText = translitUnderLine($textRu,$trans);
echo $newText."<br>";

//Task 10
echo " <---- Task 10 ----> <br>";
// "в углу таблицы должен стоять 0" - не очень понял этот момент
$table = [];
echo "<ul>";
for ($i = 0; $i<=10; $i++){
    for ($j = 1; $j<=10; $j++){
        $m = $i*$j;
        $table[$i] = $table[$i]."{$i} * {$j} = {$m}<br>";
    }
    echo "<li>{$table[$i]}";
}
echo "</ul>";

?>
</body>
</html>
