<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>피자 그래프</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Ratio'],
<?php
  // 데이터베이스 연결
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "myDB";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // 데이터 가져오기
  $sql = "SELECT name, ratio FROM pizza ORDER BY id DESC LIMIT 5";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "['" . $row["name"] . "', " . $row["ratio"] . "], ";
    }
  }

  $conn->close();
?>
      ]);

      var options = {
        title: '나의 피자'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
