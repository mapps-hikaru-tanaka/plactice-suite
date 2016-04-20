<?php

require_once 'util.php';
require_once 'db.php';


class Main extends Util {
	public $DB = null;

	/**
	 * コンストラクタ
	 * DB接続実行
	 */
	function __construct() {
		$this->DB = new DB();
		$this->main();
	}

	/**
	 * メインの処理
	 */
	function main() {
		$result = $this->getValue();

		foreach($result as $val) {
			echo $val['mcha'];
		}
	}

	/**
	 * データ入力
	 * @return String $result
	 */
	function getValue() {
		$query =
'SELECT chiled.id as cid, `master`.chara as mcha FROM chiled'.
'LEFT JOIN `master`'.
'ON chiled.master_id = `master`.id'.
'order by chiled.id;';
		return $this->DB->query($query);
	}
}

new Main();
