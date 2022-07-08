<?php
class Mobil extends CI_Controller {
    function index()
    {
        $this->load->model('MobilModel','mobil');
        $data['mobil_data'] = $this->mobil->getAll();
        $isAuth = $this->session->has_userdata('USERNAME');
        if($isAuth) {
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('mobil/index',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }
    
    function detail()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('MobilModel','mobil');
            // $data['merk_data'] = $this->mobil->getMerk();
            $data['mobil_data'] = $this->mobil->findById($id);
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('mobil/detail',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }

    function create()
    {
        $this->load->model('MobilModel','mobil');
        // $data['mobil_data'] = $this->mobil->getMobil();
        $data['merk_data'] = $this->mobil->getMerk();
        $isAuth = $this->session->has_userdata('USERNAME');
        if($isAuth) {
            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('mobil/create',$data);
            $this->load->view('components/script');
        } else {
            redirect(base_url()."auth/login");
        }
    }
    
    function store()
    {
        $isAuth = $this->session->has_userdata('USERNAME');
        // $filename = substr($this->input->post('foto'),0,3);//str_replace('.png','',$this->input->post('foto'));
        // var_dump($filename);
        
        if($isAuth) {
            $this->load->model('MobilModel','mobil'); 

            $allowedExtension = ['png','jpg','jpeg'];
            $filename = $_FILES['foto']['name'];
            $explodedFilename = explode('.',$filename);
            $extension = strtolower(end($explodedFilename));
            $temporaryFile = $_FILES['foto']['tmp_name'];
            
            if(in_array($extension,$allowedExtension)== true) {
                move_uploaded_file($temporaryFile,'image/'.$filename);
            }

            $nopol = $this->input->post('nopol');
            $warna = $this->input->post('warna');
            $biaya_sewa = $this->input->post('biaya_sewa');
            $deskripsi = $this->input->post('deskripsi');
            $foto = $filename;//$this->input->post('foto');
            $cc = $this->input->post('cc');
            $tahun = $this->input->post('tahun');
            $merk_id = $this->input->post('merk_id');

            
            $data[] = $nopol;
            $data[] = $warna;
            $data[] = $biaya_sewa;
            $data[] = $deskripsi;
            $data[] = $foto;
            $data[] = $cc;
            $data[] = $tahun;
            $data[] = $merk_id;
            
            $this->mobil->store($data);
            $this->session->set_flashdata('sukses','data berhasil ditambah!');
            redirect(base_url()."mobil");
        }
    }

    function edit () {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $id = $this->input->get('id');
            $this->load->model('MobilModel','mobil');
            $data['merk_data'] = $this->mobil->getMerk();
            $data['mobil_data'] = $this->mobil->findById($id);

            $this->load->view('components/header');
            $this->load->view('components/navbar');
            $this->load->view('components/sidebar');
            $this->load->view('mobil/edit',$data);
            $this->load->view('components/script');
        }
    }

    function update()
    {
        $isAuth = $this->session->has_userdata('USERNAME');

        if($isAuth) {
            $this->load->model('MobilModel','mobil');

            if(isset($_FILES['foto'])) {
                $allowedExtension = ['png','jpg','jpeg'];
                $filename = $_FILES['foto']['name'];
                $explodedFilename = explode('.',$filename);
                $extension = strtolower(end($explodedFilename));
                $temporaryFile = $_FILES['foto']['tmp_name'];
                
                if(in_array($extension,$allowedExtension)== true) {
                    move_uploaded_file($temporaryFile,'image/'.$filename);
                }
            }
            

            $idedit = $this->input->post('id');
            $nopol = $this->input->post('nopol');
            $warna = $this->input->post('warna');
            $biaya_sewa = $this->input->post('biaya_sewa');
            $deskripsi = $this->input->post('deskripsi');
            $foto = $filename;
            $cc = $this->input->post('cc');
            $tahun = $this->input->post('tahun');
            $merk_id = $this->input->post('merk_id');
    
            $data[] = $nopol;
            $data[] = $warna;
            $data[] = $biaya_sewa;
            $data[] = $deskripsi;
            $data[] = (isset($_FILES['foto'])) ? $foto : $this->input->post('hiddenfoto');
            $data[] = $cc;
            $data[] = $tahun;
            $data[] = $merk_id;
            $data[] = $idedit;
            
            $this->mobil->update($data);
            $this->session->set_flashdata('sukses','data berhasil diupdate!');
            redirect(base_url()."mobil");
        }
    }

    function delete()
    {
        $id = $this->input->get('id');
        $this->load->model('MobilModel','mobil');
        $data['img_data'] = $this->mobil->findById($id);
        
        //delete foto
        unlink('image/'.$data['img_data']->foto);

        $this->mobil->delete($id);
        $this->session->set_flashdata('sukses','data berhasil dihapus!');
        redirect(base_url()."mobil");
    }
}