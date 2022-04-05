<?php


class UserController
{
      private $db = null;
      private $table = "signUps";
      private $rows = 0;
    
      public function __construct($db)
      {
          $this->db = $db;
      }

      public function list()
      {
         return $this->query("SELECT * FROM ".$this->table);
      }

      public function find($id)
      {
        return $this->query("SELECT * FROM '. $this->table .' WHERE id = '$id'");
      }

      public function query($query)
      {
         $result =  $this->db->query($query);
         
         if ($result == null) {
                echo $this->db->error;
                exit;
         }
         if( ($result instanceof mysqli_result)  == false){
             return [];
         }
         $this->rows = $result->num_rows;
         if($this->isEmpty() == false){
             return $this->listRows($result);
         }
         return [];
      }

      public function isEmpty()
      {
          return $this->rows == 0 ? true : false;
      }

      public function isNotEmpty()
      {
          return $this->rows > 0 ? true : false;
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

      public function isExists($col,$val){
            $tbl = $this->table;
            $this->query("SELECT * FROM $tbl WHERE $col = '$val'");
            return $this->isNotEmpty();
      }
}
