<?php
    // Начальное состояние
    $lab = [
        [1,1,1,1,0,1,1,1,1,1],
        [1,1,0,0,0,1,0,1,1,1],
        [1,1,0,1,1,0,0,1,0,1],
        [1,0,0,0,0,0,1,1,0,1],
        [1,1,1,1,0,1,0,0,0,1],
        [1,0,1,0,0,1,0,1,1,1],
        [1,0,0,0,1,1,0,0,0,1],
        [1,0,1,1,1,1,0,1,0,1],
        [1,0,0,0,0,0,0,1,0,1],
        [1,1,1,1,0,1,1,1,1,1]
    ];
    
    $point = [9,4,"u"];
    
    $direction = [
        "u" => [[-1,0],[0,1]],
        "r" => [[0,1],[1,0]],
        "d" => [[1,0],[0,-1]],
        "l" => [[0,-1],[-1,0]]
    ];
    
    $continue = true;
    
    echo getLab($lab, $point);
    
    // Движок алгоритма. Ну как движок... "Движок"...
    while($continue){
        $currentPos = [$point[0], $point[1]];
        $fwdPos = [($currentPos[0] + $direction[$point[2]][0][0]),($currentPos[1] + $direction[$point[2]][0][1])];
        $rightPos = [($currentPos[0] + $direction[$point[2]][1][0]),($currentPos[1] + $direction[$point[2]][1][1])];
        
        if($lab[$rightPos[0]][$rightPos[1]]){
            if($lab[$fwdPos[0]][$fwdPos[1]]){
                $point[2] = rotate($point, "l");
            }else{
                $point[0] = $fwdPos[0];
                $point[1] = $fwdPos[1];
            }
        }else{
            $point[2] = rotate($point, "r");
            $point[0] = $rightPos[0];
            $point[1] = $rightPos[1];
        }
        $continue = !(($point[0] == 0)&&($point[1] == 4));
        echo getLab($lab, $point);
    }
    
    function rotate(array $point, string $direction){
        if($direction == "l"){
            switch($point[2]){
                case "u":
                    return "l";
                    break;
                case "l":
                    return "d";
                    break;
                case "d":
                    return "r";
                    break;
                case "r":
                    return "u";
                    break;
            }
        }else{
            switch($point[2]){
                case "u":
                    return "r";
                    break;
                case "r":
                    return "d";
                    break;
                case "d":
                    return "l";
                    break;
                case "l":
                    return "u";
                    break;
            }
        }
    }
    
    
    function getLab(array $lab, array $point){
        $table = "<table>";
        foreach($lab as $row => $value){
            $table .= "<tr>";
            foreach($lab[$row] as $cell => $value){
                
                $table .= "<td ";
                if($point[0] == $row && $point[1] == $cell){
                    $table .= "class=\"{$point[2]}\">";
                    switch ($point[2]){
                        case "u":
                            $table .= "&#9650";
                            break;
                        case "r":
                            $table .= "&#9654";
                            break;
                        case "d":
                            $table .= "&#9660";
                            break;
                        case "l":
                            $table .= "&#9664";
                            break;
                    }
                    $table .= "</td>";
                     //. $point[2] . "</td>"
                }else if($value){
                    $table .= "class=\"wall\">" . $value . "</td>";
                }else{
                    $table .= "class=\"pass\">" . $value . "</td>";
                }

            }
            $table .= "</tr>";
        }
        $table .= "</table>";
        return $table;
    }
?>

<style>
    table{
        margin-bottom: 20px; 
        border-collapse: collapse;
    }
    td{
        padding: 0;
        box-sizing: border-box;
        height: 25px;
        width: 25px;
        overflow: hidden;
        border: 1px solid grey;
        color: transparent;
    }
    .wall{
        background-color: blue;
    }
    .pass{
        background-color: whitesmoke;
    }
    .u, .r, .d, .l{
        line-height: 24px;
        color: black;
        background-color: red;
        text-align: center;
        vertical-align: middle;
        font-size: 20px;
    }
</style>

