<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function updateUser($userId, $data) {
        $this->db->where('id', $userId);
        $this->db->update('users', $data);
    }

    public function login($email, $password) {
        $query = $this->db->get_where('users', array('email' => $email));
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    public function register($data) {
        $this->db->insert('users', $data);
    }

    public function check_email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }
    

    public function getUsersByType($type) {
        $query = $this->db->get_where('users', array('user_type' => $type));
        return $query->result();
    }

        public function getUserById($userId) {
            $query = $this->db->get_where('users', array('id' => $userId));
            return $query->row();
        }

        
}
?>
