<?php
	/**
	 * Created by PhpStorm.
	 * User: shaun
	 * Date: 2020/11/18
	 * Time: 15:56
	 */
	namespace App\Helpers;
	
	use Illuminate\Support\Str;
	
	if (!function_exists('humpToUnderLine')) {
		/**
		 * Returns a human readable file size
		 *
		 * @param integer $bytes
		 * Bytes contains the size of the bytes to convert
		 *
		 * @param integer $decimals
		 * Number of decimal places to be returned
		 *
		 * @return string a string in human readable format
		 *
		 * */
		/**
		 * 驼峰转下划线 字符串函数 MakeById => make_by_id
		 * @param $str
		 *
		 * @return string
		 */
		function humpToUnderLine($str)
		{
			$len = strlen($str);
			$out = strtolower($str[0]);
			for ($i=1; $i<$len; $i++) {
				if(ord($str[$i]) >= ord('A') && (ord($str[$i]) <= ord('Z'))) {
					$out .= '_'.strtolower($str[$i]);
				}else{
					$out .= $str[$i];
				}
			}
			return $out;
		}
		
	}
	
	if (!function_exists('getFinalSql')){
		
		function getFinalSql($query)
		{
			$sql_str = $query->toSql();
			$bindings = $query->getBindings();
			$wrapped_str = str_replace('?', "'?'", $sql_str);
			return Str::replaceArray('?', $bindings, $wrapped_str);
		}
	}
	
	if(!function_exists('transformNumberUnit')){
		
		function transformNumberUnit($numberUnitStr){
			switch($numberUnitStr){
				case 'k':
					$numberUnitStr = pow(10,3);
					break;
				case 'M':
					$numberUnitStr = pow(10,6);
					break;
				case 'G':
					$numberUnitStr = pow(10,9);
					break;
				case 'Ｔ':
					$numberUnitStr = pow(10,12);
					break;
				case 'Ｐ':
					$numberUnitStr = pow(10,15);
					break;
				default:
					$numberUnitStr = 10;
			}
			return $numberUnitStr;
		}
	}