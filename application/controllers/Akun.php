<?php
class Akun extends CI_Controller{
    function index () {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('AkunModel','akun');
            $data['akun_data'] = $this->akun->getAll();

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('akun/index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }

    function delete () {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('AkunModel','akun');
            $this->akun->delete($id);
            $this->session->set_flashdata('sukses','data berhasil dihapus!');
            redirect(base_url()."akun");
        }
    }

    function edit () {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('AkunModel','akun');
            $data['akun_data'] = $this->akun->findById($id);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('akun/edit',$data);
            $this->load->view('components/script');
        }
    }

    function update()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('AkunModel','akun');

            $idedit = $this->input->post('id');
            // $username = $this->input->post('username');
            // $password = $this->input->post('password');
            // $email = $this->input->post('email');
            $role = $this->input->post('role');
    
            // $data[] = $username;
            // $data[] = $password;
            // $data[] = $email;
            $data[] = $role;
            $data[] = $idedit;
    
            $this->akun->update($data);
            $this->session->set_flashdata('sukses','data berhasil diupdate!');
            redirect(base_url()."akun");
        }
    }
}