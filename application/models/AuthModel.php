<?php 
class AuthModel Extends CI_Model 
{
    function authentication($username,$password)
    {
        $sql = "SELECT * FROM users WHERE username=? AND password=md5(?)";
        $data= [$username,$password];
        $query = $this->db->query($sql,$data);
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO users (id,username,password, email,created_at,last_login,status,role) VALUES(default,?,md5(?),?,?,?,?,?)";
        $this->db->query($sql,$data);
    }
}