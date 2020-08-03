<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cabang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $cabang = $this->Cabang_model->get_all();

        $data = array('judul'=>'List Cabang',
            'cabang_data' => $cabang
        );

        $this->lib_template->load('template','list_cabang/cabang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);
        if ($row) {
            $data = array('judul'=>'Detail Cabang',
		'id' => $row->id,
		'kode_cabang' => $row->kode_cabang,
		'nama_cabang' => $row->nama_cabang,
		'Territory' => $row->Territory,
	    );
            $this->lib_template->load('template','list_cabang/cabang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function create() 
    {
        $data = array('judul'=>'Input Cabang',
            'button' => 'Create',
            'action' => site_url('cabang/create_action'),
	    'id' => set_value('id'),
	    'kode_cabang' => set_value('kode_cabang'),
	    'nama_cabang' => set_value('nama_cabang'),
	    'Territory' => set_value('Territory'),
	);
        $this->lib_template->load('template','list_cabang/cabang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_cabang' => $this->input->post('kode_cabang',TRUE),
		'nama_cabang' => $this->input->post('nama_cabang',TRUE),
		'Territory' => $this->input->post('Territory',TRUE),
	    );

            $this->Cabang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cabang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $data = array('judul'=>'Edit Cabang',
                'button' => 'Update',
                'action' => site_url('cabang/update_action'),
		'id' => set_value('id', $row->id),
		'kode_cabang' => set_value('kode_cabang', $row->kode_cabang),
		'nama_cabang' => set_value('nama_cabang', $row->nama_cabang),
		'Territory' => set_value('Territory', $row->Territory),
	    );
            $this->lib_template->load('template','list_cabang/cabang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_cabang' => $this->input->post('kode_cabang',TRUE),
		'nama_cabang' => $this->input->post('nama_cabang',TRUE),
		'Territory' => $this->input->post('Territory',TRUE),
	    );

            $this->Cabang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cabang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cabang_model->get_by_id($id);

        if ($row) {
            $this->Cabang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cabang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cabang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_cabang', 'kode cabang', 'trim|required');
	$this->form_validation->set_rules('nama_cabang', 'nama cabang', 'trim|required');
	$this->form_validation->set_rules('Territory', 'territory', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_m_cabang.xls";
        $judul = "tbl_m_cabang";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Cabang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Cabang");
	xlsWriteLabel($tablehead, $kolomhead++, "Territory");

	foreach ($this->Cabang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_cabang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_cabang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Territory);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_m_cabang.doc");

        $data = array(
            'tbl_m_cabang_data' => $this->Cabang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_m_cabang_doc',$data);
    }

}

