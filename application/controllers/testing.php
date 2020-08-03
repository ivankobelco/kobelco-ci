<?php
class testing extends CI_Controller{
    
    
    function index(){
        echo cmb_dinamis('cabang','tbl_m_cabang','nama_cabang','id', 4);
    }
}