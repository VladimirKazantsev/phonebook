<?php
define("HOST", "localhost");
define("USERNAME", "admin");
define("PASSWORD", 54321);
define("DATABASE", "phonebook");
define("PORT", 3306);

$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE, PORT);

if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Соединение с MySQL установлено!" . PHP_EOL;
echo "Информация о сервере: " . mysqli_get_host_info($link) . PHP_EOL;


?>
