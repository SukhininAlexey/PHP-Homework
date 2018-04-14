<script src="indexCart.js"></script>

<h4><?=$message?></h4>
<button onclick="makeOrder()" name="order-button">Разместить заказ</button>
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
    <p>Количество единиц товара: <span class="qtty"><?=$product["qtty"]?></span></p>
    <div class="delete-items">
        <p><b>Удаление товаров из корзины</b></p>
        <p>Введите количество товара на удаление: <input type="number" min="1" max="<?=$product["qtty"]?>" name="qtty" value="1"></p>
        <button onclick="removeFromCart()" name="prod_id" value="<?=$product["id"]?>">Удалить товар</button>
    </div>
</div>
<hr>

<?php endforeach;?>