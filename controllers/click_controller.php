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

class ClickController extends ClickAppController {
	var $name = 'Click';
	var $components = array('RequestHandler');

	var $bots = array('trendiction.com',
										'aiderss.com',
										'Googlebot',
										'Spinn3r',
										'Twiceler',
										'www.radian6.com',
										'VSynCrawler');

	function go() {
		if (empty($this->params['url']['u'])) {
			$this->redirect($this->referer());
		}

		$url = $this->params['url']['u'];

		if (preg_match('/(' . implode ('|', $this->bots) . ')/is', $_SERVER['HTTP_USER_AGENT'])) {
			$this->redirect($url);
		}

		$d = array('url' => $url,
							 'user_agent' => $_SERVER['HTTP_USER_AGENT'],
							 'ip_address' => $_SERVER['REMOTE_ADDR']);

		$this->Click->save($d);

		$this->redirect($url);
	}

	function latest() {
		$this->paginate = array('limit' => 10);
		return $this->paginate();
	}

	function most($span='1') {
		$data = $this->Click->find('all', array('fields' => array('url', 'count(*) as cnt'),
																						'group' => 'url',
																						'conditions' => array('created >=' => date('Y-m-d H:i:s', strtotime('-' . $span . ' days'))),
																						'limit' => 10,
																						'order' => 'cnt DESC'));

		if ($this->RequestHandler->isAjax()) {
			$this->set('data', $data);
		} else {
			return $data;
		}
	}
}
?>
