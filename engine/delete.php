<?php
require_once 'db.php';
/** @var mysqli $db */
// Підказка для редактора (VS Code), що $db — це об'єкт підключення mysqli, щоб прибрати червоне підсвічування

if (!empty($_GET['id_member'])) {
    $id = (int) $_GET['id_member'];

    $delete = "DELETE FROM team WHERE id = $id";

    $query = mysqli_query($db, $delete);
    if ($query) header('Location: /php/team/index.php');
    else die('Помилка');
}
