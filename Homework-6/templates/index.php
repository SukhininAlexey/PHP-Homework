<script src="indexCart.js"></script>
    
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
    <div class="prod-item">
        <p> Введите количество товара: <input type="number" min="1" name="qtty" value="1"></p>
        <button onclick="addToCart()" name="prod_id" value="<?=$product["id"]?>">To cart</button>
    </div>
</div>
<hr>

<?php endforeach;?>