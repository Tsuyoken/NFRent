<?php
class Dashboard extends CI_Controller
{
    function index()
    {   if($this->session->has_userdata('USERNAME')) {
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('index');
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }
}