<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/index.html';
            $config['first_url'] = base_url() . 'menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_model->total_rows($q);
        $menu = $this->Menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array('judul' =>'Data Menu',
            'menu_data' => $menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->lib_template->load('template','menu/menu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array('judul' => 'View Menu',
		'id' => $row->id,
		'name' => $row->name,
		'link' => $row->link,
		'icon' => $row->icon,
		'is_active' => $row->is_active,
		'is_parent' => $row->is_parent,
	    );
            $this->lib_template->load('template','menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $data = array('judul' => 'Create Menu',
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'link' => set_value('link'),
	    'icon' => set_value('icon'),
	    'is_active' => set_value('is_active'),
	    'is_parent' => set_value('is_parent'),
	);
        $this->lib_template->load('template','menu/menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'link' => $this->input->post('link',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		'is_parent' => $this->input->post('is_parent',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array('judul' => 'Edit Menu',
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'link' => set_value('link', $row->link),
		'icon' => set_value('icon', $row->icon),
		'is_active' => set_value('is_active', $row->is_active),
		'is_parent' => set_value('is_parent', $row->is_parent),
	    );
            $this->lib_template->load('template','menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'link' => $this->input->post('link',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
		'is_parent' => $this->input->post('is_parent',TRUE),
	    );

            $this->Menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
	$this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
