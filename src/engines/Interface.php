<?php
namespace higherchen\view\engines;

interface TemplateEngine {
	function setPath($path);
	function render($name, $data, $display);
}
