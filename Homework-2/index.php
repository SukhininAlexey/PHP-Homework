<?php
header('Content-Type: text/html; charset=utf-8');

$a = 2;
$b = -2;
$resTask1 = task1($a, $b);

define('SUM', 'sum');
define('MUL', 'mul');
define('DIF', 'dif');
define('DIV', 'div');

$year = gmdate("Y", (time() + 3600*3));

function task1(int $x, int $y){
    if($x >= 0 && $y >= 0){
        return $x - $y;
    }else if($x < 0 && $y < 0){
        return $x * $y;
    }else {
        return $x + $y;
    }
}

function task3Sum(int $x, int $y){
    return $x + $y;
}

function task3Dif(int $x, int $y){
    return $x - $y;
}

function task3Mul(int $x, int $y){
    return $x * $y;
}

function task3Div(int $x, int $y){
    return $x / $y;
}

function task4(int $x, int $y, string $operation){
    // Ни один break никогда не выполнится. Но я пока так оставлю. Не знаю, ломают ли пальны за удаления break после return в case :-)
    switch ($operation){
        case SUM:
            return task3Sum($x, $y);
            break;
        case DIF:
            return task3Dif($x, $y);
            break;
        case MUL:
            return task3Mul($x, $y);
            break;
        case DIV:
            return task3Div($x, $y);
            break;
        default:
            return false;
            break;
    }
}

function task6Power($val, $pow){
    if($pow > 0){
        return $val * task6Power($val, ($pow - 1));
    }else if($pow < 0){
        return (1 / $val) * task6Power($val, ($pow + 1));
    }else{
        return 1;
    }
}

function task7Time(){
    $timeH = gmdate("h", (time() + 3600*3));
    $timeM = gmdate("i", (time() + 3600*3));
    $timeHWord = '';
    $timeMWord = '';
    if($timeH % 100 >=5 && $timeH % 100 <= 20){
        $timeHWord = 'часов';
    }else if($timeH % 10 == 0 || $timeH % 10 >= 5){
        $timeHWord = 'часов';
    }else if($timeH % 10 >= 2 && $timeH % 10 <= 4){
        $timeHWord = 'часа';
    }else{
        $timeHWord = 'час';
    }
    if($timeM % 100 >=5 && $timeM % 100 <= 20){
        $timeMWord = 'минут';
    }else if($timeM % 10 == 0 || $timeM % 10 >= 5){
        $timeMWord = 'минут';
    }else if($timeM % 10 >= 2 && $timeM % 10 <= 4){
        $timeMWord = 'минуты';
    }else{
        $timeMWord = 'минута';
    }
    return ("$timeH $timeHWord $timeM $timeMWord");
}
?>


<h3>Задание 1</h3>
<p>Начальные значения переменных: <?= $a?> и <?= $b?></p>
<p>Результат операции: <?= $resTask1?></p>

<h3>Задание 3</h3>
<p>Начальные значения переменных: <?= $a?> и <?= $b?></p>
<p>Сумма: <?= task3Sum($a, $b)?></p>
<p>Разница: <?= task3Dif($a, $b)?></p>
<p>Произведение: <?= task3Mul($a, $b)?></p>
<p>Частное от деления: <?= task3Div($a, $b)?></p>

<h3>Задание 4</h3>
<p>Начальные значения переменных: <?= $a?> и <?= $b?></p>
<p>Сумма: <?= task4($a, $b, 'sum')?></p>
<p>Разница: <?= task4($a, $b, 'dif')?></p>
<p>Произведение: <?= task4($a, $b, 'mul')?></p>
<p>Частное от деления: <?= task4($a, $b, 'div')?></p>

<h3>Задание 5</h3>
<p>Текущий год: <?= $year?></p>

<h3>Задание 6</h3>
<p>Начальные значения переменных: <?= $a?> и <?= $b?></p>
<p>Возведение <?= $a?> в степень <?= $b?>: <?= task6Power($a, $b)?></p>

<h3>Задание 7</h3>
<p>Результат работы функции: <?= task7Time()?></p>
