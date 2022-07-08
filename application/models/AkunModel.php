<?php
class AkunModel extends CI_Model
{
    function getAll()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    function findById($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO merk (id,nama,produk) VALUES (default,?,?)";
        $this->db->query($sql,$data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM users WHERE id=?";
        $this->db->query($sql,[$id]);
    }

    function update($data)
    {
        $sql = "UPDATE users SET role=? WHERE id=?";
        $this->db->query($sql,$data);
    }

    function updateFromConfig($data)
    {
        $sql = "UPDATE users SET username=?, password=md5(?), email=? WHERE id=?";
        $this->db->query($sql,$data);
    }

}
