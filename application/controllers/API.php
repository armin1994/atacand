<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-23
 * Time: 1:22 PM
 */
require APPPATH . 'libraries/REST_Controller.php';
class API extends REST_Controller2 {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Loginmodel');
        $this->load->model('SongsModel');
    }
    function registeruser_post() {
       $First = $this->post('first_name');
        $Last = $this->post('last_name');
        $email = $this->post('email');
        $username = $this->post('username');
        $password = $this->post('password');
        $birthday = $this->post('birthday');
        if (!$First || !$Last || !$email || !$username || !$password || !$birthday) {
            $response_array['status'] = 'false';
            $response_array['data'] = [];
            $response_array['message'] = "empty vars";
            $this->response($response_array,200);

        }else{
            $result = $this->Loginmodel->register($username,$password,$First,$Last,$email,$birthday);
            if ($result === 3) {
                $response_array['status'] = 'true';
                $response_array['data'] = [];
                $response_array['message'] = "register done";
                $this->response($response_array,200);

            }elseif ($result === 4) {
                $response_array['status'] = 'false';
                $response_array['data'] = [];
                $response_array['message'] = "error occured while registring";
                $this->response($response_array,200);
            }elseif ($result === 0) {
                $response_array['status'] = 'false';
                $response_array['data'] = [];
                $response_array['message'] = "email already exist";
                $this->response($response_array,200);
            }else {
                $response_array['status'] = 'false';
                $response_array['data'] = [];
                $response_array['message'] = "username already exist";
                $this->response($response_array,200);
            }
        }
    }
    public function loginuser_post() {
        $username = $this->post('username');
        $password = $this->post('password');
        if (!$username || !$password ) {
            $response_array['status'] = 'false';
            $response_array['data'] = [];
            $response_array['message'] = "empty vars";
            $this->response($response_array,200);
        }else{
            $res = $this->Loginmodel->login($username,$password);
            if ($res != null) {
                $response_array['status'] = 'true';
                $response_array['data'] = $res;
                $response_array['message'] = "";
                $this->response($response_array,200);
            }else{
                $response_array['status'] = 'false';
                $response_array['data'] = [];
                $response_array['message'] = "wrong username/password";

                $this->response($response_array,200);
            }
        }
    }
    public function verifyemail_post() {
        $email = $this->post('email');
        if (!$email ) {
            $response_array['status'] = 'false';
            $response_array['data'] = [];
            $response_array['message'] = "empty vars";
            $this->response($response_array,200);

        }else{
            $res = $this->Loginmodel->verifyem($email);
            if ($res == 0) {
                $response_array['status'] = 'true';
                $response_array['data'] = [];
                $response_array['message'] = "go on";
                $this->response($response_array,200);
            }else{
                $response_array['status'] = 'true';
                $response_array['data'] = [];
                $response_array['message'] = "already exist";
                $this->response($response_array,200);
            }
        }
    }
    public function getAllSongs_get() {
        $res = $this->SongsModel->getAllSong();
        if ($res != false){
            $response['status'] = 'true';
            $response['data'] = $res;
            $response['message'] = "";
            $this->response($response,200);
        }else{
            $response['status'] = 'false';
            $response['data'] = [];
            $response['message'] = "no songs";
            $this->response($response,200);
        }

    }
public function saveSong_post() {

        $song_src = $this->post('song_src');
        $user_id = $this->post('id_user');
        $song = $this->post('id_song');
        $date = new DateTime();
    $res = $this->SongsModel->save_song_user($date->format(DATE_RFC2822),$song,$song_src,$user_id);
    if ($res) {
        $response_array['status'] = 'true';
        $response_array['data'] = [];
        $response_array['message'] = "go on";
        $this->response($response_array,200);
    }else{
        $response_array['status'] = 'true';
        $response_array['data'] = [];
        $response_array['message'] = "error while saving the song";
        $this->response($response_array,200);
    }


}

}