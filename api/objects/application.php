<?php
  class Application {

    private $conn;
    private $table = 'Applications';

    public $id;
    public $user_id;
    public $submit_date;
    public $start_date;
    public $end_date;
    public $reason;
    public $status;

    public function __construct($db) {
      $this->conn = $db;
    }

    function update() {
      $sql = "UPDATE $this->table SET status='$this->status' WHERE id=$this->id";
      if ($this->conn->query($sql)===TRUE) {
        return true;
      }
      return false;
    }

    function readId() {
      $sql = "SELECT * FROM $this->table WHERE user_id=$this->id ORDER BY submit_date DESC";
      $result = $this->conn->query($sql);
      return $result;
    }

    function create() {
      $sql = "INSERT INTO $this->table (user_id, submit_date, start_date, end_date, reason, status)
      VALUES ($this->user_id, '$this->submit_date', '$this->start_date', '$this->end_date', '$this->reason', '$this->status')";
      if ($this->conn->query($sql)===TRUE) {
        return true;
      }
      return false;
    }

  }
?>
