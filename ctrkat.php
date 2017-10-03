<?php

class Ctrkat extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_kategori');
    }
    
    function index(){
        
        if($_GET['tes']){
            echo 'Saya dari get test';
        } else {
            echo 'Pas saya kosong';
        }
        
        /*
        if($this->input->server('') == NULL){
            
            $data = array();
            $data['ambil'] = $this->m_kategori->tampilkat();
            $this->load->view('back/viewkat', $data);
            
        } else {
            
            echo 'saya detil';
            
        }
         * 
         */
        
        
    }
    
    function tambah(){
        
        $data = array();
        $data['nmkat'] = array('name' => 'nmkat');
        $data['slugkat'] = array('name' => 'slugkat');
        $data['deskat'] = array('name' => 'deskat');
        
        $this->load->view('back/viewkat', $data);
        
    }
    
    function masuk(){
        
        $data = $this->input->post(array('nmkat', 'slugkat', 'deskat'));
        $this->m_kategori->isikat($data);
        if ($this->db->trans_status() === FALSE){
            echo 'Data tidak masuk';
        }else{
            echo 'Data berhasil masuk';
        }
        
    }
    
    function edit(){
        
        $id = $this->uri->segment(4);
        $data = array();
        $data['ambil'] = $this->m_kategori->editkat();
        $data['idkat'] = array('idkat' => $id);
        $data['nmkat'] = array('name' => 'nmkat');
        $data['slugkat'] = array('name' => 'slugkat');
        $data['deskat'] = array('name' => 'deskat');
        
        $this->load->view('back/viewkat', $data);
        
    }
    
    function update(){
        $data = $this->input->post(array('idkat', 'nmkat', 'slugkat', 'deskat'));        
        $this->m_kategori->isiedit($data);
        if($this->db->trans_status() === FALSE){
            redirect('admin/ctrkat/edit/'.$this->uri->segment(4), 'refresh');
        }else{
            redirect('admin/ctrkat', 'refresh');
        }
    }
    
    function hapus($id){
        
        $id = $this->uri->segment(4);
        $this->m_kategori->hapuskat($id);
        if($this->db->trans_status() === FALSE){
            redirect('admin/ctrkat', 'refresh');
        }else{            
            redirect('admin/ctrkat', 'refresh');
        }
       
    }
    function detil(){
        $id = $this->uri->segment(4);
        $data = array();
        $data['ambil'] = $this->m_kategori->editkat();
        $data['idkat'] = array('idkat' => $id);
               
        $this->load->view('back/viewkat', $data);
    }
}