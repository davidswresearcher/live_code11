<?php
  class PagesController {
    public function home() {
      $first_name = 'Jane';
      $last_name  = 'Doe';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>