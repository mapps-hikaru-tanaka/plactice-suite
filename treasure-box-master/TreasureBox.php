<?php
/**
 * 宝箱です
 */
Class TreasureBox {
	private $_itemArr =
		array(
			'\\',
			'$',
			'&',
			'#',
			'!',
			'%',
			'^',
			'|',
			'*',
			'@');

	private $_treasureCount = 0;

	private $_tresureBox = array();

	/**
	 */
	public function __construct() {
		$this->_tresureBox = $this->_getBox(0);
	}

	/**
	 * @return string(json)
	 */
	public function getTresureBox() {
		return json_encode($this->_tresureBox);
	}

	/**
	 * @param int $count
	 * @return bool
	 */
	public function checkTresureCount($count) {
		return $this->_treasureCount === $count;
	}

	/**
	 * @param int $depth 階層の深さ
	 * @return array $tresureBox 宝箱
	 */
	private function _getBox($depth) {
		for($i = 0; $i < 50; $i++) {
			$maxCol = ($depth < 4)? 10: 9;
			$key = mt_rand(0, $maxCol);
			if($key === 10) {
				$item = $this->_getBox($depth + 1);
			} else {
				$item = $this->_itemArr[$key];
				if($item === '\\' || $item === '$') {
					$this->_treasureCount++;
				}
			}
			$tresureBox[] = $item;
		}
		return $tresureBox;
	}
}

