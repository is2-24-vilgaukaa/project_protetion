<html>
<head>
<meta charset="utf-8">       
<link rel="icon" href="picture/logotip.svg">
<link rel ="stylesheet" href="style/style.css">
<link rel ="stylesheet" href="style/mediastyle.css">
<link rel ="stylesheet" href="style/styleslider.css">
<link rel ="stylesheet" href="style/modalwindow.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
<title>Sorokina Kristina</title>
</head>
<body>

<!--Прелоадер-->
<div class="preloader">
<div class="preloader__row">
<div class="preloader__item"></div>
<div class="preloader__item"></div>
</div></div>

<!--Прелоадер (скрипт)-->
<script src="script/scriptloader.js"></script>

<!--Шапка-->
<div class="head">
<a href="index.php"><img class = "sk" src="picture/log.svg"></a> <br><br>
<a href="html/about_us.html">О нас</a>
<a href="html/products.php">Товары</a>
<a href="html/profile.php">Профиль</a>
<a href="html/delivery.html">Доставка</a>
<a href="html/courses.php">Курсы</a> <br><br>
</div>

<!--Поисковая строка-->
<form action="index.php" method="post">
<div class="search"> <br>
<input class="searchInput" name="searchInput" placeholder="Введите запрос..." required>
<button class="searchBut" name="searchBut">Поиск</button>
</div></form>

<div class="infosearch">
<!--Данные для подключения к бд-->        
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*запрос пользователя*/
if(isset($_POST["searchInput"])) {
$search = $_POST["searchInput"];}

/*событие в кнопке*/
if(isset($_POST['searchBut'])) {

/*поиск запроса в бд*/    
$sql_search = "SELECT * FROM `products` 
INNER JOIN `category` ON `products`.`id_category` = `category`.`id`
WHERE `name_product` LIKE ('%$search%') OR `name_category` LIKE ('%$search%')";

/*вывод запроса*/ 
if ($res = $link->query($sql_search)) {
print("<span>По запросу ".$search." было найдено: </span> <br>"); 

/*если по запросу ничего не найдено*/
$num = mysqli_num_rows($res);
if($num == 0) {print("<span>0 запросов</span>");}   

/*вывод результата запроса*/
foreach($res as $row) {
$name = $row['name_product']; 
$category = $row['name_category'];
$img = $row['img'];
print("<a class='lake' href = 'html/products.php' alt='$category - $name'><img src='$img'></a>");
}}}?>
</div>

<!--Категории-->
<div class="divCatalog"> <br>
<span class="catalogSpan">Категории:</span> <br>
<a href="html/products.php#earrings"><button class="catalog">Серьги</button></a>
<a href="html/products.php#pendant"><button class="catalog">Кулоны</button></a>
<a href="html/products.php#tiara"><button class="catalog">Диадемы</button></a>
<a href="html/products.php#rings"><button class="catalog">Кольца</button></a>
</div></div> <br><br>

<!--Информационный блок-->
<div class="infoDiv">
<table class="infoTable">
<tr>
<td class="inf"></td>
<td class="info">
<h1 class="infoH1">Sorokina Kristina</h1>
<p class="infoP">«SK» — это интернет-магазин, в котором вы можете найти украшение на любой вкус. 
Вы можете выбрать себе необычные серьги и подобрать к ним ожерелье. 
Или же вы можете приобрести диадему своей мечты.
Если вы не хотите сильно акцентировать на себе внимание, вы можете найти элегантное нежное кольцо.
Мы будем рады вашему заказу в наше магазине.</p> 
</td>

<!--Слайдер-->
<td>
<section id="slider_bl">
<div class="wrapper">
<input checked type="radio" name="slider" id="slide1" />
<input type=radio name="slider" id="slide2" />
<input type=radio name="slider" id="slide3" />
<input type=radio name="slider" id="slide4" />
<div class="slider-wrapper">
<div class=inner> 

<article>
<div class="info bottom-right"></div>
<img src="picture/бело-голубая_диадема.jpg"/>
</article>
        
<article>
<div class="info bottom-right"></div>
<img src="picture/фиолетовый_кулон.jpg"/>
</article>
        
<article>
<div class="info bottom-right"></div>
<img src="picture/белая_диадема.jpg"/>
</article>
        
<article>
<div class="info bottom-right"></div>
<img src="picture/кулоны.jpg"/>
</article>   
</div>
</div>

<div class="slider-prev-next-control">
<label for=slide1></label>
<label for=slide2></label>
<label for=slide3></label>
<label for=slide4></label>
</div> 

</div></section></td></tr></table></div>
   
<!--Акции-->
<div class="stocks"> <br>
<span class="catalogSpan">

<!--Подключение к бд-->    
<?php 
if ($link == false) {
print("Акции временно недоступны"); }
else {
print("Акции"); }
?>      
</span> <br>  

<!--Фото изделия-->  
<table class="stocksTable">
<tr>
<td><img src="picture/img1.jpg"></td>
<td><img src="picture/img2.jpg"></td>  
<td><img src="picture/img3.jpg"></td>      
</tr>

<!--Название изделия-->   
<tr class="titleStyleBD">
<?php 
$sql_stocks_title = "SELECT * FROM `stocks` WHERE id = 1 or id = 2 or id = 3";
if ($result = $link->query($sql_stocks_title)) {
foreach($result as $row) {
$title = $row['title'];
print("<td>".$title."</td>");}}?>
</tr>

<!--Старая/новая цена изделия-->  
<tr class="titleStyleBD">
<?php 
$sql_stocks = "SELECT * FROM `stocks` WHERE id = 1 or id = 2 or id = 3";
if ($result = $link->query($sql_stocks)) {
foreach($result as $row) {
$old_price = $row['old_price'];
$new_price = $row['new_price'];
print("<td>"."Цена до акции: ".$old_price." Р ".
"<br> Цена на акции: ".$new_price." Р "."</td>");}}?>
</tr>

<!--Фото изделия-->  
<tr>
<td><img src="picture/img4.jpg"></td>
<td><img src="picture/img5.jpg"></td>  
<td><img src="picture/img6.jpg"></td>      
</tr>

<!--Название изделия-->   
<tr class="titleStyleBD">
<?php 
$sql_stocks_title = "SELECT * FROM `stocks` WHERE id = 4 or id = 5 or id = 6";
if ($result = $link->query($sql_stocks_title)) {
foreach($result as $row) {
$title = $row['title'];
print("<td>".$title."</td>");}}?>
</tr>

<!--Старая/новая цена изделия-->  
<tr class="titleStyleBD">
<?php 
$sql_stocks = "SELECT * FROM `stocks` WHERE id = 4 or id = 5 or id = 6";
if ($result = $link->query($sql_stocks)) {
foreach($result as $row) {
$old_price = $row['old_price'];
$new_price = $row['new_price'];
print("<td>"."Цена до акции: ".$old_price." Р ".
"<br> Цена на акции: ".$new_price." Р "."</td>");}}?>
</tr></table></div><br>

<!--Преимущества-->
<div class="bluefon">
<br><span class="bf">Выбирая "SK" вы получаете:</span> <br>
</div><br>

<div class="plusDiv">
<img class="plusImg" src="picture/icon1.svg">
<img class="plusImg" src="picture/icon2.svg">
<img class="plusImg" src="picture/icon3.svg">
<br></div><br>

<!--Промокод-->
<div class="promo"> <br>
<div class="css-modal-details">    
<details>
<summary>Получить промокод</summary>
<div class="cmc">
<div class="cmt"> 
<img class="fotoslide" src = "picture/promocod.svg">  
<p>промокод на скидку в 5%, действует только один раз</p>     
</div>
</div>
</details>
</div>
</div><br>

<!--Подвал-->
<div class="footer"> <br>
<img class = "sk" src="picture/log.svg"> <br>
<a href="html/about_us.html">О нас</a>
<a href="html/products.php">Товары</a>
<a href="html/profile.php">Профиль</a>
<a href="html/delivery.html">Доставка</a>
<a href="html/courses.php">Курсы</a> <br>
<img class="icon"src ="picture/icon1.png"><span>Телефон: +7 951 345 11-16</span>
<img class="icon"src ="picture/icon2.png"><span>Почта: sorokina@gmail.com</span> <br><br>
</div>

</body>
</html>