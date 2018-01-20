<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");

session_destroy();
redirect('/admin');