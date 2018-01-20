<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");

function validate_login($username, $password) {
  $find_user = Database::instance()->prepare(
    'SELECT username, password FROM users WHERE BINARY username = BINARY :username'
  );

  $find_user->bindParam(':username', $username);
  $find_user->execute();

  if($find_user->rowCount()) {
    $result = $find_user->fetch();

    if(password_verify($password, $result['password'])) {
      $_SESSION['logged_in'] = True;
      $_SESSION['username'] = $username;
      redirect('/admin');        
    } else {
      $_SESSION['error'] = 'Incorrect password for ' . $username;
      refresh();
    }

  } else {
    $_SESSION['error'] = 'The user you entered doesn\'t exist';
    refresh();       
  }
}

