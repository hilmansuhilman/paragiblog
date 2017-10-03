<?php

class M_kategori extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function tampilkat(){
        
        return $this->db->get('kategori');
        
    }
    
    function isikat($sup){
        
        $data = $sup;
        $this->db->insert('kategori', $data);
        
    }
    
    function editkat(){
        $id = $this->uri->segment(4);
        return $this->db->where('idkat', $id)->get('kategori');
    }
    
    function isiedit($data){
        $id = $data['idkat'];

        $this->db->where('idkat', $id);
        $this->db->update('kategori', $data);
    }
            
    function hapuskat($id){  
        
        $this->db->where('idkat', $id);
        $this->db->delete('kategori');
        /*
        $id = $this->uri->segment(3);
        $query = $this->db->delete('kategori', array('idkat' => $id));
        return $query;
         * 
         */
        
    }
    
    function detil(){
        $id = $this->uri->segment(4);
        return $this->db->where('idkat', $id)->get('kategori');
    }
}