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
<?php
	$data = $this->requestAction(array('controller' => 'click', 'action' => 'latest', 'plugin' => 'click'));
?>
<h1>Recent Clicks</h1>
<table>
	<tr>
		<th><?php __('URL') ?></th>
		<th><?php __('When') ?></th>
	</tr>
<?php
	foreach($data as $row) {
?>
	<tr class="status-detail" id="status-click-latest-detail-<?php echo $row['Click']['id'] ?>">
		<td>
			<span><?php
				$display = $row['Click']['url'];
				if(strlen($display) > 25) {
					$display = substr($display, 0, 25) . '...';
					echo '<abbr title="' . $row['Click']['url'] . '">' . $display . '</abbr>';
				} else {
					echo $display;
				}
			?></span>
			<div title="<?php echo $row['Click']['url'] ?>" class="overlay-status-click-latest-detail" id="overlay-status-click-latest-detail-<?php echo $row['Click']['id'] ?>">
				<table>
					<tr><td><?php __('URL') ?></td><td><?php echo $row['Click']['url'] ?></td></tr>
					<tr><td><?php __('User Agent') ?></td><td><?php echo $row['Click']['user_agent'] ?></td></tr>	
					<tr><td><?php __('IP Address') ?></td><td><?php echo $row['Click']['ip_address'] ?></td></tr>
					<tr><td><?php __('Time') ?></td><td><?php echo $row['Click']['created'] ?></td></tr>
				</table>
			</div>
		</td>
		<td><?php echo $time->timeAgoInWords($row['Click']['created']) ?></td>
	</tr>
<?php } ?>
</table>

<script type="text/javascript">
	$(function() {
		$(".overlay-status-click-latest-detail").dialog({autoOpen: false, modal: true, width: "600px"});
		$(".status-detail").click(function() {
			var id = "#overlay-" + $(this).attr("id");
			$(id).dialog("open");
		});
	});
</script>
