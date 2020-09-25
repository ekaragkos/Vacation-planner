<?php
  class User {

    private $conn;
    private $table = 'Users';

    public $id;
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $type;

    public function __construct($db) {
      $this->conn = $db;
    }

    function read() {
      $sql = "SELECT * FROM $this->table";
      $result = $this->conn->query($sql);
      return $result;
    }

    function readId() {
      $sql = "SELECT * FROM  $this->table WHERE id=$this->id";
      $result = $this->conn->query($sql);
      return $result;
    }

    function readLogin() {
      $sql = "SELECT * FROM " . $this->table . " WHERE email='$this->email' AND password='$this->password'";
      $result = $this->conn->query($sql);
      return $result;
    }

    function update() {
      $sql = "INSERT INTO $this->table (id,fname, lname, email, password, type)
      VALUES ($this->id, '$this->fname', '$this->lname', '$this->email', '$this->password', '$this->type')
      ON DUPLICATE KEY UPDATE fname='$this->fname', lname='$this->lname', email='$this->email', password='$this->password', type='$this->type'";
      // $sql = "UPDATE $this->table SET fname='$this->fname', lname='$this->lname', email='$this->email', password='$this->password', type='$this->type' WHERE id=$this->id";
      if ($this->conn->query($sql)===TRUE) {
        return true;
      }
      die($this->conn->error);
      return false;
    }

    function nextId() {
      $sql = "SELECT COUNT(id) AS id FROM $this->table";
      $result = $this->conn->query($sql);
      return $result;
    }

  }
?>
