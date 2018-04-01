<?php
$id = (int)$_GET["id"];

$connection = mysqli_connect("localhost", "root", "", "PHP_hw5");
$res = mysqli_query($connection, "SELECT id, origin_path, views FROM pics_table WHERE id = {$id}");
$row = mysqli_fetch_assoc($res);
$views = (int)$row["views"] + 1;
mysqli_query($connection, "UPDATE pics_table SET views = {$views} WHERE id = {$id}");
mysqli_close($connection);

echo "<img src=\"{$row["origin_path"]}\" width=\"1400px\"><br>";
echo "<p>Просмотров: {$views}</p>";




