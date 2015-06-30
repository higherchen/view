<?php

namespace higherchen\view\engines;

class SmartyEngine implements TemplateEngine {

	protected $smarty;

	public function __construct() {
		$smarty = new \Smarty;
		$smarty->caching = true;
		$smarty->cache_lifetime = 120;
		$this->smarty = $smarty;
	}

	public function __call($name, $arguments) {
		return call_user_func_array(array($this->smarty, $name), $arguments);
	}

	public function setPath($path) {
		$this->smarty->setTemplateDir($path);
	}

	public function render($name, $data, $display) {

		foreach ($data as $key => $value) {
			$this->smarty->assign($key, $value);
		}

		if ($display == true) {
			$this->smarty->display($name);
		} else {
			return $this->smarty->fetch($name);
		}
	}
}
