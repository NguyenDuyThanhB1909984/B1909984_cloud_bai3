<!DOCTYPE html>
<html lang="en">
<body>
    <h1>Insert Employee</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="border">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>"><br>
        <label for="name">Full Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email ?>"><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo $password ?>"><br>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    
    <?php
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
        $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
        $MYSQL_ADDON_BD = getenv('MYSQL_ADDON_DB');
        $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
        $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');

        $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_BD);

        if (!$conn) {
            echo "Error: Unable to open database<br>";
        } else {
            echo "Open database successfully<br>";
        }

        $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "User updated successfully.";
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
</body>
</html>
