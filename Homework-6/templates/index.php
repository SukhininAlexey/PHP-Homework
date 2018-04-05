



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
</div>
<hr>

<?php endforeach;?>