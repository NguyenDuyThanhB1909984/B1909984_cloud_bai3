<!DOCTYPE html>
<html lang="en">
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="border">
        <h2>Insert Employee</h2>
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>"><br><br>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email ?>"><br><br>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="<?php echo $password ?>"><br><br>
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
            echo "Error: Unable to open database\n";
        } else {
            echo "Open database successfully\n";
        }

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "User added successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql." . mysqli_error($conn);
        }

        mysqli_close($conn);
    ?>
</body>
</html>
