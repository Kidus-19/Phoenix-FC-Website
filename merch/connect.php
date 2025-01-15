<?php
class Connect{
    private $host='localhost';
    private $user='root';
    private $pw='';
    private $db='footballdb';
    function getConnection()
    {
        $con=new mysqli($this->host,$this->user,$this->pw,$this->db);
        if(!$con)
        {
            die('error occured'.mysqli_connect_error());
        }
        return $con;
    }
    
}
/* $conn=new Connect;
$conn->getConnection(); */
?>