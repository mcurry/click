<?php
class ClickHelper extends Helper {
	var $helpers = array('Html');
	
  function link($title, $url = null, $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true) {
    return $this->Html->link($title,
											 array('controller' => 'click', 'action' => 'go', '?' => array('u' => $url)),
											 $htmlAttributes, $confirmMessage, $escapeTitle);
  }
}
?>