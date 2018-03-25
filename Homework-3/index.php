<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h3>Задание 1</h3>
        <?php
            echo "<div class=\"task1\" style=\"width: 300px; height: 150px; overflow-y: scroll;\">";
            $num = 0;
            while($num <= 100){
                echo $num , " ";
                $num++;
            }
            echo "</div>";
        ?>
        
        <h3>Задание 2</h3>
        <?php
            $num = 0;
            echo "<div class=\"task2\" style=\"width: 300px; height: 300px; overflow-y: scroll;\">";
            do{
                if($num == 0){
                    echo $num . " - это ноль. <br>";
                }else if($num % 2 != 0){
                    echo $num . " - нечетное число. <br>";
                }else{
                    echo $num . " - четное число. <br>";
                }
                $num++;
            }while($num <= 100);
            echo "</div>";
        ?>
        
        <h3>Задание 3</h3>
        <?php
            $cities = [
                "Московская область" => ["Москва","Зеленоград","Клин"],
                "Ленинградская область" => ["Рязань","Касимов","Скопин", "Сасово"],
                "Тульская обасть" => ["Тула","Новомосковск","Донской", "Алексин", "Кимовск"],
                "Владимирская обасть" => ["Владимир","Ковров","Муром", "Александров"],
                "Орловская обасть" => ["Орел","Ливны", "Мценск", "Кромы"],
                "Тверская обасть" => ["Тверь","Ржев","Торжок", "Кимры"],
                "Калужчкая обасть" => ["Калуга","Обнинск","Людиново", "Киров"]
            ];
            foreach ($cities as $region => $towns){
                echo "<b>" . $region . "</b>" . ": <br>";
                $citiesQtty = count($cities[$region]);
                for($i = 0; $i < $citiesQtty; $i++){
                    echo $cities[$region][$i];
                    if($i < $citiesQtty - 1){
                        echo ", ";
                    }
                }
                echo "<br>";
            }
        ?>
        
        <h3>Задание 4</h3>
        <?php
            $rusVoc = [
                "а" => "a","б" => "b","в" => "v","г" => "g","д" => "d","е" => "e","ё" => "e","ж" => "j","з" => "z","и" => "i","й" => "i","к" => "k",
                "л" => "l","м" => "m","н" => "n","о" => "o","п" => "p","р" => "r","с" => "s","т" => "t","у" => "u","ф" => "f","х" => "h","ц" => "ts",
                "ч" => "ch","ш" => "sh","щ" => "shch","ъ" => "","ы" => "y","ь" => "","э" => "e","ю" => "yu","я" => "ya",
                "А" => "A","Б" => "B","В" => "V","Г" => "G","Д" => "D","Е" => "E","Ё" => "E","Ж" => "J","З" => "Z","И" => "I","Й" => "I","К" => "K",
                "Л" => "L","М" => "M","Н" => "N","О" => "O","П" => "P","Р" => "R","С" => "S","Т" => "T","У" => "U","Ф" => "F","Х" => "H","Ц" => "Ts",
                "Ч" => "Ch","Ш" => "Sh","Щ" => "Shch","Ъ" => "","Ы" => "Y","Ь" => "","Э" => "E","Ю" => "Yu","Я" => "Ya"
            ];
            
            $rusString = "Создатель данного кода - умный, талантливый, красивый и скромный человек.";
            $engString = translitirate($rusString, $rusVoc);
            
            echo "<b>Строка на русском языке</b><br>";
            echo $rusString . "<br>";
            echo "<b>Строка после транслитерации</b><br>";
            echo $engString;
            
            function translitirate(string $expression, array $voc){
                $string = $expression;
                foreach ($voc as $rus => $eng){
                    $string = str_replace($rus, $eng, $string);
                }
                return $string;
            }
        ?>
        
        <h3>Задание 5</h3>
        <?php
            $string1Task5 = "Создатель данного кода - умный, талантливый, красивый и скромный человек.";
            $string2Task5 = underlineficate($string1Task5);
            
            echo "<b>Строка с пробелами</b><br>";
            echo $string1Task5 . "<br>";
            echo "<b>Строка с подчеркиваниями</b><br>";
            echo $string2Task5;
            
            function underlineficate(string $expression){
                return str_replace(" ", "_", $expression);
            }
        ?>
        
        <h3>Задание 6</h3>
        <?php
            $menu = [
                "Пункт 1",
                "Пункт 2",
                "Пункт 3" => [
                    "Пункт 3.1",
                    "Пункт 3.2",
                    "Пункт 3.3"
                ],
                "Пункт 4",
                "Пункт 5" => [
                    "Пункт 5.1",
                    "Пункт 5.2" => [
                        "Пункт 5.2.1",
                        "Пункт 5.2.2",
                        "Пункт 5.2.3"
                    ],
                    "Пункт 5.3"
                ],
                "Пункт 6",
                "Пункт 7"
            ];
            echo createMenu($menu);
            
            function createMenu(array $list){
                $menu = "<ul>";
                foreach($list as $key => $value){
                    $menu .= "<li>";
                    if(!is_array($list[$key])){
                       $menu .= $list[$key];
                    }else{
                        $menu .= $key;
                        $menu .= createMenu($value);
                    }
                    $menu .= "</li>";
                }
                $menu .= "</ul>";
                return $menu;
            }
        ?>
        
        <h3>Задание 7</h3>
        <?php
            for($i = 0; $i < 10; print($i++ . " ")){}
        ?>
        
        <h3>Задание 8</h3>
        <?php
            foreach ($cities as $region => $towns){
                echo "<b>" . $region . "</b>" . ": <br>";
                $citiesQtty = count($cities[$region]);
                for($i = 0; $i < $citiesQtty; $i++){
                    $check = preg_match("/^(К|к)/",$cities[$region][$i]);
                    if($check){
                        echo $cities[$region][$i] . " ";
                    }
                }
                echo "<br>";
            }
        ?>
        
        <h3>Задание 9</h3>
        <?php
            $finalString1 = "Кролики - это не только ценный мех, но и три - четыре грамма диетического легкоусвояемого мяса.";
            $finalString2 = makeURL($finalString1);
            
            echo "<b>Строка до преобразования</b><br>";
            echo $finalString1 . "<br>";
            echo "<b>Строка после преобразования</b><br>";
            echo $finalString2;
            
            function makeURL(string $expression){
                $voc = [
                "а" => "a","б" => "b","в" => "v","г" => "g","д" => "d","е" => "e","ё" => "e","ж" => "j","з" => "z","и" => "i","й" => "i","к" => "k",
                "л" => "l","м" => "m","н" => "n","о" => "o","п" => "p","р" => "r","с" => "s","т" => "t","у" => "u","ф" => "f","х" => "h","ц" => "ts",
                "ч" => "ch","ш" => "sh","щ" => "shch","ъ" => "","ы" => "y","ь" => "","э" => "e","ю" => "yu","я" => "ya",
                "А" => "A","Б" => "B","В" => "V","Г" => "G","Д" => "D","Е" => "E","Ё" => "E","Ж" => "J","З" => "Z","И" => "I","Й" => "I","К" => "K",
                "Л" => "L","М" => "M","Н" => "N","О" => "O","П" => "P","Р" => "R","С" => "S","Т" => "T","У" => "U","Ф" => "F","Х" => "H","Ц" => "Ts",
                "Ч" => "Ch","Ш" => "Sh","Щ" => "Shch","Ъ" => "","Ы" => "Y","Ь" => "","Э" => "E","Ю" => "Yu","Я" => "Ya"
                ];
                $string = $expression;
                foreach ($voc as $rus => $eng){
                    $string = str_replace($rus, $eng, $string);
                }
                $string = str_replace(" ", "_", $string);
                return $string;
            }
        ?>
    </body>
</html>
