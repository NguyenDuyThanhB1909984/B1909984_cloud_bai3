<!DOCTYPE html>
<html>
  <head>
    <title>Form nhập thông tin</title>
  </head>
  <body>


    <?php
      $hoTen = '';
      $email = '';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hoTen = $_POST['hoTen'];
        $email = $_POST['email'];
        echo "Chào bạn $hoTen, email của bạn là $email";
      }
    ?>
    <ul>
		<li><a href="menu.php">Menu</a></li>
	</ul>
    <form method="post">
      <label for="hoTen">Họ và tên:</label>
      <input type="text" id="hoTen" name="hoTen"><br>

      <label for="email">Địa chỉ email:</label>
      <input type="email" id="email" name="email"><br>

      <input type="submit" value="Submit">
    </form>


  </body>
</html>
