<h4><?=$message?></h4>
<?php foreach ($products as $key => $product): ?>
<div>
    <a target="_blank" href="product.php?id=<?=$product["id"]?>">
        <img src="<?=$product["preview_path"]?>">
    </a>
    <p>Название товара: <?=$product["name"]?></p>
    <p>Цена товара: <?=$product["price"]?></p>
    <p>Просмотров: <?=$product["views"]?></p>
    <p>Описание товара: <?=$product["description"]?></p>
    <p>Категория товара: <?=$product["catName"]?></p>
    <p>Количество единиц товара: <?=$product["qtty"]?></p>
    <form action="" enctype="multipart/form-data" method="post">
        <button type="submit" name="prod_id" value="<?=$product["id"]?>">Удалить товар</button>
    </form>
</div>
<hr>

<?php endforeach;?>