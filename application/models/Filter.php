<?php

class Filter extends CI_Model
{
    function getSearchKey($text)
    {
        $query = $this->db->query("
            Select employees.name,employees.surname,employees.date,employees.salary,roles.name as role_name
                From employees
                JOIN roles
            on employees.role_id=roles.id
            where employees.name LIKE '%$text%' OR employees.surname LIKE '%$text%'
            ");
        return $query->result_array();
    }


    public function getFilter($role, $min_salary, $max_salary, $search_text)
    {
        $query = "Select employees.name,employees.surname,employees.date,employees.salary,roles.name as role_name
                  From employees
                  JOIN roles
                  on employees.role_id=roles.id
                  WHERE employees.deleted_at IS NULL";
        if ($role)
        {
            $query .= " AND employees.role_id=$role";
        }

        if (!empty($min_salary))
        {
            $query .= " AND employees.salary >= $min_salary";
        }

        if (!empty($max_salary))
        {
            $query .= " AND employees.salary <= $max_salary";
        }

        if ($search_text != '')
        {
            $query .= " AND (employees.name LIKE '%$search_text%' OR employees.surname LIKE '%$search_text%')";
        }

        if ($search_text != '')
        {
            $query .= " AND (employees.name LIKE '%$search_text%' OR employees.surname LIKE '%$search_text%')";
        }

        $query = $this->db->query($query);

        return $query->result();
    }
}

?>
