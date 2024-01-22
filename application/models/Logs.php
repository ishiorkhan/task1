<?php

class Logs extends CI_Model
{

    function insertLog($logs)
    {
        $query = $this->db->insert('logs', $logs);
    }
}

?>