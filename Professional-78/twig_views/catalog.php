{% for product in products %}
<div>
    <p>Название товара по твигу: {{ product.name }}</p>
    <p>Цена товара: {{ product.price }}</p>
    <p>Описание товара: {{ product.description }}</p>
</div>
<hr>
{% endfor %}
