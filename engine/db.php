<?php
$db = mysqli_connect('127.0.0.1', 'root', '', 'company') or die("Помилка під'єднання до бази даних");
mysqli_set_charset($db, 'utf8') or die('Невірне кодування');