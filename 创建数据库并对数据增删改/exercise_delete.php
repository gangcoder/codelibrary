<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete</title>
</head>
<body>
	<?php 
		require 'exercise_connect.php';
		require 'exercise_function.php';
		$id = $_GET['id'];
		$table_name = $_GET['table_name'];
		$sqlquery = "select * from $table_name where id = $id";
		// echo $sqlquery;
		show_query($sqlquery);

		$sql = "delete from $table_name where id =$id";
		// echo $sql;
		mysql_query($sql) or die(mysql_error());
		$location = <<< EOT
		<script>
			// var i = 0;
			// function alert_info()
			// {	i++;
				// document.write("数据删除成功，i 秒后返回");
			// 	if (i == 3) {
			// 		window.location.assign('./exercise_index.php');
			// 	}
			// 	setTimeout('alert_info()',1000);
			// }
			// alert_info();
			document.write("数据删除成功，3秒后返回");
			setTimeout(function(){window.location.assign('./exercise_index.php')},2000)
		</script>
EOT;
		echo $location;
	 ?>
</body>
</html>