<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");

render_view('admin/login.php');

if(isset($_POST['login-submit'])) {
    if($_POST['username'] == '' or $_POST['password'] == '') {
        $_SESSION['error'] = 'One or more fields have been left blank.';
        refresh();
    } else {


    render_model('admin/login.php');
    validate_login(clean($_POST['username']), clean($_POST['password']));
  }
}