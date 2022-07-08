<?php
class Merk extends CI_Controller
{
    function index()
    {   
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('MerkModel','merk');
            $data['merk_data'] = $this->merk->getAll();

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('merk/index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }

    function create()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('merk/create');
            $this->load->view('components/script');
        }
    }

    function edit()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('MerkModel','merk');
            $data['merk_data'] = $this->merk->findById($id);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('merk/edit',$data);
            $this->load->view('components/script');
        }
    }

    function update()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('MerkModel','merk');

            $idedit = $this->input->post('id');
            $nama = $this->input->post('nama');
            $produk = $this->input->post('produk');
    
            $data[] = $nama;
            $data[] = $produk;
            $data[] = $idedit;
    
            $this->merk->update($data);
            $this->session->set_flashdata('sukses','data berhasil diupdate!');
            redirect(base_url()."merk");
        }
    }

    function store()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('MerkModel','merk');

            $nama = $this->input->post('nama');
            $produk = $this->input->post('produk');
    
            $data[] = $nama;
            $data[] = $produk;
    
            $this->merk->store($data);
            $this->session->set_flashdata('sukses','data berhasil ditambah!');
            redirect(base_url()."merk");
        }
    }

    function delete()
    {
        $id = $this->input->get('id');
        $this->load->model('MerkModel','merk');
        $this->merk->delete($id);
        $this->session->set_flashdata('sukses','data berhasil dihapus!');
        redirect(base_url()."merk");
    }
}