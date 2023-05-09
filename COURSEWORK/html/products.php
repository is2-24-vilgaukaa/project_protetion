<html>
<head>
<meta charset="utf-8">   
<link rel="icon" href="../picture/logotip.svg">
<link rel ="stylesheet" href="../style/style.css">
<link rel ="stylesheet" href="../style/modalwindow.css">
<link rel ="stylesheet" href="../style/mediastyle.css">
<link rel ="stylesheet" href="../style/animationstyle.css">
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
<script src="../script/scriptloader.js"></script>

<!--Шапка-->    
<div class="head">
<a href="../index.php"><img class = "sk" src="../picture/log.svg"></a> <br><br>
<a href="../html/about_us.html">О нас</a>
<a href="../html/products.php">Товары</a>
<a href="../html/profile.php">Профиль</a>
<a href="../html/delivery.html">Доставка</a>
<a href="../html/courses.php">Курсы</a> <br><br>
</div>

<!--Название раздела (новинки)-->
<div class="bluefon"><br><span class="bf">Новинка "Звездная ночь"</span><br></div>

<!--Анимированный слайдер-->
<div class="sliderFon"> <br>
<div class="container_slider">
<img class="photo_slider" src="../picture/picture1.jpg">
<img class="photo_slider" src="../picture/picture2.jpg">
<img class="photo_slider" src="../picture/picture3.jpg">
<img class="photo_slider" src="../picture/picture4.jpg"> 
</div> <br>
</div>

<!--Название раздела (новинки)-->
<div class="bluefon"><br><a name="up"><span class="bf">Товары</span></a><br></div><br>

<!--Категории-->
<div class="divCatalog">
<a href="#earrings"><button class="catalog">Серьги</button></a>
<a href="#pendant"><button class="catalog">Кулоны</button></a>
<a href="#tiara"><button class="catalog">Диадемы</button></a>
<a href="#rings"><button class="catalog">Кольца</button></a>
</div></div>

<!--СЕРЬГИ-->
<!--Заголовок-->
<div class="stocks"> <br>
<a name="earrings"><span class="catalogSpan">Серьги</span><br></a>
<table class="stocksTable">

<!--Фото изделия-->   
<tr>
<td><img src="../picture/синие_серьги.jpg"> </td>
<td><img src="../picture/кулон_серьги.jpg"></td>
<td><img src="../picture/желтые_серьги.jpg"></td>
</tr>

<!--Подключение к БД--> 
<tr>   
<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);
?>       

<!--Об изделии-->   
<?php 
$sql_product = "SELECT * FROM `products` WHERE id = 1 or id = 2 or id = 3";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
print("<td>".$name."<br>"."Цена: ".$price." Р "."</td>");
}}?>
</tr>

<!--Добавление товара в корзину-->
<!--(серьги_1)-->
<tr><td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="but_one">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['but_one'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 1";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td> 

<!--(серьги_2)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="but_two">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['but_two'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 2";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td> 

<!--(серьги_3)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="but_three">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['but_three'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 3";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td> 
</tr>

<!--Фото изделия-->   
<tr>
<td><img src="../picture/серьги_бусины.jpg"></td>
<td><img src="../picture/каффы.jpg"></td>
<td><img src="../picture/голубые_серьги.jpg"></td>
</tr>

<!--Об изделии-->  
<tr> 
<?php 
$sql_product = "SELECT * FROM `products` WHERE id = 4 or id = 5 or id = 6";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
print("<td>".$name."<br>"."Цена: ".$price." Р "."</td>");
}}?>
</tr>

<!--Добавление товара в корзину-->
<!--(серьги_4)-->
<tr><td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="but_four">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['but_four'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 4";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>

<!--(серьги_5)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="but_five">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['but_five'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 5";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td> 

<!--(серьги_6)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="but_six">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['but_six'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 6";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td></tr></table>

<!--КУЛОНЫ-->
<!--Заголовок-->
<a name="pendant"><span class="catalogSpan">Кулоны</span><br></a>
<table class="stocksTable">

<!--Фото изделия-->     
<tr>
<td><img src="../picture/фиолетовый_кулон.jpg"></td>   
<td><img src="../picture/кулон_кит.jpg"></td>  
<td><img src="../picture/кулоны.jpg"></td>  
</tr>

<!--Об изделии-->  
<tr> 
<?php 
$sql_product = "SELECT * FROM `products` WHERE id = 7 or id = 8 or id = 9";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
print("<td>".$name."<br>"."Цена: ".$price." Р "."<br>"."</td>");
}}?>
</tr>

<!--Добавление товара в корзину-->
<!--(кулон_1)-->
<tr><td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="butt_one">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['butt_one'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 7";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>   

<!--(кулон_2)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="butt_two">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['butt_two'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 8";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>

<!--(кулон_3)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="butt_three">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['butt_three'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 9";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td></tr>

<!--Фото изделия--> 
<tr>
<td><img src="../picture/кулоны_genshin.jpg"></td>   
<td><img src="../picture/кулоны_смола.jpg"></td>  
<td><img src="../picture/зеленый_кулон.jpg"></td>  
</tr>

<!--Об изделии-->  
<tr> 
<?php 
$sql_product = "SELECT * FROM `products` WHERE id = 10 or id = 11 or id = 12";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
print("<td>".$name."<br>"."Цена: ".$price." Р "."</td>");
}}
?>
</tr>

<!--Добавление товара в корзину-->
<!--(кулон_4)-->
<tr><td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="butt_four">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['butt_four'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 10";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>   

<!--(кулон_5)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="butt_five">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['butt_five'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 11";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td> 

<!--(кулон_6)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="butt_six">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['butt_six'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 12";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td></tr></table> 

<!--ДИАДЕМЫ-->
<!--Заголовок-->
<a name="tiara"><span class="catalogSpan">Диадемы</span><br></a>
<table class="stocksTable">

<!--Фото изделия-->
<tr>
<td><img src="../picture/белая_диадема.jpg"></td> 
<td><img src="../picture/рыжая_диадема.jpg"></td>  
<td><img src="../picture/бело-голубая_диадема.jpg"></td>     
</tr>    

<!--Об изделии-->
<tr>
<?php 
$sql_product = "SELECT * FROM `products` WHERE id = 13 or id = 14 or id = 15";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
print("<td>".$name."<br>"."Цена: ".$price." Р "."</td>");}}?>    
</tr>  

<!--Добавление товара в корзину-->
<!--(диадема_1)-->
<tr><td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="button_one">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['button_one'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 13";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>   

<!--(диадема_2)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="button_two">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['button_two'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 14";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>  

<!--(диадема_3)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="button_three">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['button_three'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 15";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td></tr>
</table>
 
<!--КОЛЬЦА-->
<!--Заголовок-->
<a name="rings"><span class="catalogSpan">Кольца</span><br></a>
<table class="stocksTable">

<!--Фото изделия-->
<tr>
<td><img src="../picture/кольцо_с_камнем.jpg"></td> 
<td><img src="../picture/зеленое_кольцо.jpg"></td>  
<td><img src="../picture/парные_кольца.jpg"></td>     
</tr>   

<!--Об изделии-->
<tr><tr>
<?php 
$sql_product = "SELECT * FROM `products` WHERE id = 16 or id = 17 or id = 18";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];
print("<td>".$name."<br>"."Цена: ".$price." Р "."</td>");}}?> 
</tr> 

<!--Добавление товара в корзину-->
<!--(кольцо_1)-->
<tr><td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="buttons_one">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['buttons_one'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 16";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td>   

<!--(кольцо_2)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="buttons_two">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['buttons_two'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 17";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td> 

<!--(кольцо_3)-->
<td>
<form action="" method="post">
<div class="css-modal-details">    
<details>
<summary>Купить изделие</summary>
<div class="cmc">
<div class="cmt"> 

<p>Купить товар</p>      
<input class="cmtInp" placeholder="ФИО" name="FCS"> <br>  
<input class="cmtInp" placeholder="Номер карты" name="card">  <br> 
<input class="cmtInp" placeholder="Срок действия"name="date">  <br> 
<input class="cmtInp" placeholder="CVV/CVC" name="cvv">  <br> 
<button class="cmtBtnn">Оплатить</button>

<p>Добавить в корзину</p>    
<input class="inp" name="login_basket" placeholder="Логин"> 
<button class="btnn" name="buttons_three">Добавить товар</button>

<?php 
/*действие начнется после нажатии кнопки*/
if(isset($_POST['buttons_three'])) { 

/*получаем логин пользователя*/    
if(isset($_POST["login_basket"])) { 
$login = $_POST["login_basket"];}

/*получаем данные о товаре*/
$sql_product = "SELECT * FROM `products` WHERE id = 18";
if ($res = $link->query($sql_product)) {
foreach($res as $row) {
$name = $row['name_product'];
$price = $row['price'];}}

/*просматриваем все зарегистрированные логины*/
$sql_user = "SELECT * FROM `user_registration` WHERE login = '$login'";
if ($resu = $link->query($sql_user)) {
foreach($resu as $row) {$check_login = $row['login']; $check_password = $row['password'];}}

/*если введенный логин не найден*/
if($check_login != $login) {echo "<script>alert(\"Пользователь с таким логином не найден\");</script>";}

/*если пользователь ничего не ввел*/
else if($login == '') {echo "<script>alert(\"Вы не указали логин!\");</script>";}

/*если введенный логин найден (добавление товара в корзину)*/
else {
$sql_basket = "INSERT INTO `basket` (login_user, name_product, price) 
VALUES ('$login', '$name', '$price')";
if($link->query($sql_basket)) {
echo "<script>alert(\"Товар добавлен в корзину\");</script>";
}}}?>
</div></details></div></div></form>
</td></tr></table></div> 

<!--Иконка Вверх-->
<a href="#up"><img class="imgUp" src="../picture/iconup.svg"></a><br><br>

<!--Подвал-->
<div class="footer"> <br>
<img class = "sk" src="../picture/log.svg"> <br>
<a href="../html/about_us.html">О нас</a>
<a href="../html/products.php">Товары</a>
<a href="../html/profile.php">Профиль</a>
<a href="../html/delivery.html">Доставка</a>
<a href="../html/courses.php">Курсы</a> <br>
<img class="icon"src ="../picture/icon1.png"><span>Телефон: +7 951 345 11-16</span>
<img class="icon"src ="../picture/icon2.png"><span>Почта: sorokina@gmail.com</span> <br><br>
</div>

</body>
</html>