<?php

require_once 'db.php';
/** @var mysqli $db */
// Підказка для редактора (VS Code), що $db — це об'єкт підключення mysqli, щоб прибрати червоне підсвічування 

// !Якщо масив $_POST НЕ порожній
if (!empty($_POST)) {
    /*
// Функція mysqli_real_escape_string екранує всі небезпечні символи, захищає від SQL-ін'єкцій
$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$date = mysqli_real_escape_string($db, $_POST['date']);
*/
    foreach ($_POST as $key => $value) {
        $_POST[$key] =  mysqli_real_escape_string($db, $value);
    }

    // Функція extract() у PHP бере асоціативний масив і перетворює його ключі на звичайні змінні.
    extract($_POST);

    $insert = "INSERT INTO `team` (`name`, `email`, `date`) VALUES ('$name', '$email', '$date')";

    $query = mysqli_query($db, $insert);

    if ($query) header('Location: /php/team/index.php');
}
