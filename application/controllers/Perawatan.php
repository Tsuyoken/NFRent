<?php
class Perawatan extends CI_Controller
{
    function index()
    {
        $this->load->model('PerawatanModel','perawatan');
        $data['perawatan_data'] = $this->perawatan->join_jenis_perawatan();
        $isAuth = $this->session->has_userdata('USERNAME');
        if($isAuth) {
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('perawatan/index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }

    function create()
    {
        $this->load->model('PerawatanModel','get_data');
        $data['mobil_data'] = $this->get_data->getMobil();
        $data['jenis_perawatan_data'] = $this->get_data->getJenisPerawatan();
        $isAuth = $this->session->has_userdata('USERNAME');
        if($isAuth) {
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('perawatan/create',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }
    
    function store()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('PerawatanModel','perawatan');
            
            $tanggal = $this->input->post('tanggal');
            $biaya = $this->input->post('biaya');
            $deskripsi = $this->input->post('deskripsi');
            $mobil_id = $this->input->post('mobil_id');
            $jenis_perawatan_id = $this->input->post('jenis_perawatan_id');
    
            $data[] = $tanggal;
            $data[] = $biaya;
            $data[] = $deskripsi;
            $data[] = $mobil_id;
            $data[] = $jenis_perawatan_id;
    
            $this->perawatan->store($data);
            $this->session->set_flashdata('sukses','data berhasil ditambah!');
            redirect(base_url()."jenis_perawatan");
        }
    }

    function edit () {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('PerawatanModel','perawatan');
            $data['mobil_data'] = $this->perawatan->getMobil();
            $data['jenis_perawatan_data'] = $this->perawatan->getJenisPerawatan();
            $data['perawatan_data'] = $this->perawatan->findById($id);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('perawatan/edit',$data);
            $this->load->view('components/script');
        }
    }

    function update()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('PerawatanModel','perawatan');

            $idedit = $this->input->post('id');
            $tanggal = $this->input->post('tanggal');
            $biaya = $this->input->post('biaya');
            $deskripsi = $this->input->post('deskripsi');
            $mobil_id = $this->input->post('mobil_id');
            $jenis_perawatan_id = $this->input->post('jenis_perawatan_id');
    
            $data[] = $tanggal;
            $data[] = $biaya;
            $data[] = $deskripsi;
            $data[] = $mobil_id;
            $data[] = $jenis_perawatan_id;
            $data[] = $idedit;
    
            $this->perawatan->update($data);
            $this->session->set_flashdata('sukses','data berhasil diupdate!');
            redirect(base_url()."perawatan");
        }
    }

    function delete()
    {
        $id = $this->input->get('id');
        $this->load->model('PerawatanModel','perawatan');
        $this->perawatan->delete($id);
        $this->session->set_flashdata('sukses','data berhasil dihapus!');
        redirect(base_url()."perawatan");
    }
}