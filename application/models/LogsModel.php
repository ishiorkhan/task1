<?php

class LogsModel extends CI_Model
{

    function getLogs()
    {
        $query = $this->db->query("
            SELECT *, COUNT(*) as keywords_count From logs
            WHERE deleted_at IS NULL
            GROUP BY keywords
            ORDER BY id DESC
            ");
        return $query->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('employees', $data);
    }
}

?>
