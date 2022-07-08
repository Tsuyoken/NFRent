<?php
class PerawatanModel extends CI_Model
{
    function join_jenis_perawatan()
    {
        // $this->db->select('*');
        // $this->db->from('perawatan');
        // $this->db->join('jenis_perawatan', 'jenis_perawatan.id = perawatan.jenis_perawatan_id');
        $sql = "SELECT perawatan.id as id, perawatan.tanggal, perawatan.biaya, perawatan.deskripsi, mobil.nopol as nama_mobil, jenis_perawatan.nama as nama_jenis FROM perawatan join jenis_perawatan ON jenis_perawatan.id = perawatan.jenis_perawatan_id
                join mobil ON mobil.id = perawatan.mobil_id";
        // $query = $this->db->get();
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getMobil()
    {
        $sql = "SELECT mobil.id as id, merk.nama, mobil.nopol FROM mobil join merk ON merk.id = mobil.merk_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getJenisPerawatan()
    {
        // $sql = "SELECT jenis_perawatan.id as id, jenis_perawatan.nama FROM perawatan join jenis_perawatan ON jenis_perawatan.id = perawatan.jenis_perawatan_id";
        $query = $this->db->get('jenis_perawatan');
        return $query->result();
    }

    function getAll()
    {
        $query = $this->db->get('perawatan');
        return $query->result();
    }

    function findById($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('perawatan');
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO perawatan (id,tanggal,biaya,deskripsi, mobil_id,jenis_perawatan_id) VALUES (default,?,?,?,?,?)";
        $this->db->query($sql,$data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM perawatan WHERE id=?";
        $this->db->query($sql,[$id]);
    }

    function update($data)
    {
        $sql = "UPDATE perawatan SET tanggal=?,biaya=?,deskripsi=?, mobil_id=?,jenis_perawatan_id=? WHERE id=?";
        $this->db->query($sql,$data);
    }
}