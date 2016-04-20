<?php

/**
 * 汎用メソッド群
 */
class Util {

	/**
	 * 画面にメッセージを表示する
	 * @param mixed $msg
	 * @param string $params 表示の属性
	 */
	function _log($msg,$params = ""){
		if($params !== ""){
			echo $params.":";
		}
		if(is_array($msg) || is_object($msg)){
			var_dump($msg);
			// print_r($msg);
			echo PHP_EOL;
		}else{
			echo $msg.PHP_EOL;
		}
	}

	/**
	 * クエリで使う現在時刻を取得する
	 * @return string
	 */
	function _getNow() {
		return date('Y-m-d H:i:s');
	}
}
