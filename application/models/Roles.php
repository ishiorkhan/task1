<?php

class Roles extends CI_Model
{

    function getRoles()
    {
        $query = $this->db->query("Select * From roles WHERE deleted_at IS NULL ");
        return $query->result();
    }
}

?>
