<?php
require('./common.php');

$page = new Crud('SurveyQuestion');
$page->title = "Question";
render();
