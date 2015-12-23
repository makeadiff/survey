<h1>Responses</h1>

<table class="table table-striped">
<tr><th>User</th><th>Time</th></tr>
<?php foreach ($responses as $row) { ?>
<tr><td><a href="../form.php?user_id=<?php echo base64_encode($row['id']) ?>"><?php echo $row['name'] ?></a></td><td><?php echo date($config['time_format_php'], strtotime($row['added_on'])) ?></td></tr>
<?php } ?>
</table>