<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PartsClearance extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('PartsClearance_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'partsclearance/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'partsclearance/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'partsclearance/index.html';
            $config['first_url'] = base_url() . 'partsclearance/index.html';
        }

        $config['per_page'] = 0;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->PartsClearance_model->total_rows($q);
        $partsclearance = $this->PartsClearance_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array('judul'=>'List Parts Clearance',
            'partsclearance_data' => $partsclearance,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->lib_template->load('template','list_parts/partsclearance_list', $data);
    }

    public function read($id) 
    {
        $row = $this->PartsClearance_model->get_by_id($id);
        if ($row) {
            $data = array('judul'=>'Detail Parts Clearance',
				'id' => $row->id,
				'CLASS_TON' => $row->CLASS_TON,
				'MODEL' => $row->MODEL,
				'New_Model' => $row->New_Model,
				'CATEGORY' => $row->CATEGORY,
				'PARTS_NO' => $row->PARTS_NO,
				'INTERCHANGE' => $row->INTERCHANGE,
				'PARTS_NAME' => $row->PARTS_NAME,
				'Clasification' => $row->Clasification,
				'Check_Update_Model' => $row->Check_Update_Model,
				'PIC' => $row->PIC,
				'Reason' => $row->Reason,
				'Model1' => $row->Model1,
				'Page_name1' => $row->Page_name1,
				'Model2' => $row->Model2,
				'Page_name2' => $row->Page_name2,
				'Model3' => $row->Model3,
				'Page_name3' => $row->Page_name3,
				'Model4' => $row->Model4,
				'Page_name4' => $row->Page_name4,
				'Model5' => $row->Model5,
				'Page_name5' => $row->Page_name5,
				'Model6' => $row->Model6,
				'Page_name6' => $row->Page_name6,
				'Model7' => $row->Model7,
				'Page_name7' => $row->Page_name7,
				'Model8' => $row->Model8,
				'Page_name8' => $row->Page_name8,
				'Model9' => $row->Model9,
				'QTY_STOCK' => $row->QTY_STOCK,
				'FOTO_1' => $row->FOTO_1,
				'FOTO_2' => $row->FOTO_2,
				'FOTO_3' => $row->FOTO_3,
				'FOTO_4' => $row->FOTO_4,
				'REMARK' => $row->REMARK,
				'LOCATION' => $row->LOCATION,
				'Normal_Price' => $row->Normal_Price,
				'Special_Price' => $row->Special_Price);
            $this->lib_template->load('template','list_parts/partsclearance_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partsclearance'));
        }
    }

    public function create() 
    {
        $data = array('judul'=>'Input Parts Clearance',
          	'button' => 'Create',
			'action' => site_url('partsclearance/create_action'),
			'id' => set_value('id'),
			'CLASS_TON' => set_value('CLASS_TON'),
			'MODEL' => set_value('MODEL'),
			'New_Model' => set_value('New_Model'),
			'CATEGORY' => set_value('CATEGORY'),
			'PARTS_NO' => set_value('PARTS_NO'),
			'INTERCHANGE' => set_value('INTERCHANGE'),
			'PARTS_NAME' => set_value('PARTS_NAME'),
			'Clasification' => set_value('Clasification'),
			'Check_Update_Model' => set_value('Check_Update_Model'),
			'PIC' => set_value('PIC'),
			'Reason' => set_value('Reason'),
			'Model1' => set_value('Model1'),
			'Page_name1' => set_value('Page_name1'),
			'Model2' => set_value('Model2'),
			'Page_name2' => set_value('Page_name2'),
			'Model3' => set_value('Model3'),
			'Page_name3' => set_value('Page_name3'),
			'Model4' => set_value('Model4'),
			'Page_name4' => set_value('Page_name4'),
			'Model5' => set_value('Model5'),
			'Page_name5' => set_value('Page_name5'),
			'Model6' => set_value('Model6'),
			'Page_name6' => set_value('Page_name6'),
			'Model7' => set_value('Model7'),
			'Page_name7' => set_value('Page_name7'),
			'Model8' => set_value('Model8'),
			'Page_name8' => set_value('Page_name8'),
			'Model9' => set_value('Model9'),
			'QTY_STOCK' => set_value('QTY_STOCK'),
			'FOTO_1' => set_value('FOTO_1'),
			'FOTO_2' => set_value('FOTO_2'),
			'FOTO_3' => set_value('FOTO_3'),
			'FOTO_4' => set_value('FOTO_4'),
			'REMARK' => set_value('REMARK'),
			'LOCATION' => set_value('LOCATION'),
			'Normal_Price' => set_value('Normal_Price'),
			'Special_Price' => set_value('Special_Price'));
        $this->lib_template->load('template','list_parts/partsclearance_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'CLASS_TON' => $this->input->post('CLASS_TON',TRUE),
				'MODEL' => $this->input->post('MODEL',TRUE),
				'New_Model' => $this->input->post('New_Model',TRUE),
				'CATEGORY' => $this->input->post('CATEGORY',TRUE),
				'PARTS_NO' => $this->input->post('PARTS_NO',TRUE),
				'INTERCHANGE' => $this->input->post('INTERCHANGE',TRUE),
				'PARTS_NAME' => $this->input->post('PARTS_NAME',TRUE),
				'Clasification' => $this->input->post('Clasification',TRUE),
				'Check_Update_Model' => $this->input->post('Check_Update_Model',TRUE),
				'PIC' => $this->input->post('PIC',TRUE),
				'Reason' => $this->input->post('Reason',TRUE),
				'Model1' => $this->input->post('Model1',TRUE),
				'Page_name1' => $this->input->post('Page_name1',TRUE),
				'Model2' => $this->input->post('Model2',TRUE),
				'Page_name2' => $this->input->post('Page_name2',TRUE),
				'Model3' => $this->input->post('Model3',TRUE),
				'Page_name3' => $this->input->post('Page_name3',TRUE),
				'Model4' => $this->input->post('Model4',TRUE),
				'Page_name4' => $this->input->post('Page_name4',TRUE),
				'Model5' => $this->input->post('Model5',TRUE),
				'Page_name5' => $this->input->post('Page_name5',TRUE),
				'Model6' => $this->input->post('Model6',TRUE),
				'Page_name6' => $this->input->post('Page_name6',TRUE),
				'Model7' => $this->input->post('Model7',TRUE),
				'Page_name7' => $this->input->post('Page_name7',TRUE),
				'Model8' => $this->input->post('Model8',TRUE),
				'Page_name8' => $this->input->post('Page_name8',TRUE),
				'Model9' => $this->input->post('Model9',TRUE),
				'QTY_STOCK' => $this->input->post('QTY_STOCK',TRUE),
				'FOTO_1' => $this->input->post('FOTO_1',TRUE),
				'FOTO_2' => $this->input->post('FOTO_2',TRUE),
				'FOTO_3' => $this->input->post('FOTO_3',TRUE),
				'FOTO_4' => $this->input->post('FOTO_4',TRUE),
				'REMARK' => $this->input->post('REMARK',TRUE),
				'LOCATION' => $this->input->post('LOCATION',TRUE),
				'Normal_Price' => $this->input->post('Normal_Price',TRUE),
				'Special_Price' => $this->input->post('Special_Price',TRUE),
	    );

            $this->PartsClearance_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('partsclearance'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PartsClearance_model->get_by_id($id);

        if ($row) {
            $data = array('judul'=>'Edit Part Clearence',
                'button' => 'Update',
                'action' => site_url('partsclearance/update_action'),
				'id' => set_value('id', $row->id),
				'CLASS_TON' => set_value('CLASS_TON', $row->CLASS_TON),
				'MODEL' => set_value('MODEL', $row->MODEL),
				'New_Model' => set_value('New_Model', $row->New_Model),
				'CATEGORY' => set_value('CATEGORY', $row->CATEGORY),
				'PARTS_NO' => set_value('PARTS_NO', $row->PARTS_NO),
				'INTERCHANGE' => set_value('INTERCHANGE', $row->INTERCHANGE),
				'PARTS_NAME' => set_value('PARTS_NAME', $row->PARTS_NAME),
				'Clasification' => set_value('Clasification', $row->Clasification),
				'Check_Update_Model' => set_value('Check_Update_Model', $row->Check_Update_Model),
				'PIC' => set_value('PIC', $row->PIC),
				'Reason' => set_value('Reason', $row->Reason),
				'Model1' => set_value('Model1', $row->Model1),
				'Page_name1' => set_value('Page_name1', $row->Page_name1),
				'Model2' => set_value('Model2', $row->Model2),
				'Page_name2' => set_value('Page_name2', $row->Page_name2),
				'Model3' => set_value('Model3', $row->Model3),
				'Page_name3' => set_value('Page_name3', $row->Page_name3),
				'Model4' => set_value('Model4', $row->Model4),
				'Page_name4' => set_value('Page_name4', $row->Page_name4),
				'Model5' => set_value('Model5', $row->Model5),
				'Page_name5' => set_value('Page_name5', $row->Page_name5),
				'Model6' => set_value('Model6', $row->Model6),
				'Page_name6' => set_value('Page_name6', $row->Page_name6),
				'Model7' => set_value('Model7', $row->Model7),
				'Page_name7' => set_value('Page_name7', $row->Page_name7),
				'Model8' => set_value('Model8', $row->Model8),
				'Page_name8' => set_value('Page_name8', $row->Page_name8),
				'Model9' => set_value('Model9', $row->Model9),
				'QTY_STOCK' => set_value('QTY_STOCK', $row->QTY_STOCK),
				'FOTO_1' => set_value('FOTO_1', $row->FOTO_1),
				'FOTO_2' => set_value('FOTO_2', $row->FOTO_2),
				'FOTO_3' => set_value('FOTO_3', $row->FOTO_3),
				'FOTO_4' => set_value('FOTO_4', $row->FOTO_4),
				'REMARK' => set_value('REMARK', $row->REMARK),
				'LOCATION' => set_value('LOCATION', $row->LOCATION),
				'Normal_Price' => set_value('Normal_Price', $row->Normal_Price),
				'Special_Price' => set_value('Special_Price', $row->Special_Price));

            $this->lib_template->load('template','list_parts/partsclearance_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partsclearance'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'CLASS_TON' => $this->input->post('CLASS_TON',TRUE),
				'MODEL' => $this->input->post('MODEL',TRUE),
				'New_Model' => $this->input->post('New_Model',TRUE),
				'CATEGORY' => $this->input->post('CATEGORY',TRUE),
				'PARTS_NO' => $this->input->post('PARTS_NO',TRUE),
				'INTERCHANGE' => $this->input->post('INTERCHANGE',TRUE),
				'PARTS_NAME' => $this->input->post('PARTS_NAME',TRUE),
				'Clasification' => $this->input->post('Clasification',TRUE),
				'Check_Update_Model' => $this->input->post('Check_Update_Model',TRUE),
				'PIC' => $this->input->post('PIC',TRUE),
				'Reason' => $this->input->post('Reason',TRUE),
				'Model1' => $this->input->post('Model1',TRUE),
				'Page_name1' => $this->input->post('Page_name1',TRUE),
				'Model2' => $this->input->post('Model2',TRUE),
				'Page_name2' => $this->input->post('Page_name2',TRUE),
				'Model3' => $this->input->post('Model3',TRUE),
				'Page_name3' => $this->input->post('Page_name3',TRUE),
				'Model4' => $this->input->post('Model4',TRUE),
				'Page_name4' => $this->input->post('Page_name4',TRUE),
				'Model5' => $this->input->post('Model5',TRUE),
				'Page_name5' => $this->input->post('Page_name5',TRUE),
				'Model6' => $this->input->post('Model6',TRUE),
				'Page_name6' => $this->input->post('Page_name6',TRUE),
				'Model7' => $this->input->post('Model7',TRUE),
				'Page_name7' => $this->input->post('Page_name7',TRUE),
				'Model8' => $this->input->post('Model8',TRUE),
				'Page_name8' => $this->input->post('Page_name8',TRUE),
				'Model9' => $this->input->post('Model9',TRUE),
				'QTY_STOCK' => $this->input->post('QTY_STOCK',TRUE),
				'FOTO_1' => $this->input->post('FOTO_1',TRUE),
				'FOTO_2' => $this->input->post('FOTO_2',TRUE),
				'FOTO_3' => $this->input->post('FOTO_3',TRUE),
				'FOTO_4' => $this->input->post('FOTO_4',TRUE),
				'REMARK' => $this->input->post('REMARK',TRUE),
				'LOCATION' => $this->input->post('LOCATION',TRUE),
				'Normal_Price' => $this->input->post('Normal_Price',TRUE),
				'Special_Price' => $this->input->post('Special_Price',TRUE));

            $this->PartsClearance_model->update($this->input->post('No', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('partsclearance'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PartsClearance_model->get_by_id($id);

        if ($row) {
            $this->PartsClearance_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('partsclearance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('partsclearance'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('CLASS_TON', 'class ton', 'trim|required');
	$this->form_validation->set_rules('MODEL', 'model', 'trim|required');
	$this->form_validation->set_rules('New_Model', 'new model', 'trim|required');
	$this->form_validation->set_rules('CATEGORY', 'category', 'trim|required');
	$this->form_validation->set_rules('PARTS_NO', 'parts no', 'trim|required');
	$this->form_validation->set_rules('INTERCHANGE', 'interchange', 'trim|required');
	$this->form_validation->set_rules('PARTS_NAME', 'parts name', 'trim|required');
	$this->form_validation->set_rules('Clasification', 'clasification', 'trim|required');
	$this->form_validation->set_rules('Check_Update_Model', 'check update model', 'trim|required');
	$this->form_validation->set_rules('PIC', 'pic', 'trim|required');
	$this->form_validation->set_rules('Reason', 'reason', 'trim|required');
	$this->form_validation->set_rules('Model1', 'model1', 'trim|required');
	$this->form_validation->set_rules('Page_name1', 'page name1', 'trim|required');
	$this->form_validation->set_rules('Model2', 'model2', 'trim|required');
	$this->form_validation->set_rules('Page_name2', 'page name2', 'trim|required');
	$this->form_validation->set_rules('Model3', 'model3', 'trim|required');
	$this->form_validation->set_rules('Page_name3', 'page name3', 'trim|required');
	$this->form_validation->set_rules('Model4', 'model4', 'trim|required');
	$this->form_validation->set_rules('Page_name4', 'page name4', 'trim|required');
	$this->form_validation->set_rules('Model5', 'model5', 'trim|required');
	$this->form_validation->set_rules('Page_name5', 'page name5', 'trim|required');
	$this->form_validation->set_rules('Model6', 'model6', 'trim|required');
	$this->form_validation->set_rules('Page_name6', 'page name6', 'trim|required');
	$this->form_validation->set_rules('Model7', 'model7', 'trim|required');
	$this->form_validation->set_rules('Page_name7', 'page name7', 'trim|required');
	$this->form_validation->set_rules('Model8', 'model8', 'trim|required');
	$this->form_validation->set_rules('Page_name8', 'page name8', 'trim|required');
	$this->form_validation->set_rules('Model9', 'model9', 'trim|required');
	$this->form_validation->set_rules('QTY_STOCK', 'qty stock', 'trim|required');
	$this->form_validation->set_rules('FOTO_1', 'foto 1', 'trim|required');
	$this->form_validation->set_rules('FOTO_2', 'foto 2', 'trim|required');
	$this->form_validation->set_rules('FOTO_3', 'foto 3', 'trim|required');
	$this->form_validation->set_rules('FOTO_4', 'foto 4', 'trim|required');
	$this->form_validation->set_rules('REMARK', 'remark', 'trim|required');
	$this->form_validation->set_rules('LOCATION', 'location', 'trim|required');
	$this->form_validation->set_rules('Normal_Price', 'normal price', 'trim|required');
	$this->form_validation->set_rules('Special_Price', 'special price', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "table 82.xls";
        $judul = "table 82";
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
	xlsWriteLabel($tablehead, $kolomhead++, "CLASS TON");
	xlsWriteLabel($tablehead, $kolomhead++, "MODEL");
	xlsWriteLabel($tablehead, $kolomhead++, "New Model");
	xlsWriteLabel($tablehead, $kolomhead++, "CATEGORY");
	xlsWriteLabel($tablehead, $kolomhead++, "PARTS NO");
	xlsWriteLabel($tablehead, $kolomhead++, "INTERCHANGE");
	xlsWriteLabel($tablehead, $kolomhead++, "PARTS NAME");
	xlsWriteLabel($tablehead, $kolomhead++, "Clasification");
	xlsWriteLabel($tablehead, $kolomhead++, "Check Update Model");
	xlsWriteLabel($tablehead, $kolomhead++, "PIC");
	xlsWriteLabel($tablehead, $kolomhead++, "Reason");
	xlsWriteLabel($tablehead, $kolomhead++, "Model1");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name1");
	xlsWriteLabel($tablehead, $kolomhead++, "Model2");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name2");
	xlsWriteLabel($tablehead, $kolomhead++, "Model3");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name3");
	xlsWriteLabel($tablehead, $kolomhead++, "Model4");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name4");
	xlsWriteLabel($tablehead, $kolomhead++, "Model5");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name5");
	xlsWriteLabel($tablehead, $kolomhead++, "Model6");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name6");
	xlsWriteLabel($tablehead, $kolomhead++, "Model7");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name7");
	xlsWriteLabel($tablehead, $kolomhead++, "Model8");
	xlsWriteLabel($tablehead, $kolomhead++, "Page Name8");
	xlsWriteLabel($tablehead, $kolomhead++, "Model9");
	xlsWriteLabel($tablehead, $kolomhead++, "QTY STOCK");
	xlsWriteLabel($tablehead, $kolomhead++, "FOTO 1");
	xlsWriteLabel($tablehead, $kolomhead++, "FOTO 2");
	xlsWriteLabel($tablehead, $kolomhead++, "FOTO 3");
	xlsWriteLabel($tablehead, $kolomhead++, "FOTO 4");
	xlsWriteLabel($tablehead, $kolomhead++, "REMARK");
	xlsWriteLabel($tablehead, $kolomhead++, "LOCATION");
	xlsWriteLabel($tablehead, $kolomhead++, "Normal Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Special Price");

	foreach ($this->PartsClearance_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CLASS_TON);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MODEL);
	    xlsWriteLabel($tablebody, $kolombody++, $data->New_Model);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CATEGORY);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PARTS_NO);
	    xlsWriteLabel($tablebody, $kolombody++, $data->INTERCHANGE);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PARTS_NAME);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Clasification);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Check_Update_Model);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PIC);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Reason);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name5);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model6);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name6);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model7);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name7);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model8);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Page_name8);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Model9);
	    xlsWriteNumber($tablebody, $kolombody++, $data->QTY_STOCK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FOTO_1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FOTO_2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FOTO_3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->FOTO_4);
	    xlsWriteLabel($tablebody, $kolombody++, $data->REMARK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->LOCATION);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Normal_Price);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Special_Price);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=table 82.doc");

        $data = array(
            'table 82_data' => $this->PartsClearance_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('table 82_doc',$data);
    }

}
