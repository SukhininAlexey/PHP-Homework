<?php
header('Content-Type: text/html; charset=utf-8');

echo (int)"Hello, world!";

// Задание 4 - вывод информации по шаблону:
$h1_01 = "Заголовище!";
$p1_01 = "Наполнение параграфа. Умные мысли, цитатки знаменитостей, и т.п.";
?>

<h1><?php echo $h1_01?></h1>
<p><?= $p1_01?></p>

<?php
// Задание 5 - обмен значений в переменных без доп. переменной tmp:
$a = 7;
$b = 12;

echo "<h4>Значения до обмена:</h4>";
printf("<p>A = %d, B = %d</p>", $a, $b);

$a += $b;
$b = $a - $b;
$a -= $b;

echo "<h4>Значения после обмена:</h4>";
printf("<p>A = %d, B = %d</p>", $a, $b);
?>