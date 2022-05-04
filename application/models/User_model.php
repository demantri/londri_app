<?php 
class User_model extends CI_Model
{
    public function getUser()
    {
        $q = "SELECT b.*, a.id AS id_user, a.username, a.email, a.password, a.is_active, a.created_at
        FROM user a
        LEFT JOIN role b ON a.role_id = b.id";
        return $this->db->query($q);
    }
}
