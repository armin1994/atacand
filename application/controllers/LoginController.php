<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-04
 * Time: 3:27 PM
 */
class LoginController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index() {

        if ($this->session->userdata('user_id')) {
            //$this->load->view('admin/dashboard');
            redirect('dashboard');
        }else{
            $this->load->helper('form');
            $this->load->view('login/admin_login');
        }


    }
    public function admin_login() {
        $this->load->library('form_validation');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ( !empty($username) and !empty($password)) {


            $this->load->model('Loginmodel');
            $login_id = $this->Loginmodel->login_valid($username, $password , 0);

            if ($login_id) {
                $this->session->set_userdata('user_id', $login_id);
                redirect('dashboard');
            } else {

                $this->session->set_flashdata('login_failed', 'Invalid Username/Passwords');
                redirect(base_url(''));
            }
        } else {
print_r("hahahahahahahahahahahaha");
            $this->load->view('login/admin_login');
        }
    }
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect(base_url(''));
    }
}