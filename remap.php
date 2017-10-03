<?php

class Remap extends CI_Controller{
    
    function index(){
        
        echo 'Saya dari segement 2';
        
    }

    function bantuan(){
        
        $data = 'Ini Adalah Contoh MENGAPA?';
        $hapus = preg_replace('/[^\da-z ]/i', '', $data); // Ieu paraqgi ng hapus spesial karakter terkecuali spasi
        $replace = str_replace(" ", "-", $hapus); // Ieu paragi ngaganti spasi jadi strip
        $kecil = strtolower($replace); // Ieu mah paragi ng leutikan huruf
        echo $kecil;
    }
    public function _remap(){ // Fungsi ieu penting pisan kudu di pake unggal nyieunweb
        
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
