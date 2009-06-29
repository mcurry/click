<table>
	<tr>
		<th><?php __('URL') ?></th>
		<th><?php __('Clicks') ?></th>
	</tr>
<?php
	foreach($data as $row) {
?>
	<tr>
		<td><?php echo $row['Click']['url'] ?></td>
		<td><?php echo $row[0]['cnt'] ?></td>
	</tr>
<?php } ?>
</table>