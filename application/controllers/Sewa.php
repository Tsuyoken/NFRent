<?php
class Sewa extends CI_Controller 
{
    function index()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        if($isAuth) {
            $this->load->model('SewaModel','sewa');
            $data['sewa_data'] = $this->sewa->getAll();

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('sewa/index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."index.php/auth/login");
        }
    }

    function user_index()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        $id = $this->session->userdata('USER');
        $data = json_decode(json_encode($id),true);
        
        if($isAuth) {
            $this->load->model('SewaModel','sewa');
            $data['sewa_data'] = $this->sewa->getAllByUser($data['id']);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('sewa/user_index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."index.php/auth/login");
        }
    }

    function create()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        if($isAuth) {
            $this->load->model('SewaModel','sewa');
            $data['mobil_data'] = $this->sewa->getMobil();
            $data['user_data'] = $this->sewa->getUser();

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('sewa/create',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."index.php/auth/login");
        }
    }

    function user_edit () 
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('SewaModel','sewa');
            $data['mobil_data'] = $this->sewa->getMobil();
            $data['sewa_data'] = $this->sewa->findById($id);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('sewa/user_edit',$data);
            $this->load->view('components/script');
        }
    }
    function edit () 
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('SewaModel','sewa');
            $data['mobil_data'] = $this->sewa->getMobil();
            $data['sewa_data'] = $this->sewa->findById($id);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('sewa/edit',$data);
            $this->load->view('components/script');
        }
    }

    function update()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        $role = $this->session->userdata('USER');
        $role_data = json_decode(json_encode($role),true);

        if($isAuth) {
            $this->load->model('SewaModel','sewa');

            $idedit = $this->input->post('id');
            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_akhir = $this->input->post('tanggal_akhir');
            $tujuan = $this->input->post('tujuan');
            $noktp = $this->input->post('noktp');
            $mobil_id = $this->input->post('mobil_id');
            // var_dump($idedit);
            $data[] = $tanggal_mulai;
            $data[] = $tanggal_akhir;
            $data[] = $tujuan;
            $data[] = $noktp;
            $data[] = $mobil_id;
            $data[] = $idedit;
    
            $this->sewa->update($data);
            $this->session->set_flashdata('sukses','data berhasil diupdate!');
            if($role_data['role'] == "administrator"){
                redirect(base_url()."index.php/sewa");
            } else {
                redirect(base_url()."index.php/sewa/user_index");
            }
        }
    }

    function store()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        $role = $this->session->userdata('USER');
        $role_data = json_decode(json_encode($role),true);
        
        if($isAuth) {
            $this->load->model('SewaModel','sewa');

            $tanggal_mulai = $this->input->post('tanggal_mulai');
            $tanggal_akhir = $this->input->post('tanggal_akhir');
            $tujuan = $this->input->post('tujuan');
            $noktp = $this->input->post('noktp');
            $mobil_id = $this->input->post('mobil_id');
            $user_id = $this->input->post('user_id');
            
            $data[] = $tanggal_mulai;
            $data[] = $tanggal_akhir;
            $data[] = $tujuan;
            $data[] = $noktp;
            $data[] = $role_data['id'];
            $data[] = $mobil_id;
    
            $this->sewa->store($data);
            $this->session->set_flashdata('sukses','data berhasil ditambah!');
            if($role_data['role'] == "administrator"){
                redirect(base_url()."index.php/sewa");
            } else {
                redirect(base_url()."index.php/sewa/user_index");
            }
        }
    }

    function delete()
    {
        $id = $this->input->get('id');
        $this->load->model('SewaModel','sewa');
        $this->sewa->delete($id);
        $this->session->set_flashdata('sukses','data berhasil dihapus!');
        redirect(base_url()."index.php/sewa");
    }

    function user_delete()
    {
        $id = $this->input->get('id');
        $this->load->model('SewaModel','sewa');
        $this->sewa->delete($id);
        $this->session->set_flashdata('sukses','data berhasil dihapus!');
        redirect(base_url()."index.php/sewa/user_index");
    }
}