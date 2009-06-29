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

class ClickHelper extends Helper {
	var $helpers = array('Html');
	
  function link($title, $url = null, $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true) {
    return $this->Html->link($title,
											 array('controller' => 'click', 'action' => 'go', '?' => array('u' => $url)),
											 $htmlAttributes, $confirmMessage, $escapeTitle);
  }
}
?>