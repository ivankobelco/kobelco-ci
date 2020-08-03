<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    
        
    // function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('Users_model');
    //     $this->load->library('form_validation');
    // }

    public function index()
    {
 

        $data = array(
            'judul' => 'Dashboard',
            
        );
        $this->lib_template->load('template','dashboard', $data);
    }

   

}

