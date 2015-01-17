<?php 
	header("Content-Type: text/html; charset=UTF-8");
	$a3 = array(
		array(11,12, 13),
		array(21,22,23, 24, 25),
		array(31,32,33, 35),
		array(41,42,43)
	);
	//echo "<pre>"; print_r($GLOBALS); echo "</pre>"; exit();
	// echo "<pre>"; print_r($a3); echo "</pre>";

	//获取数组内部的所有数据之和，个数，平均值
	function array_sum_number($arr,$flag = true)
	{
		$arr_len = count($arr);
		
		//第一次调用函数时进行初始化处理
		$sum = 0;
		if ($flag) {
			if (isset($GLOBALS['array_number'])) {
				$variable = $GLOBALS['array_number'];
				$GLOBALS['array_number'] = 0;
				$variable_exit = true;
			}else{
				$GLOBALS['array_number'] = 0;
				$variable_exit = false;
			}
		}

		//获取整个数组的总值，数值的个数
		for ($i=0; $i < $arr_len; $i++) { 
			if (is_array($arr[$i])) {
				$sum += array_sum_number($arr[$i],false);
				//在这里使用数组指定使用sum
			}else{
				$sum += $arr[$i];
				$GLOBALS['array_number']++;
			}
		}
		
		//整理数据与销毁

		//可以不使用标记，全部用数组
		if ($flag) {
			echo "数组内有 {$GLOBALS['array_number']} 个元素 --: 所有元素和为 {$sum} --:该数组共有数值 {$GLOBALS['array_number']} 个<br/>"; //测试输出
			$array['sum'] = $sum;
			$array['number'] = $GLOBALS['array_number'];
			$array['average'] = $array['sum']/$array['number'];
			//全局变量改变的恢复
			if ($variable_exit) {
				$GLOBALS['array_number'] = $variable;
			}else{
				unset($GLOBALS['array_number']);
			}
			return $array;
		}else{
			echo "数组内有 {$i} 个元素 --: 所有元素和为 {$sum} --:该数组共有数值 {$GLOBALS['array_number']} 个<br/>"; //测试输出
			return $sum;
		}
	}
	// $array_number = 12; //全局变量测试
	echo "<pre>";
	print_r(array_sum_number($a3));
	echo "</pre>";
	// echo "$array_number"; //全局变量测试
	echo "<pre>";
	print_r(array_sum_number($a3));
	echo "</pre>";
	// $arr_num[] = range(1, 1);
	// $arr_num[] = range(1, 2);
	// $arr_num[] = range(1, 3);
	// $arr_num = range(1, 5);
	// $arr_num[] = 1;
	// echo array_sum_number($arr_num,true),"<br/>";	//测试数据
 ?>