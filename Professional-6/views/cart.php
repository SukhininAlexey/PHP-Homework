
<?php foreach ($cartProducts as $key => $product): ?>
<div>
    <p>Название товара по ваниле: <?=$product['prod']->name?></p>
    <p>Количество единиц: <?=$product['qtty']?></p>
    <p>Цена единицы товара: <?=$product['prod']->price?></p>
    <p>Описание товара: <?=$product['prod']->description?></p>
    <form action="/PHP-Homework/Professional-2/public/cart/remove" method="post">
        <label>Количество: <input type="number" name="qtty"></label>
        <button type="submit" name="id" value="<?=$product['prod']->id?>">Удалить</button>
    </form>
</div>
<hr>

<?php endforeach;?>

    <form action="/PHP-Homework/Professional-2/public/cart/order" method="post">
        <button type="submit">Заказать</button>
    </form>

