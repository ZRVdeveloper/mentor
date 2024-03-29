﻿<?php
// Подключаемся к базе MySQL и выбираем базу под названием mentor
// Хост: 127.0.0.1, имя пользователя: root, пароль: 1213141516171819s, база: mentor
$mysqli = new mysqli('127.0.0.1', 'root', '1213141516171819s', 'mentor');

// О нет!! переменная connect_errno существует, а это значит, что соединение не было успешным!
if ($mysqli->connect_errno) {
    // Соединение не удалось. Что нужно делать в этом случае? 
    // Можно отправить письмо администратору, отразить ошибку в журнале, 
    // информировать пользователя об ошибке на экране и т.п.
    // Вам не нужно при этом раскрывать конфиденциальную информацию, поэтому
    // просто попробуем так:
    echo "Извините, возникла проблема на сайте";

    // На реальном сайте этого делать не следует, но в качестве примера мы покажем 
    // как распечатывать информацию о подробностях возникшей ошибки MySQL
    echo "Ошибка: Не удалась создать соединение с базой MySQL и вот почему: <br>";
    echo "Номер ошибки: " . $mysqli->connect_errno . "<br>";
    echo "Ошибка: " . $mysqli->connect_error . "<br>";
    
    // Вы можете захотеть показать что-то еще, но мы просто выйдем
    exit;
}

// Выполняем запрос SQL
$sql = "SELECT actor_id, first_name, last_name FROM actor WHERE actor_id = $aid";
if (!$result = $mysqli->query($sql)) {
    // О нет! запрос не удался. 
    echo "Извините, возникла проблема в работе сайта.";

    // И снова: не делайте этого на реальном сайте, но в этом примере мы покажем, 
    // как получить информацию об ошибке:
    echo "Ошибка: Наш запрос не удался и вот почему: <br>";
    echo "Запрос: " . $sql . "<br>";
    echo "Номер ошибки: " . $mysqli->errno . "<br>";
    echo "Ошибка: " . $mysqli->error . "<br>";
    exit;
}

// Уфф, мы это сделали. У нас есть соединение с базой данных и успешный запрос. 
// Но где же его результат?
if ($result->num_rows === 0) {
    // Упс! в запросе нет ни одной строки! Иногда это ожидаемо и нормально, иногда нет.
    // Решать вам. В данном случае, может быть actor_id был слишком большим? 
    echo "Мы не смогли найти совпадение для $aid, простите. Пожалуйста, попробуйте еще раз.";
    exit;
}

// Теперь мы знаем только, что результат выполнения запроса существует, поэтому давайте  
// перенесем его в ассоциативный массив, в котором ключами массива будут названия
 // столбцов.
$actor = $result->fetch_assoc();
echo "Иногда я вижу " . $actor['first_name'] . " " . $actor['last_name'] . " по телевизору.";

// Теперь давайте выгрузим пять случайных актеров и выведем их имена в список.
// Здесь мы добавим меньше степеней обработки ошибок, чтобы вы сделали это самостоятельно
$sql = "SELECT actor_id, first_name, last_name FROM actor ORDER BY rand() LIMIT 5";
if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла проблема в работе сайта.";
    exit;
}

// Распечатываем список из пяти случайно выбранных актеров и создаем ссылку на id 
// каждого из них
echo "<ul><br>";
while ($actor = $result->fetch_assoc()) {
    echo "<li><a href='" . $_SERVER['SCRIPT_FILENAME'] . "?aid=" . $actor['actor_id'] . "'><br>";
    echo $actor['first_name'] . ' ' . $actor['last_name'];
    echo "</a></li><br>";
}
echo "</ul><br>";

// Скрипт автоматически закрывает соединение MySQL и освобождает память, тем не 
// менее давайте сделаем это вручную
$result->free();
$mysqli->close();

?>

<html>
<head>
</head>
<body>
<?PHP 

?>
</body>
</html>
