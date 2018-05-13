
<?php foreach ($products as $key => $product): ?>
<div>
    <p>Название товара по ваниле: <?=$product->name?></p>
    <p>Цена товара: <?=$product->price?></p>
    <p>Описание товара: <?=$product->description?></p>
    <form action="/PHP-Homework/Professional-2/public/product/add" method="post">
        <label>Количество: <input type="number" name="qtty"></label>
        <button type="submit" name="id" value="<?=$product->id?>">Добавить</button>
    </form>
</div>
<hr>

<?php endforeach;?>