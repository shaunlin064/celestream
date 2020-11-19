<?php
	/**
	 * Created by PhpStorm.
	 * User: shaun
	 * Date: 2020/11/18
	 * Time: 15:56
	 */
	namespace App\Helpers;
	
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