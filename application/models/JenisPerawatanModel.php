<?php
class JenisPerawatanModel extends CI_Model
{
    function getAll()
    {
        $query = $this->db->get('jenis_perawatan');
        return $query->result();
    }

    function findById($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('jenis_perawatan');
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO jenis_perawatan (id,nama) VALUES (default,?)";
        $this->db->query($sql,$data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM jenis_perawatan WHERE id=?";
        $this->db->query($sql,[$id]);
    }

    function update($data)
    {
        $sql = "UPDATE jenis_perawatan SET nama=? WHERE id=?";
        $this->db->query($sql,$data);
    }

}
