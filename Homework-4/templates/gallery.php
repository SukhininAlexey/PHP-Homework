<div>
    <?php
        if(isset($prevContent) && $prevContent){
            foreach ($prevContent as $key => $value) {
                echo "<br>";
                if($key > 1){
                    echo "<a target=\"_blank\" href=\"http://localhost/PHP-Homework/Homework-4/uploads/origin/imgBig-" . ($key - 1) . ".jpg\"><img width=\"600px\" src=\"http://localhost/PHP-Homework/Homework-4/uploads/preview/" . $value . "\"></a>";
                }
            }
        }
    ?>
</div>