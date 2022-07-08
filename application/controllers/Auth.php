<?php

class Auth extends CI_Controller 
{
    function login()
    {
        if($this->session->has_userdata('USERNAME')) {
            redirect(base_url()."dashboard");
        }
        $this->load->view('auth/login');
    }

    function prosesLogin()
    {
        $this->load->model('AuthModel','login');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $row =$this->login->authentication($username,$password);
        if(isset($row)){
            $this->session->set_userdata('USERNAME',$row->username);
            $this->session->set_userdata('ROLE',$row->role);
            $this->session->set_userdata('USER',$row);
            redirect(base_url()."dashboard");
        }
        $this->session->set_flashdata('gagal','Login Gagal, silahkan coba lagi');
        redirect(base_url()."auth/login?status=f");
    }

    function register()
    {
        if($this->session->has_userdata('USERNAME')) {
            redirect(base_url()."dashboard");
        }
        $this->load->view('auth/register');
    }

    function prosesRegister()
    {
        $this->load->model('AuthModel','register');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $role = $this->input->post('role'); 

        $data[] = $username;
        $data[] = $password;
        $data[] = $email;
        $data[] = date('Y-m-d H:i:s');
        $data[] = NULL;
        $data[] = 1;
        $data[] = $role;

        $this->register->store($data);
        $this->session->set_flashdata('sukses','Registrasi berhasil, silahkan login!');
        redirect(base_url()."auth/register");
    }

    function logout()
    {
        $this->session->set_userdata('USERNAME');
        $this->session->set_userdata('ROLE');
        $this->session->set_userdata('USER');
        redirect(base_url()."auth/login");
    }
}