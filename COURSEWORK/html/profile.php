<?php 
session_start();
?>

<html>
<head>
<meta charset="utf-8">   
<link rel="icon" href="../picture/logotip.svg">
<link rel = "stylesheet" href="../style/style.css">
<link rel = "stylesheet" href="../style/mediastyle.css">
<link rel = "stylesheet" href="../style/registratiastyle.css">
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

<!--Название раздела (приветствие)-->
<div class="bluefon"> <br>
<span class="bf">Добро пожаловать на сайт</span> <br>
</div><br>

<!--АВТОРИЗАЦИЯ-->
<div class="login-wrap">
<div class="login-html">
<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" id = "title">Войти</label>
<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab" id = "title">Регистрация</label>
<div class="login-form">
<div class="sign-in-htm">

<!--Форма авторизации-->
<form action="profile.php" method="post"> 

<!--Логин-->        
<div class="group">
<input type="text" id="login" name = "login" class="input" placeholder="Введите логин" required
value = "<?php echo $_SESSION['login'];?>"></div>

<!--Пароль-->  
<div class="group">
<input type="password" id="pass" name = "pass" class="input" type="password" placeholder="Введите пароль" 
required value = "<?php echo $_SESSION['pass'];?>"></div>

<!--Войти-->
<div class="group">
<input type="submit" class="button" value="Войти">
</div>

<?php
/*подключение к бд*/
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*получем логин и пароль вводимые пользователем*/
if (isset($_POST["login"]) && isset($_POST["pass"])) {
$login = mysqli_real_escape_string($link, $_POST["login"]);
$pass = mysqli_real_escape_string($link, $_POST["pass"]);

/*пишем запрос на получение логина и пароля зарегистрированных пользователей в бд*/
$sql_logon = "SELECT * FROM `user_registration`";
if($result = $link->query($sql_logon)) {

/*проверка на соответствие (не совпали)*/
if($bd_login != $login || $bd_pass != $pass) {echo "Неверный логин или пароль ";}

/*получем логин и пароль зарегистрированных пользователей в бд*/
foreach($result as $row) {
$bd_login = $row['login'];
$bd_pass = $row['password'];

/*проверка на соответствие (совпали)*/
if($bd_login == $login && $bd_pass == $pass) {

$_SESSION['login'] = $login;
$_SESSION['pass'] = $pass;

/*переход на профиль пользователя*/    
$new_url = 'user_profile.php'; 
header('Location: '.$new_url);
}}}}?>
</form></div>
        
<!--РЕГИСТРАЦИЯ-->
<div class="sign-up-htm">

<!--Форма регистрации-->
<form action="profile.php" method="post">

<!--Имя-->
<div class="group">
<input id = "reg_name" name="reg_name" type="text" class="input"
placeholder="Введите имя пользователя" required pattern="[a-zA-Zа-яА-Я]+">
</div>

<!--Фамилия-->
<div class="group">
<input id = "reg_surname" name="reg_surname" type="text" class="input" 
placeholder="Введите фамилию пользователя" required pattern="[a-zA-Zа-яА-Я]+">
</div>

<!--Отчество-->
<div class="group">
<input id = "reg_patronymic" name="reg_patronymic" type="text" class="input" 
placeholder="Введите отчество пользователя" required pattern="[a-zA-Zа-яА-Я]+">
</div>

<!--Логин-->
<div class="group">
<input id="user" name="reg_login" type="text" class="input" 
placeholder="Придумайте логин" required pattern="[a-zA-Zа-яА-Я0-9-_@.]+">
</div>

<!--Пароль-->
<div class="group">
<input id="password" name = "reg_pass" type="password" class="input" type="password" 
placeholder="Придумайте пароль" required pattern="[a-zA-Zа-яА-Я0-9]+">
</div>

<!--Повторный пароль-->
<div class="group">
<input id = "password_replace" name = "reg_pass_replace" type="password" class="input" type="password" 
placeholder="Повторите пароль" required pattern="[a-zA-Zа-яА-Я0-9]+">
</div>

<!--Почта-->
<div class="group">
<input id = "email" name = "reg_email" type="text" class="input" 
placeholder="Введите email" required pattern="[a-zA-Zа-яА-Я0-9@.]+">
</div>

<!--Зарегистрироваться-->
<div class="group">
<input type="submit" onclick="message()" class="button" value="Зарегистрироваться">
</div>

<?php
/*получаем данные, введенные пользователем*/
if (isset($_POST["reg_name"]) && isset($_POST["reg_surname"]) && isset($_POST["reg_patronymic"]) 
&& isset($_POST["reg_login"]) && isset($_POST["reg_pass"]) && isset($_POST["reg_email"])) {

$regname = mysqli_real_escape_string($link, $_POST["reg_name"]);
$regsurname  = mysqli_real_escape_string($link, $_POST["reg_surname"]);
$regpatronymic = mysqli_real_escape_string($link, $_POST["reg_patronymic"]);
$reglogin = mysqli_real_escape_string($link, $_POST["reg_login"]);
$regpass = mysqli_real_escape_string($link, $_POST["reg_pass"]);
$regpassreplace = mysqli_real_escape_string($link, $_POST["reg_pass_replace"]);
$regemail = mysqli_real_escape_string($link, $_POST["reg_email"]);

/*запрос на получение данных из таблицы зарегистрированных пользователей*/
$sql_reg_user = "SELECT * FROM `user_registration` WHERE login = '$reglogin'";
if($rez = $link->query($sql_reg_user)) {
    
/*получаем логины из бд*/    
foreach($rez as $row) {
$login = $row['login']; }

/*проверка на логин*/
if ($reglogin == $login) {
echo "<script>alert(\"Пользователь с таким логином уже существует! Пройдите регистрацию заново\");</script>";}

/*проверка на одинаковые пароли*/
else if ($regpass != $regpassreplace) {
echo "<script>alert(\"Пароли не совпадают! Пройдите регистрацию заново\");</script>";}

/*если неверно указан email*/
else if (filter_var($regemail, FILTER_VALIDATE_EMAIL) == false) {
echo "<script>alert(\"Неверно указан email\");</script>"; 
}

/*регистрация пользователя*/
else {
$sql_reg = "INSERT INTO `user_registration` (name, surname, patronymic, login, password, email) 
VALUES ('$regname', '$regsurname', '$regpatronymic', '$reglogin', '$regpass', '$regemail')";

/*сообщение об успешной регистрации*/
if($link->query($sql_reg)) {
echo "<script>alert(\"Вы зарегистрировались. Войдите в свой профиль\");</script>"; }}}}?>
</form></div></div></div></div>

<!--Подвал-->
<div class="footer"> <br>
<img class = "sk" src="../picture/log.svg"> <br>
<a href="../html/about_us.html">О нас</a>
<a href="../html/products.php">Товары</a>
<a href="../html/profile.php">Профиль</a>
<a href="../html/delivery.html">Доставка</a>
<a href="../html/courses.php">Курсы</a><br>
<img class="icon" src ="../picture/icon1.png"><span>Телефон: +7 951 345 11-16</span>
<img class="icon" src ="../picture/icon2.png"><span>Почта: sorokina@gmail.com</span>
<br><br>
</div>

</body>
</html>