<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('./config.php');

require('./self/db.php');


Database::validate();


ob_start();
session_start();


function refresh() {

  header("Refresh:0");
  die();

}

function redirect($location) {

  header('Location: '.$location.'');
  die();

}

function clean($input) {

  return preg_match('/^[a-zA-Z0-9]+$/',$input) ? $input : 0;
  
}

function render_view($view) {
  try {

    include('./views/'.$view);

  } catch(Exception $e) {

    die($e);

  }
}

function render_model($model) {
  try {

    require_once('./models/'.$model);

  } catch(Exception $e) {

    die($e);

  }  
}