<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-12
 * Time: 1:48 PM
 */
class DashboardController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index() {

        if ($this->session->userdata('user_id')) {
            //$this->load->view('admin/dashboard');
            $this->GetAllSongs();
        }else{
            $this->load->helper('form');
            redirect('');
        }


    }
    public function GetAllSongs() {

            $this->load->model('SongsModel');
            $data = $this->SongsModel->getAllSong();
        $html = "";

            if ($data) {

                foreach ($data as &$a) {
                $html = $html."<tr>";
                $html = $html."<td>";
                $html = $html.$a['id'];
                $html = $html."</td>";
                $html = $html."<td>";
                $html = $html.$a['song_name'];
                $html = $html."</td>";
                $html = $html."<td>";
                $html = $html.$a['artist_name'];
                $html = $html."</td>";
                $html = $html."</tr>";
                }


            } else {



            }
        $this->data['html'] = $html;
        $this->load->view('admin/dashboard', $this->data);
    }
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect(base_url(''));
    }
}