<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-12
 * Time: 3:51 PM
 */
class UsersController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index() {

        if ($this->session->userdata('user_id')) {
            //$this->load->view('admin/dashboard');
            $this->GetAllUser();
        }else{
            $this->load->helper('form');
            redirect('');
        }


    }
    public function GetAllUser() {

        $this->load->model('UsersModel');
        $data = $this->UsersModel->getAllUsers();
        $html = "";

        if ($data) {

            foreach ($data as &$a) {
                $html = $html."<tr>";
                $html = $html."<td>";
                $html = $html.$a['id'];
                $html = $html."</td>";
                $html = $html."<td>";
                $html = $html.$a['First_name'];
                $html = $html."</td>";
                $html = $html."<td>";
                $html = $html.$a['Last_name'];
                $html = $html."</td>";
                $html = $html."<td>";
                $html = $html.$a['email'];
                $html = $html."</td>";
                $html = $html."<td>";
                $html = $html.$a['username'];
                $html = $html."</td>";
                $html = $html."</tr>";
            }


        } else {



        }
        $this->data['html'] = $html;
        $this->load->view('admin/UsersV', $this->data);
    }
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect(base_url(''));
    }
}