<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->model('user_model'); 
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            $user = $this->user_model->login($email, $password);
    
            if ($user) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('first_name', $user->first_name);
                $this->session->set_userdata('user_id', $user->id);
    
                if ($user->user_type == 'Employee') {
                    $this->session->set_flashdata('login_message', 'Login successful! Welcome, ' . $user->first_name . ' (Employee)');
                    redirect('dashboard/employee');
                } else if ($user->user_type == 'Dealer') {
                    $this->session->set_flashdata('login_message', 'Login successful! Welcome, ' . $user->first_name . ' (Dealer)');
                    redirect('dashboard/dealer');
                }
            } else {
                $this->load->view('login');
            }
        }
    }
    

    
    public function register() {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
    
        if ($this->input->post('user_type') == 'Dealer') {
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
        }
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('register');
        } else {
            $email = $this->input->post('email');
    
            
            if ($this->user_model->check_email_exists($email)) {
                echo "email_exists";
            } else {
                
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $email,
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'user_type' => $this->input->post('user_type'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zip_code' => $this->input->post('zip_code'),
                );
    
                $this->user_model->register($data);
                echo "success";
            }
        }
    }
    

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url()); 
    }
}
?>
