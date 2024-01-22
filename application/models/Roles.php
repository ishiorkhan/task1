<?php

class Roles extends CI_Model
{

    function getRoles()
    {
        $query = $this->db->query("Select * From roles ");
        return $query->result();
    }
}

?>
