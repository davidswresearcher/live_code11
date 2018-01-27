<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=sql.njit.edu;dbname=yz746', 'yz746', 'Q5vvA0U5', $pdo_options);
      }
      return self::$instance;
    }
  }
?> 
