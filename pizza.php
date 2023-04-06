<!DOCTYPE html>
<html>
<head>
	<title>Pizza 데이터 입력</title>
</head>
<body>
	<h1>Pizza 데이터 입력</h1>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Name1:</label>
		<input type="text" name="name" required><br><br>
		<label>Ratio1:</label>
		<input type="number" step="0.1" min="0" max="100" name="ratio" required><br><br>
		<label>Name2:</label>
		<input type="text" name="name2" required><br><br>
		<label>Ratio2:</label>
		<input type="number" step="0.1" min="0" max="100" name="ratio2" required><br><br>
		<label>Name3:</label>
		<input type="text" name="name3" required><br><br>
		<label>Ratio3:</label>
		<input type="number" step="0.1" min="0" max="100" name="ratio3" required><br><br>
		<label>Name4:</label>
		<input type="text" name="name4" required><br><br>
		<label>Ratio4:</label>
		<input type="number" step="0.1" min="0" max="100" name="ratio4" required><br><br>
		<label>Name5:</label>
		<input type="text" name="name5" required><br><br>
		<label>Ratio5:</label>
		<input type="number" step="0.1" min="0" max="100" name="ratio5" required><br><br>
		<input type="submit" value="확인">
	</form>
	<?php
	// 폼이 제출되면 데이터를 처리하는 코드
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 데이터베이스 연결
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myDB";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		// 입력한 데이터 가져오기
		$name = $_POST["name"];
		$ratio = $_POST["ratio"];
		$name2 = $_POST["name2"];
		$ratio2 = $_POST["ratio2"];
		$name3 = $_POST["name3"];
		$ratio3 = $_POST["ratio3"];
		$name4 = $_POST["name4"];
		$ratio4 = $_POST["ratio4"];
		$name5 = $_POST["name5"];
		$ratio5 = $_POST["ratio5"];
	
		// SQL 쿼리 실행
		$sql = "INSERT INTO pizza (name, ratio) VALUES ('$name', $ratio), ('$name2', $ratio2), ('$name3', $ratio3), ('$name4', $ratio4), ('$name5', $ratio5)";
		if ($conn->query($sql) === TRUE) {
			echo "데이터가 성공적으로 입력되었습니다.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
		// 그래프 웹페이지로 리다이렉트
		header("Location: pie.php");
		

		$conn->close();
	}
	?>
</body>
</html>