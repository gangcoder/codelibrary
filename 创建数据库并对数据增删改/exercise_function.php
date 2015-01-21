<?php 
	//显示查询信息
	function show_query($sql)
		{
			$result = mysql_query($sql);
			$result or die("查询失败");

			// $num_rows = mysql_num_rows($result);
			$num_cols = mysql_num_fields($result);

			echo "<table border='1px' rules='all'>";
			// echo "<table>";
			//表头
			echo "<tr>";
			for ($j=0; $j < $num_cols; $j++) { 
				$field_name = mysql_field_name($result,$j);
				echo "<th>{$field_name}</th>";
			}
			echo "</tr>";
			//表中
			while($result_array = mysql_fetch_array($result)) { 
				echo "<tr>";
				for ($j=0; $j < $num_cols; $j++) { 
					$field_name = mysql_field_name($result,$j);
					echo "<td>{$result_array[$field_name]}</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}

		// function xingqu_xuanze()
		// {
		// 	$xingqu = "NULL";
		// 	for ($i=1; $i <=5; $i++) { 
		// 		$xingqu_jiance = 'xingqu'.$i;
		// 		if (isset($_POST[$xingqu_jiance])) {
		// 			$xingqu += $_POST[$xingqu_jiance];
		// 		}
		// 	}
		// 	return $xingqu;
		// }
 ?>