<?php

class FormSubmit extends CI_Model
{

    function getEmp()
    {
        $query = $this->db->query('
            Select employees.name,employees.surname,employees.date,employees.salary,roles.name as role_name
                From employees
                JOIN roles
            on employees.role_id=roles.id');
        return $query->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('employees', $data);
    }
}

?>
