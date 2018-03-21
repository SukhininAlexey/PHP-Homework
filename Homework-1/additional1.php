<?php
// Обязательное заклинание
header('Content-Type: text/html; charset=utf-8');

//Поучил время по Гривичу и сдвинул к Москве на +3 часа. Остальные переменные просто задал
$dateTime = gmdate("d\-F\-Y H\:i", (time() + 3600*3));
$name = "Алексей";
$age = 28;

// Собираю строку по заданию. В задание внутри строки нет тегов <br> - поэтому вывоэу всё в одну строку
$string1 = sprintf("Меня зовут %s. Через год мне будет %d лет, а еще через год %d лет. На моих часах сейчас: %s", $name, ($age+1), ($age+2), $dateTime);

// Поиск с заменой и вывод
$string2 = str_replace(" ", "_", $string1);

// Поиск через регулярное выражение и вывод через аргумент in/out. Массивы мы не проходили... Но ладно, так и быть :-)
preg_match("/(На моих часах сейчас:)\s\d+\-[a-zA-Z]+\-\d+\s\d+\:\d+/", $string1, $string3);
$string3 = $string3[0]; // Хочу, чтобы массива в переменной было одно строковое значение результата поиска всего шаблона
?>

<p><?= $string1?></p>
<p><?= $string2?></p>
<p><?= $string3?></p>

