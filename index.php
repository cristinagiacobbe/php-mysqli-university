<?php

define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db_university');
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

/* var_dump($connection); */

if ($connection && $connection->connect_error) {
    echo 'Database connection failed';
    die;
}
/* $name = $_POST['name'];
$sql = "SELECT * FROM `departments` WHERE `name` LIKE '%" . $name . "%' ";
$result = $connection->query($sql); */

/* var_dump($result); */

/* if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        var_dump($row['name']);
    }
} */
## TUTTI GLI STUDENTI NATI NEL 1990
$sql = "SELECT * FROM `students` WHERE YEAR(`date_of_birth`) = 1990 ";
$result = $connection->query($sql);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>

    <a href="./departments.php">Departments</a>

    <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="write">
        <button type="submit">search</button>
    </form>

    <?php if ($result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <span> <?= $row['name'] ?></span>
            <span> <?= $row['surname'] ?></span>
            <span> <?= $row['date_of_birth'] ?></span>
            <br>
            <hr>
    <?php endwhile;
    endif; ?>
</body>

</html>