<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->email directly
    public $userID;
    public $email;
    public $phone;

    public function __construct($userID, $email, $phone) {
      $this->userID      = $userID;
      $this->email  = $email;
      $this->phone = $phone;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM accounts');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['email'], $post['phone']);
      }

      return $list;
    }

    public static function find($userID) {
      $db = Db::getInstance();
      // we make sure $userID is an integer
      $userID = intval($userID);
      $req = $db->prepare('SELECT * FROM accounts WHERE id = :id');
      // the query was prepared, now we replace :userID with our actual $userID value
      $req->execute(array('userID' => $userID));
      $post = $req->fetch();

      return new Post($post['id'], $post['email'], $post['phone']);
    }
  }
?>