<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calc</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
    <p>Операнд 1: <input type="number" name="oper1"></p>
    <p>Операция: <select name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
    </select></p>
    <p>Операнд 2: <input type="number" name="oper2"></p>
    <input type="submit">
</form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $oper1 = (int)$_POST["oper1"];
    $oper2 = (int)$_POST["oper2"];
    $operation = $_POST["operation"];
    $result;
    
    switch ($operation){
        case "+":
            $result = $oper1 + $oper2;
            break;
        case "-":
            $result = $oper1 - $oper2;
            break;
        case "*":
            $result = $oper1 * $oper2;
            break;
        case "/":
            if($oper2){
                $result = $oper1 / $oper2;
            }else{
                $result = "Divided by zero!";
            }
            break;
    }

echo "<p>Результат: " . $oper1 . " " . $operation . " " . $oper2 . " = " . $result . "</p>";    
}
?>




