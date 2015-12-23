<div id="survey" class="row">
<div class="col-md-offset-3 col-md-6">
<h1 class="title"><?php echo $survey['name']; ?> for <strong><?php echo $user['name'] ?></strong></h1>
<br /><br />
<form action="save.php" method="post" id="main-form">
<?php foreach($questions as $q) { ?>
<div class="question-area">
<div class="question">Q. <?php echo $q['question'] ?></div>

<?php 
if($q['type'] == 'text') {
	?>
	<textarea name="answer[<?php echo $q['id']; ?>]" class="form-control" rows="5" cols="70"><?php if(isset($responses[$q['id']])) echo $responses[$q['id']]; ?></textarea><br /><br />
	<?php
} else {
	foreach ($answers as $ans) { 
		if($ans['question_id'] == $q['id']) {
			print '<div class="answer"><input type="radio"  name="answer['.$q['id'].']" id="answer-'.$ans['id'].'" value="'.$ans['level'].'" /> '
					. '<label for="answer-'.$ans['id'].'">' . $ans['answer'] . '</label></div>';
		}
	} 
}
?>
</div><br />
<?php } ?>

<input type="hidden" name="survey_id" value="<?php echo $survey_id; ?>" />
<?php if(!$responses) { ?><input type="submit" name="action" class="btn btn-default" value="Submit Answers" /><?php } ?>
</form>
<br />
</div></div>
