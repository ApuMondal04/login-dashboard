<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
    }

    public function employee() {

        $this->load->model('user_model');
        $data['dealer_users'] = $this->user_model->getUsersByType('Dealer');

        $this->load->view('admin/dashboard_employee', $data);
    }
    

    public function dealer() {
        if (!$this->session->userdata('logged_in')) {
           
            $this->session->set_flashdata('error', 'Please log in first.');
            redirect('auth/login');
        }    
        
        $data['dealer_user'] = $this->user_model->getUserById($this->session->userdata('user_id'));

        $this->load->view('admin/dashboard_dealer', $data);
    }
    

    public function update() {
        $userId = $this->input->post('userId');
    
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('editCity', 'City', 'required');
        $this->form_validation->set_rules('editState', 'State', 'required');
        $this->form_validation->set_rules('editZipCode', 'Zip Code', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->employee();
        } else {
            $data = array(
                'city' => $this->input->post('editCity'),
                'state' => $this->input->post('editState'),
                'zip_code' => $this->input->post('editZipCode'),
            );
    
            $this->load->model('user_model');
            $this->user_model->updateUser($userId, $data);
    
            $this->session->set_flashdata('success_message', 'Dealer record updated successfully.');
            redirect('dashboard/employee');
        }
    }
    
    public function update_dealer() {
        $userId = $this->input->post('userId');
    
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('editCity', 'City', 'required');
        $this->form_validation->set_rules('editState', 'State', 'required');
        $this->form_validation->set_rules('editZipCode', 'Zip Code', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->dealer();
        } else {
            $data = array(
                'city' => $this->input->post('editCity'),
                'state' => $this->input->post('editState'),
                'zip_code' => $this->input->post('editZipCode'),
            );
    
            $this->load->model('user_model');
            $this->user_model->updateUser($userId, $data);
    
            $this->session->set_flashdata('success_message', 'Your details updated successfully.');
            redirect('dashboard/dealer');
        }
    }
    
public function delete($userId) {  
    $this->load->model('user_model');
    $this->user_model->deleteUser($userId);
    redirect('employee');
}

}
