<?php
class SewaModel extends CI_Model
{
    function getAll()
    { 
        $sql = "SELECT sewa.id,sewa.tanggal_mulai, sewa.tanggal_akhir, sewa.tujuan, sewa.noktp, users.username, mobil.nopol FROM sewa join users ON users.id = sewa.users_id join mobil ON mobil.id = sewa.mobil_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getAllByUser($id)
    {
        $sql = "SELECT sewa.id,sewa.tanggal_mulai, sewa.tanggal_akhir, sewa.tujuan, sewa.noktp, users.username, mobil.nopol, mobil.warna FROM sewa 
                join users ON users.id = sewa.users_id 
                join mobil ON mobil.id = sewa.mobil_id WHERE sewa.users_id =".$id;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getMobil()
    {
        $sql = "SELECT mobil.id as id_mobil, merk.nama, mobil.nopol FROM mobil join merk ON merk.id = mobil.merk_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getUser()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    function findById($id)
    {
        $sql = "SELECT sewa.id,sewa.tanggal_mulai, sewa.tanggal_akhir, sewa.tujuan, sewa.noktp, users.username, mobil.nopol,sewa.users_id,sewa.mobil_id FROM sewa 
                join users ON users.id = sewa.users_id 
                join mobil ON mobil.id = sewa.mobil_id WHERE sewa.id =".$id;
        $query = $this->db->query($sql);
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO sewa (id,tanggal_mulai, tanggal_akhir,tujuan,noktp,users_id,mobil_id) VALUES (default,?,?,?,?,?,?)";
        $this->db->query($sql,$data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM sewa WHERE id=?";
        $this->db->query($sql,[$id]);
    }

    function update($data)
    {
        $sql = "UPDATE sewa SET tanggal_mulai=?,tanggal_akhir=?,tujuan=?,noktp=?,mobil_id=? WHERE id=?";
        $this->db->query($sql,$data);
    }
}