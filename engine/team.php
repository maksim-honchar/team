<?php
require_once 'db.php';
/** @var mysqli $db */
// Підказка для редактора (VS Code), що $db — це об'єкт підключення mysqli, щоб прибрати червоне підсвічування 

$select = "SELECT `id`, `name`, `email`, `date` FROM `team`";

$query = mysqli_query($db, $select);
$team = mysqli_fetch_all($query, MYSQLI_ASSOC); // MYSQLI_ASSOC - запит на повернення асоциативного масиву

if ($query) { ?>
    <h2>Наша Команда</h2>
    <style>
        td {
            padding: 10px;
        }
    </style>
    <table style="text-align: center; border: 1px;">
        <thead style="background: #f5f5f5;">
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>DATE</td>
            <td>DELETE</td>
            <td>EDIT</td>
        </thead>
        <?php
        foreach ($team as $member) { ?>
            <tr style="padding: 10px;">
                <td><?php echo $member['id'] ?></td>
                <td><?php echo $member['name'] ?></td>
                <td><?php echo $member['email'] ?></td>
                <td><?php echo $member['date'] ?></td>
                <td><a href="engine/delete.php?id_member=<?php echo $member['id']; ?>">Delete</a></td>
                <td><a href="/php/team/index.php?update_member=<?php echo $member['id']; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
<?php
}

if (!empty($_GET['update_member'])) { ?>
    <h2>Редагувати члена команди:</h2>
    <form action="engine/update.php" method="POST">
    <?php foreach ($team as $member) {
        if ($member['id'] == $_GET['update_member']) { ?>
            <p><input type="text" name="name" value="<?php echo $member['name'] ?>"></p>
            <p><input type="text" name="email" value="<?php echo $member['email'] ?>"></p>
            <p><input type="text" name="date" value="<?php echo $member['date'] ?>"></p>
    <?php }
    } ?>
        <input type="hidden" name="id" value="<?php echo $_GET['update_member'] ?>">
        <button type="submit">Submit</button>
    </form>
<?php } else {
?>
    <h2>Додати члена команди:</h2>
    <form action="engine/add.php" method="POST">
        <p><input type="text" name="name"></p>
        <p><input type="text" name="email"></p>
        <p><input type="text" name="date"></p>
        <button type="submit">Submit</button>
    </form>
<?php } ?>