<?php
require __DIR__ . '/View.php';

use higherchen\view\View;

$view = new View(__DIR__, array('hello' => 'world'));
$view->with('with_data', 'I am with!')->render('demo_html', array('tag' => 'first example!'));