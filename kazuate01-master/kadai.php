<?php
/**
 * 書き換え禁止ブロック ｺｺｶﾗ
 */
set_time_limit(0);
define('ANSER_LENGTH', 10000);
$fileName = str_replace('php', 'log', $argv[0]);
$question = makeQuestion();
$startTime = microtime(true);
$anser = doAnser($question);
$endTime = microtime(true);
if($anser === $question) {
	$resultTime = ($endTime - $startTime);
	file_put_contents('./log/'.$fileName , $resultTime.PHP_EOL, FILE_APPEND);
} else {
	echo '答えが間違っているよ！！'.PHP_EOL;
}

/**
 * 書き換え禁止
 * @return string $ans 
 */
function makeQuestion() {
	$question = '';
	for($i = 0; $i < ANSER_LENGTH; $i++) {
		$question .= mt_rand(0,9);
	}
	return $question;
}
/**
 * 書き換え禁止ブロック ｺｺﾏﾃﾞ
 */




/**
 * @param string $question
 */
function doAnser($question) {
	$ans = '';
	$ansCount = 0;
	while(true) {
		$ansTmp = makeAns($ans);
		$result = checkAns($question, $ansTmp, $ansCount);
		if($result === true) {
			$ansCount++;
			$ans = $ansTmp;
		}

		if($ansCount === ANSER_LENGTH) {
			return $ans;
		}
	}
}


/**
 * @param string $question
 * @param string $anser
 */
function checkAns($question, $anser, $nowCount) {
	$questionArr = str_split($question);
	$anserArr = str_split($anser);
	$ansCount = 0;
	foreach($questionArr as $key => $questionVal) {
		if(isset($anserArr[$key]) && $questionVal == $anserArr[$key]) {
			$ansCount++;
		}
	}

	if ($nowCount < $ansCount) {
		return true;
	} else {
		return false;
	}
}


/**
 * @param string $ans
 */
function makeAns($ans) {
	$ans .= mt_rand(0,9);
	return $ans;
}


