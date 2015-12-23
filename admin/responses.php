<?php
require('./common.php');

$survey_id = $sql->getOne("SELECT MAX(id) FROM Survey"); //get_cycle();
$responses = $sql->getAll("SELECT DISTINCT U.id,U.name, SR.added_on
	FROM User U
	INNER JOIN SurveyResponse SR ON SR.user_id = U.id
	INNER JOIN SurveyQuestion SQ ON SQ.id=SR.question_id
	WHERE SQ.survey_id=$survey_id");

render('responses.php');
