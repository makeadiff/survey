<?php
require('./common.php');

if($QUERY['action']) {
	$count = 0;
	foreach ($QUERY['answer'] as $key => $value) {
		$sql->insert("SurveyResponse", array('question_id'=>$key, 'answer'=>$value, 'user_id'=>$_SESSION['user_id'], 'added_on'=>'NOW()'));
		$count++;
	}

	render();
	exit;
}
header("Location: form.php");