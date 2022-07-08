<?php
class MobilModel extends CI_Model
{
    function getAll()
    { 
        $sql = "SELECT mobil.id,mobil.nopol,mobil.warna,mobil.biaya_sewa,mobil.deskripsi,mobil.foto,mobil.cc,mobil.tahun,merk.nama as nama FROM mobil join merk ON merk.id = mobil.merk_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getMerk()
    {
        $query = $this->db->get('merk');
        return $query->result();
    }

    function findById($id)
    {
        $sql = "SELECT mobil.id,mobil.nopol,mobil.warna,mobil.biaya_sewa,mobil.deskripsi,mobil.foto,mobil.cc,mobil.tahun,merk.nama as nama FROM mobil join merk ON merk.id = mobil.merk_id WHERE mobil.id =".$id;
        $query = $this->db->query($sql);
        return $query->row();
    }

    function store($data)
    {
        $sql = "INSERT INTO mobil (id,nopol,warna,biaya_sewa,deskripsi,foto,cc,tahun,merk_id) VALUES (default,?,?,?,?,?,?,?,?)";
        $this->db->query($sql,$data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM mobil WHERE id=?";
        $this->db->query($sql,[$id]);
    }

    function update($data)
    {
        $sql = "UPDATE mobil SET nopol=?,warna=?,biaya_sewa=?,deskripsi=?,foto=?,cc=?,tahun=?,merk_id=? WHERE id=?";
        $this->db->query($sql,$data);
    }
}