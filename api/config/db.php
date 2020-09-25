<?php
  class Database {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '123456!a';
    private $db_name = 'app';

    public function getConnection() {

      $this->conn = null;

      $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }

      $this->conn->set_charset("utf8");

      return $this->conn;
    }

    public function closeConnection() {

      $this->conn->close();
    }
  }
?>
