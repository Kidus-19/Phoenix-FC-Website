<?php
    class connect{
      private  $host ="localhost";
      private  $user="root";
      private  $pwd="";
      private  $db="footballdb";
        
    function getConn(){
        return mysqli_connect($this->host,$this->user,$this->pwd,$this->db);
      }

    }
?>