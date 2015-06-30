<?php
use higherchen\view\View;

require __DIR__ . "/smarty/libs/Smarty.class.php";
require __DIR__ . '/Engines/Interface.php';
require __DIR__ . '/Engines/SmartyEngine.php';
require __DIR__ . '/View.php';

// $view = new View(__DIR__, array('hello' => 'world'));
// $view->with('with_data', 'I am with!')->render('demo_html', array('tag' => 'first example!'));

$view = new View(__DIR__, array('hello' => 'world'), 'smarty');
$view->with('with_data', 'I am with!')->render('demo.tpl', array('tag' => 'first example!'));
