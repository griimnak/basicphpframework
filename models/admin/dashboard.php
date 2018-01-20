<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");


function get_users() {
  $get_users = Database::instance()->query(
    'SELECT COUNT(*) username FROM users'
  );
  $get_users->execute();

  if($get_users->rowCount()) {

    $result = $get_users->fetchColumn();
    
  } else {

    $result = '0';
  }

  return $result;
}
