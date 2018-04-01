<div>
    <?php
    
        $connection = mysqli_connect("localhost", "root", "", "PHP_hw5");
        $res = mysqli_query($connection, "SELECT id, preview_path FROM pics_table ORDER BY views DESC");
        
        
        
        while ($id = mysqli_fetch_assoc($res)) {
            $content = "<a target=\"_blank\" href=\"photo.php?id={$id["id"]}\"><img width=\"600px\" src=\"{$id["preview_path"]}\"></a>";
            echo $content, "<br>";
        }
        mysqli_close($connection);
    ?>
</div>