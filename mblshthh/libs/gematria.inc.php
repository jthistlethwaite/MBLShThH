<?php

class gematriaDB
{
    private $host;
    private $user;
    private $pass;
    private $db_name;
    public $db;
    
    public $lastResult;
    public $db_errno;
    public $db_error;
    
    public function __construct(mysqli $db = null)
    {
        if ( !is_null($db) )
        {
            $this->db = $db;
        }
        elseif ( isset($GLOBALS['mbshdb']) )
        {
            $this->db = $GLOBALS['mbshdb'];
        }

        $this->db->ping();
        $this->db_errno = $this->db->errno;
        $this->db_error = $this->db->error;
    }
    
    public function fetchNum($num)
    {
        if (is_numeric($num))
        {
            $query = "SELECT * FROM liber500 WHERE gematriaValue = '$num'";
            $this->lastResult = $this->db->query($query);
            $this->db_errno = $this->db->errno;
            $resultArray = array();
            while ( $entry = $this->lastResult->fetch_assoc() )
            {
                $resultArray[] = $entry;
            }
            return $resultArray;
        }
        else
        {
            return false;
        }
    }

}


?>