<!-- create table user (
	id int auto_increment primary key,
	username varchar(10) not null UNIQUE,
	password varchar(10) not null,
	age tinyint,
	xueli enum('专科','本科','硕士','博士'),
	xingqu set('排球', '篮球', '足球', '中国足球', '地球'),
	laizi enum('东北', '华北', '西北', '华东', '华南', '华西'),
	regtime timestamp
	); 
//改进
create table user_info(
	id int auto_increment key,
	user_name varchar(30) unique,
	user_pass char(32) not null,
	age tinyint,
	edu enum ('专科','本科','硕士','博士'),
	fav set ('排球', '篮球', '足球', '中国足球', '地球'),
	come_from enum ('东北', '华北', '西北', '华东', '华南', '华西'),
	regtime datetime
	)
	-->
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Add</title>
 </head>
 <body>
 <div style = "float:left; margin-right:50px">
 	<form action="" method="post">
 	<table>
 		<tr>
 			<th bgcolor="#ccc">添加数据</th>
 			<th bgcolor="#ccc"></th>
 		</tr>
 		<tr>
 			<td>用户名：</td>
 			<td><input type="text" name="username" value= <?php if ($_POST) { echo $_POST['username']; } ?>></td>
 		</tr>
 		<tr>
 			<td>密码：</td>
 			<td><input type="password" name="password" id="" value= <?php if ($_POST) { echo $_POST['password']; } ?>></td>
 		</tr>
 		<tr>
 			<td>年龄：</td>
 			<td><input type="text" name="age" id="" value=<?php if ($_POST) { echo $_POST['age']; }?>></td>
 		</tr>
 		<tr>
 			<td>学历：</td>
 			<td>
	 			<select name="xueli">
	 				<option value="1">专科</option>
	 				<option value="2" selected="selected">本科</option>
	 				<option value="3">硕士</option>
	 				<option value="4">博士</option>
	 			</select>
 			</td>
 		</tr>
 		<tr>
 			<td>兴趣：</td>
 			<td>
 				<input type="checkbox" name="xingqu[]" value="1" id="">排球
 				<input type="checkbox" name="xingqu[]" value="2" id="">篮球
 				<input type="checkbox" name="xingqu[]" value="4" id="">足球
 				<input type="checkbox" name="xingqu[]" value="8" id="">中国足球
 				<input type="checkbox" name="xingqu[]" value="16" id="">地球
 			</td>
 		</tr>
 		<tr>
 			<td>来自：</td>
 			<td>
 				<input type="radio" name="laizi" value="1"  checked = 'checked' id="">东北
 				<input type="radio" name="laizi" value="2" id="">华北
 				<input type="radio" name="laizi" value="3" id="">西北
 				<input type="radio" name="laizi" value="4" id="">华东
 				<input type="radio" name="laizi" value="5" id="">华南
 				<input type="radio" name="laizi" value="6" id="">华西
 			</td>
 		</tr>
 		<tr>
 			<td><input type="submit" value="submit"></td>
 		</tr>
 	</table>
 	</form>
 </div>
 	 </body>
 </html>
	<?php 
	require 'exercise_connect.php';
	require 'exercise_function.php';

	function show_query_ex($sql,$table_name,$page_size)
		{
			$result = mysql_query($sql);
			// echo $sql;
			$result or die("查询失败");

			$num_rows = mysql_num_rows($result);
			$num_cols = mysql_num_fields($result);

			echo "<table border='1px' rules='all'>";
			// echo "<table>";
			//表头
			echo "<tr>";
			for ($j=1; $j < $num_cols; $j++) { 
				$field_name = mysql_field_name($result,$j);
				echo "<th>{$field_name}</th>";
			}
			echo "<th>操作</th>";
			echo "</tr>";
			//表中
			while($result_array = mysql_fetch_array($result)) { 
				echo "<tr>";
				for ($j=1; $j < $num_cols; $j++) { 
					$field_name = mysql_field_name($result,$j);
					echo "<td>{$result_array[$field_name]}</td>";
				}
				echo "<td><a href = 'exercise_delete.php?id={$result_array['id']}&table_name={$table_name}'>删除</a>";
				echo " | ";
				echo "<a href = 'exercise_edit.php?id={$result_array['id']}&table_name={$table_name}'>修改</a></td>";
				echo "</tr>";
			}
			// $n =  ceil($num_rows / $page_size);
			// echo "$n";
			echo "<tr><td colspan='7' align = 'center'>";
				for ($k=1; $k <= 10; $k++) { 
					echo " &nbsp; <a href = 'exercise_index.php?page_size=$k'>&nbsp;{$k}&nbsp;</a>";
				}
			echo "</td></tr>";
			echo "</table>";
		}


if ($_POST){
	// print_r($_POST);
 	// echo "$sqlquery";
	// echo "if内";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$age = $_POST['age'];
	$xueli = $_POST['xueli'];
	$xingqu = isset($_POST['xingqu'])?array_sum($_POST['xingqu']):'NULL';
	$laizi = $_POST['laizi'];

	$sql = "insert into user (username, password, age, xueli, xingqu, laizi) values ('$username','$password',$age,$xueli,$xingqu,$laizi);"; 
	// echo $sql; die();
	//用户名不为空时执行
	if ($username) {
		mysql_query($sql) or die(mysql_error());
	}
	// die();
}
	$n = isset($_GET['page_size'])?$_GET['page_size']:1;
	$page_size = 3;
	$start = ($n-1)*$page_size;
 	$table_name = 'user';
 	// $sqlquery = "select id, username as 用户名, age as 年龄, xueli as 学历, xingqu as 兴趣, laizi as 来自,regtime as 注册时间 from $table_name limit $start, $page_size";
 	$sqlquery = "select id, username as 用户名, age as 年龄, xueli as 学历, xingqu as 兴趣, laizi as 来自,regtime as 注册时间 from $table_name";
 	show_query_ex($sqlquery,$table_name,$page_size);
 ?>