<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('users/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'oauth_provider' => $row->oauth_provider,
		'oauth_uid' => $row->oauth_uid,
		'password' => $row->password,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'email' => $row->email,
		'gender' => $row->gender,
		'locale' => $row->locale,
		'picture_url' => $row->picture_url,
		'profile_url' => $row->profile_url,
		'created' => $row->created,
		'modified' => $row->modified,
	    );
            $this->load->view('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'oauth_provider' => set_value('oauth_provider'),
	    'oauth_uid' => set_value('oauth_uid'),
	    'password' => set_value('password'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'email' => set_value('email'),
	    'gender' => set_value('gender'),
	    'locale' => set_value('locale'),
	    'picture_url' => set_value('picture_url'),
	    'profile_url' => set_value('profile_url'),
	    'created' => set_value('created'),
	    'modified' => set_value('modified'),
	);
        $this->load->view('users/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'oauth_provider' => $this->input->post('oauth_provider',TRUE),
		'oauth_uid' => $this->input->post('oauth_uid',TRUE),
		'password' => $this->input->post('password',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'locale' => $this->input->post('locale',TRUE),
		'picture_url' => $this->input->post('picture_url',TRUE),
		'profile_url' => $this->input->post('profile_url',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'oauth_provider' => set_value('oauth_provider', $row->oauth_provider),
		'oauth_uid' => set_value('oauth_uid', $row->oauth_uid),
		'password' => set_value('password', $row->password),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'email' => set_value('email', $row->email),
		'gender' => set_value('gender', $row->gender),
		'locale' => set_value('locale', $row->locale),
		'picture_url' => set_value('picture_url', $row->picture_url),
		'profile_url' => set_value('profile_url', $row->profile_url),
		'created' => set_value('created', $row->created),
		'modified' => set_value('modified', $row->modified),
	    );
            $this->load->view('users/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'oauth_provider' => $this->input->post('oauth_provider',TRUE),
		'oauth_uid' => $this->input->post('oauth_uid',TRUE),
		'password' => $this->input->post('password',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'locale' => $this->input->post('locale',TRUE),
		'picture_url' => $this->input->post('picture_url',TRUE),
		'profile_url' => $this->input->post('profile_url',TRUE),
		'created' => $this->input->post('created',TRUE),
		'modified' => $this->input->post('modified',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('oauth_provider', 'oauth provider', 'trim|required');
	$this->form_validation->set_rules('oauth_uid', 'oauth uid', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('locale', 'locale', 'trim|required');
	$this->form_validation->set_rules('picture_url', 'picture url', 'trim|required');
	$this->form_validation->set_rules('profile_url', 'profile url', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');
	$this->form_validation->set_rules('modified', 'modified', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-02-07 08:45:46 */
/* http://harviacode.com */