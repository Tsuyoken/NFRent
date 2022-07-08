<?php
class MerkModel extends CI_Model
{
    function getAll()
    {
        $query = $this->db->get('merk');
        return $query->result();
    }

    function findById($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('merk');
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO merk (id,nama,produk) VALUES (default,?,?)";
        $this->db->query($sql,$data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM merk WHERE id=?";
        $this->db->query($sql,[$id]);
    }

    function update($data)
    {
        $sql = "UPDATE merk SET nama=?, produk=? WHERE id=?";
        $this->db->query($sql,$data);
    }

}
