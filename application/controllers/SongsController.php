<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 2018-07-27
 * Time: 5:25 PM
 */
class SongsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        $this->load->helper(array('form', 'url'));
    }
    public function index() {

        if ($this->session->userdata('user_id')) {
            //$this->load->view('admin/dashboard');
            //$this->GetAllUser();
            $this->load->helper(array('form', 'url','alert_helper'));

            $this->load->view('admin/upload_song', array('error' => ' ' ));
        }else{
            $this->load->helper('form');
            redirect('');
        }


    }
    public function do_upload_test2(){
        $config['upload_path'] = UPLOADS . "/songs/";
        $config['allowed_types'] = 'mp3|m4r';
        $config['file_name'] = "test.mp3";
        $config['overwrite'] = TRUE;
        $this->load->helper('alert_helper');
        $this->load->library('upload', $config);
        $this->load->library('Alert');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {

        } else {
            foreach ($this->upload->data() as $item => $value):
                if ($item === 'file_name') {
            $mulipart = new GuzzleHttp\Psr7\MultipartStream(
              [
                  [
                      'name' => 'upload_file',
                      'contents' => fopen(UPLOADS."/songs/" .$value, 'r')
                  ]
              ]
            );
            $request = new GuzzleHttp\Psr7\Request('POST','http://adcarryteam.000webhostapp.com/uploadAyoub.php');
            $request = $request->withBody($mulipart);
            $client = new GuzzleHttp\Client();
            $response = $client->send($request);
            echo $response->getBody();
                }
            endforeach;
        }
    }
    public function do_upload_test()
    {

        $config['upload_path'] = UPLOADS . "/songs/";
        $config['allowed_types'] = 'mp3|m4r';
        $config['file_name'] = "test.mp3";
        $config['overwrite'] = TRUE;
        $this->load->helper('alert_helper');
        $this->load->library('upload', $config);
        $this->load->library('Alert');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {

        } else {

                foreach ($this->upload->data() as $item => $value):
                    if ($item === 'file_name') {
                    $client = new GuzzleHttp\Client();

                    #This url define speific Target for guzzle
                    $url = 'http://adcarryteam.000webhostapp.com/uploadAyoub.php';

                    #guzzle
                    try {
                        # guzzle post request example with form parameter
                        $request =  new GuzzleHttp\Psr7\Request('POST','http://adcarryteam.000webhostapp.com/uploadAyoub.php'
                            ,
                            [
                                'multipart' => [

                                    [
                                        'name' => 'image',
                                        'filename' => 'filename.mp3',
                                        'contents' => fopen(UPLOADS."/songs/" .$value, 'r')
                                    ],

                                ],
                                ['name' => 'saif']
                            ]
                        );
                        /*$response = $client->request('POST',
                            $url,
                            [
                                'multipart' => [

                                    [
                                        'name' => 'image',
                                        'filename' => 'filename.mp3',
                                        'contents' => fopen(UPLOADS."/songs/" .$value, 'r')
                                    ],

                                ],
                                ['name' => 'saif']
                            ]
                        ); */
                        var_dump($request);
                        $response = $client->send($request);
                        #guzzle repose for future use

                        echo $response->getStatusCode(); // 200
                        echo $response->getReasonPhrase(); // OK
                        echo $response->getProtocolVersion(); // 1.1
                        echo $response->getBody();
                        $error = array('error' => $response);

                        $this->alert->set('alert-danger', 'Song: ' . $error);
                        $this->load->view('admin/upload_song');
                    } catch (GuzzleHttp\Exception\BadResponseException $e) {
                        #guzzle repose for future use
                        $response = $e->getResponse();
                        $responseBodyAsString = $response->getBody()->getContents();
                        print_r($responseBodyAsString);
                        $error = array('error' => $responseBodyAsString);

                        $this->alert->set('alert-danger', 'Song: ' . $error);
                        $this->load->view('admin/upload_song');

                    }
                }
            endforeach;
        }

    }
    public function do_upload() {

        $config['upload_path']          = "https:".base_url().UPLOADS."/songs/";
        $config['allowed_types']        = 'mp3|m4r';
        $config['file_name'] = "test.mp3";
        $this->load->helper('alert_helper');
        $this->load->library('upload', $config);
        $this->load->library('Alert');
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->alert->set('alert-danger','Song: '.$this->upload->display_errors());
            $this->load->view('admin/upload_song');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //$active = array('active' => "22");
            foreach ($this->upload->data() as $item => $value):
            if ($item === 'raw_name'){
                $this->alert->set('alert-success', 'Your song '.$value.' was successfully uploaded.');
            }
            if ($item === 'file_name') {
                $this->session->set_userdata('user_song', $value);
                $this->do_upload_lyrics();
            }
            endforeach;



        }
    }
    public function do_upload_lyrics() {
        $config['upload_path']          = "https:".base_url().UPLOADS."/lyrics/";
        $config['allowed_types']        = 'txt|lrc';
        $this->load->helper('alert_helper');
        $this->load->library('upload', $config);
        $this->load->library('Alert');
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('userlyrics'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->alert->set('alert-danger','Lyric: '.$this->upload->display_errors());
            $this->load->view('admin/upload_song');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //$active = array('active' => "22");
            foreach ($this->upload->data() as $item => $value):
                if ($item === 'raw_name'){
                    $this->alert->set('alert-success', 'Your lyric '.$value.' was successfully uploaded.');
                }
                if ($item === 'file_name') {
                    $this->session->set_userdata('user_lyrics', $value);
                    $this->do_upload_image();
                }
            endforeach;



        }
    }
    public function do_upload_image() {
        $config['upload_path']          = "https:".base_url().UPLOADS."/images/";
        $config['allowed_types']        = 'jpg|jpeg|png';
        $this->load->helper('alert_helper');
        $this->load->library('upload', $config);
        $this->load->library('Alert');
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('imageSong'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->alert->set('alert-danger','Image: '.$this->upload->display_errors());
            $this->load->view('admin/upload_song');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //$active = array('active' => "22");
            foreach ($this->upload->data() as $item => $value):
                if ($item === 'raw_name'){
                    $this->alert->set('alert-success', 'Your image '.$value.' was successfully uploaded.');
                }
                if ($item === 'file_name') {
                    $this->session->set_userdata('user_img', $value);
                    $this->save_song();
                }
            endforeach;



        }
    }
    public function save_song()
    {

        $song_name = $this->input->post('songName');
        $artist_name = $this->input->post('artistName');
        $image = $this->session->userdata('user_img');

        if ($this->session->userdata('user_song') &&  $this->session->userdata('user_lyrics') ){
            $song = $this->session->userdata('user_song');
            $lyrics = $this->session->userdata('user_lyrics');
            $this->load->model('SongsModel');
            $login_id = $this->SongsModel->save_song($song,$lyrics,$song_name,$artist_name,$image);
            if ($login_id){
                $this->session->unset_userdata('user_song');
                $this->session->unset_userdata('user_lyrics');
                $this->session->unset_userdata('user_img');
                redirect('');
            }
        }else{
            $this->alert->set('please upload both of song and lyric!');
            $this->load->view('admin/upload_song');
        }
    }
}