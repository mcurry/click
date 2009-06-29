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
	$data = $this->requestAction(array('controller' => 'click', 'action' => 'most', 'plugin' => 'click'));
?>
<?php echo $form->create('Click', array('id' => 'ClickMostForm')); ?>
<h1>Most Clicked
(last
<?php
	echo $form->input('most_span', array('type' => 'select', 'options' => array('1' => 'day', '7' => 'week', '30' => 'month', '365' => 'year'),
																	'div' => false, 'label' => false));
?>)
</h1>
<?php echo $form->end(); ?>

<div id="click_most_table">
	<?php echo $this->element('most_table', array('plugin' => 'click', 'data' => $data)) ?>
</div>

<script type="text/javascript">
	$(function(){
		$("#ClickMostSpan").change(function() {
			$("#click_most_table").html("<img src=\"/status/img/ajax-loader.gif\" \>");
			$.get("/click/most/" + $(this).val(), function(data) {
				$("#click_most_table").html(data);
			});
		});
	});
</script>