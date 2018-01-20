<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");

class Database {
  private static $connection;

  public static function instance() {
    if(is_null(self::$connection)) {

      // Connect to database
      self::$connection = new pdo(
        "mysql:host=".Config::mysql_hostname.";
        dbname=".Config::mysql_database.";",
        Config::mysql_username,
        Config::mysql_password
        );

      // Set exceptions error mode
      self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }

    return self::$connection;
  }

  public static function validate() {
    try {

      Database::instance();

    } catch(PDOException $e) {

      die($e);

    }
  }
}