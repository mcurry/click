<?php
/*
 * Click Tracking CakePHP Plugin
 * Copyright (c) 2009 Matt Curry
 * www.PseudoCoder.com
 * http://github.com/mcurry/click
 *
 * @author      Matt Curry <matt@pseudocoder.com>
 * @license     MIT
 *
 */
?>
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