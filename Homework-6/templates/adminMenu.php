<form action="" enctype="multipart/form-data" method="post">
    <p>Название товара: <input type="text" name="name"></p>
    <p>Цена товара: <input type="number" name="price"></p>
    <p>Картинка товара: <input type="file" name="file"></p>
    <p>Категория: <select name="type">
            <?php foreach ($options as $key => $option): ?>
            <option value="<?=$option["id"]?>"><?=$option["name"]?></option>
            <?php endforeach;?>
    </select></p>
    <p>Описание</p>
    <textarea rows="10" cols="45" name="description"></textarea>
    <input type="submit">
</form>


