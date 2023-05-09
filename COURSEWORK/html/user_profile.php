<html>
<head>
<meta charset="utf-8">       
<link rel="icon" href="../picture/logotip.svg">
<link rel ="stylesheet" href="../style/style.css">
<link rel ="stylesheet" href="../style/mediastyle.css">
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
<a href="../html/courses.php">Курсы</a>
<br><br></div>

<!--Название раздела (профиль)-->
<div class="bluefon"><br><span class="bf">Профиль</span><br></div><br>

<!--Скидки-->
<div class="center">
<button class="profile_catalog">5% скидка при регистрации</button>
<button class="profile_catalog">5% скидка при первом заказе</button>
<button class="profile_catalog">5% скидка постоянным клиентам</button>
</div> <br>

<!--Данные пользователя-->
<div class="center"><span class="catalogSpan">Данные пользователя</span></div>

<!--Личная информация-->
<table class="user_profile_table">
<tr><td><img class="user_img" src="../picture/user.svg"></td>

<td><p>Личная информация:</p>    
<?php 
/*подключение к бд*/
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*получаем логин вошедшего пользователя с страницы Профиль*/
$users = $_SESSION['login'];

/*пишем запрос на получение данных зарегистрированного пользователя из бд*/
$sql_search_user = "SELECT * FROM `user_registration`";
if($result = $link->query($sql_search_user)) {
    
foreach($result as $row) {
$name = $row['name'];
$surname = $row['surname'];
$patronymic = $row['patronymic'];  
$email = $row['email']; 
$login = $row['login']; 

/*выводим полученные данные*/
if ($users == $login) {
print("<p> ФИО: ".$surname." ".$name." ".$patronymic."</p>"."<p> Почта: ".$email."</p>" );   

/*пишем запрос на получение данных о записи на курс*/
$sql_course = "SELECT * FROM `registration_for_course` WHERE email = '$email'";
if($res = $link->query($sql_course)) {

print("<p>Заявки на участие в курсе:</p>");

/*получаем почту и название курса (выводим найденные курсы)*/    
foreach($res as $row) {
$email_course = $row['email'];
$course = $row['name_course'];
if($email_course == $email) {print("<p>- $course </p>"); }
}

/*если почта в заявках и почта пользователя совпадает*/ 
if($email_course != $email) {print("<p> У вас нет заявок </p>" );}}}}}?></td>

<!--Запись на курс (переход на страницу Курсы)-->
<td><p>Курсы:</p>
<a href="../html/courses.php#course" class="course_href"><p>Записаться на курс</p></a>  </td>

<!--Иконка товаров (переход на страницу Товары)-->
<td><a href="products.php"><img class="basket_img" src="../picture/iconbasket.svg"></a></td>
</tr></table> <br>

<!--Название раздела (корзина)-->
<div class="center"><span class="catalogSpan">Корзина</span></div>

<form action="" method="post">
<div class="basket">
<?php

/*получаем логин вошедшего пользователя с страницы Профиль*/
$user = $_SESSION['login'];

/*путь на изображение*/
$img = "<img src='../picture/iconbasket.svg'>";

/*пишем запрос на получение данных о товарах в корзине в бд*/
$sql_basket = "SELECT * FROM `basket`";
if($result = $link->query($sql_basket)) {
       
foreach($result as $row) {
$name_product = $row['name_product'];
$price = $row['price'];
$login = $row['login_user']; 
$id = $row['id']; 

/*если логин пользователя совпадает с логином пользователя в корзине (появление товара в корзине)*/
if ($user == $login) {
print($img."<span> <input type='checkbox' name='check[]' value='$id'/>".$name_product." ".$price." P </span><br><br>");

/*суммируем цену товаров*/
$summ +=$price;
}}

/*если не выбран товар для удаления*/
if(isset($_POST['delete'])) { 
$check = $_POST['check'];
if(empty($check)) {echo "<script>alert(\"Вы не выбрали товар\");</script>";}   

/*удаление выбранных checbox*/
else {
$N = count($check);
for($i=0; $i < $N; $i++) {
$sql_del = "DELETE FROM `basket` WHERE id = $check[$i]"; 
if($result = $link->query($sql_del)) {
$new_url = 'user_profile.php'; 
header('Location: '.$new_url);}    
}}}

/*вывод суммы и кнопки удаления*/
print("<h3> Итоговая сумма: ".$summ." Р </h3>");
print("<button name='delete'>Убрать товар из корзины</button>");}
?></div></form> <br>

<!--Подвал-->
<div class="footer"><br>
<img class = "sk" src="../picture/log.svg"> <br>
<a href="../html/about_us.html">О нас</a>
<a href="../html/products.php">Товары</a>
<a href="../html/profile.php">Профиль</a>
<a href="../html/delivery.html">Доставка</a>
<a href="../html/courses.php">Курсы</a><br>
<img class="icon"src ="../picture/icon1.png"><span>Телефон: +7 951 345 11-16</span>
<img class="icon"src ="../picture/icon2.png"><span>Почта: sorokina@gmail.com</span>
<br><br>
</div>

</body>
</html>