<?php
/**
 * 書き換え禁止ブロック ｺｺｶﾗ
 */
set_time_limit(0);
// 書き換え禁止ブロック ｺｺｶﾗ
require_once('TreasureBox.php');
$TreasureBox = new TreasureBox();

$fileName = str_replace('php', 'log', $argv[0]);
$startTime = microtime(true);

$ans = doAns($TreasureBox->getTresureBox());

$endTime = microtime(true);
if($TreasureBox->checkTresureCount($ans)) {
	$resultTime = ($endTime - $startTime);
	file_put_contents('./log/'.$fileName , 'time:'.$resultTime.PHP_EOL.'memory:'.memory_get_usage().PHP_EOL, FILE_APPEND);
} else {
	echo '答えが間違っているよ！！'.PHP_EOL;
}
/**
 * 書き換え禁止ブロック ｺｺﾏﾃﾞ
 */

/**
 * @param strin $TreasureBox json形式
 * @return int
 */
function doAns($TreasureBox) {
	return 0;
}
