
<?php foreach ($products as $key => $product): ?>
<div>
    <p>Название товара: <?=$product->name?></p>
    <p>Цена товара: <?=$product->price?></p>
    <p>Описание товара: <?=$product->description?></p>
</div>
<hr>

<?php endforeach;?>