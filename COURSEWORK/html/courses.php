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

<!--Название раздела (мастер-классы)-->
<div class="bluefon"> <br><span class="bf">Мастер-классы</span><br></div><br>
<div class="center"><span class="catalogSpan">Вы можете приобрести следующие мастер-классы</span><br></div>

<!--Изображения мастер-классов-->
<div class="masterClass">
<table class="masterClassTable">
<tr>
<td><img src="../picture/бисер.jpg"> </td>
<td><img src="../picture/смола.jpg"> </td>
<td><img src="../picture/проволка.jpg"> </td>
<td><img src="../picture/вышивка.jpg"> </td>
<td><img src="../picture/ювелир.jpg"></td>
</tr>

<tr>
<td><span>Бисероплетение</span></td>
<td><span>Работа с эпоксидной смолой</span></td>
<td><span>Плетение из проволки</span></td>
<td><span>Вышивка</span></td>
<td><span>Ювелирная работа</span></td>
</tr>
</table>

</div><br>

<!--Название раздела (эпоксидная смола)-->
<div class="bluefon"> <br><span class="bf">Как работать со смолой?</span> <br></div> 
<div class="center"><div class="smola"><img src="../picture/смола.png"></div></div> 

<!--Название раздела (бисероплетение)-->
<div class="bluefon"> <br><span class="bf">Бисероплетение</span><br></div><br>

<!--Схемы плетения из бисера-->
<div class="center"><div class="scheme">
<span class="catalogSpan">Популярные схемы плетения</span><br>    
<a download="../picture/схема1.jpg" href="../picture/схема1.jpg"><img src="../picture/схема1.jpg"></a>
<a download="../picture/схема2.jpg" href="../picture/схема2.jpg"><img src="../picture/схема2.jpg"></a> 
<a download="../picture/схема3.jpg" href="../picture/схема3.jpg"><img src="../picture/схема3.jpg"></a> 
</div></div>

<!--Форма записи на курс-->
<div class ="center">
<a name="course" ><span class="catalogSpan">Стало интересно? Тогда вы можете записаться на курс</span></a> <br>  
<div class="recordCourse">
<form action="courses.php" method="post">        
<input class="courseInput" id = "user_name" name="user_name" placeholder="Имя" required pattern="[a-zA-Zа-яА-Я]+"> <br>
<input class="courseInput" id = "user_surname" name="user_surname" placeholder="Фамилия" required pattern="[a-zA-Zа-яА-Я]+"> <br>
<input class="courseInput" id = "user_patronymic" name="user_patronymic" placeholder="Отчество" required pattern="[a-zA-Zа-яА-Я]+"> <br>
<input class="courseInput" id = "user_course" name="user_course" placeholder="Желаемый курс" required> <br>
<input class="courseInput" id = "user_email" name="user_email" placeholder="Email" required pattern="[a-zA-Zа-яА-Я0-9@_-.]+"> <br>
<input class="courseInput" id = "user_phone" name="user_phone" placeholder="Номер телефона" 
required pattern="[0-9+]+"> <br>
<button class="courseButton">Отправить заявку</button>
</form>

<?php
/*подключение к бд*/
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'database';
$link = mysqli_connect($host, $user, $pass, $name);

/*получаем данные, введенные пользователем*/
if (isset($_POST["user_name"]) && isset($_POST["user_surname"]) 
&& isset($_POST["user_patronymic"])&& isset($_POST["user_email"])  
&& isset($_POST["user_phone"])&& isset($_POST["user_course"]) ) {
$name = mysqli_real_escape_string($link, $_POST["user_name"]);
$surname = mysqli_real_escape_string($link, $_POST["user_surname"]);
$patronymic = mysqli_real_escape_string($link, $_POST["user_patronymic"]);
$course = mysqli_real_escape_string($link, $_POST["user_course"]);
$email = mysqli_real_escape_string($link, $_POST["user_email"]);
$phone = mysqli_real_escape_string($link, $_POST["user_phone"]);

/*если введеный мастер-класс не существует*/ 
if (($course != 'Бисероплетение') && ($course != 'бисероплетение') && ($course != 'Работа со смолой') 
&& ($course != 'Работа с эпоксидной смолой') && ($course != 'работа с эпоксидной смолой') && ($course != 'работа со смолой')      
&& ($course != 'Плетение из проволки') && ($course != 'плетение из проволки') && ($course != 'Плетение из проволоки') 
&& ($course != 'плетение из проволоки') && ($course != 'Вышивка') && ($course != 'вышивка') && ($course != 'Ювелирная работа') && ($course != 'ювелирная работа')) {
echo "<script>alert(\"Введенный вами курс недоступен! Выберите мастер-класс представленный на странице.\");</script>"; 
} 

/*если номер телефона указан неверно*/
else if (strlen($phone) != 12) {
echo "<script>alert(\"Номер указан неверно. Формат ввода (+79... )\");</script>"; 
}

/*если неверно указан email*/
else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
echo "<script>alert(\"Неверно указан email\");</script>"; 
}

/*иначе*/
else {
/*запрос на отправку данных в таблицу курсы*/
$sql_courses = "INSERT INTO `registration_for_course` (name_reg, surname_reg, patronymic_reg, email, phone, name_course) 
VALUES ('$name', '$surname', '$patronymic', '$email', '$phone', '$course')";

/*сообщение об отправки формы*/
if($link->query($sql_courses)) {   
echo "<script>alert(\"Ваша заявка принята! Спасибо что выбрали нас\");</script>"; 
}}}?></div></div><br> 

<!--Подвал-->
<div class="footer"><br>
<img class = "sk" src="../picture/log.svg"> <br>
<a href="../html/about_us.html">О нас</a>
<a href="../html/products.html">Товары</a>
<a href="../html/profile.html">Профиль</a>
<a href="../html/delivery.html">Доставка</a>
<a href="../html/courses.html">Курсы</a><br>
<img class="icon"src ="../picture/icon1.png"><span>Телефон: +7 951 345 11-16</span>
<img class="icon"src ="../picture/icon2.png"><span>Почта: sorokina@gmail.com</span>
<br><br></div>

</body>
</html>