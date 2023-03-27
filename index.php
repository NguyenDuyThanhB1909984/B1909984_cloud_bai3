<!DOCTYPE html>
<html>
<head>
	<title>Quản lý người dùng</title>
</head>
<body>
	<h1>Quản lý người dùng</h1>
	<?php
		// Tạo một mảng chứa thông tin người dùng
		$users = array(
			array("id" => 1, "name" => "Nguyen Van A", "email" => "vana@gmail.com", "phone" => "0123456789"),
			array("id" => 2, "name" => "Tran Thi B", "email" => "thib@gmail.com", "phone" => "0987654321"),
			array("id" => 3, "name" => "Le Van C", "email" => "vanc@gmail.com", "phone" => "0123456789"),
		);

		// Kiểm tra xem có dữ liệu được gửi đi từ form thêm mới hay không
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
			$id = end($users)["id"] + 1; // Lấy ID mới cho người dùng
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			// Thêm người dùng mới vào mảng
			array_push($users, array("id" => $id, "name" => $name, "email" => $email, "phone" => $phone));
		}

		// Kiểm tra xem có dữ liệu được gửi đi từ form cập nhật hay không
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
			$id = $_POST["id"];
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			// Tìm kiếm người dùng theo ID và cập nhật thông tin
			foreach ($users as &$user) {
				if ($user["id"] == $id) {
					$user["name"] = $name;
					$user["email"] = $email;
					$user["phone"] = $phone;
				}
			}
		}

		// Kiểm tra xem có dữ liệu được gửi đi từ form xóa hay không
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
			$id = $_POST["id"];
			// Loại bỏ người dùng khỏi mảng theo ID
			foreach ($users as $key => $user) {
				if ($user["id"] == $id) {
					unset($users[$key]);
				}
			}
		}

		// Hiển thị bảng danh sách người dùng
		echo "<table border='1'>
				<tr>
					<th>ID</th>
					<th>Họ và tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
            </tr>";
	foreach ($users as $user) {
		echo "<tr>
				<td>{$user["id"]}</td>
				<td>{$user["name"]}</td>
				<td>{$user["email"]}</td>
				<td>{$user["phone"]}</td>
				<td>
					<form method='POST'>
						<input type='hidden' name='id' value='{$user["id"]}'>
						<input type='submit' name='edit' value='Sửa'>
					</form>
				</td>
				<td>
					<form method='POST'>
						<input type='hidden' name='id' value='{$user["id"]}'>
						<input type='submit' name='delete' value='Xóa'>
					</form>
				</td>
			</tr>";
	}
	echo "</table>";

	// Hiển thị form thêm mới người dùng
	echo "<h2>Thêm mới người dùng</h2>";
	echo "<form method='POST'>
			<label>Họ và tên:</label><br>
			<input type='text' name='name'><br>
			<label>Email:</label><br>
			<input type='email' name='email'><br>
			<label>Số điện thoại:</label><br>
			<input type='tel' name='phone'><br>
			<input type='submit' name='add' value='Thêm mới'>
		</form>";

	// Hiển thị form cập nhật người dùng
	if (isset($_POST["edit"])) {
		$id = $_POST["id"];
		// Tìm kiếm người dùng theo ID
		foreach ($users as $user) {
			if ($user["id"] == $id) {
				echo "<h2>Cập nhật thông tin người dùng</h2>";
				echo "<form method='POST'>
						<input type='hidden' name='id' value='{$user["id"]}'>
						<label>Họ và tên:</label><br>
						<input type='text' name='name' value='{$user["name"]}'><br>
						<label>Email:</label><br>
						<input type='email' name='email' value='{$user["email"]}'><br>
						<label>Số điện thoại:</label><br>
						<input type='tel' name='phone' value='{$user["phone"]}'><br>
						<input type='submit' name='update' value='Cập nhật'>
					</form>";
			}
		}
	}
?>
</body>
</html>

