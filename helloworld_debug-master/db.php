<?php

require_once 'util.php';

/**
 * データベース弄くりクラス
 */
class DB extends Util {


	// @todo 最初にこいつらを設定してあげてね！！
	const DB_HOST = 'localhost';
	const DB_USER = 'admin';
	const DB_PASS = 'admin';
	const DB_NAME = 'kadai_20141216';


	/**
	 * ドライバ保持用
	 */
	public $pdo = null;

	/**
	 * コンストラクタ
	 */
	function __construct() {
		$this->_setPDO();
	}

	/**
	 * @param string $query
	 * @param int $limit
	 */
	public function query($query = '', $limit = 1000) {
		$queryH = $this->pdo->query($query);
		$i = 0;
		$arr = array();
		while($arr[] = $queryH->fetch(PDO::FETCH_ASSOC)) {
			$i++;
			if($i >= $limit) break;
		}
		return $arr;
	}

	/**
	 * PDOドライバセット
	 */
	private function _setPDO() {
		try {
			// 接続(DB選択・文字化け防止含む)
			$this->pdo = new PDO(
				'mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,
				self::DB_USER,
				self::DB_PASS,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
			);
		} catch(PDOException $e){
			$this->_log($e->getMessage(),'ERROR');
			exit;
		}
	}
}
