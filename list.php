<!DOCTYPE html>

<html lang="en">

<body>

    LIST<BR>

    <?php
    $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
    $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
    $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
    $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
    $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');

    $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB);

    if (!$conn) {
        echo "Error: Unable to open database\n <BR>";
    } else {
        echo "Open database successfully\n <BR>";
    }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "No results";
    }

    mysqli_close($conn);
    ?>

</body>

</html>
