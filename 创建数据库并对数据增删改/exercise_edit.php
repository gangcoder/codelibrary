<meta charset="utf-8">
<?php 
	if ($_GET) {
		require 'exercise_connect.php';
		require 'exercise_function.php';

		$id = $_GET['id'];
		$table_name = $_GET['table_name'];
		$sqlquery = "select username, password, age, xueli, xingqu, laizi from $table_name where id = $id";

		//显示原信息
		// echo "<b>原信息：</b>";
		$result = mysql_query($sqlquery);
		$result or die("查询失败");
		$result_array = mysql_fetch_array($result);
		// echo gettype($result_array['xingqu']);

		//更新数据
		if ($_POST) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$age = $_POST['age'];
			$xueli = $_POST['xueli'];
			$xingqu = array_sum($_POST['xingqu']);
			$laizi = $_POST['laizi'];
			$sql = "update user set username = '$username', password = '$password', age = $age, xueli = $xueli, xingqu = $xingqu, laizi = $laizi where id = $id;"; 
			// echo $sql;
			mysql_query($sql) or die(mysql_error());

					$location = <<< EOT
					<script>
						document.write("数据删除成功，3秒后返回");
						setTimeout(function(){window.location.assign('./exercise_index.php')},2000)
					</script>
EOT;
					echo $location;
		}
	}else{
		die("请用正确方式打开网页!");
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edit</title>
</head>
<body>
	<form action="" method="post">
	 	<table>
	 		<tr>
	 			<th bgcolor="#ccc">修改数据</th>
	 			<th bgcolor="#ccc"></th>
	 		</tr>
	 		<tr>
	 			<td>用户名：</td>
	 			<td><input type="text" name="username" value= <?php { echo $result_array['username']; } ?>></td>
	 		</tr>
	 		<tr>
	 			<td>密码：</td>
	 			<td><input type="password" name="password" id="" value= <?php { echo $result_array['password']; } ?>></td>
	 		</tr>
	 		<tr>
	 			<td>年龄：</td>
	 			<td><input type="text" name="age" id="" value=<?php { echo $result_array['age']; }?>></td>
	 		</tr>
	 		<tr>
	 			<td>学历：</td>
	 			<td>
		 			<select name="xueli">
		 				<option value="1" 
		 					<?php if ($result_array['xueli'] == "专科") {echo"selected='selected'";} ?>
	 					>专科</option>
		 				<option value="2" 
		 					<?php if ($result_array['xueli'] == "本科") {echo"selected='selected'";} ?>
	 					>本科</option>
		 				<option value="3" 
		 					<?php if ($result_array['xueli'] == "硕士") {echo"selected='selected'";} ?>
	 					>硕士</option>
		 				<option value="4" 
		 					<?php if ($result_array['xueli'] == "博士") {echo"selected='selected'";} ?>
	 					>博士</option>
		 			</select>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>兴趣：</td>
	 			<td>
	 				<input type="checkbox" name="xingqu[]" value="1"
						<?php if (strpos($result_array['xingqu'],"排球") !== false) {echo"checked='checked'";} ?>
	 				>排球
	 				<input type="checkbox" name="xingqu[]" value="2"
						<?php if (strpos($result_array['xingqu'],"篮球") !== false) {echo"checked='checked'";} ?>
	 				>篮球
	 				<input type="checkbox" name="xingqu[]" value="4"
						<?php if (strpos($result_array['xingqu'],"足球") !== false) {echo"checked='checked'";} ?>
	 				>足球
	 				<input type="checkbox" name="xingqu[]" value="8"
						<?php if (strpos($result_array['xingqu'],"中国足球") !== false) {echo"checked='checked'";} ?>
	 				>中国足球
	 				<input type="checkbox" name="xingqu[]" value="16"
						<?php if (strpos($result_array['xingqu'],"地球") !== false) {echo"checked='checked'";} ?>
	 				>地球
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>来自：</td>
	 			<td>
	 				<input type="radio" name="laizi" value="1" 
						<?php if ($result_array['laizi'] == "东北") {echo"checked='checked'";} ?>
	 				>东北
	 				<input type="radio" name="laizi" value="2" id=""
						<?php if ($result_array['laizi'] == "华北") {echo"checked='checked'";} ?>
	 				>华北
	 				<input type="radio" name="laizi" value="3" id=""
						<?php if ($result_array['laizi'] == "西北") {echo"checked='checked'";} ?>
	 				>西北
	 				<input type="radio" name="laizi" value="4" id=""
						<?php if ($result_array['laizi'] == "华东") {echo"checked='checked'";} ?>
	 				>华东
	 				<input type="radio" name="laizi" value="5" id=""
						<?php if ($result_array['laizi'] == "华南") {echo"checked='checked'";} ?>
	 				>华南
	 				<input type="radio" name="laizi" value="6" id=""
						<?php if ($result_array['laizi'] == "华西") {echo"checked='checked'";} ?>
	 				>华西
	 			</td>
	 		</tr>
	 		<tr>
	 			<td><input type="submit" value="submit"></td>
	 		</tr>
	 	</table>
	 	</form>
</body>
</html>