<?php
require('common.php');
$survey_id = $sql->getOne("SELECT MAX(id) FROM Survey WHERE status='1'"); //get_cycle();
$survey = $sql->getAssoc("SELECT * FROM Survey WHERE id=$survey_id");

if(!$survey_id) {
	render("closed.php");
	exit;
}

if(empty($QUERY['vol'])) {
	if(empty($_SESSION['user_id'])) {
		$url_parts = parse_url($config['site_url']);
		$domain = $url_parts['scheme'] . '://' . $url_parts['host'];
		$madapp_url = "http://makeadiff.in/madapp/";
		if(strpos($config['site_home'], 'localhost') !== false) $madapp_url = "http://localhost/Projects/Madapp/";

		header("Location: " . $madapp_url . "index.php/auth/login/" . base64_encode($domain . $config['PHP_SELF']));
		exit;
	}
	$user_id = $_SESSION['user_id'];
} else {
	$user_id = base64_decode($QUERY['vol']); // 'MQ==' is Binny.
}

$user = $sql->from("User")->find($user_id);
$questions = $sql->from("SurveyQuestion")->where(array('status' => '1', 'survey_id' => $survey_id))->sort("sort_order")->get('byid');
$responses = $sql->getById("SELECT question_id, answer FROM SurveyResponse WHERE user_id=$user_id AND question_id IN (" . implode(",", array_keys($questions)) . ")");

render();