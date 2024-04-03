<?php

define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db_university');
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

var_dump($connection);

if ($connection && $connection->connect_error) {
    echo 'Database connection failed';
    die;
}

$sql = "SELECT * FROM `departments`";
$result = $connection->query($sql);
var_dump($result);

while ($row = $result->fetch_assoc()) {
    /*    var_dump($row['name']); */
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Db university</title>
</head>

<body>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <p><?= $row['name'] ?></p>
    <?php endwhile; ?>
</body>

</html>