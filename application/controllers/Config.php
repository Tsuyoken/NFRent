<?php
class Config extends CI_Controller 
{
    function index()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        $user = $this->session->userdata('USER');
        $id_data = json_decode(json_encode($user),true);

        if($isAuth) {
            $this->load->model('AkunModel','akun');
            $data['akun_data'] = $this->akun->findById($id_data['id']);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('config/index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }
    
    function update()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        $user = $this->session->userdata('USER');
        $user_data = json_decode(json_encode($user),true);


        if($isAuth) {
            $this->load->model('AkunModel','akun');

            $idedit = $this->input->post('id');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            
            $data[] = $username;
            $data[] = ($password != NULL) ? $password : $user_data['password'];
            $data[] = $email;
            // $data[] = $role;
            $data[] = $user_data['id'];
    
            $this->akun->updateFromConfig($data);
            $this->session->set_flashdata('sukses','data berhasil diupdate!, data akan berefek pada login berikutnya');
            redirect(base_url()."config");
        }
    }
}