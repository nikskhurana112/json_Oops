<?php

class Control{
    private $db = null;
    private $table = "books";
    private $rows = 0;
    
    public function __construct($db){
        $this->db = db;
    }

    public function isEmpty()
    {
        return $this->rows == 0 ? true : false;
    }

    public function isNotEmpty()
    {
        return $this->rows > 0 ? true : false;
    }

    public function list()
    {
       return $this->query("SELECT * FROM ".$this->table);
    }

    public function find($id)
    {
      return $this->query("SELECT * FROM '. $this->table .' WHERE id = '$id'");
    }

    public function isExists($col,$val){
        $tbl = $this->table;
        $this->query("SELECT * FROM $tbl WHERE $col = '$val'");
        return $this->isNotEmpty();
  }
  public function listRows($result)
  {
        $response = [];
        for ($i = 0; $i < $this->rows; $i++) {
            $data = $result->fetch_assoc();
            $response[$i] = $data;
        }
        return $response;
  }

}