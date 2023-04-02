<!DOCTYPE html>
<html lang="en">
<body>

Insert Employee

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="border">
    ID<BR>
    <input type="text" name="id" value="<?php echo $id; ?>"><BR>
    <input type="submit" name="submit" value="submit">
</form>

<?php
    $MYSQL_ADDON_HOST=getenv('MYSQL_ADDON_HOST');
    $MYSQL_ADDON_PORT=getenv('MYSQL_ADDON_PORT');
    $MYSQL_ADDON_BD=getenv('MYSQL_ADDON_DB');
    $MYSQL_ADDON_USER=getenv('MYSQL_ADDON_USER');
    $MYSQL_ADDON_PASSWORD=getenv('MYSQL_ADDON_PASSWORD');

    $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_BD);

    if(!$conn) {
        echo "Error: Unable to open database\n";
    } else {
        echo "Open database successfully\n";
    }

    if(isset($_POST["submit"])) {
        $id = $_POST["id"];

        $sql = "DELETE FROM users WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "User deleted successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>

</body>
</html>
