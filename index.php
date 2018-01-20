<?php

$time_start = microtime(true);

require('./self/core.php');

$path = 'controllers/'; 

$default_404_page = '404';
 

if(empty($_GET['page'])) { 
  $page = 'index'; 

} else{
  $page = (preg_match('/[^a-zA-Z0-9\ _-]/', $_GET['page']) || 
    !is_file($path . $_GET['page'] . '.php') ? $default_404_page : $_GET['page']);
}


require($path . $page . '.php');
 
$time_end = microtime(true);

$execution_time = ($time_end - $time_start);
echo('<!-- '.$execution_time.' -->');