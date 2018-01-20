<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");

if(!isset($_SESSION['logged_in'])) {

  redirect('/adminlogin');
  
} else {

  render_view('admin/dashboard.php');

}