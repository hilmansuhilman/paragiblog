<?php

class Remap extends CI_Controller{
    
    function index(){
        
        echo 'Saya dari segement 2';
        
    }
    
    function testtext(){
        
    }
    
    function bantuan(){
        $this->load->helper('text');
        $data = 'Ini Adalah Contoh MENGAPA?';
        $hapus = preg_replace('/[^\da-z ]/i', '', $data);
        $replace = str_replace(" ", "-", $hapus);
        $kecil = strtolower($replace);        
        echo $kecil;
    }
    public function _remap(){
        
        $data = $this->uri->segment(2);
        
        if (empty($data))
        {
                $this->index();
        }
        else
        {
                $this->bantuan();
        }
    }
    
}