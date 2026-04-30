<!DOCTYPE html>
<html>
<head>
    <title>Каталог - Redline Motors</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<ul>
    <li><a href="index.php">Главная</a></li>
</ul>
<a href="logout.php">Выйти</a>


<hr>
<select id="filter">
    <option value="all">Все</option>
    <option value="sport">Спортивные</option>
    <option value="family">Семейные</option>
</select>

<div class="car" data-price="120000" data-category="sport">
<h2>Porsche 911</h2>
<img src="images/porsche911.jpg" width="300">
<p><a href="porsche911.php">Подробнее</a></p>
<button class="add-to-cart">Добавить в корзину</button>
</div>

<div class="car" data-price="90000" data-category="sport">
<h2>BMW M4 Competition</h2>
<img src="images/bmw_m4.jpg" width="300">
<p><a href="bmw_m4.php">Подробнее</a></p>
<button class="add-to-cart">Добавить в корзину</button>
</div>

<div class="car" data-price="110000" data-category="family">
<h2>Audi RS6</h2>
<img src="images/audi_rs6.jpg" width="300">
<p><a href="audi_rs6.php">Подробнее</a></p>
<button class="add-to-cart">Добавить в корзину</button>
</div>

<h2>Корзина</h2>

<div id="cart"></div>

<p id="total">Итого: 0</p>

<button id="pay">Оплатить</button>
<button id="clear">Очистить корзину</button>

<hr>

<p><small>&copy; Все права защищены</small></p>

<script src="script.js"></script>

</body>
</html>
