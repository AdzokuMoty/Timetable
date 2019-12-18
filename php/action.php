<html>
<body>


<?php
$search_g = $_POST['search_g'];
$search_g = trim($search_g);
$search_g = strip_tags($search_g);


//-------------- Коннект
$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'timetable';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// Ругаемся, если соединение установить не удалось
if (!$link) {
  echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
  exit;
}
//-------------- Коннект

$sql = 'SELECT * FROM groups';

$search_sql = mysqli_query($link, $sql);

while ($result = mysqli_fetch_array($search_sql)) {
   echo "{$result['id.group']}<br>";
 }

$sql = 'SELECT * FROM `lessons` LEFT JOIN `subjects` ON `lessons`.`subj`=`subjects`.`id.subject` LEFT JOIN `preps` ON `lessons`.`prep`=`preps`.`id.prep`';

$search_sql = mysqli_query($link, $sql);
while ($result = mysqli_fetch_array($search_sql)) {
  echo "{$result['id.lesson']} {$result['subject']} {$result['lastname']} {$result['room']} {$result['type']} {$result['place']} {$result['start']} {$result['end']} {$result['day']}<br>";
}
mysqli_close($link);
?>
</body>
</html>