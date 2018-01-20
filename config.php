<?php

if(count(get_included_files()) ==1) exit("Direct access not permitted.");

class Config {
  const
    mysql_hostname = 'localhost',
    mysql_username = 'root',
    mysql_password = 'secret',
    mysql_database = 'phpok',

    site_name = 'Griimnak\'s Lair',
    site_desc = 'My own spot on the world wide web.'

;}